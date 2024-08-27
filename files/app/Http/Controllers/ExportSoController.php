<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportSoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $list = SalesOrder::with('buyer', 'sales_order_details')->where('approval', NULL)->get();
//        return view('approvals.export_so.index', compact('type', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');
        $item = SalesOrderDetail::findOrFail($id);
//        dd($item);
        return view('approvals.export_so.add', compact('item', 'currentDateTime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $approval = $request->integer('approval');
        $instruction_factory = $request->string('instruction_factory');
        $sales_order_remark = $request->string('sales_order_remark');
        $comment = $request->string('comment');
        $item = SalesOrderDetail::findOrFail($id);
        if($item){
            $allowedValues = [NULL, 1, 0, -1];
            if (!in_array($approval, $allowedValues, true)) {
                $approval = Null;
            }
            $item->approval = $approval;
            $item->instruction_factory = $instruction_factory;
            $item->comment = $comment;
            $item->save();
            $sales_order = SalesOrder::findOrFail($item->sales_order_id);
            if($sales_order) {
                $sales_order->remark = $sales_order_remark;
                $sales_order->save();
            }
        }
        return redirect()->route('export_so')->with('success', 'Approval updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
}
