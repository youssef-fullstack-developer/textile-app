<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\SalesOrder;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class YarnInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = YarnInwardDetail::all();
        return view('stock.yarn_inward.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor_groups = VendorGroups::all();
        $vendors = Vendors::all();
        $locations = City::all();
        $purchase_orders = YarnPO::all();
        $agents = Agent::all();
        $sale_orders = SalesOrder::all();
        $yarns = Yarn::all();
        $colors = Color::all();
        return view('stock.yarn_inward.add', compact('vendor_groups','vendors', 'locations', 'purchase_orders', 'agents', 'sale_orders', 'yarns', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = YarnInward::create($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            $detail['yarn_inward_id'] = $item->id;
            $det = YarnInwardDetail::create($detail);
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['yarn_inward_detail_id'] = $det->id;
                YarnInwardDetailLot::create($row);
            }
        }
        return redirect('yarn_inward')->with('message', "Successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $get_details = $request->get("get_details", false);
        if($get_details && !empty($get_details)) {
            if(!$id){
                $item = YarnInwardDetail::select('*')->with('yarn_inward', 'lots', 'yarn', 'mill')->get();
            }else {
                $item = YarnInwardDetail::where('id', $id)->with('yarn_inward', 'lots', 'yarn', 'mill')->first();
            }
        }else {
            $item = YarnInward::where('id', $id)->with('details', 'vendor_group', 'agent', 'certification_type', 'po_type', 'pr_num', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee', 'yarn_type')->first();
        }
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
        $item = YarnInward::findOrFail($id);
        $vendor_groups = VendorGroups::all();
        $vendors = Vendors::all();
        $locations = City::all();
        $purchase_orders = YarnPO::all();
        $agents = Agent::all();
        $sale_orders = SalesOrder::all();
        $yarns = Yarn::all();
        $colors = Color::all();
        return view('stock.yarn_inward.add', compact('item','vendor_groups','vendors', 'locations', 'purchase_orders', 'agents', 'sale_orders', 'yarns', 'colors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = YarnInward::findOrFail($id);
        $data['is_jobwork_order'] = $data['is_jobwork_order'] ?? 0;
        $item->update($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = YarnInwardDetail::findOrFail($id);
                $det->update($detail);
            }
            else{
                $detail['yarn_inward_id'] = $item->id;
                $det = YarnInwardDetail::create($detail);
            }
            $det->lots()->delete();
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['yarn_inward_detail_id'] = $det->id;
                YarnInwardDetailLot::create($row);
            }
        }
        return redirect('yarn_inward')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = YarnInwardDetail::find($id);
        if($item){
            $item->lots()->delete();
            $item->delete();
        }
        return redirect('yarn_inward')->with('message', "Deleted Successfully...");
    }
}
