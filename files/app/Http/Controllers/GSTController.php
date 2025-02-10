<?php

namespace App\Http\Controllers;

use App\Models\GST;
use Illuminate\Http\Request;

class GSTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gsts = GST::orderBy('id', 'desc')->get();
        return view('gst.index', compact('gsts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gst.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gst_type' => 'required',
            'status' => 'required'
        ]);

        $data = $request->all();

        if ($request->gst_type == 1) {
            $data['sgst'] = '0.00';
            $data['cgst'] = '0.00';
        } elseif ($request->gst_type == 2) {
            $data['igst'] = '0.00';
        }

        GST::create($data);
        return redirect()->route('gst.index')->with('message', 'GST created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        if($id > 0) {
            $item = GST::find($id);
        }else{
            $item = GST::where('status', 1)->get();
        }
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
        $item = GST::findOrFail($id);
        return view('gst.add', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gst_type' => 'required',
            'status' => 'required'
        ]);

        $data = $request->all();

        if ($data['gst_type'] == '1') {
            $data['sgst'] = '0.00';
            $data['cgst'] = '0.00';
        } elseif ($data['gst_type'] == '2') {
            $data['igst'] = '0.00';
        }

        $item = GST::findOrFail($id);
        $item->update($data);
        return redirect()->route('gst.index')->with('message', 'GST updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        GST::findOrFail($id)->delete();
        return redirect()->route('gst.index')->with('success', 'GST deleted successfully');
    }
}
