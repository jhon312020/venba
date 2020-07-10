@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('js')
  <script src="{{ URL::asset('js/product.js') }}"></script>
@stop
@section('content')
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
     @isset($fetchproduct)
    <form id="productEditForm" method="post" role="form" action="{{action('ProductController@update')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">  
        <div class="form-group">
          <label for="productname"> Name</label>
          <input name="id" id="id"value="{{$fetchproduct->id}}" type="hidden">
          <input  type="text" class="form-control admin-field" id="name" name="name" value="{{$fetchproduct->name}}" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="materialno">Material Number</label>
          <input  type="text" class="form-control admin-field" id="materialno" value="{{$fetchproduct->material_no}}" name="materialno" placeholder="Enter material no">
        </div>
        <div class="form-group">
          <label for="conceptid">Concept</label>
          <input  type="text" class="form-control admin-field" id="conceptid" value="{{$fetchproduct->concept_id}}" name="conceptid"placeholder="Enter concept id">
        </div>
        <div class="form-group">
          <label for="categoryid">Category</label>
          <select class="form-control dynamic" data-dependent="subcatid" name="categoryid" id="categoryid" >
          <option value="{{$fetchproduct->maincategory_id}}"  selected>{{$fetchproduct->maincategory}}</option>
          @isset($category)
            @foreach($category as $category)
              <option  value="{{$category->id}}">{{$category->name}}</option>
            @endforeach 
          @endisset
          </select> 
        </div>
        <div class="form-group">
          <label for="subcatid">Sub Category</label>
          <select class="form-control"  name="subcatid" id="subcatid" >
          <option value="{{$fetchproduct->subcategory_id}}" selected>{{$fetchproduct->subcategory}}</option>
          <option value=""></option>
                                             
          </select>
        </div>
        <div class="form-group">
          <label for="compatability">Compatability</label>
          <input  type="text" class="form-control admin-field" id="compatability" name="compatability" value="{{$fetchproduct->compatibility}}" placeholder="Enter compatability">
        </div>
        <div class="form-group">
          <label for="power">Power Consumption</label>
          <input  type="text" class="form-control admin-field" id="power" name="power" value="{{$fetchproduct->power_consumption}}" placeholder="Enter powerconsumption">
        </div>
        <div class="form-group">
          <label for="physicalspec">Physical Spec</label>
          <textarea   class="form-control admin-field" id="physicalspec" name="physicalspec" placeholder="Enter physical spec">{{$fetchproduct->physical_spec}}</textarea>
        </div>
        <div class="form-group">
          <label for="lightcolor">Light Color</label>
          <input  type="text" class="form-control admin-field" id="lightcolor" value="{{$fetchproduct->light_color}}" name="lightcolor" placeholder="Enter light color">
        </div>
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="intro" name="intro" placeholder="Enter intro">{{$fetchproduct->introduction}}</textarea>
        </div>
        <div class="form-group">
          <label for="accessories">Accessories Required</label>
          <input type="text" class="form-control admin-field" id="accessories" value="{{$fetchproduct->accessories_required}}" name="accessories" placeholder="Enter accessories">
        </div>
        <div class="form-group">
          <label for="warranty">Warranty</label>
          <input  type="text" class="form-control admin-field" id="warranty" value="{{$fetchproduct->warranty}}" name="warranty" placeholder="Enter warranty">
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="tech" name="tech"  placeholder="Enter technical spec">{{$fetchproduct->technical_spec}}</textarea>
        </div>
        <div class="form-group">
          <label for="addfea">Additionala Features</label>
          <input  type="text" class="form-control admin-field" value="{{$fetchproduct->additional_features}}" id="addfea" name="addfea"placeholder="Enter additional features">
        </div>
        <div class="form-group">
          <label>Wired or Wireless</label>
          <div class="radio">
            <label>
            <input type="radio" name="wired" id="wired" value="wired"  {{ $fetchproduct->wired_wireless == 'wired' ? 'checked' : '' }}>
             Wired
            </label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="wired" id="wireless" value="wireless" {{ $fetchproduct->wired_wireless == 'wireless' ? 'checked' : '' }}>
             Wireless
            </label>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Product Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile"  name="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>  
    </form>
    @endisset
  </div><!-- /.box -->
                         
<div id="success" class="suc"></div>

@endsection