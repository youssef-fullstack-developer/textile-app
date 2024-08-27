<?php

namespace App\Http\Controllers;

use App\Models\WeaveFactor;
use Illuminate\Http\Request;

class WeaveFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = WeaveFactor::all();
        return view('weave_factor.index', compact('list'));
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

        WeaveFactor::create($data);
        return redirect('weave_factors')->with('message', 'Weave factor created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WeaveFactor $weaveFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = WeaveFactor::findOrFail($id);
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

        $item = WeaveFactor::findOrFail($id);
        $item->update($data);
        return redirect('weave_factors')->with('success', 'Weave factor updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        WeaveFactor::findOrFail($id)->delete();
        return redirect('weave_factors')->with('success', 'Weave factor deleted successfully');
    }
}
