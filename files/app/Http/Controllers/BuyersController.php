<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\BuyerConsigneeDetail;
use App\Models\BuyerRepresentative;
use App\Models\Buyers;
use App\Models\City;
use App\Models\Countries;
use App\Models\GstRegisteredType;
use App\Models\Port;
use App\Models\PortOfDestination;
use App\Models\SalesOrder;
use App\Models\State;
use App\Models\VendorGroups;
use Illuminate\Http\Request;

class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = Buyers::with('representatives', 'consignee_details', 'sizing_plans', 'country', 'state', 'port_of_landing', 'port_of_destination')
            ->orderBy('id', 'desc')->get();
        return view('buyers.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::where("status", 1)->get();
        $countries = Countries::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        $vendor_groups = VendorGroups::with('yarn_pos', 'get_group_type')->where("status", 1)->get();
        $ports = Port::where("status", 1)->get();
        $port_of_destinations = PortOfDestination::where("status", 1)->get();
        $gst_registered_types = GstRegisteredType::where("status", 1)->get();
        $account_groups = AccountGroup::where("status", 1)->get();
        return view('buyers.add', compact('states', 'countries', 'cities', 'vendor_groups', 'ports', 'port_of_destinations', 'gst_registered_types', 'account_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'address_1' => 'required',
            'buyer_pincode' => 'required',
        ]);

        $data = $request->all();
        $buyer = Buyers::create($request->all());
        foreach ($data['representatives'] ?? array() as $rep) {
            $buyer->representatives()->create($rep);
        }
        return redirect()->route('buyers.index')->with('message', 'Buyer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Buyers::where('id', $id)->with('representatives','consignee_details','sizing_plans','country','state','port_of_landing','port_of_destination')->first();
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
        $states = State::where("status", 1)->get();
        $countries = Countries::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        $vendor_groups = VendorGroups::with('yarn_pos', 'get_group_type')->where("status", 1)->get();
        $ports = Port::where("status", 1)->get();
        $port_of_destinations = PortOfDestination::where("status", 1)->get();
        $item = Buyers::where('id', $id)->with('representatives','consignee_details','sizing_plans','country','state','port_of_landing','port_of_destination')->first();
        $gst_registered_types = GstRegisteredType::where("status", 1)->get();
        $account_groups = AccountGroup::where("status", 1)->get();
        return view('buyers.add', compact('states', 'item', 'countries', 'cities', 'vendor_groups', 'ports', 'port_of_destinations', 'gst_registered_types', 'account_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'address_1' => 'required',
            'buyer_pincode' => 'required',
        ]);

        $data = $request->all();
        $item = Buyers::findOrFail($id);
        $item->update($data);
        $item->representatives()->delete();
        foreach ($data['representatives'] ?? array() as $row) {
            $row['buyer_id'] = $item->id;
            $item->representatives()->create($row);
        }
        $item->consignee_details()->delete();
        foreach ($data['consignee_details'] ?? array() as $row) {
            $row['buyer_id'] = $item->id;
            BuyerConsigneeDetail::create($row);
        }
        return redirect()->route('buyers.index')->with('message', 'Buyer created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Buyers::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('message', 'Buyer deleted successfully');
    }
}
