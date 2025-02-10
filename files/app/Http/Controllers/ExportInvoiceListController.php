<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

//use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

//use Barryvdh\DomPDF\PDF;

class ExportInvoiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Invoice::with('cloth_challan','notify','additionals','discounts','others','buyer','company_bank','destination_country','pre_carriage_by','port_of_loading','port_of_discharge','final_destination','container_size','forwarder','agent','transportation','container_type','sales_type','lc_bank','licence_number','terms_of_delivery_and_payment','term_of_price')
            ->orderBy('id', 'desc')->get();
        return view('exports.export_invoice_list.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function custom_invoice($id = false)
    {
        if ($id) {
            $item = Invoice::where('id', $id)->with('cloth_challan','term_of_price','notify','additionals','discounts','others','buyer','company_bank','destination_country','pre_carriage_by','port_of_loading','port_of_discharge','final_destination','container_size','forwarder','agent','transportation','container_type','sales_type','lc_bank','licence_number','terms_of_delivery_and_payment')->first();
            if ($item) {
                // Data to be passed to the view
                $data = [
                    'item' => $item,
                ];
                return view('exports.export_invoice_list.custom_invoice', compact('item'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function commercial_invoice($id = false)
    {
        if ($id) {
            $item = Invoice::where('id', $id)->with('cloth_challan','term_of_price','notify','additionals','discounts','others','buyer','company_bank','destination_country','pre_carriage_by','port_of_loading','port_of_discharge','final_destination','container_size','forwarder','agent','transportation','container_type','sales_type','lc_bank','licence_number','terms_of_delivery_and_payment')->first();
            if ($item) {
                $data = [
                    'item' => $item,
                ];
                return view('exports.export_invoice_list.commercial_invoice', compact('item'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function custom_packing_list($id = false)
    {
        if ($id) {
            $item = Invoice::where('id', $id)->with('cloth_challan','term_of_price','notify','additionals','discounts','others','buyer','company_bank','destination_country','pre_carriage_by','port_of_loading','port_of_discharge','final_destination','container_size','forwarder','agent','transportation','container_type','sales_type','lc_bank','licence_number','terms_of_delivery_and_payment')->first();
            if ($item) {
                $data = [
                    'item' => $item,
                ];
                return view('exports.export_invoice_list.custom_packing_list', compact('item'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function tax_invoice($id = false)
    {
        if ($id) {
            $item = Invoice::where('id', $id)->with('cloth_challan','term_of_price','notify','additionals','discounts','others','buyer','company_bank','destination_country','pre_carriage_by','port_of_loading','port_of_discharge','final_destination','container_size','forwarder','agent','transportation','container_type','sales_type','lc_bank','licence_number','terms_of_delivery_and_payment')->first();
            if ($item) {
                $data = [
                    'item' => $item,
                ];
                return view('exports.export_invoice_list.tax_invoice', compact('item'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function downloadDivAsPdf(Request $request)
    {
        $html = $request->input('html');

        // Load the HTML into the PDF
        $pdf = PDF::loadHTML($html);

        // Return the PDF as a download response
        return $pdf->download('div-content.pdf');
    }


}
