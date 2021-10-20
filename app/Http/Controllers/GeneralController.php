<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\General;
use App\Models\SetingEmail;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.generalsettings-index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $general = General::first();
        $contact = contact::first();
        return view('admin.generalsettings',[
            'general' => $general,
            'contact' => $contact,
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
            'name' => 'required',
            'footer' => 'required',
            'logo' => 'required',
            'fivicon' => 'required',
            'hour_from' => 'required',
            'hour_to' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'delivery_price' => 'required',
        ]);

        $pathLogo = $request->file('logo')->store('/imagesSite',['disk' => 'uploads']);
        $pathFiv = $request->file('fivicon')->store('/imagesSite',['disk' => 'uploads']);

        General::create([
            'name' => $request->name,
            'footer' => $request->footer,
            'logo' => $pathLogo,
            'fivicon' => $pathFiv,
            'hour_from' => $request->hour_from,
            'hour_to' => $request->hour_to,
            'delivery_price' => $request->delivery_price,
        ]);

        contact::create($request->only(['email','phone']));

        $request->session()->put('message','Completed Data Website Successfully');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $general = General::first();
         $general->update($request->except('logo','fivicon','email','phone','delivery_price'));

        if($request->file('logo')){
            $pathLogo = $request->file('logo')->store('/imagesSite',['disk' => 'uploads']);
            $general->update([
                'logo' => $pathLogo,
            ]);

        }

        if($request->file('fivicon')){
            $pathFiv = $request->file('fivicon')->store('/imagesSite',['disk' => 'uploads']);
            $general->update([
                'fivicon' => $pathFiv,
            ]);
        }

        $contact = contact::first();

        $contact->update($request->only(['email','phone']));




        $request->session()->put('message','Completed Update Data Website Successfully');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        //
    }
}
