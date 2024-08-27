<?php

namespace App\Http\Controllers;

use App\Models\BuyerRepresentative;
use App\Models\Buyers;
use App\Models\City;
use App\Models\Countries;
use App\Models\Port;
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
        $buyers = Buyers::all();
        return view('buyers.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        $countries = Countries::all();
        $cities = City::all();
        $vendor_groups = VendorGroups::all();
        $ports = Port::all();
        return view('buyers.add', compact('states', 'countries', 'cities','vendor_groups','ports'));
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
        $item = Buyers::where('id',$id)->with('sizing_plans')->first();
        return response()->json(['status' => true, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $states = State::all();
        $countries = Countries::all();
        $cities = City::all();
        $vendor_groups = VendorGroups::all();
        $ports = Port::all();
        $item = Buyers::findOrFail($id);
        return view('buyers.add', compact('states','item', 'countries', 'cities','vendor_groups','ports'));
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
        foreach ($data['representatives'] ?? array() as $rep) {
                $item->representatives()->create($rep);
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
