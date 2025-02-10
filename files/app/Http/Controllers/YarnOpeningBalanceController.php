<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\City;
use App\Models\Color;
use App\Models\Location;
use App\Models\Mill;
use App\Models\SalesOrder;
use App\Models\StockType;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnOpeningBalance;
use App\Models\YarnOpeningBalanceDetail;
use App\Models\YarnOpeningBalanceDetailLot;
use App\Models\YarnPO;
use Illuminate\Http\Request;

class YarnOpeningBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = YarnOpeningBalanceDetail::with('yarn_opening_balance','lots','yarn','mill')->orderBy('id', 'DESC')->get();
        return view('stock.yarn_opening_balance.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor_groups = VendorGroups::with('yarn_pos','get_group_type')->where("status", 1)->get();
        $mill_names = Mill::where("status", 1)->get();
        $stock_types = StockType::where("status", 1)->get();
        $locations = Location::where("status", 1)->get();
        $yarns = Yarn::all();
        return view('stock.yarn_opening_balance.add', compact('vendor_groups','locations','stock_types','mill_names','yarns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = YarnOpeningBalance::create($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            $detail['yarn_opening_balance_id'] = $item->id;
            $det = YarnOpeningBalanceDetail::create($detail);
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['yarn_opening_balance_detail_id'] = $det->id;
                YarnOpeningBalanceDetailLot::create($row);
            }
        }
        return redirect('yarn_opening_balance')->with('message', "Successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $get_details = $request->get("get_details", false);
        if($get_details && !empty($get_details)) {
            if(!$id){
                $item = YarnOpeningBalanceDetail::select('*')->with('yarn_opening_balance', 'lots', 'yarn', 'mill')->get();
            }else {
                $item = YarnOpeningBalanceDetail::where('id', $id)->with('yarn_opening_balance', 'lots', 'yarn', 'mill')->first();
            }
        }else {
            $item = YarnOpeningBalance::where('id', $id)->with('details', 'vendor_group', 'location', 'stock_type')->first();
        }
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
        $item = YarnOpeningBalance::findOrFail($id);
        $vendor_groups = VendorGroups::with('yarn_pos','get_group_type')->where("status", 1)->get();
        $mill_names = Mill::where("status", 1)->get();
        $stock_types = StockType::where("status", 1)->get();
        $locations = Location::where("status", 1)->get();
        $yarns = Yarn::all();
        return view('stock.yarn_opening_balance.add', compact('item','vendor_groups','locations','stock_types','mill_names','yarns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = YarnOpeningBalance::findOrFail($id);
        $data['is_jobwork_order'] = $data['is_jobwork_order'] ?? 0;
        $item->update($data);
        foreach ($data['details'] ?? array()  as $i => $detail){
            if(!empty($detail['id']) && $detail['id'] > 0)
            {
                $det = YarnOpeningBalanceDetail::findOrFail($id);
                $det->update($detail);
            }
            else{
                $detail['yarn_opening_balance_id'] = $item->id;
                $det = YarnOpeningBalanceDetail::create($detail);
            }
            $det->lots()->delete();
            foreach ($detail['lots'] ?? array() as $index => $row){
                $row['yarn_opening_balance_detail_id'] = $det->id;
                YarnOpeningBalanceDetailLot::create($row);
            }
        }
        return redirect('yarn_opening_balance')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = YarnOpeningBalanceDetail::find($id);
        if($item){
            $item->lots()->delete();
            $item->delete();
        }
        return redirect('yarn_opening_balance')->with('message', "Deleted Successfully...");
    }
}
