<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
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
	  <div class="col-lg-12 col-12">
				  <div class="box box-inverse ">
					<div class="box-body col-lg:d-flex justify-content-between">
						<h4 class="font-size-26">Welcome <?php echo $row['flname'] ?></h4>
						<h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg> / overview /Crypto</h5>
					</div>
				  </div>
			    </div>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-12 col-12">
					<div class="row">
					<div class="col-lg-4 col-12">
				  <div class="box box-inverse ">
					<div class="box-body">
					  <h5>TOTAL USER</h5>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">809</small> <br>
							<a href="#" class="text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
							<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
							<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
							</svg>...View all</a>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
							</svg>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
			    </div>

				<div class="col-lg-4 col-12">
				  <div class="box box-inverse bg-facebook">
				  	<div class="box-body">
					  <h5>ACTIVE USER</h5>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">796</small> <br>
							<p  class=" font-size-12"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
							<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
							</svg> Verified account in use</p>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
							</svg>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
			    </div>
				<div class="col-lg-4 col-12">
				  <div class="box box-inverse">
				    <div class="box-body">
					  <h5>INACTIVE USER</h5>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">13</small> <br>
							<p  class=" font-size-12"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-danger" viewBox="0 0 16 16">
							<path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
							</svg> Inactive User</p>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-people-fill text-danger" viewBox="0 0 16 16">
							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
							</svg>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
			    </div>
				<div class="col-lg-4 col-12">
				  <div class="box box-inverse ">
				  	<div class="box-body">
					  <h5>PENDING TRANSFER</h5>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$221,344,796</small> <br>
							<a href="#" class="text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
							<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
							<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
							</svg>...View all</a>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-eye-fill text-warning" viewBox="0 0 16 16">
							<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
							<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
							</svg>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
			    </div>
				<!-- <div class="col-lg-4 col-12">
				  <div class="box box-inverse bg-facebook">
				  <div class="box-body">
					  <h4>USDT(ERC20)</h4>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/usdt-logo.png" width="50" alt="usdt-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$0.00</small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
							<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
						  </svg>956 <br>
						  <small class="font-size-14 ">0.00 USDT <br>(ERC20)</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
			    </div>	 -->
			</div>
			<?php  
					}
				}
			?>
		</section>
	<!-- <div class="col-xl-3 col-12">
			<div class="box">
				<div class="box-body">							
					<div class="box no-shadow">
						<div class="box-body px-0 pt-0">
							<div id="calendar" class="dask evt-cal min-h-350"></div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- /.content -->
	  </div>
  </div>
	<?php
		include_once("includes/footer.php")
	?>
	
	<!-- Vendor JS -->
	<script scr="js/widget.js"></script>
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	

	<script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../assets/vendor_components/fullcalendar/fullcalendar.js"></script>
	
	<!-- Joblly App -->
	<script src="js/template.js"></script>
	<script src="js/pages/dashboard.js"></script>
	<script src="js/pages/calendar-dash.js"></script>
	
	

</body>
</html>
