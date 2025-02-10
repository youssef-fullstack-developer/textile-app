<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\Employe;
use App\Models\FabricInwardDetail;
use App\Models\Grade;
use App\Models\Inspection;
use App\Models\InspectionDetail;
use App\Models\InspectionDetailVariation;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkFinishedFabricReceiveDetail;
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
//        $list = JobworkFabricReceiveDetail::with('jobwork_fabric_receive','quality','inspection')
//            ->orderBy('id', 'desc')->get();
//        return view('others.inspection_list.index', compact('list'));
//        $this->inspection_list_get();
        return redirect()->route('inspection_list_get');
    }

    public function inspection_list_get($type = Null)
    {
        $allowedValues = [NULL, '1', '0'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = JobworkFabricReceiveDetail::with('jobwork_fabric_receive', 'quality', 'inspection')
            ->when(is_null($type), function ($query) {
                // Get records where the related 'inspection' relation does not exist
                return $query->whereDoesntHave('inspection');
            })
            ->when($type == 1, function ($query) {
                // Get records where the related 'inspection' relation exists
                return $query->whereHas('inspection');
            })
            ->orderBy('id', 'desc')
            ->get();

        $list2 = JobworkFinishedFabricReceiveDetail::with('jobwork_finished_fabric_receive', 'quality', 'inspection')
            ->when(is_null($type), function ($query) {
                // Get records where the related 'inspection' relation does not exist
                return $query->whereDoesntHave('inspection');
            })
            ->when($type == 1, function ($query) {
                // Get records where the related 'inspection' relation exists
                return $query->whereHas('inspection');
            })
            ->orderBy('id', 'desc')
            ->get();

        $list3 = FabricInwardDetail::with('fabric_inward', 'quality', 'inspection', 'grade')
            ->when(is_null($type), function ($query) {
                // Get records where the related 'inspection' relation does not exist
                return $query->whereDoesntHave('inspection');
            })
            ->when($type == 1, function ($query) {
                // Get records where the related 'inspection' relation exists
                return $query->whereHas('inspection');
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('others.inspection_list.index', compact('type', 'list', 'list2', 'list3'));
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
        $type = '';
        if (str_contains($id, 'finished_')) {
            $id = str_replace('finished_', '', $id);
            $type = 'finished';
            $jobwork = JobworkFinishedFabricReceiveDetail::findOrFail($id);
        }
        else if (str_contains($id, 'fabric_')) {
            $id = str_replace('fabric_', '', $id);
            $type = 'fabric';
            $jobwork = FabricInwardDetail::findOrFail($id);
        } else {
            $jobwork = JobworkFabricReceiveDetail::findOrFail($id);
        }
        $item = array();
        if (!empty($jobwork->inspection)) {
            $item = Inspection::findOrFail($jobwork->inspection?->id);
        }
        $sorts = Sort::all();
        $shifts = array();
        $packings = PackingType::where("status", 1)->get();
        $checkers = Employe::all();
        $vendor_groups = VendorGroups::with('yarn_pos', 'get_group_type')->where("status", 1)->get();
        $grades = Grade::where("status", 1)->get();
        $reasons = array();
        $colors = Color::where("status", 1)->get();
        $weavers = Weave::where("status", 1)->get();
        return view('others.inspection_list.add', compact('item', 'type', 'jobwork', 'sorts', 'shifts', 'packings', 'checkers', 'vendor_groups', 'grades', 'reasons', 'colors', 'weavers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($data['type']== 'finished') {
            $job = JobworkFinishedFabricReceiveDetail::findOrFail($id);
        }
        else if ($data['type']== 'fabric') {
            $job = FabricInwardDetail::findOrFail($id);
        } else {
            $job = JobworkFabricReceiveDetail::findOrFail($id);
        }
        if (!empty($job->inspection)) {
            $item = Inspection::findOrFail($job->inspection?->id);
            $item->update($data);
        } else {
            if ($data['type']== 'finished') {
                $data['jobwork_finished_fabric_receive_detail_id'] = $id;
            }
            else if ($data['type']== 'fabric') {
                $data['fabric_inward_detail_id'] = $id;
            } else {
                $data['jobwork_fabric_receive_detail_id'] = $id;
            }
            $item = Inspection::create($data);
        }
        foreach ($data['details'] ?? array() as $i => $detail) {
            if (!empty($detail['id']) && $detail['id'] > 0) {
                $det = InspectionDetail::findOrFail($detail['id']);
                $detail['is_sample'] = $detail['is_sample'] ?? 0;
                $det->update($detail);
            } else {
                $detail['inspection_id'] = $item->id;
                $det = InspectionDetail::create($detail);
            }
            $det->variations()->delete();
            foreach ($detail['variations'] ?? array() as $index => $row) {
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
