<?php

namespace App\Http\Controllers;

use App\Models\ProcessReturn;
use Illuminate\Http\Request;

class ProcessReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('warehouse.process_return.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.process_return.add');
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
    public function show(ProcessReturn $processReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessReturn $processReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcessReturn $processReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessReturn $processReturn)
    {
        //
    }
}
