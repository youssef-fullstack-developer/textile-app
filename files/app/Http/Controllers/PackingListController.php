<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bank;
use App\Models\Buyers;
use App\Models\City;
use App\Models\ClothChallan;
use App\Models\Color;
use App\Models\Invoice;
use App\Models\InvoiceAdditional;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceOther;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\SalesOrder;
use App\Models\Transportations;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class PackingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ClothChallan::all();
        return view('exports.packing_list.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $exporters = array();
        $banks = Bank::all();
        $transportations = Transportations::all();
        $vendor_groups = VendorGroups::all();
        return view('exports.packing_list.add', compact('exporters', 'banks', 'transportations', 'vendor_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $item = ClothChallan::findOrFail($id);
        $exporters = array();
        $banks = Bank::all();
        $transportations = Transportations::all();
        $vendor_groups = VendorGroups::all();
        return view('exports.packing_list.add', compact('item', 'exporters','transportations', 'banks', 'vendor_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cloth = ClothChallan::findOrFail($id);
        $data = $request->all();
        $data['invoice_number'] = 'INV-'.$data['invoice_number'];
        if (!empty($cloth->invoice ?? null)) {
            $item = $cloth->invoice->update($data);
        } else {
            $item = Invoice::create($data);
        }
        $item->additionals()->delete();
        $item->discounts()->delete();
        $item->others()->delete();
        foreach ($data['additionals'] ?? array() as $row) {
            $row['invoice_id'] = $item->id;
            InvoiceAdditional::create($row);
        }
        foreach ($data['discounts'] ?? array() as $row) {
            $row['invoice_id'] = $item->id;
            InvoiceDiscount::create($row);
        }
        foreach ($data['others'] ?? array() as $row) {
            $row['invoice_id'] = $item->id;
            InvoiceOther::create($row);
        }
        return redirect('packing_list')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
