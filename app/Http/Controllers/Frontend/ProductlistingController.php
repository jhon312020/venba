<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Category as Category;
use App\Models\Brand as Brand;
use App\Models\Type as Type;
use App\Models\Compatibility as Compatibility;
use App\Models\Powerconsumption as Powerconsumption;
use Session;
class ProductlistingController extends Controller
{
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
      foreach($productlist as $product) {
        $imagelist = Product::find($product['id']);
        foreach ($imagelist->images as $image) {
          $imagearray[$product['id']][] = $image->product_images;          
        }
      } 
      foreach($imagearray as $key => $value) {
        $ima[$key] =  $value[0];
        
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

      /*$product_images = $productlist->pluck('images')->collapse();*/
     
    $brandlist = Brand::select('id', 'name')
      ->get();
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
    $productlist =  Product::select('name', 'accessories_required', 'price')
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
       $productlist = $productlist -> whereIn('compatibility_id', $compatibility_id);
      }
    
      /*echo $productlist;
      die;*/
     $productlist = $productlist->get();
      $output = '';
      foreach($productlist as $product) {
      $output .= '<div class = "col-12 col-lg-4 mb-3 mb-lg-0">
                <div class = "card">
                    <img src = "frontend/images/product-img.jpg" class = "card-img-top" alt="">
                    <div class = "card-body">
                      <p class = "card-text">'.$product->name.'</p>                      
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
    /*echo '<pre>';
    print_r($productdetails);
    echo '</pre>';
    die;*/
    $powerconsumption = Powerconsumption::find($productdetails->power_consumption_id);
    $compatibility = Compatibility::find($productdetails->compatibility_id);
    foreach ($productdetails->images as $image) {
      $imagearray[$id][] = $image->product_images;          
    }
       
    foreach($imagearray as $key => $value) {
      $productimages =  $value;        
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

    return view('frontend.product.single_product', compact('categories','productdetails','productimages','category','id','powerconsumption','compatibility'));
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
    $cart[$id] = array(
        "id" => $id,
        "name" => substr("$name",0,15), 
        "quantity" => $quantity    
    );    
    Session::put('cart', $cart);
    Session::save();
    $count = count($cart);
    $message = '<p>successfully added to session</p>';
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
  	$imageunserialized = Productimage::select('product_id' ,'product_images')
      ->get();
    $image = array();   
    foreach ($imageunserialized as $item) {
	    $image[$item->product_id]['encoded'] = $item->product_images ; 	        	
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
