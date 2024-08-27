<?php

namespace App\Http\Controllers;

use App\Models\SourcingExecutive;
use Illuminate\Http\Request;

class SourcingExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SourcingExecutive::all();
        return view('sourcing_executive.index', compact('list'));
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
        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['status'] = $request->status ? 1 : 0;

        SourcingExecutive::create($data);
        return redirect('sourcing_executives')->with('message', 'Sourcing executive created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SourcingExecutive $sourcingExecutive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = SourcingExecutive::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['status'] = $request->status ? 1 : 0;

        $item = SourcingExecutive::findOrFail($id);
        $item->update($data);
        return redirect('sourcing_executives')->with('success', 'Sourcing executive updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SourcingExecutive::findOrFail($id)->delete();
        return redirect('sourcing_executives')->with('success', 'Sourcing executive deleted successfully');
    }
}
