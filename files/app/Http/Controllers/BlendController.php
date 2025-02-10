<?php

namespace App\Http\Controllers;

use App\Models\Blend;
use Illuminate\Http\Request;

class BlendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Blend::orderBy('id', 'desc')->get();
        return view('blends.index', compact('list'));
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

        Blend::create($data);
        return redirect()->back()->with('message', 'Blend created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Blend::findOrFail($id);
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

        $item = Blend::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Blend updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blend::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Blend deleted successfully');
    }
}
