@extends('backend.layouts.app')
@section('content')  
  @include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Brand</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.brand.update' , ['id' => $brand->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="brand" name="name" value="{{old('name', $brand->name )}}"placeholder="Enter brand name" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.brand.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$brand->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>  
  </div><!-- /.box -->
@endsection 