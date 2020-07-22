<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Concept as Concept;
use App\Models\Category as Category;
use App\Models\Productimage as Productimage;
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
  public function __construct() {
    $this->middleware('auth');
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
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    return view('backend.product.add', compact('concepts', 'categories'));
  }
  /**
   * Function fetch()
   * display sub category dropdown based on main category.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function fetch(Request $request) {
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = Category::select('id', 'name')
       ->where('cat_id', $value)
       ->get();
    $output = '<option value="" disabled selected>Select sub category</option>';
    foreach($data as $row){
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
    echo $output;
    
    //die;
  }

  /**
   * Function Store()
   * Store a newly created Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function store(Request $request ) {      
    
    $a =$request ['dynamicfield'];   
    if(!empty($a[0]['label'])){
      $serialized_array = serialize($request ['dynamicfield']);
    }

    $validatedData = $request->validate([
      'name' => 'required',
      'material_no' => 'required|int',
      'concept_id' => 'required',
      'cat_id' => 'required',
      'sub_cat_id' => 'required',
      'compatibility' => '',
      'power_consumption' => '',
      'physical_spec' => '',
      'light_color' => '',
      'introduction' => '',
      'accessories_required' => '',
      'warranty' => '',
      'technical_spec' => '',
      'additional_features' => '',
      'wired_wireless' => 'in:wired,wireless',
      'filename' => '',
      'filename.*' =>'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
      ]);     
    $show = Product::create($validatedData);    
    if(!empty($serialized_array)){
      $adddynamicfield =Product::latest('created_at')->first()
        ->update(['additional_properties' => $serialized_array]);
    }  
    if($request->hasFile('filename')) {
      foreach($request->file('filename') as $image) {
        $name =$image->getClientOriginalName();
        $image_name =$image->getClientOriginalName();
        $lastRecord = Product::latest()->first();
        $latestid =$lastRecord->id;
     $destinationPath = public_path('/thumbnail/'.$latestid);
     File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
         $resize_image = Image::make($image->getRealPath());

     $resize_image->resize(150, 150, function($constraint){
      $constraint->aspectRatio();
     })->save($destinationPath . '/' . $image_name);
        $destinationPath = public_path('/images/'.$latestid);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
        $image->move($destinationPath, $name);
        $data[] = $name;
      }
      $images =json_encode($data);
       $newproductid =Product::latest()->first();
       $productid = $newproductid->id;
        $insertimages =Productimage::create(
    array('product_id' => $productid, 'product_images' => $images));
    }

    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Added!'));
  }
  /**
   * Function edit()
   * Display the specified Product.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $record = Product::findOrFail($id);
    $imageunserialized =Productimage::select('product_images')
    ->where('product_id', $id)
    ->first();
    if(!empty($imageunserialized)){
    $datase = $imageunserialized->product_images;    
    $serializedimage =json_decode($datase);
   }
   $serializedimage='';
    $additional_prop_array='';
    if($record->additional_properties!= null){
    $additional_prop_array = unserialize($record->additional_properties);
    } 
    $subcategory = Category::select('id','name')
    ->where('id', $record['sub_cat_id'] )
    ->get();
    $concepts  = Concept::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    $subcategorylist  = Category::select('id','name')
    ->where('cat_id', $record['cat_id'] )    
    ->get();
    return view('backend.product.edit' , array ( 'product' => $record, 'concepts'=>$concepts, 'categories'=>$categories,'subcategory'=>$subcategory, 'subcategorylist'=>$subcategorylist, 'additional_prop_array' => $additional_prop_array,'serializedimage' => $serializedimage, 'id' =>$id));
  }
  /**
   * Function fetch()
   * display sub category dropdown based on main category.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function editfetch(Request $request) {
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = Category::select('id', 'name')
       ->where('cat_id', $value)
       ->get();
    $output = '<option value="" disabled selected>Select sub category</option>';
    foreach($data as $row){
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
    echo $output;
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
    $imageindex = $request->get('imageid');
    $imagename = $request->get('imagename');
    $image_path = public_path()."/images/".$id."/".$imagename; 
    $thumbnailimage_path =public_path()."/thumbnail/".$id."/".$imagename;
    // Value is not URL but directory file path
    if(File::exists($image_path)) {
        File::delete($image_path);
    }
    if(File::exists($thumbnailimage_path)) {
        File::delete($thumbnailimage_path);
    }
    $imageunserialized =Productimage::select('product_images')
    ->where('product_id', $id)
    ->first();
    $datase = $imageunserialized->product_images;    
    $serializedimage =json_decode($datase);
   unset($serializedimage[$imageindex]);
    $serializedimage =array_values($serializedimage);
    $updatedimages =json_encode($serializedimage);
     $updateimagesquery =Productimage::where('product_id', $id)
        ->update(['product_images' => $updatedimages]);
        $success =true;
        $message ="The image has been deleted successfully";
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
    $a =$request ['dynamicfield'];
    if(!empty($a[0]['label'])) {
      $serialized_array = serialize($request ['dynamicfield']);
      $adddynamicfield =Product::whereId($id)
        ->update(['additional_properties' => $serialized_array]);
    } elseif(!empty($a[1]['label'])) {
      $a=$request ['dynamicfield'];
      array_shift($a);
      $serialized_array = serialize($a);
      $adddynamicfield =Product::whereId($id)
        ->update(['additional_properties' => $serialized_array]);

      } else {
        $adddynamicfield =Product::whereId($id)
          ->update(['additional_properties' => NULL]);
       }
    $validatedData = $request->validate([
      'name' => 'required|',
      'material_no' => 'required|int',
      'concept_id' => 'required',
      'cat_id' => 'required',
      'sub_cat_id' => 'required',
      'compatibility' => '',
      'power_consumption' => '',
      'physical_spec' => '',
      'light_color' => '',
      'introduction' => '',
      'accessories_required' => '',
      'warranty' => '',
      'technical_spec' => '',
      'additional_features' => '',
      'wired_wireless' => '',
    ]);
    Product::whereId($id)->update($validatedData);
    if($request->hasFile('filename')) {      
      foreach($request->file('filename') as $image) {
        $name =$image->getClientOriginalName();
     $destinationPath = public_path('/thumbnail/'.$id);
     File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
    
         $resize_image = Image::make($image->getRealPath());

     $resize_image->resize(150, 150, function($constraint){
      $constraint->aspectRatio();
     })->save($destinationPath . '/' . $name);   

    $destinationPath = public_path('/images/'.$id);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);       
        
        $image->move($destinationPath, $name);
        $data[] = $name;        
      }
       $retrivejson = Productimage::select('product_images')
       ->where('product_id', $id)
       ->first();
       $encodedimage =$retrivejson->product_images;
       $imagesarray =json_decode($encodedimage);
      $mergedimages= array_merge($imagesarray,$data);     
        $insertimages =Productimage::where('product_id', $id)->update(['product_images' => $mergedimages]);
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
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}
