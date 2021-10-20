<?php

namespace App\Http\Controllers;

use App\Models\DisplayEditor;
use Exception;
use Illuminate\Http\Request;

class DisplayEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = DisplayEditor::first();

        return view('admin.add_item',[
            'item' => $item,
        ]);
    }

    public function indexSectionOne()
    {
        $items = DisplayEditor::get();

        $item = null;
        try{
            $item = $items[1];
        }catch(Exception $e){
            $item = null;
        }
        return view('admin.add_sectionone',[
            'item' => $item,
        ]);
    }

    public function indexSectionTwo()
    {
        $items = DisplayEditor::get();
        $item = null;
        try{
            $item = $items[2];
        }catch(Exception $e){
            $item = null;
        }

        return view('admin.add_sectiontwo',[
            'item' => $item,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'item' => 'required',
        ]);

        DisplayEditor::create($request->only('item'));

        return back();
    }

    public function storeSectionOne(Request $request)
    {
        $request->validate([
            'item' => 'required',
        ]);

        DisplayEditor::create($request->only('item'));

        return redirect()->route('element.indexSectionOne');
    }

    public function storeSectionTwo(Request $request)
    {
        $request->validate([
            'item' => 'required',
        ]);

        DisplayEditor::create($request->only('item'));

        return redirect()->route('element.indexSectionTwo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisplayEditor  $displayEditor
     * @return \Illuminate\Http\Response
     */
    public function show(DisplayEditor $displayEditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DisplayEditor  $displayEditor
     * @return \Illuminate\Http\Response
     */
    public function edit(DisplayEditor $displayEditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DisplayEditor  $displayEditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $item = DisplayEditor::findOrFail($id);
       $item->update($request->only('item'));

        return redirect()->route('element.index');
    }

    public function updateSectionTwo(Request $request)
    {
        $items = DisplayEditor::get();
       $items[2]->update($request->only('item'));

        return redirect()->route('element.indexSectionTwo');
    }

    public function updateSectionOne(Request $request)
    {
        $items = DisplayEditor::get();
       $items[1]->update($request->only('item'));

        return redirect()->route('element.indexSectionOne');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DisplayEditor  $displayEditor
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisplayEditor $displayEditor)
    {
        //
    }
}
