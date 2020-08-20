@extends('backend.layouts.app')
@section('plugins.Sweetalert2', true)
 @section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> 
  <link rel="stylesheet" href="/css/admin.css">
@stop 
@section('js')
  <script src="{{ URL::asset('js/backend.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>  
  <script type='text/javascript'>
    $(document).ready(function() {
      //toggle between additional properties fields
      //$('.list_wrapper').hide();
      $('#multiple-checkboxes').selectpicker({
       noneSelectedText : 'Please Select Compatibilities'
     });
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
      <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.product.update' , ['id' => $product->id])}}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="card-body"> 
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">      
            <div class="form-group">
              <label for="name">Name</label>
              <input  type="text" class="form-control admin-field" id="name" name="name" placeholder="Enter name" required value="{{old('name', $product->name)}}">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="material_no">Product Number</label>
              <input  type="text" class="form-control admin-field" id="product_no" name="product_no" placeholder="Enter material number" value="{{old('product_no', $product->product_no)}}">
            </div>
          </div>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="concept_id">Concept</label>
              {!! Form::select('concept_id', $concepts, old('concept_id',$product->concept_id), ['placeholder' => 'Please Select Concept', 'class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="category_id">Category</label>
              {!! Form::select('cat_id', $categories, old('cat_id', $product->cat_id), ['placeholder' => 'Please Select Category', 'class' => 'form-control dynamic','data-dependent' => 'sub_cat_id']) !!}
            </div>
          </div>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="sub_cat_id">Sub Category</label>
              {!! Form::select('sub_cat_id', $subcategories, old('sub_cat_id', $product->sub_cat_id), ['placeholder' => 'Please Select Subcategory', 'class' => 'form-control', 'id'=>'sub_cat_id']) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="compatibility">Compatibility</label>
              <!-- <input  type="text" class="form-control admin-field" id="compatibility" name="compatibility" placeholder="Enter compatibility" value="{{old('compatibility',$product->compatibility)}}"> -->
              <!-- {!! Form::select('compatibility_ids[]', $compatibilities, old('compatibility_ids',$compatibilities), [ 'class' => 'form-control','id' => 'multiple-checkboxes','multiple' => 'multiple']) !!}  -->
              <select id="multiple-checkboxes" class="form-control" multiple="multiple" name="compatibility_ids[]">
              @foreach ($compatibilities as $key => $value)
                @if (old('compatibility_ids'))
                  <option value="{{ $key}}" {{in_array($key, (old("compatibility_ids"))) == $key ? "selected":"" }}>{{ $value }}</option>
                  @else
                  <option value="{{ $key}}" {{in_array($key, $compatibilitylists) == $key ? "selected":"" }}>{{ $value }}</option>
                  @endif
              @endforeach
          </select>
              <!-- <select name="compatibility_ids[]" id="multiple-checkboxes" class="form-control" multiple = "multiple">
                @foreach ($compatibilities as $key => $value) 
                  @if (old('compatibility_ids'))
                    <option value="{{ $key }}" {{ in_array($key, old('compatibility_ids')) ? 'selected' : '' }}>{{ $value }}</option>   
                  @else
                <option value="{{ $key }}" {{  in_array($key, $compatibilitylists) ? 'selected' : '' }}>{{ $value }}</option>
                 @endif 
                @endforeach
               </select> -->
            </div>
          </div>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="brand">Brand</label>
              {!! Form::select('brand_id', $brands, old('brand_id',$product->brand_id), ['placeholder' => 'Please Select Brand', 'class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="type">Type</label>
              {!! Form::select('type_id', $types, old('type_id',$product->type_id), ['placeholder' => 'Please Select Type', 'class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="power_consumption_id">Power Consumption</label>
              <!-- <input  type="text" class="form-control admin-field" id="power_consumption" name="power_consumption" placeholder="Enter powerconsumption" value="{{old('power_consumption',$product->power_consumption)}}"> -->
              {!! Form::select('power_consumption_id', $powerconsumption, old('power_consumption_id',$product->power_consumption_id), ['placeholder' => 'Please Select Powerconsumption', 'class' => 'form-control']) !!}
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 "> 
            <div class="form-group">
            <label for="lightcolor">Light Color</label>
            <!-- <input  type="text" class="form-control admin-field" id="light_color" name="light_color" placeholder="Enter light color" value="{{old('light_color',$product->light_color)}}"> -->
             {!! Form::select('color_id', $colors, old('color_id',$product->color_id), ['placeholder' => 'Please Select Color', 'class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="physical_spec">Physical Spec</label>
          <textarea class="form-control admin-field" id="physical_spec" name="physical_spec" placeholder="Enter physical spec">{{old('physical_spec',$product->physical_spec)}}</textarea>
        </div>       
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="introduction" name="introduction" placeholder="Enter introduction">{{old('introduction',$product->introduction)}}</textarea>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="accessories">Accessories Required</label>
              <input type="text" class="form-control admin-field" id="accessories_required" name="accessories_required" placeholder="Enter accessories" value="{{old('accessories_required',$product->accessories_required)}}">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="form-group">
              <label for="warranty">Warranty</label>
              <input  type="text" class="form-control admin-field" id="warranty" name="warranty" placeholder="Enter warranty" value="{{old('warranty',$product->warranty)}}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="technical_spec" name="technical_spec" placeholder="Enter technical spec">{{old('technical_spec',$product->technical_spec)}}</textarea>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Additional Features</label>
              <input  type="text" class="form-control admin-field" id="additional_features" name="additional_features"placeholder="Enter additional features" value="{{old('additional_features',$product->additional_features)}}">
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label>Wired or Wireless</label>
              <div class="radio">
                <label>
                <input type="radio" name="wired_wireless" id="wired_wireless" value="wired" {{old('wired_wireless', $product->wired_wireless) == 'wired' ? 'checked' : '' }}>
                 Wired
                </label>
              </div>
              <div class="radio">
                <label>
                <input type="radio" name="wired_wireless" id="wired_wireless" value="wireless" {{old('wired_wireless',$product->wired_wireless) == 'wireless' ? 'checked' : '' }}>
                 Wireless
                </label>
              </div>
            </div>
          </div>
           <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Price</label>
              <input  type="text" class="form-control admin-field" id="price" name="price" value="{{old('price',$product->price)}}"placeholder="Enter price">
            </div>
          </div>
        </div>
        <div class="row">   
          <div class="col-xs-12 col-sm-4 col-md-4 ">
             <div class="form-group">
              <label for="addfea">igst</label>
              <input  type="number" class="form-control admin-field" id="igst" name="igst" value="{{old('igst', $product->igst)}}"placeholder="Enter IGST">
            </div>
          </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">  
           <div class="form-group">
              <label for="addfea">SGST</label>
              <input  type="number" class="form-control admin-field" id="sgst" name="sgst" value="{{old('sgst', $product->sgst)}}"placeholder="Enter SGST">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 ">
            <div class="form-group">
              <label for="addfea">Transit</label>
              <input  type="number" class="form-control admin-field" id="transit" name="transit" value="{{old('transit', $product->transit)}}"placeholder="Enter Transit">
            </div>
          </div>
      </div>
          <button type="Button" class="btn btn-primary dynamicdisplay rl">Edit additional Properties<i  class="fa fa-arrow-down pl "></i></button> 
          <div class="list_wrapper">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <button class="btn float-right btn-success list_add_button" type="button">Add Fields<i class="fa fa-plus-circle pl"></i></button>
              </div>
            </div>                
            @if(!empty($additional_prop_array))
            <?php $i=0;?>
            @foreach($additional_prop_array as $item)
            <?php $i++;?>
            <div class="row martop">
              <div class="col-xs-4 col-sm-4 col-md-4">  
                <div class="form-group">
                  <input name="dynamicfield[<?php echo $i;?>][label]" value="{{old('dynamicfield.$i.label', $item['label'])}}" type="text" placeholder="Type Label" class="form-control"/>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-7">  
                <div class="form-group">
                <input name="dynamicfield[<?php echo $i;?>][value]" value="{{old('dynamicfield.$i.value',$item['value'])}}"type="text" placeholder="Type Value" class="form-control"/>
                </div>
              </div>
              <div class="col-xs-1 col-sm-7 col-md-1"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a>
              </div>
            </div>
            @endforeach 
            @endif
          </div>
          <div class="form-group martop">
            <label for="image">Add more Product Image/Images</label>
            <div class="input-group increment" id="{{$imagecount}}">
              <input type="file" class="form-control" name="filename[]"  id="fileupload"   multiple>
            </div>
             <br/>
             <div id="image_preview" class="row">
              
            </div>
          </div> 
          @if(!empty($images))
          <div class="row">            
            <?php $i =0;?>
          @foreach($images as $key => $item)
           <div class="col-2" name="{{$item}}" id="img_<?php echo $key?>">
            <div>
              <div style="width:100px;height:100px">
                <img src="/thumbnail/{{$id}}/{{$item}}" class="{{$item}} imwh" alt="Product Image" title="Image Title"/> <br/>
              </div>
              <button  type="button" id="<?php echo $key;?>" name ="{{ $item}}" class="btn btn-danger removeimage">Remove<i class="fa fa-trash pl "></i></button>
            </div>
           </div>
            <?php $i++; ?>
              @endforeach 
              </div>          
          </div>
           @endif
        </div><!-- /.box-body -->
      <div class="card-footer">
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary float-right">Update</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 