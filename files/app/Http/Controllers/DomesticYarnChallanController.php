<?php

namespace App\Http\Controllers;

use App\Models\DomesticYarnChallan;
use Illuminate\Http\Request;

class DomesticYarnChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.yarn.challan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domestic.yarn.challan.add');
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
    public function show(DomesticYarnChallan $domesticYarnChallan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticYarnChallan $domesticYarnChallan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticYarnChallan $domesticYarnChallan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticYarnChallan $domesticYarnChallan)
    {
        //
    }
}
