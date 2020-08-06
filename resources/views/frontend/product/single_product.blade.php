@extends('frontend.layouts.app')
@section('content')
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
            @else 
              <h2>Lighting</h2>
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
        @else 
          <h2>Lighting</h2>
        @endif
      </div>
    </div>
    <!--Mobile view end -->
  </div>  
   
  <!--Top Banner End-->
 <div class="container-fluid">
  <div class="row">
    <div class="col-6">
     	<div style=" border:1px solid black; padding:50px;margin-left: 50px">
      <img src="/images/{{$id}}/{{$productimages[0]}}">
      </div>
      <div class="display-flex" style="position: relative;left:20%;top:10px">
      	@foreach ($productimages as $image)
      		<img style="width:80px;height:80px" src="/images/{{$id}}/{{$image}}">
     		 @endforeach
     </div>
    </div>
    <div class="col-6" id="addtocart">
    	<input type="hidden" id="product_id_no" value="{{$id}}">
    	<input type="hidden" id="category" value="{{$category}}">
    	<h3 id="product_name">{{$productdetails->name}}</h3>
    	<p>Product no:{{$productdetails->material_no}}</p>
    	<br>    
    	<p style="font-weight:bold">{{$productdetails->accessories_required}}</p>
    	<hr>
    	<span>
    	<input id="no_of_quantity" style="width:50px;" type="number" placeholder="1">
    	<span id="addcart" class="icon-Cart" style="margin-left:100px"></span>
    	</span>
    	<hr>
    	<div id="message"></div>
    	<p>{{$productdetails->introduction}}</p>
    	<div style="display:inline-flex">
    		<div>
    			<h5>Power Consumption</h5>
    			@if(isset($powerconsumption))
   		 		<p>{{$powerconsumption->name}}</p>
   		 		@else
   		 		<p></p>
   		 		@endif
   			</div>
    		<div>
    			<div style="margin-left:100px">
    				<h5>Connectivity</h5>
    				<p>{{$productdetails->wired_wireless}}</p>
    			</div>
    		</div>
  		</div>
  		<div style="display:flex">
  			<p style="width:40%">Technical Specification</p>
  			<p id="tech"  style="position:relative;left:50%">+</p>
  		</div>
  		<div id="tech_spec" style="background:#eee">
  			<p>{!! nl2br(e($productdetails->technical_spec)) !!}</p>
			</div>
			<div style="display:flex">
  			<p style="width:40%">Compatibility</p>
  			<p id="comp"  style="position:relative;left:50%">+</p>
  		</div>
  		<div id="compatibility" style="background:#eee">
  			<p>{{$compatibility->name}}</p>
			</div>
			<div style="display:flex">
  			<p style="width:40%">Warranty</p>
  			<p id="warranty"  style="position:relative;left:50%">+</p>
  		</div>
  		<div id="warranty_detail" style="background:#eee">
  			<p>{{$productdetails->warranty}}</p>
			</div>
			<div style="display:flex">
  			<p style="width:40%">Physical Specification</p>
  			<p id="phy"  style="position:relative;left:50%">+</p>
  		</div>
  		<div id="phy_spec" style="background:#eee">
  			<p>{!! nl2br(e($productdetails->physical_spec)) !!}</p>
			</div>
		</div>
	</div>

@endsection