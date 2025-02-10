<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Buyers;
use App\Models\City;
use App\Models\Color;
use App\Models\Employe;
use App\Models\GST;
use App\Models\InspectionType;
use App\Models\JobworkProcessContract;
use App\Models\JobworkProcessContractDetail;
use App\Models\PaymentTerms;
use App\Models\Process;
use App\Models\ProcessReturn;
use App\Models\SalesOrder;
use App\Models\Sort;
use App\Models\TermsCondition;
use App\Models\Transportations;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class JobworkProcessContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $list = JobworkProcessContract::with('details','jobwork_process_contract_issue','process','group','vendor','agent','contact_person_1','contact_person_2','inspection_type','delivery_location','terms_condition')
//            ->orderBy('id', 'desc')->get();
//        return view('planning.jobwork_process_contract.index', compact('list'));
        return redirect()->route('jobwork_process_contract_list');
    }


    public function jobwork_process_contract_list($type = Null)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = JobworkProcessContract::with('details','jobwork_process_contract_issue','process','group','vendor','agent','contact_person_1','contact_person_2','inspection_type','delivery_location','terms_condition')
            ->where('approval', $type)
            ->orderBy('id', 'desc')
            ->get();
        return view('planning.jobwork_process_contract.index', compact('type', 'list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $processes = Process::all();
        $vendor_groups = VendorGroups::with('yarn_pos','get_group_type')->where("status", 1)->get();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $agents = Agent::where("status", 1)->get();
        $contacts = Employe::all();
        $inspection_types = InspectionType::where("status", 1)->get();
        $payment_terms = PaymentTerms::with('payment_type')->where("status", 1)->get();
        $transports = Transportations::all();
        $buyers = Buyers::all();
        $sorts = Sort::all();
        $terms_conditions = TermsCondition::all();
        $gsts = GST::select("igst as val")->get();
        return view('planning.jobwork_process_contract.add', compact('processes','vendor_groups','vendors','agents','contacts','inspection_types','payment_terms','transports','buyers','sorts','terms_conditions','gsts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = JobworkProcessContract::create($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            $detail['jobwork_process_contract_id'] = $item->id;
            JobworkProcessContractDetail::create($detail);
        }
        return redirect('jobwork_process_contract')->with('message', "Successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = JobworkProcessContract::where('id', $id)->with('details', 'jobwork_process_contract_issue', 'process', 'group', 'vendor', 'agent', 'contact_person_1', 'contact_person_2', 'inspection_type', 'delivery_location', 'terms_condition')->first();
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
        $processes = Process::all();
        $vendor_groups = VendorGroups::with('yarn_pos','get_group_type')->where("status", 1)->get();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $agents = Agent::where("status", 1)->get();
        $contacts = Employe::all();
        $inspection_types = InspectionType::where("status", 1)->get();
        $payment_terms = PaymentTerms::with('payment_type')->where("status", 1)->get();
        $transports = Transportations::all();
        $buyers = Buyers::all();
        $sorts = Sort::all();
        $terms_conditions = TermsCondition::all();
        $gsts = GST::select("igst as val")->get();
        $item = JobworkProcessContract::findOrFail($id);
        return view('planning.jobwork_process_contract.add', compact('item','processes','vendor_groups','vendors','agents','contacts','inspection_types','payment_terms','transports','buyers','sorts','terms_conditions','item','gsts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkProcessContract::findOrFail($id);
        $item->update($data);
        $item->details()?->delete();
        foreach ($data['details'] ?? array()  as $i => $detail){
//            if(!empty($detail['id']) && $detail['id'] > 0)
//            {
//                $det = JobworkProcessContractDetail::findOrFail($detail['id']);
//                $det->update($detail);
//            }
//            else{
                $detail['jobwork_process_contract_id'] = $item->id;
                JobworkProcessContractDetail::create($detail);
//            }
        }
        return redirect('jobwork_process_contract')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
