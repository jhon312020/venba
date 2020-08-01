@extends('layouts.app')

@section('content')

<!--Body Content-->
  <!--Forgot Password Start-->
  <section class="login-box forgot-password">    
    <div class="container-fluid">
      <div class="row">
        <h2 class="d-block d-lg-none">Forgot Password</h2>
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="outer-box text-center">
              <h2 class="d-none d-lg-block">Forgot Password</h2>
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
              @endif
              <div class="inner-box text-center">
                <form class="form text-center" method="POST" action="{{ route('password.email') }}">
                    @csrf
                  <div class="form-group floating-control-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}"" required="" placeholder="Enter your registered email address">
                   @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>  
                  <button class="btn btn-secondary">Submit</button>
                </form>
              </div> 
          </div>
        </div>
      </div>
    </div>     
    <!--Forgot Password End--> 

  </section>
  <!--Body Content End-->

@endsection
