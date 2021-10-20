<?php

namespace App\Http\Controllers;

use App\Models\AdditionCategory;
use Illuminate\Http\Request;

class AdditionCategoryController extends Controller
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
        $category_additions = AdditionCategory::get();
        $addition = null;
        return view('admin.caregory-addition',[
            'category_additions' => $category_additions,
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
        AdditionCategory::create($request->only('name'));

        return redirect()->route('addition-category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionCategory  $additionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionCategory $additionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionCategory  $additionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_additions = AdditionCategory::get();
        $addition = AdditionCategory::findOrFail($id);
        return view('admin.caregory-addition',[
            'category_additions' => $category_additions,
            'addition' => $addition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionCategory  $additionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $addition = AdditionCategory::findOrFail($id);

        $addition->update($request->only('name'));

        return redirect()->route('addition-category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionCategory  $additionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $addition = AdditionCategory::findOrFail($id);
        $addition->delete();

        $request->session()->put('message','Deleted Addition Successfully');

        return back()->with("result",'success');
    }
}
