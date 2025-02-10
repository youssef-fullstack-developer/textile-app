<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTerms;
use Illuminate\Http\Request;

class DeliveryTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivery_terms = DeliveryTerms::orderBy('id', 'desc')->get();
        return view('master.delivery_terms.index', compact('delivery_terms'));
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
            'name' => 'required',
            'description' => 'required',
            'delivery_for' => 'required',
            'status' => 'required',
        ]);

        DeliveryTerms::create($data);
        return redirect()->back()->with('message', 'Delivery Terms created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryTerms $deliveryTerms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = DeliveryTerms::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'delivery_for' => 'required',
            'status' => 'required',
        ]);
        $item = DeliveryTerms::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Delivery Term updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DeliveryTerms::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Delivery Term deleted successfully');
    }
}
