<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Concept as Concept;
use App\Models\Category as Category;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
use App\Models\PowerConsumption as PowerConsumption;
use App\Models\Image as ProductImage;
use App\Models\ProductPower as ProductPower;
use Image;
use File;

/**
 * Create a new controller instance.
 *
 * @return void
 */
class ProductController extends Controller {
 
  /**
   * Function constructor()
   * 
   * @return \Illuminate\Http\Response
   */
  private $productValidator = array();
  public function __construct() {
    $this->middleware('auth');
    $this->productValidator = [
      'name' => 'required',
      'material_no' => 'required|int',
      'concept_id' => 'required',
      'cat_id' => 'required',
      'sub_cat_id' => 'required',
      'brand_id' => '',
      'type_id' => '',
      'compatibility_id' => '',
      'power_consumption_id' => '',
      'physical_spec' => '',
      'light_color' => '',
      'introduction' => '',
      'accessories_required' => '',
      'warranty' => '',
      'technical_spec' => '',
      'additional_features' => '',
      'wired_wireless' => 'in:wired,wireless',
      'price' =>'required',
      'igst' =>'required',
      'sgst' =>'required',
      'transit' =>'required',
      'additional_properties'=>'',
      'filename' => '',
      'filename.*' =>'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
    ];

  }
  
