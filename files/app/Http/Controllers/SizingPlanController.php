<?php

namespace App\Http\Controllers;

use App\Models\Copart;
use App\Models\Employe;
use App\Models\LoomTypes;
use App\Models\Machine;
use App\Models\Mill;
use App\Models\PaymentTerms;
use App\Models\SalesOrder;
use App\Models\SizingPlan;
use App\Models\SizingPlanBeam;
use App\Models\SizingPlanYarn;
use App\Models\Sort;
use App\Models\Vendors;
use App\Models\Weave;
use App\Models\WeaveTypes;
use App\Models\Yarn;
use Illuminate\Http\Request;

class SizingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SizingPlan::with('beam_details','beam_inward','yarn_details','sizing_name','yarn','actual_count','sizing_yarn_issue')
            ->orderBy('id', 'desc')->get();
        return view('planning.sizing_plan.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendors::where('status', 1)->get();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $machines = Machine::where('status', 1)->get();
        $mill_names = Mill::where("status", 1)->orderBy('id', 'desc')->get();
        $employes = Employe::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();
        $coparts = Copart::where('status', 1)->get();
        $weavers = Weave::where('status', 1)->get();
        $orders = SalesOrder::all();
        $loom_models = LoomTypes::where('status', 1)->get();
        $looms = LoomTypes::where('status', 1)->get();
        $loom_types = LoomTypes::where('status', 1)->get();
        $sorts = Sort::where('status', 1)->get();
        $weave_types = Weave::where("status", 1)->get();
        return view('planning.sizing_plan.add', compact('loom_types','mill_names', 'weave_types', 'sorts', 'vendors', 'payment_terms', 'machines', 'employes', 'yarns', 'coparts', 'weavers', 'orders', 'loom_models', 'looms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_sizing_order'] = ($data['is_complete'] ?? 0) == 'ON' ? 1 : 0;
        $data['default_meter_for_beam'] = ($data['is_complete'] ?? 0) == 'ON' ? 1 : 0;
        $data['is_complete'] = ($data['is_complete'] ?? 0) == 'ON' ? 1 : 0;
        $sizing_plan = SizingPlan::create($data);
        $sizing_plan->plan_number = 'SP-'.$sizing_plan->id;
        $sizing_plan->save();
        foreach ($data["yarn_details"] ?? array() as $row) {
            $sub_det = array();
            $row["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["yarn_id"] = $row['yarn_id'];
//            $sub_det["sort_id"] = $row['sort_id'];
//            $sub_det["sort_ends"] = $row['sort_ends'];
//            $sub_det["sizing_ends"] = $row['sizing_ends'];
//            $sub_det["width"] = $row['width'];
//            $sub_det["parts"] = $row['parts'];
//            $sub_det["ends_per_parts"] = $row['ends_per_parts'];
//            $sub_det["dbf"] = $row['dbf'];
//            $sub_det["weave_type_id"] = $row['weave_type_id'];
//            $sub_det["loom_type_id"] = $row['loom_type_id'];
//            $sub_det["meters"] = $row['meters'];
//            $sub_det["warp_meters"] = $row['warp_meters'];
            SizingPlanYarn::create($row);
        }
        foreach ($data["beam_details"] ?? array() as $row) {
            $sub_det = array();
            $row["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["weaver_id"] = $row['weaver_id'];
//            $sub_det["order_id"] = $row['order_id'];
//            $sub_det["loom_model_id"] = $row['loom_model_id'];
//            $sub_det["loom_number_id"] = $row['loom_number_id'];
//            $sub_det["beam_meters"] = $row['beam_meters'];
//            $sub_det["expected_fabric_mtrs"] = $row['expected_fabric_mtrs'];
//            $sub_det["warp_meters"] = $row['warp_meters'];
//            $sub_det["beam_dia"] = $row['beam_dia'];
//            $sub_det["loom_ched_id"] = $row['loom_ched_id'];
            $row["is_set_beam"] = isset($row['is_set_beam']) ? 1 : 0;
            SizingPlanBeam::create($row);
        }
        return redirect('sizing_plan')->with('message', "Sizing plan added successfully...");
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
        $vendors = Vendors::where('status', 1)->get();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $machines = Machine::where('status', 1)->get();
        $mill_names = Mill::where("status", 1)->orderBy('id', 'desc')->get();
        $employes = Employe::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();
        $coparts = Copart::where('status', 1)->get();
        $weavers = Weave::where('status', 1)->get();
        $orders = SalesOrder::all();
        $loom_models = LoomTypes::where('status', 1)->get();
        $looms = LoomTypes::where('status', 1)->get();
        $loom_types = LoomTypes::where('status', 1)->get();
        $sorts = Sort::where('status', 1)->get();
        $weave_types = Weave::where("status", 1)->get();
        $item = SizingPlan::where('id',$id)->with('beam_details', 'yarn_details', 'vendor')->first();
        return view('planning.sizing_plan.add', compact('item', 'mill_names','loom_types', 'weave_types', 'sorts', 'vendors', 'payment_terms', 'machines', 'employes', 'yarns', 'coparts', 'weavers', 'orders', 'loom_models', 'looms'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['is_sizing_order'] = isset($data['is_sizing_order']) ? 1 : 0;
        $data['default_meter_for_beam'] = isset($data['default_meter_for_beam']) ? 1 : 0;
        $data['is_complete'] = isset($data['is_complete']) ? 1 : 0;
        $sizing_plan = SizingPlan::findOrFail($id);
        $sizing_plan->update($data);
        $sizing_plan->save();
        $sizing_plan->yarn_details()->delete();
        foreach ($data["yarn_details"] ?? array() as $row) {
            $sub_det = array();
            $row["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["yarn_id"] = $row['yarn_id'];
//            $sub_det["sort_id"] = $row['sort_id'];
//            $sub_det["sort_ends"] = $row['sort_ends'];
//            $sub_det["sizing_ends"] = $row['sizing_ends'];
//            $sub_det["width"] = $row['width'];
//            $sub_det["parts"] = $row['parts'];
//            $sub_det["ends_per_parts"] = $row['ends_per_parts'];
//            $sub_det["dbf"] = $row['dbf'];
//            $sub_det["weave_type_id"] = $row['weave_type_id'];
//            $sub_det["loom_type_id"] = $row['loom_type_id'];
//            $sub_det["meters"] = $row['meters'];
//            $sub_det["warp_meters"] = $row['warp_meters'];
            SizingPlanYarn::create($row);
        }
        $sizing_plan->beam_details()->delete();
        foreach ($data["beam_details"] ?? array() as $row) {
            $sub_det = array();
            $row["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["sizing_plan_id"] = $sizing_plan->id;
//            $sub_det["weaver_id"] = $row['weaver_id'];
//            $sub_det["order_id"] = $row['order_id'];
//            $sub_det["loom_model_id"] = $row['loom_model_id'];
//            $sub_det["loom_number_id"] = $row['loom_number_id'];
//            $sub_det["beam_meters"] = $row['beam_meters'];
//            $sub_det["expected_fabric_mtrs"] = $row['expected_fabric_mtrs'];
//            $sub_det["warp_meters"] = $row['warp_meters'];
//            $sub_det["beam_dia"] = $row['beam_dia'];
//            $sub_det["loom_ched_id"] = $row['loom_ched_id'];
//            $sub_det["is_set_beam"] =  isset($row['is_set_beam']) ? 1 : 0;
            $row["is_set_beam"] =  isset($row['is_set_beam']) ? 1 : 0;
            SizingPlanBeam::create($row);
        }
        return redirect('sizing_plan')->with('message', "Sizing plan updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SizingPlan::findOrFail($id)->delete();
        return redirect('sizing_plan')->with('success', 'Deleted successfully');
    }



    public function get_sizing_plan(Request $request)
    {
        $status = true;
        $id = $request->get('id');
        $item = SizingPlan::where('id', $id)->with('beam_details', 'yarn', 'sizing_yarn_issue')->first();
        if(!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }
}
