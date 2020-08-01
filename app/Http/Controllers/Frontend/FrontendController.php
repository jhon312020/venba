<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
	/**
   * Function index()
   * returns frontend homepage.
   *
   * @return \Illuminate\Http\Response
   */
    public function index() {
  		return view('frontend.index');
  	}
}
