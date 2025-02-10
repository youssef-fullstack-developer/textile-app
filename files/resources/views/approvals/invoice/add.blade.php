@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'approval_invoice';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : '' ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            APPROVE DETAILS
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route.'.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h1 class="text-center">INVOICE</h1>
                        {{-- First table --}}

                        {{-- Line 1 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-6">
                                <label>Exporter's</label>
                                <span class="form-control">{{ $item?->exporter_id ?? '' }}</span>
                            </div>
                            {{-- half right --}}
                            <div class="col-6">
                                {{-- half right line 1 --}}
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Invoice Number :</label>
                                        <span class="form-control">{{ $item?->invoice_number ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>Date</label>
                                        <span class="form-control">{{ $item?->invoice_date ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>Exporter's Ref :</label>
                                        <span class="form-control">{{ $item?->exporter_ref ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 2 --}}
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>So No</label>
                                        <span class="form-control">{{ $item?->so_no ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
                                        <label>Reuse Deleted Invoice</label>
                                        <span class="form-control">{{ $item?->reuse_deleted_invoice ? 'Yes' : 'No' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 3 --}}
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>L/C No :</label>
                                        <span class="form-control">{{ $item?->lc_no ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>L/C Date:</label>
                                        <span class="form-control">{{ $item?->lc_date ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>Company Bank* :</label>
                                        <span class="form-control">{{ $item?->company_bank_id ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Line 2 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <label>Buyer <b class="text-danger"></b></label>
                                    <span class="form-control">{{ $item?->buyer ?? '' }}</span>
                                </div>
                                <div class="form-group row">
                                    <label>Buyer if other than Consignee</label>
                                    <span class="form-control">{{ $item?->buyer_if_other_than_consignee ?? '' }}</span>
                                </div>
                                <div class="form-group row">
                                    <span class="form-control">{{ $item?->buyer_id ?? '' }}</span>
                                </div>
                                <div class="form-group row">
                                    <span class="form-control">{{ $item?->buyer_description ?? '' }}</span>
                                </div>
                            </div>
                            {{-- half right --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Buyer <b class="text-danger"></b></label>

                                    </div>
                                    <div class="col-6">
                                        <label>To Order</label>
                                        <span class="form-control">{{ $item?->to_order ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Line 3 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Notify:</label>
                                        <span class="form-control">{{ $item?->Notify_id ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Challan Number</label>
                                        <span class="form-control">{{ $item?->challan_number ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- half right --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Country of origin of goods</label>
                                        <span class="form-control">{{ $item?->country_of_origin_of_goods ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Destination country <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->destination_country_id ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Line 4 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-6">
                                {{-- half left line 1 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Pre-Carriage By <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->pre_carriage_by_id ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Place of receipt by pre-carrier <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->place_of_receipt_by_pre_carrier ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half left line 2 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Vehicle flight no :</label>
                                        <span class="form-control">{{ $item?->vehicle_flight_number ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Port of loading <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->port_of_loading_id ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>.</label>
                                        <span class="form-control">{{ $item?->port_of_loading_details ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half left line 3 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Port of discharge <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->port_of_discharge_id ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Final destination <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->final_destination_id ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half left line 4 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Container No :</label>
                                        <span class="form-control">{{ $item?->container_no ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Container Size :</label>
                                        <span class="form-control">{{ $item?->container_size_id ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half left line 5 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Forwarder :</label>
                                        <span class="form-control">{{ $item?->forwarder_id ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Line Name :</label>
                                        <span class="form-control">{{ $item?->line_name_id ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- half right --}}
                            <div class="col-6">
                                {{-- half right line 1 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Agent <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->agent_id ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>AGENT PERCENT <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->agent_percent ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 2 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Licence Type</label>
                                        <span class="form-control">{{ $item?->licence_type ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Licence Number :</label>
                                        <span class="form-control">{{ $item?->licence_number_id ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 3 --}}
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>EPCG License Number <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->epcg_license_number ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>EPCG License Holder :</label>
                                        <span class="form-control">{{ $item?->epcg_license_holder ?? '' }}</span>
                                    </div>
                                    <div class="col-4">
                                        <label>Terms of Delivery and payment <b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->terms_of_delivery_and_payment ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 4 --}}
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>Shipper Seal No :</label>
                                        <span class="form-control">{{ $item?->chipper_seal_number ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Vehicle Number :</label>
                                        <span class="form-control">{{ $item?->vehicle_number ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>RFID Seal No :</label>
                                        <span class="form-control">{{ $item?->rfid_seal_number ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Transportation :</label>
                                        <span class="form-control">{{ $item?->transportation_id ?? '' }}</span>
                                    </div>
                                </div>
                                {{-- half right line 5 --}}
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>Container Type :</label>
                                        <span class="form-control">{{ $item?->container_type_id ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Sales Type:<b class="text-danger"></b></label>
                                        <span class="form-control">{{ $item?->sales_type_id ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Lr No :</label>
                                        <span class="form-control">{{ $item?->lr_no ?? '' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>Lr Date :</label>
                                        <span class="form-control">{{ $item?->lr_date ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Line 5 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-12">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>SL NO</th>
                                        <th>QUALITY</th>
                                        <th>DESCRIPTION</th>
                                        <th>EPI</th>
                                        <th>PPI</th>
                                        <th>WIDTH</th>
                                        <th>GSM</th>
                                        <th>COMPOSITION</th>
                                        <th>HSN CODE</th>
                                        <th>QUANTITY</th>
                                        <th>RATE</th>
                                        <th>AMOUNT</th>
                                        <th>INR AMOUNT</th>
                                        <th>GST INR AMOUNT</th>
                                    </tr>
                                    </thead>
                                    <tbody id="detail_container">
                                    @if(!empty($item))
                                        @foreach($item->details ?? array() as $index => $row)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- Line 6 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-4">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="table-primary">
                                        <th colspan="3">ADDITIONAL CHARGES :</th>
                                    </tr>
                                    </thead>
                                    <tbody id="additional_container">
                                    @if(!empty($item))
                                        @foreach($item->additionals ?? array() as $index => $row)
                                            <tr>
                                                <td>
                                                    {{ $row?->sales_order_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $row?->sales_order_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $row?->sales_order_id ? 'Percent' : 'Value' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- half middle --}}
                            <div class="col-4">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="table-primary">
                                        <th colspan="3">LESS CHARGES :</th>
                                    </thead>
                                    <tbody id="discount_container">
                                    @if(!empty($item))
                                        @foreach($item->discounts ?? array() as $index => $row)
                                            <tr>
                                                <td>
                                                    {{ $row?->sales_order_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $row?->sales_order_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $row?->sales_order_id ? 'Percent' : 'Value' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- half right --}}
                            <div class="col-4">
                                <div class="form-group row">
                                    <div class="col-3 content_middle">
                                        Add :
                                    </div>
                                    <div class="col-9">
                                        <span class="form-control">{{ $item?->add ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3 content_middle">
                                        Less :
                                    </div>
                                    <div class="col-9">
                                        <span class="form-control">{{ $item?->less ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3 content_middle">
                                        Total Tax :
                                    </div>
                                    <div class="col-9">
                                        <span class="form-control">{{ $item?->total_tax ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3 content_middle">
                                        Total Amount :
                                    </div>
                                    <div class="col-9">
                                        <span class="form-control">{{ $item?->total_amount ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Line 7 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-3">
                                <label>Insurance</label>
                                <span class="form-control">{{ $item?->insurance ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>Freight</label>
                                <span class="form-control">{{ $item?->freight ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>Commission</label>
                                <span class="form-control">{{ $item?->commission ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>INR value</label>
                                <span class="form-control">{{ $item?->inr_value ?? '' }}</span>
                            </div>
                        </div>
                        {{-- Line 8 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-3">
                                <label>Insurance HSN</label>
                                <span class="form-control">{{ $item?->insurance_hsn ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>Freight HSN</label>
                                <span class="form-control">{{ $item?->freight_hsn ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>Currency Convertion Value </label>
                                <span class="form-control">{{ $item?->currency_convertion_value ?? '' }}</span>
                            </div>
                            <div class="col-3">
                                <label>Including GST INR value</label>
                                <span class="form-control">{{ $item?->including_gst_inr_value ?? '' }}</span>
                            </div>
                        </div>
                        {{-- Line 9 --}}
                        <div class="form-group row">
                            {{-- half left --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr class="table-primary">
                                                <th>SALES ORDER NO.</th>
                                                <th>POLDS DATE</th>
                                                <th>QUANTITY</th>
                                            </tr>
                                            </thead>
                                            <tbody id="other_container">
                                            @if(!empty($item))
                                                @foreach($item->others ?? array() as $index => $row)
                                                    <tr>
                                                        <td>
                                                            {{ $row?->sales_order_id ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $row?->polds_date_id ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $row?->quantity ?? '' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Bale/Roll No. Range</label>
                                        {{ $item?->igst_lut ?? '' }}
                                        <span class="form-control">{{ $item?->bale_role_no_range ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Amount Chargeable(in words) : </label>
                                    </div>
                                </div>
                            </div>
                            {{-- half right --}}
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>IGST/LUT </label>
                                        <span class="form-control">{{ $item?->igst_lut ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>L/C Bank</label>
                                        <span class="form-control">{{ $item?->lc_bank_id ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>DBK</label>
                                        <span class="form-control">{{ $item?->dbk ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>RITC</label>
                                        <span class="form-control">{{ $item?->ritc ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Place</label>
                                        <span class="form-control">{{ $item?->place ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Documents Delivered</label>
                                        <span class="form-control">{{ $item?->documents_delivered ?? '' }}</span>
                                    </div>
                                    <div class="col-6">
                                        <label>Company Logo</label>
                                        <span class="form-control">{{ $item?->company_logo ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Last table --}}
                        <div class="row border border-2 border-light-dark p-4">
                            <table class="table ">
                                {{-- Line 1 --}}
                                <tr>
                                    <td>
                                        <b>Date</b>
                                    </td>
                                    <td colspan="5">
                                        <input type="hidden" name="approval_date"
                                               value="{{$item->approval_date ?? $currentDateTime}}">
                                        {{$item->approval_date ?? $currentDateTime}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Internal Remark</b></td>
                                    <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="internal_remark" @else disabled @endif
                                              >{{$item->internal_remark}}</textarea>
                                    </td>
                                    <td><b>Customer Instruction</b></td>
                                    <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="customer_instruction" @else disabled @endif
                                              >{{$item->customer_instruction}}</textarea>
                                    </td>
                                    <td><b>Comments</b></td>
                                    <td>
                                    <textarea rows="2" @if(empty($item->approval)) name="comments" @else disabled @endif
                                    >{{$item->comments}}</textarea>
                                    </td>
                                </tr>
                            </table>
                            @if(empty($item->approval))
                                <div class="text-center">
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="1"/>
                                                <span></span>
                                                Approve
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="-1"/>
                                                <span></span>
                                                Reject
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="0"/>
                                                <span></span>
                                                Hold
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(empty($item->approval))
                        <div class="card-footer text-center">
                            <button type="submit" name="submit" value="submit"
                                    class="btn btn-success font-weight-bolder mr-4 w-135px">
                                SAVE
                            </button>
                            <a href="{{ route($route.'.index') }}" class="btn btn-warning font-weight-bolder w-135px">
                                CANCEL
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@endsection
