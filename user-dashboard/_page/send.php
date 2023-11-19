

<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		    <div class="box">
            <form method="POST" action="fund" class="container-fluid">
                <br>
                <h4>SEND TRON TO ALL WALLET</h4>	
                <div class="form-group row">
                    <label for="network" class="col-sm-12 col-form-label">Network</label>
                    <div class="col-sm-12">
                    <!-- <input type="text" class="form-control" id="fullname"  value=""> -->
                    <select name="network" id="" class="form-control" disabled>
                        <option value="bitcoin">BITCOIN</option>
                        <option value="ethereum">ETHEREUM</option>
                        <option value="tron">TRON</option>
                        <option value="usdt(trc20)">USDT(TRC20)</option>
                        <option value="usdt(erc20)">USDT(ERC20)</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="value" class="col-sm-12 col-form-label">Enter amount in tron value</label>
                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="" name="value" value="">
                    </div>
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
                        <option value="ethereum">ETHEREUM</option>
                        <option value="tron">TRON</option>
                        <option value="usdt(trc20)">USDT(TRC20)</option>
                        <option value="usdt(erc20)">USDT(ERC20)</option>
                    </select>
                    </div>
                </div>
                
                <button class="btn btn-dark w-100" type="submit"  name="">Continue</button>
            </form>
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
