<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function invoice() {
        return view('exports.invoice.index');
    }

    public function bill() {
        return view('exports.bill.index');
    }
}
