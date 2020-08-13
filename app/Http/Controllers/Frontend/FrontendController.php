<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Image as ProductImage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
use Session;
use DB;
use Mail;
class FrontendController extends Controller
{
	/**
   * Function index()
   * returns frontend homepage.
   *
   * @return \Illuminate\Http\Response
  */
  

  /**
   * Function index()
   * returns frontend homepage.
   *
   * @return \Illuminate\Http\Response
  */
  public function index() {
  	$category = "Lighting";
    $productlist = 	Product::select('id','name', 'accessories_required', 'price')
    ->where('cat_id', 1)
    ->get();
    /* $brandlist = Brand::select('name')->whereIn('id', function($query){
      $query->distinct('brand_id')
      ->from(with(new Product)->getTable())
      ->where('cat_id', 1);
      })->get();*/
      $product_brand = Product::groupBy('brand_id')->where('cat_id', 1)->pluck('brand_id','brand_id');
      /*print_r($stock);
      die;*/
      $brandlist = DB::table("brands")->whereIn('id', $product_brand)->pluck("name","id");
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
  	return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories','ima'))->with('category', $category);
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
      $quantity++;
    } else {
      $quantity = 1;
    }
      $cart[$id] = array(
        "id" => $id,
        "name" => substr("$productdetails->name",0,15), 
        "quantity" => $quantity,  
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
      if(!empty($productdet[$key]->igst)) {
        $igst = $igst +($productdet[$key]->price * ($productdet[$key]->igst)/100 ) * $value['quantity'];
      }
      if(!empty($productdet[$key]->igst)) {
        $sgst = $sgst +($productdet[$key]->price * ($productdet[$key]->sgst)/100 ) * $value['quantity'];
     }
     if(!empty($productdet[$key]->transit)) {
        $transit = $transit +($productdet[$key]->price * ($productdet[$key]->transit)/100 ) * $value['quantity'];
     }
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::put('igst', $igst);
      Session::put('sgst', $sgst);
      Session::put('transit', $transit);
      Session::save();
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->name;         
        }
      }
    }
    $igsttotal = Session::get('igst');
    $sgsttotal = Session::get('sgst');
    $transittotal = Session::get('transit');
    $total= 0;
    $producttotal= 0;
    foreach($cart as $key => $value) {
      $producttotal = $producttotal + $cart[$key]['price'] ;
    }
     Session::put('producttotal', $producttotal);
    $total =$producttotal + $igsttotal + $sgsttotal + $transittotal;
    Session::put('total', $total);
      Session::save();
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
    $i=1;
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
        $transit = $transit +($productdet[$key]->price * ($productdet[$key]->transit)/100 ) * $value['quantity'];
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
    /*print_r($cart);*/
   /* die;*/
    foreach($cart as $key => $value) {
      $producttotal = $producttotal + $cart[$key]['price'] ;
    } 
    /*echo $producttotal;*/    
    $total =$producttotal + $igsttotal + $sgsttotal + $transittotal;
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
    $i=1;
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
        $transit = $transit +($productdet[$key]->price * ($productdet[$key]->transit)/100 ) * $value['quantity'];
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
   * Function select_address()
   * returns frontend selectaddress page.
   *
   * @return \Illuminate\Http\Response
  */
  public function select_address(Request $request) {
    $categories = $this->category_fetch();     
    return view('frontend.select_address', compact('categories'));

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

}

