@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'jobwork_process_contract';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} JOBWORK PROCESS CONTRACT
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
                        <div class="col-3">
                            <label>Booking Date<b class="text-danger">*</b></label>
                            <input type="date" name="booking_date" class="form-control"
                                   value="{{$item ? $item?->booking_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Process</label>
                            <select name="process_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($processes as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->process_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Group<b class="text-danger">*</b></label>
                            <select name="group_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendor_groups as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->group_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->group}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Vendor<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Contract Number<b class="text-danger">*</b></label>
                            <input type="text" name="contract_number" class="form-control" required
                                   value="{{$item ? $item?->contract_number : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Contract Date<b class="text-danger">*</b></label>
                            <input type="date" name="contract_date" class="form-control"
                                   value="{{$item ? $item?->contract_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Agent</label>
                            <select name="agent_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($agents as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->agent_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Contact Persons 1</label>
                            <select name="contact_person_1_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($contacts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->contact_person_1_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Contact Persons 2</label>
                            <select name="contact_person_2_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($contacts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->contact_person_2_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Rate Per Meter</label>
                            <input type="number" step="0.01" name="rate_per_meter" class="form-control"
                                   value="{{$item ? $item?->rate_per_meter : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Delivery Date<b class="text-danger">*</b></label>
                            <input type="date" name="delivery_date" class="form-control"
                                   value="{{$item ? $item?->delivery_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Inspection Type</label>
                            <select name="inspection_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($inspection_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->inspection_type_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Payment Terms<b class="text-danger">*</b></label>
                            <select name="payment_term_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($payment_terms as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->payment_term_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Order Mtrs<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="order_mtrs" id="order_mtrs" class="form-control" readonly
                                   value="{{$item ? $item?->order_mtrs : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Transport</label>
                            <select name="transport_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($transports as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->transport_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 5 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Delivery Location</label>
                            <select name="delivery_location_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($buyers as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->delivery_location_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Wastage<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="wastage" class="form-control"
                                   value="{{$item ? $item?->wastage : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Sort Number<b class="text-danger">*</b></label>
                            <button type="button" class="btn btn-success form-control" onclick="show_orders()">Sort
                                Number
                            </button>
                        </div>
                        <div class="col-3">
                            <label>Is Opening Contract</label>
                            <input type="checkbox" name="is_opening_contract" class="form-control"
                                   value="{{$item ? $item?->is_opening_contract : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 6 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>GST Type<b class="text-danger">*</b></label>
                            <select name="gst_type" id="gst_type" onchange="change_gst_type()" class="form-control">
                                <option value="">Select</option>
                                <option value="igst" {{ ($item?->gst_type == 'igst') ? 'selected' : '' }}>IGST</option>
                                <option value="sgst_cgst" {{ ($item?->gst_type == 'sgst_cgst') ? 'selected' : '' }}>
                                    SGST/CGST
                                </option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Terms & Conditions<b class="text-danger">*</b></label>
                            <select name="terms_condition_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($terms_conditions as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->terms_condition_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Remarks 1</label>
                            <input type="text" name="remarks_1" class="form-control"
                                   value="{{$item ? $item?->remarks_1 : '' }}"/>

                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>SORT NO.</th>
                                    <th>FINISHED QUALITY</th>
                                    <th>GREY QUALITY</th>
                                    <th>ORDER NO.</th>
                                    <th>QUANTITY</th>
                                    <th>RATE</th>
                                    <th>TAXABLE AMOUNT</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody id="detail_container">
                                @if(!empty($item))
                                    @foreach($item->details ?? array() as $index => $row)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="details[{{$index}}][id]"
                                                       value="{{ $row ? $row?->id : '' }}"/>
                                                <input type="hidden" name="details[{{$index}}][sort_id]"
                                                       value="{{ $row ? $row?->sort_id : '' }}"/>
                                                <input type="text"
                                                       name="details[{{$index}}][sort_no]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->sort_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][finished_quality]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->finished_quality : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][grey_quality]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->grey_quality : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][order_no]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->order_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="details[{{$index}}][quantity]"
                                                       class="form-control" id="quantity_{{$index}}"
                                                       onchange="change_taxable_amount({{$index}})"
                                                       value="{{ $row ? $row?->quantity : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="details[{{$index}}][rate]"
                                                       class="form-control" id="rate_{{$index}}"
                                                       onchange="change_taxable_amount({{$index}})"
                                                       value="{{ $row ? $row?->rate : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="details[{{$index}}][taxable_amount]"
                                                       class="form-control taxable_amount_"
                                                       id="taxable_amount_{{$index}}"
                                                       value="{{ $row ? $row?->taxable_amount : '' }}"/>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-sm btn-circle"
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
                    {{-- End Details --}}
                    {{-- Begin Totals --}}
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>Taxable Amount</label>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" name="taxable_amount" id="taxable_amount"
                                   class="form-control" onchange="calc_grand_total()"
                                   value="{{$item ? $item?->taxable_amount : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>GST %<b class="text-danger">*</b></label>
                        </div>
                        <div class="col-2">
                            <select name="gst_percent" id="gst_percent" class="form-control"
                                    onchange="calc_grand_total();">
                                <option value="">Select</option>
                                @foreach($gsts as $row)
                                    <option
                                        value="{{$row->val}}" {{ ($item?->gst_percent == $row->val) ? 'selected' : '' }}
                                    >{{$row->val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>IGST Amount<b class="text-danger">*</b></label>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" name="igst_amount" id="igst_amount" class="form-control"
                                   onchange="calc_grand_total();"
                                   value="{{$item ? $item?->igst_amount : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>SGST Amount<b class="text-danger">*</b></label>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" name="sgst_amount" id="sgst_amount" class="form-control"
                                   onchange="calc_grand_total();"
                                   value="{{$item ? $item?->sgst_amount : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 5 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>CGST Amount<b class="text-danger">*</b></label>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" name="cgst_amount" id="cgst_amount" class="form-control"
                                   onchange="calc_grand_total();"
                                   value="{{$item ? $item?->cgst_amount : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 6 --}}
                    <div class="form-group row">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <label>Grand Total</label>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" name="grand_total" id="grand_total" class="form-control"
                                   value="{{$item ? $item?->grand_total : '' }}"/>
                        </div>
                    </div>
                    {{-- End Totals --}}

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

    <div class="modal fade" id="search_orders_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table  table-bordered table-hover">
                        <tr class="table-active">
                            <th>SO NO.</th>
                            <th>MASTER SORT</th>
                            <th>FINISHED QUALITY</th>
                            <th>GREY QUALITY</th>
                            <th>BUYER</th>
                            <th>TOTAL QUANTITY</th>
                            <th>PLANNED QTY</th>
                            <th>BALANCE QTY</th>
                            <th>ACTION</th>
                        </tr>
                        <tbody id="search_order_tbody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="submit_search()">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        function show_orders() {
            $('#search_order_tbody').html('');
            $.ajax({
                url: '{{ route('search_orders_details')   }}',
                type: 'GET',
                data: {
                    'id': 0,
                    'get_details': true,
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status) {
                        $.each(data.item, function (i, item) {
                            let tr = `<tr>`;
                            tr += `<input type="hidden" id="modal_sort_id_${i}" value="${item.quality?.id ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_sort_no_${i}" value="${item.sort_code ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_finished_quality_${i}" value="${item.finished_quality?.details ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_grey_quality_${i}" value="${item.quality?.details ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_order_no_${i}" value="${item.sales_order?.order_no ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_quantity_${i}" value="${item.quantity ?? ''}" >`;
                            tr += `<td>${item.sales_order?.order_no ?? ''}</td>`;
                            tr += `<td>${item.sort_code ?? ''}</td>`;
                            tr += `<td>${item.finished_quality?.details ?? ''}</td>`;
                            tr += `<td>${item.quality?.details ?? ''}</td>`;
                            tr += `<td>${item.sales_order?.buyer?.name ?? ''}</td>`;
                            tr += `<td>${item.quantity ?? ''}</td>`;
                            tr += `<td>0.00</td>`;
                            tr += `<td>${item.quantity ?? ''}</td>`;
                            tr += `<td><input type="checkbox" class="order_details_checkboxs" data-i="${i}" ></td>`;
                            tr += `</tr>`;
                            $('#search_order_tbody').append(tr);
                        });
                        $("#search_orders_modal").modal('show');
                    }
                }
            })
        }

        function submit_search() {
            let checkedCheckboxes = $('.order_details_checkboxs:checked');
            let index = $("#detail_container TR").length;
            let tr = ``, order_mtrs = 0;
            checkedCheckboxes.each(function () {
                let i = $(this).data('i');
                tr = `<tr>`;
                tr += `    <input type="hidden" name="details[${index}][id]" value="">`;
                tr += `<td>`;
                tr += `    <input type="hidden" name="details[${index}][sort_id]"`;
                tr += `           value="${$('#modal_sort_id_' + i).val()}"/>`;
                tr += `    <input type="text"`;
                tr += `           name="details[${index}][sort_no]"`;
                tr += `           class="form-control"`;
                tr += `           value="${$('#modal_sort_no_' + i).val()}"/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="text"`;
                tr += `           name="details[${index}][finished_quality]"`;
                tr += `           class="form-control"`;
                tr += `           value="${$('#modal_finished_quality_' + i).val()}"/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="text"`;
                tr += `           name="details[${index}][grey_quality]"`;
                tr += `           class="form-control"`;
                tr += `           value="${$('#modal_grey_quality_' + i).val()}"/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="text"`;
                tr += `           name="details[${index}][order_no]"`;
                tr += `           class="form-control"`;
                tr += `           value="${$('#modal_order_no_' + i).val()}"/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="number"  step="0.01" `;
                tr += `           name="details[${index}][quantity]"`;
                tr += `           class="form-control" id="quantity_${index}" onchange="change_taxable_amount(${index})"`;
                tr += `           value="${$('#modal_quantity_' + i).val()}"/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="number"  step="0.01" `;
                tr += `           name="details[${index}][rate]"`;
                tr += `           class="form-control" id="rate_${index}" onchange="change_taxable_amount(${index})"`;
                tr += `           value=""/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <input type="number"  step="0.01" `;
                tr += `           name="details[${index}][taxable_amount]" step="0.01" `;
                tr += `           class="form-control taxable_amount_" id="taxable_amount_${index}" value=""/>`;
                tr += `</td>`;
                tr += `<td>`;
                tr += `    <button class="btn btn-icon btn-danger btn-sm btn-circle"`;
                tr += `            type="button"`;
                tr += `            onclick="$(this).closest('tr').remove();"><i`;
                tr += `        class="fa fa-trash"></i></button>`;
                tr += `</td>`;
                tr += `</tr>`;
                $("#detail_container").append(tr);
                order_mtrs += parseFloat($('#modal_quantity_' + i).val());
            });
            $('#order_mtrs').val(order_mtrs);
            $("#search_orders_modal").modal('hide');
        }


        const change_taxable_amount = (index) => {
            let quantity = $("#quantity_" + index).val() ?? 0;
            let rate = $("#rate_" + index).val() ?? 0;
            $("#taxable_amount_" + index).val((parseFloat(quantity) * parseFloat(rate)).toFixed(2));
            calc_total_taxable_amount();
        }

        const calc_total_taxable_amount = () => {
            let total = 0;
            $.each($(".taxable_amount_"), function (i, item) {
                total += parseFloat($(item).val());
            });
            $("#taxable_amount").val(total.toFixed(2));
            calc_grand_total();
        }

        const calc_grand_total = () => {
            let taxable_amount = parseFloat($("#taxable_amount").val());
            let gst = parseFloat($("#gst_percent").val());
            let igst = $("#igst_amount");
            let sgst = $("#sgst_amount");
            let cgst = $("#cgst_amount");
            let calc = 0;
            if ($("#gst_type").val() == 'igst') {
                calc = (taxable_amount / 100 * gst).toFixed(2);
                if(igst.val() == 0) {
                    igst.val(calc);
                }
                //sgst.val('0');
                //cgst.val('0');
            } else if ($("#gst_type").val() == 'sgst_cgst') {
                calc = (taxable_amount / 100 * gst).toFixed(2);
                //igst.val('0');
                if(sgst.val() == 0) {
                sgst.val(calc);
                }
                if(cgst.val() == 0) {
                cgst.val(calc);
                }
            } else {
                if(igst.val() == 0) {
                igst.val(calc);
                }
                if(sgst.val() == 0) {
                sgst.val(calc);
                }
                if(cgst.val() == 0) {
                cgst.val(calc);
                }
            }
            let grand_total = taxable_amount + parseFloat(igst.val()) + parseFloat(sgst.val()) + parseFloat(cgst.val());
            $("#grand_total").val(grand_total.toFixed(2));
        }

        const change_gst_type = () => {
            let gst_type = $("#gst_type").val();
            $("#gst_percent").html('');
            $.ajax({
                url: '{{ route('gst.show', 0)   }}',
                type: 'GET',
                data: {
                    'id': 0,
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status) {
                        let values = new Set();
                        let line = ``;
                        $.each(data.item, function (i, item) {
                            if (item.gst_type == '2' && gst_type == 'sgst_cgst') {
                                if (!values.has(item.sgst)) {
                                    line += `<option>${item.sgst}</option>`;
                                    values.add(item.sgst);  // Add the value to the set
                                }
                                if (!values.has(item.cgst)) {
                                    line += `<option>${item.cgst}</option>`;
                                    values.add(item.cgst);  // Add the value to the set
                                }
                            } else {
                                if (!values.has(item.igst)) {
                                    line += `<option>${item.igst}</option>`;
                                    values.add(item.igst);  // Add the value to the set
                                }
                            }
                        });
                        $('#gst_percent').append(line);
                    }
                }
            })
        }

    </script>
@endpush

