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
  <!-- <script>
	$(document).ready(function(){
		(
			setInterval(function() => {
				$("#autoload").load('$prices');
				refresh();
			}, 1000);
		)
	})
  </script> -->
  <script>
  v
</script>
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
					<div class="box-body">
						<div class="d-flex justify-content-between">
							<span>
							<h4>Total Balance</h4>
							<i class="font-size-26">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
								<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
								</svg><?php
								$bitcoin_result = $bitcoinPrice * $row['bitcoin_balance'];
								$ethereum_result = $ethereumPrice * $row['ethereum_balance'];
								$tron_result =  $trxPrice * $row['tron_balance'];
								$tether_result = $tetherPrice * $row['tether_balance'];
								$usd_result = $usdCoinPrice * $row['usd-coin_balance'];

								$total_balance = $bitcoin_result + $ethereum_result + $tron_result + $tether_result + $usd_result;
								echo $total_balance;
								?>
							</i>
							</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
							<path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
							</svg>
						</div>
					  <div class="mt-20 d-flex justify-content-center align-items-center">
						<a href="#" class="btn btn-light"  data-toggle="modal" data-target="#recieve">RECEIVE
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
						<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
						<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
						</svg>
						</a>
						<a href="#" class="btn btn-light mx-2" data-toggle="modal" data-target="#sendModal">SEND <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send-arrow-up" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54l-2.8 7a.5.5 0 1 1-.928-.372l1.895-4.738-7.494 7.494 1.376 2.162a.5.5 0 1 1-.844.537l-1.531-2.407L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM5.93 9.363l7.494-7.494L1.591 6.602l4.339 2.76Z"/>
						<path fill-rule="evenodd" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708l-1.25-1.25Z"/>
						</svg></a>
						<a href="https://moonpay.com" class="btn btn-light">BUY <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
						<path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
						<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
						</svg></a>
					  </div>
					</div>
				  </div>
			    </div>
				
		<!-- Main content -->
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
		<div class="pt-1 col-12">
                        <div class="tradingview-widget-container" style="margin:30px 0px 10px 0px;">
  <div id="tradingview_f933e"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "550",
  "symbol": "COINBASE:BTCUSD",
  "interval": "1",
  "timezone": "Etc/UTC",
  "theme": 'dark',
  "style": "9",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "calendar": false,
  "studies": [
    "BB@tv-basicstudies"
  ],
  "container_id": "tradingview_f933e"
}
  );
  </script>
</div>
                        
</div>
		                           
<div class="white-box container" style="height: 450px; width:100%">
                            <h4 style="margin-bottom:5px;">Market Fundamental Data</h4>
<!-- TradingView Widget BEGIN -->

<span id="tradingview-copyright"><a ref="nofollow noopener" target="_blank" href="http://www.tradingview.com" style="color: rgb(173, 174, 176); font-family: &quot;Trebuchet MS&quot;, Tahoma, Arial, sans-serif; font-size: 13px;"></a></span>
<script src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js">{
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "BTC",
    "ETH",
    "LTC",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY"
  ],
  "isTransparent": false,
  "colorTheme": "dark",
  "width": "100%",
  "height": "100%",
  "locale": "en"
}</script>

</div>
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
