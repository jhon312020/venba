<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
      public function product()
    {
        return view('admin.productadd');
    }
    public function store(Request $request)
    {
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
        return view('admin.productadd');

    }
}
