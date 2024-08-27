<?php

namespace App\Http\Controllers;

use App\Models\YarnProcessingContractIssue;
use Illuminate\Http\Request;

class YarnProcessingContractIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planning.yarn_processing_contract_issue.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planning.yarn_processing_contract_issue.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(YarnProcessingContractIssue $yarnProcessingContractIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YarnProcessingContractIssue $yarnProcessingContractIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YarnProcessingContractIssue $yarnProcessingContractIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YarnProcessingContractIssue $yarnProcessingContractIssue)
    {
        //
    }
}
