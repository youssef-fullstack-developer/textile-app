<?php

namespace App\Http\Controllers;

use App\Models\Tpm;
use Illuminate\Http\Request;

class TpmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Tpm::all();
        return view('tpms.index', compact('list'));
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

        Tpm::create($data);
        return redirect('tpms')->with('message', 'Tpm created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tpm $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Tpm::findOrFail($id);
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

        $item = Tpm::findOrFail($id);
        $item->update($data);
        return redirect('tpms')->with('success', 'Tpm updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tpm::findOrFail($id)->delete();
        return redirect('tpms')->with('success', 'Tpm deleted successfully');
    }
}
