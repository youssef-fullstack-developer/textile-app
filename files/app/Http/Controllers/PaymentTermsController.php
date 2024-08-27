<?php

namespace App\Http\Controllers;

use App\Models\PaymentTerms;
use App\Models\PaymentTypes;
use Illuminate\Http\Request;

class PaymentTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = PaymentTerms::all();
        $payment_types = PaymentTypes::all();
        return view('payment_terms.index', compact('list', 'payment_types'));
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
            'description' => 'required',
            'payment_terms_for' => 'required',
            'days' => 'required',
            'interest' => 'required',
        ]);
        $data['advance'] = $request->advance;
        $data['status'] = $request->status ? 1 : 0;

        PaymentTerms::create($data);
        return redirect('payment_term')->with('message', 'Payment Term created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentTerms $paymentTerms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PaymentTerms::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'payment_terms_for' => 'required',
            'days' => 'required',
            'interest' => 'required',
        ]);
        $data['advance'] = $request->advance;
        $data['status'] = $request->status ? 1 : 0;

        $item = PaymentTerms::findOrFail($id);
        $item->update($data);
        return redirect('payment_term')->with('success', 'Payment term updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PaymentTerms::findOrFail($id)->delete();
        return redirect('payment_term')->with('success', 'Payment term deleted successfully');
    }
}
