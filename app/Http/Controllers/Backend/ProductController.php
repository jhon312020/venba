<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Concept as Concept;
use App\Models\Category as Category;

/**
 * Create a new controller instance.
 *
 * @return void
 */
class ProductController extends Controller {
 
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
   * Display a listing of the Products.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $products  = Product::all();
    return view('backend.product.index' , compact('products'));
  }
  
  /**
   * Function add()
   * Displays the add Product form
   *
   * @return \Illuminate\Http\Response
   */
  public function add(Request $request) {
    $concepts  = Concept::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    return view('backend.product.add', compact('concepts', 'categories'));
  }
  /**
   * Function fetch()
   * display sub category dropdown based on main category.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function fetch(Request $request) {
    $select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $data = Category::select('id', 'name')
       ->where('cat_id', $value)
       ->get();
    $output = '<option value=""></option>';
    foreach($data as $row){
      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
    echo $output;
    //die;
  }

  /**
   * Function Store()
   * Store a newly created Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */ 
  public function store(Request $request) {
    /*echo '<pre>';
    print_r($request['filename']);
    echo '</pre>';
    die;*/
    //$images =$request['filename'];
    /*print_r($images);
    die;*/
    /*array_pop($images);
    print_r($images);
    die;*/
    //$data= array();

    
    
    $a =$request ['dynamicfield'];   
    if(!empty($a[0]['label'])){
      $serialized_array = serialize($request ['dynamicfield']);
    }

    
    //$dynamicfieldjson =json_encode($a);
    /*echo $a;
    die;*/

    /*echo count($a);
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    foreach($a as $a){
     echo  $a['label'];
      echo '<br>';
      echo $a['value'];
      echo '<br>';
    }
    die;
    print_r($a[0]);
    echo $a[0]['label'];
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    die;
    echo '<pre>';
    print_r($request->all());
    echo '</pre>';*/
    //$keys = array_keys($request);
    //echo $keys;
    //die;
    //foreach($request[$keys['list']] as $key=>$value) {
      //echo $value;
    //}
     /*die;*/
    $validatedData = $request->validate([
      'name' => 'required|max:25',
      'material_no' => 'required',
      'concept_id' => 'required',
      'cat_id' => 'required',
      'sub_cat_id' => 'required',
      'compatibility' => '',
      'power_consumption' => 'required',
      'physical_spec' => 'required',
      'light_color' => '',
      'introduction' => '',
      'accessories_required' => '',
      'warranty' => '',
      'technical_spec' => '',
      'additional_features' => '',
      'wired_wireless' => 'in:wired,wireless',
      'filename' => 'required',
      'filename.*' =>'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
      ]);

    $show = Product::create($validatedData);
    /*$validatedData = $request->validate([
      'dynamicfield.label' => 'required',
      'dynamicfield.value' => 'required',
    ]);*/
    if($serialized_array){
      /*echo $a;*/
      $adddynamicfield =Product::latest('created_at')->first()
        ->update(['additional_properties' => $serialized_array]);
      /*echo $adddynamicfield;
      die;*/
    }  
    if($request->hasFile('filename')) {
      /*echo "hello";
      die;*/
      foreach($request->file('filename') as $image) {
        $name =$image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $data[] = $name;
        //echo $name;
      }
      $images =json_encode($data);
      $addimages = Product::latest('created_at')->first()
        ->update(['product_image' => $images]);
    }

    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Added!'));
  }

  /**
   * Function edit()
   * Display the specified Product.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $record = Product::findOrFail($id);
    $additional_prop_array='';
    if($record->additional_properties!= null){
    $additional_prop_array = unserialize($record->additional_properties);
   /* print_r($additional_prop_array);
    die;*/
    } 
    
    /*print_r($additional_prop_array);

    die;*/

    $concepts  = Concept::all()->pluck('name', 'id');
    $categories  = Category::all()->whereNull('cat_id')->pluck('name', 'id');
    return view('backend.product.edit' , array ( 'product' => $record, 'concepts'=>$concepts, 'categories'=>$categories, 'additional_prop_array' => $additional_prop_array));
  }

  /**
   * Function update()
   * Update the specified Product in table.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $a =$request ['dynamicfield'];
    /*echo $a[1]['label'];
    die;*/
    //print_r($a);
    //die;
    if(!empty($a[0]['label'])) {
      $serialized_array = serialize($request ['dynamicfield']);
      //if($serialized_array){
      /*echo $a;*/
      $adddynamicfield =Product::whereId($id)
        ->update(['additional_properties' => $serialized_array]);
      /*echo $adddynamicfield;
      die;*/
      //}  
    } elseif(!empty($a[1]['label'])) {
      $a=$request ['dynamicfield'];
      array_shift($a);
      /*print_r($a);
      die;*/
      $serialized_array = serialize($a);
      //if($serialized_array){
      /*echo $a;*/
      $adddynamicfield =Product::whereId($id)
        ->update(['additional_properties' => $serialized_array]);

      } else {
        $adddynamicfield =Product::whereId($id)
          ->update(['additional_properties' => NULL]);
       }
    $validatedData = $request->validate([
      'name' => 'required|max:25',
      'material_no' => 'required',
      'concept_id' => 'int',
      'cat_id' => 'int',
      'sub_cat_id' => 'int',
      'compatibility' => '',
      'power_consumption' => 'required',
      'physical_spec' => 'required',
      'light_color' => '',
      'introduction' => '',
      'accessories_required' => '',
      'warranty' => '',
      'technical_spec' => '',
      'additional_features' => '',
      'wired_wireless' => '',
    ]);
    Product::whereId($id)->update($validatedData);
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Updated!'));     
  }

  /**
   * Function destroy()
   * Does a soft delete of specified Product from tan;e.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin.product.index')->withFlashSuccess(__('Successfully Deleted!'));
  }
}
