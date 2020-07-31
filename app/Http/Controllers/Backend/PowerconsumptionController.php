<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Powerconsumption as Powerconsumption;
class PowerconsumptionController extends Controller
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
   * Display a listing of the concepts.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $powerconsumptions  = Powerconsumption::all();
    return view('backend.powerconsumption.index' , compact('powerconsumptions'));
  }
  
  /**
   * Function add()
   * Displays the add concept form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
  	return view('backend.powerconsumption.add');
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
    if (Powerconsumption::where('name', '=', $request['name'])->exists()) {
       return back()->with('flash_danger', 'Powerconsumption Already Exists!!');
    } else {
    $show = Powerconsumption::create($validatedData);
    return redirect()->route('admin.powerconsumption.index')->withFlashSuccess(__('Successfully Added!'));
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
  	$record = Powerconsumption::select('id', 'name')
       ->findOrFail($id);
	  return view('backend.powerconsumption.edit' , array ( 'powerconsumption' => $record));
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
    Powerconsumption::whereId($id)->update($validatedData);
  	return redirect()->route('admin.powerconsumption.index')->withFlashSuccess(__('Successfully Updated!'));
	         
	}

  /**
   * Function destroy()
   * Does a soft delete of specified concept from tan;e.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
	public function destroy($id) {
    $concept = Powerconsumption::findOrFail($id);
    $concept->delete();
    return redirect()->route('admin.powerconsumption.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}
