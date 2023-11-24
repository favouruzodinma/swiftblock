<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us -SwiftBlock</title>
    <?php
include('head.php');
?>
</head>

<body>
    <!-- SVG Preloader Starts -->

    <!-- SVG Preloader Ends -->
	<!-- Live Style Switcher Starts - demo only -->
   
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <!-- Header Starts -->
        <?php
include('header.php');
        ?>
         <style>
        /* Set the size of the iframe */
        #map {
            width: 100%;
            height: 400px; /* Adjust the height as needed */
        }
    </style>
        <!-- Header Ends -->
		<!-- Banner Area Starts -->
		<section class="banner-area">
			<div class="banner-overlay">
				<div class="banner-text text-center">
					<div class="container">
						<!-- Section Title Starts -->
						<div class="row text-center">
							<div class="col-xs-12">
								<!-- Title Starts -->
								<h2 class="title-head">Our <span>Location</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="index"> home</a></li>
									<li>Location</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Starts -->
        <!-- About Section Starts -->


        <section class="location-page">
            <div class="container">
				<!-- Section Content Starts -->
                <div class="row ">
                    <!-- Image Starts -->
                    
                        <iframe id="map" frameborder="0" style="border:0"
                            src="https://yandex.com/map-widget/v1/?um=constructor%3A1f88c44b9f4a4937a61b1011b75a96bcbf7c08b58b7c7b96e6b0d7c04b4e54d1&amp;source=constructor" allowfullscreen>
                        </iframe>
                   
                </div>
                <!-- Section Content Ends -->
			</div><!--/ Content row end -->
        </section>


    
       

        <?php
include('footer.php');
        ?>
        <!-- Footer Ends -->
		<!-- Back To Top Starts  -->
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
		<!-- Back To Top Ends  -->
		
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