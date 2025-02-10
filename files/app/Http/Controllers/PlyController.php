<?php

namespace App\Http\Controllers;

use App\Models\Ply;
use Illuminate\Http\Request;

class PlyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ply = Ply::orderBy('id', 'desc')->get();
        return view('ply.index', compact('ply'));
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
            'ply' => 'required',
        ]);

        $data['status'] = $request->status ? 1 : 0;

        Ply::create($data);
        return redirect('ply')->with('message', 'Ply created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ply $ply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Ply::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ply' => 'required',
        ]);
        $data['status'] = $request->status ? 1 : 0;

        $item = Ply::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ply::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
