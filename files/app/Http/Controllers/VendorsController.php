<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Vendors::all();
        $vendor_groups = VendorGroups::where('status',1)->get();
        $cities = City::where('status',1)->get();
        $states = State::where('status',1)->get();
        return view('vendors.index', compact('list', 'vendor_groups', 'cities', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Vendors::create($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Vendors::where('id', $id)->with('yarn_pos')->first();
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
        $item = Vendors::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $item = Vendors::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vendors::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
