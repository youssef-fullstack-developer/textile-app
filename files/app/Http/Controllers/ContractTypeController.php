<?php

namespace App\Http\Controllers;


use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ContractType::all();
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
        $data['status'] = $request->status ? 1 : 0;

        ContractType::create($data);
        return redirect()->back()->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractType $paymentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = ContractType::findOrFail($id);
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
        $data['status'] = $request->status ? 1 : 0;

        $item = ContractType::findOrFail($id);
        $item->update($data);
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
