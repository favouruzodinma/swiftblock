<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if (isset($_SESSION['user'])) {
	header("location:user-dashboard/_page/dashboard");
  }
?>
<head>

    <meta charset="utf-8" />
    <title>Login - SwiftBlock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./logo.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skins/orange.css">
	
	<!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="orange" href="css/skins/orange.css" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="css/skins/green.css" />
    <link rel="alternate stylesheet" type="text/css" title="blue" href="css/skins/blue.css" />
    <link rel="stylesheet" type="text/css" href="css/styleswitcher.css" />

    <!-- Template JS Files -->
    <script src="js/modernizr.js"></script>

</head>
<?php
	// if(isset($_POST['login'])){
	// $email = $_POST["email"];
	// $password = $_POST["password"];
	// require_once('_db.php');
	// $sql = "SELECT * FROM user_login WHERE email='$email' ";
	// $result = mysqli_query($conn, $sql);
	// $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// if($user){
	// 	$_SESSION['userid'] = $row['userid'];
	// 	if(password_verify($password, $user["password"])){
	// 		session_start();
	// 		$_SESSION['user']='yes';
	// 		header("location:user-dashboard/_page/dashboard");
	// 		exit;
	// 	}else{
	// 		echo"
	// 		<div class='alert alert-danger' role='alert'>
	// 		<strong> Password does not match this email address!!</strong> 
	// 		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	// 			<span aria-hidden='true'>&times;</span>
	// 		</button>
	// 		</div>";
	// 	}
	// }else{
	// 	echo"
	// 	<div class='alert alert-danger' role='alert'>
	// 	<strong>Invalid Email or Password submitted!!</strong> 
	// 	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	// 		<span aria-hidden='true'>&times;</span>
	// 	</button>
	// 	</div>";
	// }
	// }
?>
<?php
require_once('_db.php'); // Your database connection script

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_login WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['userid'];
			$_SESSION['user'] = 'yes';
            header("Location: user-dashboard/_page/dashboard");
            exit;
        } else {
            $error = "
            <div class='' role='alert'>
                <strong>Password does not match this email address!</strong> 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    } else {
        $error = "
        <div class='' role='alert'>
            <strong>Invalid Email or Password submitted!</strong> 
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
}
?>



<body class="auth-page">
    <!-- SVG Preloader Starts -->

    <!-- SVG Preloader Ends -->
	<!-- Live Style Switcher Starts - demo only -->
  
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="index">
					<img id="logo-user" class="img-responsive" src="logo2.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<!-- Slider Starts -->
				<div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Indicators Starts -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-testimonials" data-slide-to="1"></li>
						<li data-target="#carousel-testimonials" data-slide-to="2"></li>
					</ol>
					<!-- Indicators Ends -->
					<!-- Carousel Inner Starts -->
					<div class="carousel-inner">
						<!-- Carousel Item Starts -->
						<div class="item active item-1">
							<div>
								<blockquote>
									<p>This is a realistic program for anyone looking for site to invest. Paid to me regularly, keep up good work!</p>
									<footer><span>Lucy Smith</span>, England</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-2">
							<div>
								<blockquote>
									<p>Bitcoin doubled in 7 days. You should not expect anything more. Excellent customer service!</p>
									<footer><span>Slim Hamdi</span>, South Africa</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-3">
							<div>
								<blockquote>
									<p>My family and me want to thank you for helping us find a great opportunity to make money online. Very happy with how things are going!</p>
									<footer><span>Rawia Chniti</span>, Nigeria</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
					</div>
					<!-- Carousel Inner Ends -->
				</div>
				<!-- Slider Ends -->
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="index">
					<img id="logo" class="img-responsive mobile-logo" src="logo2.png" alt="logo" style="width:50%">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head hidden-xs">member <span>login</span></h2>
							 <p class="info-form">Send, receive and securely store your coins in your wallet</p>

						</div>
						<!-- Section Title Ends -->
						<!-- php code for login to user dashboard  -->
						
						<!-- end of php code  -->
						<!-- Form Starts -->
						<form action="login" method="POST">
							<!-- error message validation  -->
							<?php if (isset($error)) : ?>
								<div class="alert alert-danger"><?php echo $error; ?></div>
							<?php endif; ?>
							<!-- end of error message  -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="login">login</button>
								<p class="text-center">don't have an account ? <a href="signup">register now</a>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Copyright Text Starts -->
				<p class="text-center copyright-text">Copyright © 2018 - <?php  echo date("Y");  ?> SwiftBlock All Rights Reserved</p>
				<!-- Copyright Text Ends -->
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>