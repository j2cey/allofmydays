<?php

namespace App\Http\Controllers;

use App\Http\Requests\DynamicRow\StoreDynamicRowRequest;
use App\Http\Requests\DynamicRow\UpdateDynamicRowRequest;
use App\Models\DynamicAttributes\DynamicRow;

class DynamicRowController extends Controller
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
     * @param StoreDynamicRowRequest $request
     * @return void
     */
    public function store(StoreDynamicRowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param DynamicRow $dynamicrow
     * @return void
     */
    public function show(DynamicRow $dynamicrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DynamicRow $dynamicrow
     * @return void
     */
    public function edit(DynamicRow $dynamicrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDynamicRowRequest $request
     * @param DynamicRow $dynamicrow
     * @return void
     */
    public function update(UpdateDynamicRowRequest $request, DynamicRow $dynamicrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DynamicRow $dynamicrow
     * @return void
     */
    public function destroy(DynamicRow $dynamicrow)
    {
        //
    }
}
