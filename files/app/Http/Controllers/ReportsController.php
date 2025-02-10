<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function warehouse_stock()
    {
        return view('reports.warehouse_stock');
    }

    public function yarn_to_sizing_register()
    {
        return view('reports.yarn_to_sizing_register');
    }

    public function weft_issue_report()
    {
        return view('reports.weft_issue_report');
    }

    public function stock_inward_yarn()
    {
        return view('reports.stock_inward_yarn');
    }

    public function opening_closing_balance()
    {
        return view('reports.opening_closing_balance');
    }

    public function sizing_reconciliation()
    {
        return view('reports.sizing_reconciliation');
    }

    public function stock_inward_yarn_graph()
    {
        return view('reports.stock_inward_yarn_graph');
    }

    public function location_wise_yarn_stock()
    {
        return view('reports.location_wise_yarn_stock');
    }

    public function yarn_entry_in_out()
    {
        return view('reports.yarn_entry_in_out');
    }

    public function yarn_invoice_report()
    {
        return view('reports.yarn_invoice_report');
    }

    public function waiting_for_packing()
    {
        return view('reports.waiting_for_packing');
    }

    public function export_outstanding()
    {
        return view('reports.export_outstanding');
    }

    public function beam_inward()
    {
        return view('reports.beam_inward');
    }

    public function beam_inward_against_job_contract()
    {
        return view('reports.beam_inward_against_job_contract');
    }

    public function export_outstanding_new()
    {
        return view('reports.export_outstanding_new');
    }

    public function weft_req_report()
    {
        return view('reports.weft_req_report');
    }

    public function piece_bale_stock()
    {
        return view('reports.piece_bale_stock');
    }

    public function piece_join()
    {
        return view('reports.piece_join');
    }

    public function inventory_fabric()
    {
        return view('reports.inventory_fabric');
    }

    public function quality_inventory_fabric()
    {
        return view('reports.quality_inventory_fabric');
    }

    public function quality_fabric_outward()
    {
        return view('reports.quality_fabric_outward');
    }

    public function domestic_order_status()
    {
        return view('reports.domestic_order_status');
    }

    public function export_sales_order_status()
    {
        return view('reports.export_sales_order_status');
    }

    public function domestic_order_status_finished()
    {
        return view('reports.domestic_order_status_finished');
    }

    public function export_sales_order_status_finished()
    {
        return view('reports.export_sales_order_status_finished');
    }

    public function fabric_po_status_purchase()
    {
        return view('reports.fabric_po_status_purchase');
    }

    public function fabric_po_status_jobwork()
    {
        return view('reports.fabric_po_status_jobwork');
    }

    public function jobwork_fabric_inward()
    {
        return view('reports.jobwork_fabric_inward');
    }

    public function purchase_fabric_inward()
    {
        return view('reports.purchase_fabric_inward');
    }

    public function packed_fabric_pending_for_dispatch()
    {
        return view('reports.packed_fabric_pending_for_dispatch');
    }

    public function fabric_obcb()
    {
        return view('reports.fabric_obcb');
    }

    public function so_status()
    {
        return view('reports.so_status');
    }

    public function yarn_po_status()
    {
        return view('reports.yarn_po_status');
    }


}
