<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bank;
use App\Models\Buyers;
use App\Models\City;
use App\Models\ContainerSize;
use App\Models\Contracts;
use App\Models\ContractType;
use App\Models\Countries;
use App\Models\InspectionType;
use App\Models\InvoiceSettings;
use App\Models\InvoiceType;
use App\Models\PaperTubeSize;
use App\Models\PaymentTerms;
use App\Models\Port;
use App\Models\PortOfDestination;
use App\Models\SalesCoOrdinator;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use App\Models\SalesOrderSubDetail;
use App\Models\SalesOrderYarnCertification;
use App\Models\Selvedge;
use App\Models\ShippingTerm;
use App\Models\ShipTo;
use App\Models\Sort;
use App\Models\SoType;
use App\Models\SourcingExecutive;
use App\Models\TermsCondition;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vendors;
use App\Models\Weave;
use App\Models\YarnCertificationType;
use Illuminate\Http\Request;
use Tests\Localization\DaDkTest;

class
SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SalesOrder::with('sales_order_details', 'buyer')->orderBy('id', 'desc')->get();
        return view('sales_order.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoice_types = InvoiceType::where("status", 1)->get();
        $contract_types = ContractType::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        $buyers = Buyers::all();
        $sourcing_executives = SourcingExecutive::where("status", 1)->get();
        $countries = Countries::where("status", 1)->get();
        $agents = Agent::where("status", 1)->get();
        $shipping_terms = ShippingTerm::where("status", 1)->get();
        $banks = Bank::where("status", 1)->get();
        $container_sizes = ContainerSize::where("status", 1)->get();
        $payment_terms = PaymentTerms::where("status", 1)->get();
        $terms_conditions = TermsCondition::where("status", 1)->get();
        $users = User::all();
        $sales_co_ordinators = SalesCoOrdinator::where("status", 1)->get();
        $so_types = SoType::where("status", 1)->get();
        $sorts = Sort::where("status", 1)->get();
        $weave_types = Weave::where("status", 1)->get();
        $selvedges = Selvedge::where("status", 1)->get();
        $units = Unit::where("status", 1)->get();
        $ship_to = ShipTo::where("status", 1)->get();
        $inspection_types = InspectionType::where("status", 1)->get();
        $paper_tube_sizes = PaperTubeSize::where("status", 1)->get();
        $vendors = Vendors::where("status", 1)->get();
        $port_of_loadings = Port::where("status", 1)->get();
        $port_of_destinations = PortOfDestination::where("status", 1)->get();
        $yarn_certification_types = YarnCertificationType::where("status", 1)->get();

        return view('sales_order.add', compact('invoice_types','ship_to','vendors','port_of_destinations','port_of_loadings', 'contract_types', 'cities', 'buyers', 'sourcing_executives', 'countries', 'agents', 'shipping_terms', 'banks', 'container_sizes', 'payment_terms', 'terms_conditions', 'users', 'sales_co_ordinators', 'so_types', 'sorts', 'weave_types', 'sorts', 'selvedges', 'units', 'inspection_types', 'paper_tube_sizes', 'yarn_certification_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $order = SalesOrder::create($data);
        $order->order_no = "HST/EX01/".$order->id;
        $order->save();
        $i = 0;
        foreach ($data["order_details"] ?? array() as $key => $order_details) {
            $order_details["sales_order_id"] = $order->id;
            $detail = SalesOrderDetail::create($order_details);
            $i++;
            $j = 0;
            foreach ($order_details["fcl"] ?? array() as $row) {
                $sub_det = array();
                $sub_det["sales_order_detail_id"] = $detail->id;
                $sub_det["fcl"] = $order_details["fcl"][$j] ?? NULL;
                $sub_det["po_lds"] = $order_details["po_lds"][$j] ?? NULL;
                $sub_det["ex_factory_date"] = $order_details["ex_factory_date"][$j] ?? NULL;
                $sub_det["actual_ex_factory_date"] = $order_details["actual_ex_factory_date"][$j] ?? NULL;
                $sub_det["lc_expire_date"] = $order_details["lc_expire_date"][$j] ?? NULL;
                $sub_det["office_remark"] = $order_details["office_remark"][$j] ?? NULL;
                $sub_det["factory_remark"] = $order_details["factory_remark"][$j] ?? NULL;
                $sub_det["lc_no"] = $order_details["lc_no"][$j] ?? NULL;
                $sub_det["lds_date"] = $order_details["lds_date"][$j] ?? NULL;
                $sub_det["line"] = $order_details["line"][$j] ?? NULL;
                $sub_det["etd"] = $order_details["etd"][$j] ?? NULL;
                $sub_det["eta"] = $order_details["eta"][$j] ?? NULL;

                SalesOrderSubDetail::create($sub_det);
                $j++;
            }

            foreach ($order_details["yarn_certification_type_id"] ?? array() as $row) {
                $sub_det = array();
                $sub_det["sales_order_detail_id"] = $detail->id;
                $sub_det["yarn_certification_type_id"] = $row;
                SalesOrderYarnCertification::create($sub_det);
            }
        }


        return redirect('sales_order')->with('message', "Sale added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->integer("id", false);
        $get_details = $request->get("get_details", false);
        if(!empty($get_details)){
            if(!empty($id)){

                $item = SalesOrderDetail::where('id', $id)->with('sales_order','yarn_certification_types','sales_order_sub_details','quality','finished_quality','inspection_type','paper_tube_size','selvedge','weave_type','unit')->first();
            }
            else{
                $item = SalesOrderDetail::with('sales_order','yarn_certification_types','sales_order_sub_details','quality','finished_quality','inspection_type','paper_tube_size','selvedge','weave_type','unit')->get();
            }
        }
        else{
            if(!empty($id)){
                $item = SalesOrder::where('id', $id)->with('sales_order_details','buyer','city','agent','terms_conditions','payment_terms','shipping_terms','so_type','bank','sourcing_executive','user','ship_to','contract_type')->first();
            }
            else{
                $item = SalesOrder::with('sales_order_details','buyer','city','agent','terms_conditions','payment_terms','shipping_terms','so_type','bank','sourcing_executive','user','ship_to','contract_type')->get();
            }
        }
        return response()->json(['status' => true, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice_types = InvoiceType::where("status", 1)->get();
        $contract_types = ContractType::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        $buyers = Buyers::all();
        $sourcing_executives = SourcingExecutive::where("status", 1)->get();
        $countries = Countries::where("status", 1)->get();
        $agents = Agent::where("status", 1)->get();
        $shipping_terms = ShippingTerm::where("status", 1)->get();
        $banks = Bank::where("status", 1)->get();
        $container_sizes = ContainerSize::where("status", 1)->get();
        $payment_terms = PaymentTerms::where("status", 1)->get();
        $terms_conditions = TermsCondition::where("status", 1)->get();
        $users = User::all();
        $sales_co_ordinators = SalesCoOrdinator::where("status", 1)->get();
        $so_types = SoType::where("status", 1)->get();
        $sorts = Sort::where("status", 1)->get();
        $weave_types = Weave::where("status", 1)->get();
        $selvedges = Selvedge::where("status", 1)->get();
        $ship_to = ShipTo::where("status", 1)->get();
        $units = Unit::where("status", 1)->get();
        $inspection_types = InspectionType::where("status", 1)->get();
        $paper_tube_sizes = PaperTubeSize::where("status", 1)->get();
        $vendors = Vendors::where("status", 1)->get();
        $yarn_certification_types = YarnCertificationType::where("status", 1)->get();
        $port_of_loadings = Port::where("status", 1)->get();
        $port_of_destinations = PortOfDestination::where("status", 1)->get();
        $item = SalesOrder::findOrFail($id);
        return view('sales_order.add', compact('item', 'ship_to','invoice_types','vendors','port_of_destinations','port_of_loadings', 'contract_types', 'cities', 'buyers', 'sourcing_executives', 'countries', 'agents', 'shipping_terms', 'banks', 'container_sizes', 'payment_terms', 'terms_conditions', 'users', 'sales_co_ordinators', 'so_types', 'sorts', 'weave_types', 'sorts', 'selvedges', 'units', 'inspection_types', 'paper_tube_sizes', 'yarn_certification_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $order = SalesOrder::findOrFail($id);
        $order->update($data);
        $i = 0;
        foreach ($data["order_details"]  ?? array()as $key => $order_details) {
            if (!empty($order_details["sales_order_detail_id"][$i]) && $order_details["sales_order_detail_id"][$i] > 0){
                $detail = SalesOrderDetail::findOrFail($order_details["sales_order_detail_id"][$i]);
                $detail->update($order_details);
            }else{
                $order_details["sales_order_id"] = $order->id;
                $detail = SalesOrderDetail::create($order_details);
            }
            $i++;
            $j = 0;
            foreach ($order_details["fcl"] ?? array() as $row) {
                $sub_det = array();
                $sub_det["fcl"] = $order_details["fcl"][$j] ?? NULL;
                $sub_det["po_lds"] = $order_details["po_lds"][$j] ?? NULL;
                $sub_det["ex_factory_date"] = $order_details["ex_factory_date"][$j] ?? NULL;
                $sub_det["actual_ex_factory_date"] = $order_details["actual_ex_factory_date"][$j] ?? NULL;
                $sub_det["lc_expire_date"] = $order_details["lc_expire_date"][$j] ?? NULL;
                $sub_det["office_remark"] = $order_details["office_remark"][$j] ?? NULL;
                $sub_det["factory_remark"] = $order_details["factory_remark"][$j] ?? NULL;
                $sub_det["lc_no"] = $order_details["lc_no"][$j] ?? NULL;
                $sub_det["lds_date"] = $order_details["lds_date"][$j] ?? NULL;
                $sub_det["line"] = $order_details["line"][$j] ?? NULL;
                $sub_det["etd"] = $order_details["etd"][$j] ?? NULL;
                $sub_det["eta"] = $order_details["eta"][$j] ?? NULL;

                if (!empty($order_details["sales_order_sub_detail_id"][$j]) && $order_details["sales_order_sub_detail_id"][$j] > 0){
                    SalesOrderSubDetail::findOrFail($order_details["sales_order_sub_detail_id"][$j])->update($sub_det);
                }else{
                    $sub_det["sales_order_detail_id"] = $detail->id;
                    SalesOrderSubDetail::create($sub_det);
                }
                $j++;
            }

            $detail->yarn_certification_types()->delete();
            foreach ($order_details["yarn_certification_type_id"] ?? array() as $row) {
                $sub_det = array();
                $sub_det["sales_order_detail_id"] = $detail->id;
                $sub_det["yarn_certification_type_id"] = $row;
                SalesOrderYarnCertification::create($sub_det);
            }
        }
        return redirect('sales_order')->with('message', "Sale updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SalesOrder::findOrFail($id)->delete();
        return redirect('sales_order')->with('success', 'Sale deleted successfully');
    }
    /**
     * Select the specified resource from storage.
     */
    public function get_sales_orders()
    {
        $data = SalesOrder::with('buyer', 'sales_order_details', 'city', 'order_route', 'agent', 'terms_conditions', 'payment_terms', 'shipping_terms', 'so_type', 'bank', 'sourcing_executive', 'user', 'ship_to', 'contract_type', 'invoice_type')->orderBy('id', 'desc')->get();
        return response()->json(['status' => true, 'data' => $data]);
    }
    public function get_sales_orders_details()
    {
        $data = SalesOrderDetail::with('sales_order', 'finished_quality','yarn_certification_types', 'sales_order_sub_details', 'quality', 'inspection_type', 'paper_tube_size', 'selvedge', 'weave_type', 'unit' )->orderBy('id', 'desc')->get();
        return response()->json(['status' => true, 'item' => $data]);
    }
}
