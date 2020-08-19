@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section> 
     
    <!--Search Start--> 
    <div class="search">
      <div class="container">
        <!--Mobile view start -->
      <div class="row top-banner-mob d-block d-lg-none">
          <div class="col-12 px-0">
            <h2><a href="#" class="back"><img src="images/back.svg" alt="Back"  /></a> Search</h2>
          </div>
        </div>
      <!--Mobile view end -->
        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2 my-3 my-lg-5 text-center"> 
            <h2 class="d-none d-lg-block">Search</h2>  
            <form class="form text-center pt-3">
              <div class="form-group floating-control-group"> 
                <input type="text" class="form-control" id="search" required="" placeholder="Type search keywords">
              </div>  
              <button class="btn btn-secondary">Search</button>                 
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Search End-->
   
   <!--Search Results start-->
   <div class="search-results">
     <div class="container">
        <div class="row">
          <div class="col-12 pb-3 text-center"> 
            <h3>5 search results for <span>“Philips”</span></h3>
            <span class="triangle"></span>
          </div> 
        </div>
      </div>
     <div class="bg-white">
        <div class="container py-3">
          <div class="row">
            <div class="col-12 py-3 col-lg-10 offset-lg-1"> 
              <div class="search-items">
                <div class="row">
                  <div class="col-12 col-lg-3 text-center">
                    <img src="images/product-img.jpg" class="product-img" alt="">
                  </div>
                  <div class="col-12 col-lg-9">
                    <h4>Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</h4>                    
                    <p class="pt-3"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>
                    
                    <div class="row">
                      <div class="col">
                        <h5 class="pt-3 price">Rs. 2,150.00</h5>  
                      </div>
                      <div class="col">
                        <button class="btn btn-secondary">Add to Kart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="search-items">
                <div class="row">
                  <div class="col-12 col-lg-3 text-center">
                    <img src="images/pdf.svg" class="product-img" alt="">
                  </div>
                  <div class="col-12 col-lg-9">
                    <h4>Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</h4>                    
                    <p class="pt-3"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>
                    
                    <div class="row">
                      <div class="col">
                        <h5 class="pt-3 price">Free</h5>  
                      </div>
                      <div class="col">
                        <button class="btn btn-secondary">Add to Kart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="search-items">
                <div class="row">
                  <div class="col-12 col-lg-3 text-center">
                    <img src="images/product-img.jpg" class="product-img" alt="">
                  </div>
                  <div class="col-12 col-lg-9">
                    <h4>Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</h4>                    
                    <p class="pt-3"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>
                    
                    <div class="row">
                      <div class="col">
                        <h5 class="pt-3 price">Rs. 2,150.00</h5>  
                      </div>
                      <div class="col">
                        <button class="btn btn-secondary">Add to Kart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="search-items">
                <div class="row">
                  <div class="col-12 col-lg-3 text-center">
                    <img src="images/pdf.svg" class="product-img" alt="">
                  </div>
                  <div class="col-12 col-lg-9">
                    <h4>Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</h4>                    
                    <p class="pt-3"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>
                    
                    <div class="row">
                      <div class="col">
                        <h5 class="pt-3 price">Free</h5>  
                      </div>
                      <div class="col">
                        <button class="btn btn-secondary">Add to Kart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-12 col-lg-10 offset-lg-1 py-lg-4">
              <nav aria-label="Page navigation" class="pagination">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><<</span> 
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><</span> 
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">>></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
   </div>
   <!--Search Results end-->

  </section>
   <!--Body Content End-->
  @endsection