@extends('frontend.layouts.app')
@section('content')
<section> 
    <!--Product Listing Start-->    
    <!--Top Banner Start-->
    <div class="container-fluid">
      <!--Desktop view--> 
        <div class="row mb-5 top-banner d-none d-lg-flex">
          <div class="col-6 left-banner">
            <div class="products-nav">
              <h6 class="line">Products</h6>
              <div class="navigation">
                <h2>Lighting</h2>
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                    <span>|</span>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                    <span>|</span>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Lighting</a>
                  </li> 
                </ul>
              </div>
            </div>
          </div> 
          <div class="col-6 right-banner">
           <img src="{{ URL::asset('frontend/images/FOD-2.jpg')}}" alt="" />
          </div>
        </div>
        <!--Desktop view end-->
         <!--Mobile view start -->
        <div class="row top-banner-mob d-block d-lg-none">
            <div class="col-12 px-0">
              <h2>Lighting</h2>
            </div>
          </div>
        <!--Mobile view end -->
    </div>  
   
    <!--Top Banner End-->



    <!--Filter Products Start-->
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="filters">
            <div class="filter-title">
              <h4><span class="icon-back d-block d-lg-none"></span> Filters</h4>
              <div class="filter-clear d-block d-lg-none">
                <span class="text">Clear Filters</span> 
                <span class="icon-filter" onclick="myFunction()" class="filterShow">
                  <span class="count">2</span>
                </span>              
              </div>
            </div>            
            <div class="filter-items dropdown-menu" id="fillterDropdown">
              <h5>BRAND</h5>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Philips">
                <label class="custom-control-label" for="Philips">Philips</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Koogeek">
                <label class="custom-control-label" for="Koogeek">Koogeek</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Yale">
                <label class="custom-control-label" for="Yale">Yale</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="CP Van">
                <label class="custom-control-label" for="CP Van">CP Van</label>
              </div>
              <h5>TYPE</h5>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="B22">
                <label class="custom-control-label" for="B22">B22</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="E14">
                <label class="custom-control-label" for="E14">E14</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="E27">
                <label class="custom-control-label" for="E27">E27</label>
              </div> 
              <h5>COMPATABILITY</h5>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Google Home">
                <label class="custom-control-label" for="Google Home">Google Home</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Siri">
                <label class="custom-control-label" for="Siri">Siri</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Alexa">
                <label class="custom-control-label" for="Alexa">Alexa</label>
              </div> 
              <h5>COLOUR</h5>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Multi colour">
                <label class="custom-control-label" for="Multi colour">Multi colour</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Violet">
                <label class="custom-control-label" for="Violet">Violet</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="Red">
                <label class="custom-control-label" for="Red">Red</label>
              </div> 
              <div class="apply d-block d-lg-none">
                <button class="btn btn-secondary">Apply</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9 px-0">
           <div class="col-12">
            <div class="row mb-lg-5">             
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> 
            <div class="row mb-lg-5">             
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> 
            <div class="row mb-lg-5">             
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
               <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>                      
                      <div class="row">
                        <div class="col col-lg-12">
                          <p class="card-text mb-0"><img src="{{ URL::asset('frontend/images/requires-a-hue-bridge.jpg')}}" class="card-img-bot" alt=""></p>
                          <h5 class="card-title">Rs. 2,150.00</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> 

          </div>
        </div>
      </div>
    </div>
    <!--Filter Prodcuts End-->

    <!--Product Listing End-->
      
  @endsection   