@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section> 

    <!--My Orders Start-->
    <div class="container py-4 my-orders">
        <div class="row">
          <div class="col-12 mb-3 mb-lg-5">
            <h1>My Orders</h1>
            <p>Your orders from the last 12 months will be displayed here</p>
          </div>
          @php
          $i = 1;
          @endphp
          @foreach($allorders as $order)
          <div class="col-12 mb-3 mb-lg-5">
            <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}" @php if($i == 1) {echo "aria-expanded='true'";} else{echo "aria-expanded='false'";}@endphp aria-controls="collapseOne{{$i}}">
                    Order# : ABS{{$order['id']}}<br/>
                    Order Date : {{$order['order_date']}}
                    <span class="arrow"></span>
                  </button>
                </h2>
              </div>

              <div id="collapseOne{{$i}}" class="collapse @php if($i == 1) {echo "show";}@endphp" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body px-0 py-3 py-lg-5">
                 
                  <div class="row">
                    <div class="col-12 col-lg-8 mb-3">
                       @foreach($order['suborders'] as $product)
                      <div class="row mb-3">
                        <div class="col-12 col-lg-2 text-center">
                          <img src="frontend/thumbnail/".{{$product['image']}}   alt="">
                        </div>
                        <div class="col-12 col-lg-7 text-left pt-lg-4">
                          <h4 id="product_name">{{$product['name']}}</h4>
                          <p>Rs. {{$product['price']}}</p>
                        </div> 
                        @if(isset(Session::get('cart')[$product['id']]))
                          <div class="col-12 col-lg-3 px-0 d-none d-lg-block">
                            <button class="btn btn-primary">Added to Kart</button>
                          </div>
                        @else
                          <div class="col-12 col-lg-3 align-items-center d-flex ordertocart" id="ordertocart{{$product['id']}}">                   
                            <button class="btn btn-secondary addcart">Add to Kart</button>                        
                          </div>
                        @endif
                      </div>
                      @endforeach
                    </div>
                    <div class="col-12 col-lg-4">
                      <div class="row">
                        <div class="col-12" id="{{$order['id']}}">
                          <button class="btn btn-secondary btn-light mb-3 repeat_order" id="repeat_order{{$order['id']}}">Repeat Order</button>
                        </div>
                        <div class="col-12 " id="{{$order['id']}}">
                          <a href = "{{route('frontview.frontend.downloadinvoice' , ['orderid' => $order['id']])}}" class="btn btn-secondary btn-light mb-3 download_invoice" target="_blank" >Download Invoice</a>
                        </div>
                        <div class="col-12"><a href="{{URL('contact') }}" class="btn btn-secondary btn-light mb-3">Feedback</a>
                        </div>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          </div> 
          @php
          $i++;
          @endphp 
          @endforeach         
        </div>
    </div> 
    <!--My Orders End-->
   

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