<?php

namespace App\Http\Controllers;

use App\Models\ShippingTerm;
use Illuminate\Http\Request;

class ShippingTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ShippingTerm::all();
        return view('shipping_terms.index', compact('list'));
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
            'name' => 'required'
        ]);
        $data['status'] = $request->status ? 1 : 0;

        ShippingTerm::create($data);
        return redirect('shipping_terms')->with('message', 'Shipping Term created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingTerm $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ShippingTerm::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['status'] = $request->status ? 1 : 0;

        $item = ShippingTerm::findOrFail($id);
        $item->update($data);
        return redirect('shipping_terms')->with('success', 'Shipping Term updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ShippingTerm::findOrFail($id)->delete();
        return redirect('shipping_terms')->with('success', 'Shipping Term deleted successfully');
    }
}
