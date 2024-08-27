<?php

namespace App\Http\Controllers;

use App\Models\ContainerSize;
use Illuminate\Http\Request;

class ContainerSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ContainerSize::all();
        return view('container_sizes.index', compact('list'));
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

        ContainerSize::create($data);
        return redirect('container_sizes')->with('message', 'Container Size created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContainerSize $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ContainerSize::findOrFail($id);
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

        $item = ContainerSize::findOrFail($id);
        $item->update($data);
        return redirect('container_sizes')->with('success', 'Container Size updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ContainerSize::findOrFail($id)->delete();
        return redirect('container_sizes')->with('success', 'Container Size deleted successfully');
    }
}
