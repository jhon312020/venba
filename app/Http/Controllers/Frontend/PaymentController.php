<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Useraddresses as Useraddresses;
use Session;
use Auth;

class PaymentController extends Controller {
   /**
   * Function address()
   * returns frontend selectaddress page.
   *
   * @return \Illuminate\Http\Response
  */
  public function address(Request $request) {
    $categories = $this->category_fetch();  
    $cart = Session::get('cart'); 
    $user = Auth::user();
    $addresses =  Useraddresses::select('name','address1','address2','town/city','state','pincode','mobile_no')
    ->where('user_id' ,$user->id)
    ->get()->toArray();   
    return view('frontend.address', compact('categories','cart','addresses'));
  }
   /**
   * Function save_address()
   * returns frontend selectaddress page.
   *
   * @return \Illuminate\Http\Response
  */
  public function save_address(Request $request) {
    $validatedData = $request->validate([
      'name' => 'required|string|',
      'mob_number' => 'required|regex:/[9,8,7][0-9]{9}/',
      'addr1' => 'required|string|',
      'addr2' => 'required|string|',
      'city' => 'required',
      'state' => 'required',
      'pincode' => 'required',
    ]);
    $user = Auth::user();
    $insertaddress = Useraddresses::create(
        array('user_id' => $user->id, 'name' => $request->name, 'mobile_no' => $request->mob_number, 'address1' => $request->addr1, 'address2' => $request->addr2, 'town/city' => $request->city, 'state' => $request->state, 'pincode' => $request->pincode));
    $addresses =  Useraddresses::select('name','address1','address2','town/city','state','pincode','mobile_no')
    	->where('user_id' ,$user->id)
    	->get()->toArray();
    /*print_r($addresses);
    die;*/
    $categories = $this->category_fetch();
    $cart = Session::get('cart');
    return view('frontend.address', compact('categories','cart','addresses'));
  }
}
