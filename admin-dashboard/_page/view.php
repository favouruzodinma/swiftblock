<?php
$url = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,ripple,trx,tether,usd-coin&vs_currencies=usd";
$get = file_get_contents($url);
$prices = json_decode($get, true);

$defaultPrices = [
    'bitcoin' => 36000, // Replace with a default price for Bitcoin
    'ethereum' => 2000, // Replace with a default price for Ethereum
    'ripple' => 1.5,    // Replace with a default price for Ripple
    'trx' => 0.1,       // Replace with a default price for TRON
    'tether' => 1,      // Replace with a default price for Tether
    'usd-coin' => 1     // Replace with a default price for USD Coin
];

// Assign prices or use default values if API fails
$bitcoinPrice = $prices['bitcoin']['usd'] ?? $defaultPrices['bitcoin'];
$ethereumPrice = $prices['ethereum']['usd'] ?? $defaultPrices['ethereum'];
$ripplePrice = $prices['ripple']['usd'] ?? $defaultPrices['ripple'];
$trxPrice = $prices['trx']['usd'] ?? $defaultPrices['trx'];
$tetherPrice = $prices['tether']['usd'] ?? $defaultPrices['tether'];
$usdCoinPrice = $prices['usd-coin']['usd'] ?? $defaultPrices['usd-coin'];
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
					<h3 class="page-title">View User</h3>
				</div>
				
			</div>
		</div>

		<!-- Main content -->

                	
                <?php 
               if (isset($_GET['userid'])) {
                require_once("../../_db.php");
                $userid = $_GET['userid'];
            
                // Prepare a statement to fetch user details by userid
                $stmt = $conn->prepare("SELECT * FROM user_login WHERE userid = ?");
                $stmt->bind_param("s", $userid);
                $stmt->execute();
            
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Your data retrieval
                
                ?>

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

                                <a class="dropdown-item" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                </svg> <?php echo $row['ip_address'] ?></a>

                                <div class="row dropdown-item" style="position:relative; left:-14px">
                                <a class=" col-md-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-radioactive" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z"/>
                                <path d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                </svg> 
                                 </a>
                                 <small class="col-md-10"> <?php if($row['status']=='verified'){?>
                                <a href= "manage_user.php?id=<?php echo
                                $row['userid']; ?>&status=disabled " class="btn btn-primary btn-sm my-2">Disable User</a>
                                <?php }else{ ?>
                                <a href="manage_user.php?id=<?php echo
                                $row['userid']; ?>&status=enable " class="btn btn-warning btn-sm ">Enable user</a>
                                <?php } ?></small>
                                </div>

                                </div>
                            </div>
                            <div class="box col-md-7">
                                <div class="box-header">
                                    <form method="POST" action="fund">
                                        <p>KYC verification for all users. kindly process ID before you aprove verification</p>
                                        <h4>SEND TO ALL WALLET</h4>	
                                        <div class="form-group row">
                                            <label for="network" class="col-sm-12 col-form-label">Network</label>
                                            <div class="col-sm-12">
                                            <input type="hidden" value="<?php  echo $userid?>" name="userid">
                                            <!-- <input type="text" class="form-control" id="fullname"  value=""> -->
                                            <select name="coin_name"  id="" class="form-control">
                                                <option name="coin_name" value="bitcoin">BITCOIN</option>
                                                <option name="coin_name" value="ethereum">ETHEREUM</option>
                                                <option name="coin_name" value="tron">TRON</option>
                                                <option name="coin_name" value="tether">USDT(TRC20)</option>
                                                <option name="coin_name" value="usd-coin">USDT(ERC20)</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="value" class="col-sm-12 col-form-label">Enter amount in (VALUE)</label>
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="" name="amount_value" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="usd" class="col-sm-12 col-form-label">Enter amount in (USD)</label>
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="" name="amount_usd" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="wallet" class="col-sm-12 col-form-label">Wallet Addres</label>
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="" name="wallet" value="" required>
                                            </div>
                                        </div>
                                        <input class="btn btn-dark w-100" type="submit" value="Continue" name="fundwallet">
                                    </form>
                                
                                </div>
                            </div>
                            <section class="content">
			<div class="row">
				<div class="col-xl-12 col-12">
					<div class="row">
					<div class="col-lg-4 col-12">
				 	<a href="bitcoin">
					 <div class="box box-inverse ">
					<div class="box-body">
					  <h5>BITCOIN</h5>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/bitcoin-logo.png" width="50" alt="bitcoin-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$<?php echo $bitcoinPrice; ?></small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0" id="bitcoinAmountDisplay">
						
						  <li class="list-inline-item ">
						$<?php
						$bitcoin_result = $bitcoinPrice * $row['bitcoin_balance'];
						echo $bitcoin_result;
						?>  <br>
						  <small class="font-size-16 "><?php echo $row ['bitcoin_balance'] ?> BTC</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
					</a>
			    </div>
				<div class="col-lg-4 col-12">
				  <a href="etheruem">
				  <div class="box box-inverse bg-facebook">
					<div class="box-body">
					  <h4>ETHERUEM</h4>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/etheruem-logo.png" width="50" height="60" alt="etheruem-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload" >$<?php echo $ethereumPrice; ?></small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						$<?php
						$ethereum_result = $ethereumPrice * $row['ethereum_balance'];
						echo $ethereum_result;
						?>   <br>
						  <small class="font-size-16 "><?php echo $row ['ethereum_balance'] ?> ETH</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
				  </a>
			    </div>
				<div class="col-lg-4 col-12">
				  <a href="tron">
				  <div class="box box-inverse">
					<div class="box-body">
					  <h4>TRON</h4>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/tron-logo.png" width="50" alt="tron-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$<?php echo $trxPrice; ?></small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						$<?php
						$tron_result = $trxPrice * $row['tron_balance'];
						echo $tron_result;
						?>  <br>
						  <small class="font-size-16 "><?php echo $row ['tron_balance'] ?> TRX</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
				  </a>
			    </div>
				<div class="col-lg-6 col-12">
				  <a href="usdt_trc">
				  <div class="box box-inverse ">
				  <div class="box-body">
					  <h4>USDT</h4>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/usdt-logo.png" width="50" alt="usdt-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$<?php echo $tetherPrice; ?></small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						  $<?php
							$tether_result = $tetherPrice * $row['tether_balance'];
							echo $tether_result;
							?> <br>
						  <small class="font-size-14 "><?php echo $row ['tether_balance'] ?> USDT <br>(TRC20)</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>	
				  </a>
			    </div>
				<div class="col-lg-6 col-12">
				  <a href="usdt_erc">
				  <div class="box box-inverse bg-facebook">
				  <div class="box-body">
					  <h4>USDT(ERC20)</h4>
					  <div class="mt-20 d-flex justify-content-between">
						<div class="d-flex">
						<img src="../images/logo/usdt-logo.png" width="50" alt="usdt-logo">
						<span class="ml-2">
							<small class="font-size-26" id="autoload">$<?php echo $usdCoinPrice; ?></small> <br>
							<small >6.26%</small>
						</span>
						</div>
						<ul class="list-inline float-right mb-0">
						
						  <li class="list-inline-item ">
						$<?php
						$usd_result = $usdCoinPrice * $row['usd-coin_balance'];
						echo $usd_result;
						?> <br>
						  <small class="font-size-14 "><?php echo $row ['usd-coin_balance'] ?> USDT <br>(ERC20)</small>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
				  </a>
			    </div>	
			</div>
			<?php  
					}
				}
			?>
		</section>
                            
            </section>

                    
                    <?php }} } ?>
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
