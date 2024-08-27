<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function bale_packing() {
        return view('warehouse.bale_packing.index');
    }
}
