<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkFinishedFabricReceive;
use App\Models\JobworkFinishedFabricReceiveDetail;
use App\Models\JobworkProcessContract;
use App\Models\JobworkProcessContractIssue;
use App\Models\SalesOrder;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class JobWorkFinishedFabricReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = JobworkFinishedFabricReceive::all();
        return view('planning.jobwork_finished_fabric_receive.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::all();
        $jobwork_contracts = JobworkProcessContract::all();
        $cheks = array();
        $yarns = Yarn::all();
        return view('planning.jobwork_finished_fabric_receive.add', compact('vendors', 'jobwork_contracts', 'vendors', 'cheks', 'yarns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = JobworkFinishedFabricReceive::create($data);
        foreach ($data['details'] ?? array() as $i => $detail) {
            $detail['jobwork_finished_fabric_receive_id'] = $item->id;
            $det = JobworkFinishedFabricReceiveDetail::create($detail);
        }
        return redirect('jobwork_finished_fabric_receive')->with('message', "Successfully...");
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
        $vendors = Vendors::all();
        $jobwork_contracts = JobworkProcessContract::all();
        $cheks = array();
        $yarns = Yarn::all();
        $lot_numbers = JobworkProcessContractIssue::select("internal_lot_no as val")->groupBy("internal_lot_no")->get();
        $item = JobworkFinishedFabricReceive::findOrFail($id);
        return view('planning.jobwork_finished_fabric_receive.add', compact('item', 'vendors', 'lot_numbers', 'jobwork_contracts', 'vendors', 'cheks', 'yarns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkFinishedFabricReceive::findOrFail($id);
        $data['is_last_piece'] = $data['is_last_piece'] ?? 0;
        $item->update($data);
        foreach ($data['details'] ?? array() as $i => $detail) {
            if (!empty($detail['id']) && $detail['id'] > 0) {
                $detail['is_cutpiece'] = $detail['is_cutpiece'] ?? 0;
                $det = JobworkFinishedFabricReceiveDetail::findOrFail($detail['id']);
                $det->update($detail);
            } else {
                $detail['jobwork_finished_fabric_receive_id'] = $item->id;
                $det = JobworkFinishedFabricReceiveDetail::create($detail);
            }
        }
        return redirect('jobwork_finished_fabric_receive')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
