<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = TermsCondition::orderBy('id', 'desc')->get();
        return view('terms_conditions.index', compact('list'));
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
        $data['description'] = $request->description ?? '';
        $data['status'] = $request->status ? 1 : 0;
        TermsCondition::create($data);
        return redirect('terms_conditions')->with('message', 'Term Condition created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TermsCondition $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = TermsCondition::findOrFail($id);
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
        $data['description'] = $request->description ?? '';
        $data['status'] = $request->status ? 1 : 0;
        $item = TermsCondition::findOrFail($id);
        $item->update($data);
        return redirect('terms_conditions')->with('success', 'Term Condition updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TermsCondition::findOrFail($id)->delete();
        return redirect('terms_conditions')->with('success', 'Term Condition deleted successfully');
    }
}
