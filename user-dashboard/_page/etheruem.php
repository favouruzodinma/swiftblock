﻿<?php
$url = "https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd";
$get = file_get_contents($url);
$prices = json_decode($get, true);

$defaultPrices = [
    'ethereum' => 2000, // Replace with a default price for Ethereum
];

// Assign prices or use default values if API fails
$ethereumPrice = $prices['ethereum']['usd'] ?? $defaultPrices['ethereum'];
?>


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
		<!-- Main content -->
		<section class="content">
		    <div class="box">
				<div class="box-header">	
					<center>
					<img src="../images/logo/etheruem-logo.png" width="60" alt="etheruem-logo">
					<p class="font-size-26"><?php echo $row ['ethereum_balance'] ?>ETH</p>
					<small class="font-size-16">~$<?php
						$ethereum_result = $ethereumPrice * $row['ethereum_balance'];
						echo number_format($ethereum_result);
						?>  </small>
					</center>				
				</div>
				<div class="box-body">
					<!-- <form action="#" class="dropzone">
						<div class="fallback">
							<input name="file" type="file" multiple />
						</div>
					</form> -->
					<div class="mt-20 d-flex justify-content-around align-items-center">
						<a href="#" class="btn btn-light"  data-toggle="modal" data-target="#etheruem">RECEIVE
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
						</svg>
						</a>
						<a href="send?status=ethereum&userid=<?php echo $userid?>" class="btn btn-light ">SEND <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send-arrow-up" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54l-2.8 7a.5.5 0 1 1-.928-.372l1.895-4.738-7.494 7.494 1.376 2.162a.5.5 0 1 1-.844.537l-1.531-2.407L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM5.93 9.363l7.494-7.494L1.591 6.602l4.339 2.76Z"/>
						<path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708l-1.25-1.25Z"/>
						</svg></a>
					  </div>
				</div>
			</div>
		</section>
		<?php }} ?>
		<!-- /.content -->
		<section class="content">
		    <div class="box">
				<div class="box-header">
					<h4>TRANSACTIONS HISTORY</h4>
					<p>Transaction History shows information about all ETHEREUM Transactions.</p>			
				</div>
				<div class="box-body" style="overflow-x:auto">
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
	  </div>
  </div>
  <?php 
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
  <!-- /.content-wrapper -->
  <div class="modal center-modal fade" id="etheruem" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">RECIEVE ETHERUEM</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<center>
			<img src="..\images\account\isbn5.jpeg" alt="tron" width="200">
			<p>Wallet Address</p>
			<input type="text" value="<?php echo $row ['ethereum_wallet'] ?>" id="copyInput">
			<button onclick="copyText()" class="btn btn-sm btn-primary">Copy</button>

			</center>
			<br>
			<div style="border:1px solid black">
				<p style="border-bottom:1px solid black">
					<h6>Network</h6>
					<p>ERC20</p>
				</p>
				<p style="border-bottom:1px solid black">
					<h6>Expected arrival</h6>
					<p>1 network confirmation</p>
				</p>
				<p style="border-bottom:1px solid black">
					<h6>Expected unlock</h6>
					<p>2 network confirmation</p>
				</p>
			</div>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	 <script>
		 function copyText() {
			// Select the input field
			const copyInput = document.getElementById('copyInput');

			// Select the text in the input field
			copyInput.select();
			copyInput.setSelectionRange(0, 99999); /* For mobile devices */

			// Copy the text inside the input field
			document.execCommand('copy');

			// Log a message or perform any action to indicate successful copying
			console.log('Text copied: ' + copyInput.value);
			}
	 </script>

</div>
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
