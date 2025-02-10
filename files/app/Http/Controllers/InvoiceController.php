<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Certification;
use App\Models\City;
use App\Models\Color;
use App\Models\Consignee;
use App\Models\DeliveryTerms;
use App\Models\GST;
use App\Models\Invoice;
use App\Models\JobworkFabricReceiveDetail;
use App\Models\JobworkProcessContract;
use App\Models\PaymentTerms;
use App\Models\PoFabricProcessingJw;
use App\Models\PoType;
use App\Models\PurchaseType;
use App\Models\SalesOrder;
use App\Models\TermsCondition;
use App\Models\VendorGroups;
use App\Models\Vendors;
use App\Models\Yarn;
use App\Models\YarnInward;
use App\Models\YarnInwardDetail;
use App\Models\YarnInwardDetailLot;
use App\Models\YarnPO;
use App\Models\YarnPoDetail;
use App\Models\YarnType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = NULL)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = Invoice::where('approval', $type)->with('cloth_challan', 'additionals', 'discounts', 'others')
            ->orderBy('id', 'desc')->get();
        return view('approvals.invoice.index', compact('type', 'list'));
    }

    /**
     * Display a listing of the resource.
     */
    public function list($type = null)
    {
        $allowedValues = [NULL, '1', '0', '-1'];
        if (!in_array($type, $allowedValues, true)) {
            $type = Null;
        }
        $list = Invoice::where('approval', $type)->with('cloth_challan', 'additionals', 'discounts', 'others')->get();
        return view('approvals.invoice.index', compact('type', 'list'));
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
    public function show(YarnPO $purchaseYarnPO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Invoice::findOrFail($id);
        $currentDateTime = Carbon::now();
        $currentDateTime = $currentDateTime->format('Y-m-d');

        return view('approvals.invoice.add', compact('currentDateTime', 'item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Invoice::findOrFail($id);
        $item->update($data);
        return redirect('approval_invoice')->with('message', "Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }


}
