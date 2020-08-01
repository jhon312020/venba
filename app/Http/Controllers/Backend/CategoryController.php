<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;

/**
 * Create a new controller instance.
 *
 * @return void
 */
class CategoryController extends Controller {
 
  /**
   * Function constructor()
   * 
   * @return \Illuminate\Http\Response
   */
  public function __construct() {
    $this->middleware('auth');
  }
  
  /**
   * Function index()
   * Display a listing of the categories.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $categories  = Category::all();
    return view('backend.category.index' , compact('categories'));
  }
  
  /**
   * Function add()
   * Displays the add category form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    return view('backend.category.add', compact('categories'));
  }

  /**
   * Function Store()
   * Store a newly created category in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => 'required|max:25',
      'cat_id' =>'nullable|int'
    ]);
    $show = Category::create($validatedData);
    return redirect()->route('admin.category.index')->withFlashSuccess(__('Successfully Added!'));
  }

  /**
   * Function edit()
   * Display the specified category.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $record = Category::select('id', 'name', 'cat_id')
       ->findOrFail($id);
    $categories  = Category::all()->where('id','!=', $id)->whereNull('cat_id')->pluck('name', 'id');
    return view('backend.category.edit' , array ( 'category' => $record, 'categories' => $categories));
  }

  /**
   * Function update()
   * Update the specified category in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $validatedData = $request->validate([
      'name' => 'required|max:25',
      'cat_id' =>'nullable|int'
    ]);
    Category::whereId($id)->update($validatedData);
    return redirect()->route('admin.category.index')->withFlashSuccess(__('Successfully Updated!'));
           
  }

  /**
   * Function destroy()
   * Does a soft delete of specified category from tan;e.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $category = Category::findOrFail($id);
    if (!$category->children->count()) {
      $category->delete();
    } else {
      return redirect()->route('admin.category.index')->withFlashDanger(__('Please delete the subcategory before deleting the main category!'));
    }
    return redirect()->route('admin.category.index')->withFlashSuccess(__('Successfully Deleted!'));
  }

  /**
   * Function getSubcategories()
   * Fetches subCategory list based on the category id
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function getSubcategories(Request $request) {
    $cat_id = $request->get('catId');
    $subCategories = Category::select('id', 'name')
       ->where('cat_id', $cat_id)
       ->get();
    $output = '<option value="" disabled selected>Select sub category</option>';
    foreach($subCategories as $subCategory){
      $output .= '<option value="'.$subCategory->id.'">'.$subCategory->name.'</option>';
    }
    echo $output;
  }
}

