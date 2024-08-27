<?php

namespace App\Http\Controllers;

use App\Models\YarnOpeningBalance;
use Illuminate\Http\Request;

class YarnOpeningBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stock.yarn_opening_balance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.yarn_opening_balance.add');
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
    public function show(YarnOpeningBalance $yarnOpeningBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YarnOpeningBalance $yarnOpeningBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YarnOpeningBalance $yarnOpeningBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YarnOpeningBalance $yarnOpeningBalance)
    {
        //
    }
}
