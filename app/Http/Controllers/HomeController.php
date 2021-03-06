<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Productimage as Productimage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Color as Color;
use App\Models\Compatibility as Compatibility;

class HomeController extends Controller {
  /**
    * Create a new controller instance.
    *
    * @return void
  */
  public function __construct() {
    $this->middleware(['auth', 'verified']);
  }

  /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index() {
    $user = Auth::user();
    $role =$user->role;
    /*echo $role;
    die;*/
    if($role == 'admin'){
      return view('home');
    } else {       
        $category = "Lighting";
        $productlist =  Product::select('id', 'name', 'accessories_required', 'price')
        ->where('cat_id', 1)
        ->get();
       $product_brand = Product::groupBy('brand_id')->where('cat_id', 1)->pluck('brand_id','brand_id');
      /*print_r($stock);
      die;*/
      $categoryid = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $categoryid[0];
      $subcategories = Category::select('id','name')
      ->where('cat_id', $cat_id)
      ->get();
      $brandlist = Brand::whereIn('id', $product_brand)->pluck("name","id");
        $categories = Category::select('id', 'name')
        ->where('cat_id', null)
        ->get();
        $typelist = Type::select('id', 'name')
        ->get();
        $compatibilitylist = Compatibility::select('id', 'name')
         ->get();
          $imagearray = array();
          $ima = array();
        foreach($productlist as $product) {
          $imagelist = Product::find($product['id']);          
          foreach ($imagelist->images as $image) {
            $imagearray[$product['id']][] = $image->product_images;          
          }
        } 
        if(!empty($imagearray)) {
          foreach($imagearray as $key => $value) {
            $ima[$key] =  $value[0];        
          }
        }
        $colorlist = Color::select('id', 'name')
      ->get();
        return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories','ima','subcategories','colorlist'))->with('category', $category);
        }
    }
    public function profile()
    {
      return view('admin.profile');
    }
}
