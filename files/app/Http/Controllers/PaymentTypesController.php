<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;

class PaymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = PaymentTypes::all();
        return view('payment_types.index', compact('list'));
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

        PaymentTypes::create($data);
        return redirect('payment_type')->with('message', 'Payment Type created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentTypes $paymentTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PaymentTypes::findOrFail($id);
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

        $item = PaymentTypes::findOrFail($id);
        $item->update($data);
        return redirect('payment_type')->with('success', 'Payment type updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PaymentTypes::findOrFail($id)->delete();
        return redirect('payment_type')->with('success', 'Payment type deleted successfully');
    }
}
