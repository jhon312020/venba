@extends('frontend.layouts.app')
@section('content')
  <div class="container contact-form">
    <div class="contact-image">
      <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form method="post" action ="{{ route('frontview.frontend.sendmail') }}">
      @csrf
      <h3>Drop Us a Message</h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="customername" class="form-control @error('customername') is-invalid @enderror" placeholder="Your Name *" value="{{old('customername')}}" />
            @error('customername')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" name="customeremail" class="form-control @error('customeremail') is-invalid @enderror" placeholder="Your Email *" value="{{old('customeremail')}}" />
             @error('customeremail')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" name="customerphone" class="form-control @error('customerphone') is-invalid @enderror" placeholder="Your Phone Number *" value="{{old('customerphone')}}" />
             @error('customerphone')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <textarea style="width: 100%; height: 150px;" name="customermsg" class="form-control @error('customermsg') is-invalid @enderror" placeholder="Your Message *" > {{old('customermsg')}}</textarea>
             @error('customermsg')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      </div>
    </form>
    @if(Session::has('success'))
    <div>{{Session::get('success')}}</div>
    @endif
  </div>

@endsection