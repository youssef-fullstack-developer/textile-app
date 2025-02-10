<?php

namespace App\Http\Controllers;

use App\Models\Qualities;
use Illuminate\Http\Request;

class QualitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Qualities::orderBy('id', 'desc')->get();
        return view('Qualities.index', compact('list'));
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
        $data['status'] = $request->status ? 1 : 0;

        Qualities::create($data);
        return redirect()->back()->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Qualities::find($id);
        $status = true;
        if (!$item) {
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Qualities::findOrFail($id);
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
        $data['status'] = $request->status ? 1 : 0;

        $item = Qualities::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Qualities::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }


}
