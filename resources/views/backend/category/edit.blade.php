@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')  
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.category.update' , ['id' => $category->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" value="{{$category->name}}" id="name" name="name"placeholder="Enter Category name" required>
        </div>
        <div class="form-group">
          <label for="name">Select SubCategory</label>
          {!! Form::select('cat_id', $categories, $category->cat_id, ['placeholder' => 'Please Select Category', 'class' => 'form-control']) !!}
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" value=" {{$category->id}}"  class="btn btn-primary">Update</button>
      </div>
    </form>
    
  </div><!-- /.box -->
@endsection 