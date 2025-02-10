<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\ContractType;
use App\Models\Employe;
use App\Models\InspectionType;
use App\Models\JobworkWeavingContract;
use App\Models\JobworkWeavingContractOrders;
use App\Models\JobworkWeavingContractWarps;
use App\Models\JobworkWeavingContractWefts;
use App\Models\PackingType;
use App\Models\PaymentTerms;
use App\Models\Selvedge;
use App\Models\Sort;
use App\Models\VendorGroups;
use App\Models\Yarn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobworkWeavingContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = JobworkWeavingContract::with('orders','sort','contract_type','vendor','merchandiser','inspection_type','payment_term','packing_type','selvedge','beam_outward_details')
            ->orderBy('id', 'desc')->get();
        return view('planning.jobwork_weaving_contract.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $contract_types = ContractType::where("status", 1)->get();
        $vendors = VendorGroups::where('status', 1)->get();
        $sorts = Sort::where('status', 1)->get();
        $employees = Employe::where('status', 1)->get();
        $inspection_types = InspectionType::where('status', 1)->get();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $packing_types = PackingType::where('status', 1)->get();
        $selvedges = Selvedge::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();

        $currentDateTime = Carbon::now();
        $year = $currentDateTime->format('y');
        $year = $year . '-' . ($year + 1);
        $last = JobworkWeavingContract::select('contract_no')->groupBy('contract_no')->get()->last();
        $last_no = ($last?->contract_no ?? 0) + 1;
        return view('planning.jobwork_weaving_contract.add', compact('last_no', 'year','yarns', 'selvedges','contract_types', 'vendors', 'sorts', 'employees', 'inspection_types', 'payment_terms', 'packing_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $created = JobworkWeavingContract::create($data);
        $created->jobwork_number = 'JW-'. $created->id;
        $created->save();

        foreach ($data["orders_selected"] ?? array() as $row) {
            $sub_det = array();
            $sub_det["jobwork_weaving_contract_id"] = $created->id;
            $sub_det["sales_order_detail_id"] = $row['order_id'];
            $sub_det["planned_quantity"] = $row['planned_quantity'];
            JobworkWeavingContractOrders::create($sub_det);
        }
        foreach ($data["warps"] ?? array() as $row) {
            $row["jobwork_weaving_contract_id"] = $created->id;
            $row["show_in_print"] = $row['show_in_print'] ?? 0 ? 1 : 0;
            JobworkWeavingContractWarps::create($row);
        }
        foreach ($data["wefts"] ?? array() as $row) {
            $row["jobwork_weaving_contract_id"] = $created->id;
            $row["show_in_print"] = $row['show_in_print'] ?? 0 ? 1 : 0;
            JobworkWeavingContractWefts::create($row);
        }
        return redirect('jobwork_weaving_contract')->with('message', "Jobwork Weaving Contract added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = JobworkWeavingContract::where('id', $id)->with('orders','sort','contract_type','vendor','merchandiser','inspection_type','payment_term','packing_type','selvedge','beam_outward_details')->first();
        $status = true;
        if (!$item) {
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contract_types = ContractType::where("status", 1)->get();
        $vendors = VendorGroups::where('status', 1)->get();
        $sorts = Sort::where('status', 1)->get();
        $employees = Employe::where('status', 1)->get();
        $inspection_types = InspectionType::where('status', 1)->get();
        $payment_terms = PaymentTerms::where('status', 1)->get();
        $packing_types = PackingType::where('status', 1)->get();
        $selvedges = Selvedge::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();

        $currentDateTime = Carbon::now();
        $year = $currentDateTime->format('y');
        $year = $year . '-' . ($year + 1);
        $last = JobworkWeavingContract::select('contract_no')->groupBy('contract_no')->get()->last();
        $last_no = ($last?->contract_no ?? 0) + 1;
        $item  = JobworkWeavingContract::where('id', $id)->with('orders')->first();
        return view('planning.jobwork_weaving_contract.add', compact('item', 'last_no', 'year','yarns', 'selvedges','contract_types', 'vendors', 'sorts', 'employees', 'inspection_types', 'payment_terms', 'packing_types'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $created = JobworkWeavingContract::findOrFail($id);
        $created->update($data);
        $created->orders()->delete();
        foreach ($data["orders_selected"] ?? array() as $row) {
            $sub_det = array();
            $sub_det["jobwork_weaving_contract_id"] = $created->id;
            $sub_det["sales_order_detail_id"] = $row['order_id'];
            $sub_det["planned_quantity"] = $row['planned_quantity'];
            JobworkWeavingContractOrders::create($sub_det);
        }
        $created->warps()->delete();
        foreach ($data["warps"] ?? array() as $row) {
            $row["jobwork_weaving_contract_id"] = $created->id;
            $row["show_in_print"] = $row['show_in_print'] ?? 0 ? 1 : 0;
            JobworkWeavingContractWarps::create($row);
        }
        $created->wefts()->delete();
        foreach ($data["wefts"] ?? array() as $row) {
            $row["jobwork_weaving_contract_id"] = $created->id;
            $row["show_in_print"] = $row['show_in_print'] ?? 0 ? 1 : 0;
            JobworkWeavingContractWefts::create($row);
        }
        return redirect('jobwork_weaving_contract')->with('message', "Jobwork Weaving Contract added successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = JobworkWeavingContract::findOrFail($id);
        if($item){
            $item->orders()->delete();
            $item->delete();
        }
        return redirect()->back()->with('message', "Jobwork Weaving Contract deleted successfully...");
    }

    public function get_jobwork(Request $request)
    {
        $status = true;
        $id = $request->get('id');
        $item = JobworkWeavingContract::where('id', $id)->with('beam_outward_details','sort', 'vendor')->first();
        if(!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }



}
