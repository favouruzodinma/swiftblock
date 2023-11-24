<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Users Tables</h3>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="container">
		  <div class="row">

			<div class="col-12">

					<div class="table-responsive">
						
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>FULLNAME</th>
								<th>EMAIL</th>
								<th>USER ID</th>
								<th>KYC</th>
								<th>Ip Address</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
							require_once('../../_db.php'); // Include your database connection script

							// Check if the 'status' parameter is set in the URL
							if (isset($_GET['status'])) {
								$status = $_GET['status'];
								$sql = "SELECT * FROM user_login WHERE status = ? ORDER BY id DESC";

								// Prepare a parameterized statement
								$stmt = $conn->prepare($sql);
								$stmt->bind_param("s", $status);
								$stmt->execute();

								$result = $stmt->get_result();
							} else {
								// If 'status' parameter is not set, fetch all records from 'user_login'
								$sql = "SELECT * FROM user_login ORDER BY id";
								$result = $conn->query($sql);
							}

							if ($result) {
								if ($result->num_rows > 0) {
                                    $num=1; 
									// Output data of each row
									while ($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $row['flname']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['userid']; ?></td>
								<td><img src="../../<?php echo $row['kyc']; ?>" alt="user_kyc"></td>
								<td><?php echo $row['ip_address']; ?></td>
								<td><?php 
                                switch ($row['status']) {
                                  
                                  case 'verified':
                                    echo "<span class='badge badge-pill badge-success'>Verified</span>";
                                    break;
                                  case 'pending':
                                    echo "<span class='badge badge-pill badge-warning'>Pending</span>";
                                    break; } ?></td>
								<td>
									<a href="view?userid=<?php echo $row ['userid']?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill " viewBox="0 0 16 16">
									<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
									<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
									</svg></a>
								</td>
							</tr>
							<?php    }
							}  } else {?>
									<tdcolspan=7><span class="text-danger" style="color:red">No records found in the table </td>
							<?php }?>
						</tbody>
					</table>
					</div>
			</div> 
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <?php
		include_once("includes/footer.php")
	?>	
  <!-- Control Sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	
	<!-- Joblly App -->
	<script src="js/template.js"></script>
	
	<script src="js/pages/data-table.js"></script>
	

</body>
</html>
