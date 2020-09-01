<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Image as Image;
use App\Models\Category as Category;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
use App\Models\Color as Color;
use App\Models\PowerConsumption as PowerConsumption;
use App\Models\Productcompatibilitylist as Productcompatibilitylist;
use Session;
use DB;
class ProductlistingController extends Controller {
  /**
   * Function index()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response, category
  */
  public function index(Request $request, $category) {  
    
    $categoryid = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $categoryid[0];  
    $imagearray = array(); 
    $image = array();    
    $productlist =  Product::select('id','name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id)
      ->get()->toArray();  
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
      $subcategories = Category::select('id','name')
      ->where('cat_id', $cat_id)
      ->get();
      $product_brand = Product::groupBy('brand_id')->where('cat_id', $cat_id)->pluck('brand_id','brand_id');
      $brandlist = Brand::whereIn('id', $product_brand)->pluck("name","id");      
    $categories = $this->category_fetch();
    $typelist = Type::select('id', 'name')
      ->get();
      $colorlist = Color::select('id', 'name')
      ->get();
    $compatibilitylist = Compatibility::select('id', 'name')
      ->get();
  	  return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories','ima','subcategories','colorlist'))->with('category', $category);
    
  }
  /**
   * Function filterproductlist()
   * Fetches the filtered list of the products based on selection.
   * 
   * @param  \Illuminate\Http\Request  $request, category
   * @return \Illuminate\Http\Response
  */
  public function filterproductlist(Request $request, $category) {
    $subcat_id = $request->get('subcatids');
    $brand_id = $request->get('brandids');
    $type_id = $request->get('typeids');
    $imagearray =array();
    $ima = array();
    $compatibility_id = $request->get('compatibilityids');
    
    $color_id = $request->get('colorids');
    $category_id = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $category_id[0];
    $productlist =  Product::select('id','name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id);
      if(!empty($subcat_id)) {
       $productlist = $productlist -> whereIn('sub_cat_id', $subcat_id);
      }
      
     if(!empty($brand_id)) {
       $productlist = $productlist -> whereIn('brand_id', $brand_id);
      }
       if(!empty($type_id)) { 
        $productlist = $productlist -> whereIn('type_id', $type_id);    
      }
       if(!empty($color_id)) {  
        $productlist = $productlist -> whereIn('color_id', $color_id);    
      }
      if(!empty($compatibility_id)) {
       $productcompatibility_lists = Productcompatibilitylist::groupBy('product_id')->whereIn('compatibility_id', $compatibility_id)->pluck('product_id','product_id');
        $productlist = $productlist->whereIn('id', $productcompatibility_lists);
      } 
     $productlist = $productlist->get();
      $output = '';
      foreach($productlist as $product) {
         $imagelist = Product::find($product->id);
         $isimage = Image::all()
         ->where('product_id', $product->id)
         ->pluck('name');
        if(isset($isimage[0])) {
          foreach ($imagelist->images as $image) {
            $imagearray[$product->id][] = $image->name;          
          }
        }
      
        if(isset($imagearray[$product->id]))  { 
          foreach($imagearray as $key => $value) {
            $ima[$key] =  $value[0];
        
          }
        }
      }
      if(!count($productlist)) {
        $output .= '<img class="not_found" src="/frontend/images/nopro.png" alt"image not found">';
      }
      foreach($productlist as $product) {
        $output .= '<div class = "col-12 col-lg-4 mb-3 mb-lg-0">
                <div class = "card">' ;
        if(isset($imagearray[$product->id])) {                 
          $output .= '<img src = "/thumbnail/'.$product->id.'/'.$ima[$product->id].'" class = "card-img-top" alt="">'; 
        } else {
            $output .='<img src = "" class = "card-img-top" alt="">';
          }
        $output .= '<div class = "card-body">
                    <a id="{{$i}}"href="shopping-basket/'.$product->id.'">
                      <p class = "card-text">'.$product->name.'</p> 
                    </a>                     
                      <div class = "row">                   
                        <div class = "col col-lg-12">                        
                          <p class = "card-text mb-0">'.$product->accessories_required.'</p>                          
                          <h5 class = "card-title">Rs.'.$product->price.'</h5>
                        </div>
                        <div class = "col col-lg-12 px-0">
                          <button class="btn btn-secondary">Add to Kart</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>';
    }
  
     
    echo $output;

  }
  /**
   * Function singleproduct()
   * Display a listing of the singleproduct detail.
   *
   * @return \Illuminate\Http\Response, id, category
   */
  public function singleproduct(Request $request ,$category, $id) {
    $productdetails = Product::find($id);
    $productimages = array();
    $categoryid = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $categoryid[0];
     $imagearray = array();
     $ima = array();  
    $powerconsumption = PowerConsumption::find($productdetails->power_consumption_id);
   $compatibilityid = Productcompatibilitylist::where('product_id', $id)->pluck('compatibility_id','compatibility_id');
      $compatibilitylists = Compatibility::whereIn('id', $compatibilityid)->pluck("name","id");
    ($productdetails->compatibility_id);
    $brand = Brand::find($productdetails->brand_id);
    $type = Type::find($productdetails->type_id);
    foreach ($productdetails->images as $image) {
      $imagearray[$id][] = $image->name;          
    }
     if(!empty($imagearray)) {  
      foreach($imagearray as $key => $value) {
      $productimages =  $value;        
      }
    }
    $moreproductlist =  Product::select('id','name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id)
      ->take(4)
      ->get()->toArray(); 
       $moreimagearray = array();
       $moreima = array();  
      foreach($moreproductlist as $product) {
        $moreimagelist = Product::find($product['id']);
        foreach ($moreimagelist->images as $moreimage) {
          $moreimagearray[$product['id']][] = $moreimage->name;          
        }
      } 
      if(!empty($moreimagearray)) {
        foreach($moreimagearray as $key => $value) {
          $moreima[$key] =  $value[0];        
        }
      }
    $categories = $this->category_fetch();
    return view('frontend.product.single_product', compact('categories','productdetails','productimages','category','id','powerconsumption','brand','type','compatibilitylists','moreproductlist','moreima'));
  }
  /**
   * Function addtocart()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */
  public function add_to_cart(Request $request) {
    $id = $request->get('product_id');
    $name = $request->get('name');
    $category = $request->get('category');
    $quantity = $request->get('count');

    $cart = Session::get('cart');
    if(isset($cart[$id])) {
      $quant = $cart[$id]['quantity'] ;
      $quantity = $quant + $quantity ;
    }  
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
   * Function imagefetch()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */
  public function imagefetch(Request $request) {
  	$imageunserialized = Productimage::select('product_id' ,'name')
      ->get();
    $image = array();   
    foreach ($imageunserialized as $item) {
	    $image[$item->product_id]['encoded'] = $item->name ; 	        	
    }
  }
  /**
   * Function productlistfetch()
   * Display a listing of the products.
   *
   * @return \Illuminate\Http\Response
   */

  public function productlistfetch(Request $request) {
  	$product = array();
  	$products = Product::select('id','name','material_no','concept_id','cat_id','sub_cat_id','compatibility',
      'power_consumption','physical_spec','light_color',
      'introduction','accessories_required','warranty',
      'technical_spec','additional_features','wired_wireless','price')
      ->get();
      //$id = $products=>'id';
    foreach ($products as $item) {
	    $product[$item->id]['name'] = $item->name ; 
	    $product[$item->id]['material_no '] = $item->material_no ; 
	    $product[$item->id]['concept_id'] = $item->concept_id ;
	    $product[$item->id]['cat_id'] = $item->cat_id ;
	    $product[$item->id]['sub_cat_id'] = $item->sub_cat_id ;
	    $product[$item->id]['compatibility'] = $item->compatibility ;
	    $product[$item->id]['power_consumption'] = $item->power_consumption;
	    $product[$item->id]['physical_spec '] = $item->physical_spec ;
	    $product[$item->id]['light_color'] = $item->light_color ;
	    $product[$item->id]['introduction'] = $item->introduction ;
	    $product[$item->id]['accessories_required'] = $item->accessories_required ;
	    $product[$item->id]['warranty'] = $item->warranty ;
	    $product[$item->id]['technical_spec'] = $item->technical_spec ;
	    $product[$item->id]['additional_features'] = $item->additional_features ;
	    $product[$item->id]['wired_wireless'] = $item->wired_wireless ;
	    $product[$item->id]['price'] = $item->price ;     	
    }
  }
}
