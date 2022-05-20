<?php

namespace App\Http\Controllers;

use App\Models\DynamicAttributes\DynamicAttribute;
use App\Http\Requests\DynamicAttribute\StoreDynamicAttributeRequest;
use App\Http\Requests\DynamicAttribute\UpdateDynamicAttributeRequest;

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
     * @param StoreDynamicAttributeRequest $request
     * @return void
     */
    public function store(StoreDynamicAttributeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param DynamicAttribute $dynamicAttribute
     * @return void
     */
    public function show(DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DynamicAttribute $dynamicAttribute
     * @return void
     */
    public function edit(DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDynamicAttributeRequest $request
     * @param DynamicAttribute $dynamicAttribute
     * @return void
     */
    public function update(UpdateDynamicAttributeRequest $request, DynamicAttribute $dynamicAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DynamicAttribute $dynamicAttribute
     * @return void
     */
    public function destroy(DynamicAttribute $dynamicAttribute)
    {
        //
    }
}
