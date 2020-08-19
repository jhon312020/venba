<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color as Color;

class ColorController extends Controller {
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
    $colors  = Color::all();
    return view('backend.color.index' , compact('colors'));
  }
  
  /**
   * Function add()
   * Displays the add brand form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
  	return view('backend.color.add');
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
    if (Color::where('name', '=', $request['name'])->exists()) {
       return back()->with('flash_danger', 'Color Already Exists!!');
    } else {
    $show = Color::create($validatedData);
    return redirect()->route('admin.color.index')->withFlashSuccess(__('Successfully Added!'));
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
  	$record = Color::select('id', 'name')
       ->findOrFail($id);
	  return view('backend.color.edit' , array ( 'color' => $record));
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
    Color::whereId($id)->update($validatedData);
  	return redirect()->route('admin.color.index')->withFlashSuccess(__('Successfully Updated!'));
	         
	}

  /**
   * Function destroy()
   * Does a soft delete of specified brand from table.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function destroy($id) {
    $brand = Color::findOrFail($id);
    $brand->delete();
    return redirect()->route('admin.color.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}

