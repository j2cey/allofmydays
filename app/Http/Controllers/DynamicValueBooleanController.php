<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicValueBooleanRequest;
use App\Http\Requests\UpdateDynamicValueBooleanRequest;
use App\Models\DynamicValueBoolean;

class DynamicValueBooleanController extends Controller
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
     * @param  \App\Http\Requests\StoreDynamicValueBooleanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicValueBooleanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicValueBoolean  $dynamicValueBoolean
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicValueBoolean $dynamicValueBoolean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicValueBoolean  $dynamicValueBoolean
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicValueBoolean $dynamicValueBoolean)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicValueBooleanRequest  $request
     * @param  \App\Models\DynamicValueBoolean  $dynamicValueBoolean
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicValueBooleanRequest $request, DynamicValueBoolean $dynamicValueBoolean)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicValueBoolean  $dynamicValueBoolean
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicValueBoolean $dynamicValueBoolean)
    {
        //
    }
}
