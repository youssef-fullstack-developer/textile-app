<?php

namespace App\Http\Controllers;

use App\Models\InvoiceSettings;
use Illuminate\Http\Request;

class InvoiceSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice_settings = InvoiceSettings::orderBy('id', 'desc')->get();
        return view('invoice_settings.index', compact('invoice_settings'));
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
        $data = $request->validate([
            'key' => 'required',
            'value' => 'required|unique:invoice_settings'
        ]);

        InvoiceSettings::create($data);
        return redirect('invoice_settings')->with('message', 'Settings created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = InvoiceSettings::find($id);
        $status = true;
        if (!$item) {
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = InvoiceSettings::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'key' => 'required',
            'value' => 'required'
        ]);

        $item = InvoiceSettings::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InvoiceSettings::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
