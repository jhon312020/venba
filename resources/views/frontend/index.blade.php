@extends('frontend.layouts.app')
@section('content')
	<!--Body Content-->
  <section>
    <!--Home Banner Slider Start-->
    <div class="home-carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators d-none d-lg-flex">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ URL::asset('frontend/images/FOD.jpg')}}" alt="First slide">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="carousel-caption">
                      <h1>Lighting solution to match your mood…</h1>
                      <button class="btn btn-secondary">Explore</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ URL::asset('frontend/images/FOD.jpg')}}" alt="Second slide">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="carousel-caption">
                      <h1>Lighting solution to match your mood…</h1>
                      <button class="btn btn-secondary">Explore</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ URL::asset('frontend/images/FOD.jpg')}}" alt="Third slide">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="carousel-caption">
                      <h1>Lighting solution to match your mood…</h1>
                      <button class="btn btn-secondary">Explore</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <!--Home Banner Slider End-->

    <!--Connected Homes Start-->
    <div class="container py-5">
        <div class="row">
          <div class="col text-center connected-homes">
            <h2 class="h2-line mb-4 mb-lg-5">Connected Homes</h2>
            <div class="row">
              <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                  <div class="col-12 col-lg-4">
                    <span class="icon-login"></span>
                    <h3>Control Everything at Your Fingertips</h3>
                    <p>Turn on your lights, play your favourite music or change your room temperature, at the tap of your smartphone.</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <span class="icon-login"></span>
                    <h3>Run Personalized Schedules</h3>
                    <p>Have your coffee ready when you wake up. Automatically turn everything off when you leave for work. Experience true intelligence.</p>
                  </div>
                  <div class="col-12 col-lg-4">
                    <span class="icon-login"></span>
                    <h3>Talk to Your Home or Make it Talk.</h3>
                    <p>Simply talk to your virtual voice assistant, and ask it to do anything for you– be it ordering groceries to solving a math problem.</p>
                  </div>
                </div>
              </div> 
            </div>
            <button class="btn btn-secondary mt-lg-3">Benefits</button>
          </div>
        </div>
    </div> 
    <!--Connected Homes End-->

    <!--Sliding Slider Start-->
    <div class="container-fluid horizantal-slider">
         <div class="flex-container">
              <div class="spinner"><p>
                <div class="cube1"></div>
                <div class="cube2"></div>
                Loading...
                </p>
              </div>
              <div class="flex-slide about slider-1">
                <div class="flex-top-title">VENBA CONCEPTS</div>
                <div class="flex-title">SECURE LIVING</div>
                <div class="flex-about"><button class="btn btn-secondary">Explore</button></div>
              </div>
              <div class="flex-slide about slider-2">
                <div class="flex-top-title">VENBA CONCEPTS</div>
                <div class="flex-title">LIGHTING SCAPES</div>
                <div class="flex-about"><button class="btn btn-secondary">Explore</button></div>
              </div>
              <div class="flex-slide price slider-3">
                <div class="flex-top-title">VENBA CONCEPTS</div>
                <div class="flex-title">COMFORT</div>
                <div class="flex-about"><button class="btn btn-secondary">Explore</button>  
                </div>
              </div>
              <div class="flex-slide contact slider-4">
                <div class="flex-top-title">VENBA CONCEPTS</div>
                <div class="flex-title">ENTERTAINMENT</div>
                    <div class="flex-about"><button class="btn btn-secondary">Explore</button></div>
              </div>
            </div>

          </div>
    </div> 
    <!--Sliding Slider End-->

    <!--Seeing is believing Start-->
    <div class="seeing-believing">
      <div class="container py-5">
          <div class="row">
            <div class="col text-center connected-homes">
              <h2 class="h2-line mb-4 mb-lg-5">Seeing is believing</h2>
              <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1">
                  <div class="row">
                    <div class="col-12 virtual-demo">                    
                      <p>See our virtual demo, anytime, anywhere.</p>
                    </div> 
                  </div>
                </div> 
              </div>
              <button class="btn btn-secondary mt-5 mt-lg-5">Virtual demo</button>
            </div>
          </div>
      </div> 
    </div>
    <!--Seeing is believing End-->

    <!--Hover Box Start-->
    <div class="container-fluid hover-box">
        <div class="row">
          <div class="col d-none d-lg-block">
            <!-- Desktop view -->
            <ul>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-01.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>Lights</p>
                    <a href="{{URL('/products', 'Lighting' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-02.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>Security</p>
                    <a href="{{URL('/products', 'Security' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-03.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>IR Devices</p>
                    <a href="{{URL('/products', 'IR Device' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-04.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>Music</p>
                    <a href="{{URL('/products', 'Music' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-05.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>Curtain Controls</p>
                    <a href="{{URL('/products', 'Curtain control' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
              <li>
                <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-06.jpg')}}" alt="">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <h5 class="line">Products</h5>
                    <p>Accessories</p>
                    <a  href="{{URL('/products', 'Accessories' )}}" class="btn">Shop now!</a>
                  </div>
                </div>
              </li>
            </ul>
            <!-- Desktop view -->
          </div>
        </div>
        <div class="row">
          <div class="col d-block d-lg-none">
            <!--Hover box Slider Start-->
            <!-- Mobile view -->
            <div class="hover-box-carousel">
              <div id="hoverBoxIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators d-none">
                    <li data-target="#hoverBoxIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#hoverBoxIndicators" data-slide-to="1"></li>
                    <li data-target="#hoverBoxIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <h5 class="line">Products</h5>
                    <div class="carousel-item active">                      
                      <p>Lights</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-01.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                      <p>Security</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-02.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                      <p>IR Devices</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-03.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                      <p>Music</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-04.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                      <p>Curtain Controls</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-05.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                      <p>Accessories</p>
                      <img class="d-block w-100" src="{{ URL::asset('frontend/images/product-06.jpg')}}" alt="">
                      <div class="caption">
                        <div class="caption-text">
                          <button class="btn">Shop now!</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#hoverBoxIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#hoverBoxIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <!-- Mobile view -->
            <!---Hover box Slider End-->
          </div>
        </div>
    </div> 
    <!--Hover Box End-->

    <!--Best in class products! Start-->
    <div class="best-products">
      <div class="container py-5">
          <div class="row">
            <div class="col text-center connected-homes">
              <h2 class="h2-line mb-4 mb-lg-5">Best in class products!</h2>
              <div class="row">
                <div class="col-12 mt-4 d-none d-lg-block">
                  <div class="row">
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/hue_logo.jpg')}}" alt="">
                    </div> 
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/sonos.jpg')}}" alt="">
                    </div> 
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/zemote.jpg')}}" alt="">
                    </div> 
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/fibaro.jpg')}}" alt="">
                    </div> 
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/Yale_Locks_Logo.jpg')}}" alt="">
                    </div> 
                    <div class="col-12 col-lg-2 d-flex align-items-center">                    
                      <img class="img-fluid" src="{{ URL::asset('frontend/images/panasonic.jpg')}}" alt="">
                    </div> 
                  </div>
                </div> 
                <div class="col-12 d-block d-lg-none">
                  <!--Clients Slider Start-->
                  <!-- Mobile view -->
                  <div class="clients-carousel">
                    <div id="clientsIndicators" class="carousel slide"  data-ride="carousel" data-touch=”true”>
                        <ol class="carousel-indicators d-none">
                          <li data-target="#clientsIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#clientsIndicators" data-slide-to="1"></li>
                          <li data-target="#clientsIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">                    
                          <div class="carousel-item active">
                              <div class="row">
                                <div class="col d-flex align-items-center">
                                  <img class="img-fluid" src="{{ URL::asset('frontend/images/hue_logo.jpg')}}" alt="">
                                </div>
                                <div class="col d-flex align-items-center">
                                  <img class="img-fluid" src="{{ URL::asset('frontend/images/sonos.jpg')}}" alt="">
                                </div>
                                <div class="col d-flex align-items-center">
                                  <img class="img-fluid" src="{{ URL::asset('frontend/images/panasonic.jpg')}}" alt="">
                                </div>
                              </div>
                          </div>
                          <div class="carousel-item">                      
                              <div class="row">
                                  <div class="col d-flex align-items-center">
                                    <img class="img-fluid" src="{{ URL::asset('frontend/images/fibaro.jpg')}}" alt="">
                                  </div>
                                  <div class="col d-flex align-items-center mx-3">
                                    <img class="img-fluid" src="{{ URL::asset('frontend/images/Yale_Locks_Logo.jpg')}}" alt="">
                                  </div>
                                  <div class="col d-flex align-items-center">
                                    <img class="img-fluid" src="{{ URL::asset('frontend/images/zemote.jpg')}}" alt="">
                                  </div>
                                </div>
                          </div>  
                        </div>
                        <a class="carousel-control-prev d-none" href="#clientsIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next d-none" href="#clientsIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                  </div>
                  <!-- Mobile view -->
                  <!---Clients Slider End-->
            </div> 
              </div>             
            </div>
          </div>
      </div> 
    </div>
    <!--Best in class products! End-->

    <!--We have packed a smart home! Start-->
    <div class="container-fluid package-type mb-2">
        <div class="row py-5">
          <div class="col-12 col-lg-10 offset-lg-1 text-center pb-3 pb-lg-5"><h2 class="m-0">We have packed a smart home!</h2></div>
          <div class="col-12 col-lg-10 offset-lg-1 mb-5 d-none d-lg-block">    
            <div class="card-deck">
              <div class="card">                
                <div class="card-body">
                  <div class="inner-box">
                    <h3 class="card-title line ">Venba Basic</h3>
                    <p class="card-text">Ideal for 3 or 4 BHK houses with basic light, audio and door controls</p>
                  </div>                  
                </div>
              </div>
              <div class="card">               
                <div class="card-body">
                  <div class="inner-box">
                    <h3 class="card-title line">Venba Advanced</h3>
                    <p class="card-text">Ideal for 3 or 4 BHK houses with basic light, audio and door controls</p>
                  </div>
                </div>
              </div>
              <div class="card">                
                <div class="card-body">
                  <div class="inner-box">
                    <h3 class="card-title line">Venba Premium</h3>
                    <p class="card-text">Ideal for independent and large houses with advanced ight, audio and door controls</p>
                  </div>
                </div>
              </div>
            </div>    
          </div> 
           <div class="col d-block d-lg-none">
            <!--Box Slider Start-->
            <!-- Mobile view -->
            <div class="box-carousel">
              <div id="BoxIndicators" class="carousel slide"  data-ride="carousel" data-touch=”true”>
                  <ol class="carousel-indicators d-none">
                    <li data-target="#BoxIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#BoxIndicators" data-slide-to="1"></li>
                    <li data-target="#BoxIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">                    
                    <div class="carousel-item active">                      
                       <div class="card">                
                        <div class="card-body">
                          <div class="inner-box">
                            <h3 class="card-title line ">Venba Basic</h3>
                            <p class="card-text">Ideal for 3 or 4 BHK houses with basic light, audio and door controls</p>
                          </div>                  
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                       <div class="card">               
                        <div class="card-body">
                          <div class="inner-box">
                            <h3 class="card-title line">Venba Advanced</h3>
                            <p class="card-text">Ideal for 3 or 4 BHK houses with basic light, audio and door controls</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">                      
                       <div class="card">                
                        <div class="card-body">
                          <div class="inner-box">
                            <h3 class="card-title line">Venba Premium</h3>
                            <p class="card-text">Ideal for independent and large houses with advanced ight, audio and door controls</p>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <a class="carousel-control-prev" href="#BoxIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#BoxIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <!-- Mobile view -->
            <!---Box Slider End-->
          </div> 
          <div class="col-12 text-center mt-4 mt-lg-0">
            <button class="btn btn-secondary">Take me through…</button>
          </div>        
        </div> 
    </div> 
    <!--We have packed a smart home! End-->

  </section>
  <!--Body Content End-->
	@endsection		
  @section('belowscript')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/2.4.0/jquery.waitforimages.min.js'></script>
    <script  src="{{ URL::asset('frontend/js/function.js')}}"></script>
@endsection
