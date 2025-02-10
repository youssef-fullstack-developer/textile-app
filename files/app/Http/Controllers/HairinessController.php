<?php

namespace App\Http\Controllers;

use App\Models\Hairiness;
use Illuminate\Http\Request;

class HairinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Hairiness::orderBy('id', 'desc')->get();
        return view('purchase.hairiness.index', compact('list'));
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

        Hairiness::create($data);
        return redirect()->back()->with('message', 'Hairiness created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hairiness $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Hairiness::findOrFail($id);
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

        $item = Hairiness::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Hairiness updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Hairiness::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Hairiness deleted successfully');
    }
}
