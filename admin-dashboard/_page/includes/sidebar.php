<?php 
	  require_once("../../_db.php");
		$userid = $_SESSION['userid'];

		// Prepare a statement
		$stmt = $conn->prepare("SELECT* FROM admin_login WHERE userid = ?");
		$stmt->bind_param("s", $userid);
		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				// Your data retrieval
		
		?>
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
	  <div class="user-profile px-20 pt-15 pb-10">
		<div class="d-flex align-items-center">	
			<div class="info">
				<a class="dropdown-toggle px-20 font-size-20" href="#"><?php echo $row["flname"] ?></a>
				
			</div>
		</div>
	  </div>
  <?php }} ?>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">		
		    <li class="treeview">
            <li><a href="dashboard"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer " viewBox="0 0 16 16">
            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
          </svg>Dashboard</a></li>
        </li>
        </li>
         <!-- --------------------------------- -->
		<li class="header">Widgets</li>
        <!-- -------------------------------- -->
		<li>
			<li><a href="user"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Total Users</a></li>
        </li>
		<li>
			<li><a href="user?status=verified"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Verified Users</a></li>
        </li>
		<li>
			<li><a href="user?status=pending"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Unverified Users</a></li>
        </li>
		<!-- <li>
			<li><a href="check"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Verify Your User</a></li>
		</li> -->
        <li>
			 <li><a href="crypto_exchange"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Crypto Exchange</a></li>
        </li>
      </ul>
    </section>
  </aside>

  