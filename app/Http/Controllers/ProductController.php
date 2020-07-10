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
    $output = '<option value="" disabled selected>Select sub category</option>';
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
    $product->wired_wireless=$request->get('wirecon');
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
    $maincategory_id = $fetchconcept->cat_id;    
    if(!empty($maincategory_id)) {
      $maincategory_fetch = DB::table('categories')
         ->where('id', $maincategory_id)
         ->first();
      $maincategory = $maincategory_fetch->name;
      $fetchconcept->setAttribute('maincategory', $maincategory);
      $fetchconcept->setAttribute('maincategory_id', $maincategory_id);      
    }
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();    
    return view('admin.categoryedit', array ( 'fetchconcept' => $fetchconcept ), array('category' => $category ));
  } 

  

}
