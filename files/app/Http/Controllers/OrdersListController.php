<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SalesOrderDetail;
use App\Models\SalesOrderYarnCertification;
use Illuminate\Http\Request;

class OrdersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SalesOrderDetail::with('sales_order', 'quality')->where('approval', 1)->get();
        return view('planning.orders.index', compact('list'));
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
        $item = SalesOrderDetail::findOrFail($id);
        return view('planning.orders.add', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $shrinkage = $request->float('shrinkage');
        $item = SalesOrderDetail::findOrFail($id);
        $item->yarn_require = 1;
        $item->shrinkage = $shrinkage;
        $item->save();
        return redirect('planning/planning/orders')->with('success', '');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        SalesOrderDetail::findOrFail($id)->delete();
//        return redirect('agents')->with('success', 'Agent deleted successfully');
    }
}
