<?php

namespace App\Http\Controllers\DynamicAttributes;

use App\Http\Controllers\Controller;
use App\Models\DynamicAttributes\DynamicAttributeType;
use App\Http\Requests\DynamicAttributeType\StoreDynamicAttributeTypeRequest;
use App\Http\Requests\DynamicAttributeType\UpdateDynamicAttributeTypeRequest;

class DynamicAttributeTypeController extends Controller
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
     * @param StoreDynamicAttributeTypeRequest $request
     * @return void
     */
    public function store(StoreDynamicAttributeTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param DynamicAttributeType $dynamicattributetype
     * @return void
     */
    public function show(DynamicAttributeType $dynamicattributetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DynamicAttributeType $dynamicattributetype
     * @return void
     */
    public function edit(DynamicAttributeType $dynamicattributetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDynamicAttributeTypeRequest $request
     * @param DynamicAttributeType $dynamicattributetype
     * @return void
     */
    public function update(UpdateDynamicAttributeTypeRequest $request, DynamicAttributeType $dynamicattributetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DynamicAttributeType $dynamicattributetype
     * @return void
     */
    public function destroy(DynamicAttributeType $dynamicattributetype)
    {
        //
    }
}
