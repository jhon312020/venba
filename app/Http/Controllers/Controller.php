<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Image;
use File;

class Controller extends BaseController
{
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
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/thumbnail/'.$productId);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0755, true, true);
        $resize_image = Image::make($image->getRealPath());
        $resize_image->resize(150, 150, function($constraint) {
          $constraint->aspectRatio();
        })->save($destinationPath . '/' . $name);   
        $destinationPath = public_path('/images/'.$productId);
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0755, true, true);       
        $image->move($destinationPath, $name);
        $images[] = $name;        
      }
      return $images;
    }
}
