<?php

namespace App\Http\Controllers;

use App\Models\BeamReceiveFromWeaver;
use Illuminate\Http\Request;

class BeamReceiveFromWeaverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planning.beam_receive_from_weaver.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planning.beam_receive_from_weaver.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BeamReceiveFromWeaver $beamReceiveFromWeaver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeamReceiveFromWeaver $beamReceiveFromWeaver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeamReceiveFromWeaver $beamReceiveFromWeaver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeamReceiveFromWeaver $beamReceiveFromWeaver)
    {
        //
    }
}
