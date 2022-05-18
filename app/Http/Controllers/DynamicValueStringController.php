<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicValueStringRequest;
use App\Http\Requests\UpdateDynamicValueStringRequest;
use App\Models\DynamicValueString;

class DynamicValueStringController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDynamicValueStringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicValueStringRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicValueString  $dynamicValueString
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicValueString $dynamicValueString)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicValueString  $dynamicValueString
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicValueString $dynamicValueString)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicValueStringRequest  $request
     * @param  \App\Models\DynamicValueString  $dynamicValueString
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicValueStringRequest $request, DynamicValueString $dynamicValueString)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicValueString  $dynamicValueString
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicValueString $dynamicValueString)
    {
        //
    }
}
