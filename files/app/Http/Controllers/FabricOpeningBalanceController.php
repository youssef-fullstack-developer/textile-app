<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Check;
use App\Models\City;
use App\Models\FabricOpeningBalance;
use App\Models\Grade;
use App\Models\FabricOpeningBalanceDetail;
use App\Models\JobworkWeavingContract;
use App\Models\Location;
use App\Models\Sort;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Group;
use Tests\Localization\DaDkTest;

class FabricOpeningBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = FabricOpeningBalance::with('details', 'vendor_group', 'location')
            ->orderBy('id', 'desc')->get();
        return view('stock.fabric_opening_balance.index', compact('list'));
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
        return view('stock.fabric_opening_balance.add', compact('vendor_groups','locations','sorts','grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = FabricOpeningBalance::create($data);
        foreach ($data['details'] ?? array() as $row){
            $row['fabric_opening_balance_id'] = $item->id;
            $row['is_cutpiece'] = $row['is_cutpiece'] ?? 0;
            FabricOpeningBalanceDetail::create($row);
        }
        return redirect('fabric_opening_balance')->with('message', "Added Successfully...");

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
                $item = FabricOpeningBalanceDetail::with('fabric_opening_balance', 'quality', 'inspection', 'grade')->orderBy('id', 'desc')->get();
            }
            else{
                $item = FabricOpeningBalanceDetail::where('id', $id)->with('fabric_opening_balance', 'quality', 'inspection', 'grade')->first();
            }
        }
        else {
            $item = FabricOpeningBalance::where('id', $id)->with('details',  'vendor_group', 'location')->first();
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
        $item = FabricOpeningBalance::findOrFail($id);
        return view('stock.fabric_opening_balance.add', compact('item','vendor_groups','locations','sorts','grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = FabricOpeningBalance::findOrFail($id);
        $item->update($data);
        $item->details()->delete();
        foreach ($data['details'] ?? array() as $row){
            $row['fabric_opening_balance_id'] = $item->id;
            $row['is_cutpiece'] = $row['is_cutpiece'] ?? 0;
            FabricOpeningBalanceDetail::create($row);
        }
        return redirect('fabric_opening_balance')->with('message', "Successfully...");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item  = FabricOpeningBalance::findOrFail($id);
        if($item->details()){
            $item->details()->delete();
        }
        $item->delete();
        return redirect()->back()->with('message', 'Deleted successfully');
    }


    public function fabric_opening_balance_details(Request $request)
    {
        $status = true;
        $id = $request->get('id');
        $item = FabricOpeningBalanceDetail::where('id', $id)->with('fabric_opening_balance', 'quality', 'inspection', 'grade')->first();
        if(!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

}
