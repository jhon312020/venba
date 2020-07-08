<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
class ProductController extends Controller
{
  public function product() {
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
    die;
  }
    

  public function store(Request $request) {
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
     
    $product= new Product();
    
    $product->name= $request['name'];         
    $product->material_no=$request['materialno'];
    $product->concept_id=$request['conceptid'];
    $product->cat_id=$request['categoryid'];
    $product->sub_cat_id=$request['subcatid'];
    $product->compatibility=$request['compatability'];
    $product->power_consumption=$request['power'];
    $product->physical_spec=$request['physicalspec'];
    $product->light_color=$request['lightcolor'];
    $product->introduction=$request['intro'];
    $product->accessories_required=$request['accessories'];
    $product->warranty=$request['warranty'];
    $product->technical_spec=$request['tech'];
    $product->additional_features=$request['addfea'];
    $product->wired_wireless=$request['wired'];
    $image = $request->file('proimage');
    $name = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $name);
    $product->product_image=$name;
        
    $product->save();
    return view('admin.productadd' , array ( 'category' => $category ));

  }

}
