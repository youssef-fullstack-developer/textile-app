<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Check;
use App\Models\City;
use App\Models\JobworkFabricReceive;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkWeavingContract;
use App\Models\Location;
use App\Models\Sort;
use App\Models\Vendors;
use App\Models\Yarn;
use Illuminate\Http\Request;
use Tests\Localization\DaDkTest;

class JobworkFabricReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = JobworkFabricReceive::with('details','jobwork','vendor','location','chk_name')
            ->orderBy('id', 'desc')->get();
        return view('warehouse.jobwork_fabric_receive.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $jobworks = JobworkWeavingContract::all();
        $locations = Location::where("status", 1)->get();
        $chks = Bank::where("status", 1)->get();
        $sorts = Sort::all();
        return view('warehouse.jobwork_fabric_receive.add', compact('vendors','jobworks','locations','chks','sorts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = JobworkFabricReceive::create($data);
            foreach ($data['details'] ?? array() as $row){
                $row['jobwork_fabric_receive_id'] = $item->id;
                JobworkFabricReceiveDetail::create($row);
            }
        return redirect('jobwork_fabric_receive')->with('message', "Successfully...");

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $get_details = $request->get("get_details", false);
        if($get_details){
            if(!$id){
                $item = JobworkFabricReceiveDetail::with('jobwork_fabric_receive', 'quality', 'inspection')->orderBy('id', 'desc')->get();
            }
            else{
                $item = JobworkFabricReceiveDetail::where('id', $id)->with('jobwork_fabric_receive', 'quality', 'inspection')->first();
            }
        }
        else {
            $item = JobworkFabricReceive::where('id', $id)->with('details', 'jobwork', 'vendor', 'location', 'chk_name')->first();
        }
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
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $jobworks = JobworkWeavingContract::all();
        $locations = Location::where("status", 1)->get();
        $chks = Bank::where("status", 1)->get();
        $sorts = Sort::all();
        $item = JobworkFabricReceive::findOrFail($id);
        return view('warehouse.jobwork_fabric_receive.add', compact('item','vendors','jobworks','locations','chks','sorts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkFabricReceive::findOrFail($id);
        $item->update($data);
        $item->details()->delete();
        foreach ($data['details'] ?? array() as $row){
            $row['jobwork_fabric_receive_id'] = $item->id;
            $row['is_cutpiece'] = $row['is_cutpiece'] ?? 0;
            JobworkFabricReceiveDetail::create($row);
        }
        return redirect('jobwork_fabric_receive')->with('message', "Successfully...");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobworkFabricReceive $jobworkFabricReceive)
    {
        //
    }


    public function jobwork_fabric_receive_details(Request $request)
    {
        $status = true;
        $id = $request->get('id');
        $item = JobworkFabricReceiveDetail::where('id', $id)->with('jobwork_fabric_receive','quality', 'inspection')->first();
        if(!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

}
