<?php

namespace App\Http\Controllers;

use App\Models\PurchaseFabricPO;
use Illuminate\Http\Request;

class PurchaseFabricPOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase.fabric_po.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(PurchaseFabricPO $purchaseFabricPO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseFabricPO $purchaseFabricPO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseFabricPO $purchaseFabricPO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseFabricPO $purchaseFabricPO)
    {
        //
    }
}
