<?php

namespace App\Http\Controllers;

use App\Models\PaperTubeSize;
use Illuminate\Http\Request;

class PaperTubeSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = PaperTubeSize::all();
        return view('paper_tube_sizes.index', compact('list'));
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

        PaperTubeSize::create($data);
        return redirect('paper_tube_sizes')->with('message', 'Paper Tube Size created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaperTubeSize $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PaperTubeSize::findOrFail($id);
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

        $item = PaperTubeSize::findOrFail($id);
        $item->update($data);
        return redirect('paper_tube_sizes')->with('success', 'Paper Tube Size updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PaperTubeSize::findOrFail($id)->delete();
        return redirect('paper_tube_sizes')->with('success', 'Paper Tube Size deleted successfully');
    }
}
