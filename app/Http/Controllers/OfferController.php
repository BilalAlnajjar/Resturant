<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Models\OfferCategory;
use App\Models\AdditionsOffers;
use App\Models\AdditionCategory;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('categories')->get();

        return view('admin.offers',[
            'offers' => $offers,
        ]);
    }

    public function indexOffers(Request $request){
        $offers = Category::with('offers')->orderBy('priority')->get();
        return view('page-offers',[
           'categories' => $offers,
        ]);
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $products = Product::get();
        $additions = AdditionCategory::get();
        return view('admin.add_offer',[
            'categories' => $categories,
            'products' => $products,
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
            'image' => ['required'],
            'categories' => ['required'],
            'products' => ['required'],
        ]);


            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);

            $offer = Offer::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $path,
            ]);
            foreach($request->products as $product){
                $offerProduct = ProductOffer::create([
                    'offer_id' => $offer->id,
                    'product_id' => $product,
                ]);
            }

            foreach($request->categories as $category){
                $offerCategory = OfferCategory::create([
                    'offer_id' => $offer->id,
                    'category_id' => $category,
                ]);
            }

            if($request->additions){
            foreach($request->additions as $addition){
                $offerAddition = AdditionsOffers::create([
                    'offer_id' => $offer->id,
                    'addition_category_id' => $addition,
                ]);
            }
        }
        //  return $info = Storage::disk('uploads')->put('/images',$request->image);
    //    return $path = public_path('/images'.$request->file('image'));


        $request->session()->put('message','Completed Added Offer Successfully');
        return back()->with('result', "success");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $additions = AdditionCategory::get();

        return view('admin.edit_offer',[
            'categories' => Category::get(),
            'products' => Product::get(),
            'offer' => $offer,
            'additions' => $additions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'numeric',
        ]);

        $offer = Offer::findOrFail($id);
        $offerCategories = OfferCategory::where('offer_id',$offer->id)->get();
        $offerProducts = ProductOffer::where('offer_id',$offer->id)->get();
        $offerAddition = AdditionsOffers::where('offer_id',$offer->id)->get();

        $offer->update($request->except('image','categories','products','additions'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $offer->update([
                'image' => $path,
            ]);
        }
        if($request->products){

            foreach($offerProducts as $product){
                $product->delete();
            }
            foreach($request->products as $product){
                ProductOffer::create([
                    'offer_id' => $offer->id,
                    'product_id' => $product,
                ]);
            }
        }

        if($request->additions){

            foreach($offerAddition as $addition){
                $addition->delete();
            }
            foreach($request->additions as $addition){
                AdditionsOffers::create([
                    'offer_id' => $offer->id,
                    'addition_category_id' => $addition,
                ]);
            }
        }

        if($request->categories){
            foreach($offerCategories as $category){
                $category->delete();
            }
            foreach($request->categories as $category){
                OfferCategory::create([
                    'offer_id' => $offer->id,
                    'category_id' => $category,
                ]);
            }
        }
        //  return $info = Storage::disk('uploads')->put('/images',$request->image);
    //    return $path = public_path('/images'.$request->file('image'));


        $request->session()->put('message','Completed Updated Offer Successfully');
        return back()->with('result', "success");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $offer = Offer::findOrFail($id);
        Storage::disk('uploads')->delete($offer->image);
        $offer->delete();

        $request->session()->put('message','Deleted Offer Successfully');

        return back()->with("result",'success');

    }
}
