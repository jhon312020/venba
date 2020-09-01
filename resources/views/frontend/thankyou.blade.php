@extends('frontend.layouts.app')
@section('content')
 <!--Body Content-->
  <section> 
  <div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Please check your email</strong> for the invoice of purchase.</p>
  <hr>
  <p>
    Having trouble? <a href="{{URL('contact') }}">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{URL('/') }}" role="button">Continue to homepage</a>
    <span><a class="btn btn-primary btn-sm" href="{{URL('orders') }}" role="button">My Orders</a></span>
  </p>
</div>
  <!--Body Content End-->

@endsection