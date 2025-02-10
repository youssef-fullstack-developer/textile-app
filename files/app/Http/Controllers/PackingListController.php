<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bank;
use App\Models\Buyers;
use App\Models\City;
use App\Models\ClothChallan;
use App\Models\Color;
use App\Models\ContainerSize;
use App\Models\Countries;
use App\Models\DeliveryTerms;
use App\Models\Invoice;
use App\Models\InvoiceAdditional;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceOther;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\License;
use App\Models\PaymentTerms;
use App\Models\Port;
use App\Models\PreCarriage;
use App\Models\SalesOrder;
use App\Models\SalesType;
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
        $list = ClothChallan::with('buyer','transportation','order','sort','consignee','order_sort','packing_type','from_bale','to_bale','invoice')
            ->orderBy('id', 'desc')->get();
        return view('exports.packing_list.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::where("status", 1)->get();
        $notify = Vendors::where("status", 1)->get();
        $banks = Bank::where("status", 1)->get();
        $transportations = Transportations::all();
        $vendor_groups = VendorGroups::with('yarn_pos', 'get_group_type')->where("status", 1)->get();


        $buyers = Buyers::all();
        $destination_countries = Countries::where('status', 1)->get();
        $pre_carriage_bys = PreCarriage::where('status', 1)->get();
        $port_of_loadings = Port::where('status', 1)->get();
        $port_of_discharges = Port::where('status', 1)->get();
        $final_destinations = Countries::where('status', 1)->get();
        $container_sizes = ContainerSize::where('status', 1)->get();
        $forwarders = Vendors::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $container_types = ContainerSize::where('status', 1)->get();
        $lc_banks = Bank::where('status', 1)->get();
        $sales_types = SalesType::where('status', 1)->get();
        $licence_numbers = License::where('status', 1)->get();
        $terms_of_delivery_and_payments = PaymentTerms::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();


        return view('exports.packing_list.add', compact('vendors','colors','licence_numbers','terms_of_delivery_and_payments','buyers','destination_countries','pre_carriage_bys','port_of_loadings','port_of_discharges','final_destinations','container_sizes','forwarders','agents','container_types','sales_types','lc_banks', 'notify', 'banks', 'transportations', 'vendor_groups'));
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
        $vendors = Vendors::where("status", 1)->get();
        $notify = Vendors::where("status", 1)->get();
        $banks = Bank::where("status", 1)->get();
        $transportations = Transportations::all();
        $vendor_groups = VendorGroups::with('yarn_pos', 'get_group_type')->where("status", 1)->get();


        $buyers = Buyers::all();
        $destination_countries = Countries::where('status', 1)->get();
        $pre_carriage_bys = PreCarriage::where('status', 1)->get();
        $port_of_loadings = Port::where('status', 1)->get();
        $port_of_discharges = Port::where('status', 1)->get();
        $final_destinations = Countries::where('status', 1)->get();
        $container_sizes = ContainerSize::where('status', 1)->get();
        $forwarders = Vendors::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $container_types = ContainerSize::where('status', 1)->get();
        $lc_banks = Bank::where('status', 1)->get();
        $sales_types = SalesType::where('status', 1)->get();
        $licence_numbers = License::where('status', 1)->get();
        $terms_of_delivery_and_payments = PaymentTerms::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();

        return view('exports.packing_list.add', compact('item','vendors','colors','licence_numbers','terms_of_delivery_and_payments','buyers','destination_countries','pre_carriage_bys','port_of_loadings','port_of_discharges','final_destinations','container_sizes','forwarders','agents','container_types','sales_types','lc_banks', 'notify', 'banks', 'transportations', 'vendor_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cloth = ClothChallan::findOrFail($id);
        $data = $request->all();
        $data['invoice_number'] = 'INV-' . $data['invoice_number'];
        $data['cloth_challan_id'] = $id;
        if (!empty($cloth->invoice ?? null)) {
            $item = $cloth->invoice?->update($data);
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
