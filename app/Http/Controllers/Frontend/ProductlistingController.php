<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
class ProductlistingController extends Controller
{
  /**
   * Function index()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
  */
  public function index() {   
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
  	return view('frontend.product.allcategorylist');
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
