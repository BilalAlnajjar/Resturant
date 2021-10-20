<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = Step::get();
        return view('admin.steps',[
            'steps' => $steps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_content');
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
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $step = Step::create($request->only('title','description'));

        if($request->file('image')){
            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $step->update([
                'image' => $path,
            ]);
        }

        $request->session()->put('message','Completed Added Step Successfully');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $step = Step::findOrFail($id);
        return view('admin.edit_content',[
            'step' => $step,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $step = Step::findOrFail($id);
        $step->update($request->only('title','description'));

        if($request->file('image')){

            Storage::disk('uploads')->delete($step->image);

            $path = $request->file('image')->store('/imagesSite',['disk' => 'uploads']);
            $step->update([
                'image' => $path,
            ]);
        }

        $request->session()->put('message','Completed Update Step Successfully');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $step = Step::findOrFail($id);
        if($step->image){
            Storage::disk('uploads')->delete($step->image);
            $step->delete();
    }

    $step->delete();

    $request->session()->put('message','Completed Deleted Step Successfully');
        return back()->with('result', "success");

}
}
