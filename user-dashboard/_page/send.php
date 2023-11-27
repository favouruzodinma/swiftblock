
<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
	  <div class="container-full">



		<!-- Main content -->
		<section class="content">
            
		    <div class="box">
            <?php 
            if (isset($_GET['status'])) {
            require_once("../../_db.php");
            $coin_name = $_GET['status'];
        
            // Prepare a statement to fetch user details by status
            $stmt = $conn->prepare("SELECT * FROM coin WHERE coin_name = ?");
            $stmt->bind_param("s", $coin_name);
            $stmt->execute();
        
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Your data retrieval
            
            ?>

            <form class="container-fluid" id="cryptoForm" action="send_coin" method="POST">
                        
                <br>
                <h4>SEND COIN TO WALLET</h4>	
                <div class="form-group row">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
                    <input type="hidden" name="coin_name" value="<?php echo $coin_name ?>">

                    <label for="network" class="col-sm-12 col-form-label">Network</label>
                    <div class="col-sm-12">
             
                     <input type="text" id="coinSelect" class="form-control"  name="coin_name" value="<?php echo $row ['coin_name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="value" class="col-sm-12 col-form-label">Enter amount in <?php echo $row ['coin_name'] ?> value</label>
                    <div class="col-sm-12">
                     <input type="number" class="form-control"  name="amount" id="amountInput" step="any" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                    <span class="input-group-btn">
                        <p id="result" style="color:green"></p>
                        <p id="usd" style="color:green"></p>
                    </span>
                </div>
                <div class="form-group row">
                    <label for="wallet" class="col-sm-12 col-form-label">Wallet Addres</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="" name="wallet" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="network" class="col-sm-12 col-form-label">Network</label>
                    <div class="col-sm-12">
                    <!-- <input type="text" class="form-control" id="fullname"  value=""> -->
                    <select name="network" id="" class="form-control">
                        <option value="bitcoin">BITCOIN</option>
                        <option value="tron">TRON</option>
                        <option value="ethereum">ETHEREUM(ERC20)</option>
                        <option value="bnb">BNB SMART CHAIN (BEP20)</option>
                    </select>
                    </div>
                </div>
                
                <input class="btn btn-dark w-100" type="submit" name="continue"  value="Continue" />
            </form>
            <script>
                  // Function to calculate price as you type
                function calculatePrice() {
                    const coinSelect = document.getElementById('coinSelect');
                    const selectedCoin = coinSelect.value;
                    const amount = document.getElementById('amountInput').value;

                    // API endpoint to get the current price of a selected coin in USD
                    const apiUrl = `https://api.coingecko.com/api/v3/simple/price?ids=${selectedCoin}&vs_currencies=usd`;

                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            const price = data[selectedCoin].usd;
                            const result = parseFloat(amount) * parseFloat(price);
                            document.getElementById('result').innerHTML = `Amount in USD: $${result.toFixed(2)}`;
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            document.getElementById('result').innerHTML = 'Error fetching data';
                        });
                }

                // Event listener for input changes
                document.getElementById('amountInput').addEventListener('input', calculatePrice);

            </script>
        
            <?php }}}?>
            <br>
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
