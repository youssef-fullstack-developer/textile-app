<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Countries;
use App\Models\DomesticBuyer;
use App\Models\Port;
use App\Models\State;
use App\Models\VendorGroups;
use Illuminate\Http\Request;

class DomesticBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = DomesticBuyer::all();
        return view('domestic.buyer.index', compact('buyers'));
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
        return view('domestic.buyer.add', compact('states', 'countries', 'cities','vendor_groups','ports'));
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

        $data = $request->except('tcs_declaration');
        $image = $request->tcs_declaration;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image_name = date('Ymdhis');
            $image_name = $image_name . '.' . $ext;
            $image->move(public_path('uploads/domestic_buyers'), $image_name);
            $data['tcs_declaration'] = $image_name;
        }
        $buyer = DomesticBuyer::create($request->all());

        foreach ($data['representatives'] ?? array() as $rep) {
            $buyer->representatives()->create($rep);
        }

        return redirect()->route('domestic.buyer.index')->with('message', 'Domestic Buyer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DomesticBuyer $domesticBuyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomesticBuyer $domesticBuyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomesticBuyer $domesticBuyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomesticBuyer $domesticBuyer)
    {
        //
    }
}
