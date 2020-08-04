<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Productimage as Productimage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
class FrontendController extends Controller
{
  /**
   * Function index()
   * returns frontend homepage.
   *
   * @return \Illuminate\Http\Response
  */
  public function index() {
    $productlist = 	Product::select('name', 'accessories_required', 'price')
    ->where('cat_id', 1)
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
  	return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories'));
  	}
}

