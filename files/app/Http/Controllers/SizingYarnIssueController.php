<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Employe;
use App\Models\InspectionType;
use App\Models\JobworkWeavingContract;
use App\Models\JobworkWeavingContractOrders;
use App\Models\PackingType;
use App\Models\PaymentTerms;
use App\Models\Selvedge;
use App\Models\SizingPlan;
use App\Models\SizingYarnIssue;
use App\Models\SizingYarnIssueDetail;
use App\Models\Sort;
use App\Models\Transportations;
use App\Models\Vendors;
use App\Models\Yarn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizingYarnIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SizingPlan::with('beam_details','beam_inward','yarn_details','sizing_name','yarn','actual_count','sizing_yarn_issue')
            ->orderBy('id', 'desc')->get();
        return view('planning.sizing_yarn_issue.index', compact('list'));
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
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transports = Transportations::all();
        $plan  = SizingPlan::findOrFail($id);
        $yarns  = Yarn::all();
        return view('planning.sizing_yarn_issue.add', compact('plan', 'transports', 'yarns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plan  = SizingPlan::findOrFail($id);
        $data = $request->all();
        if(empty($plan->sizing_yarn_issue)){
            $data['sizing_plan_id'] = $id;
            $item = SizingYarnIssue::create($data);
        }else{
            $item = $plan->sizing_yarn_issue;
            $item->update($data);
        }
        if(!empty($item)) {
            $item->details()->delete();
            foreach ($data['details'] ?? array() as $row) {
                $row['sizing_yarn_issue_id'] = $item->id;
                SizingYarnIssueDetail::create($row);
            }
        }
        return redirect('sizing_yarn_issue')->with('message', "Jobwork Weaving Contract added successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
