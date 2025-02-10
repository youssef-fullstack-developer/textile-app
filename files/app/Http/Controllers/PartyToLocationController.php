<?php

namespace App\Http\Controllers;

use App\Models\PartyToLocation;
use Illuminate\Http\Request;

class PartyToLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = PartyToLocation::orderBy('id', 'desc')->get();
        return view('others.party_to_location.index', compact('list'));
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
            'status' => 'required',
        ]);
        $data['status'] = $request->status ? 1 : 0;

        PartyToLocation::create($data);
        return redirect()->back()->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartyToLocation $PartyToLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PartyToLocation::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $data['status'] = $request->status ? 1 : 0;
        $item = PartyToLocation::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PartyToLocation::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
