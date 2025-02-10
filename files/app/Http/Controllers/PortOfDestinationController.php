<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\PortOfDestination;
use App\Models\State;
use Illuminate\Http\Request;

class PortOfDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = PortOfDestination::orderBy('id', 'desc')->get();
        $states = State::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        return view('port_of_destination.index', compact('list', 'states', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::where("status", 1)->get();
        $cities = City::where("status", 1)->get();
        return view('port_of_destination.add', compact('states', 'cities'));
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

        PortOfDestination::create($data);
        return redirect('port_of_destination')->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = PortOfDestination::find($id);
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
        $item = PortOfDestination::findOrFail($id);
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

        $item = PortOfDestination::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PortOfDestination::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
