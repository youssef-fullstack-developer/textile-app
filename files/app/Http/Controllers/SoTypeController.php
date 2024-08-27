<?php

namespace App\Http\Controllers;

use App\Models\SoType;
use Illuminate\Http\Request;

class SoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SoType::all();
        return view('so_types.index', compact('list'));
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

        SoType::create($data);
        return redirect('so_types')->with('message', 'So Type created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SoType $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = SoType::findOrFail($id);
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

        $item = SoType::findOrFail($id);
        $item->update($data);
        return redirect('so_types')->with('success', 'So Type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SoType::findOrFail($id)->delete();
        return redirect('so_types')->with('success', 'So Type deleted successfully');
    }
}
