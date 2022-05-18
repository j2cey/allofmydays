<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicAttributeRequest;
use App\Http\Requests\UpdateDynamicAttributeRequest;
use App\Models\DynamicAttribute;

class DynamicAttributeController extends Controller
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
     * @param  \App\Http\Requests\StoreDynamicAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicAttributeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicAttribute  $dynamicAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicAttribute  $dynamicAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicAttributeRequest  $request
     * @param  \App\Models\DynamicAttribute  $dynamicAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicAttributeRequest $request, DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicAttribute  $dynamicAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicAttribute $dynamicAttribute)
    {
        //
    }
}
