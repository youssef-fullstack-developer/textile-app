<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Bank::all();
        return view('banks.index', compact('list'));
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

        Bank::create($data);
        return redirect('banks')->with('message', 'Bank created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Bank::findOrFail($id);
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

        $item = Bank::findOrFail($id);
        $item->update($data);
        return redirect('banks')->with('success', 'Bank updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return redirect('banks')->with('success', 'Bank deleted successfully');
    }
}
