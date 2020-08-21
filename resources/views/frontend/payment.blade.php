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
                  <li class="active"><span class="text"><a style="color:#fff" href="{{URL('/shopping-basket')}}">Confirm Order</a></span></li>
                  @auth
                  <li class="active"><span class="text"><a style="color:#fff" href="{{URL('/address')}}">Select Address</a></span></li>
                  @endauth
                  @guest
                  <li><span class="text"><a style="color:#fff" href="#">Select Address</a></span></li>
                   @endguest 
                  <li class="active"><span class="text">Payment</span></li> 
                </ul>
              </div> 
           </div>
           
           <div class="col-12 col-lg-12 product-cost">
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
            <div class="row ">
                <div class="col">
                  <a href="#" class="btn btn-secondary">Pay Now</a>
                </div>
                
              </div>
           </div>
         </div>
    </div> 
    <!--Shopping Kart End-->
   
  

  </section>
  <!--Body Content End-->
  @endsection