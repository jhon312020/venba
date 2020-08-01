<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type as Type;

class TypeController extends Controller
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
   * Display a listing of the types.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $types  = Type::all();
    return view('backend.type.index' , compact('types'));
  }
  
  /**
   * Function add()
   * Displays the add type form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
  	return view('backend.type.add');
  }

  /**
   * Function Store()
   * Store a newly created type in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */	
  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    if (Type::where('name', '=', $request['name'])->exists()) {
       return back()->with('flash_danger', 'Type Already Exists!!');
    } else {
    $show = Type::create($validatedData);
    return redirect()->route('admin.type.index')->withFlashSuccess(__('Successfully Added!'));
    }
  }

  /**
   * Function edit()
   * Display the specified type.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
  	$record = Type::select('id', 'name')
       ->findOrFail($id);
	  return view('backend.type.edit' , array ( 'type' => $record));
  }

  /**
   * Function update()
   * Update the specified type in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    Type::whereId($id)->update($validatedData);
  	return redirect()->route('admin.type.index')->withFlashSuccess(__('Successfully Updated!'));
	         
	}

  /**
   * Function destroy()
   * Does a soft delete of specified type from table.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function destroy($id) {
    $type = Type::findOrFail($id);
    $type->delete();
    return redirect()->route('admin.type.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}