<?php

namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Models\VendorGroups;
use Illuminate\Http\Request;

class VendorGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = VendorGroups::with('yarn_pos','get_group_type')->orderBy('id', 'desc')->get();
        $group_types = GroupType::where("status", 1)->get();
        return view('vendor_groups.index', compact('list', 'group_types'));
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
            'group' => 'required',
            'group_type' => 'required',
            'code' => 'required',
        ]);

        $data['is_internal'] = $request["is_internal"] ? "1" : "0";
        $data['status'] = $request["status"] ? "1" : "0";

        VendorGroups::create($data);
        return redirect()->back()->with('message', 'Vendor Group created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = VendorGroups::where('id', $id)->with('yarn_pos')->first();
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
        $item = VendorGroups::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'group' => 'required',
            'group_type' => 'required',
            'code' => 'required',
        ]);

        $data['is_internal'] = $request["is_internal"] ? "1" : "0";
        $data['status'] = $request["status"] ? "1" : "0";

        $item = VendorGroups::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        VendorGroups::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
