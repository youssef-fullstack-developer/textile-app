<?php

namespace App\Http\Controllers;

use App\Models\YarnCertificationType;
use Illuminate\Http\Request;

class YarnCertificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = YarnCertificationType::all();
        return view('yarn_certification_types.index', compact('list'));
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

        YarnCertificationType::create($data);
        return redirect('yarn_certification_types')->with('message', 'Yarn Certification Type created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(YarnCertificationType $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = YarnCertificationType::findOrFail($id);
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

        $item = YarnCertificationType::findOrFail($id);
        $item->update($data);
        return redirect('yarn_certification_types')->with('success', 'Yarn Certification Type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        YarnCertificationType::findOrFail($id)->delete();
        return redirect('yarn_certification_types')->with('success', 'Yarn Certification Type deleted successfully');
    }
}
