<?php

namespace App\Http\Controllers;

use App\Models\UOM;
use App\Models\YarnType;
use Illuminate\Http\Request;

class YarnTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = YarnType::with('units')->orderBy('id', 'desc')->get();
        $uom = UOM::where('type', 'yarn_unit')->get();
        return view('yarn_master.yarn_type.index', compact('types', 'uom'));
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
            'type' => 'required',
            'unit' => 'required',
            'factor' => 'required',
            'system' => 'required',
            'code' => 'required'
        ]);

        $data['loss'] = $request->loss ? $request->loss : 0;
        $data['status'] = $request->status ? 1 : 0;

        YarnType::create($data);
        return redirect('yarn_type')->with('message', 'Yarn Type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(YarnType $yarnType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = YarnType::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'required',
            'unit' => 'required',
            'factor' => 'required',
            'system' => 'required',
            'code' => 'required'
        ]);

        $data['loss'] = $request->loss ? $request->loss : 0;
        $data['status'] = $request->status ? 1 : 0;

        $item = YarnType::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        YarnType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
