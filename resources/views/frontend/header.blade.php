<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:39:52 GMT -->
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Mimosa-Responsive eCommerce Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css')}}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/animate.css')}}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/jquery-ui.min.css')}}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/meanmenu.min.css')}}">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/owl.carousel.css')}}">
        <!-- magnific-popup css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/magnific-popup.css')}}">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css')}}">
		<!-- ionicons.min css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/ionicons.min.css')}}">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/nivo-slider.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css')}}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ URL::asset('frontend/css/responsive.css')}}">
		<!-- modernizr css -->
        <script src="{{ URL::asset('frontend/js/vendor/modernizr.min.js')}}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper">
			<!-- header-area-start -->
			<header>
				<!-- header-top-area-start -->
				<div class="header-top-area" id="sticky-header">
					<div class="container">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-6 col-6">
								<!-- logo-area-start -->
								<div class="logo-area">
									<a href="index.html"><img src="{{URL::asset('frontend/img/logo/1.png')}}" alt="logo" /></a>
								</div>
								<!-- logo-area-end -->
							</div>
							<div class="col-xl-7 col-lg-7 d-none d-lg-block">
								<!-- menu-area-start -->
								<div class="menu-area">
									<nav>
										<ul>
											<li><a href="index.html">Concept</a>
												<!-- <ul class="sub-menu">
													<li><a href="index-2.html">Home-2</a></li>
													<li><a href="index-3.html">Home-3</a></li>
													<li><a href="index-4.html">Home-4</a></li>
													<li><a href="index-5.html">Home-5</a></li>
													<li><a href="index-6.html">Home-6</a></li>
													<li><a href="index-7.html">Home-7</a></li>
												</ul> -->
											</li>
											<li class="{{ (request()->is('productlist')) ? 'active' : '' }}"><a href="{{route('frontview.product.index')}}">Products</a>
												<!-- <ul class="mega-menu">
													<li><a href="#">Integer vestib</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">finibus iaculis</a></li>
															<li><a href="shop.html">Integer rhoncus</a></li>
															<li><a href="shop.html">purus elittincidu</a></li>
															<li><a href="shop.html">tincidunt est</a></li>
														</ul>
													</li>
													<li><a href="#">Phasellus inviv</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">Fusce eurhon</a></li>
															<li><a href="shop.html">iaculis ipsum</a></li>
															<li><a href="shop.html">ligula consectet</a></li>
															<li><a href="shop.html">vestibulum egest</a></li>
														</ul>
													</li>
													<li><a href="#">suscipit mauris</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">Integer rhoncus</a></li>
															<li><a href="shop.html">ipsum ametus</a></li>
															<li><a href="shop.html">Morbi vitae</a></li>
															<li><a href="shop.html">semper vulputate</a></li>
														</ul>
													</li>
													<li><a href="#">viverra lacus</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">Aliquam acsus</a></li>
															<li><a href="shop.html">Morbi amimi</a></li>
															<li><a href="shop.html">pretium metus</a></li>
															<li><a href="shop.html">suscipit felis</a></li>
														</ul>
													</li>
												</ul> -->
											</li>
											<li><a href="shop.html">Solutions</a>
												<!-- <ul class="mega-menu mega-menu-2">
													<li><a href="#">suscipit mauris</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">Integer rhoncus</a></li>
															<li><a href="shop.html">ipsum ametus</a></li>
															<li><a href="shop.html">Morbi vitae</a></li>
															<li><a href="shop.html">semper vulputate</a></li>
														</ul>
													</li>
													<li><a href="#">viverra lacus</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">Aliquam acsus</a></li>
															<li><a href="shop.html">Morbi amimi</a></li>
															<li><a href="shop.html">pretium metus</a></li>
															<li><a href="shop.html">suscipit felis</a></li>
														</ul>
													</li>
												</ul> -->
											</li>
											<li><a href="shop.html">Support</a>
												<!-- <ul class="mega-menu mega-menu-2">
													<li><a href="#">fermentum grav</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">arcu dignissim</a></li>
															<li><a href="shop.html">congue quamm</a></li>
															<li><a href="shop.html">necfer mentuma</a></li>
															<li><a href="shop.html">ultricies volutpat</a></li>
														</ul>
													</li>
													<li><a href="#">gravida metus</a>
														<ul class="sub-menu-2">
															<li><a href="shop.html">acaliquet orci</a></li>
															<li><a href="shop.html">dignissim placera</a></li>
															<li><a href="shop.html">risussed trist</a></li>
															<li><a href="shop.html">Utsuscipit urna</a></li>
														</ul>
													</li>
												</ul> -->
											</li>
											<li><a href="blog.html">FAQ's</a>
												<!-- <ul class="sub-menu">
													<li><a href="blog.html">blog</a></li>
													<li><a href="blog-details.html">blog details</a></li>
												</ul> -->
											</li>
											<li><a href="#">Contact US</a>
												<!-- <ul class="sub-menu">
													<li><a href="shop.html">Shop</a></li>
													<li><a href="product-details.html">product details</a></li>
													<li><a href="blog.html">blog</a></li>
													<li><a href="blog-details.html">blog details</a></li>
													<li><a href="login.html">login</a></li>
													<li><a href="register.html">register</a></li>
													<li><a href="contact.html">contact</a></li>
													<li><a href="about.html">about</a></li>
													<li><a href="cart.html">cart</a></li>
													<li><a href="checkout.html">checkout</a></li>
													<li><a href="wishlist.html">wishlist</a></li>
													<li><a href="404.html">404</a></li>
												</ul> -->
											</li>
										</ul>
									</nav>
								</div>
								<!-- menu-area-end -->
							</div>
							<!-- <div class="col-xl-3 col-lg-3 com-md-6 col-6">
								header-right-area-start
								<a href="{{ route('logout') }}">signout</a> -->
								<div class="header-right-area">
									<ul>
										<li>
											@auth
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    My Account
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <a style="padding:0px 5px !important;font-size: 13px;" class="dropdown-item" href="#">My Profile</a>
												    <a style="padding:0px 5px !important;font-size: 13px;" class="dropdown-item" href="#">My Orders</a>
												    <a style="padding:0px 5px !important;font-size: 13px;" class="dropdown-item" href="#">My WishList</a>
												    <a style="padding:0px 5px !important;font-size: 13px;" class="dropdown-item" href="{{ route('logout') }}">Signout</a>
												  </div>
												</div>


											</li>
											@endauth

											@guest
    										 <a style="font-size:16px;font-weight: bold;margin-top: -5px" href="{{ route('login') }}">Login</a>
											@endguest
										</li>
										<li><a id="show-search" href="#"><i class="icon ion-ios-search-strong"></i></a>
											<div class="search-content" id="hide-search">
												<span class="close" id="close-search">
													<i class="ion-close"></i>
												</span>
												<div class="search-text">
													<h1>Search</h1>
													<form action="#">
														<input type="text" placeholder="search"/>
														<button class="btn" type="button">
															<i class="fa fa-search"></i>
														</button>
													</form>
												</div>
											</div>
										</li>
										<!-- <li><a href="cart.html"><i class="icon ion-bag"></i></a>
											<span>2</span>
											<div class="mini-cart-sub">
												<div class="cart-product">
													<div class="single-cart">
														<div class="cart-img">
															<a href="#"><img src="img/product/1.jpg" alt="book" /></a>
														</div>
														<div class="cart-info">
															<h5><a href="#">Joust Duffle Bag</a></h5>
															<p>1 x £60.00</p>
														</div>
													</div>
													<div class="single-cart">
														<div class="cart-img">
															<a href="#"><img src="img/product/3.jpg" alt="book" /></a>
														</div>
														<div class="cart-info">
															<h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
															<p>1 x £52.00</p>
														</div>
													</div>
												</div>
												<div class="cart-totals">
													<h5>Total <span>£12.00</span></h5>
												</div>
												<div class="cart-bottom">
													<a href="checkout.html">Check out</a>
												</div>
											</div>
										</li>
										<li><a href="#" id="show-cart"><i class="icon ion-drag"></i></a>
											<div class="shapping-area" id="hide-cart">
												<div class="single-shapping mb-20">
													<span>Currency</span>
													<ul>
														<li><a href="#">€ Euro</a></li>
														<li><a href="#">£ Pound Sterling</a></li>
														<li><a href="#">$ US Dollar</a></li>
													</ul>
												</div>
												<div class="single-shapping mb-20">
													<span>Language</span>
													<ul>
														<li><a href="#"><img src="img/flag/1.jpg" alt="flag" />   English</a></li>
														<li><a href="#"><img src="img/flag/2.jpg" alt="flag" />   French</a></li>
													</ul>
												</div>
												<div class="single-shapping">
													<span>My Account</span>
													<ul>
														<li><a href="register.html">Register</a></li>
														<li><a href="login.html">Login</a></li>
													</ul>
												</div>
											</div>
										</li> -->
									</ul>
								</div>
								<!-- header-right-area-end -->
							</div>
						</div>
					</div>
				</div>
				<!-- header-top-area-end -->
				<!-- mobile-menu-area-start -->
				<div class="mobile-menu-area d-block d-lg-none clearfix">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="mobile-menu">
									<nav id="mobile-menu-active">
										<ul id="nav">
											<li><a href="index.html">Home</a>
												<ul>
													<li><a href="index-2.html">Home-2</a></li>
													<li><a href="index-3.html">Home-3</a></li>
													<li><a href="index-4.html">Home-4</a></li>
													<li><a href="index-5.html">Home-5</a></li>
													<li><a href="index-6.html">Home-6</a></li>
													<li><a href="index-7.html">Home-7</a></li>
												</ul>
											</li>
											<li><a href="shop.html">Men</a>
												<ul>
													<li><a href="shop.html">finibus iaculis</a></li>
													<li><a href="shop.html">Integer rhoncus</a></li>
													<li><a href="shop.html">purus elittincidu</a></li>
													<li><a href="shop.html">tincidunt est</a></li>
													<li><a href="shop.html">Fusce eurhon</a></li>
													<li><a href="shop.html">iaculis ipsum</a></li>
													<li><a href="shop.html">ligula consectet</a></li>
													<li><a href="shop.html">vestibulum egest</a></li>
													<li><a href="shop.html">Integer rhoncus</a></li>
													<li><a href="shop.html">ipsum ametus</a></li>
													<li><a href="shop.html">Morbi vitae</a></li>
													<li><a href="shop.html">semper vulputate</a></li>
													<li><a href="shop.html">Aliquam acsus</a></li>
													<li><a href="shop.html">Morbi amimi</a></li>
													<li><a href="shop.html">pretium metus</a></li>
													<li><a href="shop.html">suscipit felis</a></li>
												</ul>
											</li>
											<li><a href="shop.html">Accessories</a>
												<ul>
													<li><a href="shop.html">Integer rhoncus</a></li>
													<li><a href="shop.html">ipsum ametus</a></li>
													<li><a href="shop.html">Morbi vitae</a></li>
													<li><a href="shop.html">semper vulputate</a></li>
													<li><a href="shop.html">Aliquam acsus</a></li>
													<li><a href="shop.html">Morbi amimi</a></li>
													<li><a href="shop.html">pretium metus</a></li>
													<li><a href="shop.html">suscipit felis</a></li>
												</ul>
											</li>
											<li><a href="shop.html">Women</a>
												<ul>
													<li><a href="shop.html">arcu dignissim</a></li>
													<li><a href="shop.html">congue quamm</a></li>
													<li><a href="shop.html">necfer mentuma</a></li>
													<li><a href="shop.html">ultricies volutpat</a></li>
													<li><a href="shop.html">acaliquet orci</a></li>
													<li><a href="shop.html">dignissim placera</a></li>
													<li><a href="shop.html">risussed trist</a></li>
													<li><a href="shop.html">Utsuscipit urna</a></li>
												</ul>
											</li>
											<li><a href="blog.html">blog</a>
												<ul>
													<li><a href="blog.html">Blog</a></li>
													<li><a href="blog-details.html">blog details</a></li>
												</ul>
											</li>
											<li><a href="shop.html">Pages</a>
												<ul>
													<li><a href="shop.html">Shop</a></li>
													<li><a href="product-details.html">product details</a></li>
													<li><a href="blog.html">Blog</a></li>
													<li><a href="blog-details.html">blog details</a></li>
													<li><a href="about.html">About</a></li>
													<li><a href="contact.html">Contact</a></li>
													<li><a href="checkout.html">Checkout</a></li>
													<li><a href="cart.html">Cart</a></li>
													<li><a href="login.html">Login</a></li>
													<li><a href="register.html">Register</a></li>
													<li><a href="wishlist.html">Wishlist</a></li>
													<li><a href="404.html">404 Page</a></li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- mobile-menu-area-end -->
			</header>
			<!-- header-area-end -->