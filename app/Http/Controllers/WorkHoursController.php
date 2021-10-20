<?php

namespace App\Http\Controllers;

use App\Models\WorkHours;
use Illuminate\Http\Request;

class WorkHoursController extends Controller
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
        $work_hour = WorkHours::first();
        return view('admin.add-work_hour',[
            'work_hour' => $work_hour,
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
            'from' => 'required',
            'to' => 'required',
        ]);

        WorkHours::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkHours  $workHours
     * @return \Illuminate\Http\Response
     */
    public function show(WorkHours $workHours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkHours  $workHours
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkHours $workHours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkHours  $workHours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $work_hour = WorkHours::first();

        $work_hour->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkHours  $workHours
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkHours $workHours)
    {
        //
    }
}
