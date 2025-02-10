<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\UOM;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = License::orderBy('id', 'desc')->with('get_uom')->get();
        $uoms = UOM::where('status', 1)->get();
        return view('license.index', compact('list', 'uoms'));
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
        License::create($request->all());
        return redirect()->back()->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = License::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = License::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        License::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
