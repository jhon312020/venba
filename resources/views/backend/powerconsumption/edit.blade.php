@extends('backend.layouts.app')
@section('content')  
  @include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Powerconsumption</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.powerconsumption.update' , ['id' => $powerconsumption->id])}}">
      @csrf
      @method('PATCH')
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" value="{{old('name', $powerconsumption->name )}}"placeholder="Enter Concept name" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.powerconsumption.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" value=" {{$powerconsumption->id}}"  class="btn btn-primary float-right">Update</button>
      </div>
    </form>  
  </div><!-- /.box -->
@endsection 