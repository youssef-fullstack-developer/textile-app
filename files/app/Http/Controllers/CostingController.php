<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Costing;
use App\Models\Customer;
use App\Models\SourcingExecutive;
use App\Models\WeaveFactor;
use Illuminate\Http\Request;

class CostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Costing::all();
        return view('costing.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::where('status' , 1)->get();
        $customers = Customer::where('status' , 1)->get();
        $sourcings = SourcingExecutive::where('status' , 1)->get();
        $weaves = WeaveFactor::where('status' , 1)->get();
        return view('costing.add', compact('agents', 'customers', 'sourcings', 'weaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'gstn' => 'required',
            'pin' => 'required',
            'contact' => 'required',
            'pan' => 'required',
            'active' => 'required',
        ]);

        Costing::create($data);
        return redirect()->route('costings.index')->with('message', 'Costing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costing $costing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costing $costing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costing $costing)
    {
        //
    }
}
