@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section class=""> 

    <!--Shopping Kart Start-->
    <div class="container py-5 shopping-kart">
         <div class="row">
           <div class="col-12 mb-3 mb-lg-4">
            <h1>My Account</h1>
            <p>You can change profile details, saved addresses or view orders from here.</p>
          </div>
         </div>
         <div class="row my-account">
           <div class="col-12 col-lg-4 mb-4 my-profile">
              <h4 class="m-0">My Profile</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <div class="tile-box p-3 px-lg-4">
                        <div class="form">
                          <label>Your Name</label>
                          <p><strong>DEEPAK SHRIVASTAVA</strong></p>                     
                        </div>
                        <div class="form">
                          <label>Mobile No.</label>
                          <p><strong>+91 93806 51595</strong> <span><img src="frontend/images/pencil.jpg"  alt=""></span></p>                     
                        </div>
                        <div class="form">
                          <label>Email</label>
                          <p><strong>shri_deepak@hotmail.com</strong></p>                     
                        </div>
                        <div class="form">
                          <label>Password</label>
                          <p>********** <span><img src="frontend/images/pencil.jpg"  alt=""></span></p>                     
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           </div> 
           <div class="col-12 col-lg-4 mb-4 px-lg-0 my-saved-address">
              <h4>My Saved Addresses</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <div class="tile-box p-3 px-lg-4">
                        <h5>Default Address <span><img src="frontend/images/pencil.jpg"  alt=""></span></h5>
                        <p><strong>Deepak Shrivastava</strong><br/> 
      P5A2D, La Celeste, Nethaji Street<br/>
      Rajarajeshwari Nagar, Madanandapuram<br/>
      Chennai, TAMIL NADU 600125<br/>
      India<br/>
      Phone number: ‪9380651595‬</p>
                        <h5>Additional Address <span><img src="frontend/images/pencil.jpg"  alt=""></span></h5>
                        <p><strong>Rajamanickam</strong><br/>  
      B60 Housing Unit,<br/> 
      EDAPPADI, TAMIL NADU 637101<br/> 
      India<br/> 
      Phone number: ‪9965914107‬</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-12 col-lg-4 mb-4 my-orders">
              <h4>My Orders</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <div class="tile-box p-3 px-lg-4">
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3 mb-lg-4">
                          <div class="col-5">
                              <a href="#" class="order-num"># ABS3423456</a>
                          </div>
                          <div class="col-5">
                              <span>21 May 2020</span>                        
                          </div>
                          <div class="col-2">
                              <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>. . .</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item" type="button">View</button>
                                  <button class="dropdown-item" type="button">Repeat</button>
                                  <button class="dropdown-item" type="button">Invoice</button>
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
         </div>
    </div> 
    <!--Shopping Kart End-->
   
   <!--My orders start-->
   <div class="bg-white">
     <div class="container">
     <div class="row">
       <div class="col-12 my-5">
          <div class="row">
            <div class="col-12 text-center"><h2 class="h2-line mb-5">More products</h2></div>
            <div class="col-12">
              <div class="card-deck">
                <div class="card thumbnail">
                  <img src="images/product-img.jpg" class="card-img-top" alt="">
                  <div class="card-body text-center">
                    <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>
                    <h5 class="card-title">Rs. 2,150.00</h5>  
                    <p class="card-text"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>                    
                    <button class="btn btn-secondary">Add to Kart</button>
                  </div>
                </div>
                <div class="card thumbnail">
                  <img src="images/product-img.jpg" class="card-img-top" alt="">
                  <div class="card-body text-center">
                    <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>
                    <h5 class="card-title">Rs. 2,150.00</h5>  
                    <p class="card-text"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>                    
                    <button class="btn btn-secondary">Add to Kart</button>
                  </div>
                </div>
                <div class="card thumbnail">
                  <img src="images/product-img.jpg" class="card-img-top" alt="">
                  <div class="card-body text-center">
                    <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>
                    <h5 class="card-title">Rs. 2,150.00</h5>  
                    <p class="card-text"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>                    
                    <button class="btn btn-secondary">Add to Kart</button>
                  </div>
                </div>
                <div class="card thumbnail">
                  <img src="images/product-img.jpg" class="card-img-top" alt="">
                  <div class="card-body text-center">
                    <p class="card-text">Philips - 31184 MEMURU wall lamp LED white 1x14W - 1.2 mtr</p>
                    <h5 class="card-title">Rs. 2,150.00</h5>  
                    <p class="card-text"><img src="images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p>                    
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
   <!--My orders end-->

  </section>
  <!--Body Content End-->
@endsection