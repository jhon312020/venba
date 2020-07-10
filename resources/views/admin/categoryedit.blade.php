@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('js')
  <script src="{{ URL::asset('js/category.js') }}"></script>
@stop
@section('content')
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @isset($fetchcategory)
    <form id="categoryEditForm" method="post" role="form" action="{{action('CategoryController@update')}}" >
      @csrf
      <div class="card-body">  
        <div class="form-group">
          <label for="editcategory">Name</label>
          
          <input name="id" id="id"value="{{$fetchcategory->id}}" type="hidden">
          <input  type="text" class="form-control admin-field" id="editcategory" name="editcategory"value="{{$fetchcategory->name}}" placeholder="Enter new category">
        </div>
        <div class="form-group">
          <label for="catid">Category ID</label>
          <select class="form-control" name="catid" id="cat_id" >

          <option value="{{$fetchcategory->maincategory_id}}" selected>{{$fetchcategory->maincategory}}</option>
          <option value=""></option>
            @isset($category)
              @foreach($category as $category)
               <option  value="{{$category->id}}">{{$category->name}}</option> 
              @endforeach 
            @endisset
          </select>
        </div>
      </div><!-- /.box-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </form>
    
    @endisset
  </div><!-- /.box -->
   <div id="success"></div>

@endsection