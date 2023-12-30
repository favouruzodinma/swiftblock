<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header("location:../../login");
  }
  require_once('../../_db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="240;url=../../login" />
    <link rel="icon" href="../../logo.png">

    <title>SwiftBlock</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">
  <style>
  .whatsapp-icon {
  position: fixed;
  bottom: 50px; /* Adjust the distance from the bottom as needed */
  left: 20px; /* Adjust the distance from the left as needed */
  z-index: 9999;
}
/* img{
  background: url('whatsapp-icon.png');
} */
.whatsapp-icon svg {
  width: 60px; /* Adjust the size of the icon as needed */
  height: auto;
  border-radius: 50%; /* Make the icon circular */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add a shadow effect */
}

</style>
  </head>
  <body class="hold-transition light-skin sidebar-mini theme-primary">
	
  <div class="wrapper">
    
  <header class="main-header">
  <div class="d-flex align-items-center logo-box justify-content-start">
      <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
          <i data-feather="menu"></i>
      </a>	
      <!-- Logo -->
      <a href="../../" class="logo">
        <!-- logo-->
        <div class="logo-lg ">
              <a href="../../">
              </a>
            <!-- <span class="light-logo"><img src="../images/logo-dark-text.png" alt="logo"></span>
            <span class="dark-logo"><img src="../images/logo-light-text.png" alt="logo"></span> -->
        </div>
        <div class="logo-lg">
          <span class="light-logo"><img id="logo" class="img-responsive" src="../../logo.png" style="width:50px ; position: absolute; bottom:15px;" alt="logo "> </span>
          <!-- <span class="dark-logo"><img id="logo" class="img-responsive  hidden-xs" src="../../logo2.png" style="width:50px ; position: absolute; bottom:15px;" alt="logo ">  -->
          </span>
      </div>
      </a>	
  </div>  
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <div class="app-menu">
      <ul class="header-megamenu nav">
          <li class="btn-group nav-item d-md-none">
              <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
                  <i data-feather="menu"></i>
              </a>
          </li>
      </ul> 
    </div>
      
    <div class="navbar-custom-menu r-side">
      <ul class="nav navbar-nav">	
        <li class="btn-group nav-item d-lg-flex d-none align-items-center">
          <p class="mb-0 text-fade pr-10 pt-5"><?php echo "Today is" . date(" D, d M Y") . "<br>";?></p>
        </li>
        <li class="btn-group nav-item d-lg-inline-flex d-none">
          <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
              <i data-feather="maximize"></i>
          </a>
        </li>
        <!-- Control Sidebar Toggle Button -->	
        <li class="btn-group nav-item d-inline-flex">
          <a href="#" data-toggle="control-sidebar" class="waves-effect waves-light nav-link full-screen" title="Setting">
              <i data-feather="settings"></i>
          </a>
        </li>	
        <!-- User Account-->
        <li class="dropdown user user-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
          </a>
          <ul class="dropdown-menu animated flipInX">
            <li class="user-body">
               <a class="dropdown-item" href="profile">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg> Profile</a>
               <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg> Settings</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power text-danger" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
              </svg> Logout</a>
            </li>
          </ul>
        </li>	
      </ul>
    </div>
  </nav>
</header>