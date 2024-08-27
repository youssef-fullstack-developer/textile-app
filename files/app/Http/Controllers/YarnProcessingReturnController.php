<?php

namespace App\Http\Controllers;

use App\Models\YarnProcessingReturn;
use Illuminate\Http\Request;

class YarnProcessingReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planning.yarn_processing_return.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planning.yarn_processing_return.add');
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
    public function show(YarnProcessingReturn $yarnProcessingReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YarnProcessingReturn $yarnProcessingReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YarnProcessingReturn $yarnProcessingReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YarnProcessingReturn $yarnProcessingReturn)
    {
        //
    }
}
