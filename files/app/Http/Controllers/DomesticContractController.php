<?php

namespace App\Http\Controllers;

use App\Models\DomesticContract;
use Illuminate\Http\Request;

class DomesticContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.contract.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domestic.contract.add');
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
    public function show(DomesticContract $domesticContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticContract $domesticContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticContract $domesticContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticContract $domesticContract)
    {
        //
    }
}
