<?php

namespace App\Http\Controllers;

use App\Models\Weave;
use Illuminate\Http\Request;

class WeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Weave::orderBy('id', 'desc')->get();
        return view('weave.index', compact('list'));
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
        $data['no_of_heald_frame'] = $request->no_of_heald_frame ? $request->no_of_heald_frame : '';
        Weave::create($data);
        return redirect()->back()->with('message', 'Weave created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weave $weave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Weave::findOrFail($id);
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

        $item = Weave::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Weave updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Weave::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Weave deleted successfully');
    }
}
