<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\Invoice;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\SalesOrder;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class ExportInvoiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Invoice::all();
        return view('exports.export_invoice_list.index', compact('list'));
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
        return view('exports.export_invoice_list.add', compact('vendor_groups','vendors', 'locations', 'purchase_orders', 'agents', 'sale_orders', 'yarns', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = YarnInward::create($data);
        foreach ($data['details'] ?? array() as $i => $detail){
            $detail['export_invoice_list_id'] = $item->id;
            $det = YarnInwardDetail::create($detail);
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['export_invoice_list_detail_id'] = $det->id;
                YarnInwardDetailLot::create($row);
            }
        }
        return redirect('export_invoice_list')->with('message', "Successfully...");
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
        $item = YarnInward::findOrFail($id);
        $vendor_groups = VendorGroups::all();
        $vendors = Vendors::all();
        $locations = City::all();
        $purchase_orders = YarnPO::all();
        $agents = Agent::all();
        $sale_orders = SalesOrder::all();
        $yarns = Yarn::all();
        $colors = Color::all();
        return view('exports.export_invoice_list.add', compact('item','vendor_groups','vendors', 'locations', 'purchase_orders', 'agents', 'sale_orders', 'yarns', 'colors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = YarnInward::findOrFail($id);
        $item->update($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = YarnInwardDetail::findOrFail($id);
                $det->update($detail);
            }
            else{
                $detail['export_invoice_list_id'] = $item->id;
                $det = YarnInwardDetail::create($detail);
            }
            $det->lots()->delete();
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['export_invoice_list_detail_id'] = $det->id;
                YarnInwardDetailLot::create($row);
            }
        }
        return redirect('export_invoice_list')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
