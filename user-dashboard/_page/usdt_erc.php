

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
		<section class="content">
		    <div class="box">
				<div class="box-header">	
					<center>
					<img src="../images/logo/usdt-logo.png" width="60" alt="usdt-logo">
					</center>				
				</div>
				<div class="box-body">
					<!-- <form action="#" class="dropzone">
						<div class="fallback">
							<input name="file" type="file" multiple />
						</div>
					</form> -->
					<div class="mt-20 d-flex justify-content-around align-items-center">
						<a href="#" class="btn btn-light" data-toggle="modal" data-target="#usdterc">RECEIVE
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
						</svg>
						</a>
						<a href="send?status=usdt(erc20)" class="btn btn-light ">SEND <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send-arrow-up" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54l-2.8 7a.5.5 0 1 1-.928-.372l1.895-4.738-7.494 7.494 1.376 2.162a.5.5 0 1 1-.844.537l-1.531-2.407L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM5.93 9.363l7.494-7.494L1.591 6.602l4.339 2.76Z"/>
						<path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708l-1.25-1.25Z"/>
						</svg></a>
					  </div>
				</div>
			</div>
		</section>
		<!-- /.content -->
		<section class="content">
		    <div class="box">
				<div class="box-header">
					<h4>TRANSACTIONS HISTORY</h4>
					<p>Transaction History shows information about all BITCOIN Transactions.</p>			
				</div>
				<div class="box-body">
					<span>No Transaction record.</span>
				</div>
			</div>
		</section>
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <div class="modal center-modal fade" id="usdterc" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">RECIEVE USDT(ERC20)</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<center>
			<img src="..\images\account\isbn5.jpeg" alt="tron" width="200">
			<p>Wallet Address</p>

			</center>
			<div style="border:1px solid black">
				<p style="border-bottom:1px solid black">
					<h6>Network</h6>
					<p>TRC20</p>
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
</div>
  
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
