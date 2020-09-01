@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
  <section id="search_resultss"> 
     
    <!--Search Start--> 
    <div class="search">
      <div class="container">
        <!--Mobile view start -->
      <div class="row top-banner-mob d-block d-lg-none">
          <div class="col-12 px-0">
            <h2><a href="#" class="back"><img src="frontend/images/back.svg" alt="Back"  /></a> Search</h2>
          </div>
        </div>
      <!--Mobile view end -->
        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2 my-3 my-lg-5 text-center"> 
            <h2 class="d-none d-lg-block">Search</h2>  
            <form class="form text-center pt-3">
              @csrf
              <div class="form-group floating-control-group"> 
                <input type="text" class="form-control" name ="search_value" id="search_value" required="" placeholder="Type search keywords">
              </div>  
              <button id="search_button" type="submit" class="btn btn-secondary">Search</button>                 
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Search End-->
     <!--Search Results start-->
   <div class="search-results" >
    @include('frontend.searchdata')  

  </div>
   <!--Search Results end-->

  </section>
   <!--Body Content End-->
  @endsection