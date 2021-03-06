@extends('backend.layouts.app')
 @section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
  <link rel="stylesheet" href="/css/admin.css">
@stop 
@section('js')      
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>  
 <script src="{{ URL::asset('js/backend.js') }}"></script>
  <script type='text/javascript'>
    $(document).ready(function() {
     $('#multiple-checkboxes').selectpicker({
       noneSelectedText : 'Please Select Compatibilities'
     });
     
      //toggle between additional properties fields
      $('.list_wrapper').hide();
      $('.dynamicdisplay').click(function(){
        $(this).find("i").toggleClass('fa-arrow-up fa-arrow-down');
        $('.list_wrapper').toggle(); 
      })     
    });
  </script>
@stop
@section('content')
  @include('backend.includes.partials.messages')
  <div class="card1 card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="add" method="post" role="form" action="{{ route('admin.product.store') }}"
    enctype="multipart/form-data">
      @csrf
      <div class="card-body"> 
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 "> 	
          <div class="form-group">
            <label for="name">Name</label>
            <input  type="text" class="form-control admin-field" id="name" name="name" value="{{old('name')}}"placeholder="Enter name" required>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="material_no">Product Number</label>
            <input  type="text" class="form-control admin-field" id="product_no" name="product_no" value="{{old('product_no')}}" placeholder="Enter product number">
          </div>
        </div>
      </div>
      <div class="row">   
        <div class="col-xs-12 col-sm-6 col-md-6 "> 
          <div class="form-group">
            <label for="concept_id">Concept</label>
            {!! Form::select('concept_id', $concepts, old('concept_id',null), ['placeholder' => 'Please Select Concept', 'class' => 'form-control']) !!}
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="category_id">Category</label>
            {!! Form::select('cat_id', $categories, old('cat_id',null), ['placeholder' => 'Please Select Category', 'class' => 'form-control dynamic','data-dependent' => 'sub_cat_id']) !!}
          </div>
        </div>
      </div>
       <div class="row">   
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="sub_cat_id">Sub Category</label>
            {!! Form::select('sub_cat_id', $subcategories, old('sub_cat_id', null), ['placeholder' => 'Please Select Subcategory', 'class' => 'form-control', 'id'=>'sub_cat_id']) !!}   
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="compatibility_id">Compatibility</label>
               {!! Form::select('compatibility_ids[]', $compatibilities,  old('compatibility_ids',null),  [ 'class' => 'form-control','id' => 'multiple-checkboxes','multiple' => 'multiple']) !!} 
            <!--   <select id="multiple-checkboxes" class="form-control" multiple="multiple" name="compatibility_ids[]">
               <option value="" disabled selected>Select power consumptions</option> --> 
