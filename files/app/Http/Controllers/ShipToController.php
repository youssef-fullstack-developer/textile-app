<?php

namespace App\Http\Controllers;

use App\Models\ShipTo;
use Illuminate\Http\Request;

class ShipToController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ShipTo::orderBy('id', 'desc')->get();
        return view('ship_to.index', compact('list'));
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
        $data['address'] = $request->address ?? '';
        $data['status'] = $request->status ? 1 : 0;

        ShipTo::create($data);
        return redirect('ship_to')->with('message', 'Shipping Term created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = ShipTo::where('id', $id)->first();
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
        $item = ShipTo::findOrFail($id);
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
        $data['address'] = $request->address ?? '';
        $data['status'] = $request->status ? 1 : 0;

        $item = ShipTo::findOrFail($id);
        $item->update($data);
        return redirect('ship_to')->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ShipTo::findOrFail($id)->delete();
        return redirect('ship_to')->with('success', 'Deleted successfully');
    }
}
