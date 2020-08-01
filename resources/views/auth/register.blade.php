@extends('frontend.layouts.app')
@section('content')
	<section class="login-box create-account">
    <!--Create Account Start-->
    <div class="container-fluid">
      <div class="row">
        <h2 class="d-block d-lg-none">Create Account</h2>
        <div class="col-12 d-flex align-items-center justify-content-center">
          <div class="outer-box text-center">
            <h2 class="d-none d-lg-block">Create Account</h2>
            <div class="inner-box text-center">
                <form class="form text-center" method="POST" role="form" action="{{ route('register') }}">
                  @csrf
                    <div class="form-group floating-control-group">
                      <!-- <label for="yourName">Your Name</label> -->
                      <input type="text" class="form-control @error('name') is-invalid @enderror"  id="yourName" required="" name="name" value="{{ old('name') }}"  placeholder="Your Name">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div> 
                    <div class="form-group floating-control-group">
                      <!-- <label for="number">Mobile No.</label> -->
                      <input type="number" class="form-control @error('mobile_number') is-invalid @enderror" id="number" name="mobile_number" required="" value="{{ old('mobile_number') }}"  placeholder="Mobile No.">
                      @error('mobile_number')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div> 
                    <div class="form-group floating-control-group">
                      <!-- <label for="email">Email</label> -->
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  required="" placeholder="Email" name="email" value="{{ old('email') }}" >
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>  
                    <div class="form-group floating-control-group">
                      <!-- <label for="password">Password </label> -->
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required="" placeholder="Password" value="{{ old('password') }}"  autocomplete="new-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group floating-control-group">
                      <!-- <label for="password-confirm">Confirm Password</label> -->             
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                    </div>         
                    <p>Passwords must be at least 6 characters.<br/> We will send you a text to verify your phone. <br/>Message and Data rates may apply</p> 
                    <button class="btn btn-secondary my-4 my-lg-5">Continue</button>
                    <p class="sign-in">Already have an account? <a href="{{ route('login') }}">Sign in ></a></p>
                  </form>
              </div> 
          </div>
        </div>
      </div>
    </div>
     
    <!--Create Account End--> 

  </section>
  <!--Body Content End-->

	@endsection		