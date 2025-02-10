@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'packing_list';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : route($route.'.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            EXPORT INVOICE
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route.'.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        {{-- half left --}}
                        <div class="col-6">
                            <label>Exporter's</label>
                            <select name="exporter_id" class="form-control">
                                <option value="">Select Company Name</option>
                                    <option value="sez" {{$item->exporter_id == 'sez' ? 'selected' : ''}}>SEZ</option>
                                    <option value="domestic" {{$item->exporter_id == 'domestic' ? 'selected' : ''}}>Domestic</option>
                            </select>
                        </div>
                        {{-- half right --}}
                        <div class="col-6">
                            {{-- half right line 1 --}}
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>Invoice Number :</label>
                                    <input type="text" readonly class="form-control" value="{{$item?->invoice_number ?? ''}}"/>
                                </div>
                                <div class="col-4">
                                    <label>Date</label>
                                    <input type="date" name="invoice_date" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>Exporter's Ref :</label>
                                    <input type="text" name="exporter_ref" class="form-control"/>
                                </div>
                            </div>
                            {{-- half right line 2 --}}
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>So No</label>
                                    <input type="text" name="so_no" class="form-control"/>
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                    <label>Reuse Deleted Invoice</label>
                                    <input type="checkbox" name="reuse_deleted_invoice" value="1"
                                           class="form-control w-20px"/>
                                </div>
                            </div>
                            {{-- half right line 3 --}}
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>L/C No :</label>
                                    <input type="text" name="lc_no" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>L/C Date:</label>
                                    <input type="date" name="lc_date" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>Company Bank* :</label>
                                    <select name="company_bank_id" class="form-control">
                                        <option value="">Select Company Name</option>
                                        @foreach($banks as $row)
                                            <option
                                                value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half right line 4 --}}
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>Other References :</label>
                                    <input type="text" name="other_reference" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>Terms Of Price</label>
                                    <select name="term_of_price_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($payment_terms as $row)
                                            <option
                                                value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Mode Of Shipment *</label>
                                    <select name="mode_of_shipment" class="form-control">
                                        <option value="">Select</option>
                                            <option value="Air">Air</option>
                                            <option value="Sea">Sea</option>
                                            <option value="Road">Road</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        {{-- half left --}}
                        <div class="col-6">
                            <div class="form-group row">
                                <label>Buyer <b class="text-danger">*</b></label>
                                <input type="text" name="buyer" class="form-control"/>
                            </div>
                            <div class="form-group row">
                                <label>Buyer if other than Consignee</label>
                                <input type="text" name="buyer_if_other_than_consignee" class="form-control"/>
                            </div>
                            <div class="form-group row">
                                <select name="buyer_id" class="form-control">
                                    <option value="">Select Buyer</option>
                                    @foreach($buyers as $row)
                                        <option
                                            value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <textarea name="buyer_description" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        {{-- half right --}}
                        <div class="col-6">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Buyer <b class="text-danger">*</b></label>

                                </div>
                                <div class="col-6">
                                    <label>To Order</label>
                                    <input type="text" name="to_order" class="form-control"/>
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
                                    <select name="notify_id" class="form-control">
                                        <option value="">Select Notify</option>
                                        @foreach($notify as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Challan Number</label>
                                    <input type="text" name="challan_number" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        {{-- half right --}}
                        <div class="col-6">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Country of origin of goods</label>
                                    <input type="text" name="country_of_origin_of_goods" class="form-control"/>
                                </div>
                                <div class="col-6">
                                    <label>Destination country <b class="text-danger">*</b></label>
                                    <select name="destination_country_id" class="form-control">
                                        <option value="">Select Destination country</option>
                                        @foreach($destination_countries as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
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
                                    <label>Pre-Carriage By <b class="text-danger">*</b></label>
                                    <select name="pre_carriage_by_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($pre_carriage_bys as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Place of receipt by pre-carrier <b class="text-danger">*</b></label>
                                    <input type="text" name="place_of_receipt_by_pre_carrier" class="form-control"/>
                                </div>
                            </div>
                            {{-- half left line 2 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Vehicle flight no :</label>
                                    <input type="text" name="vehicle_flight_number" class="form-control"/>
                                </div>
                                <div class="col-3">
                                    <label>Port of loading <b class="text-danger">*</b></label>
                                    <select name="port_of_loading_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($port_of_loadings as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>.</label>
                                    <input type="text" name="port_of_loading_details" class="form-control"/>
                                </div>
                            </div>
                            {{-- half left line 3 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Port of discharge <b class="text-danger">*</b></label>
                                    <select name="port_of_discharge_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($port_of_discharges as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Final destination <b class="text-danger">*</b></label>
                                    <select name="final_destination_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($final_destinations as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half left line 4 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Container No :</label>
                                    <input type="text" name="container_no" class="form-control"/>
                                </div>
                                <div class="col-6">
                                    <label>Container Size :</label>
                                    <select name="container_size_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($container_sizes as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half left line 5 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Forwarder :</label>
                                    <select name="forwarder_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($forwarders as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Line Name :</label>
                                    <select name="line_name_id" class="form-control">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- half right --}}
                        <div class="col-6">
                            {{-- half right line 1 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Agent <b class="text-danger">*</b></label>
                                    <select name="agent_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($agents as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>AGENT PERCENT <b class="text-danger">*</b></label>
                                    <input type="text" name="agent_percent" class="form-control"/>
                                </div>
                            </div>
                            {{-- half right line 2 --}}
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Licence Type</label>
                                    <select name="licence_type" class="form-control">
                                        <option value="">Select</option>
                                            <option value="Duty Free">Duty Free</option>
                                            <option value="Advance Licence">Advance Licence</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Licence Number :</label>
                                    <select name="licence_number_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($licence_numbers as $row)
                                            <option value="{{$row->id}}">{{$row->number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half right line 3 --}}
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>EPCG Licence Number</label>
                                    <textarea name="epcg_license_number" class="form-control" rows="1"></textarea>
                                </div>
                                <div class="col-4">
                                    <label>EPCG License Holder :</label>
                                    <input type="text" name="epcg_license_holder" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>Terms of Delivery and payment <b class="text-danger">*</b></label>
                                    <select name="terms_of_delivery_and_payment" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($terms_of_delivery_and_payments as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half right line 4 --}}
                            <div class="form-group row">
                                <div class="col-3">
                                    <label>Shipper Seal No :</label>
                                    <input type="text" name="chipper_seal_number" class="form-control"/>
                                </div>
                                <div class="col-3">
                                    <label>Vehicle Number :</label>
                                    <input type="text" name="vehicle_number" class="form-control"/>
                                </div>
                                <div class="col-3">
                                    <label>RFID Seal No :</label>
                                    <input type="text" name="rfid_seal_number" class="form-control"/>
                                </div>
                                <div class="col-3">
                                    <label>Transportation :</label>
                                    <select name="transportation_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($transportations as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- half right line 5 --}}
                            <div class="form-group row">
                                <div class="col-3">
                                    <label>Container Type :</label>
                                    <select name="container_type_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($container_types as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>Sales Type:<b class="text-danger">*</b></label>
                                    <select name="sales_type_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($sales_types as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>Lr No :</label>
                                    <input type="text" name="lr_no" class="form-control"/>
                                </div>
                                <div class="col-3">
                                    <label>Lr Date :</label>
                                    <input type="date" name="lr_date" class="form-control"/>
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
                                    <th class="w-50px">
                                        <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                type="button"
                                                onclick="addRowAdditional()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="additional_container">
                                @if(!empty($item))
                                    @foreach($item->additionals ?? array() as $index => $row)
                                        <tr>
                                            <td>
                                                <select
                                                    name="additionals[{{$index}}][type]"
                                                    class="form-control">
                                                    <option value="">Select</option>
{{--                                                    @foreach ($banks as $one)--}}
{{--                                                        <option value="{{ $one->id }}"--}}
{{--                                                            {{ ($row?->type == $one->id) ? 'selected' : '' }}--}}
{{--                                                        >{{ $one->name  }}</option>--}}
{{--                                                    @endforeach--}}
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="additionals[{{$index}}][value]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->value : '' }}"/>
                                            </td>
                                            <td>
                                                <div class="col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="additionals[{{$index}}][percent]"
                                                                   checked="checked" value="1"/>
                                                            <span></span>
                                                            Percent
                                                        </label>
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="additionals[{{$index}}][percent]"
                                                                   value="0"/>
                                                            <span></span>
                                                            Value
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-xs btn-circle"
                                                        type="button"
                                                        onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash"></i></button>
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
                                    <th class="w-50px">
                                        <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                type="button"
                                                onclick="addRowDiscount()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="discount_container">
                                @if(!empty($item))
                                    @foreach($item->discounts ?? array() as $index => $row)
                                        <tr>
                                            <td>
                                                <select
                                                    name="discounts[{{$index}}][type]"
                                                    class="form-control">
                                                    <option value="">Select</option>
{{--                                                    @foreach ($banks as $one)--}}
{{--                                                        <option value="{{ $one->id }}"--}}
{{--                                                            {{ ($row?->type == $one->id) ? 'selected' : '' }}--}}
{{--                                                        >{{ $one->name  }}</option>--}}
{{--                                                    @endforeach--}}
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="discounts[{{$index}}][value]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->value : '' }}"/>
                                            </td>
                                            <td>
                                                <div class="col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="discounts[{{$index}}][percent]"
                                                                   checked="checked" value="1"/>
                                                            <span></span>
                                                            Percent
                                                        </label>
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="discounts[{{$index}}][percent]"
                                                                   value="0"/>
                                                            <span></span>
                                                            Value
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-xs btn-circle"
                                                        type="button"
                                                        onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash"></i></button>
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
                                    <input type="text" name="add" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 content_middle">
                                    Less :
                                </div>
                                <div class="col-9">
                                    <input type="text" name="less" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 content_middle">
                                    Total Tax :
                                </div>
                                <div class="col-9">
                                    <input type="text" name="total_tax" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 content_middle">
                                    Total Amount :
                                </div>
                                <div class="col-9">
                                    <input type="text" name="total_amount" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Line 7 --}}
                    <div class="form-group row">
                        {{-- half left --}}
                        <div class="col-3">
                            <label>Insurance</label>
                            <input type="text" name="insurance" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Freight</label>
                            <input type="text" name="freight" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Commission</label>
                            <input type="text" name="commission" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>INR value</label>
                            <input type="text" name="inr_value" class="form-control"/>
                        </div>
                    </div>
                    {{-- Line 8 --}}
                    <div class="form-group row">
                        {{-- half left --}}
                        <div class="col-3">
                            <label>Insurance HSN</label>
                            <input type="text" name="insurance_hsn" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Freight HSN</label>
                            <input type="text" name="freight_hsn" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Currency Convertion Value *</label>
                            <input type="text" name="currency_convertion_value" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Including GST INR value</label>
                            <input type="text" name="including_gst_inr_value" class="form-control"/>
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
                                            <th>QUANTITY*</th>
                                            <th class="w-50px">
                                                <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                        type="button"
                                                        onclick="addRowOther()"><i class="fa fa-plus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="other_container">
                                        @if(!empty($item))
                                            @foreach($item->others ?? array() as $index => $row)
                                                <tr>
                                                    <td>
                                                        <select
                                                            name="others[{{$index}}][sales_order_id]"
                                                            class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="{{$item?->order?->sales_order?->id}}">{{$item?->order?->sales_order?->order_no}}</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select
                                                            name="others[{{$index}}][polds_date_id]"
                                                            class="form-control">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="others[{{$index}}][quantity]"
                                                               class="form-control"
                                                               value="{{ $row ? $row?->quantity : '' }}"/>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-icon btn-danger btn-xs btn-circle"
                                                                type="button"
                                                                onclick="$(this).closest('tr').remove();"><i
                                                                class="fa fa-trash"></i></button>
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
                                    <input type="text" name="bale_role_no_range" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Amount Chargeable(in words) : </label>
                                    <input type="text" name="amount_chargable" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        {{-- half right --}}
                        <div class="col-6">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>IGST/LUT *</label>
                                    <select name="igst_lut" class="form-control">
                                        <option value="">Select</option>
                                        <option value="igst">IGST</option>
                                        <option value="lut">LUT</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>L/C Bank</label>
                                    <select name="lc_bank_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($lc_banks as $one)
                                            <option value="{{ $one->id }}"
                                                {{ ($row?->lc_bank_id == $one->id) ? 'selected' : '' }}
                                            >{{ $one->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>DBK</label>
                                    <input type="number" name="dbk" class="form-control"/>
                                </div>
                                <div class="col-6">
                                    <label>RITC</label>
                                    <input type="number" name="ritc" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Place</label>
                                    <input type="number" name="place" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Documents Delivered</label>
                                    <select name="documents_delivered" class="form-control">
                                        <option value="acceptence">Acceptence</option>
                                        <option value="payment">Payment</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Company Logo</label>
                                    <select name="company_logo" class="form-control">
                                        <option value="logo">Logo</option>
                                        <option value="without logo">without logo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">
                        SAVE
                    </button>
                    <a href="{{ route($route.'.index') }}" class="btn btn-warning font-weight-bolder w-135px">
                        CANCEL
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
@push('scripts')
    <script>
        const addRow = () => {
            let index = $("#lots_container  TR").length;
            let html = '';
            html += `<tr>`;
            html += `</tr>`;
            $('#lots_container').append(html);
        };
        const addRowAdditional = () => {
            let index = $("#additional_container  TR").length;
            let html = '';
            html += `<tr>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="additionals[${index}][cone_tip_color_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach ($colors as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number"`;
            html += `               name="additionals[${index}][lot_no]"`;
            html += `               class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <div class="col-form-label">`;
            html += `            <div class="radio-inline">`;
            html += `                <label class="radio radio-success">`;
            html += `                    <input type="radio" name="additionals[${index}][lot_no]"`;
            html += `                           checked="checked" value="1"/>`;
            html += `                    <span></span>`;
            html += `                    Percent`;
            html += `                </label>`;
            html += `                <label class="radio radio-success">`;
            html += `                    <input type="radio" name="additionals[${index}][lot_no]"`;
            html += `                           value="0"/>`;
            html += `                    <span></span>`;
            html += `                    Value`;
            html += `                </label>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-xs btn-circle"`;
            html += `                type="button"`;
            html += `                onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#additional_container').append(html);
        };
        const addRowDiscount = () => {
            let index = $("#discount_container  TR").length;
            let html = '';
            html += `<tr>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="discounts[${index}][cone_tip_color_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach ($colors as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number"`;
            html += `               name="discounts[${index}][lot_no]"`;
            html += `               class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <div class="col-form-label">`;
            html += `            <div class="radio-inline">`;
            html += `                <label class="radio radio-success">`;
            html += `                    <input type="radio" name="discounts[${index}][lot_no]"`;
            html += `                           checked="checked" value="1"/>`;
            html += `                    <span></span>`;
            html += `                    Percent`;
            html += `                </label>`;
            html += `                <label class="radio radio-success">`;
            html += `                    <input type="radio" name="discounts[${index}][lot_no]"`;
            html += `                           value="0"/>`;
            html += `                    <span></span>`;
            html += `                    Value`;
            html += `                </label>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-xs btn-circle"`;
            html += `                type="button"`;
            html += `                onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#discount_container').append(html);
        };
        const addRowOther = () => {
            let index = $("#other_container  TR").length;
            let html = '';
            html += `<tr>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="others[${index}][sales_order_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            html += `            <option value="{{$item?->order?->sales_order?->id}}">{{$item?->order?->sales_order?->order_no}}</option>`;
            html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="others[${index}][polds_date_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="others[${index}][quantity]"`;
            html += `               class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-xs btn-circle"`;
            html += `                type="button"`;
            html += `                onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#other_container').append(html);
        };
    </script>
@endpush

