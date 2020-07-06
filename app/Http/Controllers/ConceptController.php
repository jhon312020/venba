<?php

namespace App\Http\Controllers;
use App\Models\Concept;

use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function concept()
    {
        return view('admin.concept');
    }
    public function store(Request $request)
    {
        $concept= new Concept();
        $concept->name= $request['addconcept'];       
	    $concept->save();
	    return view('admin.concept');

    }
}
