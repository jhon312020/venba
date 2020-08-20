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
                  @csrf
                  @if(empty($addresses))
                  <p>No address found</p>
                  @endif
                  @foreach($addresses as $address)
                  <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="address" name="address" class="custom-control-input">
                    <label class="custom-control-label pl-2" for="address">
                      <strong>{{$address['name']}}</strong><br/>
                      {{$address['address1']. $address['address2'].
                      $address['town/city']}}, {{$address['state']. $address['pincode']}}, India
                      Phone number: ‪{{$address['mobile_no']}}
                    </label>
                  </div> 
                  @endforeach                 
                </form>
              </div>     
            </div>
            <h3 class="ml-n3">Add Addresses</h3>
            <div class="row pb-3">
              <div class="col-12 box-item pb-3 bg-white">
                 <form class="form text-center px-lg-3" method="post" action="{{route('frontview.frontend.saveaddress')}}">
                  @csrf
                    <div class="form-group floating-control-group mart">
                      <label for="yourName">Your Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" required="" value="{{old('name')}}" placeholder="Your Name">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="number">Mobile No.</label>
                      <input type="number" class="form-control @error('mob_number') is-invalid @enderror" name="mob_number" value="{{old('mob_number')}}" required="" placeholder="Mobile No.">
                      @error('mob_number')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>  
                    <div class="form-group floating-control-group">
                      <label for="yourName">Address 1</label>
                      <input type="text" class="form-control @error('addr1') is-invalid @enderror" name="addr1" required="" value="{{old('addr1')}}" placeholder="Address 1">
                      @error('addr1')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group floating-control-group">
                      <label for="yourName">Address 2</label>
                      <input type="text" class="form-control @error('addr2') is-invalid @enderror" name="addr2" required="" value="{{old('addr2')}}" placeholder="Address 2">
                      @error('addr2')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>  
                    <div class="form-group floating-control-group">
                      <label for="yourName">Town/City</label>
                      <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" required="" value="{{old('city')}}" placeholder="Town/City">
                      @error('city')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="yourName">State</label>
                      <input type="text" class="form-control @error('state') is-invalid @enderror"  name="state" required="" value="{{old('state')}}" placeholder="State">
                      @error('state')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>   
                    <div class="form-group floating-control-group">
                      <label for="yourName">Pincode</label>
                      <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{old('pincode')}}" required="" placeholder="Pincode">
                      @error('pincode')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>               
                   <!--  <button type class="btn btn-secondary my-4 my-lg-5">Add and Continue</button>  -->
                   <input type="submit" name="btnSubmit" class="btn btn-secondary my-4 my-lg-5" value="Add and Continue" />
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
                <tbody id="checkoutlist">
                  @if ($cart)
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
                @endif
                  
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
            <div class="box mb-3 cost-details">
              <h4>Taxes & Transit</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Item</th>
                    <th scope="col" class="text-right">Cost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-none d-lg-block">1.</td>
                    <td>IGST</td>
                    <td class="text-right" id="igst">{{Session::get('igst')}}</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">2.</td>
                    <td>SGST</td>
                    <td class="text-right" id = "sgst">{{Session::get('sgst')}}</td>
                  </tr>
                  <tr>
                    <td class="d-none d-lg-block">3.</td>
                    <td>Transit</td>
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
                  <a href="{{URL('payment') }}" class="btn btn-secondary">Check Out</a>
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