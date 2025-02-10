<?php

namespace App\Http\Controllers;

use App\Models\SalesType;
use Illuminate\Http\Request;

class
SalesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales_types = SalesType::orderBy('id', 'desc')->get();
        return view('sales_type.index', compact('sales_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'account_group' => 'required',
            'status' => 'required',
        ]);

        SalesType::create($data);
        return redirect()->back()->with('message', 'Sales type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = SalesType::find($id);
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
        $item = SalesType::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'account_group' => 'required',
            'status' => 'required',
        ]);

        $item = SalesType::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SalesType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
