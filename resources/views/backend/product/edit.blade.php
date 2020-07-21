@extends('backend.layouts.app')
@section('plugins.Sweetalert2', true)
@section('content')
@section('js')
  <script src="{{ URL::asset('js/backend.js') }}"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
@stop
@include('backend.includes.partials.messages')
<div>
<a style="position:relative;float: right" href="{{ URL::previous() }}" class="btn btn-success"> <i class="fas fa-arrow-left"></i> Go Back</a>
</div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="edit" method="post" role="form" action="{{route('admin.product.update' , ['id' => $product->id])}}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="card-body">       
        <div class="form-group">
          <label for="name">Name</label>
          <input  type="text" class="form-control admin-field" id="name" name="name" placeholder="Enter name" required value="{{old('name',$product->name)}}">
        </div>
        <div class="form-group">
          <label for="material_no">Material Number</label>
          <input  type="text" class="form-control admin-field" id="material_no" name="material_no" placeholder="Enter material number" value="{{old('material_no',$product->material_no)}}">
        </div>
        <div class="form-group">
          <label for="concept_id">Concept</label>
          {!! Form::select('concept_id', $concepts, old('concept_id',$product->concept_id), ['placeholder' => 'Please Select Concept', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          {!! Form::select('cat_id', $categories, old('cat_id', $product->cat_id), ['placeholder' => 'Please Select Category', 'class' => 'form-control dynamicedit','data-dependent' => 'sub_cat_id']) !!}
        </div>
        <div class="form-group">
          <label for="sub_cat_id">Sub Category</label>
          <select class="form-control"  name="sub_cat_id" id="sub_cat_id" >
             <!-- @empty($subcategory)
             @else
            @foreach($subcategory as $item)
          <option class="editsubcat" value="{{$item['id']}}" {{ old('sub_cat_id') == $item['id'] ? 'selected' : '' }}  selected>{{$item['name']}}</option> 
          @endforeach 
          @endempty -->
          
            @foreach($subcategorylist as $item)
         <option class="editsubcat" value="{{$item->id}}" {{ old('sub_cat_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
         @endforeach
          
          </select>
        </div>
        <div class="form-group">
          <label for="compatability">Compatibility</label>
          <input  type="text" class="form-control admin-field" id="compatibility" name="compatibility" placeholder="Enter compatibility" value="{{old('compatibility',$product->compatibility)}}">
        </div>
        <div class="form-group">
          <label for="power_consumption">Power Consumption</label>
          <input  type="text" class="form-control admin-field" id="power_consumption" name="power_consumption" placeholder="Enter powerconsumption" value="{{old('power_consumption',$product->power_consumption)}}">
        </div>
        <div class="form-group">
          <label for="physical_spec">Physical Spec</label>
          <textarea class="form-control admin-field" id="physical_spec" name="physical_spec" placeholder="Enter physical spec">{{old('physical_spec',$product->physical_spec)}}</textarea>
        </div>
        <div class="form-group">
          <label for="lightcolor">Light Color</label>
          <input  type="text" class="form-control admin-field" id="light_color" name="light_color" placeholder="Enter light color" value="{{old('light_color',$product->light_color)}}">
        </div>
        <div class="form-group">
          <label for="intro">Introduction</label>
          <textarea  class="form-control admin-field" id="introduction" name="introduction" placeholder="Enter introduction">{{old('introduction',$product->introduction)}}</textarea>
        </div>
        <div class="form-group">
          <label for="accessories">Accessories Required</label>
          <input type="text" class="form-control admin-field" id="accessories_required" name="accessories_required" placeholder="Enter accessories" value="{{old('accessories_required',$product->accessories_required)}}">
        </div>
        <div class="form-group">
          <label for="warranty">Warranty</label>
          <input  type="text" class="form-control admin-field" id="warranty" name="warranty" placeholder="Enter warranty" value="{{old('warranty',$product->warranty)}}">
        </div>
        <div class="form-group">
          <label for="catid">Technical Spec</label>
          <textarea  class="form-control admin-field" id="technical_spec" name="technical_spec" placeholder="Enter technical spec">{{old('technical_spec',$product->name)}}</textarea>
        </div>
        <div class="form-group">
          <label for="addfea">Additional Features</label>
          <input  type="text" class="form-control admin-field" id="additional_features" name="additional_features"placeholder="Enter additional features" value="{{old('additional_features',$product->additional_features)}}">
        </div>
        <div class="form-group">
          <label>Wired or Wireless</label>
          <div class="radio">
            <label>
            <input type="radio" name="wired_wireless" id="wired_wireless" value="wired" {{old('wired_wireless', $product->wired_wireless) == 'wired' ? 'checked' : '' }} checked>
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
           <button type="Button" style="position: relative; left: 25%" class="btn btn-primary dynamicdisplay">Edit additional Properties<i style="position:relative;left:5px;" class="fa fa-arrow-up"></i></button> 
          <div class="list_wrapper">
            <div class="row">
   
              <div class="col-xs-4 col-sm-4 col-md-4">
   
                <div class="form-group">              
                  <label>Label</label>
                  <input name="dynamicfield[0][label]" type="text" placeholder="Type Label" class="form-control"/>
                </div>
              </div>
   
              <div class="col-xs-7 col-sm-7 col-md-7">
                <div class="form-group">
                  <label>Value</label>
                  <input autocomplete="off" name="dynamicfield[0][value]" type="text" placeholder="Type Value" class="form-control"/>
                </div>
              </div> 
   
              <div class="col-xs-1 col-sm-1 col-md-1">
                <br>
                <button class="btn btn-success list_add_button" type="button"><i class="fa fa-plus-circle"></i></button>
              </div>
            </div> 
            @if(!empty($additional_prop_array))
            <?php $i=0;?>
            @foreach($additional_prop_array as $item)
            <?php $i++;?>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">  <div class="form-group">
                  <input name="dynamicfield[<?php echo $i;?>][label]" value="{{$item['label']}}" type="text" placeholder="Type Label" class="form-control"/>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-7">  <div class="form-group">
                  <input name="dynamicfield[<?php echo $i;?>][value]" value="{{$item['value']}}"type="text" placeholder="Type Value" class="form-control"/>
                </div>
              </div>
              <div class="col-xs-1 col-sm-7 col-md-1"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div>
            </div>
            @endforeach 
            @endif
          </div>
          
          <div class="form-group">
            <label for="image">Add more Product Image/Images</label>
            <div class="input-group increment">
             <!--  <div class="custom-file">
                <input type="file" class="custom-file-input" id="image"  name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div> -->
          <input type="file" class="form-control" name="filename[]"  id="fileupload"  multiple>
              <!--   <div class="input-group-btn">
                  <button type="button" class="btn btn-success addnewfield">Add</button>
                </div> -->  
            </div>
             <br/>
            <div id="image_preview"></div>
            

          </div> 
          <div class="row">
            <?php $i =0;?>
          @foreach($serializedimage as $item)
           <div class="col-xs-12 col-sm-6 col-md-6" style="margin:15px 5px; position: relative;left: 25%">
            <img src="/thumbnail/{{$id}}/{{$item}}" class="{{$item}}" alt="Image Alternative text" title="Image Title"/> 
               <button style="margin:15px 5px;" type="button" id="<?php echo $i;?>" name ="{{ $item}}" class="btn btn-danger removeimage">Remove image<i style="margin-left: 8px" class="fa fa-trash"></i></button>
          </div>
          <?php $i++; ?>
            @endforeach
          </div>
        </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div><!-- /.box -->
@endsection 