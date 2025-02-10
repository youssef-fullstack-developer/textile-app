@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/sales_order/'.$item?->id : '/sales_order' ;
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} Sales Order
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('sales_order.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Invoice Type:</label>
                            <select name="invoice_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($invoice_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->invoice_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contract Type:</label>
                            <select name="contract_type_id" onchange="change_contract_type(this);" class="form-control">
                                <option value="">Select</option>
                                @foreach($contract_types as $row)
                                    @if($row->type == 'Export')
                                        <option
                                            value="{{$row->id}}" {{ ($item?->contract_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Order Route:</label>
                            <select name="order_route_id" id="order_route_id" class="form-control">
                                <option value="">Select Order Route</option>
                                @if($item && $item->order_route)
                                    <option value="{{$item->order_route?->id}}"
                                            selected>{{$item->order_route?->contract_order_route_name}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Order Date:</label>
                            <input type="date" name="order_date" class="form-control" autocomplete="off"
                                   placeholder="Enter Order Date"
                                   value="{{$item ? $item?->order_date : old('address') }}"/>
                        </div>

                        <div class="col-4">
                            <label>PO No:</label>
                            <input type="text" name="po_no" class="form-control" autocomplete="off"
                                   placeholder="" value=" {{$item ? $item?->po_no : old('po_no') }}"/>
                        </div>

                        <div class="col-4">
                            <label>PO Date:</label>
                            <input type="date" name="po_date" class="form-control" autocomplete="off"
                                   placeholder="Enter" value="{{$item ? $item?->po_date : old('po_date') }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Buyer Name:</label>
                            <select name="buyer_id" class="form-control" onchange="change_buyer_name(this);">
                                <option value="">Select</option>
                                @foreach($buyers as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->buyer_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-8">
                            <label>Address:</label>
                            <input type="text" name="adress" id="adress" class="form-control" autocomplete="off"
                                   placeholder="Enter Address" value="{{$item ? $item?->adress : old('adress') }}"/>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Sourcing Executive:</label>
                            <select name="sourcing_executive_id" id="sourcing_executive_id" class="form-control">
                                <option value="">Select</option>
                                {{--                                @if($item?->sourcing_executive_id > 0)--}}
                                {{--                                    <option value="{{$item?->sourcing_executive?->id}}" selected--}}
                                {{--                                    >{{$item?->sourcing_executive?->representative_name}}</option>--}}
                                {{--                                @endif--}}
                                @foreach($item?->buyer?->representatives ?? array() as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->sourcing_executive_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->representative_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Ship To:</label>
                            <select name="ship_to_id" id="ship_to_id" class="form-control" onchange="change_ship_to(this);">
                                <option value="">Select</option>
                                @foreach($ship_to as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->ship_to_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Ship to Address:</label>
                            <input type="text" name="ship_adress" id="ship_adress" class="form-control"
                                   placeholder="Enter Ship to Address"
                                   value="{{$item ? $item?->ship_adress : old('ship_adress') }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Tax ID No.:</label>
                            <input type="text" name="tax_id" class="form-control" autocomplete="off"
                                   placeholder="Enter Tax ID No." value="{{$item ? $item?->tax_id : old('tax_id') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Sales Contract No.:</label>
                            <input type="text" name="sale_contract_no" class="form-control"
                                   autocomplete="off" placeholder="Enter Sales Contract No."
                                   value="{{$item ? $item?->sale_contract_no : old('sale_contract_no') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Agent / Broker:</label>
                            <select name="agent_id" id="agent_id" class="form-control" onchange="change_agent(this)">
                                <option value="">Select</option>
                                @foreach($agents as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->agent_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent Percent:</label>
                            <input type="number" name="agent_percent" id="agent_percent" class="form-control"
                                   autocomplete="off" placeholder="Enter Agent Percent"
                                   value="{{$item ? $item?->agent_percent : old('agent_percent') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Port of Loading:</label>
                            {{--                            <input type="text" name="port_loading" class="form-control"--}}
                            {{--                                   autocomplete="off" placeholder="Enter Port of Loading"--}}
                            {{--                                   value="{{$item ? $item?->port_loading : old('port_loading') }}"/>--}}
                            <select name="port_loading" class="form-control">
                                <option value="">Select</option>
                                @foreach($port_of_loadings as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->port_loading == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Port of Destination:</label>
                            <select name="port_destination" class="form-control">
                                <option value="">Select Port Of Destination</option>
                                @foreach($port_of_destinations as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->port_destination == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Insurance:</label>
                            <input type="text" name="insurance" class="form-control" autocomplete="off"
                                   placeholder="Enter Insurance"
                                   value="{{$item ? $item?->insurance : old('insurance') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Shipping Method:</label>
                            <select name="shipping_method" class="form-control">
                                <option value="">Select</option>
                                <option
                                    value="sea" {{ ($item?->shipping_method == 'sea') ? 'selected' : '' }}>
                                    SEA
                                </option>
                                <option value="air" {{ ($item?->shipping_method == 'air') ? 'selected' : '' }}>
                                    AIR
                                </option>
                                <option value="road" {{ ($item?->shipping_method == 'road') ? 'selected' : '' }}>
                                    BY ROAD
                                </option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Shipping Terms:</label>
                            <select name="shipping_terms_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($shipping_terms as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->shipping_terms_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Shipping Terms Detail:</label>
                            <input type="text" name="shipping_terms_det" class="form-control"
                                   autocomplete="off" placeholder="Enter Shipping Terms Detail"
                                   value="{{$item ? $item?->shipping_terms_det : old('shipping_terms_det') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Bank:</label>
                            <select name="bank_id" class="form-control">
                                <option value="">Select Bank</option>
                                @foreach($banks as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->bank_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Container Size:</label>
                            <select name="container_size_id" class="form-control">
                                <option value="">Select Container Size</option>
                                @foreach($container_sizes as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->container_size_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Payment Terms:</label>
                            <select name="payment_terms_id" class="form-control">
                                <option value="">Select Payment Terms</option>
                                @foreach($payment_terms as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->payment_terms_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-4">
                            <label>Terms & Conditions:</label>
                            <select name="terms_conditions_id" class="form-control">
                                <option value="">Select Terms & Conditions</option>
                                @foreach($terms_conditions as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->terms_conditions_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>User:</label>
                            <select name="user_id" class="form-control">
                                <option value="">Select User</option>
                                @foreach($users as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->user_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Confirmation Date <b class="text-danger">*</b></label>
                            <input type="date" name="confirmation_date" class="form-control"
                                   autocomplete="off" placeholder=""
                                   value="{{$item ? $item?->confirmation_date : old('confirmation_date') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Sales Co-Ordinator<b class="text-danger">*</b></label>
                            <select name="sales_co_ordinator_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($sales_co_ordinators as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->sales_co_ordinator_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>SO Type<b class="text-danger">*</b></label>
                            <select name="so_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($so_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->so_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control" autocomplete="off"
                                   placeholder="" value="{{$item ? $item?->remark : old('remark') }}"/>
                        </div>
                        <div class="col-4">
                            <label>PI Date</label>
                            <input type="date" name="pi_date" class="form-control" autocomplete="off"
                                   placeholder=""
                                   value="{{$item ? $item?->pi_date : old('pi_date') }}"/>
                        </div>
                    </div>
                    {{-- Begin Order Details --}}
                    <h2 class="text-center">Order Details</h2>
                    <div id="order_details">
                        @php($i = 0)
                        @while( (empty($item) &&  $i == 0) || (count($item?->sales_order_details ?? []) > $i ) )
                            @php($detail = $item ? $item->sales_order_details[$i] : NULL)
                            <div class="form-group border p-3 border-dark border-2 tr">
                                <input type="hidden" name="order_details[{{$i}}][sales_order_detail_id][]"
                                       value="{{$detail ? $detail?->id : '' }}">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="col-12 text-right">
                                            <button
                                                class="btn btn-icon btn-primary btn-sm btn-circle mr-2 btn_add_order_details"
                                                type="button" onclick="add_order_details()"><i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"
                                                    onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Fabric Type<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][fabric_type]" class="form-control"
                                                id="fabric_type_{{$i}}" onchange="change_fabric_type({{$i}})">
                                            <option value="">Select</option>
                                            <option
                                                value="finished" {{ ($detail?->fabric_type == 'finished') ? 'selected' : '' }}>
                                                Finished
                                            </option>
                                            <option
                                                value="grey" {{ ($detail?->fabric_type == 'grey') ? 'selected' : '' }}>
                                                Grey
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-4" id="finished_quality_{{$i}}"
                                        {{ ($detail?->fabric_type == 'grey') ? 'style="display: none"' : '' }} >
                                        <label>Finished Quality<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][finished_quality_id]" class="form-control"
                                                onchange="change_finished_quality({{$i}})"
                                                id="finished_quality_id_{{$i}}">
                                            <option value="">Select</option>
                                            @foreach($sorts as $row)
                                                @if($row?->fabric == 'finished')
                                                    <option
                                                        value="{{$row->id}}" {{ ($detail?->finished_quality_id == $row->id) ? 'selected' : '' }}>{{$row->details}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>WeaveType<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][weave_type_id]" class="form-control"
                                                id="weave_type_id_{{$i}}" required>
                                            <option value="">Select</option>
                                            @foreach($weave_types as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->weave_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>{{$i + 1 }} Quality<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][first_quality_id]" class="form-control"
                                                onchange="change_quality({{$i}})" id="first_quality_id_{{$i}}" required>
                                            <option value="">Select</option>
                                            @foreach($sorts as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->first_quality_id == $row->id) ? 'selected' : '' }}>{{$row->details}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Sort Code</label>
                                        <input type="text" name="order_details[{{$i}}][sort_code]"
                                               id="sort_code_{{$i}}"
                                               class="form-control" autocomplete="off" readonly placeholder=""
                                               value="{{$detail ? $detail?->sort_code : old('sort_code') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Selvedge</label>
                                        <select name="order_details[{{$i}}][selvedge_id]" class="form-control"
                                                id="selvedge_id_{{$i}}">
                                            <option value="">Select</option>
                                            @foreach($selvedges as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->selvedge_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <label>Description</label>
                                        <textarea name="order_details[{{$i}}][description]"
                                                  class="form-control" autocomplete="off" rows="1"
                                        >{{$detail ? $detail?->description : old('description') }}</textarea>
                                    </div>
                                    <div class="col-4">
                                        <label>HSN Code</label>
                                        <input type="text" name="order_details[{{$i}}][hsn_code]"
                                               class="form-control" autocomplete="off"
                                               id="hsn_code_{{$i}}"
                                               value="{{$detail ? $detail?->hsn_code : old('hsn_code') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Quantity <b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][quantity]"
                                               id="quantity_{{$i}}" onchange="change_value({{$i}});"
                                               class="form-control" autocomplete="off" placeholder="" required
                                               value="{{$detail ? $detail?->quantity : old('quantity') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Unit<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][unit_id]" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($units as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->unit_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Currency<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][currency]" class="form-control"
                                                required>
                                            <option value="">Select</option>
                                            <option
                                                value="usd" {{ ($detail?->currency == 'usd') ? 'selected' : '' }}>
                                                USD
                                            </option>
                                            <option
                                                value="rupees" {{ ($detail?->currency == 'rupees') ? 'selected' : '' }}>
                                                RUPEES
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Rate Per Unit<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][rate_per_unit]"
                                               id="rate_per_unit_{{$i}}"
                                               onchange="change_value({{$i}});change_inr_rate({{$i}});"
                                               class="form-control" autocomplete="off" required
                                               value="{{$detail ? $detail?->rate_per_unit : old('rate_per_unit') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Value<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][val]" id="value_{{$i}}"
                                               class="form-control" autocomplete="off" placeholder="" required
                                               value="{{$detail ? $detail?->val : old('val') }}" readonly/>
                                    </div>
                                    <div class="col-4">
                                        <label>Exchange Rate<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][exchange_rate]"
                                               id="exchange_rate_{{$i}}" onchange="change_inr_rate({{$i}});"
                                               class="form-control" autocomplete="off" placeholder="" required
                                               value="{{$detail ? $detail?->exchange_rate : old('exchange_rate') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>INR Rate(In Mtrs)<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][inr_rate]"
                                               class="form-control" autocomplete="off" required
                                               id="inr_rate_{{$i}}" readonly
                                               value="{{$detail ? $detail?->inr_rate : old('inr_rate') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Yarn Details</label>
                                        <input type="text" name="order_details[{{$i}}][yarn_det]"
                                               class="form-control" autocomplete="off" placeholder=""
                                               value="{{$detail ? $detail?->yarn_det : old('yarn_det') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Buyer Sort<b class="text-danger">*</b></label>
                                        <input type="text" name="order_details[{{$i}}][buyer_sort]"
                                               class="form-control" id="buyer_sort_{{$i}}" required
                                               value="{{$detail ? $detail?->buyer_sort : old('buyer_sort') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Piece Length</label>
                                        <input type="number" name="order_details[{{$i}}][piece_length]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->piece_length : old('piece_length') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Inspection Type<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][inspection_type_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($inspection_types as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->inspection_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Packing Type</label>
                                        <select name="order_details[{{$i}}][packing_type]" class="form-control"
                                                onchange="change_packing_type({{$i}})" id="packing_type_{{$i}}">
                                            <option value="">Select</option>
                                            <option
                                                value="roll" {{ ($detail?->packing_type == 'usd') ? 'selected' : '' }}>
                                                ROLL
                                            </option>
                                            <option
                                                value="bale" {{ ($detail?->packing_type == 'rupees') ? 'selected' : '' }}>
                                                BALE
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Variation %</label>
                                        <input type="number" name="order_details[{{$i}}][variation]"
                                               class="form-control"
                                               autocomplete="off"
                                               value="{{$detail ? $detail?->variation : old('variation') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Paper Tube Size</label>
                                        <select name="order_details[{{$i}}][paper_tube_size_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($paper_tube_sizes as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->paper_tube_size_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4" id="fold_container_{{$i}}">
                                        <label>Fold</label>
                                        <input type="text" name="order_details[{{$i}}][fold]" class="form-control"
                                               autocomplete="off" id="fold_{{$i}}"
                                               value="{{$detail ? $detail?->fold : old('pi_date') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Weaving Qty<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][weaving_qty]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->weaving_qty : old('weaving_qty') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Purchase Qty<b class="text-danger">*</b></label>
                                        <input type="number" name="order_details[{{$i}}][purchase_qty]"
                                               class="form-control"
                                               autocomplete="off"
                                               value="{{$detail ? $detail?->purchase_qty : old('purchase_qty') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Frieght Charge</label>
                                        <input type="number" name="order_details[{{$i}}][frieght_charge]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->frieght_charge : old('frieght_charge') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Surcharge</label>
                                        <input type="number" name="order_details[{{$i}}][surcharge]"
                                               class="form-control" autocomplete="off" placeholder=""
                                               value="{{$detail ? $detail?->surcharge : old('surcharge') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Instruction For Factory<b class="text-danger">*</b></label>
                                        <textarea name="order_details[{{$i}}][instruction_factory]"
                                                  class="form-control" autocomplete="off" rows="1" required
                                        >{{$detail ? $detail?->instruction_factory : old('instruction_factory') }} </textarea>
                                    </div>
                                </div>
                                {{-- Begin Order Sub Detail --}}
                                <div id="order_sub_details_{{$i}}">
                                    @php($l = 0)
                                    @while( (empty($detail) &&  $l == 0) || (count($detail?->sales_order_sub_details ?? []) > $l ) )
                                        @php($_sub_detail = $detail ? $detail->sales_order_sub_details[$l] : NULL)
                                        <div class="form-group border p-3 m-3 border-dark border-2 tr">
                                            <input type="hidden"
                                                   name="order_details[{{$i}}][sales_order_sub_detail_id][]"
                                                   value="{{$_sub_detail ? $_sub_detail?->id : '' }}">
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label>{{($l + 1)}} FCL (Qty)</label>
                                                    <input type="number" name="order_details[{{$i}}][fcl][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->fcl : old('fcl') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>PO LDS</label>
                                                    <input type="date" name="order_details[{{$i}}][po_lds][]"
                                                           class="form-control" autocomplete="off" placeholder=""
                                                           value="{{$_sub_detail ? $_sub_detail?->po_lds : old('po_lds') }}"/>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <button
                                                        class="btn btn-icon btn-primary btn-sm btn-circle mr-2 btn_add_order_sub_details_{{$i}}"
                                                        type="button" onclick="add_order_sub_details({{$i}})"><i
                                                            class="fa fa-plus"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-danger btn-sm btn-circle "
                                                            type="button"
                                                            onclick="deleteRow(this)"><i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label>Ex-factory Dt<b class="text-danger">*</b></label>
                                                    <input type="date" name="order_details[{{$i}}][ex_factory_date][]"
                                                           class="form-control" required
                                                           value="{{$_sub_detail ? $_sub_detail?->ex_factory_date : old('ex_factory_date') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>Actual Ex-Factory Dt</label>
                                                    <input type="date"
                                                           name="order_details[{{$i}}][actual_ex_factory_date][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->actual_ex_factory_date : old('actual_ex_factory_date') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>LC Expire date</label>
                                                    <input type="date" name="order_details[{{$i}}][lc_expire_date][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->lc_expire_date : old('lc_expire_date') }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label>Office Remark</label>
                                                    <input type="text" name="order_details[{{$i}}][office_remark][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->office_remark : old('office_remark') }}"/>
                                                </div>
                                                <div class="col-8">
                                                    <label>Factory Remark</label>
                                                    <textarea name="order_details[{{$i}}][factory_remark][]"
                                                              class="form-control" rows="1" autocomplete="off"
                                                    >{{$_sub_detail ? $_sub_detail?->factory_remark : old('factory_remark') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label>LC No</label>
                                                    <input type="number" name="order_details[{{$i}}][lc_no][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->lc_no : old('lc_no') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>LDS Date</label>
                                                    <input type="date" name="order_details[{{$i}}][lds_date][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->lds_date : old('lds_date') }}"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label>Line</label>
                                                    <input type="text" name="order_details[{{$i}}][line][]"
                                                           class="form-control" autocomplete="off" placeholder=""
                                                           value="{{$_sub_detail ? $_sub_detail?->line : old('line') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>ETD</label>
                                                    <input type="date" name="order_details[{{$i}}][etd][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->etd : old('etd') }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <label>ETA</label>
                                                    <input type="date" name="order_details[{{$i}}][eta][]"
                                                           class="form-control" autocomplete="off"
                                                           value="{{$_sub_detail ? $_sub_detail?->eta : old('eta') }}"/>
                                                </div>
                                            </div>

                                        </div>

                                        @php($l++)
                                    @endwhile
                                </div>
                                {{-- End Order Sub Detail --}}
                                <div class="form-group row">
                                    <div class="col-4">
                                        <table
                                            class="table table-head-noborder table-active table-responsive-sm loading-table table-foot-bg">
                                            <thead>
                                            <tr>
                                                <th>YARN CERTIFICATION TYPE</th>
                                                <th style="width:100px;">ADD/DELETE</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbl_yarn_certification_types">
                                            @php($j = 0)
                                            @while( (empty($detail) &&  $j == 0) || (count($detail?->yarn_certification_types ?? []) > $j ) )
                                                @php($line = $detail ? $detail->yarn_certification_types[$j] : NULL)
                                                <tr class="tr">
                                                    <td style="vertical-align: middle">
                                                        <select
                                                            name="order_details[{{$i}}][yarn_certification_type_id][]"
                                                            class="form-control">
                                                            <option value="">Select</option>
                                                            @foreach($yarn_certification_types as $yarn)
                                                                <option
                                                                    value="{{$yarn->id}}" {{ ($line?->yarn_certification_type_id == $yarn->id) ? 'selected' : '' }}>{{$yarn->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-icon btn-sm btn-primary btn-circle"
                                                            type="button" onclick="add_yarn_certification_type({{$i}})">
                                                            <i
                                                                class="fa fa-plus"></i></button>
                                                        <button class="btn btn-icon btn-danger btn-sm btn-circle"
                                                                type="button"
                                                                onclick="deleteRow(this)"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @php($j++)
                                            @endwhile
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <label>Costing Number</label>
                                        <input type="number" name="order_details[{{$i}}][costing_number]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->costing_number : old('costing_number') }}"/>
                                    </div>
                                </div>

                            </div>
                            @php($i++)
                        @endwhile
                    </div>
                    {{-- End Order Details --}}

                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
@push('scripts')
    <script>
        const add_yarn_certification_type = (id) => {
            var html = '';
            html += `<tr class="tr">`;
            html += `    <td style="vertical-align: middle">`;
            html += `        <select name="order_details[${id}][yarn_certification_type_id][]"`;
            html += `                class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($yarn_certification_types as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button`;
            html += `            class="btn btn-icon btn-sm btn-primary btn-circle"`;
            html += `            type="button" onclick="add_yarn_certification_type(${id})"><i`;
            html += `            class="fa fa-plus"></i></button>`;
            html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
            html += `                onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#tbl_yarn_certification_types').append(html);
        };
        const add_order_sub_details = (index) => {
            var count = $(".btn_add_order_sub_details_" + index).length;
            var html = '';
            html += `<div class="form-group border p-3 m-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="order_details[${index}][sales_order_sub_detail_id][]">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += '                <label>' + (count + 1) + ' FCL (Qty)</label>';
            html += `                <input type="number" name="order_details[${index}][fcl][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>PO LDS</label>`;
            html += `                <input type="date" name="order_details[${index}][po_lds][]" `;
            html += `                       class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4 text-right">`;
            html += `                <button`;
            html += `                    class="btn btn-icon btn-primary btn-sm btn-circle mr-2 btn_add_order_sub_details_${index}"`;
            html += `                    type="button" onclick="add_order_sub_details(${index})"><i class="fa fa-plus"></i>`;
            html += `                </button>`;
            html += `                <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"`;
            html += `                        onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Ex-factory Dt<b class="text-danger">*</b></label>`;
            html += `                <input type="date" name="order_details[${index}][ex_factory_date][]"`;
            html += `                       class="form-control"  required/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Actual Ex-Factory Dt</label>`;
            html += `                <input type="date" name="order_details[${index}][actual_ex_factory_date][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>LC Expire date</label>`;
            html += `                <input type="date" name="order_details[${index}][lc_expire_date][]"`;
            html += `                       class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Office Remark</label>`;
            html += `                <input type="text" name="order_details[${index}][office_remark][]"`;
            html += `                       class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-8">`;
            html += `                <label>Factory Remark</label>`;
            html += `                <textarea name="order_details[${index}][factory_remark][]"`;
            html += `                          class="form-control"rows="1" autocomplete="off"></textarea>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>LC No</label>`;
            html += `                <input type="number" name="order_details[${index}][lc_no][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>LDS Date</label>`;
            html += `                <input type="date" name="order_details[${index}][lds_date][]"`;
            html += `                       class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Line</label>`;
            html += `                <input type="text" name="order_details[${index}][line][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>ETD</label>`;
            html += `                <input type="date" name="order_details[${index}][etd][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>ETA</label>`;
            html += `                <input type="date" name="order_details[${index}][eta][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `</div>`;
            $('#order_sub_details_' + index).append(html);
        };
        const add_order_details = () => {
            var count = $('.btn_add_order_details').length;
            var html = '';
            html += `<div class="form-group border p-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="order_details[${count}][sales_order_detail_id][]" >`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-12">`;
            html += `                <div class="col-12 text-right">`;
            html += `                    <button`;
            html += `                        class="btn btn-icon btn-primary btn-sm btn-circle mr-2 btn_add_order_details"`;
            html += `                        type="button" onclick="add_order_details()"><i class="fa fa-plus"></i>`;
            html += `                    </button>`;
            html += `                    <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"`;
            html += `                            onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `                </div>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Fabric Type<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][fabric_type]" class="form-control" `;
            html += `                id="fabric_type_${count}" onchange="change_fabric_type(${count})" >`;
            html += `                    <option value="">Select</option>`;
            html += `                    <option`;
            html += `                        value="finished" >`;
            html += `                        Finished`;
            html += `                    </option>`;
            html += `                    <option`;
            html += `                        value="grey" >`;
            html += `                        Grey`;
            html += `                    </option>`;
            html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4" id="finished_quality_${count}" style="display: none">`;
            html += `                <label>Finished Quality<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][finished_quality_id]" class="form-control"`;
            html += `                       onchange="change_finished_quality(${count})" id="finished_quality_id_${count}"  >`;
            html += `                    <option value="">Select</option>`;
            @foreach($sorts as $row)
                @if($row?->fabric == 'finished')
                html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->details}}</option>`;
            @endif
                @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>WeaveType<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][weave_type_id]" class="form-control"`;
            html += `                    id="weave_type_id_${count}" required>`;
            html += `                    <option value="">Select</option>`;
            @foreach($weave_types as $row)
                html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>${count + 1} Quality<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][first_quality_id]" class="form-control"`;
            html += `                     onchange="change_quality(${count})" id="first_quality_id_${count}"  required  >`;
            html += `                    <option value="">Select</option>`;
            @foreach($sorts as $row)
                html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->details}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Sort Code</label>`;
            html += `                <input type="text" name="order_details[${count}][sort_code]" id="sort_code_${count}" `;
            html += `                       class="form-control" autocomplete="off" readonly placeholder="" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Selvedge</label>`;
            html += `                <select name="order_details[${count}][selvedge_id]" class="form-control" `;
            html += `                id="selvedge_id_${count}" >`;
            html += `                    <option value="">Select</option>`;
            @foreach($selvedges as $row)
                html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-8">`;
            html += `                <label>Description</label>`;
            html += `                <textarea name="order_details[${count}][description]"`;
            html += `                          class="form-control" autocomplete="off" rows="1" ></textarea>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>HSN Code</label>`;
            html += `                <input type="text" name="order_details[${count}][hsn_code]"`;
            html += `                       id="hsn_code_${count}" class="form-control" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Quantity <b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][quantity]"`;
            html += `                       id="quantity_${count}" onchange="change_value(${count});"`;
            html += `                       class="form-control" autocomplete="off" placeholder="" required />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Unit<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][unit_id]" class="form-control" required>`;
            html += `                    <option value="">Select</option>`;
            html += `                    @foreach($units as $row)`;
            html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->name}}</option>`;
            html += `                    @endforeach`;
            html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Currency<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][currency]" class="form-control"`;
            html += `                        required>`;
            html += `                    <option value="">Select</option>`;
            html += `                    <option`;
            html += `                        value="usd" >`;
            html += `                        USD`;
            html += `                    </option>`;
            html += `                    <option`;
            html += `                        value="rupees" >`;
            html += `                        RUPEES`;
            html += `                    </option>`;
            html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Rate Per Unit<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][rate_per_unit]"`;
            html += `                       id="rate_per_unit_${count}" onchange="change_value(${count});change_inr_rate(${count});"`;
            html += `                       class="form-control" autocomplete="off" required />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Value<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][val]" id="value_${count}" `;
            html += `                       class="form-control" autocomplete="off" placeholder="" required readonly/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Exchange Rate<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][exchange_rate]"`;
            html += `                       id="exchange_rate_${count}" onchange="change_inr_rate(${count});"`;
            html += `                       class="form-control" autocomplete="off" placeholder="" required />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>INR Rate(In Mtrs)<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][inr_rate]"`;
            html += `                       id="inr_rate_${count}" readonly`;
            html += `                       class="form-control" autocomplete="off" required />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Yarn Details</label>`;
            html += `                <input type="text" name="order_details[${count}][yarn_det]"`;
            html += `                       class="form-control" autocomplete="off" placeholder="" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Buyer Sort<b class="text-danger">*</b></label>`;
            html += `                <input type="text" name="order_details[${count}][buyer_sort]"`;
            html += `                       class="form-control" id="buyer_sort_${count}" required />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Piece Length</label>`;
            html += `                <input type="number" name="order_details[${count}][piece_length]"`;
            html += `                       class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Inspection Type<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${count}][inspection_type_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            html += `                    @foreach($inspection_types as $row)`;
            html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->name}}</option>`;
            html += `                    @endforeach`;
            html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Packing Type</label>`;
            html += `                <select name="order_details[${count}][packing_type]" class="form-control" `;
            html += `                onchange="change_packing_type(${count})" id="packing_type_${count}" >`;
            html += `                    <option value="">Select</option>`;
            html += `                    <option`;
            html += `                        value="roll" >`;
            html += `                        ROLL`;
            html += `                    </option>`;
            html += `                    <option`;
            html += `                        value="bale" >`;
            html += `                        BALE`;
            html += `                    </option>`;
            html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Variation %</label>`;
            html += `                <input type="number" name="order_details[${count}][variation]"`;
            html += `                       class="form-control"`;
            html += `                       autocomplete="off" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Paper Tube Size</label>`;
            html += `                <select name="order_details[${count}][paper_tube_size_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            html += `                    @foreach($paper_tube_sizes as $row)`;
            html += `                    <option`;
            html += `                        value="{{$row->id}}" >{{$row->name}}</option>`;
            html += `                    @endforeach`;
            html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4" id="fold_container_${count}">`;
            html += `                <label>Fold</label>`;
            html += `                <input type="text" name="order_details[${count}][fold]" class="form-control"`;
            html += `                       autocomplete="off" id="fold_${count}" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Weaving Qty<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][weaving_qty]"`;
            html += `                    class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Purchase Qty<b class="text-danger">*</b></label>`;
            html += `                <input type="number" name="order_details[${count}][purchase_qty]"`;
            html += `                    class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Frieght Charge</label>`;
            html += `                <input type="number" name="order_details[${count}][frieght_charge]"`;
            html += `                       class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Surcharge</label>`;
            html += `                <input type="number" name="order_details[${count}][surcharge]"`;
            html += `                       class="form-control" autocomplete="off" placeholder="" />`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Instruction For Factory<b class="text-danger">*</b></label>`;
            html += `                <textarea name="order_details[${count}][instruction_factory]"`;
            html += `                          class="form-control" autocomplete="off" rows="1" required`;
            html += `                ></textarea>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        {{-- Begin Order Sub Detail --}}`;
            html += `        <div id="order_sub_details_${count}">`;
            html += `<div class="form-group border p-3 m-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="order_details[${count}][sales_order_sub_detail_id][]">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += '                <label>1 FCL (Qty)</label>';
            html += `                <input type="number" name="order_details[${count}][fcl][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>PO LDS</label>`;
            html += `                <input type="date" name="order_details[${count}][po_lds][]" `;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4 text-right">`;
            html += `                <button`;
            html += `                    class="btn btn-icon btn-primary btn-sm btn-circle mr-2 btn_add_order_sub_details_${count}"`;
            html += `                    type="button" onclick="add_order_sub_details(${count})"><i class="fa fa-plus"></i>`;
            html += `                </button>`;
            html += `                <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"`;
            html += `                        onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Ex-factory Dt<b class="text-danger">*</b></label>`;
            html += `                <input type="date" name="order_details[${count}][ex_factory_date][]"`;
            html += `                       class="form-control"  required/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Actual Ex-Factory Dt</label>`;
            html += `                <input type="date" name="order_details[${count}][actual_ex_factory_date][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>LC Expire date</label>`;
            html += `                <input type="date" name="order_details[${count}][lc_expire_date][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Office Remark</label>`;
            html += `                <input type="text" name="order_details[${count}][office_remark][]"`;
            html += `                       class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-8">`;
            html += `                <label>Factory Remark</label>`;
            html += `                <textarea name="order_details[${count}][factory_remark][]"`;
            html += `                          class="form-control"rows="1" autocomplete="off"></textarea>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>LC No</label>`;
            html += `                <input type="number" name="order_details[${count}][lc_no][]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>LDS Date</label>`;
            html += `                <input type="date" name="order_details[${count}][lds_date][]"`;
            html += `                       class="form-control" autocomplete="off" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Line</label>`;
            html += `                <input type="text" name="order_details[${count}][line][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>ETD</label>`;
            html += `                <input type="date" name="order_details[${count}][etd][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>ETA</label>`;
            html += `                <input type="date" name="order_details[${count}][eta][]" class="form-control"`;
            html += `                       autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `</div>`;
            html += `        </div>`;
            html += `        {{-- End Order Sub Detail --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-4">`;
            html += `            <table`;
            html += `                class="table table-head-noborder table-active table-responsive-sm loading-table table-foot-bg">`;
            html += `                <thead>`;
            html += `                <tr>`;
            html += `                    <th>YARN CERTIFICATION TYPE</th>`;
            html += `                    <th style="width:100px;">ADD/DELETE</th>`;
            html += `                </tr>`;
            html += `                </thead>`;
            html += `                <tbody id="tbl_yarn_certification_types">`;
            html += `<tr class="tr">`;
            html += `    <td style="vertical-align: middle">`;
            html += `        <select name="order_details[${count}][yarn_certification_type_id][]"`;
            html += `                class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($yarn_certification_types as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button`;
            html += `            class="btn btn-icon btn-sm btn-primary btn-circle"`;
            html += `            type="button" onclick="add_yarn_certification_type(${count})"><i`;
            html += `            class="fa fa-plus"></i></button>`;
            html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
            html += `                onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            html += `                </tbody>`;
            html += `            </table>`;
            html += `        </div>`;
            html += `        <div class="col-4">`;
            html += `            <label>Costing Number</label>`;
            html += `            <input type="number" name="order_details[${count}][costing_number]"`;
            html += `                   class="form-control" autocomplete="off" />`;
            html += `        </div>`;
            html += `        </div>`;
            html += `</div>`;
            $('#order_details').append(html);
        };

        const deleteRow = (val) => {
            $(val).closest('.tr').remove();
        }


        const change_value = (id) => {
            let quantity = $("#quantity_" + id).val();
            let rate_per_unit = $("#rate_per_unit_" + id).val();

            let value = (quantity ?? 0) * (rate_per_unit ?? 0)
            $("#value_" + id).val(value);

        }

        const change_inr_rate = (id) => {
            let rate_per_unit = $("#rate_per_unit_" + id).val();
            let exchange_rate = $("#exchange_rate_" + id).val();

            let value = (exchange_rate ?? 0) * (rate_per_unit ?? 0)
            $("#inr_rate_" + id).val(value);

        }

        const change_buyer_name = (elm) => {
            let id = $(elm).val();
            let adress = $("#adress");
            let sourcing_executive = $("#sourcing_executive_id");
            // let ship_to = $("#ship_to_id");
            adress.val('');
            sourcing_executive.html('<option value="">Select</option>');
            // ship_to.html('<option value="">Select</option>');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('buyers.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            adress.val(data.item.address_1);
                            let options = '<option value="">Select</option>';
                            $.each(data.item.representatives, function (index, item) {
                                options += `<option value="${item.id}">${item.representative_name}</option>`;
                            });
                            sourcing_executive.html(options);
                            options = '<option value="">Select</option>';
                            $.each(data.item.consignees, function (index, item) {
                                options += `<option value="${item.id}">${item.name}</option>`;
                            });
                            // ship_to.html(options);
                        }
                    }
                });
            }
        }

        const change_ship_to = (elm) => {
            let id = $(elm).val();
            let adress = $("#ship_adress");
            adress.val('');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('ship_to.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            adress.val(data.item.address);
                        }
                    }
                });
            }
        }

        const change_contract_type = (elm) => {
            let id = $(elm).val();
            let order_route = $("#order_route_id");
            order_route.html(`<option value="">Select</option>`);
            if (id > 0) {
                $.ajax({
                    url: '{{ route('contract_type.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            let options = '';
                            $.each(data.item.details, function (index, item) {
                                options += `<option value="${item.id}">${item.contract_order_route_name}</option>`;
                            });
                            order_route.append(options);
                        }
                    }
                });
            }
        }

        const change_quality = (i) => {
            let id = $("#first_quality_id_" + i).val();
            let sort_code = $("#sort_code_" + i);
            let hsn_code = $("#hsn_code_" + i);
            let buyer_sort = $("#buyer_sort_" + i);
            let weave_type_id = $("#weave_type_id_" + i);
            let selvedge_id = $("#selvedge_id_" + i);
            sort_code.val('');
            hsn_code.val('');
            buyer_sort.val('');
            weave_type_id.val('');
            selvedge_id.val('');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('sort.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            sort_code.val(data.item.sort_no);
                            hsn_code.val(data.item.hsn);
                            buyer_sort.val(data.item.details);
                            weave_type_id.val(data.item.weave);
                            selvedge_id.val(data.item.selvedge);
                        }
                    }
                });
            }
        }
        const change_agent = (elm) => {
            let id = $(elm).val();
            let agent_percent = $("#agent_percent");
            agent_percent.val('');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('agents.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            agent_percent.val(data.item.agent_percent);
                        }
                    }
                });
            }
        }

        const change_finished_quality = (i, all = '') => {
            let id = 0;
            $("#sort_code_"+i).val("");
            if(all == 'all'){
                id = 0;
            }
            else{
                id = $("#finished_quality_id_" + i).val();
            }
            let first_quality = $("#first_quality_id_" + i);
            $.ajax({
                url: '{{ route('sort.show', 0) }}',
                type: 'GET',
                data: {
                    'id': id,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.status) {
                        let options = '<option value="">Select</option>';
                        if (id > 0) {
                            $.each(data.item.greys, function (index, item) {
                                options += `<option value="${item?.sort_id}">${item?.parent_sort?.details}</option>`;
                            });
                        }
                        else if (id == '0'){
                            $.each(data.item, function (index, item) {
                                options += `<option value="${item?.id}">${item?.details}</option>`;
                            });
                        }
                        else {
                                options += ``;
                        }
                        $("#sort_code_"+i).val(data.item?.sort_no);
                        first_quality.html(options);
                    }
                }
            });
        }

        const change_fabric_type = (i) => {
            let selected = $("#fabric_type_" + i).val();
            if (selected == 'finished') {
                $("#finished_quality_" + i).show();
                $("#first_quality_id_" + i).html('<option value="">Select</option>');
            } else {
                console.log('geryyyyyyy');
                $("#finished_quality_" + i).hide();
                change_finished_quality(i, 'all');
            }
        }

        const change_packing_type = (i) => {
            let selected = $("#packing_type_" + i).val();
            if (selected == 'roll') {
                $("#fold_" + i).val('');
                $("#fold_container_" + i).hide();
            } else {
                $("#fold_container_" + i).show();
            }
        }


    </script>
@endpush

