<?php

namespace App\Http\Controllers;

use App\Models\BeamInward;
use App\Models\BeamInwardDetail;
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
use App\Models\Sort;
use App\Models\Transportations;
use App\Models\Vendors;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeamInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SizingPlan::with('beam_details','beam_inward','yarn_details','sizing_name','yarn','actual_count','sizing_yarn_issue')
            ->orderBy('id', 'desc')->get();;
        return view('planning.beam_inward.index', compact('list'));
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
        $job_work_weaving_contracts = JobworkWeavingContract::all();
        $item  = SizingPlan::findOrFail($id);
        return view('planning.beam_inward.add', compact('item', 'job_work_weaving_contracts'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item  = SizingPlan::findOrFail($id);
        if(empty($item->beam_inward)){
            $data['sizing_plan_id'] = $id;
            $created = BeamInward::create($data);
            $beam = $created;
        }else{
            $beam = $item->beam_inward;
            $beam->update($data);
        }
        if(!empty($beam)) {
            $beam->details()->delete();
            foreach ($data['details'] ?? array() as $row) {
                $row['beam_inward_id'] = $beam->id;
                BeamInwardDetail::create($row);
            }
        }
        return redirect('beam_inward')->with('message', "Beam Inward successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobworkWeavingContract $jobworkWeavingContract)
    {
        //
    }
}
