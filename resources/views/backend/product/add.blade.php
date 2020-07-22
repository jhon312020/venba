@extends('backend.layouts.app')
@section('content')
@include('backend.includes.partials.messages')
@section('js')
  <script src="{{ URL::asset('js/backend.js') }}"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

@stop
<div>
<a style="position:relative;float: right" href="{{ URL::previous() }}" class="btn btn-success"> <i class="fas fa-arrow-left"></i> Go Back</a>
</div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="add" method="post" role="form" action="{{ route('admin.product.store') }}"
    enctype="multipart/form-data">
      @csrf
      <div class="card-body">     	
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" value="{{old('name')}}"placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="material_no">Material Number</label>
          <input  type="text" class="form-control admin-field" id="material_no" name="material_no" value="{{old('material_no')}}" placeholder="Enter material number">
        </div>
        <div class="form-group">
          <label for="concept_id">Concept</label>
          {!! Form::select('concept_id', $concepts, old('concept_id',null), ['placeholder' => 'Please Select Concept', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          {!! Form::select('cat_id', $categories, old('cat_id',null), ['placeholder' => 'Please Select Category', 'class' => 'form-control dynamic','data-dependent' => 'sub_cat_id']) !!}
        </div>
        <div class="form-group">
          <label for="sub_cat_id">Sub Category</label>
          <select class="form-control"  name="sub_cat_id" id="sub_cat_id" >
          <option value="" disabled selected>Select sub category</option>
                  
          </select>
        </div>
        <div class="form-group">
          <label for="compatability">Compatibility</label>
          <input  type="text" class="form-control admin-field" id="compatibility" name="compatibility" value="{{old('compatibility')}}" placeholder="Enter compatibility">
        </div>
        <div class="form-group">
          <label for="power_consumption">Power Consumption</label>
          <input  type="text" class="form-control admin-field" id="power_consumption" name="power_consumption" value="{{old('power_consumption')}}"  placeholder="Enter powerconsumption">
        </div>
        <div class="form-group">
          <label for="physical_spec">Physical Spec</label>
          <textarea   class="form-control admin-field" id="physical_spec" name="physical_spec"   placeholder="Enter physical spec">{{old('physical_spec')}}</textarea>
        </div>
        <div class="form-group">
          <label for="lightcolor">Light Color</label>
          <input  type="text" class="form-control admin-field" id="light_color" name="light_color" value="{{old('light_color')}}" placeholder="Enter light color">
        </div>
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="introduction" name="introduction" placeholder="Enter intro">{{old('introduction')}}</textarea>
        </div>
        <div class="form-group">
          <label for="accessories">Accessories Required</label>
          <input type="text" class="form-control admin-field" id="accessories_required" name="accessories_required" value="{{old('accessories_required')}}" placeholder="Enter accessories">
        </div>
        <div class="form-group">
          <label for="warranty">Warranty</label>
          <input  type="text" class="form-control admin-field" id="warranty" name="warranty" value="{{old('warranty')}}" placeholder="Enter warranty">
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="technical_spec" name="technical_spec" placeholder="Enter technical spec">{{old('technical_spec')}} </textarea>
        </div>
        <div class="form-group">
          <label for="addfea">Additional Features</label>
          <input  type="text" class="form-control admin-field" id="additional_features" name="additional_features" value="{{old('additional_features')}}"placeholder="Enter additional features">
        </div>
        <div class="form-group">
          <label>Wired or Wireless</label>
          <div class="radio">
            <label>
            <input type="radio" name="wired_wireless" id="wired_wireless" value="wired" {{ (old('wired_wireless') == 'wired') ? 'checked' : ''}}>
             Wired
            </label>
          </div>
          <div class="radio">
            <label>
            <input type="radio" name="wired_wireless" id="wired_wireless" value="wireless" {{ (old('wired_wireless') == 'wireless') ? 'checked' : ''}}>
             Wireless
            </label>
          </div>
        </div>
          <button type="Button" style="position: relative; left: 25%" class="btn btn-primary dynamicdisplay">Add additional Properties<i style="position:relative;left:5px;" class="fa fa-arrow-up"></i></button>
          <div class="list_wrapper">
            <div class="row">
   
              <div class="col-xs-4 col-sm-4 col-md-4">
   
                <div class="form-group">
                  <label>Label</label>
                  <input name="dynamicfield[0][label]" type="text" placeholder="Type Label" value="{{old('dynamicfield.0.label')}}" class="form-control"/>
                </div>
              </div>
   
              <div class="col-xs-7 col-sm-7 col-md-7">
                <div class="form-group">
                  <label>Value</label>
                  <input autocomplete="off" name="dynamicfield[0][value]" type="text" value="{{old('dynamicfield.0.value')}}" placeholder="Type Value" class="form-control"/>
                </div>
              </div> 
   
              <div class="col-xs-1 col-sm-1 col-md-1">
                <br>
                <button class="btn btn-success list_add_button" type="button"><i class="fa fa-plus-circle"></i></button>
              </div>
            </div> 
          </div>  
          </br> </br>        
          <div class="form-group">
            <label  for="image">Product Image/Images</label>
            <div class="input-group increment">
                 <input type="file" class="form-control" name="filename[]"   id="fileupload" multiple>
            </div>
           
            <br/>
            <div id="image_preview"></div>
            
          </div> 
        </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary addproductbut">Add</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 