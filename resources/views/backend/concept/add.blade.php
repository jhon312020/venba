@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Concept</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="add" method="post" role="form" action="{{ route('admin.concept.store') }}">
      @csrf
      <div class="card-body">     	
      <div class="form-group">
        <label for="name">Name</label>
        <input  type="text" class="form-control admin-field" id="addconcept" name="name"placeholder="Enter new concept" value="{{old('name')}}" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
         <a href="{{ route('admin.concept.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary float-right">Add</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 