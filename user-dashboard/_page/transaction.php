

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

		<!-- Main content -->
		
		<!-- /.content -->

		<section class="content">
		    <div class="box">
				<div class="box-header d-flex justify-content-between">
					<div>
					<h4>TRANSACTIONS HISTORY FOR BITCOIN</h4>
					<p>Transaction History shows information about all BITCOIN Transactions.</p>
					</div>		
					<img src="../images/logo/bitcoin-logo.png" width="60" alt="bitcoin-logo">			
				</div>
				<div class="box-body">
					<?php 
						$userid = $_SESSION['userid'];

						// Prepare a statement
						$stmt = $conn->prepare("SELECT * FROM history WHERE userid = ? AND coinType = ?");
						$coinType = 'bitcoin'; // Set coinType as 'bitcoin'
						$stmt->bind_param("ss", $userid, $coinType);
						$stmt->execute();

						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
					?>
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>AMOUNT</th>
								<th>COIN NAME</th>
								<th>DATE/TIME</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['updated_balance']; ?>BTC</td>
								<td><?php echo $row['coinType']; ?></td>
								<td><?php echo $row['updated_at']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } else { ?>
					<span class="text-danger">No Transaction record.</span>
					<?php } ?>
				</div>
			</div>
		</section>

		<section class="content">
		    <div class="box">
				<div class="box-header d-flex justify-content-between">
					<div>
					<h4>TRANSACTIONS HISTORY FOR ETHERUEM</h4>
					<p>Transaction History shows information about all ETHERUEM Transactions.</p>
					</div>		
					<img src="../images/logo/etheruem-logo.png" width="60" alt="etheruem-logo">			
				</div>
				<div class="box-body">
					<?php 
						$userid = $_SESSION['userid'];

						// Prepare a statement
						$stmt = $conn->prepare("SELECT * FROM history WHERE userid = ? AND coinType = ?");
						$coinType = 'ethereum'; // Set coinType as 'bitcoin'
						$stmt->bind_param("ss", $userid, $coinType);
						$stmt->execute();

						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
					?>
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>AMOUNT</th>
								<th>COIN NAME</th>
								<th>DATE/TIME</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['updated_balance']; ?>ETH</td>
								<td><?php echo $row['coinType']; ?></td>
								<td><?php echo $row['updated_at']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } else { ?>
					<span class="text-danger">No Transaction record.</span>
					<?php } ?>
				</div>
			</div>
		</section>

		<section class="content">
		    <div class="box">
				<div class="box-header d-flex justify-content-between">
					<div>
					<h4>TRANSACTIONS HISTORY FOR TRON</h4>
					<p>Transaction History shows information about all TRON Transactions.</p>
					</div>			
					<img src="../images/logo/tron-logo.png" width="60" alt="tron-logo">			
				</div>
				<div class="box-body">
					<?php 
						$userid = $_SESSION['userid'];

						// Prepare a statement
						$stmt = $conn->prepare("SELECT * FROM history WHERE userid = ? AND coinType = ?");
						$coinType = 'tron'; // Set coinType as 'bitcoin'
						$stmt->bind_param("ss", $userid, $coinType);
						$stmt->execute();

						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
					?>
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>AMOUNT</th>
								<th>COIN NAME</th>
								<th>DATE/TIME</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['updated_balance']; ?>TRON</td>
								<td><?php echo $row['coinType']; ?></td>
								<td><?php echo $row['updated_at']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } else { ?>
					<span class="text-danger">No Transaction record.</span>
					<?php } ?>
				</div>
			</div>
		</section>

		<section class="content">
		    <div class="box">
				<div class="box-header d-flex justify-content-between">
					<div>
					<h4>TRANSACTIONS HISTORY FOR USDT(TRC20)</h4>
					<p>Transaction History shows information about all USDT(TRC20) Transactions.</p>
					</div>
					<img src="../images/logo/usdt-logo.png" width="60" alt="usdt-logo">			
				</div>
				<div class="box-body">
					<?php 
						$userid = $_SESSION['userid'];

						// Prepare a statement
						$stmt = $conn->prepare("SELECT * FROM history WHERE userid = ? AND coinType = ?");
						$coinType = 'tether'; // Set coinType as 'bitcoin'
						$stmt->bind_param("ss", $userid, $coinType);
						$stmt->execute();

						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
					?>
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>AMOUNT</th>
								<th>COIN NAME</th>
								<th>DATE/TIME</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['updated_balance']; ?>USDT(TRC20)</td>
								<td><?php echo $row['coinType']; ?></td>
								<td><?php echo $row['updated_at']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } else { ?>
					<span class="text-danger">No Transaction record.</span>
					<?php } ?>
				</div>
			</div>
		</section>

		<section class="content">
		    <div class="box">
				<div class="box-header d-flex justify-content-between">
					<div>
					<h4>TRANSACTIONS HISTORY FOR USDT(ERC20)</h4>
					<p>Transaction History shows information about all USDT(ERC20) Transactions.</p>
					</div>
					<img src="../images/logo/usdt-logo.png" width="60" alt="usdt-logo">			
				</div>
				<div class="box-body">
					<?php 
						$userid = $_SESSION['userid'];

						// Prepare a statement
						$stmt = $conn->prepare("SELECT * FROM history WHERE userid = ? AND coinType = ?");
						$coinType = 'usd-coin'; // Set coinType as 'bitcoin'
						$stmt->bind_param("ss", $userid, $coinType);
						$stmt->execute();

						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
					?>
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>AMOUNT</th>
								<th>COIN NAME</th>
								<th>DATE/TIME</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['updated_balance']; ?>USDT(ERC20)</td>
								<td><?php echo $row['coinType']; ?></td>
								<td><?php echo $row['updated_at']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } else { ?>
					<span class="text-danger">No Transaction record.</span>
					<?php } ?>
				</div>
			</div>
		</section>
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
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
