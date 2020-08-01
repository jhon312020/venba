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
                <form class="form text-center">
                    <div class="form-group floating-control-group">
                      <label for="yourName">Your Name</label>
                      <input type="text" class="form-control" id="yourName" required="" placeholder="Your Name">
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="number">Mobile No.</label>
                      <input type="number" class="form-control" id="number" required="" placeholder="Mobile No.">
                    </div> 
                    <div class="form-group floating-control-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" required="" placeholder="Email ">
                    </div>  
                    <div class="form-group floating-control-group">
                      <label for="password">Password </label>
                      <input type="password" class="form-control" id="password" required="" placeholder="Password">
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