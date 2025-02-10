<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Certification;
use App\Models\Consignee;
use App\Models\CountCv;
use App\Models\csp;
use App\Models\DeliveryTerms;
use App\Models\FabricPoDetailYarnCertification;
use App\Models\FabricType;
use App\Models\GST;
use App\Models\Hairiness;
use App\Models\Mill;
use App\Models\PaymentTerms;
use App\Models\PoType;
use App\Models\PurchaseType;
use App\Models\SalesOrder;
use App\Models\SalesOrderYarnCertification;
use App\Models\Sort;
use App\Models\TermsCondition;
use App\Models\Unit;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\FabricPO;
use App\Models\FabricPoDetail;
use App\Models\YarnCertificationType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FabricPOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('fabric_po_list');
    }

    /**
     * Display a listing of the resource.
     */
    public function list($type = null)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = FabricPO::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        return view('purchase.fabric_po.index', compact('type', 'list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::where('status', 1)->get();
        $vendor_groups = VendorGroups::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $sale_orders = SalesOrder::all();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $terms_consitions = TermsCondition::where('status', 1)->get();
        $consignees = Consignee::where("active", 1)->get();
        $fabric_types = FabricType::where('status', 1)->get();
        $purchase_types = PurchaseType::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $qualities = Sort::get();
        $units = Unit::where("status", 1)->get();
        $delivery_terms = DeliveryTerms::where("status", 1)->get();
        $yarn_certification_types = YarnCertificationType::where("status", 1)->get();
        return view('purchase.fabric_po.add', compact('yarn_certification_types','delivery_terms','qualities','units','vendor_groups',  'vendors', 'agents', 'fabric_types', 'sale_orders', 'payment_terms', 'vendors', 'terms_consitions', 'consignees', 'purchase_types', 'vendors', 'igst', 'cgst', 'sgst'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_gst_applicable'] = $request->is_gst_applicable == "1" ? 1 : 0;
        $item = FabricPO::create($data);

        $item->po_number = 'FPO-' . $item->id;
        $item->save();
        foreach ($data["order_details"] ?? array() as $row) {

            $row["fabric_po_id"] = $item->id;
            $detail = FabricPoDetail::create($row);


            foreach ($row["yarn_certification_type_id"] ?? array() as $line) {
                $sub_det = array();
                $sub_det["fabric_po_detail_id"] = $detail->id;
                $sub_det["yarn_certification_type_id"] = $line;
                FabricPoDetailYarnCertification::create($sub_det);
            }
        }
        return redirect()->route('fabric_po_list')->with('message', "Added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $get_details = $request->get("get_details", false);
        $vendor_group_id = $request->get("vendor_group_id", false);
        if($get_details && !empty($get_details)) {
            $item = FabricPoDetail::where('id', $id)->with('fabric_po', 'count', 'mill_name')->first();
        }else {
            $item = FabricPO::where('id', $id)->with('details', 'vendor_group', 'agent', 'fabric_type', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee', 'purchase_type')->first();
        }
        if($vendor_group_id){
            $item = FabricPO::where('vendor_group_id', $vendor_group_id)->with('details', 'vendor_group', 'agent', 'fabric_type', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee', 'purchase_type')->get();
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
        $item = FabricPO::findOrFail($id);
        $vendors = Vendors::where('status', 1)->get();
        $vendor_groups = VendorGroups::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $sale_orders = SalesOrder::all();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $terms_consitions = TermsCondition::where('status', 1)->get();
        $consignees = Consignee::where("active", 1)->get();
        $fabric_types = FabricType::where('status', 1)->get();
        $purchase_types = PurchaseType::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $qualities = Sort::get();
        $units = Unit::where('status', 1)->get();
        $delivery_terms = DeliveryTerms::where("status", 1)->get();
        $yarn_certification_types = YarnCertificationType::where("status", 1)->get();
        return view('purchase.fabric_po.add', compact('yarn_certification_types','delivery_terms','qualities','item','units','vendor_groups',  'vendors', 'agents', 'fabric_types', 'sale_orders', 'payment_terms', 'vendors', 'terms_consitions', 'consignees', 'purchase_types', 'vendors', 'igst', 'cgst', 'sgst'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = FabricPO::findOrFail($id);
        $data['is_gst_applicable'] = $request->is_gst_applicable == "1" ? 1 : 0;
        $item->update($data);

        foreach ($data["order_details"] ?? array() as $row) {
            if (!empty($row["fabric_po_detail_id"]) && intval($row["fabric_po_detail_id"]) > 0) {
                $detail = FabricPoDetail::findOrFail(intval($row["fabric_po_detail_id"]));
                $detail->update($row);
            } else {
                $row["fabric_po_id"] = $id;
                $detail = FabricPoDetail::create($row);
            }
            $detail->yarn_certification_types()->delete();
            foreach ($row["yarn_certification_type_id"] ?? array() as $line) {
                $sub_det = array();
                $sub_det["fabric_po_detail_id"] = $detail->id;
                $sub_det["yarn_certification_type_id"] = $line;
                FabricPoDetailYarnCertification::create($sub_det);
            }


        }


        return redirect()->route('fabric_po_list')->with('message', "Updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FabricPO::findOrFail($id)->delete();
        return redirect()->route('fabric_po_list')->with('success', 'Deleted successfully');
    }



//  Approval Po Yarn Functions

    /**
     * Display a listing of the resource.
     */
    public function approval_list($type = null)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }

        $list = FabricPO::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        return view('approvals.po_fabric_purchase.index', compact('type', 'list'));
    }


    /**
     * Display an item of the resource.
     */
    public function approval_get($id = null)
    {
        $item = FabricPO::findOrFail($id);

        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');

        return view('approvals.po_fabric_purchase.add', compact('item', 'currentDateTime'));
    }


    public function approval_create(Request $request)
    {
        $id = $request->integer('id');
        $item = FabricPO::findOrFail($id);

        $internal_remark = $request->get('internal_remark');
        $customer_instruction = $request->get('customer_instruction');
        $comments = $request->get('comments');
        $approval = $request->get('approval');
        $approval_date = $request->get('approval_date');
        $item->internal_remark = $internal_remark;
        $item->customer_instruction = $customer_instruction;
        $item->comments = $comments;
        $item->approval = $approval;
        $item->approval_date = $approval_date;
        $item->save();
        return redirect('approval/approval_po_fabric_purchase');
    }


}
