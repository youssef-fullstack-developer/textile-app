<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Check;
use App\Models\City;
use App\Models\FabricInward;
use App\Models\Grade;
use App\Models\FabricInwardDetail;
use App\Models\JobworkWeavingContract;
use App\Models\Location;
use App\Models\Sort;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Group;
use Tests\Localization\DaDkTest;

class FabricInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = FabricInward::with('details', 'po', 'vendor_group', 'location')
            ->orderBy('id', 'desc')->get();
        return view('stock.fabric_inward.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor_groups = VendorGroups::where("status", 1)->get();
        $locations = Location::where("status", 1)->get();
        $sorts = Sort::all();
        $grades = Grade::where("status", 1)->get();
        return view('stock.fabric_inward.add', compact('vendor_groups','locations','sorts','grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = FabricInward::create($data);
        foreach ($data['details'] ?? array() as $row){
            $row['fabric_inward_id'] = $item->id;
            $row['is_cutpiece'] = $row['is_cutpiece'] ?? 0;
            FabricInwardDetail::create($row);
        }
        return redirect('fabric_inward')->with('message', "Added Successfully...");

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
                $item = FabricInwardDetail::with('fabric_inward', 'quality', 'inspection', 'grade')->orderBy('id', 'desc')->get();
            }
            else{
                $item = FabricInwardDetail::where('id', $id)->with('fabric_inward', 'quality', 'inspection', 'grade')->first();
            }
        }
        else {
            $item = FabricInward::where('id', $id)->with('details', 'po', 'vendor_group', 'location')->first();
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
        $vendor_groups = VendorGroups::where("status", 1)->get();
        $locations = Location::where("status", 1)->get();
        $sorts = Sort::all();
        $grades = Grade::where("status", 1)->get();
        $item = FabricInward::findOrFail($id);
        return view('stock.fabric_inward.add', compact('item','vendor_groups','locations','sorts','grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = FabricInward::findOrFail($id);
        $item->update($data);
        $item->details()->delete();
        foreach ($data['details'] ?? array() as $row){
            $row['fabric_inward_id'] = $item->id;
            $row['is_cutpiece'] = $row['is_cutpiece'] ?? 0;
            FabricInwardDetail::create($row);
        }
        return redirect('fabric_inward')->with('message', "Successfully...");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item  = FabricInward::findOrFail($id);
        if($item->details()){
            $item->details()->delete();
        }
        $item->delete();
        return redirect()->back()->with('message', 'Deleted successfully');
    }


    public function fabric_inward_details(Request $request)
    {
        $status = true;
        $id = $request->get('id');
        $item = FabricInwardDetail::where('id', $id)->with('fabric_inward', 'quality', 'inspection', 'grade')->first();
        if(!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

}
