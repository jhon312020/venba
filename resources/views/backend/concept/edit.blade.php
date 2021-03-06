@extends('backend.layouts.app')
@section('content')  
  @include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Concept</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.concept.update' , ['id' => $concept->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" value="{{old('name', $concept->name )}}"placeholder="Enter Concept name" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.concept.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$concept->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>  
  </div><!-- /.box -->
@endsection 