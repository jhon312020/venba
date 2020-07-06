<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
     public function category()
    {
      return view('admin.category');
    }
    public function store(Request $request)
    {
      $category= new Category();
      $category->name= $request['addcategory']; 
      $category->cat_id= $request['catid'];  
	    $category->save();
	    return view('admin.category');

    }
}
