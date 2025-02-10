<?php

namespace App\Http\Controllers;


use App\Models\ContractType;
use App\Models\ContractTypeDetail;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ContractType::with('details')
            ->orderBy('id', 'desc')->get();
        return view('contract_type.index', compact('list'));
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
        $data['code'] = $request->code ?? '';
        $data['type'] = $request->type ?? '';
        $data['status'] = $request->status ? 1 : 0;
        $item = ContractType::create($data);
        foreach ($request->details ?? array() as $row){
            $row['contract_type_id'] = $item->id;
            ContractTypeDetail::create($row);
        }
        return redirect()->back()->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = ContractType::where('id', $id)->with('details')->first();
        $status = true;
        if (!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ContractType::where('id', $id)->with('details')->first();
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
        $data['code'] = $request->code ?? '';
        $data['type'] = $request->type ?? '';
        $data['status'] = $request->status ? 1 : 0;
        $item = ContractType::findOrFail($id);
        $item->update($data);
        $item->details()->delete();
        foreach ($request->details ?? array() as $row){
            $row['contract_type_id'] = $item->id;
            ContractTypeDetail::create($row);
        }
        return redirect()->back()->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ContractType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
