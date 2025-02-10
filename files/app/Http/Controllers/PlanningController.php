<?php

namespace App\Http\Controllers;

use App\Models\SalesOrderDetail;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function orders() {

        $list = SalesOrderDetail::with('sales_order', 'quality')
            ->where('approval', 1)->orderBy('id', 'desc')->get();
        return view('planning.orders.index', compact('list'));
    }

    public function sizing_yarn_issue() {
        return view('planning.sizing_yarn_issue.index');
    }

    public function beam_inward() {
        return view('planning.beam_inward.index');
    }

    public function beam_outward() {
        return view('planning.beam_outward.index');
    }
}
