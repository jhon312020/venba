<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Venba</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="styles/css/bootstrap.min.css">-->
  <!--<link rel="stylesheet" href="node_modules/scss/bootstrap.scss">-->
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ URL::asset('frontend/styles/css/main.css')}}">
  <!-- Fav Icons -->

  <!--<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">-->
  

</head>

<body >
  <!--Header-->
  <header class="header sticky fixed-top">    
      <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">
        <div class="container"> 
            <a class="navbar-brand col-3 col-lg-2 pr-0 px-lg-0 my-2 order-1 order-lg-1" href="{{URL('/')}}"><img class="img-fluid logo" src="{{ URL::asset('frontend/images/logo.jpg')}}" alt="Venba" title="Venba" /></a>
            <div class="col-6 col-lg-3 order-2 order-lg-3 text-right top-icons">
              <div class="row">
                @auth
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/my_profile') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ url('/my_orders') }}">My Orders</a>
                    <a class="dropdown-item" href="{{ url('/my_wishlist') }}">My Wish List</a>
                    <a class="dropdown-item" href="{{ route('logout')}}">SignOut</a>
                  </div>
                </div>
               @endauth
                @guest
                  <div class="col text-center pTop">
                    <span class="icon-login"></span>
                    <!-- <p data-toggle="modal" data-target="#createAccount">Login</p> --> 
                    <a  href="{{ route('login')}}"><p>Login</p></a>
                  </div>
                @endguest
                <div class="col text-center pTop">                 
                  <span class="icon-Cart"></span>
                  @if(session()->has('cart'))
                   <span class="count">3</span>
                  @endif
                  <p>Cart</p>                 
                </div>
                <div class="col text-center pTop">
                  <span class="icon-Search"></span>
                  <p>Search</p>                 
                </div>
              </div>
            </div>
            <button class="navbar-toggler col-2 order-3 " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> 
            
        <div class="collapse navbar-collapse col-lg-7 pl-lg-0 order-lg-2" id="navbarSupportedContent">
          <ul class="navbar-nav "> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="concepts.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Concepts<span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Lighting Scapes</a>
                <a class="dropdown-item" href="#">Secure Living</a> 
                <a class="dropdown-item" href="#">Entertainment</a>
                <a class="dropdown-item" href="#">Comfort</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <a class="dropdown-item" href="{{URL('/products', $category->name )}}" id="{{$category->id}}">{{$category->name}}</a>
                @endforeach
              </div>
            </li> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="solutions.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Solutions
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/basic_solution') }}">Basic</a>
                <a class="dropdown-item" href="{{ url('/advanced_solution') }}">Advanced</a> 
                <a class="dropdown-item" href="{{ url('/premium_solution') }}">Premium</a>
              </div>
            </li> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="support.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Support
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/installation_guide') }}">Installation guides</a>
                <a class="dropdown-item" href="{{ url('/trouble_shooting') }}">Trouble shooting</a> 
                <a class="dropdown-item" href="{{ url('/online_support') }}">Online support</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/faq') }}">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
            </li>
          </ul>           
          </div>
          
        </div>
      </nav>    
  </header>
  <!--Header End-->
  @yield('content')
  <!--Footer-->
  <footer class="footer">
    <div class="container">
      <div class="row d-none d-lg-flex">
        <div class="col-12 col-lg-4">
          <h5 class="line">About Venba</h5>
          <p>Venba Tech is a design, engineering and project management firm in the arena of extra low voltage systems (ELV).</p>
          <h6>Mission</h6>
          <p>“To be recognized as a company that is building innovative, integrated and pragmatic technology solutions and while delivering them, fulfils its promise and sustains longer term value for its customers.”</p>
          <h6>Vision</h6> 
          <p>“To positively impact the embryonic development of the new concept of living/working; by improving productivity and enhancing lifestyle of the evolving community  along with contributing crucially to the energy conservation.”</p>
        </div>
        <div class="col-12 col-lg-4">
          <div class="row">
            <div class="col-12"><h5 class="line">Links</h5></div>            
            <div class="col-6">
              <h6>Concepts</h6> 
              <a href="#">Lighting scapes</a>
              <a href="#">Secure living</a>
              <a href="#">Power ecomony</a>
              <a href="#">Breathing spaces</a>
              <a href="#">Music sphere</a>
              <h6 class="mt-4">Products</h6> 
              <a href="#">Lights</a>
              <a href="#">Doors/window</a>
              <a href="#">Sound control</a>
              <a href="#">Sensors</a>
              <a href="#">Appliances control</a>
              <a href="#">Accessories</a>
            </div>
            <div class="col-6">
              <h6>Packages</h6> 
              <a href="#">Basic</a>
              <a href="#">Advanced</a>
              <a href="#">Premium</a> 
              <h6 class="mt-4">Shopping</h6>  
              <h6 class="mt-4">Support</h6> 
              <a href="#">Installation guides</a>
              <a href="#">Trouble shooting</a>
              <a href="#">Online support</a> 
              <h6 class="mt-4">FAQs</h6>  
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 contact-us">
          <h5 class="line">Contact us</h5>
          <ul>
            <li>
              <span class="icon-Location"></span>
              <div class="right-txt">
                <strong>Registered Office</strong> <br> 27, 1st floor, Shafee Mohammad road
                Nungambakkam, Chennai 600 006.
              </div>
            </li>
            <li>
              <span class="icon-Phone"></span>
              <div class="txt-vertical">
               +91 (44) 28290898
              </div>
              </li>
            <li>
              <span class="icon-Mail"></span>
              <div class="txt-vertical">
               reachme@venbahomeautomation.in
              </div>
            </li>
            <li>
              <span class="icon-Social"></span>
              <div class="txt-vertical">
               reachme@venbahomeautomation.in
              </div>
            </li>
            <li>
              <span class="icon-pay"></span>
              <div class="txt-vertical">
                <img src="{{ URL::asset('frontend/images/net-banking.png')}}" alt="Net banking" />
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!--Mobile view-->     
      <div class="row footer-mob d-block d-lg-none">
        <div class="col-12">
          <ul class="nav flex-column text-center">
            <li class="nav-item">
              <a class="nav-link active" href="#">About Venba</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Site Map</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li> 
          </ul>
        </div>
      </div>    
    <!--Mobile view end-->
    </div>
    
  </footer>
  <div class="copy-right">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-left">(C) Venba Technologies</div>
        <div class="col-12 col-lg-6 text-center text-lg-right">Powered by Orange Dots</div>
      </div>
    </div>
  </div>
  <!--Footer End-->
  @yield('belowfooter')
  <script src="{{ URL::asset('frontend/js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('frontend/js/bootstrap.min.js')}}"></script>
  <script   src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>  
  <script src="{{ URL::asset('frontend/js/common.js')}}"></script> 
  <script src="{{ URL::asset('frontend/js/floating.labels.js')}}"></script>
  <script src="{{ URL::asset('js/frontend.js')}}"></script>
  <script>
    $('.form-group').floatingLabel({
      floatingLabelClass: 'floating-label',
      floatingLabelOnClass: 'floating-label-on',
      floatingInputClass: 'floating-input'
    });
  </script>
</body>

</html>