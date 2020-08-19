<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;

class UserController extends Controller {
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
    $users  = User::all();
    return view('backend.user.index' , compact('users'));
  }
  
}
