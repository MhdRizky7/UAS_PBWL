<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font-family -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
    
    <!-- Title of site -->
    <title>UAS PBWL</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('frontend/logo/favicon.png') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font-awesome.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <!-- Flat icon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <!-- Owl.carousel.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    
    <!-- Bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Bootsnav -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootsnav.css') }}">

    <!-- Style.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Responsive.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            min-height: 80px;
            padding: 15px;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-toggler {
            font-size: 24px;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            margin-right: 10px;
        }

        .welcome-hero,
        .about,
        .contact {
            margin-top: -30px; /* Adjust this value as needed */
        }

    /* Center the text vertically within the header-text div */
    .header-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        height: 100vh; /* This ensures that the text is centered in the viewport */
    }

    </style>
</head>
<body>
    <!-- Content from layouts.app -->
    @extends('layouts.app')

    @section('content')
        <!-- Welcome hero start -->
        <section id="welcome-hero" class="welcome-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="header-text">
                            <h2>hi <span>,</span> Welcome <br> to Your  <br> Fashion Destination <span>.</span>   </h2>
                            <p> Fashion Fusionary</p>
                           <a href="https://github.com/MhdRizky7" target="_blank">Order Now</a>
                        </div><!--/.header-text-->
                    </div><!--/.col-->
                </div><!-- /.row-->
            </div><!-- /.container-->
        </section><!--/.welcome-hero-->
        <!-- Welcome hero end -->

        <!-- Contact start -->
        <section id="contact" class="contact">
            <div class="section-heading text-center">
                <h2>Create By</h2>
			</div>
			<div class="container">
				<div class="contact-content">
					<div class="row">
						<div class="col-md-offset-1 col-md-5 col-sm-6">
							<div class="single-contact-box">
								<div class="contact-form">
									<form>
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
												  <input type="text" class="form-control" id="name" placeholder="Name*" name="name">
												</div><!--/.form-group-->
											</div><!--/.col-->
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<input type="email" class="form-control" id="email" placeholder="Email*" name="email">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<textarea class="form-control" rows="8" id="comment" placeholder="Message" ></textarea>
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="single-contact-btn">
													<a class="contact-btn" href="https://wa.me/62895807534800" role="button">submit</a>
												</div><!--/.single-single-contact-btn-->
											</div><!--/.col-->
										</div><!--/.row-->
									</form><!--/form-->
								</div><!--/.contact-form-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
						<div class="col-md-offset-1 col-md-5 col-sm-6">
							<div class="single-contact-box">
								<div class="contact-adress">
									<div class="contact-add-head">
										<h3>Muhammad Rizky Wibowo</h3>
										<p>Mahasiswa Universitas Islam Negeri Sumatera Utara</p>
									</div>
									<div class="contact-add-info">
										<div class="single-contact-add-info">
											<h3>Phone</h3>
											<p>0895807534800</p>
										</div>
										<div class="single-contact-add-info">
											<h3>Kelas</h3>
											<p>Sistem Informasi-3</p>
										</div>
										<div class="single-contact-add-info">
											<h3>Nim</h3>
											<p>0702212119</p>
										</div>
									</div>
								</div><!--/.contact-adress-->
								<div class="hm-foot-icon">
									<ul>
										<li><a href="https://www.facebook.com/profile.php?id=100054872347059&mibextid=9R9pXO"><i class="fa fa-facebook"></i></a></li><!--/li-->
										<li><a href="https://wa.me/62895807534800"><i class="fa fa-whatsapp"></i></a></li><!--/li-->
										<li><a href="https://instagram.com/_mhdrizkyy06?igshid=OGQ5ZDc2ODk2ZA=="><i class="fa fa-instagram"></i></a></li><!--/li-->
										<li><a href="https://youtube.com/@mhdrizkywibowo_?si=Q9xSb8gwSa88lV7l"><i class="fa fa-youtube"></i></a></li><!--/li-->
									</ul><!--/ul-->
								</div><!--/.hm-foot-icon-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.contact-content-->
			</div><!--/.container-->

		</section>

        <!-- Footer and copyright -->
        
        <footer id="footer-copyright" class="footer-copyright">
            <div class="container">
                <div class="hm-footer-copyright text-center">
                    <p>
                        &copy; copyright MRW. Design and developed by Muhammad Rizky Wibowo <a href="https://github.com/MhdRizky7/UAS_PBWL.git">MRIZW</a>
                    </p><!--/p-->
                </div><!--/.text-center-->
            </div><!--/.container-->
    
<div id="scroll-Top">
    <div class="return-to-top">
        <i class="fa fa-angle-up" id="scroll-top"></i>
    </div>
</div>

			</div>
        </footer><!--/.footer-copyright-->
        <!-- Footer and copyright end -->
    @endsection

    <!-- Include all js compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/progressbar.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
   

</body>
</html>
