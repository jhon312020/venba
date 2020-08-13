@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section> 

    <!--Shopping Kart Start-->
    <div class="container py-4 shopping-kart">
         <div class="row">
           <div class="col-12 mb-3 mb-lg-5">
            <h1>Select Address</h1>
            <p>Kindly select the delivery address</p>
          </div>          
           <div class="col-12 my-3">
             <div class="progressbar-wrapper clearfix progressbar-wrapper-mob">
                <ul class="progressbar">
                  <li class="active"><span class="text">Confirm Order</span></li>
                  <li class="active"><span class="text">Select Address</span></li>
                  <li><span class="text">Payment</span></li> 
                </ul>
              </div> 
           </div>
           <div class="col-12 col-lg-6">
            <h3 class="ml-n3">Saved Addresses</h3>
            <div class="row pb-4">
              <div class="col-12 box-item pb-3 saved-address bg-white pt-3 pt-lg-5">
                <form class="form px-lg-3">
                  <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="address" name="address" class="custom-control-input">
                    <label class="custom-control-label pl-2" for="address">
                      <strong>Deepak Shrivastava</strong><br/>
                      P5A2D, La Celeste, Nethaji Street
                      Rajarajeshwari Nagar, Madanandapuram
                      Chennai, TAMIL NADU 600125, India
                      Phone number: ‪9380651595‬
                    </label>
                  </div>
                  <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="address2" name="address" class="custom-control-input">
                    <label class="custom-control-label pl-2" for="address2">
                      <strong>Deepak Shrivastava</strong><br/>
                      P5A2D, La Celeste, Nethaji Street
                      Rajarajeshwari Nagar, Madanandapuram
                      Chennai, TAMIL NADU 600125, India
                      Phone number: ‪9380651595‬
                    </label>
                  </div> 
                </form>
              </div>     
            </div>
            <h3 class="ml-n3">Add Addresses</h3>
            <div class="row pb-3">
              <div class="col-12 box-item pb-3 bg-white">
                 <form class="form text-center px-lg-3">
                  @csrf
                    <div class="form-group floating-control-group">
                      <label for="yourName">Your Name</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Your Name">
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="number">Mobile No.</label>
                      <input type="number" class="form-control" id="number" required="" placeholder="Mobile No.">
                    </div>  
                    <div class="form-group floating-control-group">
                      <label for="yourName">Address 1</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Address 1">
                    </div>
                    <div class="form-group floating-control-group">
                      <label for="yourName">Address 2</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Address 2">
                    </div>  
                    <div class="form-group floating-control-group">
                      <label for="yourName">Town/City</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Town/City">
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="yourName">State</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="State">
                    </div>   
                    <div class="form-group floating-control-group">
                      <label for="yourName">Pincode</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Pincode">
                    </div>               
                    <button class="btn btn-secondary my-4 my-lg-5">Add and Continue</button> 
                  </form>
              </div>     
            </div>
           </div>
           <div class="col-12 col-lg-6 product-cost">
            <h3>Your Cost</h3>
            <div class="box mb-3 cost-details">
              <h4>Item cost</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Item</th>
                    <th scope="col" class="text-right">Qnt</th>
                    <th scope="col" class="text-right">Cost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-none d-lg-block">1.</td>
                    <td>Philips - 31184 MEMURU</td>
                    <td class="text-right">1</td>
                    <td class="text-right">2130.00</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">2.</td>
                    <td>Hue Bridge</td>
                    <td class="text-right">1</td>
                    <td class="text-right">1100.00</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">3.</td>
                    <td>Transit</td>
                    <td class="text-right">1</td>
                    <td class="text-right">500.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box mb-3  cost-details">
              <h4>Promotion</h4>
              <div class="row promotion">
                <div class="col-12 col-lg-10">
                  <form class="form-inline">
                    <div class="form-group mb-2"> 
                      <input type="text"  class="form-control-plaintext" id="Apply" value="Enter coupon number">
                    </div> 
                    <button type="submit" class="btn btn-primary mb-2">Apply</button>
                  </form>
                </div>
                <div class="col-12 text-right col-lg-2 price">
                  <span>1100.00</span>
                </div>
              </div>
            </div>
            <div class="box mb-3  cost-details">
              <h4>Taxes & Transit</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Item</th>
                    <th scope="col" class="text-right">Rate</th>
                    <th scope="col" class="text-right">Cost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-none d-lg-block">1.</td>
                    <td>IGST</td>
                    <td class="text-right">9%</td>
                    <td class="text-right">2130.00</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">2.</td>
                    <td>SGST</td>
                    <td class="text-right">9%</td>
                    <td class="text-right">12130.00</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">3.</td>
                    <td>Transit</td>
                    <td class="text-right">1</td>
                    <td class="text-right">500.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box mb-3 cost-details g-total">              
              <div class="row">
                <div class="col">Grand Total</div>
                <div class="col text-right">Rs. 1,100.00</div>
              </div>              
            </div>
            <div class="row btns-group">
                <div class="col">
                  <button class="btn btn-secondary">Continue Shopping</button>
                </div>
                <div class="col text-right">
                  <button class="btn btn-secondary">Check Out</button>
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