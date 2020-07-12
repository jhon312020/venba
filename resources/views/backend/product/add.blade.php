@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="add" method="post" role="form" action="{{ route('admin.product.store') }}">
      @csrf
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="material_no">Material Number</label>
          <input  type="text" class="form-control admin-field" id="material_no" name="material_no" placeholder="Enter material number">
        </div>
        <div class="form-group">
          <label for="concept_id">Concept</label>
          {!! Form::select('concept_id', $concepts, null, ['placeholder' => 'Please Select Concept', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          {!! Form::select('cat_id', $categories, null, ['placeholder' => 'Please Select Category', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="subcatid">Sub Category</label>
          <select class="form-control"  name="sub_cat_id" id="sub_cat_id" >
          <option value="" disabled selected>Select sub category</option>
          <option value=""></option>         
          </select>
        </div>
        <div class="form-group">
          <label for="compatability">Compatability</label>
          <input  type="text" class="form-control admin-field" id="compatability" name="compatability" placeholder="Enter compatability">
        </div>
        <div class="form-group">
          <label for="power_consumption">Power Consumption</label>
          <input  type="text" class="form-control admin-field" id="power_consumption" name="power_consumption" placeholder="Enter powerconsumption">
        </div>
        <div class="form-group">
          <label for="physical_spec">Physical Spec</label>
          <textarea   class="form-control admin-field" id="physical_spec" name="physical_spec" placeholder="Enter physical spec"></textarea>
        </div>
        <div class="form-group">
          <label for="lightcolor">Light Color</label>
          <input  type="text" class="form-control admin-field" id="light_color" name="light_color" placeholder="Enter light color">
        </div>
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="introduction" name="introduction" placeholder="Enter intro"></textarea>
        </div>
        <div class="form-group">
          <label for="accessories">Accessories Required</label>
          <input type="text" class="form-control admin-field" id="accessories_required" name="accessories_required" placeholder="Enter accessories">
        </div>
        <div class="form-group">
          <label for="warranty">Warranty</label>
          <input  type="text" class="form-control admin-field" id="warranty" name="warranty" placeholder="Enter warranty">
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="technical_spec" name="technical_spec" placeholder="Enter technical spec"></textarea>
        </div>
        <div class="form-group">
          <label for="addfea">Additional Features</label>
          <input  type="text" class="form-control admin-field" id="additional_features" name="additional_features"placeholder="Enter additional features">
        </div>
        <div class="form-group">
          <label>Wired or Wireless</label>
          <div class="radio">
            <label>
            <input type="radio" name="wired_wireless" id="wired_wireless" value="wired" checked>
             Wired
            </label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="wired_wireless" id="wired_wireless" value="wireless">
             Wireless
            </label>
          </div>
          <div class="form-group">
            <label for="image">Product Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image"  name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 