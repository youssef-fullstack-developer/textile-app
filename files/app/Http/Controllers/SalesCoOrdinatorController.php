<?php

namespace App\Http\Controllers;

use App\Models\SalesCoOrdinator;
use Illuminate\Http\Request;

class SalesCoOrdinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SalesCoOrdinator::all();
        return view('sales_co_ordinators.index', compact('list'));
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

        SalesCoOrdinator::create($data);
        return redirect('sales_co_ordinators')->with('message', 'Sales Co-Ordinator created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesCoOrdinator $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = SalesCoOrdinator::findOrFail($id);
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

        $item = SalesCoOrdinator::findOrFail($id);
        $item->update($data);
        return redirect('sales_co_ordinators')->with('success', 'Sales Co-Ordinator updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SalesCoOrdinator::findOrFail($id)->delete();
        return redirect('sales_co_ordinators')->with('success', 'Sales Co-Ordinator deleted successfully');
    }
}
