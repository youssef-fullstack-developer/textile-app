<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\BalePacking;
use App\Models\BalePackingDetail;
use App\Models\Buyers;
use App\Models\City;
use App\Models\Color;
use App\Models\Grade;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkProcessContractIssue;
use App\Models\JobworkProcessContractIssueDetail;
use App\Models\LoomTypes;
use App\Models\PackingType;
use App\Models\SalesOrder;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class BalePackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = BalePacking::all();
        return view('warehouse.bale_packing.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packing_types = PackingType::all();
        $buyers = Buyers::all();
        $orders = SalesOrder::all();
        $yarns = Yarn::all();
        $vendors = Vendors::all();
        $loom_types = LoomTypes::all();
        $grades = Grade::all();
        $piece_numbers = JobworkProcessContractIssueDetail::select('piece_no as val')->groupBy('piece_no')->get();
        return view('warehouse.bale_packing.add', compact('packing_types','buyers','orders','yarns','vendors','loom_types','vendors','grades','piece_numbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $item = BalePacking::create($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            $detail['bale_packing_id'] = $item->id;
            $det = BalePackingDetail::create($detail);
        }
        return redirect('bale_packing')->with('message', "Successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $packing_types = PackingType::all();
        $buyers = Buyers::all();
        $orders = SalesOrder::all();
        $yarns = Yarn::all();
        $vendors = Vendors::all();
        $loom_types = LoomTypes::all();
        $grades = Grade::all();
        $piece_numbers = JobworkProcessContractIssueDetail::select('piece_no as val')->groupBy('piece_no')->get();
        $item = BalePacking::findOrFail($id);
//        $item = BalePackingDetail::findOrFail(2);
//        dd($item);
        return view('warehouse.bale_packing.add', compact('item','packing_types','buyers','orders','yarns','vendors','loom_types','vendors','grades','piece_numbers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = BalePacking::findOrFail($id);
        $data['by_location'] = $data['by_location'] ?? 0;
        $data['fabric_seconds_sales'] = $data['fabric_seconds_sales'] ?? 0;
        $item->update($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = BalePackingDetail::findOrFail($detail['id']);
                $det->update($detail);
            }
            else{
                $detail['bale_packing_id'] = $item->id;
                $det = BalePackingDetail::create($detail);
            }
        }
        return redirect('bale_packing')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
