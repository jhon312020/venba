<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Productimage as Productimage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $role =$user->role;
        /*echo $role;
        die;*/
        if($role == 'admin'){
          return view('home');
        } else {
            $productlist =  Product::select('name', 'accessories_required', 'price')
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
    public function profile()
    {
      return view('admin.profile');
    }
}