  /**
   * Function index()
   * Display a listing of the Products.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $products  = Product::all();
    return view('backend.product.index' , compact('products'));
  }
  
  /**
   * Function add()
   * Displays the add Product form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
    $concepts  = Concept::all()->pluck('name', 'id');
    $brands  = Brand::all()->pluck('name', 'id');
    $types  = Type::all()->pluck('name', 'id');
    $compatibilities  = Compatibility::all()->pluck('name', 'id');
    $powerconsumption = PowerConsumption::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    $subcategories = array();
    if ($request->session()->has('_old_input')) {
      $old_data = $request->session()->get('_old_input');
      $cat_id = $old_data['cat_id'];
      $subcategories  = Category::where('cat_id', $cat_id)->pluck('name','id');
    } 
    return view('backend.product.add', compact('concepts', 'categories', 'subcategories','brands', 'types', 'compatibilities','powerconsumption'));
  }

  /**
   * Function Store()
   * Store a newly created Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function store(Request $request) {
    $validatedData = $request->validate($this->productValidator);
    $dynamicField = $request['dynamicfield']; 
    if (!empty($dynamicField)) {
      foreach ($dynamicField as $key => $value) {
        $dy[$key] = $value;
        # code...
      }     
      
      $validatedData['additional_properties'] = serialize($dy);
    }
    $show = Product::create($validatedData); 
    if ($request->hasFile('filename')) {
      $images = $this->_createThumbnail($request->file('filename'), $show->id);
     foreach($images as $image) {
        $insertimages = ProductImage::create(
        array('product_id' => $show->id, 'name' => $image));
      }
    }
     
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Added!'));
  }

  /**
   * Function edit()
   * Display the specified Product.
   *
   * @param  int  $id
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Request $request) {
    $record = Product::findOrFail($id);
    if ($request->session()->has('_old_input')) {
      $old_data = $request->session()->get('_old_input');
      $cat_id = $old_data['cat_id'];
      $record['sub_cat_id'] = '';
    } else {
      $cat_id = $record['cat_id'];
    }
    $dynamicfieldcount = null;
    $brand = null;
    $type = null;
    $compatibility = null;
    //$powerconsumption = null;
    $serializedimage = null;
    $additional_prop_array = null;
    $power = null;
    $images = ProductImage::where('product_id', $id)
      ->pluck('name', 'id');   
    $no_of_images = count($images);
    if ($record->additional_properties != null) {
      $additional_prop_array = unserialize($record->additional_properties);
      $dynamicfieldcount = count($additional_prop_array);
    } 
    $concepts  = Concept::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    $subcategories  = Category::where('cat_id', $cat_id)->pluck('name','id');
    $brands  = Brand::all()->pluck('name', 'id');
    $types  = Type::all()->pluck('name', 'id');
    $compatibilities  = Compatibility::all()->pluck('name', 'id');
    $powerconsumption = PowerConsumption::all()->pluck('name', 'id');
    return view('backend.product.edit' , array ( 'product' => $record, 'concepts'=> $concepts, 'categories'=> $categories,'subcategories'=> $subcategories, 'additional_prop_array' => $additional_prop_array,'images' => $images, 'id' => $id,'dynamicfieldcount' => $dynamicfieldcount,'brands' => $brands, 'types' => $types, 'compatibilities'=> $compatibilities, 'powerconsumption' => $powerconsumption,'imagecount' => $no_of_images ));
  }

  /**
   * Function deleteimage()
   * Delete the image of Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function deleteimage(Request $request ,$id) {
    $imageId = $request->get('imageid');
    $imageName = $request->get('imagename');
    $image_path = public_path()."/images/".$id."/".$imageName; 
    $thumbnailimage_path = public_path()."/thumbnail/".$id."/".$imageName;
    $imagedeletepath=public_path()."/deletedimages/".$id."/"; 
    $thumbnaildeletepath=public_path()."/deletedimages/thumbnail/".$id."/"; 
    // Value is not URL but directory file path
    if (File::exists($image_path)) {
      File::isDirectory($imagedeletepath) or File::makeDirectory($imagedeletepath, 0755, true, true);
      File::move($image_path,$imagedeletepath.'/'.$imageName);
    }
    if (File::exists($thumbnailimage_path)) {
      File::isDirectory($thumbnaildeletepath) or File::makeDirectory($thumbnaildeletepath, 0755, true, true);
      File::move($thumbnailimage_path, $thumbnaildeletepath.'/'.$imageName);
    }
    ProductImage::findOrFail($imageId)->delete();
    //$imagetobedeleted->forceDelete();
    $success = true;
    $message = "The image has been deleted successfully";
    return response()->json([
      'success' => $success,
      'message' => $message,
    ]);

  }

  /**
   * Function update()
   * Update the specified Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $validatedData = $request->validate($this->productValidator);
    $dynamicField = $request ['dynamicfield'];
    $serialized_array = null;
    if (!empty($dynamicField)) {
      foreach ($dynamicField as $key => $value) {
        $dy[$key] = $value;
        # code...
      }
      $serialized_array = serialize($dy);
    }
    
    $validatedData['additional_properties'] = $serialized_array;
   
    unset($validatedData['filename']); 
    Product::whereId($id)->update($validatedData);
    if ($request->hasFile('filename')) {      
      $newImages = $this->_createThumbnail($request->file('filename'), $id);
        foreach($newImages as $image) { 
          $insertimage = ProductImage::create(['product_id'=> $id, 'name' => $image]);
          //$insertimage->save();
        }
    }
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Updated!'));    
  }

  /**
   * Function destroy()
   * Does a soft delete of specified Product from tan;e.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {    
    $images = ProductImage::where('product_id', $id);    
    if ($images->count()) {
      $productImages = $images->pluck('name');        
      foreach($productImages as $imagename) {
        $image_path = public_path()."/images/".$id."/".$imagename;
        $thumbnailimage_path = public_path()."/thumbnail/".$id."/".$imagename;
        $imagedeletepath=public_path()."/deletedimages/".$id."/"; 
        $thumbnaildeletepath=public_path()."/deletedimages/thumbnail/".$id."/"; 
        // Value is not URL but directory file path
        if (File::exists($image_path)) {
          File::isDirectory($imagedeletepath) or File::makeDirectory($imagedeletepath, 0755, true, true);
          File::move($image_path,$imagedeletepath.'/'.$imagename);
        }
        if (File::exists($thumbnailimage_path)) {
          File::isDirectory($thumbnaildeletepath) or File::makeDirectory($thumbnaildeletepath, 0755, true, true);
          File::move($thumbnailimage_path,$thumbnaildeletepath.'/'.$imagename);
        }
      }
    }
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}
