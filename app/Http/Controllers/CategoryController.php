<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
  
  public function category() {      
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
     return view('admin.category' , array ( 'category' => $category ));
  }
  public function store(Request $request) {
    $category= new Category();
    $category->name= $request['addcategory']; 
    $category->cat_id= $request['catid'];  
	  $category->save();
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
	  return view('admin.category', array ( 'category' => $category ));;

  }
}
