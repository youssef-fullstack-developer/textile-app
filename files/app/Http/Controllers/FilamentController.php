<?php

namespace App\Http\Controllers;

use App\Models\Filament;
use Illuminate\Http\Request;

class FilamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Filament::all();
        return view('filaments.index', compact('list'));
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

        Filament::create($data);
        return redirect('filaments')->with('message', 'Filament created Successfully');
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
        $item = Filament::findOrFail($id);
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

        $item = Filament::findOrFail($id);
        $item->update($data);
        return redirect('filaments')->with('success', 'Filament updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Filament::findOrFail($id)->delete();
        return redirect('filaments')->with('success', 'Filament deleted successfully');
    }
}
