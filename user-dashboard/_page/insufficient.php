
<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
 <style>
    .error-box{
        height: 40vh;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
 </style>
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
            <div class='error-box' role='alert'>
                <center>
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-x-circle text-warning" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
                </center>
                <br>
                <br>
                <strong class="text-danger font-size-20 text-center">Insufficient Balance!!</strong> 
                <center>
                    <a href="send.php?status=<?php echo $coin_name; ?>&userid=<?php echo $userid; ?>" style="position:relative; bottom:-50px">back to send page</a>
                </center>
            </div>
            <?php }}}?>
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
