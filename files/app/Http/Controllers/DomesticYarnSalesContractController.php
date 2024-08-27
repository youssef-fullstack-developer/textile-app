<?php

namespace App\Http\Controllers;

use App\Models\DomesticYarnSalesContract;
use Illuminate\Http\Request;

class DomesticYarnSalesContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.yarn.sales_contract.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domestic.yarn.sales_contract.add');
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
    public function show(DomesticYarnSalesContract $domesticYarnSalesContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticYarnSalesContract $domesticYarnSalesContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticYarnSalesContract $domesticYarnSalesContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticYarnSalesContract $domesticYarnSalesContract)
    {
        //
    }
}
