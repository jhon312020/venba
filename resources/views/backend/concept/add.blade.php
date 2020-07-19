@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')
<div>
<a style="position:relative;float: right" href="{{ URL::previous() }}" class="btn btn-success"> <i class="fas fa-arrow-left"></i> Go Back</a>
</div>
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
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    
  </div><!-- /.box -->
@endsection 