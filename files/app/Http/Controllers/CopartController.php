<?php

namespace App\Http\Controllers;

use App\Models\Copart;
use Illuminate\Http\Request;

class CopartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coparts = Copart::orderBy('id', 'desc')->get();
        return view('copart.index', compact('coparts'));
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
        Copart::create($request->all());
        return redirect()->back()->with('message', 'Certification created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Copart::find($id);
        $status = true;
        if (!$item) {
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Copart::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $item = Copart::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Copart::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
