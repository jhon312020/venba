<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
class ProductController extends Controller
{
  public function product() {
    $product = DB::table('products')->select('id', 'name','material_no', 'compatibility', 'light_color')->wherenull('deleted_at')->get();
    return view('admin.product' , array ( 'product' => $product ));
    /*$category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
      
    return view('admin.productadd' , array ( 'category' => $category ));*/
  }
  public function add(Request $request) {
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
      
    return view('admin.productadd' , array ( 'category' => $category ));
  } 
  public function fetch(Request $request)    {
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = DB::table('categories')->select('id', 'name')
       ->where('cat_id', $value)
       ->get();
    $output = '<option value=""></option>';
    foreach($data as $row){
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
    echo $output;
    //die;
  }
  public function store(Request $request) {
    /*$category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();*/
     /*$image = $request->file('exampleInputFile');
     $product= $request->get('name');
     echo $image;
     echo $product;
     die;
    $box = $request->all();  
    echo '<pre>';
    print_r($box);
    echo '</pre>';   
    die;   
    $myValue=  array();
    parse_str($box['formdata'], $myValue);
    echo '<pre>';
    print_r($myValue);
    echo '</pre>';
     echo "hello";
     die;*/
     /*echo $request->get('name');
     echo $request->get('categoryid');
     die;*/
    $product= new Product();
    /*if($request->hasFile('image')) {
    $image = $request->file('image');    
    }*/
    /*echo "hello";
    echo $image;
    die;*/
    //$image =array_pop(explode('/', $images));
   /* echo $image;
    die;*/
    $product->name= $request->get('name');         
    $product->material_no=$request->get('materialno');
    $product->concept_id=$request->get('conceptid');
    $product->cat_id=$request->get('categoryid');
    $product->sub_cat_id=$request->get('subcatid');
    $product->compatibility=$request->get('compatability');
    $product->power_consumption=$request->get('power');
    $product->physical_spec=$request->get('physicalspec');
    $product->light_color=$request->get('lightcolor');
    $product->introduction=$request->get('intro');
    $product->accessories_required=$request->get('accessories');
    $product->warranty=$request->get('warranty');
    $product->technical_spec=$request->get('tech');
    $product->additional_features=$request->get('addfea');
    $product->wired_wireless=$request->get('wired');
    $image = $request->file('exampleInputFile');
    $name = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $name);
    $product->product_image=$name;
        
    $product->save();
   /* return view('admin.productadd' , array ( 'category' => $category ));*/
   /* $output ='<h6 align="center" style="color:green">Product Added</h6>';*/
    return response()->json([
       'message'   => '<h6 align="center" style="color:green">Product Added</h6>',
       'class_name'  => 'suc'
      ]);

  } 
  
   public function edit(Request $request, $id) {
    $fetchproduct = Product::where('id', $id)
       ->first();     
    $maincategory_id = $fetchproduct->cat_id;  
     $subcategory_id = $fetchproduct->sub_cat_id; 
     $maincategory_fetch = DB::table('categories')
         ->where('id', $maincategory_id)
         ->first();
      $maincategory = $maincategory_fetch->name;
      $fetchproduct->setAttribute('maincategory', $maincategory);
      $fetchproduct->setAttribute('maincategory_id', $maincategory_id);      

    if(!empty($subcategory_id)) {
      $subcategory_fetch = DB::table('categories')
         ->where('id', $subcategory_id)
         ->first();
      $subcategory = $subcategory_fetch->name;
      $fetchproduct->setAttribute('subcategory', $subcategory);
      $fetchproduct->setAttribute('subcategory_id', $subcategory_id);      
    }
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();    
    return view('admin.productedit', array ( 'fetchproduct' => $fetchproduct ), array('category' => $category ));
  } 

  public function update(Request $request) {
    $id= $request->get('id');
    if ($request->hasFile('exampleInputFile')) {
    $image = $request->file('exampleInputFile');
    $name = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $name);
    $updateproduct = DB::table('products')
              ->where('id', $id)
              ->update(['product_image' => $name
            ]);

    }
    $name= $request->get('name');         
    $material_no=$request->get('materialno');
    $concept_id=$request->get('conceptid');
    $cat_id=$request->get('categoryid');
    $sub_cat_id=$request->get('subcatid');
    $compatibility=$request->get('compatability');
    $power_consumption=$request->get('power');
    $physical_spec=$request->get('physicalspec');
    $light_color=$request->get('lightcolor');
    $introduction=$request->get('intro');
    $accessories_required=$request->get('accessories');
    $warranty=$request->get('warranty');
    $technical_spec=$request->get('tech');
    $additional_features=$request->get('addfea');
    $wired_wireless=$request->get('wired');
    /*echo $id;
    echo $materialno;
    die;*/
    /*$fetchconcept = DB::table('concepts')->select('id', 'name')
       ->where('id', $id)
       ->get();*/
    //$fetchconcept->msg ="Concept Edited";   
    //$editedname=$request->get('name');
    $updateproduct = DB::table('products')
              ->where('id', $id)
              ->update(['name' => $name, 'material_no' => $material_no, 'concept_id' => $concept_id, 'cat_id' =>$cat_id , 'sub_cat_id' => $sub_cat_id, 'compatibility' => $compatibility, 'power_consumption' => $power_consumption, 'physical_spec' => $physical_spec, 'light_color' =>$light_color , 'introduction' =>$introduction , 'accessories_required' =>$accessories_required , 'warranty' => $warranty, 'technical_spec' =>$technical_spec , 'additional_features' => $additional_features, 'wired_wireless' =>$wired_wireless]);
    
    return response()->json([
       'message'   => '<h6 align="center" style="color:green">Product Edited</h6>',
       'class_name'  => 'suc'
      ]);

     //die;          
  }
   public function delete(Request $request, $id) {
    $id =$request['id'];
    /*echo $id;
    die;*/
    //$id = Route::current()->parameter('id');
    $deletedrow = Product::where('id',$id)
    ->delete();

    /*$category= new Category();
    */
    //$data = Category::find($id)->delete();
    /*$product = DB::table('products')->select('id', 'name')
       ->wherenull('deleted_at')
       ->get();*/
    //$category->msg ="Category Deleted";
    /*if(empty($deletedrow)) {
      $product->msg =" Delete all sub categories related to this category";
    } else {*/
      //$category->msg ="Product Deleted";
    /*}*/
    //DB::table('concepts')->where('id', $id)->softDeletes();
    /*$concept= new Concept();
    $concept->name= $request['addconcept'];       
    $concept->save();*/
    $product = DB::table('products')->select( 'id', 'name', 'material_no', 'compatibility', 'light_color')
       ->wherenull('deleted_at')
       ->get();
       $product->msg ="Product Deleted";
    return view('admin.product', array ( 'product' => $product));

  }

}
