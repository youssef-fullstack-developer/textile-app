<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\BalePacking;
use App\Models\Buyers;
use App\Models\City;
use App\Models\ClothChallan;
use App\Models\Color;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\PackingType;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use App\Models\Sort;
use App\Models\Transportations;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class ClothChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ClothChallan::with('buyer','transportation','order','sort','consignee','order_sort','packing_type','from_bale','to_bale','invoice')
        ->orderBy('id', 'desc')->get();
        return view('warehouse.cloth_challan.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buyers = Buyers::all();
        $transportations = Transportations::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $order_sorts = SalesOrderDetail::all();
        $packing_types = PackingType::where("status", 1)->get();
        $meter_ranges = array();
        $bales = BalePacking::all();
        return view('warehouse.cloth_challan.add', compact('buyers','transportations','vendors','order_sorts','packing_types','meter_ranges','bales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = ClothChallan::create($data);
//        foreach ($data['details'] ?? array()  as $i => $detail){
//            $detail['cloth_challan_id'] = $item->id;
//            $det = ClothChallanDetail::create($detail);
//        }
        return redirect('cloth_challan')->with('message', "Successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = ClothChallan::where('id', $id)->with('buyer', 'transportation', 'order', 'sort', 'consignee')->first();
        $status = true;
        if (!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buyers = Buyers::all();
        $transportations = Transportations::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $order_sorts = SalesOrderDetail::all();
        $packing_types = PackingType::where("status", 1)->get();
        $meter_ranges = array();
        $bales = BalePacking::all();
        $item = ClothChallan::findOrFail($id);
        return view('warehouse.cloth_challan.add', compact('item','buyers','transportations','vendors','order_sorts','packing_types','meter_ranges','bales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = ClothChallan::findOrFail($id);
        $data['fabric_seconds_sales'] = $data['fabric_seconds_sales'] ?? 0;
//        dd($data);
        $item->update($data);
//        foreach ($data['details'] ?? array()  as $i => $detail){
//            if(!empty($detail['id']) && $detail['id'] > 0)
//            {
//                $det = ClothChallanDetail::findOrFail($detail['id']);
//                $det->update($detail);
//            }
//            else{
//                $detail['cloth_challan_id'] = $item->id;
//                $det = ClothChallanDetail::create($detail);
//            }
//        }
        return redirect('cloth_challan')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
