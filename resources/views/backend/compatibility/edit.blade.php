@extends('backend.layouts.app')
@section('content')  
  @include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Compatibility</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.compatibility.update' , ['id' => $compatibility->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" value="{{old('name', $compatibility->name )}}"placeholder="Enter Compatibility name" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.compatibility.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$compatibility->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>  
  </div><!-- /.box -->
@endsection 