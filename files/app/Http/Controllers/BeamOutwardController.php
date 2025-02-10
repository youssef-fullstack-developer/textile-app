<?php

namespace App\Http\Controllers;

use App\Models\BeamOutward;
use App\Models\BeamOutwardDetail;
use App\Models\Buyers;
use App\Models\Contracts;
use App\Models\Employe;
use App\Models\InspectionType;
use App\Models\JobworkWeavingContract;
use App\Models\JobworkWeavingContractOrders;
use App\Models\PackingType;
use App\Models\PaymentTerms;
use App\Models\Selvedge;
use App\Models\Set;
use App\Models\SizingPlan;
use App\Models\SizingYarnIssue;
use App\Models\Sort;
use App\Models\Transportations;
use App\Models\Vendors;
use App\Models\Yarn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tests\Localization\DaDkTest;

class BeamOutwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = BeamOutward::with('details','size','set','sort','vendor')->orderBy('id', 'desc')->get();;
        return view('planning.beam_outward.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buyers = Buyers::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $sorts = Sort::all();
        $sets = Set::all();
        $sizing_plans = JobworkWeavingContract::all();
        $yarns = Yarn::all();
        return view('planning.beam_outward.add', compact('vendors', 'sorts','sets', 'buyers', 'sizing_plans', 'yarns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = BeamOutward::create($data);
        $item->outward_number = 'BO-'. $item->id;
        $item->save();
        if ($item) {
            foreach ($data["details"] ?? array() as $row) {
                $row["beam_outward_id"] = $item->id;
                BeamOutwardDetail::create($row);
            }
        }
        return redirect('beam_outward')->with('message', 'Beam Outward successfully');
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
        $item  = BeamOutward::findOrFail($id);
        $buyers = Buyers::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $sorts = Sort::all();
        $sets = Set::all();
        $sizing_plans = JobworkWeavingContract::all();
        $yarns = Yarn::all();
        return view('planning.beam_outward.add', compact('item', 'vendors','sets', 'sorts', 'buyers', 'sizing_plans', 'yarns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item  = BeamOutward::findOrFail($id);
        $item->update($data);
        if ($item) {
            foreach ($data["details"] ?? array() as $row) {
                if(!empty($row['id']) && $row['id'] > 0){
                    $detail = BeamOutwardDetail::findOrFail($row['id']);
                    $detail->update($row);
                }else {
                    $row["beam_outward_id"] = $item->id;
                    BeamOutwardDetail::create($row);
                }

            }
        }
        return redirect('beam_outward')->with('message', 'Beam Outward successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item  = BeamOutward::findOrFail($id);
        if($item->details()){
            $item->details()->delete();
        }
        $item->delete();
        return redirect()->back()->with('message', 'Beam Outward deleted successfully');
    }
}
