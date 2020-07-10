<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
  
  public function category() {  
    $category = DB::table('categories')->select('id', 'name')->wherenull('deleted_at')->get();
    return view('admin.category' , array ( 'category' => $category ));
  }
  public function add(Request $request) {
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
    return view('admin.categoryadd' , array ( 'category' => $category ));
  }
  
  public function store(Request $request) {
    $category= new Category();
    $category->name= $request->get('name'); 
    $category->cat_id= $request->get('id');  
	  $category->save();
   // $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
	  /*return view('admin.category', array ( 'category' => $category ));;*/
    $output ='<h6 align="center" style="color:green">Category Added</h6>';
    echo $output;

  }
  public function edit(Request $request, $id) {
    //$id = Route::current()->parameter('id');

    $fetchcategory = Category::where('id', $id)
       ->first(); 
       /*$fetchconcept->setAttribute('test', 'blablabla');
       print_r($fetchconcept);
       die; */     
    $maincategory_id = $fetchcategory->cat_id;/*
    $id=$fetchconcept->id;
    echo $id;
    die;*/
    
    if(!empty($maincategory_id)) {
      $maincategory_fetch = DB::table('categories')
         ->where('id', $maincategory_id)
         ->first();

      $maincategory = $maincategory_fetch->name;
      $fetchcategory->setAttribute('maincategory', $maincategory);
      $fetchcategory->setAttribute('maincategory_id', $maincategory_id);
      /*echo $maincategory;
      die;*/
      //$fetchconcept->maincategory = $maincategory;
    }
    $category = DB::table('categories')->select('id', 'name') ->whereNull('cat_id')->get();
    /*$result = json_decode(json_encode($category, true));
    print_r($result);
    die;
    foreach($result as $item){
      echo $item;
    }
    die;*/
    /*$extended = (object) array_merge((array)$fetchconcept, (array)$category);
    echo '<pre>';
    print_r($extended);
    echo '</pre>';
    die;*/
    //$
    /*$concept= new Concept();
    $concept->name= $request['addconcept'];       
    $concept->save();*/
    //return view('admin.categoryedit') ->with('fetchconcept', $fetchconcept)
    //->with('category', $category);
    return view('admin.categoryedit', array ( 'fetchcategory' => $fetchcategory ), array('category' => $category ));

  }
  public function update(Request $request) {
    $id=$request->get('id');
    $cat_id=$request->get('cat_id');
    /*$fetchconcept = DB::table('concepts')->select('id', 'name')
       ->where('id', $id)
       ->get();*/
    //$fetchconcept->msg ="Concept Edited";   
    $editedname=$request->get('name');
    $updatecategory = DB::table('categories')
              ->where('id', $id)
              ->update(['name' => $editedname, 'cat_id' => $cat_id]);
    $output ='<h6 align="center" style="color:green">Category Edited</h6>';
    echo $output;
     //die;          
  }
  public function delete(Request $request, $id) {
    $id =$request['id'];
    /*echo $id;
    die;*/
    //$id = Route::current()->parameter('id');
    $deletedrow = Category::where('id',$id)
    ->wherenull('cat_id')
    ->delete();

    $category= new Category();
    
    //$data = Category::find($id)->delete();
    $category = DB::table('categories')->select('id', 'name')
       ->wherenull('deleted_at')
       ->get();
    //$category->msg ="Category Deleted";
    if(empty($deletedrow)) {
      $category->msg =" Delete all sub categories related to this category";
    } else {
      $category->msg ="Category Deleted";
    }
    //DB::table('concepts')->where('id', $id)->softDeletes();
    /*$concept= new Concept();
    $concept->name= $request['addconcept'];       
    $concept->save();*/
    return view('admin.category', array ( 'category' => $category));

  }
}
