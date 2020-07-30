<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Productimage as Productimage;

class Productfrontview extends Controller {
  public function index() {
  	
      
      echo '<pre>';
      print_r($image);
      echo '</pre>';
      echo '<pre>';
      print_r($product);
      echo '</pre>';
      die;
      
  return view('frontend.productlist');
  }
  public function imagefetch(Request $request) {
  	$imageunserialized = Productimage::select('product_id' ,'product_images')
      ->get();
      $image=array();
      $product =array();
      $i=0;
      foreach ($imageunserialized as $item) {
      $image[$i]['id']=$item->product_id ;
      $image[$i]['encoded'] =$item->product_images ; 
      $i++;     	
      }
  }

  public function productlistfetch(Request $request) {
  	$products = Product::select('name','material_no','concept_id','cat_id','sub_cat_id','compatibility',
      'power_consumption','physical_spec','light_color',
      'introduction','accessories_required','warranty',
      'technical_spec','additional_features','wired_wireless','price')
      ->get();
      foreach ($products as $item) {
      $product[$i]['name']=$item->name ; 
      $product[$i]['material_no '] =$item->material_no ; 
      $product[$i]['concept_id'] =$item->concept_id ;
      $product[$i]['cat_id'] =$item->cat_id ;
      $product[$i]['sub_cat_id'] =$item->sub_cat_id ;
      $product[$i]['compatibility'] =$item->compatibility ;
      $product[$i]['power_consumption'] =$item->power_consumption;
      $product[$i]['physical_spec '] =$item->physical_spec ;
      $product[$i]['light_color'] =$item->light_color ;
      $product[$i]['introduction'] =$item->introduction ;
      $product[$i]['accessories_required'] =$item->accessories_required ;
      $product[$i]['warranty'] =$item->warranty ;
      $product[$i]['technical_spec'] =$item->technical_spec ;
      $product[$i]['additional_features'] =$item->additional_features ;
      $product[$i]['wired_wireless'] =$item->wired_wireless ;
      $product[$i]['price'] =$item->price ;
      $i++;     	
      }
  }
}
