<?php

namespace App\Http\Controllers;
use App\Models\Concept;
use DB;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
  public function concept() {
  	$categories = DB::table('concepts')->get();

    return view('admin.concept' , array ( 'categories' => $categories ));
  }
  public function store(Request $request) {
  	$users = DB::table('users')->get();
    $concept= new Concept();
    $concept->name= $request['addconcept'];       
	   $concept->save();
	   return view('admin.concept')->withSuccess('Concept Added');

  }
}
