<?php

namespace App\Http\Controllers;

use App\Models\Csp;
use Illuminate\Http\Request;

class CspController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Csp::orderBy('id', 'desc')->get();
        return view('purchase.csp.index', compact('list'));
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

        Csp::create($data);
        return redirect()->back()->with('message', 'Csp created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Csp $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Csp::findOrFail($id);
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

        $item = Csp::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Csp updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Csp::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Csp deleted successfully');
    }
}
