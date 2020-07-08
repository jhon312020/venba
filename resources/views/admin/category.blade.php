@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" role="form" action="/categoryadded" >
      @csrf
      <div class="card-body">  
        <div class="form-group">
          <label for="addcategory">Name</label>
          <input  type="text" class="form-control admin-field" id="addcategory" name="addcategory" placeholder="Enter new category">
        </div>
        <div class="form-group">
          <label for="catid">Category ID</label>
          <select class="form-control"  name="catid" id="catid" >
          <option value="" disabled selected>Select category</option>
            @isset($category)
              @foreach($category as $category)
               <option  value="{{$category->id}}">{{$category->name}}</option> 
              @endforeach 
            @endisset
          </select>
        </div>
      </div><!-- /.box-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div><!-- /.box -->

@endsection