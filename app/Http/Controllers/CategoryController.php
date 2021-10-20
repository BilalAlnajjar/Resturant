<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OfferCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();


       return view('admin.categories',[
           'categories' => $categories,
       ]);
    }

    public function indexCategories(){
        return $categories = Category::with('products')->get();

    }

    function active_home(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => __('the vendor is not found')]);
        }
        $category = Category::where('id', '=', $id)->first();
        if ($category == null) {
            return response()->json(['error' => __('the category is not found')]);
        }
        if ($category->status == 'active') {
            $category->status = 'deactivate';
            $category->update();
            return response()->json(['error' => parent::CurrentLangShow()->Disable]);
        } else {
            $category->status = 'active';
            $category->update();
            return response()->json(['success' => parent::CurrentLangShow()->Active]);
        }
    }



    public function order(Request $request)
    {
        $item = $request->item;
        if (count($item) != 0) {
            foreach ($item as $key => $value) {
                $item2 = Category::where("id", $value)->first();
                if ($item2 != null) {
                    $item2->priority = $key;
                    $item2->update();
                }
            }
        }

        return response()->json(['success' => __('the vendor update'), 'colse' => '1']);
    }

    public function categoryStatus(){
        $categories = Category::orderBy('priority')->get();
        return view('admin.categories-status',[
            'categories' => $categories,
        ]);
    }

    public function images(){
        $categories = Category::get();
        $images = [];
        foreach($categories as $category){
            $images[$category->id] = '<img src="'.$category->image.'"/>';
        }
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_category');
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
            'name' => 'required',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);

        $category = Category::create([
            'name' => $request->name,
            'image' => $path,
        ]);

        if($request->sub_title){
            $category->update([
                'sub_title' => $request->sub_title,
            ]);
        }

        $request->session()->put('message','Completed Added Sub Category Successfully');

        return back()->with('result','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_Category  $sub_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit_category',[
            'category' =>  $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only('name','sub_title'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $category->update([
                'image' => $path,
            ]);
        }
        if($request->status){
            $category->update([
                'status' => 'active',
            ]);
        }else{
            $category->update([
                'status' => 'deactivate',
            ]);
        }


        $request->session()->put('message','Completed Updated Category Successfully');

        return back()->with('result','success');
    }

    /**
     * Remove the specified resource from storage.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

       $category = Category::findOrFail($id);

       $offers = $category->offers()->get();
       $products = $category->products()->get();
       foreach($offers as $offer){
           $offer->delete();
       }

       foreach($products as $product){
        $product->delete();
    }

        Storage::disk('uploads')->delete($category->image);

        $category->delete();

        $request->session()->put('message','Deleted Category Successfully');

        return back()->with("result",'success');
    }
}
