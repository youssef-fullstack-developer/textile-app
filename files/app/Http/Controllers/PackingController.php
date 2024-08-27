<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use Illuminate\Http\Request;

class PackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packings = Packing::all();
        return view('packing.index', compact('packings'));
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

        Packing::create($data);
        return redirect()->back()->with('message', 'Packing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Packing $packing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packing $packing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Packing $packing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packing $packing)
    {
        //
    }
}
