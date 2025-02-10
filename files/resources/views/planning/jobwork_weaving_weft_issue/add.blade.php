@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? route('jobwork_weaving_weft_issue.update', $item?->id) : route('jobwork_weaving_weft_issue.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            JOBWORK CONTRACT WEFT ISSUE
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('jobwork_weaving_weft_issue.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>JobWork Number<b class="text-danger">*</b></label>
                            <select name="jobwork_id" onchange="jobwork_change(this);"
                                    class="form-control">
                                <option value="">Select</option>
                                @foreach ($jobworks as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->jobwork_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->contract_number  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Quality<b class="text-danger">*</b></label>
                            <input type="text" id="quality" class="form-control" readonly
                                   value="{{ $item ? $item?->jobWork?->sort?->sort_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Issue Date<b class="text-danger">*</b></label>
                            <input type="date" name="issue_date" class="form-control"
                                   value="{{ $item ? $item?->issue_date : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Sort Number<b class="text-danger">*</b></label>
                            <input type="text" id="sort_number" class="form-control" readonly
                                   value="{{ $item ? $item?->jobWork?->sort?->sort_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Vendor Group<b class="text-danger">*</b></label>
                            <input type="text" id="vendor_group" class="form-control" readonly
                                   value="{{ $item ? $item?->jobWork?->vendor?->name : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Gate Pass No<b class="text-danger">*</b></label>
                            <input type="text" name="gate_pass_no" id="gate_pass_no" class="form-control"
                                   value="{{ $item ? $item?->gate_pass_no : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Receiving Person</label>
                            <input type="text" name="receiving_person" class="form-control"
                                   value="{{ $item ? $item?->receiving_person : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_number" class="form-control"
                                   value="{{ $item ? $item?->vehicle_number : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>DC Number</label>
                            <input type="number" name="dc_number" class="form-control"
                                   value="{{ $item ? $item?->dc_number : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Transport</label>
                            <select name="transport_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($transports as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->transport_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Vendor<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($vendors as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->vendor_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>SL NO</th>
                                    <th>QUALITY</th>
                                    <th>BEAM METER</th>
                                    <th>TOTAL QUANTITY</th>
                                    <th>ISSUED QUANTITY</th>
                                    <th>CONVERTION VALUE</th>
                                    <th>TOTAL QUANTITY</th>
                                </tr>
                                </thead>
                                <tbody id="jobwork_detail">
                                @if(!empty($item?->jobWork))
                                    <tr>
                                        <td> 1 </td>
                                        <td>
                                            {{ $item?->jobWork?->sort?->sort_no }} {{ $item?->jobWork?->sort?->details }}
                                        </td>
                                        <td>
                                            {{-- BEAM METER (From beam outward sum meters) --}}
                                            @php($meteres = 0)
                                            @foreach($item?->jobWork?->beam_outward_details ?? array() as $row)
                                                @php($meteres += $row->meteres)
                                            @endforeach
                                            {{$meteres}}
                                        </td>
                                        <td>
                                            {{-- TOTAL QUANTITY --}}
                                        </td>
                                        <td>
                                            {{-- ISSUED QUANTITY --}}
                                        </td>
                                        <td>
                                            {{-- CONVERTION VALUE --}}
                                        </td>
                                        <td>
                                            {{-- TOTAL QUANTITY --}}
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--Details--}}
                    <h2>Weft Yarn Issue Details</h2>
                    <div class="row mb-4">
                        <button type="button" class="btn btn-success" onclick="show_orders()">YARN ISSUE</button>
                    </div>
                    <input type="hidden" name="order_id">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <tr class="table-primary">
                                <th>ACTUAL COUNT</th>
                                <th>LOCATION</th>
                                <th>CONE TIP COLOR</th>
                                <th>LOT NO.</th>
                                <th>ITEM TYPE</th>
                                <th>ITEM</th>
                                <th>MILL</th>
                                <th>STOCK RECEIPT ID</th>
                                <th>AVAILABLE QUANTITY</th>
                                <th>AVAILABLE BAGS</th>
                                <th>NO OF BAGS ISSUING</th>
                                <th>KGS PER BAG</th>
                                <th>CONES PER BAG</th>
                                <th>ISSUED CONES</th>
                                <th>ISSUING QUANTITY</th>
                                <th>CONVERTION VALUE</th>
                                <th>ACTION</th>
                            </tr>
                            <tbody id="details_table">
                            @if(!empty($item?->details))
                                @foreach($item?->details as $index => $row)
                                    <tr>
                                        <input type="hidden" name="details[{{$index}}][id]" value="{{$row->id}}">
                                        <td>
                                            <select name="details[{{$index}}][actual_count_id]" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($yarns as $one)
                                                    <option
                                                        value="{{ $one->id }}" {{ ($row?->actual_count_id == $one->id) ? 'selected' : '' }}
                                                    >{{ $one->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="details[{{$index}}][location]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->location : '' }}" readonly/></td>
                                        <td><input type="text" name="details[{{$index}}][cone_tip_color]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->cone_tip_color : '' }}" readonly/></td>
                                        <td><input type="text" name="details[{{$index}}][lot_no]" class="form-control"
                                                   value="{{ $row ? $row?->lot_no : '' }}" readonly/></td>
                                        <td><input type="text" name="details[{{$index}}][item_type]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->item_type : '' }}" readonly/></td>
                                        <td><input type="text" name="details[{{$index}}][item]" class="form-control"
                                                   value="{{ $row ? $row?->item : '' }}" readonly/></td>
                                        <td><input type="text" name="details[{{$index}}][mill]" class="form-control"
                                                   value="{{ $row ? $row?->mill : '' }}" readonly/></td>
                                        <td><input type="number" name="details[{{$index}}][stock_receipt_id]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->stock_receipt_id : '' }}" readonly/></td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][available_quantity]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->available_quantity : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][available_bags]"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->available_bags : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][no_of_bags_issuing]"
                                                   id="no_of_bags_issuing_{{$index}}"
                                                   onchange="change_issued_cones({{$index}}); change_issuing_quantity({{$index}})"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->no_of_bags_issuing : '' }}"/>

                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][kgs_per_bag]"
                                                   id="kgs_per_bag_{{$index}}"
                                                   onchange="change_issuing_quantity({{$index}})"
                                                   class="form-control" value="{{ $row ? $row?->kgs_per_bag : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][cones_per_bag]"
                                                   id="cones_per_bag_{{$index}}"
                                                   onchange="change_issued_cones({{$index}})"
                                                   class="form-control" value="{{ $row ? $row?->cones_per_bag : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][issued_cones]"
                                                   id="issued_cones_{{$index}}"
                                                   class="form-control" value="{{ $row ? $row?->issued_cones : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][issuing_quantity]"
                                                   id="issuing_quantity_{{$index}}"
                                                   onchange="change_issuing_quantity({{$index}})"
                                                   class="form-control"
                                                   value="{{ $row ? $row?->issuing_quantity : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="details[{{$index}}][convertion_value]"
                                                   class="form-control" id="convertion_value_{{$index}}"
                                                   value="{{ $row ? $row?->convertion_value : '' }}" readonly/>
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                    onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">
                                                </i></button></td>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route('jobwork_weaving_weft_issue.index') }}"
                           class="btn btn-warning font-weight-bolder w-135px">
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
                                <th>STOCK TYPE</th>
                                <th>CONE TIP COLOR</th>
                                <th>LOT NO.</th>
                                <th>INVOICE NO.</th>
                                <th>ITEM</th>
                                <th>MILL</th>
                                <th>STOCK RECEIPT</th>
                                <th>INWARD DATE</th>
                                <th>AVAILABLE QUANTITY</th>
                                <th>AVAILABLE BAGS</th>
                                <th>GODOWN LOCATION</th>
                                <th>BAG NO</th>
                                <th></th>
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
                $(document).ready(function () {

                });

                const jobwork_change = (elm) => {

                    $('#quality').val('');
                    $('#sort_number').val('');
                    $('#vendor_group').val('');
                    $('#gate_pass_no').val();
                    $('#jobwork_detail').html('');
                    $.ajax({
                        type: 'GET',
                        url: '{{route('jobwork_get')}}',
                        data: {'id': $(elm).val()},
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status) {
                                let item = data.item;
                                console.log(item);
                                $('#quality').val(item?.sort?.sort_no);
                                $('#sort_number').val(item?.sort?.sort_no);
                                $('#vendor_group').val(item?.vendor?.group);
                                $('#gate_pass_no').val();
                                let tr = ''
                                let meteres = 0;
                                $.each(item.beam_outward_details, function (index, row) {
                                    meteres += row.meteres;
                                });
                                tr += `<tr>`;
                                tr += `<td> 1 </td>`;
                                tr += `<td> ${item.sort?.sort_no} ${item.sort?.details} </td>`;
                                tr += `<td> ${meteres} </td>`;
                                tr += `<td> </td>`;
                                tr += `<td> </td>`;
                                tr += `<td> </td>`;
                                tr += `<td> </td>`;
                                tr += `</tr>`;
                                $('#jobwork_detail').append(tr);
                            }
                        },
                        error: function (data) {
                            // alert(data)
                        }
                    })
                };

                const deleteRow = (val) => {
                    $(val).closest('tr').remove();
                }

                function show_orders() {
                    // $('#search_order_tbody').html('');
                    $.ajax({
                        url: '{{ route('yarn_inward.show', 0)   }}',
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
                                    let lots = '';
                                    $.each(item.lots, function (index, val) {
                                        lots += `${val.lot_no}, `;
                                    });
                                    tr += `<input type="hidden" id="modal_count_id_${i}" value="${item.yarn?.id ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_location_${i}" value="${item.yarn_inward?.location?.name ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_cone_tip_color_${i}" value="-" >`;
                                    tr += `<input type="hidden" id="modal_lots_${i}" value="${lots ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_item_${i}" value="${item.yarn?.name ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_mill_${i}" value="${item.mill?.name ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_receipt_number_${i}" value="${item.yarn_inward?.receipt_number ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_total_kgs_${i}" value="${item.total_kgs ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_total_no_of_bags_${i}" value="${item.total_no_of_bags ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_kgs_per_bag_${i}" value="${item.kgs_per_bag ?? ''}" >`;
                                    tr += `<input type="hidden" id="modal_cones_per_bag_${i}" value="${item.cones_per_bag ?? ''}" >`;
                                    tr += `<td>-</td>`;
                                    tr += `<td>-</td>`;
                                    tr += `<td>`;
                                    tr += lots;
                                    tr += `</td>`;
                                    tr += `<td>-</td>`;
                                    tr += `<td>${item.yarn?.name ?? ''}</td>`;
                                    tr += `<td>${item.mill?.name ?? ''}</td>`;
                                    tr += `<td>${item.yarn_inward?.receipt_number ?? ''}</td>`;
                                    tr += `<td>${item.yarn_inward?.date ?? ''}</td>`;
                                    tr += `<td>${item.total_kgs ?? ''}</td>`;
                                    tr += `<td>${item.total_no_of_bags ?? ''}</td>`;
                                    tr += `<td>${item.yarn_inward?.location?.name ?? ''}</td>`;
                                    tr += `<td>-</td>`;
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
                    $("#details_table").html('');
                    let index = $("#details_table TR").length;
                    let tr = ``;
                    checkedCheckboxes.each(function () {
                        let i = $(this).data('i');
                        tr = `<tr>`;
                        tr += `    <input type="hidden" name="details[${index}][id]" value="">`;
                        tr += `        <td>`;
                        tr += `            <select name="details[${index}][actual_count_id]" class="form-control">`;
                        tr += `                <option value="">Select</option>`;
                        @foreach ($yarns as $one)
                            tr += `                <option`;
                        tr += `                    value="{{ $one->id }}" `;
                        tr += $("#modal_count_id_" + i).val() == "{{ $one->id }}" ? "selected" : "";
                        tr += `                >{{ $one->name }}</option>`;
                        @endforeach
                            tr += `            </select>`;
                        tr += `        </td>`;
                        tr += `        <td><input type="text" name="details[${index}][location]"`;
                        tr += `                   class="form-control"`;
                        tr += `                   value="${$("#modal_location_" + i).val()}" readonly/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][cone_tip_color]"`;
                        tr += `                   class="form-control"`;
                        tr += `                   value="${$("#modal_cone_tip_color_" + i).val()}" readonly/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][lot_no]" class="form-control"`;
                        tr += `                   value="${$("#modal_lots_" + i).val()}"/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][item_type]"`;
                        tr += `                   class="form-control" readonly/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][item]" class="form-control"`;
                        tr += `                   value="${$("#modal_item_" + i).val()}" readonly/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][mill]" class="form-control"`;
                        tr += `                   value="${$("#modal_mill_" + i).val()}" readonly/></td>`;
                        tr += `        <td><input type="text" name="details[${index}][stock_receipt_id]"`;
                        tr += `                   class="form-control"`;
                        tr += `                   value="${$("#modal_receipt_number_" + i).val()}" readonly/></td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][available_quantity]"`;
                        tr += `                   class="form-control"`;
                        tr += `                   value="${$("#modal_total_kgs_" + i).val()}"/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][available_bags]"`;
                        tr += `                   class="form-control"`;
                        tr += `                   value="${$("#modal_total_no_of_bags_" + i).val()}"/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][no_of_bags_issuing]"`;
                        tr += `                   id="no_of_bags_issuing_${index}"`;
                        tr += `                   onchange="change_issued_cones(${index}); change_issuing_quantity(${index})"`;
                        tr += `                   class="form-control" value=""/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][kgs_per_bag]"`;
                        tr += `                   id="kgs_per_bag_${index}" onchange="change_issuing_quantity(${index})"`;
                        tr += `                   class="form-control" value="${$("#modal_kgs_per_bag_" + i).val()}"/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][cones_per_bag]"`;
                        tr += `                   id="cones_per_bag_${index}" onchange="change_issued_cones(${index})"`;
                        tr += `                   class="form-control" value="${$("#modal_cones_per_bag_" + i).val()}"/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][issued_cones]"`;
                        tr += `                   id="issued_cones_${index}"`;
                        tr += `                   class="form-control" value=""/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][issuing_quantity]"`;
                        tr += `                   id="issuing_quantity_${index}" onchange="change_issuing_quantity(${index})"`;
                        tr += `                   class="form-control" value=""/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" name="details[${index}][convertion_value]"`;
                        tr += `                   class="form-control" id="convertion_value_${index}" readonly/>`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                        tr += `        onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">`;
                        tr += `        </i></button></td>`;
                        tr += `        </td>`;
                        tr += `</tr>`;
                        $("#details_table").append(tr);
                        $("#search_orders_modal").modal('hide');
                    });
                }
                const change_issuing_quantity = (i) => {
                    let no_of_bags_issuing = $("#no_of_bags_issuing_" + i).val();
                    let kgs_per_bag = $("#kgs_per_bag_" + i).val();
                    let value = (parseFloat(no_of_bags_issuing) * parseFloat(kgs_per_bag)) ?? 0;
                    $("#issuing_quantity_" + i).val(value);
                    $("#convertion_value_" + i).val(value);
                }
            </script>

    @endpush
