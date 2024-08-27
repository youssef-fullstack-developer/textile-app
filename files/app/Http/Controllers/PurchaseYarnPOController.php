<?php

namespace App\Http\Controllers;

use App\Models\PurchaseYarnPO;
use Illuminate\Http\Request;

class PurchaseYarnPOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase.yarn_po.index');
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
    public function show(PurchaseYarnPO $purchaseYarnPO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseYarnPO $purchaseYarnPO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseYarnPO $purchaseYarnPO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseYarnPO $purchaseYarnPO)
    {
        //
    }
}
