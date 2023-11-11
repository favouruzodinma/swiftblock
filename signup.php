<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if (isset($_SESSION['user'])) {
	header("location:user-dashboard/_page/dashboard");
  }
?>
<head>
    <title>Register - SwiftBl;ock</title>
    <?php
include('head.php');
?>

</head>

<body class="auth-page">
    <!-- SVG Preloader Starts -->
  
    <!-- SVG Preloader Ends -->
	<!-- Live Style Switcher Starts - demo only -->

    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="index">
					<img id="logo-user" class="img-responsive" src="logo2.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<!-- Slider Starts -->
				<div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Indicators Starts -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-testimonials" data-slide-to="1"></li>
						<li data-target="#carousel-testimonials" data-slide-to="2"></li>
					</ol>
					<!-- Indicators Ends -->
					<!-- Carousel Inner Starts -->
					<div class="carousel-inner">
						<!-- Carousel Item Starts -->
						<div class="item active item-1">
							<div>
								<blockquote>
									<p>This is a realistic program for anyone looking for site to invest. Paid to me regularly, keep up good work!</p>
									<footer><span>Lucy Smith</span>, England</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-2">
							<div>
								<blockquote>
									<p>Bitcoin doubled in 7 days. You should not expect anything more. Excellent customer service!</p>
									<footer><span>Slim Hamdi</span>, Tunisia</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-3">
							<div>
								<blockquote>
									<p>My family and me want to thank you for helping us find a great opportunity to make money online. Very happy with how things are going!</p>
									<footer><span>Dalel Boubaker</span>, Russia</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
					</div>
					<!-- Carousel Inner Ends -->
				</div>
				<!-- Slider Ends -->
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="index">
					<img id="logo" class="img-responsive mobile-logo" src="logo2.png" alt="logo" style="width:50%">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head hidden-xs">get <span>started</span></h2>
							 <p class="info-form">Open account for free and start trading Bitcoins now!</p>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<!-- writing my php function to store a new user in the database  -->
						<div class='container ' style="width:100%">
						<?php
						// print_r($_POST)

						if(isset($_POST['register'])){
    						$userid = ("SWB" .rand(203994 , 485789));

							$flname =$_POST["flname"];
							$email =$_POST["email"];
							$password =$_POST["password"];
							$cpassword =$_POST["cpassword"];
							
							$passwordHash = password_hash($password, PASSWORD_DEFAULT);

							$errors = array();

							if (empty($flname)OR empty($email) OR empty($password) OR empty($password)){
								array_push($errors,"All field ar e required");
							}
							if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
								array_push($errors,"Email is not Valid");
							}
							if(strlen($password)<8){
								array_push($errors,"Character must be at least 8 characters long ");
							}
							if($password!==$cpassword){
								array_push($errors,"Password and comfirm password dont match");
							}
							require_once('_db.php');
							$sql = "SELECT * FROM user_login WHERE email='$email' ";
							$result= mysqli_query($conn,$sql);
							$rowCount = mysqli_num_rows($result);
							if($rowCount>0){
								array_push($errors,"Email has already been used..");
							}
							if(count($errors)>0){
								foreach($errors as $error){
									echo "
										<div class='alert alert-danger d-flex justify-space-between'>
										<strong>$error</strong> 
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
										</button>
										</div>";
									// echo "<div class='alert alert-danger'>$error</div>";
								}
							}else{
								require_once('_db.php');
								$sql = "INSERT INTO  user_login (userid ,flname, email, password) VALUES (?,?,?,?)";
								$stmt = mysqli_stmt_init($conn);
								$prepareStmt = mysqli_stmt_prepare($stmt,$sql);
								if($prepareStmt){
									mysqli_stmt_bind_param($stmt,"ssss",$userid,$flname,$email,$passwordHash);
									mysqli_stmt_execute($stmt);
									echo"
									<div class='alert alert-success d-flex justify-space-between'>
									<strong>Registered Successfully...  </strong> 
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
									</button>
									</div>";
								}else{
									die("something went wrong");
								}
							}

						}
						?>
						</div>
						<!-- end of the php function  -->
						<form action="signup" method="POST">
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="flname" id="name" placeholder="NAME" type="text" >
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" >
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" >
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="cpassword" id="password" placeholder="COMFIRM PASSWORD" type="password" >
							</div>
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="register">create account</button>
								<p class="text-center">already have an account ? <a href="login">Login</a>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Copyright Text Starts -->
				<p class="text-center  copyright-text">Copyright © 2018 - <?php  echo date("Y");  ?>  SwiftBlock  All Rights Reserved</p>

				<!-- Copyright Text Ends -->
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>