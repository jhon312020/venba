<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category as Category;
use App\Models\Product as Product;
use Image;
use File;
use Session;

class Controller extends BaseController {
  
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    /**
	   * Function pr()
	   * prints the array in the given format.
	   *
	   * @param  $data as array
	   * @return array
	   */
    function pr($data) {
    	echo '<pre>';
    	print_r($data);
    	echo '</pre>';
    }

  	/**
	   * Function _createThumbnail()
	   * Update the specified Product in table.
	   *
	   * @param  $files as array
	   * @param  int  $id
	   * @return array
	   */
    function _createThumbnail($files, $productId) {
    	$images = array();
    	foreach($files as $image) {
            $ext =$image->getClientOriginalExtension();
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/thumbnail/'.$productId);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0755, true, true);
        $resize_image = Image::make($image->getRealPath());
        
        if (file_exists( public_path() . '/thumbnail/' . $productId .'/'. $name)) {
            $name =preg_replace('/.[^.]*$/', '', $name);
            $add = rand();
            $name= $name.$add.'.'.$ext;
        } 
        $resize_image->resize(100, 100, function($constraint) {
          $constraint->aspectRatio();
        })->save($destinationPath . '/' . $name);   
        $destinationPath = public_path('/images/'.$productId);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0755, true, true);       
        $image->move($destinationPath, $name);
        $images[] = $name;        
      }
      return $images;
    }

  /**
   * Function category_fetch()
   * Update the specified Product in table.
   *
   * @return category records objects
   */
  public function category_fetch() {
    $categories = Category::select('id', 'name')
    ->where('cat_id', null)
    ->get();
    return $categories;
  }
   public function cart_fetch() {
    $cart = Session::get('cart');          
    $igst = 0;
    $sgst = 0;
    $transit = 0; 
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);
      if(!empty($productdet[$key]->igst)) {
        $igst = $igst +($productdet[$key]->price * ($productdet[$key]->igst)/100 ) * $value['quantity'];
      }
      if(!empty($productdet[$key]->igst)) {
        $sgst = $sgst +($productdet[$key]->price * ($productdet[$key]->sgst)/100 ) * $value['quantity'];
      }
      if(!empty($productdet[$key]->transit)) {
        $transit = $transit +($productdet[$key]->price * ($productdet[$key]->transit)/100 ) * $value['quantity'];
      }
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::put('igst', $igst);
      Session::put('sgst', $sgst);
      Session::put('transit', $transit);
      Session::save();
    }
     $igsttotal = Session::get('igst');
     $sgsttotal = Session::get('sgst');
     $transittotal = Session::get('transit');
     $total= 0;
     $producttotal= 0;
    foreach($cart as $key => $value) {
      $producttotal = $producttotal + $cart[$key]['price'] ;
    }     
    $total =$producttotal + $igsttotal + $sgsttotal + $transittotal;
    Session::put('producttotal', $producttotal);
    Session::put('total', $total);
    Session::save();
  }
}
