<?php

namespace App\Http\Controllers;

use App\Models\FabricInward;
use Illuminate\Http\Request;

class FabricInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stock.fabric_inward.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.fabric_inward.add');
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
    public function show(FabricInward $fabricInward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FabricInward $fabricInward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FabricInward $fabricInward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FabricInward $fabricInward)
    {
        //
    }
}
