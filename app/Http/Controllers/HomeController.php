<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $role =$user->role;
        /*echo $role;
        die;*/
        if($role == 'admin'){
          return view('home');
        } else {
            return view('frontend.index');
        }
    }
    public function profile()
    {
      return view('admin.profile');
    }
}
