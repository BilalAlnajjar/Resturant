<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Place;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\AdditionCategory;
use App\Models\AdditionsProducts;
use Psy\Exception\ErrorException;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('admin.products',[
            'products' => $products,
        ]);
    }


    public function firstProductStatus(){
        $category = Category::first();
        $categories = Category::get();
        $products = $category->products()->orderBy('priority')->get();
        return view('admin.products-status',[
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function productStatus(Request $request){
        $category = Category::findOrFail($request->category_id);
        $categories = Category::get();
        $products = $category->products()->orderBy('priority')->get();
        return view('admin.products-status',[
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    function active_home(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('the vendor is not found')]);
        }
        $product = Product::where('id', '=', $id)->first();
        if ($product == null) {
            return response()->json(['error' => __('the vendor is not found')]);
        }
        if ($product->status == 'Active') {
            $product->status = 'inActive';
            $product->update();
            return response()->json(['error' => parent::CurrentLangShow()->Disable]);
        } else {
            $product->status = 'Active';
            $product->update();
            return response()->json(['success' => parent::CurrentLangShow()->Active]);
        }
    }



    public function order(Request $request)
    {
        $item = $request->item;
        if (count($item) != 0) {
            foreach ($item as $key => $value) {
                $item2 = Product::where("id", $value)->first();
                if ($item2 != null) {
                    $item2->priority = $key;
                    $item2->update();
                }
            }
        }

        return response()->json(['success' => __('the vendor update'), 'colse' => '1']);
    }

    public function indexProducts(){

        $categories = Category::where('status','active')->with('products')->orderBy('priority')->get();
        return view('menu-list-navigation',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $additions = AdditionCategory::get();
        return view('admin.add_product',[
            'categories' => $categories,
            'additions' => $additions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'price' => ['required','numeric'],
            'image' => ['nullable'],
            'category_id' => ['required'],
        ]);

        $product = Product::create($request->only('name','description','price'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $product->update([
                'image' => $path,
            ]);
        }

            $categoryProduct = ProductCategory::create([
                'category_id' => $request->category_id,
                'product_id' => $product->id,
            ]);


        if($request->additions){
            foreach($request->additions as $addition){
                $offerAddition = AdditionsProducts::create([
                    'product_id' => $product->id,
                    'addition_category_id' => $addition,
                ]);
            }
        }
        //  return $info = Storage::disk('uploads')->put('/images',$request->image);
    //    return $path = public_path('/images'.$request->file('image'));


        $request->session()->put('message','Completed Added Product Successfully');
        return back()->with('result', "success");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $additions = AdditionCategory::get();

        return view('admin.edit_product',[
            "product" => $product,
            'categories' => Category::get(),
            'additions' => $additions,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $product = Product::findOrFail($id);
        $categoryProduct = ProductCategory::where('product_id',$product->id)->first();
        $productAdditions = AdditionsProducts::where('product_id',$product->id)->get();
        $product->update($request->except('image','category_id','additions'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $product->update([
                'image' => $path,
            ]);
        }

        if($request->additions){

            foreach($productAdditions as $addition){
                $addition->delete();
            }
            foreach($request->additions as $addition){
                AdditionsProducts::create([
                    'product_id' => $product->id,
                    'addition_category_id' => $addition,
                ]);
            }
        }


            if($request->category_id){
            $categoryProduct->update([
                'category_id' => $request->category_id,
                'product_id' => $product->id,
            ]);
        }
        //  return $info = Storage::disk('uploads')->put('/images',$request->image);
    //    return $path = public_path('/images'.$request->file('image'));


        $request->session()->put('message','Completed Added Product Successfully');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('uploads')->delete($product->image);
        $product->delete();

        $request->session()->put('message','Deleted Product Successfully');

        return back()->with("result",'success');
    }
}
