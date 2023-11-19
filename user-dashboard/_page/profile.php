<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<!-- <h3 class="page-title">Advanced Form Elements</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Advanced Form Elements</li>
							</ol>
						</nav>
					</div> -->
				</div>
				
			</div>
		</div>
		
		<?php 
	  	require_once("../../_db.php");
		$userid = $_SESSION['userid'];

		// Prepare a statement
		$stmt = $conn->prepare("SELECT* FROM user_login WHERE userid = ?");
		$stmt->bind_param("s", $userid);
		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				// Your data retrieval
		
		?>

		<?php
			// Check if the form is submitted
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// Retrieve user inputs from the form
				$oldPassword = $_POST['old_password'];
				$newPassword = $_POST['new_password'];
				$confirmPassword = $_POST['confirm_password'];

				// Validate if new password and confirm password match
				if ($newPassword !== $confirmPassword) {
					// Passwords do not match, handle accordingly (show error message)
					$error = "New password and confirm password do not match.";
					// header('location:profile');
				} else {
					// Sanitize user inputs
					$oldPassword = htmlspecialchars($oldPassword);
					$newPassword = htmlspecialchars($newPassword);

					// Replace this with your own database connection logic
					require_once('../../_db.php');

					// Retrieve the user's current password from the database
					$userid = $_SESSION['userid'];
					$sql = "SELECT * FROM user_login WHERE userid = ?";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("s", $userid);
					$stmt->execute();
					$result = $stmt->get_result();

					if ($result->num_rows === 1) {
						$user = $result->fetch_assoc();
						// Verify the old password
						if (password_verify($oldPassword, $user['password'])) {
							// Hash the new password before storing it in the database
							$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

							// Update the user's password in the database
							$updateSql = "UPDATE user_login SET password = ? WHERE userid = ?";
							$updateStmt = $conn->prepare($updateSql);
							$updateStmt->bind_param("ss", $hashedPassword, $userid);
							if ($updateStmt->execute()) {
								// Password updated successfully
								$success = "Password updated successfully!";
								// header('location:profile');
							} else {
								// Handle database update error
								$error = "Password update failed. Please try again.";
								// header('location:profile');
							}
						} else {
							// Old password does not match
							$error = "Old password is incorrect.";
							// header('location:profile');
						}
					} else {
						// User not found in the database
						$error = "User not found.";
						// header('location:profile');
					}

					// Close the database connection
					$conn->close();
				}
			}
		?>
		<!-- Main content -->
		<section class="content row">
		<div class="box col-md-4  mr-4">
				<div class="box-header">
					<img src="../images/avatar/avatar-4.png" width="150" alt="user-logo"  class="img-thumbnail">
					
					<h5 class="font-size-20 pt-3"><?php echo $row['flname'] ?> <?php 
						if ($row['status'] == 'pending') {
							?>
							
							<?php 
						} else {
							?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
								<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
							</svg>
							<?php 
						}
						?></h5>
					<p>USER ID <?php echo $row['userid'] ?></p>			
				</div>
				<div class="box-body">
				<span class="dropdown-item" >
				<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-at text-danger" viewBox="0 0 16 16">
				<path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
				</svg>
				
				<?php echo $row['email'] ?>
				</span>

				<a class="dropdown-item" >
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
				<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
				<path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
				</svg> <?php echo $row['userid'] ?></a>

				</div>
			</div>
		    <div class="box col-md-7">
				<div class="box-header">
					<h4>PERSONAL INFORMATION</h4>
					<h4>NAME</h4>	
					<div class="form-group row">
						<label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="fullname" disabled value="<?php echo $row['flname'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="email" disabled value="<?php echo $row['email'] ?>">
						</div>
					</div>
					</form>
				
				</div>
				<div class="box-body">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger"><?php echo $error; ?></div>
					<?php endif; ?>
					<?php if (isset($success)) : ?>
						<div class="alert alert-success"><?php echo $success; ?></div>
					<?php endif; ?>
					<h4>SECURITY</h4>
					<div class="form-group row">
						<label for="fullname" class="col-sm-2 col-form-label">Old(password)</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" id="fullname" name="old_password" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">New(password)</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" id="email" name="new_password" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Comfirm(password)</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" id="email" name="confirm_password" value="">
						</div>
					</div>
					<button class="btn btn-dark" type="submit">Reset</button>
					</form>
				</div>
			</div>
			
		</section>
		<!-- Main content -->
		<section class="content row">
		    <div class="box col-md-7 mr-4">
				<div class="box-header">	
					<h4>USER KYC	</h4>
					<h4>UPLOAD A VALID PASSPORT/ANY GOVERNMENTAL ID FOR VERIFICATION</h4>			
				</div>
				<div class="box-body">
					<form action="kyc.php" method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<div class="col-sm-10">
							<input type="file" class="form-control" id="file" value="" name="kyc">
							</div>
						</div>
						<button class="btn btn-dark" type="submit" name="uploadkyc">Upload</button>
					</form>
				</div>
			</div>
			<div class="box col-md-4">
				<div class="box-header">
					<h4>GET PHRASE</h4>
					<p>THE RECOVERY PHRASE IS THE MASTER KEY TO YOUR FUNDS. NEVER SHARE IT WITH ANYONE ELSE.</p>			
				</div>
				<div class="box-body">
					<div class="collapse" id="collapseExample">
					<div class="card card-body">
						<?php echo $row['phrase'] ?>
					</div>
					</div>
					<button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						Show Phrase
					</button>
				</div>
			</div>
		</section>
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
  <?php }} ?>
  <?php
		include_once("includes/footer.php")
	?>	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	<script src="../assets/vendor_components/dropzone/dropzone.js"></script>
	
	<!-- Joblly App -->
	<script src="js/template.js"></script>    
	
	
	


</body>
</html>
