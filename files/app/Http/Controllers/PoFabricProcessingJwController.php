<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Certification;
use App\Models\City;
use App\Models\Color;
use App\Models\Consignee;
use App\Models\DeliveryTerms;
use App\Models\GST;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkProcessContract;
use App\Models\PaymentTerms;
use App\Models\PoFabricProcessingJw;
use App\Models\PoType;
use App\Models\PurchaseType;
use App\Models\SalesOrder;
use App\Models\TermsCondition;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use App\Models\YarnPoDetail;
use App\Models\YarnType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PoFabricProcessingJwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = NULL)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = JobworkProcessContract::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        return view('approvals.po_fabric_processing_jw.index', compact('type', 'list'));
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

        if($type == '1'){
            $list = JobworkProcessContract::where('approval', $type)->with('details')->orderBy('approval_date', 'desc')->get();
        }else{
            $list = JobworkProcessContract::where('approval', $type)->with('details')->orderBy('id', 'desc')->get();
        }
//          $list = JobworkProcessContract::where('approval', $type)->with('details')->get();
        return view('approvals.po_fabric_processing_jw.index', compact('type', 'list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(YarnPO $purchaseYarnPO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $item = JobworkProcessContract::findOrFail($id);

        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');

        return view('approvals.po_fabric_processing_jw.add', compact('currentDateTime', 'item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkProcessContract::findOrFail($id);
        $item->update($data);

//        $id = $request->integer('id');
//        $item = YarnPO::findOrFail($id);
//        $internal_remark = $request->get('internal_remark');
//        $customer_instruction = $request->get('customer_instruction');
//        $comments = $request->get('comments');
//        $approval = $request->get('approval');
//        $approval_date = $request->get('approval_date');
//        $item->internal_remark = $internal_remark;
//        $item->customer_instruction = $customer_instruction;
//        $item->comments = $comments;
//        $item->approval = $approval;
//        $item->approval_date = $approval_date;
//        $item->save();
        return redirect('po_fabric_processing_jw')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }


}
