<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Concept as Concept;
class ConceptAddEdit extends Controller
{
  public function concept() {
    $concepts = DB::table('concepts')
    ->wherenull('deleted_at')
    ->get();

    return view('admin.concept' , array ( 'concepts' => $concepts ));
  }
  public function add(Request $request) {
  	return view('admin.conceptadd');
  }	
  public function store(Request $request) {
    /*echo $request->get('name');
    echo "hellooooooooooooooooooo";
    die;*/
    //return response()->json(['message'=>'submitted'],200);
    //$fetchconcept = DB::table('concepts')->get();
    $concept= new Concept();
    //$concept->name= $request['addconcept']; 
    $concept->name= $request->get('name');      
    $concept->save();
    /*return view('admin.conceptadd')->withSuccess('Concept Added');*/
    $output ='<h6 align="center" style="color:green">Concept Added</h6>';
    echo $output;
  }
  public function edit(Request $request, $id) {
    //$id = Route::current()->parameter('id');
  	$fetchconcept = DB::table('concepts')->select('id', 'name')
       ->where('id', $id)
       ->get();
    /*$concept= new Concept();
    $concept->name= $request['addconcept'];       
	  $concept->save();*/
	  return view('admin.conceptedit' , array ( 'fetchconcept' => $fetchconcept));

  }
  public function update(Request $request) {
  	$id=$request->get('id');
  	/*$fetchconcept = DB::table('concepts')->select('id', 'name')
       ->where('id', $id)
       ->get();*/
    //$fetchconcept->msg ="Concept Edited";   
  	$editedname=$request->get('name');
  	$updateconcept = DB::table('concepts')
              ->where('id', $id)
              ->update(['name' => $editedname ]);
	  $output ='<h6 align="center" style="color:green">Concept Edited</h6>';
    echo $output;
     //die;          
	}
	public function delete(Request $request, $id) {
    //$id = Route::current()->parameter('id');
    $concept= new Concept();
  	
    $data = Concept::find($id)->delete();
    $concepts = DB::table('concepts')->select('id', 'name')
       ->wherenull('deleted_at')
       ->get();
       $concepts->msg ="Concept Deleted";
    //DB::table('concepts')->where('id', $id)->softDeletes();
    /*$concept= new Concept();
    $concept->name= $request['addconcept'];       
	  $concept->save();*/
	  return view('admin.concept', array ( 'concepts' => $concepts));

  }
}
