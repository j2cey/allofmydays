<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicAttributeTypeRequest;
use App\Http\Requests\UpdateDynamicAttributeTypeRequest;
use App\Models\DynamicAttributeType;

class DynamicAttributeTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreDynamicAttributeTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicAttributeTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicAttributeType  $dynamicAttributeType
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicAttributeType $dynamicAttributeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicAttributeType  $dynamicAttributeType
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicAttributeType $dynamicAttributeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicAttributeTypeRequest  $request
     * @param  \App\Models\DynamicAttributeType  $dynamicAttributeType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicAttributeTypeRequest $request, DynamicAttributeType $dynamicAttributeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicAttributeType  $dynamicAttributeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicAttributeType $dynamicAttributeType)
    {
        //
    }
}
