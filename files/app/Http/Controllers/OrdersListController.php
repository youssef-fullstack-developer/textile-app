<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\SalesOrderDetail;
use App\Models\SalesOrderYarnCertification;
use App\Models\Set;
use Illuminate\Http\Request;

class OrdersListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SalesOrderDetail::with('sales_order', 'quality')
            ->where('yarn_require', 0)->orderBy('id', 'desc')->get();
        return view('planning.orders.index', compact('list'));
    }
    public function get_orders_list($type = '0')
    {
        $allowedValues = ['-1', '0', '1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = '0';
        }
        $list = SalesOrderDetail::with('sales_order', 'quality')->where('yarn_require', $type)->orderBy('id', 'desc')->get();
        return view('planning.orders.index', compact('type', 'list'));
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
        $set_data['sales_order_details_id'] = $item->id;
        $set_data['date'] = now();
        $set_data['order_quantity'] = $item->quantity;
        $set_data['plan_quantity'] = $item->quantity;
        $set = Set::create($set_data);
        $set->set_number = 'S-'.$set->id;
        $set->save();
        $item->save();
        return redirect()->route('get_orders_list', [1])->with('success', '');

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
