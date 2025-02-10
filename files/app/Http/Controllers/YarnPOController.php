<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Certification;
use App\Models\Consignee;
use App\Models\CountCv;
use App\Models\csp;
use App\Models\DeliveryTerms;
use App\Models\GST;
use App\Models\Hairiness;
use App\Models\Mill;
use App\Models\PaymentTerms;
use App\Models\PoType;
use App\Models\PurchaseType;
use App\Models\SalesOrder;
use App\Models\StrengthCv;
use App\Models\TermsCondition;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnPO;
use App\Models\YarnPoDetail;
use App\Models\YarnType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class YarnPOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('yarn_po_list');
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
        $list = YarnPO::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        return view('purchase.yarn_po.index', compact('type', 'list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::where('status', 1)->get();
        $mill_names = Mill::where('status', 1)->orderBy('id', 'desc')->get();
        $vendor_groups = VendorGroups::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $certification_types = Certification::where('status', 1)->get();
        $po_types = PoType::where('status', 1)->get();
        $sale_orders = SalesOrder::all();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $terms_consitions = TermsCondition::where('status', 1)->get();
        $consignees = Consignee::where("active", 1)->get();
        $yarn_types = YarnType::where('status', 1)->get();
        $delivery_terms = DeliveryTerms::where('status', 1)->get();
        $purchase_types = PurchaseType::where('status', 1)->get();
        $counts = Yarn::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $csp = Csp::where('status', 1)->get();
        $hairiness = Hairiness::where('status', 1)->get();
        $count_cvs = CountCv::where('status', 1)->get();
        $strenght_cvs = StrengthCv::where('status', 1)->get();
        return view('purchase.yarn_po.add', compact('mill_names','csp', 'hairiness', 'count_cvs','vendor_groups', 'strenght_cvs', 'vendors', 'agents', 'certification_types', 'po_types', 'sale_orders', 'payment_terms', 'vendors', 'terms_consitions', 'consignees', 'yarn_types', 'delivery_terms', 'purchase_types', 'counts', 'vendors', 'igst', 'cgst', 'sgst'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = YarnPO::create($data);
        $item->po_number = 'YPO-' . $item->id;
        $item->save();
        foreach ($data["order_details"] ?? array() as $row) {
            $sub_det = array();
            $row["yarn_po_id"] = $item->id;
            YarnPoDetail::create($row);
        }
        return redirect('yarn_po_list')->with('message', "Yarn-PO added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $get_details = $request->get("get_details", false);
        if($get_details && !empty($get_details)) {
            $item = YarnPoDetail::where('id', $id)->with('yarn_po', 'count', 'mill_name')->first();
        }else {
            $item = YarnPO::where('id', $id)->with('details', 'vendor_group', 'agent', 'certification_type', 'po_type', 'pr_num', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee')->first();
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
        $vendors = Vendors::where('status', 1)->get();
        $mill_names = Mill::where('status', 1)->orderBy('id', 'desc')->get();
        $vendor_groups = VendorGroups::where('status', 1)->get();
        $agents = Agent::where('status', 1)->get();
        $certification_types = Certification::where('status', 1)->get();
        $po_types = PoType::where('status', 1)->get();
        $sale_orders = SalesOrder::all();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $terms_consitions = TermsCondition::where('status', 1)->get();
        $consignees = Consignee::where("active", 1)->get();
        $yarn_types = YarnType::where('status', 1)->get();
        $delivery_terms = DeliveryTerms::where('status', 1)->get();
        $purchase_types = PurchaseType::where('status', 1)->get();
        $counts = Yarn::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $csp = Csp::where('status', 1)->get();
        $hairiness = Hairiness::where('status', 1)->get();
        $count_cvs = CountCv::where('status', 1)->get();
        $strenght_cvs = StrengthCv::where('status', 1)->get();
        $item = YarnPO::findOrFail($id);
        return view('purchase.yarn_po.add', compact('item','mill_names', 'csp','vendor_groups', 'hairiness', 'count_cvs', 'strenght_cvs','vendors', 'agents', 'certification_types', 'po_types', 'sale_orders', 'payment_terms', 'vendors', 'terms_consitions', 'consignees', 'yarn_types', 'delivery_terms', 'purchase_types', 'counts', 'vendors', 'igst', 'cgst', 'sgst'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = YarnPO::findOrFail($id);
        $item->update($data);
        foreach ($data["order_details"] ?? array() as $row) {
            if (!empty($row["yarn_po_detail_id"]) && intval($row["yarn_po_detail_id"]) > 0) {
                $det = YarnPoDetail::findOrFail(intval($row["yarn_po_detail_id"]));
                $det->update($row);
            } else {
                $row["yarn_po_id"] = $id;
                YarnPoDetail::create($row);
            }
        }
        return redirect('yarn_po_list')->with('message', "Yarn-PO updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        YarnPO::findOrFail($id)->delete();
        return redirect('yarn_po_list')->with('success', 'Deleted successfully');
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

        $list = YarnPO::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        $list2 = YarnInward::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        return view('approvals.po_yarn.index', compact('type', 'list', 'list2'));
    }


    /**
     * Display an item of the resource.
     */
    public function approval_get($id = null)
    {
        $item = YarnPO::findOrFail($id);

        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');

        $type = 'po';
        return view('approvals.po_yarn.add', compact('item', 'currentDateTime', 'type'));
    }

    public function approval_inward_get($id = null)
    {
        $item = YarnInward::findOrFail($id);

        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');
        $type = 'inward';
        return view('approvals.po_yarn.add', compact('item', 'currentDateTime', 'type'));
    }


    public function approval_create(Request $request)
    {
        $id = $request->integer('id');
        $item = YarnPO::findOrFail($id);

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
        return redirect('approval/approval_yarn_po');
    }


}
