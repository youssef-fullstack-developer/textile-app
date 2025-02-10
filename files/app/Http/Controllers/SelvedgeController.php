<?php

namespace App\Http\Controllers;

use App\Models\Selvedge;
use App\Models\Weave;
use Illuminate\Http\Request;

class
SelvedgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selvedges = Selvedge::orderBy('id', 'desc')->get();
        return view('selvedge.index', compact('selvedges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weaves = Weave::where("status", 1)->get();
        return view('selvedge.add', compact('weaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'catch_cord_ends' => 'required',
            'reed_count' => 'required',
            'selvedge_width' => 'required',
            'dents' => '',
            'ends_per_dent' => 'required',
            'extra_ends' => '',
            'selvedge_ends' => '',
            'weave_id' => '',
            'ends_per_heild' => '',
            'status' => '',
            'ends_per_wire' => 'required',
        ]);

        Selvedge::create($data);
        return redirect()->route('selvedge.index')->with('message', 'Selvedge created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $weaves = Weave::where("status", 1)->get();
        $item = Selvedge::findOrFail($id);
        return view('selvedge.add', compact('weaves', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'catch_cord_ends' => 'required',
            'reed_count' => 'required',
            'selvedge_width' => 'required',
            'dents' => 'required',
            'ends_per_dent' => 'required',
            'extra_ends' => 'required',
            'selvedge_ends' => 'required',
            'weave_id' => 'required',
            'ends_per_heild' => 'required',
            'status' => 'required',
            'ends_per_wire' => 'required',
        ]);
        Selvedge::findOrFail($id)->update($data);
        return redirect()->route('selvedge.index')->with('message', 'Selvedge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Selvedge::findOrFail($id);
        $item->delete();
        return redirect('selvedge.index')->with('message', "Selvedge deleted successfully...");
    }
}
