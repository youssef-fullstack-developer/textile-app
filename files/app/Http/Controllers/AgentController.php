<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\Agent;
use App\Models\AgentType;
use App\Models\Countries;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Agent::with('country', 'agent_type', 'account_group')->orderBy('id', 'desc')->get();
        $countries = Countries::where('status','1')->get();
        $agent_types = AgentType::where('status','1')->get();
        $account_groups = AccountGroup::where('status','1')->get();
        return view('agent.index', compact('list', 'countries', 'agent_types', 'account_groups'));
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
        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Agent::create($data);
        return redirect('agents')->with('message', 'Agent created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Agent::find($id);
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
        $item = Agent::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $item = Agent::findOrFail($id);
        $item->update($data);
        return redirect('agents')->with('success', 'Agent updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Agent::findOrFail($id)->delete();
        return redirect('agents')->with('success', 'Agent deleted successfully');
    }
}
