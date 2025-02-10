<?php

namespace App\Http\Controllers;

use App\Models\GodownLocations;
use App\Models\LocationType;
use App\Models\VendorGroups;
use Illuminate\Http\Request;

class GodownLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = GodownLocations::with('get_vendor_group')->orderBy('id', 'desc')->get();
        $location_types = LocationType::all();
        $vendor_groups = VendorGroups::with('yarn_pos','get_group_type')->where("status", 1)->get();
        return view('godown.index', compact('list', 'location_types', 'vendor_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);
        $data['description'] = $request->description;
        $data['code'] = $request->code;
        $data['vendor_group_id'] = $request->vendor_group_id;
        $data['type'] = $request->type;
        $data['zone'] = $request->zone;
        $data['is_default'] = $request["is_default"] ? "1" : "0";
        $data['status'] = $request["status"] ? "1" : "0";

        GodownLocations::create($data);
        return redirect()->back()->with('message', 'Godown location created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = GodownLocations::find($id);
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
        $item = GodownLocations::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);
        $data['description'] = $request->description;
        $data['code'] = $request->code;
        $data['vendor_group_id'] = $request->vendor_group_id;
        $data['type'] = $request->type;
        $data['zone'] = $request->zone;
        $data['is_default'] = $request["is_default"] ? "1" : "0";
        $data['status'] = $request["status"] ? "1" : "0";


        $item = GodownLocations::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        GodownLocations::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
