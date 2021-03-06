@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section class=""> 

    <!--Shopping Kart Start-->
    <div class="container py-4 mb-lg-5 shopping-kart">
         <div class="row">
           <div class="col-12 mb-3 mb-lg-5">
            <h1>Shopping Kart</h1>
            <p>You have <strong>{{count(Session::get('cart'))}} items</strong> in your basket</p>
          </div>          
           <div class="col-12 my-3">
             <div class="progressbar-wrapper clearfix progressbar-wrapper-mob">
                <ul class="progressbar">
                  <li class="active"><span class="text">Confirm Order</span></li>
                  @auth
                  <li><span class="text"><a style="color:#fff" href="#">Select Address</a></span></li>
                  @endauth
                  @guest
                  <li><span class="text"><a style="color:#fff" href="#">Select Address</a></span></li>
                   @endguest 
                  <li><span class="text">Payment</span></li> 
                </ul>
              </div> 
           </div>
           <div class="col-12 col-lg-6 product-items">
            <h2 class="ml-n3">Your Items</h2>
            <div class="row pb-lg-3 horizantal-swipe">
              @foreach($productdet as $key => $value)              
              <div class="col-12 box-item pb-3" id="product_{{$key}}" >
                <div class="row border">  
                  @if(isset(Session::get('cart')[$key]['accessories']))
                <div class="col-12 pt-3 d-none d-lg-block">
                    <p class="toast-text">Requires Bridge, Add if you do not have one.</p>
                  </div>  
                  @endif              
                  <div class="col-4 col-lg-4">
                    @if(isset($imagearray[$key]))                    
                      <img src="/thumbnail/{{$key}}/{{$imagearray[$key][0]}}" style="position: relative;top:50px"  alt=""> 
                    @endif                   
                    </div>                    
                  <div class="col-8 col-lg-8 pt-lg-5">
                    <h4>{{$value->name}}</h4>
                    <p>Rs. {{$value->price}}</p>
                  </div>
                  <div class="col">
                    <strong class="price">Rs. {{$value->price}}</strong>
                  </div>
                  <div class="col">
                    <div class="number-counts" >
                      <div class="counts" id="{{$key}}">
                        <span class="minus updatecount" id="-1">-</span>
                        <span class="number">{{Session::get('cart')[$key]['quantity']}}</span>
                        <span class="plus updatecount" id="+1">+</span>
                      </div>
                     <!--  <input class="no_of_quantity" style="width:50px;" type="number" value="{{Session::get('cart')[$key]['quantity']}}"> --> 
                      <div class="delete" id="{{$key}}">
                        <span class="deletefromcart icon-login"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>           
              @endforeach             
            </div>
            
            
           </div>
           <div class="col-12 col-lg-6 product-cost">
            <h2>Your Cost</h2>
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
                <tbody id="checkoutlist">
                  @php
                    $i=1;
                    @endphp
                    @foreach ($cart as $key => $value)
                  <tr>
                    <td class="d-none d-lg-block">{{$i}}</td>
                    <td>{{$value['name']}}</td>
                    <td class="text-right">{{$value['quantity']}}</td>
                    <td class="text-right">{{$value['price']}}</td>
                  </tr>
                 @php $i++;
                 @endphp
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-6"></div>
              <div class="col-3">
                <p style="font-weight: bold;float: right;">Total</p>
              </div>
              <div class="col-3">
                <p style="font-weight: bold;float: right;margin-right:15px " id ="producttotal">{{Session::get('producttotal')}}</p>
              </div>
            </div>

            <!-- <div class="box mb-3 cost-details">
              <h4>Promotion</h4>
              <div class="row promotion">
                <div class="col-12 col-lg-10">
                  <form class="form-inline">
                   <!--  @csrf -->
                    <!-- <div class="form-group mb-2"> 
                      <input type="text"  class="form-control-plaintext" id="Apply" value="Enter coupon number"> -->
                     <!--  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
                    <!-- </div> 
                    <button type="submit" class="btn btn-primary mb-2">Apply</button>
                  </form>
                </div>
                <div class="col-12 text-right col-lg-2 price">
                  <span>1100.00</span>
                </div>
              </div>
            </div> --> 
            <div class="box mb-3 cost-details">
              <h4>Taxes & Transit</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Item</th>
                    <!-- <th scope="col" class="text-right">Rate</th> -->
                    <th scope="col" class="text-right">Cost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-none d-lg-block">1.</td>
                    <td>IGST</td>
                    <!-- <td class="text-right">9%</td> -->
                    <td class="text-right" id="igst">{{Session::get('igst')}}</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">2.</td>
                    <td>SGST</td>
                    <!-- <td class="text-right">9%</td> -->
                    <td class="text-right" id = "sgst">{{Session::get('sgst')}}</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">3.</td>
                    <td>Transit</td>
                   <!--  <td class="text-right">1</td> -->
                    <td class="text-right" id = "transit">{{Session::get('transit')}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box mb-3 cost-details g-total">              
              <div class="row">
                <div class="col">Grand Total</div>
                <div class="col text-right" id ="total">Rs.{{Session::get('total')}}</div>
              </div>              
            </div>
            <div class="row btns-group">
                <div class="col">
                  <a href="{{URL::previous() }}" class="btn btn-secondary">Continue Shopping</a>
                </div>
                <div class="col text-right">
                  <a href="{{URL('address') }}" class="btn btn-secondary">Check Out</a>
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