<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportType\StoreReportTypeRequest;
use App\Http\Requests\ReportType\UpdateReportTypeRequest;
use App\Models\Report\ReportType;

class ReportTypeController extends Controller
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
     * @param StoreReportTypeRequest $request
     * @return void
     */
    public function store(StoreReportTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param ReportType $reporttype
     * @return void
     */
    public function show(ReportType $reporttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ReportType $reporttype
     * @return void
     */
    public function edit(ReportType $reporttype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReportTypeRequest $request
     * @param ReportType $reporttype
     * @return void
     */
    public function update(UpdateReportTypeRequest $request, ReportType $reporttype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ReportType $reporttype
     * @return void
     */
    public function destroy(ReportType $reporttype)
    {
        //
    }
}