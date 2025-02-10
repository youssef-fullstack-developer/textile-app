<?php

namespace App\Http\Controllers;

use App\Models\Count;
use Illuminate\Http\Request;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Count::with('yarns')->orderBy('id', 'desc')->get();
        return view('count.index', compact('count'));
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
            'count' => 'required',
        ]);
        $data['status'] = $request->status == "0" ? 0 : 1;

        Count::create($data);
        return redirect('count')->with('message', 'Count created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Count $count)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Count::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'count' => 'required',
        ]);
        $data['status'] = $request->status == "0" ? 0 : 1;

        $item = Count::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Count updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Count::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
