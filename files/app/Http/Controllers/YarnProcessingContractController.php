<?php

namespace App\Http\Controllers;

use App\Models\YarnProcessingContract;
use Illuminate\Http\Request;

class YarnProcessingContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planning.yarn_processing_contract.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planning.yarn_processing_contract.add');
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
    public function show(YarnProcessingContract $yarnProcessingContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YarnProcessingContract $yarnProcessingContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YarnProcessingContract $yarnProcessingContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YarnProcessingContract $yarnProcessingContract)
    {
        //
    }
}
