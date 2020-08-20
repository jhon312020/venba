@extends('backend.layouts.app')
@section('content')  
  @include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Color</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.color.update' , ['id' => $color->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="color" name="name" value="{{old('name', $color->name )}}"placeholder="Enter brand name" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.color.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$color->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>  
  </div><!-- /.box -->
@endsection 