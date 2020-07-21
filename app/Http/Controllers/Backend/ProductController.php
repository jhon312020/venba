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
    /*echo '<pre>';
    print_r($request['filename']);
    echo '</pre>';
    die;*/
    //$images =$request['filename'];
    /*print_r($images);
    die;*/
    /*array_pop($images);
    print_r($images);
    die;*/
    //$data= array();

    
    
    $a =$request ['dynamicfield'];   
    if(!empty($a[0]['label'])){
      $serialized_array = serialize($request ['dynamicfield']);
    }

    
    //$dynamicfieldjson =json_encode($a);
    /*echo $a;
    die;*/

    /*echo count($a);
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    foreach($a as $a){
     echo  $a['label'];
      echo '<br>';
      echo $a['value'];
      echo '<br>';
    }
    die;
    print_r($a[0]);
    echo $a[0]['label'];
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    die;
    echo '<pre>';
    print_r($request->all());
    echo '</pre>';*/
    //$keys = array_keys($request);
    //echo $keys;
    //die;
    //foreach($request[$keys['list']] as $key=>$value) {
      //echo $value;
    //}
     /*die;*/
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
     /* if ($validatedData->fails()) {
        echo"hello";
        die;
                return $this->errorResponse($validator->errors()->all());
            }*/
    $show = Product::create($validatedData);
    /*$validatedData = $request->validate([
      'dynamicfield.label' => 'required',
      'dynamicfield.value' => 'required',
    ]);*/
    if(!empty($serialized_array)){
      /*echo $a;*/
      $adddynamicfield =Product::latest('created_at')->first()
        ->update(['additional_properties' => $serialized_array]);
      /*echo $adddynamicfield;
      die;*/
    }  
    if($request->hasFile('filename')) {
      /*echo "hello";
      die;*/
      foreach($request->file('filename') as $image) {
        $name =$image->getClientOriginalName();
        /*echo $name; 
        die;*/
        //echo $name;
        //echo '<br>';
        //die;
         //get filename without extension
        //$filename = pathinfo($name, PATHINFO_FILENAME);
        //echo $filename;
        //echo '<br>';
        //die;
        //get file extension
       // $extension = $image->getClientOriginalExtension();
        $image_name =$image->getClientOriginalName();
        /*echo $image_name;
        die;*/
        $lastRecord = Product::latest()->first();
        $latestid =$lastRecord->id;
     $destinationPath = public_path('/thumbnail/'.$latestid);
     File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
    /* echo $destinationPath;
     die;*/
       // echo $extension;
        //echo '<br>';
        //die;
        //small thumbnail name
        //$smallthumbnail = $filename.'_small_'.time().'.'.$extension;
        //echo $smallthumbnail;
        //echo '<br>';
        //create small thumbnail
       /* $thumbdestinationPath = public_path('/images/thumbnails');*/
         $resize_image = Image::make($image->getRealPath());

     $resize_image->resize(150, 150, function($constraint){
      $constraint->aspectRatio();
     })->save($destinationPath . '/' . $image_name);
        /*$smallthumbnailpath = public_path('storage/profile_images/thumbnail/'.$smallthumbnail);*/
       // echo $smallthumbnailpath;
        //echo '<br>';
        //die;
        //$this->createThumbnail($smallthumbnailpath, 150, 93);
        
        /*$request->file('profile_image')->storeAs('public/profile_images/thumbnail', $smallthumbnail);*/

        $destinationPath = public_path('/images/'.$latestid);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
        
        //$image->move($thumbdestinationPath, $name);
        $image->move($destinationPath, $name);
        $data[] = $name;
        //echo $name;
      }
      $images =json_encode($data);
       $newproductid =Product::latest()->first();
       $productid = $newproductid->id;
      //$addimages = Product::latest('created_at')->first()
        //->update(['product_image' => $images]);
       /*echo $productid;
       print_r($images);
       die;*/
        $insertimages =Productimage::create(
    array('product_id' => $productid, 'product_images' => $images));
    }

    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Added!'));
  }
  /**
 * Create a thumbnail of specified size
 *
 * @param string $path path of thumbnail
 * @param int $width
 * @param int $height
 */
  public function createThumbnail($path, $width, $height)
  {
    /*echo $path;
    echo $width;
    echo $height;
    die;*/
    /*$img = Image::make($path)->resize($width, $height, function ($constraint) {
          $constraint->aspectRatio();
    });
    $img->save($path);*/
    /*$img = Image::make($path)->resize($width, $height)->save($path);*/
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
    $datase = $imageunserialized->product_images;
    
    $serializedimage =json_decode($datase);
    /*echo '<pre>';
    print_r($serializedimage);
    echo '</pre>';
    die;*/
    //echo $record['sub_cat_id'];
    //die;
    $additional_prop_array='';
    if($record->additional_properties!= null){
    $additional_prop_array = unserialize($record->additional_properties);

    /*print_r($additional_prop_array);
    die;*/
    } 
    
    /*print_r($additional_prop_array);

    die;*/
    $subcategory = Category::select('id','name')
    ->where('id', $record['sub_cat_id'] )
    ->get(); 
    /*$removeindex =$subcategory->name;*/
    

    $concepts  = Concept::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    $subcategorylist  = Category::select('id','name')
    ->where('cat_id', $record['cat_id'] )
    /*->where('name','!=', $removeindex)*/
    ->get();
    /* print_r($subcategorylist);
    die;*/

    /*$subcategorylist=$subcategorylist->toArray();*/
    /*print_r($subcategorylist);
    die;*/

     /*= array_map(function($object){
    return (array) $object;
}, $subcategorylist);*/
    /*print_r($subcategorylist);
    die;*/
    
   /* print_r($subcategory);
    echo '<br>';*/
   /* $index = array_search($removeindex,$subcategorylist);*/
    /*echo $index;
    die;*/
    /*    if($index !== FALSE){
          unset($subcategorylist[$index]);
        }
        echo '<pre>';
      print_r($subcategorylist
      );
      echo '</pre>';
      die;*/   
    //$subcategorylist =array_diff($subcategorylist, $subcategory);
   /* $subcategorylist = array_unique( array_merge($subcategorylist, $subcategory) );*/
    /*print_r($subcategorylist) ;
    die;*/
     //$subcategory->id= $id;
     /*print_r($subcategory);
    die;*/
    /*$subcategory =$subcategory->toArray();*/
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
    
    //die;
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
    /*echo $imagename;
    echo $id;
    die;*/
    /*echo "success";
    die;*/
    $image_path = public_path()."/images/".$id."/".$imagename; 
    $thumbnailimage_path =public_path()."/thumbnail/".$id."/".$imagename; 
    /*echo $image_path;
    die; */
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
    /*print_r($serializedimage);
    die;
    */
    $updatedimages =json_encode($serializedimage);
     $updateimagesquery =Productimage::where('product_id', $id)
        ->update(['product_images' => $updatedimages]);
        /*echo $updateimagesquery;
        die;*/
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
    /*if($request->hasFile('filename')) {
      echo "hello";
      die;
    }
    echo '<pre>';
    print_r($request->all());
    echo '</pre>';
    die;*/
    //$option = $request ['wired_wireless'];
    $a =$request ['dynamicfield'];
    /*echo $a[1]['label'];
    die;*/
    //print_r($a);
    //die;
    if(!empty($a[0]['label'])) {
      $serialized_array = serialize($request ['dynamicfield']);
      //if($serialized_array){
      /*echo $a;*/
      $adddynamicfield =Product::whereId($id)
        ->update(['additional_properties' => $serialized_array]);
      /*echo $adddynamicfield;
      die;*/
      //}  
    } elseif(!empty($a[1]['label'])) {
      $a=$request ['dynamicfield'];
      array_shift($a);
      /*print_r($a);
      die;*/
      $serialized_array = serialize($a);
      //if($serialized_array){
      /*echo $a;*/
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
      /*echo "hello";
      die;*/
      
      foreach($request->file('filename') as $image) {
        $name =$image->getClientOriginalName();
        //$image_name =$image->getClientOriginalName();
       /*$lastRecord = Product::latest()->first();
        $latestid =$lastRecord->id;*/
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
      //$images =json_encode($data);
       /*$newproductid =Product::latest()->first();
       $productid = $newproductid->id;*/
       /*echo $images;
       die;*/
       $retrivejson = Productimage::select('product_images')
       ->where('product_id', $id)
       ->first();
       $encodedimage =$retrivejson->product_images;
       $imagesarray =json_decode($encodedimage);
      $mergedimages= array_merge($imagesarray,$data);
      /* print_r($mergedimages);
       die;*/
      
        $insertimages =Productimage::where('product_id', $id)->update(['product_images' => $mergedimages]);
    }
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Updated!'))/*->compact('option')*/;     
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
