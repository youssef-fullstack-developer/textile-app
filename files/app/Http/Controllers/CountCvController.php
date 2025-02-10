<?php

namespace App\Http\Controllers;

use App\Models\CountCv;
use Illuminate\Http\Request;

class CountCvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CountCv::orderBy('id', 'desc')->get();
        return view('purchase.count_cv.index', compact('list'));
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

        CountCv::create($data);
        return redirect()->back()->with('message', 'Count Cv created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CountCv $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = CountCv::findOrFail($id);
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

        $item = CountCv::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Count Cv updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CountCv::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Count Cv deleted successfully');
    }
}
