<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use Illuminate\Http\Request;

class PackingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Packing::orderBy('id', 'desc')->get();
        return view('packing_type.index', compact('list'));
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

        Packing::create($data);
        return redirect()->back()->with('message', 'Packing type created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Packing $paymentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Packing::findOrFail($id);
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

        $item = Packing::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Packing type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Packing::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Packing type deleted successfully');
    }
}
