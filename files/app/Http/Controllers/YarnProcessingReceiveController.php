<?php

namespace App\Http\Controllers;

use App\Models\YarnProcessingReceive;
use Illuminate\Http\Request;

class YarnProcessingReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planning.yarn_processing_receive.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return ('planning.yarn_processing_receive.add');
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
    public function show(YarnProcessingReceive $yarnProcessingReceive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YarnProcessingReceive $yarnProcessingReceive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YarnProcessingReceive $yarnProcessingReceive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YarnProcessingReceive $yarnProcessingReceive)
    {
        //
    }
}
