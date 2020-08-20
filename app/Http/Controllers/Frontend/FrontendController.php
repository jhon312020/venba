<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Image as ProductImage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Color as Color;
use App\Models\Compatibility as Compatibility;
use App\Models\Useraddresses as Useraddresses;
use Session;
use DB;
use Mail;
use Auth;

class FrontendController extends Controller {
  /**
   * Function index()
   * returns frontend homepage.
   *
   * @return \Illuminate\Http\Response
  */
  public function index() {
    $category = "Lighting";
    $productlist =  Product::select('id','name', 'accessories_required', 'price')
    ->where('cat_id', 1)
    ->get();
     $categoryid = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $categoryid[0];
    $subcategories = Category::select('id','name')
      ->where('cat_id', $cat_id)
      ->get();
    /* $brandlist = Brand::select('name')->whereIn('id', function($query){
      $query->distinct('brand_id')
      ->from(with(new Product)->getTable())
      ->where('cat_id', 1);
      })->get();*/
      /*$product_brand = Product::groupBy('brand_id')->where('cat_id', 1)->pluck('brand_id','brand_id');*/
      /*print_r($stock);
      die;*/
     /* $brandlist = DB::table("brands")->whereIn('id', $product_brand)->pluck("name","id");*/
     $product_brand = Product::groupBy('brand_id')->where('cat_id', 1)->pluck('brand_id','brand_id');
      /*print_r($stock);
      die;*/
      $brandlist = Brand::whereIn('id', $product_brand)->pluck("name","id");
     $categories = $this->category_fetch();
     $typelist = Type::select('id', 'name')
    ->get();
     $compatibilitylist = Compatibility::select('id', 'name')
    ->get();
     $imagearray = array();
     $ima = array();
    foreach($productlist as $product) {
      $imagelist = Product::find($product['id']);
      /*echo '<pre>';
      print_r($imagelist);
      echo '</pre>';
      die;*/
      foreach ($imagelist->images as $image) {
        $imagearray[$product['id']][] = $image->name;          
      }
    } 
    if(!empty($imagearray)) {
      foreach($imagearray as $key => $value) {
        $ima[$key] =  $value[0];        
      }
    }
    $colorlist = Color::select('id', 'name')
      ->get();
    return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories','ima','subcategories','colorlist'))->with('category', $category);
    }
    /**
   * Function basic_solution()
   * returns frontend basicsolution page.
   *
   * @return \Illuminate\Http\Response
  */
  public function basic_solution() {
  $categories = $this->category_fetch();
  return view('frontend.basic_sol', compact('categories'));
  }
  /**
   * Function advanced_solution()
   * returns frontend advancedsolution page.
   *
   * @return \Illuminate\Http\Response
  */
  public function advanced_solution() {

    $categories = $this->category_fetch();
    return view('frontend.advanced_sol', compact('categories'));
  }
  /**
   * Function premium_solution()
   * returns frontend premiumsolution page.
   *
   * @return \Illuminate\Http\Response
  */
  public function premium_solution() {

    $categories = $this->category_fetch();
    return view('frontend.premium_sol', compact('categories'));
  }
  /**
   * Function installation_guide()
   * returns frontend installation page.
   *
   * @return \Illuminate\Http\Response
  */
  public function installation_guide() {

    $categories = $this->category_fetch();
    return view('frontend.installation_guide', compact('categories'));
  }
  /**
   * Function trouble_shooting()
   * returns frontend troubleshooting page.
   *
   * @return \Illuminate\Http\Response
  */
  public function trouble_shooting() {

    $categories = $this->category_fetch();
    return view('frontend.trouble_shooting', compact('categories'));
  }
  /**
   * Function online_support()
   * returns frontend onlinesupport page.
   *
   * @return \Illuminate\Http\Response
  */
  public function online_support() {

    $categories = $this->category_fetch();
    return view('frontend.online_support', compact('categories'));
  }
  /**
   * Function faq()
   * returns frontend faq page.
   *
   * @return \Illuminate\Http\Response
  */
  public function faq() {

    $categories = $this->category_fetch();
    return view('frontend.faq', compact('categories'));
  }
  /**
   * Function contact()
   * returns frontend contact page.
   *
   * @return \Illuminate\Http\Response
  */
  public function contact() {

    $categories = $this->category_fetch();
    return view('frontend.contact', compact('categories'));
  }
  /**
   * Function my_profile()
   * returns frontend onlinesupport page.
   *
   * @return \Illuminate\Http\Response
  */
  public function my_profile() {

    $categories = $this->category_fetch();
    return view('frontend.online_support', compact('categories'));
  }
  /**
   * Function my_wishlist()
   * returns frontend onlinesupport page.
   *
   * @return \Illuminate\Http\Response
  */
  public function my_wishlist() {

    $categories = $this->category_fetch();
    return view('frontend.online_support', compact('categories'));
  }
  /**
   * Function my_orders()
   * returns frontend onlinesupport page.
   *
   * @return \Illuminate\Http\Response
  */
  public function my_orders() {

    $categories = $this->category_fetch();
    return view('frontend.online_support', compact('categories'));
  }
  /**
   * Function shopping_basket()
   * returns frontend shopping_basket page.
   *
   * @return \Illuminate\Http\Response
  */
  public function shopping_basket(Request $request,$id) {
    $productdetails = Product::find($id);
    if(!$productdetails){
      /*$data['title'] = '404';
      $data['name'] = 'Page not found';
      return response()
        ->view('errors.404',$data,404);*/
        abort(404);
    }
    $cart = Session::get('cart');
    if(isset($cart[$id])) {
      $quantity = $cart[$id]['quantity'];
      $quantity = $quantity+1;
    } else {
      $quantity = 1;
    }
      $cart[$id] = array(
        "id" => $id,
        "name" => substr("$productdetails->name",0,15), 
        "quantity" => $quantity,
        "price" => $productdetails->price * $quantity,  
      );  
      Session::put('cart', $cart);
      Session::save();
        $imagearray = array();
        $ima = array();
        $igst = 0;
        $sgst = 0;
        $transit = 0;
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);      
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->name;         
        }
      }
    }
     $cart_session = $this->cart_fetch();
    $categories = $this->category_fetch();     
    return view('frontend.shopping_basket', compact('categories','cart','productdet','imagearray','id'));
  }
  /**
   * Function deletefromcart()
   * Display a product from cart.
   *
   * @return \Illuminate\Http\Response
   */
  public function shopping_basket_from_cart(Request $request) {
    $imagearray = array();
    $ima = array();
    $cart = Session::get('cart');
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);
      /*print_r($productdet);
      die; */
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::save();
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->name;         
        }
      }
    } 
    $categories = $this->category_fetch();     
    return view('frontend.shopping_basket', compact('categories','cart','productdet','imagearray'));
  } 
  /**
   * Function deletefromcart()
   * Display a product from cart.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete_from_cart(Request $request) {
    $id = $request->product_id;
    $cart = Session::get('cart');
    unset($cart[$id]);
    /*session()->forget('cart');
    session()->flush();
    Session::save();*/
    Session::put('cart', $cart);
    Session::save();
    $output='';
    $cart_session = $this->cart_fetch();
    $igst = Session::get('igst');
    $sgst = Session::get('sgst');
    $transit = Session::get('transit');
    $producttotal = Session::get('producttotal');
    $total = Session::get('total'); 
    $i=1;    
    /*echo '<br>';
    echo $total;
    die;*/
    foreach($cart as $key => $value) {
      $output.='<tr><td class="d-none d-lg-block">'.$i.'</td><td>'.$value['name'].'</td><td class="text-right">'.$value['quantity'].'</td><td class="text-right">'.$value['price'].'</td></tr>';
     $i++;
    }    
    $success = true;
    $count = count($cart);
    return response()->json([
      'success' => $success,
      'count' => $count,
      'output' => $output,
      'igst' => $igst,
      'sgst' => $sgst,
      'transit' => $transit,
      'producttotal' => $producttotal,
      'total' => $total,
    ]);
  }
  /**
   * Function updatecartquantity()
   * update product quantity in cart.
   *
   * @return \Illuminate\Http\Response
   */
  public function update_cart_quantity(Request $request) {    
    $id = $request->product_id;
    $quantity = $request->quantity;
    $productdetails = Product::find($id);
    $cart = Session::get('cart');
    $cart[$id]['quantity'] = $quantity;
    $cart[$id]['price'] = $productdetails->price * $quantity;
    Session::put('cart', $cart);
    Session::save();
    $output='';
    $cart_session = $this->cart_fetch();
    $igst = Session::get('igst');
    $sgst = Session::get('sgst');
    $transit = Session::get('transit');
    $producttotal = Session::get('producttotal');
    $total = Session::get('total');    
    $i=1; 
    foreach($cart as $key => $value) {
      $output.='<tr><td class="d-none d-lg-block">'.$i.'</td><td>'.$value['name'].'</td><td class="text-right">'.$value['quantity'].'</td><td class="text-right">'.$value['price'].'</td></tr>';
     $i++;
    }
    /*$output.='<tr><td class="d-none d-lg-block">2.</td><td>Hue Bridge</td><td class="text-right">1</td><td class="text-right">1000</td></tr><tr><td class="d-none d-lg-block">3.</td><td>Transit</td><td class="text-right">1</td><td class="text-right">500</td>
                  </tr>';*/    
    $success = true;
    return response()->json([
      'success' => $success,
      'output' => $output,
      'igst' => $igst,
      'sgst' => $sgst,
      'transit' => $transit,
      'producttotal' => $producttotal,
      'total' => $total,
    ]);
  }
  
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
  /**
   * Function sendmail()
   * sends email to admin with contact form details
   *
   * @return \Illuminate\Http\Response
  */
  public function sendmail(Request $request) {    
    $validatedData = $request->validate([
      'customername' => 'required|string|',
      'customeremail' => 'required|string|email',
      'customerphone' => 'required|regex:/[9,8,7][0-9]{9}/',
      'customermsg' => 'required|string|',
    ]);
     Mail::send('frontend.email',
       array(
           'name' => $request->get('customername'),
           'email' => $request->get('customeremail'),
           'user_message' => $request->get('customermsg')
       ), function($message) {
            $message->from('venbacontactform@gmail.com');
            $message->to('koushik@proisc.com', 'Admin')->subject('Venba Contact');
          });

    return back()->with('success', 'Thanks for contacting us!!We will be in touch with you soon.');
  }
  /**
   * Function sendmail()
   * sends email to admin with contact form details
   *
   * @return \Illuminate\Http\Response
  */
  public function search(Request $request) {  
    $categories = $this->category_fetch();
    return view('frontend.search', compact('categories'));
  }

}