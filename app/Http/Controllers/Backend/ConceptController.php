<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concept as Concept;

/**
 * Create a new controller instance.
 *
 * @return void
 */
class ConceptController extends Controller {
 
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
   * Display a listing of the concepts.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $concepts  = Concept::all();
    return view('backend.concept.index' , compact('concepts'));
  }
  
  /**
   * Function add()
   * Displays the add concept form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
  	return view('backend.concept.add');
  }

  /**
   * Function Store()
   * Store a newly created concept in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */	
  public function store(Request $request) {
    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    if (Concept::where('name', '=', $request['name'])->exists()) {
       return back()->with('flash_danger', 'Concept Already Exists!!');
    } else {
    $show = Concept::create($validatedData);
    return redirect()->route('admin.concept.index')->withFlashSuccess(__('Successfully Added!'));
    }
  }

  /**
   * Function edit()
   * Display the specified concept.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
  	$record = Concept::select('id', 'name')
       ->findOrFail($id);
	  return view('backend.concept.edit' , array ( 'concept' => $record));
  }

  /**
   * Function update()
   * Update the specified concept in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    $validatedData = $request->validate([
      'name' => 'required|max:25',
    ]);
    Concept::whereId($id)->update($validatedData);
  	return redirect()->route('admin.concept.index')->withFlashSuccess(__('Successfully Updated!'));
	         
	}

  /**
   * Function destroy()
   * Does a soft delete of specified concept from table.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function destroy($id) {
    $concept = Concept::findOrFail($id);
    $concept->delete();
    return redirect()->route('admin.concept.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}
