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
          <input  type="text" class="form-control admin-field"  id="name" name="name" value="{{old('name' ,$category->name)}}"placeholder="Enter Category name" required>
        </div>
        <div class="form-group">
          <label for="name">Select Category</label>
          {!! Form::select('cat_id', $categories, old('cat_id',$category->cat_id), ['placeholder' => 'Please Select Category', 'class' => 'form-control']) !!}
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
        <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$category->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>
    
  </div><!-- /.box -->
@endsection 