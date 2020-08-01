@extends('frontend.layouts.app')
@section('content')
<!--Body Content-->
   <!--Forgot Password Start-->
  <section class="login-box">    
    <div class="container-fluid">
      <div class="row">
        <h2 class="d-block d-lg-none">Login</h2>
        <div class="col-12 d-flex align-items-center justify-content-center">
          <div class="outer-box text-center">
            <h2 class="d-none d-lg-block">Login</h2>
            <div class="inner-box text-center">
                <form class="form text-center" action="{{ route('login') }}" method="post">
                  <div class="form-group floating-control-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" required="" placeholder="Email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                      	<strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div> 
                    <div class="form-group floating-control-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required="" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <button class="btn btn-secondary">Login</button>
                  <div class="footer-links">
                    <a href="{{ route('password.request') }}">Forgot Password ?</a>
                    <a href="{{ route('register') }}">Create Account</a>
                  </div>
                </form>
              </div> 
          </div>
        </div>
      </div>
    </div>     
    <!--Forgot Password End--> 

  </section>
  <!--Body Content End-->
   <!-- Login Modal -->  
<div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="loginModalLabel"></h2>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body text-center">
        
      </div>
      <div class="modal-footer">
         <a href="#">Forgot Password ?</a>
         <a href="#">Create Account</a>
      </div>
    </div>
  </div>
</div>
 <!-- Login Modal End --> 


  @endsection
  @section('belowfooter')
  <!-- Login Modal -->  
<div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="loginModalLabel"></h2>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body text-center">
        
      </div>
      <div class="modal-footer">
         <a href="#">Forgot Password ?</a>
         <a href="#">Create Account</a>
      </div>
    </div>
  </div>
</div>
 <!-- Login Modal End -->  
 @endsection