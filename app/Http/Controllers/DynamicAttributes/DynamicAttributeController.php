<?php

namespace App\Http\Controllers\DynamicAttributes;

use App\Http\Controllers\Controller;
use App\Models\DynamicAttributes\DynamicAttribute;
use App\Http\Requests\DynamicAttribute\StoreDynamicAttributeRequest;
use App\Http\Requests\DynamicAttribute\UpdateDynamicAttributeRequest;

class DynamicAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
     * @param DynamicAttribute $dynamicattribute
     * @return void
     */
    public function show(DynamicAttribute $dynamicattribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DynamicAttribute $dynamicattribute
     * @return void
     */
    public function edit(DynamicAttribute $dynamicattribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDynamicAttributeRequest $request
     * @param DynamicAttribute $dynamicattribute
     * @return void
     */
    public function update(UpdateDynamicAttributeRequest $request, DynamicAttribute $dynamicattribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DynamicAttribute $dynamicattribute
     * @return void
     */
    public function destroy(DynamicAttribute $dynamicattribute)
    {
        //
    }
}
