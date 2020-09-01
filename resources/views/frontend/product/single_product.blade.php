@extends('frontend.layouts.app')
@section('content')
 <!--Body Content-->
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
            @if(isset($category))
              <h2>{{$category}}</h2>
            @endif
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link active" href="{{URL('/')}}">Home</a>
                <span>|</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Product</a>
                <span>|</span>
              </li>
              <li class="nav-item">                
                  <a class="nav-link" href="#" id ="categoryid">Detail</a>          
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
        @if(isset($category))
          <h2>{{$category}}</h2>
        @endif
      </div>
    </div>
    <!--Mobile view end -->
  </div>  
   
  <!--Top Banner End-->



     <!--Products Details Start-->
    <div class="bg-white pt-3 py-lg-5" id="addtocart">
      <input type="hidden" id="product_id_no" value="{{$id}}">    
      <input type="hidden" id="category" value="{{$category}}">     
      <div class="container">
        <div class="row product-details">
          <div class="col-12 col-lg-6 product-slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="row reverse-column">
                <div class="col-12 col-lg-2">
                  <ol class="carousel-indicators">
                    @php 
                    $i = 0;
                    @endphp
                    @foreach($productimages as $image)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @php if($i == 0) { echo "class='active'";}@endphp>
                      <img class="d-none d-lg-block w-100" src="{{ url('thumbnail/'.$id.'/'.$image)}}" alt="">
                    </li>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                  </ol>
                </div>
                <div class="col-12 col-lg-10 px-lg-0">
                  <div class="carousel-inner">
                    @php 
                    $i = 0;
                    @endphp
                    @foreach($productimages as $image)
                    <div @php if($i == 0) { echo "class='carousel-item active'";}else{echo "class='carousel-item'";}@endphp >
                      <img class="d-block w-100" src="{{ url('images/'.$id.'/'.$image)}}" alt="">
                    </div>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                    
                  </div>
                  <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                  <div class="row d-flex d-lg-none top-title">
                    <div class="col-6 col-lg-8 pt-2">
                      <div class="row">
                        <div class="col-12">
                          <h3>{{$brand}}</h3>
                        </div>
                        <div class="col">
                          <h3 class="border-left pl-2">CODE : CLW-14W</h3>
                        </div>
                      </div>
                    </div>
                    @if(isset(Session::get('cart')[$id]))
                    <div class="col-6 col-lg-4 px-0 d-none d-lg-block">
                      <button class="btn btn-primary">Added to Kart</button>
                    </div>
                    @else
                    <div class="col-6 col-lg-4 text-right cartmsg">
                      <button class="btn btn-secondary addcart">Add to Kart</button>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-12 col-lg-6 product-description">
            <div class="row d-none d-lg-flex">
              <div class="col-12 col-lg-8 pt-2">
                <div class="row">
                  <div class="col">
                    @if(isset($brand->name))
                    <h3>{{$brand->name}}</h3>
                    @else
                    <h3>No Brand</h3>
                    @endif
                  </div>
                  <div class="col">
                    <h3 class="border-left pl-2">{{$productdetails->product_no}}</h3>
                  </div>
                </div>
              </div>
              @if(isset(Session::get('cart')[$id]))
              <div class="col-12 col-lg-4 px-0 d-none d-lg-block">
                <button class="btn btn-primary">Added to Kart</button>
              </div>
              @else
              <div class="col-12 col-lg-4 text-right cartmsg">
                <button class="btn btn-secondary addcart">Add to Kart</button>
              </div>
              @endif
            </div>
            <div class="row">
              <div class="col-12 pt-3"><h2 id="product_name">{{$productdetails->name}}</h2></div>
            </div> 
            <div class="row">
              <div class="col-12 col-lg-8 pt-2">
                <div class="row">
                  <div class="col">
                    <h3>WARRANTY : {{$productdetails->warranty}}</h3>
                  </div>
                  <div class="col">
                    @if(isset($type))
                    <h3 class="border-left pl-2">FITTING : {{$type->name}}</h3>
                    @else
                    <h3 class="border-left pl-2">FITTING : Not available</h3>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <!--<button class="btn btn-secondary">Add to Kart</button>-->
              </div>
            </div>
            <div class="row">
              <div class="col-12 "><span class="text-small">{{$productdetails->introduction}}</span></div>
            </div>
            <div class="row mb-3">
              <div class="col-12 ">
                <h4>COLOUR :</h4>
                @if(isset($productdetails->light_color))
                <span>{{$productdetails->light_color}}</span> 
                @else
                <span>Not Available</span>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12 ">
                <h4>CONNECTIVITY</h4>
                 @if(isset($productdetails->wired_wireless))
                <span>{{$productdetails->wired_wireless}}</span> 
                @else
                <span>Not Available</span>
                @endif
              </div>
            </div>  
            <div class="row mb-3">
              <div class="col-12 ">
                <h4>POWER CONSUMPTION :</h4>
                @if(isset($powerconsumption))
                <span>{{$powerconsumption->name}}</span> 
                @else
                <span>Not Available</span>
                @endif
              </div>
            </div> 
            <div class="row mb-3">
              <div class="col-12 ">
                <h4>COMPATABILITY :</h4>
                @if(count($compatibilitylists))
                @php
                $i=1;
                @endphp
                @foreach($compatibilitylists as $item)
                <span>{{$item}}<br/>
                  @php
                  $i++;
                  @endphp
                @endforeach</span> 
                @else
                <span>Not Available</span> 
                @endif

              </div>
            </div> 
            <div class="row mb-lg-3">
              <div class="col-12 col-lg-9">
                <img class="d-block w-50" src="images/requires-a-hue-bridge.jpg" alt="">
              </div>
              
            </div>
            <div class="row">
              <div class="col-12 col-lg-4">
                <span class="price">Rs. {{$productdetails->price}}</span>
              </div>
              <div class="col-12 col-lg-8 pt-3 pt-lg-0">
                <div class="row">
                  <div class="col">
                    <button class="btn btn-secondary">Back</button>
                  </div>
                  @if(isset(Session::get('cart')[$id]))
                  <div class="col">
                    <button class="btn btn-primary">Added to Kart</button>
                  </div>
                  @else
                    <div class="col cartmsg">
                      <button class="btn btn-secondary addcart">Add to Kart</button>
                    </div>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-12 pt-3 pt-lg-5 product-features">
            <div class="row">
              <div class="col-12 col-lg-4">
                <h5>PHYSICAL SPECS</h5>
                @if(isset($productdetails->physical_spec))
                <p>
                 {!! nl2br(e($productdetails->physical_spec)) !!}
                </p> 
                @else
                <p>No Information Found</p>
                @endif
              </div>
              <div class="col-12 col-lg-4">                            
                <h5>TECHNICAL SPECS </h5>
                 @if(isset($productdetails->technical_spec)) 
                <p> {!! nl2br(e($productdetails->technical_spec)) !!}
                </p> 
                @else
                <p>No Information Available</p>
                @endif
              </div>
              <div class="col-12 col-lg-4">
                <h5>FEATURES</h5>
                <p> Color changing (LED)-Yes <br />
                    Diffused light effect-Yes<br />
                    Dimmable-Yes<br />
                    LED integrated-Yes<br />
                    Power adapter included-Yes<br />
                    Universal Plug-Yes<br />
                    ZigBee Light Link-Yes
                </p> 
              </div>
            </div>                    
          </div>
        </div>
      </div>
      <!--Products Details End-->
    </div>
    <!--Product Listing End-->
   
   <div class="container">
     <!--More Products Start-->
      <div class="row my-5">
          <div class="col-12 text-center"><h2 class="h2-line mb-5">More products</h2></div>
          <div class="col-12">
            <div class="card-deck">
              @foreach($moreproductlist as $product)  
                @php
                  $i =  $product['id']; 
                @endphp        
              <div class="card thumbnail">
                @if(isset($moreima[$i]))  
                  <img src="thumbnail/{{$i}}/{{$moreima[$i]}}" class="card-img-top" alt="">
                @else
                  <img src="" class="card-img-top" alt="">
                @endif
                <div class="card-body text-center">
                   <a id="{{$i}}"href="{{route('frontview.product.detail' , ['category' => $category ,'id' => $i])}}">
                  <p class="card-text">{{$product['name']}}</p></a>
                  <h5 class="card-title">Rs.{{$product['price']}}</h5>  
                  <p class="card-text"><img src="frontend/images/requires-a-hue-bridge.jpg" class="card-img-bot" alt=""></p> 
                  <div class="cartmsg">                   
                    <a href="{{ route('frontview.frontend.shopping-basket', ['id' => $i]) }}" class="btn btn-secondary addcart">Add to Kart</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div> 
      <!--More Products End-->
   </div>

  </section>
  <!--Body Content End-->

@endsection