<!--               @foreach ($compatibilities as $key => $value)
                  <option value="{{ $key}}" {{ (old("compatibility_ids") == $key ? "selected":"") }}>{{ $value }}</option>
              @endforeach
          </select> --> 
           </div>
        </div>
      </div>
      <div class="row">   
        <div class="col-xs-12 col-sm-6 col-md-6 "> 
          <div class="form-group">
            <label for="brand_id">Brand</label>
            {!! Form::select('brand_id', $brands, old('brand_id',null), ['placeholder' => 'Please Select Brand', 'class' => 'form-control']) !!}
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="type_id">Type</label>
            {!! Form::select('type_id', $types, old('type_id',null), ['placeholder' => 'Please Select Type', 'class' => 'form-control']) !!}
          </div>
        </div>
      </div>
      <div class="row">   
        <div class="col-xs-12 col-sm-6 col-md-6 ">
          <div class="form-group">
            <label for="power_consumption">Power Consumption</label><br/>
            <!-- <input  type="text" class="form-control admin-field" id="power_consumption" name="power_consumption" value="{{old('power_consumption')}}"  placeholder="Enter powerconsumption"> -->
             <!-- {!! Form::select('power_consumption_id[]', $powerconsumption, old('power_consumption_id',null), ['placeholder' => 'Please Select Powerconsumption', 'id' => 'multiple-checkboxes', 'class' => 'form-control','multiple'=> 'multiple']) !!}
              -->
              {!! Form::select('power_consumption_id', $powerconsumption, old('power_consumption_id',null), ['placeholder' => 'Please Select Powerconsumption', 'class' => 'form-control']) !!}
           
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">        
        <div class="form-group">
          <label for="lightcolor">Light Color</label>
       <!--    <input  type="text" class="form-control admin-field" id="light_color" name="light_color" value="{{old('light_color')}}" placeholder="Enter light color"> -->
       {!! Form::select('color_id', $colors, old('color_id',null), ['placeholder' => 'Please Select color', 'class' => 'form-control']) !!}
        </div>
      </div>
    </div>
        <div class="form-group">
          <label for="physical_spec">Physical Spec</label>
          <textarea   class="form-control admin-field" id="physical_spec" name="physical_spec"   placeholder="Enter physical spec">{{old('physical_spec')}}</textarea>
        </div>
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="introduction" name="introduction" placeholder="Enter intro">{{old('introduction')}}</textarea>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="accessories">Accessories Required</label>
              <input type="text" class="form-control admin-field" id="accessories_required" name="accessories_required" value="{{old('accessories_required')}}" placeholder="Enter accessories">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="warranty">Warranty</label>
              <input  type="text" class="form-control admin-field" id="warranty" name="warranty" value="{{old('warranty')}}" placeholder="Enter warranty">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="technical_spec" name="technical_spec" placeholder="Enter technical spec">{{old('technical_spec')}} </textarea>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Additional Features</label>
              <input  type="text" class="form-control admin-field" id="additional_features" name="additional_features" value="{{old('additional_features')}}"placeholder="Enter additional features">
            </div>
          </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">  
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
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Price</label>
              <input  type="number" class="form-control admin-field" id="price" name="price" value="{{old('price')}}"placeholder="Enter price">
            </div>
          </div>
      </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-4 col-md-4 ">
             <div class="form-group">
              <label for="addfea">IGST</label>
              <input  type="number" class="form-control admin-field" id="igst" name="igst" value="{{old('igst')}}"placeholder="Enter IGST">
            </div>
          </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">  
           <div class="form-group">
              <label for="addfea">SGST</label>
              <input  type="number" class="form-control admin-field" id="sgst" name="sgst" value="{{old('sgst')}}"placeholder="Enter SGST">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Transit</label>
              <input  type="number" class="form-control admin-field" id="transit" name="transit" value="{{old('transit')}}"placeholder="Enter Transit">
            </div>
          </div>
      </div>
          <button type="Button" class="btn btn-primary dynamicdisplay rl">Add additional Properties<i  class="fa fa-arrow-up pl"></i></button>
          <div class="list_wrapper">
            <div class="row">   
              <div class="col-xs-12 col-sm-12 col-md-12 ">
            <button class="btn float-right btn-success list_add_button " type="button">Add Fields<i class="fa fa-plus-circle pl"></i></button>
          </div>
        </div> 
            @php($i = 0)
           @if(!is_null((old('dynamicfield'))))
            @foreach(old('dynamicfield') as $input)          
            <div class="row">   
              <div class="col-xs-4 col-sm-4 col-md-4">   
                <div class="form-group">
                  <label>Label</label>
                  <input name="dynamicfield[{{$i}}][label]" type="text" placeholder="Type Label" value="{{old('dynamicfield.'.$i.'.label')}}" class="form-control"/>
                </div>
              </div>
   
              <div class="col-xs-7 col-sm-7 col-md-7">
                <div class="form-group">
                  <label>Value</label>
                  <input autocomplete="off" name="dynamicfield[{{$i}}][value]" type="text" value="{{old('dynamicfield.'.$i.'.value')}}" placeholder="Type Value" class="form-control"/>
                </div>
              </div> 
   
              <div class="col-xs-1 col-sm-1 col-md-1">
                <br>
                <a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a>
              </div>
            </div>
            @php($i++)
        @endforeach
        @endif 
          </div>  
          </br> </br>        
          <div class="form-group martop">
            <label  for="image">Product Image/Images</label>
            <div class="input-group increment">
                 <input type="file" class="form-control" name="filename[]"   id="fileupload" multiple>
            </div>           
            <br/>            
            <div id="image_preview" class="row"></div>    
          </div> 
        </div><!-- /.box-body -->
      <div class="card-footer">
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary float-right addproductbut">Add</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 