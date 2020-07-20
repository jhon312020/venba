@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')
<div>
<a style="position:relative;float: right" href="{{ URL::previous() }}" class="btn btn-success"> <i class="fas fa-arrow-left"></i> Go Back</a>
</div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="add" method="post" role="form" action="{{ route('admin.category.store') }}">
      @csrf
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="addcategory" name="name" value="{{old('name')}}"placeholder="Enter new category" required>
        </div>
        <div class="form-group">
          <label for="name">Select Category</label>
          {!! Form::select('cat_id', $categories, old('cat_id', null), ['placeholder' => 'Please Select Main Category','class' => 'form-control']) !!}
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    
  </div><!-- /.box -->
@endsection 