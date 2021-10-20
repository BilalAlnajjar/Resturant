<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::first();
        return view('admin.add-video',[
            'video' => $video,
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
            'link' => 'required|url',
        ]);


            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);

        Video::create([
            'link' => $request->link,
            'image' => $path,

        ]);


        $request->session()->put('message','Completed Added Video Successfully');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $video = Video::first();

        $video->update($request->except('image'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $video->update([
                'image' => $path,
            ]);
        }


        $request->session()->put('message','Completed Update Video Successfully');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        $request->session()->put('message','Completed Delete Video Successfully');
        return back()->with('result', "success");
    }
}
