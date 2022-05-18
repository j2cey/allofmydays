<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicAttributeValueRequest;
use App\Http\Requests\UpdateDynamicAttributeValueRequest;
use App\Models\DynamicAttributeValue;

class DynamicAttributeValueController extends Controller
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
     * @param  \App\Http\Requests\StoreDynamicAttributeValueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicAttributeValueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicAttributeValue  $dynamicAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicAttributeValue $dynamicAttributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicAttributeValue  $dynamicAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicAttributeValue $dynamicAttributeValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicAttributeValueRequest  $request
     * @param  \App\Models\DynamicAttributeValue  $dynamicAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicAttributeValueRequest $request, DynamicAttributeValue $dynamicAttributeValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicAttributeValue  $dynamicAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicAttributeValue $dynamicAttributeValue)
    {
        //
    }
}
