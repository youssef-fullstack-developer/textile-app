<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\Agent;
use App\Models\AgentType;
use App\Models\Countries;
use App\Models\SalesOrderDetail;
use App\Models\Set;
use Illuminate\Http\Request;

class SetListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Set::with('sales_order_detail')->orderBy('id', 'desc')->get();
        return view('set_list.index', compact('list'));
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
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Set::where('id',$id)->with('sales_order_detail')->first();
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
        $item = Set::where('id',$id)->with('sales_order_detail')->first();
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Set::findOrFail($id);
        if(!isset($data['last_set'])){
            $data['last_set'] = 0;
        }
        $item->update($data);
        return redirect()->back()->with('success', 'Agent updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        Set::findOrFail($id)->delete();
//        return redirect()->with('success', 'Agent deleted successfully');
    }
}
