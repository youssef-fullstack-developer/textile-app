<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Port;
use App\Models\State;
use Illuminate\Http\Request;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Port::with('get_state','get_city')->orderBy('id', 'desc')->get();
        $states = State::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        return view('port.index', compact('list', 'states', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        return view('port.add', compact('states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'state' => 'required',
            'name' => 'required',
        ]);
        $data['description'] = $request->description ?? '';
        $data['pin'] = $request->pin ?? '';
        $data['city'] = $request->city ?? '';
        $data['status'] = $request->status ? 1 : 0;

        Port::create($data);
        return redirect('port')->with('message', 'Port created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Port::find($id);
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
        $item = Port::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'code' => 'required',
            'state' => 'required',
            'name' => 'required',
        ]);
        $data['description'] = $request->description ?? '';
        $data['pin'] = $request->pin ?? '';
        $data['city'] = $request->city ?? '';
        $data['status'] = $request->status ? 1 : 0;

        $item = Port::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Port::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
