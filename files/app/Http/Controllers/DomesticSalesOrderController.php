<?php

namespace App\Http\Controllers;

use App\Models\DomesticSalesOrder;
use Illuminate\Http\Request;

class DomesticSalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.sales_order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domestic.sales_order.add');
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
    public function show(DomesticSalesOrder $domesticSalesOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticSalesOrder $domesticSalesOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticSalesOrder $domesticSalesOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticSalesOrder $domesticSalesOrder)
    {
        //
    }
}
