@extends('main')
@section('content')
    {{ html()->form('POST', '/export_so_actions/'.$item?->id)->open() }}
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
                        <a href="{{ route('export_so') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table">
                            {{-- Line 1 --}}
                            <tr>
                                <td colspan="12" class="text-center">
                                    <h1>{{session('company')}}</h1>
                                    <h6>Tel: | Email: | Web:</h6>
                                </td>
                            </tr>
                            {{-- Line 2 --}}
                            <tr>
                                <td colspan="8" class="">
                                    <b>Division :</b>{{$item->sales_order?->contract_type?->name}}<br>
                                    <b>Order Route :</b>{{$item->city?->name}}
                                </td>
                                <td colspan="4" class="">
                                    <b>PO No :</b>{{$item->sales_order?->po_no}}<br>
                                    <b>PO Date :</b>{{$item->sales_order?->po_date}}
                                </td>
                            </tr>
                            {{-- Line 3 --}}
                            <tr>
                                <td colspan="5" class="">
                                    <b>Buyer:</b><br>
                                    {{$item->sales_order?->buyer?->name}}
                                </td>
                                <td colspan="3" class="">
                                    <b>Shipping To :</b><br>
                                    {{$item->sales_order?->ship_to?->name}}<br>
                                    {{$item->sales_order?->ship_adress}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Contract No. :</b>{{$item->sales_order?->order_no}}<br>
                                    <b>Order Date :</b>{{$item->sales_order?->order_date}}<br>
                                    <b>Confirmation Date :</b>{{$item->sales_order?->confirmation_date}}<br>
                                    <b>Buyer Tax Id No. :</b>{{$item->sales_order?->tax_id}}<br>
                                    <b>Sourcing Executive :</b>{{$item->sales_order?->sourcing_executive?->name}}<br>
                                    <b>Consignee Tax Id No. :</b>{{$item->sales_order?->tax_id}}<br>
                                </td>
                                <td colspan="2" class="">
                                    <b>User :</b>{{$item->sales_order?->user?->name}}<br>
                                    <b>Marketing Executive :</b><br>
                                    <b>Bank :</b>{{$item->sales_order?->bank?->name}}<br>
                                    <b>Shipping Terms Details :</b>{{$item->sales_order?->shipping_terms_det}}<br>
                                    <b>SO Type :</b>{{$item->sales_order?->so_type?->name}}<br>
                                </td>
                            </tr>
                            {{-- Line 4 --}}
                            <tr>
                                <td colspan="5" class="">
                                    <b>Port of loading :</b>{{$item->sales_order?->port_loading}}
                                </td>
                                <td colspan="3" class="">
                                    <b>Destination Port :</b>{{$item->sales_order?->port_destination}}
                                </td>
                                <td colspan="4" class="">
                                </td>
                            </tr>
                            {{-- Line 5 --}}
                            <tr>
                                <td colspan="2" class="">
                                    <b>Quantity for - Container (+/-%) :</b><br>
                                    {{$item->quantity}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Insurance :</b><br>
                                    {{$item->sales_order?->insurance}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Shipping Method :</b><br>
                                    {{$item->sales_order?->shipping_method}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Shipping Terms :</b><br>
                                    {{$item->sales_order?->shipping_terms?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Latest Shipping Date :</b><br>
                                    @php
                                        $latest_date = 0;
                                    @endphp
                                    @foreach($item->sales_order_sub_details as $row)
                                    @php
                                        if (is_null($latest_date) || $row->lds_date > $latest_date) {
                                            $latest_date = $row->lds_date;
                                        }
                                    @endphp
                                    @if($loop->last)
                                        {{ $latest_date }}
                                    @endif
                                    @endforeach
                                </td>
                                <td colspan="2" class="">
                                    <b>Payment terms :</b><br>
                                    {{$item->sales_order?->payment_terms?->name}}
                                </td>
                            </tr>
                            {{-- Line 6 --}}
                            <tr>
                                <td colspan="2" class="">
                                    <b>WeaveType :</b><br>
                                    {{$item->weave_type?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>1st Grey Quality :</b><br>
                                    {{$item->quality?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Sort Code :</b><br>
                                    {{$item->sort_code}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Selvedge :</b><br>
                                    {{$item->selvedge?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Exchange Rate :</b><br>
                                    {{$item->exchange_rate}}
                                </td>
                                <td colspan="2" class="">
                                    <b>INR Rate(In Mtrs) :</b><br>
                                    {{$item->inr_rate}}
                                </td>
                            </tr>
                            {{-- Line 7 --}}
                            <tr>
                                <td colspan="2" class="">
                                    <b>Terms And Condition :</b><br>
                                    {{$item->sales_order?->terms_conditions?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Yarn Details :</b><br>
                                    {{$item->yarn_det}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Piece Length :</b><br>
                                    {{$item->piece_length}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Packing Type :</b><br>
                                    {{$item->packing_type}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Paper Tube Size :</b><br>
                                    {{$item->paper_tube_size?->name}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Fold :</b><br>
                                    {{$item->fold}}
                                </td>
                            </tr>
                            {{-- Line 8 --}}
                            <tr>
                                <td colspan="2" class="">
                                    <b>Quantity in MTR :</b><br>
                                    {{$item->quantity}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Delivery Schedule :</b><br>
                                    @foreach($item->sales_order_sub_details as $key => $row)
                                        {{$row->ex_factory_date}} - {{$row->fcl}}
                                    @endforeach
                                </td>
                                <td colspan="4" class="">
                                    <b>Description :</b><br>
                                    {{$item->quality?->sort_no}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Rate Per MTR :</b><br>
                                    {{$item->rate_per_unit}}
                                </td>
                                <td colspan="2" class="">
                                    <b>Total :</b><br>
                                    {{$item->val}}
                                </td>
                            </tr>
                            {{-- Line 9 --}}
                            <tr>
                                <td colspan="4" class="">
                                    <b>Total Weaving :</b><br>

                                </td>
                                <td colspan="4" class="">
                                    <b>Total Warp :</b><br>

                                </td>
                                <td colspan="4" class="">
                                    <b>Total Sizing :</b><br>

                                </td>
                            </tr>
                            {{-- Line 10 --}}
                            <tr>
                                <td colspan="1" class="">
                                    <b>FCL</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>FCL (Qty)</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>PO LDS</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>Ex-factory Dt</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>Actual Ex-Factory Dt</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>Office Remark</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>Factory Remark</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>LC No</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>LDS Date</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>Line</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>ETD</b>
                                </td>
                                <td colspan="1" class="">
                                    <b>ETA</b>
                                </td>
                            </tr>
                            {{-- Line 11 foreach sales sub details--}}
                            @foreach($item->sales_order_sub_details as $key => $row)
                                <tr>
                                    <td colspan="1" class="text-center">
                                        {{$key + 1}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->fcl}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->po_lds}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->ex_factory_date}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->actual_ex_factory_date}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->office_remark}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->factory_remark}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->lc_no}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->lds_date}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->line}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->etd}}
                                    </td>
                                    <td colspan="1" class="text-center">
                                        {{$row->eta}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{-- Second table --}}
                        <table class="table">
                            {{-- Line 1 --}}
                            <tr>
                                <td class="text-center">
                                    <b>Company Name</b><br>
                                </td>
                                <td class="text-center">
                                    <b>Quality</b><br>
                                </td>
                                <td class="text-center">
                                    <b>Order Number</b><br>
                                </td>
                                <td class="text-center">
                                    <b>Order Qunatity</b><br>
                                </td>
                                <td class="text-center">
                                    <b>Available Quantity</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        {{-- Third table --}}
                        <table class="table">
                            {{-- Line 1 --}}
                            <tr>
                                <td>
                                    <b>Date</b>
                                </td>
                                <td colspan="7">
                                    {{$currentDateTime}}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Fabric Type</b></td>
                                <td>
                                    {{$item->fabric_type}}
                                </td>
                                <td><b>Discount %</b></td>
                                <td>

                                </td>
                                <td><b>Discount Amount</b></td>
                                <td>

                                </td>
                                <td><b>Mode of shipment</b></td>
                                <td>
                                    {{$item->sales_order?->shipping_method}}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Agent</b></td>
                                <td>
                                    {{$item->sales_order?->agent?->name}}
                                </td>
                                <td><b>Agent Percent</b></td>
                                <td>
                                    {{$item->sales_order?->agent?->agent_percent}}
                                </td>
                                <td><b>Inspection Type</b></td>
                                <td>
                                    {{$item->inspection_type?->name}}
                                </td>
                                <td><b>Yarn Certification Details</b></td>
                                <td>
                                    @foreach($item->yarn_certification_types as $row)
                                        {{$row->yarn_certification_type?->name}}<br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td><b>Instruction For Factory</b></td>
                                <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="instruction_factory" @else disabled @endif
                                              >{{$item->instruction_factory}}</textarea>
                                </td>
                                <td><b>Customer Instruction</b></td>
                                <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="sales_order_remark" @else disabled @endif
                                              >{{$item->sales_order?->remark}}</textarea>
                                </td>
                                <td><b>Comments</b></td>
                                <td>
                                    <textarea rows="2" @if(empty($item->approval)) name="comment" @else  disabled @endif>{{$item->comment}}</textarea>
                                </td>
                            </tr>
                        </table>
                        @if(empty($item->approval))
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
                        @endif
                    </div>
                    @if(empty($item->approval))
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route('export_so') }}" class="btn btn-warning font-weight-bolder w-135px">
                            CANCEL
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@endsection
