<?php

namespace App\Http\Controllers;


use App\Models\DeliveryItem;
use Illuminate\Http\Request;

class DeliveryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = DeliveryItem::orderBy('id', 'desc')->get();
        return view('delivery_item.index', compact('list'));
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
        $data['description'] = $request->description ?? '';
        $data['status'] = $request->status ? 1 : 0;

        DeliveryItem::create($data);
        return redirect()->back()->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryItem $paymentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = DeliveryItem::findOrFail($id);
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
        $data['description'] = $request->description ?? '';
        $data['status'] = $request->status ? 1 : 0;

        $item = DeliveryItem::findOrFail($id);
        $item->update($data);
        return redirect()->back()->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DeliveryItem::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
