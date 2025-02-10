<?php

namespace App\Http\Controllers;

use App\Models\GstRegisteredType;
use Illuminate\Http\Request;

class GstRegisteredTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = GstRegisteredType::orderBy('id', 'desc')->get();
        return view('gst_registered_type.index', compact('list'));
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

        GstRegisteredType::create($data);
        return redirect()->back()->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = GstRegisteredType::find($id);
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
        $item = GstRegisteredType::findOrFail($id);
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

        $item = GstRegisteredType::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        GstRegisteredType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
