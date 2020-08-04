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
                <h2>{{$category}}</h2>
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
                    <a class="nav-link" href="#" id ="categoryid">{{$category}}</a>
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
              <h2>{{$category}}</h2>
            </div>
          </div>
        <!--Mobile view end -->
    </div>  
   
    <!--Top Banner End-->



    <!--Filter Products Start-->
    <div class="container">
      <div class="row" id="filterlist">
        <div class="col-12 col-lg-3">
          <div class="filters checkbox-choices">
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
              @foreach($brandlist as $brand)
              <div id="{{$category}}" class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="{{$brand->name}}" name="brand_{{$brand->id}}" value="{{$brand->name}}">
                <label class="custom-control-label" for="{{$brand->name}}">
                  {{$brand->name}}</label>
              </div>
              @endforeach              
              <h5>TYPE</h5>
              @foreach($typelist as $type)
              <div class="custom-control custom-checkbox type">
                <input type="checkbox" class=" custom-control-input" id="{{$type->name}}" name="type_{{$type->id}}" value="{{$type->name}}">
                <label class="custom-control-label" for="{{$type->name}}">{{$type->name}}</label>
              </div>
              @endforeach              
              <h5>COMPATABILITY</h5>
              @foreach($compatibilitylist as $compatibility)
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="{{$compatibility->name}}" name="compatibility_{{$compatibility->id}}" value="{{$compatibility->name}}">
                <label class="custom-control-label" for="{{$compatibility->name}}">{{$compatibility->name}}</label>
              </div>
              @endforeach              
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
            <div class="row mb-lg-5 productlist"> 
             @foreach($productlist as $product)            
              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="card">
                    <img src="{{ URL::asset('frontend/images/product-img.jpg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                      <p class="card-text">{{$product->name}}</p>                      
                      <div class="row">                   
                        <div class="col col-lg-12">
                          <p class="card-text mb-0">{{$product->accessories_required}}</p>
                          <h5 class="card-title">Rs.{{$product->price}}</h5>
                        </div>
                        <div class="col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              @endforeach             
            </div> 

          </div>
        </div>
      </div>
    </div>
    <!--Filter Prodcuts End-->

    <!--Product Listing End-->
	@endsection		
