<?php

namespace App\Http\Controllers;

use App\Models\Soical;
use Illuminate\Http\Request;

class SoicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social = Soical::first();

        if($social){
        return view('admin.setting-social',[
            'soical' => $social,
        ]);
    }

    return view('admin.setting-social-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $soicalold = Soical::first();
        if($soicalold){
            $soicalold->delete();
        }
       $social = Soical::create($request->only('facebook','instagram','twitter','youtube'));
        $request->session()->put('message','Completed Added Soical Links Successfully');
        return view('admin.setting-social',[
            'soical' => $social,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soical  $soical
     * @return \Illuminate\Http\Response
     */
    public function show(Soical $soical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soical  $soical
     * @return \Illuminate\Http\Response
     */
    public function edit(Soical $soical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soical  $soical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $social = Soical::first();
        $social->update($request->only('facebook','instagram','twitter','youtube'));
        $request->session()->put('message','Completed Added Soical Links Successfully');

        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soical  $soical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soical = Soical::findOrFail($id);
        $soical->delete();

        return back();
    }
}
