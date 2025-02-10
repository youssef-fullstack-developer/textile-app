@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/yarn_po/'.$item?->id : '/yarn_po' ;
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} YARN PURCHASE ORDER
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('yarn_po_list') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Date<b class="text-danger">*</b></label>
                            <input type="date" name="po_date" required class="form-control" autocomplete="off"
                                   value="{{$item ? $item?->po_date : old('po_date') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Vendor Group<b class="text-danger">*</b></label>
                            <select name="vendor_group_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($vendor_groups as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_group_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->group}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="col-form-label domestic_inputs" style="{{$item?->purchase_type == '2' ? 'display:none;' : ''}}">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="igst" onchange="change_igst(1)"
                                               {{ empty($item) ? 'checked' : (($item?->igst == 1) ? 'checked' : '') }} value="1"/>
                                        <span></span>
                                        IGST
                                    </label>
                                    <label class="radio radio-success">
                                        <input type="radio" name="igst" onchange="change_igst(0)"
                                               {{ empty($item) ? '' : (($item?->igst != 1) ? 'checked' : '') }} value="0"/>
                                        <span></span>
                                        CGST/SGST
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent Name</label>
                            <select name="agent_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($agents as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->agent_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Manual Po Num</label>
                            <input type="number"  step="0.01" name="manual_po_number" class="form-control" autocomplete="off"
                                   value="{{$item ? $item?->manual_po_number : old('manual_po_number') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Certification Type</label>
                            <select name="certification_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($certification_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->certification_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Po Type<b class="text-danger">*</b></label>
                            <select name="po_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($po_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->po_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>PR Num</label>
                            <select name="pr_num_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>So Num</label>
                            <select name="so_num_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($sale_orders as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->so_num_id == $row->id) ? 'selected' : '' }}>{{$row->order_no}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Payment Terms<b class="text-danger">*</b></label>
                            <select name="payment_terms_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($payment_terms as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->payment_terms_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Vendor<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Terms And Condition</label>
                            <select name="terms_conditions_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($terms_consitions as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->terms_conditions_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control" autocomplete="off"
                                   value="{{$item ? $item?->remark : old('remark') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Consignee</label>
                            <select name="consignee_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($consignees as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->consignee_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Yarn Type</label>
                            <select name="yarn_type_id" class="form-control">
                                <option value="">Select</option>
                                <option value="Warp" {{ ($item?->yarn_type_id == 'Warp') ? 'selected' : '' }}>Warp
                                </option>
                                <option value="Weft" {{ ($item?->yarn_type_id == 'Weft') ? 'selected' : '' }}>Weft
                                </option>
                                <option value="Both" {{ ($item?->yarn_type_id == 'Both') ? 'selected' : '' }}>Both
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Delivery Terms</label>
                            <select name="delivery_term_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($delivery_terms as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->delivery_term_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Purchase Type<b class="text-danger">*</b></label>
                            <select name="purchase_type_id" id="purchase_type_id" class="form-control"
                                    onchange="change_purchase_type()" required>
                                @foreach($purchase_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->purchase_type_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Begin Order Details --}}
                    <h2 class="text-center">Order Details</h2>
                    <div id="details_container">
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="col-12 text-right">
                                    <button
                                        class="btn btn-icon btn-success btn-sm btn-circle mr-2 btn_add_order_details"
                                        type="button" onclick="add_detail_row()"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @php($i = 0)
                        @while( (empty($item) &&  $i == 0) || (count($item?->details ?? []) > $i ) )
                            @php($detail = $item ? $item->details[$i] : NULL)
                            <div class="form-group border p-3 border-dark border-2 tr">
                                <input type="hidden" name="order_details[{{$i}}][yarn_po_detail_id]"
                                       value="{{$detail ? $detail?->id : '' }}">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle btn_delete_row"
                                                    type="button"
                                                    onclick="$(this).closest('.tr').remove();"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Item Type<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" disabled
                                               value="Yarn"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Count<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][count_id]" class="form-control"
                                                onchange="change_count({{$i}})" id="count_id_{{$i}}" required>
                                            <option value="">Select</option>
                                            @foreach($counts as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->count_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Cones Per Bag / Box</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][cones_per_bag]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->cones_per_bag : old('cones_per_bag') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Kg Per Bag / Box<b class="text-danger">*</b></label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][kg_per_bag]" required
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->kg_per_bag : old('kg_per_bag') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Cone Weight</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][cone_weight]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->cone_weight : old('cone_weight') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Mill Name<b class="text-danger">*</b></label>
                                        <select name="order_details[{{$i}}][mill_name_id]" required
                                                class="form-control">
                                            <option value="">Select</option>
                                            @foreach($mill_names as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->mill_name_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>No Of Bags / Box Required</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][no_of_bags]"
                                               class="form-control"
                                               value="{{$detail ? $detail?->no_of_bags : old('no_of_bags') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <div class="col-8">
                                                <label>Quantity<b class="text-danger">*</b></label>
                                                <input type="number"  step="0.01" name="order_details[{{$i}}][quantity]" required
                                                       class="form-control"
                                                       id="quantity_{{$i}}" onchange="change_basic_amount({{$i}})"
                                                       value="{{$detail ? $detail?->quantity : old('quantity') }}"/>
                                            </div>
                                            <div class="col-4">
                                                <label>Unit</label>
                                                <input type="text" class="form-control" disabled
                                                       id="unit_{{$i}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label>Mill Price<b class="text-danger">*</b></label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][mill_price]" required
                                               class="form-control" autocomplete="off"
                                               id="mill_price_{{$i}}"
                                               onchange="change_basic_amount({{$i}}); change_final_price({{$i}}); "
                                               value="{{$detail ? $detail?->mill_price : old('mill_price') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Basic Amount</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][basic_amount]"
                                               class="form-control"
                                               id="basic_amount_{{$i}}" onchange="change_gsts({{$i}})"
                                               value="{{$detail ? $detail?->basic_amount : old('basic_amount') }}"/>
                                    </div>
                                    <div class="col-4 igst_container">
                                        <div
                                            class="form-group row domestic_inputs @if(!empty($item->purchase_type_id) && $item->purchase_type?->name == 'Import') display:none; @endif">
                                            <div class="col-6">
                                                <label>IGST %<b class="text-danger">*</b></label>
                                                <select name="order_details[{{$i}}][igst_val]" class="form-control"
                                                        onchange="change_gsts({{$i}})" id="igst_val_{{$i}}">
                                                    <option value="">Select</option>
                                                    @foreach($igst as $row)
                                                        <option
                                                            value="{{$row->val}}" {{ ($detail?->igst_val == $row->val) ? 'selected' : '' }}>{{$row->val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>IGST Amount</label>
                                                <input type="number"  step="0.01" class="form-control" readonly
                                                       name="order_details[{{$i}}][igst_amount]" id="igst_amount_{{$i}}"
                                                       value="{{$detail ? $detail?->igst_amount : '' }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row import_inputs "
                                             style="@if(empty($item->purchase_type_id) || $item->purchase_type?->name == 'Domestic') display:none; @endif">
                                            <div class="col-6">
                                                <label>INR conversion value<b class="text-danger">*</b></label>
                                                <input type="number"  step="0.01" class="form-control"
                                                       name="order_details[{{$i}}][inr_conversion_value]"
                                                       id="inr_conversion_value_{{$i}}"
                                                       value="{{$detail ? $detail?->inr_conversion_value : '' }}"/>
                                            </div>
                                            <div class="col-6">
                                                <label>Currency<b class="text-danger">*</b></label>
                                                <select name="order_details[{{$i}}][currency]" class="form-control"
                                                        onchange="change_gsts({{$i}})" id="currency_{{$i}}">
                                                    <option value="">Select</option>
                                                    <option
                                                        value="RUPEES" {{ ($detail?->curreny == 'RUPEES') ? 'selected' : '' }}>
                                                        RUPEES
                                                    </option>
                                                    <option
                                                        value="USD" {{ ($detail?->curreny == 'USD') ? 'selected' : '' }}>
                                                        USD
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 cgst_container" style="display: none;">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label>CGST %<b class="text-danger">*</b></label>
                                                <select name="order_details[{{$i}}][cgst_val]" class="form-control"
                                                        onchange="change_gsts({{$i}})" id="cgst_val_{{$i}}">
                                                    <option value="">Select</option>
                                                    @foreach($cgst as $row)
                                                        <option
                                                            value="{{$row->val}}" {{ ($detail?->cgst_val == $row->val) ? 'selected' : '' }}>{{$row->val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6"><label>CGST Amount</label>
                                                <input type="number"  step="0.01" class="form-control" readonly
                                                       name="order_details[{{$i}}][cgst_amount]" id="cgst_amount_{{$i}}"
                                                       value="{{$detail ? $detail?->cgst_amount : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 sgst_container" style="display: none;">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label>SGST %<b class="text-danger">*</b></label>
                                                <select name="order_details[{{$i}}][sgst_val]" class="form-control"
                                                        onchange="change_gsts({{$i}})" id="sgst_val_{{$i}}">
                                                    <option value="">Select</option>
                                                    @foreach($sgst as $row)
                                                        <option
                                                            value="{{$row->val}}" {{ ($detail?->sgst_val == $row->val) ? 'selected' : '' }}>{{$row->val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6"><label>SGST Amount</label>
                                                <input type="number"  step="0.01" class="form-control" readonly
                                                       name="order_details[{{$i}}][sgst_amount]" id="sgst_amount_{{$i}}"
                                                       value="{{$detail ? $detail?->sgst_amount : '' }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Total Amount</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][total_amount]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->total_amount : old('total_amount') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Provisional Freight</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][provisional_freight]"
                                               class="form-control" autocomplete="off"
                                               id="provisional_freight_{{$i}}" onchange="change_final_price({{$i}})"
                                               value="{{$detail ? $detail?->provisional_freight : '' }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Mill GST Price</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][mill_gst_price]"
                                               class="form-control" autocomplete="off"
                                               id="mill_gst_price_{{$i}}" onchange="change_final_price({{$i}})"
                                               value="{{$detail ? $detail?->mill_gst_price : old('mill_gst_price') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Final Price</label>
                                        <input type="number"  step="0.01" name="order_details[{{$i}}][final_price]"
                                               class="form-control" autocomplete="off"
                                               id="final_price_{{$i}}"
                                               value="{{$detail ? $detail?->final_price : old('final_price') }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Delivery Date</label>
                                        <input type="date" name="order_details[{{$i}}][delivery_date]"
                                               class="form-control" autocomplete="off"
                                               value="{{$detail ? $detail?->delivery_date : old('delivery_date') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>CSP</label>
                                        <select name="order_details[{{$i}}][csp_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($csp as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->csp_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Hairiness Index H</label>
                                        <select name="order_details[{{$i}}][hairiness_index_h_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($hairiness as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->hairiness_index_h_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Count CV</label>
                                        <select name="order_details[{{$i}}][count_cv_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($count_cvs as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->count_cv_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Strength CV</label>
                                        <select name="order_details[{{$i}}][strenght_cv_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($strenght_cvs as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->strenght_cv_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @php($i++)
                        @endwhile
                    </div>
                    {{-- End Order Details --}}

                </div>
                <div class="card-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">
                        SAVE
                    </button>
                    <a href="{{ route('yarn_po_list') }}" class="btn btn-warning font-weight-bolder w-135px">
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
        const add_detail_row = () => {
            let index = $(".btn_delete_row").length;
            let purchase_type = $('#purchase_type_id').find('option:selected').text();
            let html = '';
            html += `<div class="form-group border p-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="order_details[${index}][yarn_po_detail_id]" value="">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-12">`;
            html += `                <div class="col-12 text-right">`;
            html += `                    <button class="btn btn-icon btn-danger btn-sm btn-circle btn_delete_row"`;
            html += `                            type="button" onclick="$(this).closest('.tr').remove();"><i`;
            html += `                        class="fa fa-trash"></i></button>`;
            html += `                </div>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Item Type<b class="text-danger">*</b></label>`;
            html += `                <input type="text" class="form-control" disabled`;
            html += `                       value="Yarn"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Count<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${index}][count_id]" class="form-control" required `;
            html += `                onchange="change_count(${index})" id="count_id_${index}" >`;
            html += `                    <option value="">Select</option>`;
            @foreach($counts as $row)
                html += `                    <option`;
            html += `                        value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Cones Per Bag / Box</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][cones_per_bag]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Kg Per Bag / Box<b class="text-danger">*</b></label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][kg_per_bag]" required`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Cone Weight</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][cone_weight]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Mill Name<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${index}][mill_name_id]" required`;
            html += `                        class="form-control">`;
            html += `                    <option value="">Select</option>`;
            @foreach($mill_names as $row)
                html += `                    <option`;
            html += `                        value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>No Of Bags / Box Required</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][no_of_bags]"`;
            html += `                       class="form-control"/>`;
            html += `            </div>`;
            html += `            <div class="form-group row">`;
            html += `                <div class="col-8">`;
            html += `                    <label>Quantity<b class="text-danger">*</b></label>`;
            html += `                    <input type="number"  step="0.01" name="order_details[${index}][quantity]" required`;
            html += `                           class="form-control"`;
            html += `                           id="quantity_${index}" onchange="change_basic_amount(${index})"/>`;
            html += `                </div>`;
            html += `                <div class="col-4">`;
            html += `                    <label>Unit</label>`;
            html += `                    <input type="text" class="form-control" disabled id="unit_${index}"/>`;
            html += `                </div>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Mill Price<b class="text-danger">*</b></label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][mill_price]" required`;
            html += `                id="mill_price_${index}" onchange="change_basic_amount(${index}); change_final_price(${index}) "`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Basic Amount</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][basic_amount]"`;
            html += `                       id="basic_amount_${index}" onchange="change_gsts(${index})"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `<div class="col-4 igst_container">`;
            html += `    <div class="form-group row domestic_inputs" style="${purchase_type == 'Import' ? 'display:none;' : ''}">`;
            html += `        <div class="col-6 ">`;
            html += `            <label>IGST %<b class="text-danger">*</b></label>`;
            html += `            <select name="order_details[${index}][igst_val]" class="form-control"`;
            html += `                    onchange="change_gsts(${index})" id="igst_val_${index}">`;
            html += `                <option value="">Select</option>`;
            @foreach($igst as $row)
                html += `                <option value="{{$row->val}}" >{{$row->val}}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        <div class="col-6"><label>IGST Amount</label>`;
            html += `            <input type="number"  step="0.01" class="form-control" readonly`;
            html += `                   name="order_details[${index}][igst_amount]" id="igst_amount_${index}" />`;
            html += `        </div>`;
            html += `    </div>`;

            html += `    <div class="form-group row import_inputs " style="${purchase_type == 'Import' ? '' : 'display:none;'}">`;
            html += `        <div class="col-6">`;
            html += `            <label>INR conversion value<b class="text-danger">*</b></label>`;
            html += `           <input type="number"  step="0.01" class="form-control"`;
            html += `                  name="order_details[${index}][inr_conversion_value]"`;
            html += `                  id="inr_conversion_value_${index}" />`;
            html += `        </div>`;
            html += `        <div class="col-6">`;
            html += `            <label>Currency<b class="text-danger">*</b></label>`;
            html += `           <select name="order_details[${index}][currency]" class="form-control"`;
            html += `                   onchange="change_gsts(${index})" id="currency_${index}">`;
            html += `                <option value="">Select</option>`;
            html += `                <option value="RUPEES" >RUPEES</option>`;
            html += `                <option value="USD" >USD</option>`;
            html += `            </select>`;
            html += `        </div>`;
            html += `    </div>`;

            html += `</div>`;
            html += `<div class="col-4 cgst_container" style="display: none;">`;
            html += `    <div class="form-group row">`;
            html += `        <div class="col-6">`;
            html += `            <label>CGST %<b class="text-danger">*</b></label>`;
            html += `            <select name="order_details[${index}][cgst_val]" class="form-control"`;
            html += `                    onchange="change_gsts(${index})" id="cgst_val_${index}">`;
            html += `                <option value="">Select</option>`;
            @foreach($cgst as $row)
                html += `                <option value="{{$row->val}}" >{{$row->val}}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        <div class="col-6"><label>CGST Amount</label>`;
            html += `            <input type="number"  step="0.01" class="form-control" readonly`;
            html += `                   name="order_details[${index}][cgst_amount]" id="cgst_amount_${index}" />`;
            html += `        </div>`;
            html += `    </div>`;
            html += `</div>`;
            html += `    <div class="col-4 sgst_container" style="display: none;">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-6">`;
            html += `                <label>SGST %<b class="text-danger">*</b></label>`;
            html += `                <select name="order_details[${index}][sgst_val]" class="form-control"`;
            html += `                        onchange="change_gsts(${index})" id="sgst_val_${index}">`;
            html += `                    <option value="">Select</option>`;
            @foreach($sgst as $row)
                html += `                    <option value="{{$row->val}}">{{$row->val}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-6"><label>SGST Amount</label>`;
            html += `                <input type="number"  step="0.01" class="form-control" readonly`;
            html += `                       name="order_details[${index}][sgst_amount]" id="sgst_amount_${index}" />`;
            html += `            </div>`;
            html += `        </div>`;
            html += `    </div>`;
            html += `</div>`;
            html += `    <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Total Amount</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][total_amount]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Provisional Freight</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][provisional_freight]"`;
            html += `                id="provisional_freight_${index}" onchange="change_final_price(${index})"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Mill GST Price</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][mill_gst_price]"`;
            html += `                id="mill_gst_price_${index}" onchange="change_final_price(${index})"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Final Price</label>`;
            html += `                <input type="number"  step="0.01" name="order_details[${index}][final_price]"`;
            html += `                id="final_price_${index}"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Delivery Date</label>`;
            html += `                <input type="date" name="order_details[${index}][delivery_date]"`;
            html += `                       class="form-control" autocomplete="off"/>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>CSP</label>`;
            html += `                <select name="order_details[${index}][csp_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            @foreach($csp as $row)
                html += `                           <option value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Hairiness Index H</label>`;
            html += `                <select name="order_details[${index}][hairiness_index_h_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            @foreach($hairiness as $row)
                html += `                           <option value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `            <div class="col-4">`;
            html += `                <label>Count CV</label>`;
            html += `                <select name="order_details[${index}][count_cv_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            @foreach($count_cvs as $row)
                html += `                           <option value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-4">`;
            html += `                <label>Strength CV</label>`;
            html += `                <select name="order_details[${index}][strenght_cv_id]" class="form-control">`;
            html += `                    <option value="">Select</option>`;
            @foreach($strenght_cvs as $row)
                html += `                           <option value="{{$row->id}}">{{$row->name}}</option>`;
            @endforeach
                html += `                </select>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `</div>`;
            $('#details_container').append(html);

        };
        const change_igst = (igst) => {
            if (igst == 1) {
                $(".igst_container").show();
                $(".cgst_container").hide();
                $(".sgst_container").hide();
            } else {
                $(".igst_container").hide();
                $(".cgst_container").show();
                $(".sgst_container").show();
            }
        }
        const change_gsts = (i) => {
            let basic_amount = $("#basic_amount_" + i).val() ?? 0;
            let igst_val = $("#igst_val_" + i).val() ?? 0;
            let cgst_val = $("#cgst_val_" + i).val() ?? 0;
            let sgst_val = $("#sgst_val_" + i).val() ?? 0;

            $("#igst_amount_" + i).val((parseFloat(basic_amount) * parseFloat(igst_val) / 100) ?? 0);
            $("#cgst_amount_" + i).val((parseFloat(basic_amount) * parseFloat(cgst_val) / 100) ?? 0);
            $("#sgst_amount_" + i).val((parseFloat(basic_amount) * parseFloat(sgst_val) / 100) ?? 0);
        }
        const change_basic_amount = (i) => {
            let mill_price = $("#mill_price_" + i).val() ?? 0;
            let quantity = $("#quantity_" + i).val() ?? 0;

            $("#basic_amount_" + i).val((parseFloat(mill_price) * parseFloat(quantity))).change();
        }

        const change_final_price = (i) => {
            let mill_price = $("#mill_price_" + i).val() ?? 0;
            let mill_gst_price = $("#mill_gst_price_" + i).val() ?? 0;
            let provisional_freight = $("#provisional_freight_" + i).val() ?? 0;

            $("#final_price_" + i).val((parseFloat(mill_price) + parseFloat(mill_gst_price) + parseFloat(provisional_freight)));
        }

        const change_purchase_type = () => {
            let text = $('#purchase_type_id').find('option:selected').text();
            if (text == 'Import') {
                $(".domestic_inputs").hide();
                $(".import_inputs").show();
                $(".igst_container").show();
                $(".cgst_container").hide();
                $(".sgst_container").hide();


            } else {
                $(".domestic_inputs").show();
                $(".import_inputs").hide();
                $(".igst_container").show();
                $(".cgst_container").hide();
                $(".sgst_container").hide();
            }
        }

        const change_count = (i) => {
            let id = $('#count_id_' + i).val();
            let unit = $("#unit_" + i);
            let igst = $("#igst_val_" + i);
            let sgst = $("#cgst_val_" + i);
            let cgst = $("#sgst_val_" + i);
            unit.val('');
            igst.val('');
            sgst.val('');
            cgst.val('');
            console.log((id));
            if (id > 0) {
                $.ajax({
                    url: '{{ route('yarn.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.item);
                        if (data.status) {
                            unit.val(data.item.units?.name ?? '');
                            igst.val(data.item.igst);
                            sgst.val(data.item.sgst);
                            cgst.val(data.item.cgst);
                            change_gsts(i);
                        }
                    }
                });
            }
        }


    </script>
@endpush

