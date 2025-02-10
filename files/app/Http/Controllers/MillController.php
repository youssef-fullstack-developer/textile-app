<?php

namespace App\Http\Controllers;

use App\Models\Mill;
use Illuminate\Http\Request;

class MillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mills = Mill::orderBy('id', 'desc')->get();
        return view('mill.index', compact('mills'));
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
        ]);
        $data['status'] = $request->status == "0" ? 0 : 1;
        Mill::create($data);
        return redirect()->back()->with('message', 'Mill created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mill $mill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Mill::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['status'] = $request->status == "0" ? 0 : 1;

        $item = Mill::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Mill::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
