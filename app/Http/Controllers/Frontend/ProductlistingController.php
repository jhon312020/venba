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
      /*echo '<pre>';
      print_r($productlist);
      echo '</pre>';

      die;*/  
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
       /*$cart = Session::get('cart');
       print_r($cart);
       die;*/
      /*print_r($ima);*/

      /*$keys = array_keys($imagearray);
      for($i = 0; $i < count($imagearray); $i++) {
        foreach($imagearray[$keys[$i]] as $key => $value) {
          $image[$key] = $value;
        }
      }*/
      //die;    
      /*echo '<pre>';
      print_r($imagearray);
      echo '</pre>';
      die;*/
      /*foreach($imagearray[$product_id] as $key=>$value) {
        $image[$key] = $value[0];
        echo $image;
      }*/

      /*$name = $productlist->pluck('images')->collapse();*/
      /*SELECT name FROM brands WHERE id IN (SELECT DISTINCT brand_id FROM `products` where cat_id =1)*/
      $product_brand = Product::groupBy('brand_id')->where('cat_id', $cat_id)->pluck('brand_id','brand_id');
      /*print_r($stock);
      die;*/
      $brandlist = DB::table("brands")->whereIn('id', $product_brand)->pluck("name","id");
      /*print_r($brandlist);
      die;*/
      /*$brandlist = Brand::select('name')->whereIn('id', function($query){
      $query->distinct('brand_id')
      ->from(with(new Product)->getTable())
      ->where('cat_id', $cat_id);
      })->get();*//*Brand::select('name')->where(function ($query) use ($cat_id){
                      $brand_id = Product::groupby('brand_id')->where('cat_id', '=', $cat_id)->pluck('brand_id');
                      $query->wherein('id', '=', $brand_id);
                  })
                  ->get();*/
      /*print_r($brandlist);
      die;*/
    $categories = $this->category_fetch();
    $typelist = Type::select('id', 'name')
      ->get();
    $compatibilitylist = Compatibility::select('id', 'name')
      ->get();
  	/*$products = Product::select('id','name','material_no','concept_id','cat_id','sub_cat_id','compatibility_id',
      'power_consumption_id','physical_spec','light_color',
      'introduction','accessories_required','warranty',
      'technical_spec','additional_features','wired_wireless','price')
      ->get();
      $product =array();
        foreach ($products as $item) {
	      $product[$item->id ]['name'] = $item->name ; 
	      } 
	      print_r($product);
	      die;*/
      /*$categories = Category::select('id', 'name')
        ->where('cat_id', null)
        ->get();*/
  	  return view('frontend.index', compact('productlist','brandlist', 'typelist', 'compatibilitylist','categories','ima'))->with('category', $category);
    
  }
  /**
   * Function filterproductlist()
   * Fetches the filtered list of the products based on selection.
   * 
   * @param  \Illuminate\Http\Request  $request, category
   * @return \Illuminate\Http\Response
  */
  public function filterproductlist(Request $request, $category) {
    //echo $category;
    $brand_id = $request->get('brandids');
    /*print_r($brand_id);
    die;*/
    $imagearray =array();
    $ima = array();
   /* print_r($brand_id);
    echo '<br>';*/
   /* print_r($brand_id);
    die;*/
    $compatibility_id = $request->get('compatibilityids');
    $type_id = $request->get('typeids');
    /*print_r($type_id);*/
    /*if(!empty($type_id)) {
      echo "success";
      die;
      }
*/    /*echo '<br>';
    print_r($compatibility_id);
    echo '<br>';*/
    $category_id = Category::all()
        ->where('name', $category)
        ->pluck('id');
    $cat_id = $category_id[0];     
    $productlist =  Product::select('id','name', 'accessories_required', 'price')
      ->where('cat_id', $cat_id);
     /* ->where(function ($query) use ( $filters) {
        foreach ($filters as $column => $key) {
          $query->when($key, function ($query, $value) use ($column) {
            $query->whereIn($column, $value);
          });
        }
      })*/
      
     if(!empty($brand_id)) {
      /*echo "hello";
      die;*/
       $productlist = $productlist -> whereIn('brand_id', $brand_id);
      }
       if(!empty($type_id)) {
       /* echo "hello";
        die;*/  
        $productlist = $productlist -> whereIn('type_id', $type_id);    
      }
      if(!empty($compatibility_id)) {
       /* select *from products where id in(SELECT product_id from product_compatibility_list where compatibility_id in(2,3,4))*/
       $productcompatibility_lists = Productcompatibilitylist::groupBy('product_id')->whereIn('compatibility_id', $compatibility_id)->pluck('product_id','product_id');
        $productlist = $productlist->whereIn('id', $productcompatibility_lists);
       /*$productlist = $productlist -> whereIn('compatibility_id', $compatibility_id);*/
      }
    
      /*echo $productlist;
      die;*/
     $productlist = $productlist->get();
      $output = '';
      foreach($productlist as $product) {
        /*echo $product->id;
        die;*/
         $imagelist = Product::find($product->id);
         $isimage = Image::all()
         ->where('product_id', $product->id)
         ->pluck('name');
         /*echo $isimage[0];
         die;*/
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
      }/*
      print_r($imagearray);
      print_r($ima);
      die;*/
      if(!count($productlist)) {
        $output .= '<img class="not_found" src="/frontend/images/notfound.png" alt"image not found">';
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
    /*echo '<pre>';
    print_r($productdetails);
    echo '</pre>';
    die;*/
     $imagearray = array();
     $ima = array();  
    $powerconsumption = PowerConsumption::find($productdetails->power_consumption_id);
   $compatibilityid = Productcompatibilitylist::where('product_id', $id)->pluck('compatibility_id','compatibility_id');
      $compatibilitylists = DB::table("brands")->whereIn('id', $compatibilityid)->pluck("name","id");
    /*$compatibility = Productcompatibilitylist::select('id')
    ->where('product_id', $id)
    ->get();*/
    /*print_r($compatibilitylists);
    die;*/
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
    /*echo $id;
    echo '<br>';
    echo  $category;
    echo '<br>';
    echo '<pre>';
    print_r($productimages);
    echo '</pre>';
    die;*/
    $categories = $this->category_fetch();
    /*print_r($productimages);
    die;*/
    return view('frontend.product.single_product', compact('categories','productdetails','productimages','category','id','powerconsumption','brand','type','compatibilitylists'));
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
    $message = '<div class="ajaxbg"><p class="ajaxcol">successfully added to session</p><a class="ajaxpl" href="/shopping-basket/"><span class="icon-login pt"></span></a></div>';
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
