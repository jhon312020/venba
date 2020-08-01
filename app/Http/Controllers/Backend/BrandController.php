<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand as Brand;

class BrandController extends Controller
{
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
   * Display a listing of the brands.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $brands  = Brand::all();
    return view('backend.brand.index' , compact('brands'));
  }
  
  /**
   * Function add()
   * Displays the add brand form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
  	return view('backend.brand.add');
  }

  /**
   * Function Store()
   * Store a newly created brand in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */	
  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    if (Brand::where('name', '=', $request['name'])->exists()) {
       return back()->with('flash_danger', 'Brand Already Exists!!');
    } else {
    $show = Brand::create($validatedData);
    return redirect()->route('admin.brand.index')->withFlashSuccess(__('Successfully Added!'));
    }
  }

  /**
   * Function edit()
   * Display the specified brand.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
  	$record = Brand::select('id', 'name')
       ->findOrFail($id);
	  return view('backend.brand.edit' , array ( 'brand' => $record));
  }

  /**
   * Function update()
   * Update the specified brand in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    Brand::whereId($id)->update($validatedData);
  	return redirect()->route('admin.brand.index')->withFlashSuccess(__('Successfully Updated!'));
	         
	}

  /**
   * Function destroy()
   * Does a soft delete of specified brand from table.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function destroy($id) {
    $brand = Brand::findOrFail($id);
    $brand->delete();
    return redirect()->route('admin.brand.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}