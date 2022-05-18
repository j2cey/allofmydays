<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDynamicValueIntegerRequest;
use App\Http\Requests\UpdateDynamicValueIntegerRequest;
use App\Models\DynamicValueInteger;

class DynamicValueIntegerController extends Controller
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
     * @param  \App\Http\Requests\StoreDynamicValueIntegerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDynamicValueIntegerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicValueInteger  $dynamicValueInteger
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicValueInteger $dynamicValueInteger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicValueInteger  $dynamicValueInteger
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicValueInteger $dynamicValueInteger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDynamicValueIntegerRequest  $request
     * @param  \App\Models\DynamicValueInteger  $dynamicValueInteger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDynamicValueIntegerRequest $request, DynamicValueInteger $dynamicValueInteger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicValueInteger  $dynamicValueInteger
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicValueInteger $dynamicValueInteger)
    {
        //
    }
}
