<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkProcessContract;
use App\Models\JobworkProcessContractIssue;
use App\Models\JobworkProcessContractIssueDetail;
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

class JobworkProcessContractIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $list = JobworkProcessContractIssue::with('details','jobwork_process_contract','transporter')
//            ->orderBy('id', 'desc')->get();
//        return view('planning.jobwork_process_contract_issue.index', compact('list'));
        return redirect()->route('jobwork_process_contract_issue_list');
    }

    public function jobwork_process_contract_issue_list($type = Null)
    {
        $allowedValues = ['1', '0'];
        if (!in_array($type, $allowedValues, true)) {
            $type = '0';
        }
        $list = JobworkProcessContractIssue::with('details','jobwork_process_contract','transporter')
            ->where('complete', $type)
            ->orderBy('id', 'desc')
            ->get();
        return view('planning.jobwork_process_contract_issue.index', compact('type', 'list'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobwork_process_contracts = JobworkProcessContract::all();
        $transporters = Transportations::all();
        return view('planning.jobwork_process_contract_issue.add', compact('jobwork_process_contracts','transporters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = JobworkProcessContractIssue::create($data);
        foreach ($data['detail'] ?? array()  as $i => $detail){
            $detail['jobwork_process_contract_issue_id'] = $item->id;
            $det = JobworkProcessContractIssueDetail::create($detail);
        }
        return redirect('jobwork_process_contract_issue')->with('message', "Successfully...");
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
        $jobwork_process_contracts = JobworkProcessContract::all();
        $transporters = Transportations::all();
        $item = JobworkProcessContractIssue::findOrFail($id);
        return view('planning.jobwork_process_contract_issue.add', compact('item','jobwork_process_contracts','transporters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkProcessContractIssue::findOrFail($id);
        $data['is_opening_contract'] = $data['is_opening_contract'] ?? 0;
        $item->update($data);
        foreach ($data['detail'] ?? array()  as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = JobworkProcessContractIssueDetail::findOrFail($detail['id']);
                $det->update($detail);
            }
            else{
                $detail['jobwork_process_contract_issue_id'] = $item->id;
                $det = JobworkProcessContractIssueDetail::create($detail);
            }
        }
        return redirect('jobwork_process_contract_issue')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
