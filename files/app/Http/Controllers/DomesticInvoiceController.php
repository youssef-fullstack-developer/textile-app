<?php

namespace App\Http\Controllers;

use App\Models\DomesticInvoice;
use Illuminate\Http\Request;

class DomesticInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.invoice.index');
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
    public function show(DomesticInvoice $domesticInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticInvoice $domesticInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticInvoice $domesticInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticInvoice $domesticInvoice)
    {
        //
    }
}
