<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionCategory;
use App\Models\AdditionSubCategory;
use phpDocumentor\Reflection\Types\Null_;

class AdditionSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addition = null;
        $additions_category = AdditionCategory::get();
        $sub_additions = AdditionSubCategory::get();
        return view('admin.subcategory-addition',[
            'additions_category' => $additions_category,
            'sub_additions' => $sub_additions,
            'addition' => $addition,
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
            'price' => 'required|numeric',
            'name' => 'required',
            'addition_category_id' => 'required',
        ]);

        $count = '';
        if($request->count){
            $count = 'on';
        }else{
            $count = 'off';
        }
        AdditionSubCategory::create([
            'name' => $request->name,
            'price' => $request->price,
            'addition_category_id' => $request->addition_category_id,
            'count' => $count,
        ]);

        $request->session()->put('message','Completed Added Sub Addition Successfully');
        return back()->with('result', "success");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionSubCategory  $additionSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionSubCategory $additionSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionSubCategory  $additionSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $addition = AdditionSubCategory::findOrFail($id);
        $additions_category = AdditionCategory::get();
        $sub_additions = AdditionSubCategory::get();
        return view('admin.subcategory-addition',[
            'additions_category' => $additions_category,
            'sub_additions' => $sub_additions,
            'addition' => $addition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionSubCategory  $additionSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $addition = AdditionSubCategory::findOrFail($id);
        $addition->update($request->only(['name','addition_category_id','price']));

        $count = '';
        if($request->count){
            $count = 'on';
        }else{
            $count = 'off';
        }

        $addition->update([
            'count' => $count,
        ]);

        return redirect()->route('addition-subcategory.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionSubCategory  $additionSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionSubCategory $additionSubCategory)
    {
        //
    }
}
