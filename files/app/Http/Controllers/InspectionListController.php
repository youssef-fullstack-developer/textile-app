<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\Employe;
use App\Models\Grade;
use App\Models\Inspection;
use App\Models\InspectionDetail;
use App\Models\InspectionDetailVariation;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\Packing;
use App\Models\PackingType;
use App\Models\SalesOrder;
use App\Models\Sort;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Weave;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class InspectionListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = JobworkFabricReceiveDetail::all();
        return view('others.inspection_list.index', compact('list'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jobwork = JobworkFabricReceiveDetail::findOrFail($id);
        $item = array();
        if(!empty($jobwork->inspection)){
            $item = Inspection::findOrFail($jobwork->inspection->id);
        }
        $sorts = Sort::all();
        $shifts = array();
        $packings = PackingType::all();
        $checkers = Employe::all();
        $vendor_groups = VendorGroups::all();
        $grades = Grade::all();
        $reasons = array();
        $colors = Color::all();
        $weavers = Weave::all();
        return view('others.inspection_list.add', compact('item','jobwork','sorts','shifts','packings','checkers','vendor_groups','grades','reasons','colors','weavers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $job = JobworkFabricReceiveDetail::findOrFail($id);
        if(!empty($job->inspection)){
            $item = Inspection::findOrFail($job->inspection->id);
            $item->update($data);
        }
        else{
            $item = Inspection::create($data);
        }
        foreach ($data['details'] ?? array() as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = InspectionDetail::findOrFail($detail['id']);
                $detail['is_sample'] = $detail['is_sample'] ?? 0;
                $det->update($detail);
            }
            else{
                $detail['inspection_id'] = $item->id;
                $det = InspectionDetail::create($detail);
            }
            $det->variations()->delete();
            foreach ($detail['variations'] ?? array() as $index => $row){
                $row['inpection_detail_id'] = $det->id;
                InspectionDetailVariation::create($row);
            }
        }
        return redirect('inspection_list')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
