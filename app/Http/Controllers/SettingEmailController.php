<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\SetingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SettingEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = SetingEmail::first();
        return view('admin.setting-email',[
            'email' => $email,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'maitler' => 'required',
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required|in:tls,ssl'
        ]);

       $email =  SetingEmail::create($request->all());

        config([
            "MAIL_MAILER" => $email->maitler,
            "MAIL_HOST" => $email->host,
            "MAIL_PORT" => $email->port,
            "MAIL_USERNAME" => $email->username,
            "MAIL_PASSWORD" => $email->password,
            "MAIL_ENCRYPTION" => $email->encryption,
        ]);

        Mail::to("blalthmen75@gmail.com")->send(new NewOrder);

        return redirect()->route('setting-email.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $email = SetingEmail::first();
        $email->update($request->all());

        return redirect()->route('setting-email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
