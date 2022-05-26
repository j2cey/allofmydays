<?php

namespace App\Http\Controllers\Reports;

use App\Models\Report\Report;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Http\Resources\Report\ReportResource;
use App\Http\Requests\Report\StoreReportRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Requests\Report\UpdateReportRequest;

class ReportController extends Controller
{
    public function fetch() {
        return ReportResource::collection(Report::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        return view('reports.index');
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
     * @param StoreReportRequest $request
     * @return void
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Report $report
     * @return void
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Report $report
     * @return Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReportRequest $request
     * @param Report $report
     * @return void
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return void
     */
    public function destroy(Report $report)
    {
        //
    }
}
