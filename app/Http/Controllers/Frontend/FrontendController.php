<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\Productimage as Productimage;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
use Session;
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
  	$category = "Ligihting";
    $productlist = 	Product::select('id','name', 'accessories_required', 'price')
    ->where('cat_id', 1)
    ->get();
     $brandlist = Brand::select('id', 'name')
    ->get();
     $categories = $this->category_fetch();
     $typelist = Type::select('id', 'name')
    ->get();
     $compatibilitylist = Compatibility::select('id', 'name')
    ->get();
    foreach($productlist as $product) {
        $imagelist = Product::find($product['id']);
        /*echo '<pre>';
        print_r($imagelist);
        echo '</pre>';
        die;*/
        foreach ($imagelist->images as $image) {
          $imagearray[$product['id']][] = $image->product_images;          
        }
      } 
      foreach($imagearray as $key => $value) {
        $ima[$key] =  $value[0];
        
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
    /*echo $id;
    die;*/
     $productdetails = Product::find($id);
    $cart = Session::get('cart');
    if(!isset($cart[$id])) {
      $cart[$id] = array(
        "id" => $id,
        "name" => substr("$productdetails->name",0,15), 
        "quantity" => 1,  
      );
  
      Session::put('cart', $cart);
      Session::save();
    }
    foreach($cart as $key => $value) {
      $productdet[$key] = Product::find($key); 
      $cart[$key]['price'] = $productdet[$key]->price * $value['quantity'];
      Session::put('cart', $cart);
      Session::save();
      if($productdet[$key]) {    
        foreach ($productdet[$key]->images as $image) {
          $imagearray[$key][] = $image->product_images;         
        }
      }
    } 
    $categories = $this->category_fetch();     
    return view('frontend.shopping_basket', compact('categories','cart','productdet','imagearray','id'));
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
    session()->forget('cart');
    session()->flush();
    Session::save();
    Session::put('cart', $cart);
    Session::save();
    $output='';
    $i=1;
    foreach($cart as $key => $value) {
      $output.='<tr><td class="d-none d-lg-block">'.$i.'</td><td>'.$value['name'].'</td><td class="text-right">'.$value['quantity'].'</td><td class="text-right">'.$value['price'].'</td></tr>';
     $i++;
    }
    $output.='<tr><td class="d-none d-lg-block">2.</td><td>Hue Bridge</td><td class="text-right">1</td><td class="text-right">1000</td></tr><tr><td class="d-none d-lg-block">3.</td><td>Transit</td><td class="text-right">1</td><td class="text-right">500</td>
                  </tr>';
    
    $success = true;
    $count = count($cart);
    return response()->json([
      'success' => $success,
      'count' => $count,
      'output' => $output,
    ]);
  }
  /**
   * Function updatecartquantity()
   * update product quantity in cart.
   *
   * @return \Illuminate\Http\Response
   */
  public function update_cart_quantity(Request $request) {

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

}

