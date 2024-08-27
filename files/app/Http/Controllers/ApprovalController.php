<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function export_so($type = Null)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = SalesOrderDetail::with('sales_order', 'quality')->where('approval', $type)->get();
        return view('approvals.export_so.index', compact('type', 'list'));
    }
    public function po_fabric_purchase()
    {
        return view('approvals.po_fabric_purchase.index');
    }

    public function po_fabric_purchase_jw()
    {
        return view('approvals.po_fabric_purchase_jw.index');
    }
}
