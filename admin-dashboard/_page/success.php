
<?php include_once('includes/topbar.php') ?>
  
 <?php include_once('includes/sidebar.php') ?>
 <style>
    .success-box{
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
            
            ?>
            <div class='success-box' role='alert'>
                <center>
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-check2-circle text-success" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                </center>
                <br>
                <br>
                <strong class="text-danger font-size-20 text-center"><?php echo $row ['flname'] ?> balance updated successfully!!</strong> 
                <center>
                    <a href="view?userid=<?php echo $userid; ?>" style="position:relative; bottom:-50px">back to view user page</a>
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
