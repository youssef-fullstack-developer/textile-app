<?php

namespace App\Http\Controllers;

use App\Models\Variety;
use Illuminate\Http\Request;

class VarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $varieties = Variety::orderBy('id', 'desc')->get();
        return view('yarn_master.variety.index', compact('varieties'));
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
            'name' => 'required',
            'code' => 'required'
        ]);

        $data['status'] = $request->status ? 1 : 0;

        Variety::create($data);
        return redirect('variety')->with('message', 'Variety created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variety $variety)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Variety::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
        $data['status'] = $request->status == "0" ? 0 : 1;

        $item = Variety::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Variety::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
