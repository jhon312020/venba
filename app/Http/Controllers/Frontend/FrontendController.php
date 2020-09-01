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
use App\Models\Order as Order;
use App\Models\Compatibility as Compatibility;
use App\Models\Useraddresses as Useraddresses;
use Session;
use DB;
use Mail;
use Auth;
use PDF;

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
     $product_brand = Product::groupBy('brand_id')->where('cat_id', 1)->pluck('brand_id','brand_id');
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
    return view('frontend.user.my_profile', compact('categories'));
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
      $addtocart = $this->add_accesories_to_cart($id);
      $cart = Session::get('cart');
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
   * Function shopping_basket()
   * returns frontend shopping_basket page.
   *
   * @return \Illuminate\Http\Response
  */
  public function add_accesories_to_cart($id) {
    $productdetails = Product::find($id);
    if($productdetails->accessories_required) {
      $acc_req_pro =Product::select('id','name','price')->where('product_no', $productdetails->accessories_required)->get()->toArray();
      $acc_id = $acc_req_pro[0]['id'];
      $name = $acc_req_pro[0]['name'];
      $cart = Session::get('cart');
      if(isset($cart[$acc_id])) {
        $quantity = $cart[$acc_id]['quantity'];
        $quantity = $quantity+1;
      } else {
          $quantity = 1;
        }
      $cart[$acc_id] = array(
        "id" => $acc_id,
        "name" => substr("$name",0,15), 
        "quantity" => $quantity,
        "price" => $acc_req_pro[0]['price'] * $quantity,
        "accessories"  => 1
      );  
      Session::put('cart', $cart);
      Session::save();
    }

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
    $unsetselected =  Session::forget('selected_address_id');
    $categories = $this->category_fetch();  
    $cart = Session::get('cart'); 
    $user = Auth::user();
    $addresses =  Useraddresses::select('id','name','address1','address2','town/city','state','pincode','mobile_no')
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
    $unsetselected =  Session::forget('selected_address_id');
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
    $addresses =  Useraddresses::select('id','name','address1','address2','town/city','state','pincode','mobile_no')
      ->where('user_id' ,$user->id)
      ->get()->toArray();
    $categories = $this->category_fetch();
    $cart = Session::get('cart');
    return view('frontend.address', compact('categories','cart','addresses'));
  }
   /**
   * Function payment()
   * returns frontend selectaddress page.
   *
   * @return \Illuminate\Http\Response
  */
  public function payment(Request $request) {
    $imagearray = array();
    $ima = array();
    $cart = Session::get('cart');
    $selected_address_id = Session::get('selected_address_id');
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::save();
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->name;         
        }
      }
    } 
    $user = Auth::user();
     $selected_address =  Useraddresses::select('name','address1','address2','town/city','state','pincode','mobile_no')
      ->where('user_id' ,$user->id)
      ->where('id', $selected_address_id)
      ->get()->toArray();
    $categories = $this->category_fetch();     
    return view('frontend.payment', compact('categories','cart','productdet','imagearray','selected_address'));
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
    $cart_session = $this->cart_fetch();
     Mail::send('frontend.email',
       array(
           'name' => $request->get('customername'),
           'email' => $request->get('customeremail'),
           'user_message' => $request->get('customermsg')
       ), function($message) {
            $cart = Session::get('cart');
            $pdf = PDF::loadView('frontend.invoices.invoicepdf',['cart' => $cart]);
            $message->from('venbacontactform@gmail.com');
            $message->to('koushik@proisc.com', 'Admin')->subject('Venba Contact');
            $message->attachData($pdf->output(), "invoice.pdf");

          });

    return back()->with('success', 'Thanks for contacting us!!We will be in touch with you soon.');
  }
  /**
   * Function search()
   * displays search page
   *
   * @return \Illuminate\Http\Response
  */
  public function search(Request $request) {  
    $categories = $this->category_fetch();
    return view('frontend.search', compact('categories'));
  }
  /**
   * Function getsearch()
   * displays result of search
   *
   * @return \Illuminate\Http\Response
  */
  public function getsearch(Request $request) {      
    $searchvalue = $request->searchvalue;
    $search = Session::get('searchvalue'); 
    $search = $searchvalue;
    Session::put('searchvalue', $search);
    Session::save();
      $searchfiltercount = Product::where('name','LIKE','%'.$search.'%')->get();
      $searchfilter = Product::where('name','LIKE','%'.$searchvalue.'%')->paginate(5);
      $searchcount = count($searchfiltercount);
      $categories = $this->category_fetch();
       return view('frontend.searchdata', compact('searchfilter','searchcount','search'))->render();
  }
  
  /**
   * Function fetch_data()
   * ajax call for pagination
   *
   * @return \Illuminate\Http\Response
  */
  public function fetch_data(Request $request) {
    if($request->ajax()) {  
     $search = Session::get('searchvalue');   
     $searchfiltercount = Product::where('name','LIKE','%'.$search.'%')->get();  
     $searchcount = count($searchfiltercount);
      $searchfilter = Product::where('name','LIKE','%'.$search.'%')->paginate(5);
      $categories = $this->category_fetch();
      return view('frontend.searchdata', compact('searchfilter','searchcount','search'))->render();
    }
  }
  /**
   * Function orders()
   * displays order page
   *
   * @return \Illuminate\Http\Response
  */
  public function orders(Request $request) {
    $user = Auth::user();
    $imagearray = array();      
    $categories = $this->category_fetch();
    $allorders = Order::select('id','product_id','order_date')
    ->where('user_id', $user->id)
    ->orderBy('order_date', 'DESC')
    ->get()->toArray();

    foreach($allorders as $key => $orderno) {
      $products = json_decode($orderno['product_id']);
      $productids = array();
      $productquantity = array();
      foreach($products as $id){
        $productids[] = $id->id;
        $productquantity[$id->id] = $id->quantity;
      }
      $productvalues = Product::select('id','name','price' ,'cat_id')
        ->whereIn('id', $productids)
        ->get();
      $order = array();
      foreach ($productvalues as $value){
        $product_image = '';
        if(count($value->images)) {
          $product_image = $value->images[0]->name;
        }        
        $product_array = $value->toArray();       
        unset($product_array['images']);
        $product_array['image'] = $product_image;
        if(isset($productquantity[$product_array['id']])) {
           $product_array['quantity'] = $productquantity[$product_array['id']];
          }
        $allorders[$key]['suborders'][] = $product_array;
        
      }
    }
    return view('frontend.orders', compact('categories','allorders'));
  }
  /**
   * Function addaddresstosession()
   * returns frontend shopping_basket page.
   *
   * @return \Illuminate\Http\Response
  */
  public function addaddresstosession(Request $request) {
    $address_id = $request->address_id;
    $selected_address_id = Session::get('selected_address_id');
    Session::put('selected_address_id', $address_id);
    Session::save();


  }
   /**
   * Function thankyou()
   * displays thankyou page
   *
   * @return \Illuminate\Http\Response
  */
  public function thankyou(Request $request) {
    $cart = Session::get('cart');
    foreach($cart as $item) {
      $product[$item['id']]['id'] = $item['id'];
      $product[$item['id']]['quantity'] = $item['quantity'];
    }
    $productids = json_encode($product);
    $user = Auth::user();
    $insertorder = Order::create(
      array('user_id' => $user->id, 'product_id' => $productids));
    $user = Auth::user();
    Mail::send('frontend.email',
       array(
           'name' => $user->name,
           'email' => $user->email,
           'user_message' => "Thankyou for connecting with us !!"
       ), function($message) {
            $cart = Session::get('cart');
            $pdf = PDF::loadView('frontend.invoices.invoicepdf',['cart' => $cart]);
            $message->from('venbacontactform@gmail.com');
            $message->to('koushik@proisc.com', 'Admin')->subject('Venba Purchase');
            $message->attachData($pdf->output(), "invoice.pdf");

          });
    Session::forget('cart');
    $categories = $this->category_fetch();
    return view('frontend.thankyou', compact('categories'));
  }

  /**
   * Function checkaddress()
   * returns frontend shopping_basket page.
   *
   * @return \Illuminate\Http\Response
  */
  public function checkaddress(Request $request) {      
    $selected_address_id = Session::get('selected_address_id');
    if(empty($selected_address_id)){
      $message = '<div class="alert alert-warning alert-dismissible fade show"><strong>Kindly select shipping address</strong><button type="button" class="close" data-dismiss="alert">&times;</button></div>';  
      $success = false;
    } else {
      $success = true;
      $message = '';
    }
    return response()->json([
      'success' => $success,
      'message' => $message,
    ]);


  }
  /**
   * Function orderpage_to_cart()
   * adds product to cart from order page.
   *
   * @return \Illuminate\Http\Response
  */
  public function orderpage_to_cart(Request $request) {
    $id = $request->get('product_id');
    $name = $request->get('name');
    $quantity = $request->get('count');

    $cart = Session::get('cart');  
    $cart[$id] = array(
        "id" => $id,
        "name" => substr("$name",0,15), 
        "quantity" => $quantity,    
    );    
    Session::put('cart', $cart);
    Session::save();
     $imagearray = array();
        $ima = array();        
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);     
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->name;         
        }
      }
    }
    $cart_session = $this->cart_fetch();    
    $count = count($cart);
    $message = '<div class="col-12 col-lg-3 px-0 d-none d-lg-block">
                <button class="btn btn-primary">Added to Kart</button>
              </div>';
    return response()->json([
      'count' => $count,
      'message' => $message,
    ]);

  }
  /**
   * Function repeatorder()
   * adds same order to cart from order page.
   *
   * @return \Illuminate\Http\Response
  */
  public function repeatorder(Request $request, $orderid) {
     /*shopping_basket_from_cart*/
    $order = Order::select('product_id')
    ->where('id', $orderid)
    ->first();
     $products = json_decode($order->product_id);
     $cart = Session::get('cart');
     foreach($products as $product){
      $productdetails = Product::find($product->id);
      $cart[$product->id]=array(
        "id" => $product->id,
        "name" => substr("$productdetails->name",0,15), 
        "quantity" => $product->quantity,    
        );    
     }
      $imagearray = array();
    $ima = array();
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);
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
   * Function downloadinvoice()
   * returns frontend shopping_basket page.
   *
   * @return \Illuminate\Http\Response
  */
  public function downloadinvoice(Request $request, $orderid) { 
    $order_id = $orderid;    $order = Order::select('product_id')
    ->where('id', $order_id)
    ->first();
     $products = json_decode($order->product_id);
     $cart = Session::get('cart');
     foreach($products as $product) {
      $productdetails = Product::find($product->id);
      $cart[$product->id]=array(
        "id" => $product->id,
        "name" => substr("$productdetails->name",0,15), 
        "quantity" => $product->quantity,    
        );    
     }
    $igst = 0;
    $sgst = 0;
    $transit = 0; 
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key);
      if(!empty($productdet[$key]->igst)) {
        $igst = $igst +($productdet[$key]->price * ($productdet[$key]->igst)/100 ) * $value['quantity'];
      }
      if(!empty($productdet[$key]->igst)) {
        $sgst = $sgst +($productdet[$key]->price * ($productdet[$key]->sgst)/100 ) * $value['quantity'];
      }
      if(!empty($productdet[$key]->transit)) {
        $transit = $transit + ($productdet[$key]->transit)* $value['quantity'];;
      }
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::put('igst', $igst);
      Session::put('sgst', $sgst);
      Session::put('transit', $transit);
      Session::save();
    }
     $igsttotal = Session::get('igst');
     $sgsttotal = Session::get('sgst');
     $transittotal = Session::get('transit');
     $total= 0;
     $producttotal= 0;
    foreach($cart as $key => $value) {
      $producttotal = $producttotal + $cart[$key]['price'] ;
    }     
    $total =$producttotal + $igsttotal + $sgsttotal + $transittotal;
    Session::put('producttotal', $producttotal);
    Session::put('total', $total);
    Session::save();
    $user = Auth::user();
    $pdf = PDF::loadView('frontend.invoices.invoicepdf',['cart' => $cart]);
     return $pdf->stream('venbainvoice.pdf');
  }

  

}