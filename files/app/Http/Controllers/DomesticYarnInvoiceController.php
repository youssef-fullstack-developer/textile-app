<?php

namespace App\Http\Controllers;

use App\Models\DomesticYarnInvoice;
use Illuminate\Http\Request;

class DomesticYarnInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('domestic.yarn.invoice.index');
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
    public function show(DomesticYarnInvoice $domesticYarnInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticYarnInvoice $domesticYarnInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticYarnInvoice $domesticYarnInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticYarnInvoice $domesticYarnInvoice)
    {
        //
    }
}
