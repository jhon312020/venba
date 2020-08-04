<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Category as Category;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
class ProductlistingController extends Controller
{
  /**
   * Function index()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
  */
  public function index(Request $request, $category) {  
    
    $categoryid = Category::all()
        ->where('name', $category)
        ->pluck('id');
        $cat_id= $categoryid[0];        
    $productlist =  Product::select('name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id)
      ->get();
    $brandlist = Brand::select('id', 'name')
      ->get();
    $categories = Category::select('id', 'name')
      ->where('cat_id', null)
      ->get();
    $typelist = Type::select('id', 'name')
      ->get();
    $compatibilitylist = Compatibility::select('id', 'name')
      ->get();
  	/*$products = Product::select('id','name','material_no','concept_id','cat_id','sub_cat_id','compatibility_id',
      'power_consumption_id','physical_spec','light_color',
      'introduction','accessories_required','warranty',
      'technical_spec','additional_features','wired_wireless','price')
      ->get();
      $product =array();
        foreach ($products as $item) {
	      $product[$item->id ]['name'] = $item->name ; 
	      } 
	      print_r($product);
	      die;*/
      /*$categories = Category::select('id', 'name')
        ->where('cat_id', null)
        ->get();*/
  	  return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories',))->with('category', $category);
    
  }
  /**
   * Function index()
   * Fetches the filtered list of the products.
   * 
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
  */
  public function filterproductlist(Request $request, $category) {
    //echo $category;
    $brand_id = $request->get('brandids');
   /* print_r($brand_id);
    die;*/
    $compatibility_id = $request->get('compatibilityids');
    $type_id = $request->get('typeids');
    $filters = [
     'brand_id' => $brand_id,
     'compatibility_id' => $compatibility_id,
     'type_id' => $type_id,
    ];
    $category_id = Category::all()
        ->where('name', $category)
        ->pluck('id');
        $cat_id= $category_id[0];     
    $productlist =  Product::select('name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id)
      ->where(function ($query) use ( $filters) {
        foreach ($filters as $column => $key) {
          $query->when($key, function ($query, $value) use ($column) {
            $query->whereIn($column, $value);
          });
        }
      })
      
      ->get();
      //print_r($productlist);
      $output = '';
      foreach($productlist as $product) {
      $output .= '<div class = "col-12 col-lg-4 mb-3 mb-lg-0">
                <div class = "card">
                    <img src = "frontend/images/product-img.jpg" class = "card-img-top" alt="">
                    <div class = "card-body">
                      <p class = "card-text">'.$product->name.'</p>                      
                      <div class = "row">                   
                        <div class = "col col-lg-12">
                          <p class = "card-text mb-0">'.$product->accessories_required.'</p>
                          <h5 class = "card-title">Rs.'.$product->price.'</h5>
                        </div>
                        <div class = "col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>';
    }
     
    echo $output;

  }
   /**
   * Function imagefetch()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */
  public function imagefetch(Request $request) {
  	$imageunserialized = Productimage::select('product_id' ,'product_images')
      ->get();
    $image = array();   
    foreach ($imageunserialized as $item) {
	    $image[$item->product_id]['encoded'] = $item->product_images ; 	        	
    }
  }
  /**
   * Function productlistfetch()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */

  public function productlistfetch(Request $request) {
  	$product = array();
  	$products = Product::select('id','name','material_no','concept_id','cat_id','sub_cat_id','compatibility',
      'power_consumption','physical_spec','light_color',
      'introduction','accessories_required','warranty',
      'technical_spec','additional_features','wired_wireless','price')
      ->get();
      //$id = $products=>'id';
    foreach ($products as $item) {
	    $product[$item->id]['name'] = $item->name ; 
	    $product[$item->id]['material_no '] = $item->material_no ; 
	    $product[$item->id]['concept_id'] = $item->concept_id ;
	    $product[$item->id]['cat_id'] = $item->cat_id ;
	    $product[$item->id]['sub_cat_id'] = $item->sub_cat_id ;
	    $product[$item->id]['compatibility'] = $item->compatibility ;
	    $product[$item->id]['power_consumption'] = $item->power_consumption;
	    $product[$item->id]['physical_spec '] = $item->physical_spec ;
	    $product[$item->id]['light_color'] = $item->light_color ;
	    $product[$item->id]['introduction'] = $item->introduction ;
	    $product[$item->id]['accessories_required'] = $item->accessories_required ;
	    $product[$item->id]['warranty'] = $item->warranty ;
	    $product[$item->id]['technical_spec'] = $item->technical_spec ;
	    $product[$item->id]['additional_features'] = $item->additional_features ;
	    $product[$item->id]['wired_wireless'] = $item->wired_wireless ;
	    $product[$item->id]['price'] = $item->price ;     	
    }
  }
}
