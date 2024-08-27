<?php

namespace App\Http\Controllers;

use App\Models\FabricOpeningBalance;
use Illuminate\Http\Request;

class FabricOpeningBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stock.fabric_opening_balance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.fabric_opening_balance.add');
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
    public function show(FabricOpeningBalance $fabricOpeningBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FabricOpeningBalance $fabricOpeningBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FabricOpeningBalance $fabricOpeningBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FabricOpeningBalance $fabricOpeningBalance)
    {
        //
    }
}
