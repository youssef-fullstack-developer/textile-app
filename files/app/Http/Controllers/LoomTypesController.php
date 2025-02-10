<?php

namespace App\Http\Controllers;

use App\Models\LoomTypeDetail;
use App\Models\LoomTypes;
use Illuminate\Http\Request;

class LoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = LoomTypes::with('details')->orderBy('id', 'desc')->get();
        return view('loom_types.index', compact('list'));
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
        $item = LoomTypes::create($data);
        foreach ($request->details ?? array() as $row){
            $row['loom_type_id'] = $item->id;
            LoomTypeDetail::create($row);
        }
        return redirect('loom_types')->with('message', 'Loom Type created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = LoomTypes::where('id',$id)->with('details')->first();
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

        $item = LoomTypes::findOrFail($id);
        $item->update($data);
        $item->details()->delete();

        foreach ($request->details ?? array() as $row){
            $row['loom_type_id'] = $item->id;
            LoomTypeDetail::create($row);
        }
        return redirect('loom_types')->with('success', 'Loom type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LoomTypes::findOrFail($id)->delete();
        return redirect('loom_types')->with('success', 'Loom type deleted successfully');
    }
}
