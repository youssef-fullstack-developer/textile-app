@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
//        $action = $item?->id > 0 ? '/jobwork_weaving_contract/'.$item?->id : '/jobwork_weaving_contract' ;
        $route = 'jobwork_weaving_contract';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : route($route.'.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    {{--    @csrf--}}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            JOBWORK WEAVING CONTRACT
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('jobwork_weaving_contract.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Contract Type<b class="text-danger">*</b></label>
                            <select name="contract_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($contract_types as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->contract_type_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Vendor Group<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($vendors as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->vendor_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->group }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Contract No<b class="text-danger">*</b></label>
                            <input type="text" name="contract_no" class="form-control" autocomplete="off" readonly
                                   placeholder="" value="{{ $item ? $item?->contract_no : $last_no }}" required/>
                        </div>
                        <div class="col-3">
                            <label>Contract Year<b class="text-danger">*</b></label>
                            <input type="text" name="contract_year" class="form-control" autocomplete="off" readonly
                                   value="{{ $item ? $item?->contract_year : $year }}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Contract Number<b class="text-danger">*</b></label>
                            <input type="text" name="contract_number" class="form-control" autocomplete="off" readonly
                                   placeholder=""
                                   value="{{ $item ? $item?->contract_number : 'JWC/'.$year.'/'.$last_no }}" required/>
                        </div>
                        <div class="col-3">
                            <label>Contract Date<b class="text-danger">*</b></label>
                            <input type="date" name="contract_date" class="form-control" autocomplete="off"
                                   placeholder="" value="{{ $item ? $item?->contract_date : old('contract_date') }}"
                                   required/>
                        </div>
                        <div class="col-3">
                            <label>Sort Number<b class="text-danger">*</b></label>
                            <select name="sort_id" class="form-control" id="sort_id" onchange="change_quality();"
                                    required>
                                <option value="">Select</option>
                                @foreach ($sorts as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->sort_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->sort_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Pick rate<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="pick_rate" class="form-control" autocomplete="off"
                                   placeholder="" value="{{ $item ? $item?->pick_rate : old('pick_rate') }}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Merchandiser<b class="text-danger">*</b></label>
                            <select name="merchandiser_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($employees as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->merchandiser_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Delivery Date<b class="text-danger">*</b></label>
                            <input type="date" name="delivery_date" class="form-control" autocomplete="off"
                                   placeholder="" value="{{ $item ? $item?->delivery_date : old('delivery_date') }}"
                                   required/>
                        </div>
                        <div class="col-3">
                            <label>Inspection Type<b class="text-danger">*</b></label>
                            <select name="inspection_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($inspection_types as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->inspection_type_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Payment Terms<b class="text-danger">*</b></label>
                            <select name="payment_term_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($payment_terms as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->payment_term_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Wastage<b class="text-danger">*</b></label>
                            <input type="text" name="wastage" class="form-control" autocomplete="off"
                                   placeholder="" value="{{ $item ? $item?->wastage : old('wastage') }}" required/>
                        </div>
                        <div class="col-3">
                            <label>Packing Type<b class="text-danger">*</b></label>
                            <select name="packing_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($packing_types as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->packing_type_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Production Mtrs<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="production_mtrs" class="form-control"
                                   autocomplete="off"
                                   placeholder="" value="{{ $item ? $item?->production_mtrs : old('production_mtrs') }}"
                                   required/>
                        </div>
                    </div>

                    {{--Details--}}
                    <h2>Details</h2>
                    <div class="row mb-4">
                        <button type="button" class="btn btn-success" onclick="show_orders()">Order Details</button>
                    </div>
                    <input type="hidden" name="order_id">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <tr class="table-primary">
                                <th>ORDER NUMBER</th>
                                <th>ORDER QUANTITY</th>
                                <th>BALANCE QUANTITY</th>
                                <th>PLANNED QUANTITY</th>
                                <th>ACTION</th>
                            </tr>
                            <tbody id="details_table">
                            @if(!empty($item->orders))
                                @foreach($item?->orders as $index => $one)
                                    <tr>
                                        <input type="hidden" name="orders_selected[{{$index}}][order_id]"
                                               value="{{$one->sales_order_detail_id}}">
                                        <td>{{$one->order?->sales_order?->order_no}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="number" step="0.01"
                                                   name="orders_selected[{{$index}}][planned_quantity]"
                                                   class="form-control"
                                                   value="{{ $one?->planned_quantity}}"
                                            />
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                    onclick="$(this).closest('tr').remove();"><i
                                                    class="fa fa-trash">
                                                </i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <tr class="table-primary">
                                <th>PIECE LENGTH %</th>
                                <th>PIECE LENGTH</th>
                            </tr>
                            <tbody>
                            <tr>
                                <td><b>80</b></td>
                                <td><input type="number" step="0.01" name="piece_length_80" class="form-control"
                                           autocomplete="off"
                                           value="{{ $item ? $item?->piece_length_80 : old('piece_length_80') }}"/></td>
                            </tr>
                            <tr>
                                <td><b>20</b></td>
                                <td><input type="number" step="0.01" name="piece_length_20" class="form-control"
                                           autocomplete="off"
                                           value="{{ $item ? $item?->piece_length_20 : old('piece_length_20') }}"/></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <table class="table border border-dark border-2">
                        {{-- Line 1  --}}
                        <tr>
                            <td>Quality Reed<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="quality_reed" id="quality_reed"
                                       class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->quality_reed : old('quality_reed') }}"/>
                            </td>
                            <td>Quality Picks</td>
                            <td>
                                <input type="number" step="0.01" name="quality_picks" id="quality_picks"
                                       class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->quality_picks : old('quality_picks') }}"/>
                            </td>
                            <td>No Of Ends<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="no_of_ends" id="no_of_ends" class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->no_of_ends : old('no_of_ends') }}"/>
                            </td>
                        </tr>
                        {{-- Line 2  --}}
                        <tr>
                            <td>Reed Space<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="reed_space" id="reed_space" class="form-control"
                                       autocomplete="off"
                                       required value="{{ $item ? $item?->reed_space : old('reed_space') }}"/>
                            </td>
                            <td>L to L<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="l_to_l" id="l_to_l" class="form-control"
                                       autocomplete="off"
                                       required value="{{ $item ? $item?->l_to_l : old('l_to_l') }}"/>
                            </td>
                            <td>Selvedge</td>
                            <td>
                                <select name="selvedge_id" id="selvedge_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($selvedges as $one)
                                        <option
                                            value="{{ $one->id }}" {{ ($item?->selvedge_id == $one->id) ? 'selected' : '' }}
                                        >{{ $one->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        {{-- Line 3  --}}
                        <tr>
                            <td>Dents<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="dents" id="dents" class="form-control"
                                       autocomplete="off"
                                       required value="{{ $item ? $item?->dents : old('dents') }}"/>
                            </td>
                            <td>Ends per Dent<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="ends_per_dent" id="ends_per_dent"
                                       class="form-control"
                                       autocomplete="off"
                                       required value="{{ $item ? $item?->ends_per_dent : old('ends_per_dent') }}"/>
                            </td>
                            <td>Selvedge Ends<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" step="0.01" name="selvedge_ends" id="selvedge_ends"
                                       class="form-control"
                                       autocomplete="off"
                                       required value="{{ $item ? $item?->selvedge_ends : old('selvedge_ends') }}"/>
                            </td>
                        </tr>
                        {{-- Line 4  --}}
                        <tr>
                            <td>Width</td>
                            <td>
                                <input type="number" step="0.01" name="width" id="width" class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->width : old('width') }}"/>
                            </td>
                            <td>Catch Cord Ends</td>
                            <td>
                                <input type="number" step="0.01" name="catch_cord_ends" id="catch_cord_ends"
                                       class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->catch_cord_ends : old('catch_cord_ends') }}"/>
                            </td>
                            <td>Ends Per Wire</td>
                            <td>
                                <input type="number" step="0.01" name="ends_per_wire" id="ends_per_wire"
                                       class="form-control"
                                       autocomplete="off"
                                       value="{{ $item ? $item?->ends_per_wire : old('ends_per_wire') }}"/>
                            </td>
                        </tr>
                    </table>
                    <h2 class="text-center">Warp Details</h2>
                    {{-- Warp Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <tr class="table-primary">
                                    <th>SHOW IN PRINT</th>
                                    <th>ACTUAL COUNT<b class="text-danger">*</b></th>
                                    <th>MATERIAL</th>
                                    <th>
                                        <button
                                            class="btn btn-icon btn-success btn-sm btn-circle mr-2 btn_add_order_details"
                                            type="button" onclick="add_warp_details()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                <tbody id="warp_details">
                                {{-- Warps List --}}
                                @if(!empty($item->warps))
                                    @foreach($item?->warps as $index => $one)
                                        <tr>
                                            <td><input type="checkbox" name="warps[{{$index}}][show_in_print]" {{ $one->show_in_print == '1' ? 'checked' : '' }} ></td>
                                            <td>
                                                <select class="form-control" name="warps[{{$index}}][actual_id]"
                                                        required>
                                                    @foreach ($yarns as $yarn)
                                                        <option value="{{ $yarn->id }}" {{ $yarn->id == $one->actual_id ? 'selected' : '' }}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </td>
                                            <td>
                                                <select class="form-control" name="warps[{{$index}}][material_id]"
                                                        required>
                                                    @foreach ($yarns as $yarn)
                                                        <option value="{{ $yarn->id }}" {{ $yarn->id == $one->material_id ? 'selected' : '' }}>{{ $yarn->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                        onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash">
                                                    </i></button>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="text-center">Weft Details</h2>
                    {{-- Weft Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <tr class="table-primary">
                                    <th>SHOW IN PRINT</th>
                                    <th>ACTUAL COUNT<b class="text-danger">*</b></th>
                                    <th>MATERIAL</th>
                                    <th>
                                        <button
                                            class="btn btn-icon btn-success btn-sm btn-circle mr-2 btn_add_order_details"
                                            type="button" onclick="add_weft_details()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                <tbody id="weft_details">
                                {{-- Wefts List --}}
                                @if(!empty($item->wefts))
                                    @foreach($item?->wefts as $index => $one)
                                        <tr>
                                            <td><input type="checkbox" name="wefts[{{$index}}][show_in_print]" {{ $one->show_in_print == '1' ? 'checked' : '' }} ></td>
                                            <td>
                                                <select class="form-control" name="wefts[{{$index}}][actual_id]"
                                                        required>
                                                    @foreach ($yarns as $yarn)
                                                        <option value="{{ $yarn->id }}" {{ $yarn->id == $one->actual_id ? 'selected' : '' }}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </td>
                                            <td>
                                                <select class="form-control" name="wefts[{{$index}}][material_id]"
                                                        required>
                                                    @foreach ($yarns as $yarn)
                                                        <option value="{{ $yarn->id }}" {{ $yarn->id == $one->material_id ? 'selected' : '' }}>{{ $yarn->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                        onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash">
                                                    </i></button>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route('jobwork_weaving_contract.index') }}"
                           class="btn btn-warning font-weight-bolder w-135px">
                            CANCEL
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="search_orders_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>Order no</th>
                                <th>Sort number</th>
                                <th>Quality</th>
                                <th>Order date</th>
                                <th>Colour</th>
                                <th>Picks</th>
                                <th>Final Reed</th>
                                <th>Variation Percent</th>
                                <th>Buyer</th>
                                <th>Total Qty</th>
                                <th>Planned Qty</th>
                                <th>Balance Qty</th>
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
        {{ html()->form()->close() }}
        @endsection
        @push('scripts')
            <script>
                $(document).ready(function () {


                });

                function show_orders() {
                    $('#search_order_tbody').html('');
                    $.ajax({
                        type: 'GET',
                        url: '{{route('search_orders_details')}}',
                        data: {},
                        dataType: 'JSON',
                        success: function (data) {
                            let list = data.item;
                            $.each(list, function (index, item) {
                                let tr = `<tr>`;
                                tr += `<td>${item.sales_order?.order_no ?? ''}</td>`;
                                tr += `<td>${item.quality?.sort_no ?? ''}</td>`;
                                tr += `<td>${item.quality?.details ?? ''}</td>`;
                                tr += `<td>${item.sales_order?.order_date ?? ''}</td>`;
                                tr += `<td>-</td>`;
                                tr += `<td>${item.quality?.picks ?? ''}</td>`;
                                tr += `<td>${item.quality?.reed ?? ''}</td>`;
                                tr += `<td>${item.variation ?? 0}</td>`;
                                tr += `<td>${item.sales_order?.buyer?.name ?? ''}</td>`;
                                tr += `<td>${item.quantity ?? 0}</td>`;
                                tr += `<td>${item.weaving_qty ?? 0}</td>`;
                                tr += `<td>${(item.quantity ?? 0) - (item.weaving_qty ?? 0)}</td>`;
                                tr += `<td><input type="checkbox" class="order_details_checkboxs" data-id="${item.id}" `;
                                tr += `data-order_no="${item.sales_order?.order_no}" data-order_qte="${item.quantity}" `;
                                tr += `data-planned_qte="${item.weaving_qty}"  ></td>`;
                                tr += `</tr>`;
                                $('#search_order_tbody').append(tr);
                            });
                            $("#search_orders_modal").modal('show');
                        }
                    })
                }

                function submit_search() {
                    let checkedCheckboxes = $('.order_details_checkboxs:checked');
                    let nmbr = $("#details_table TR").length;
                    let order_id = 0;
                    let order_no = '';
                    let order_qte = 0;
                    let planned_qte = 0;
                    let tr = ``;
                    checkedCheckboxes.each(function () {
                        order_id = $(this).data('id');
                        order_no = $(this).data('order_no');
                        order_qte = $(this).data('order_qte');
                        planned_qte = $(this).data('planned_qte');
                        tr = `<tr>`;
                        tr += `    <input type="hidden" name="orders_selected[${nmbr}][order_id]" value="${order_id}">`;
                        tr += `        <td>${order_no}</td>`;
                        tr += `        <td>${order_qte}</td>`;
                        tr += `        <td>${(order_qte ?? 0) - (planned_qte ?? 0)}</td>`;
                        tr += `        <td>`;
                        tr += `            <input type="number" step="0.01" name="orders_selected[${nmbr}][planned_quantity]" class="form-control"`;
                        tr += `                   value="${planned_qte}"`;
                        tr += `            />`;
                        tr += `        </td>`;
                        tr += `        <td>`;
                        tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                        tr += `                onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
                        tr += `        </td>`;
                        tr += `</tr>`;
                        $("#details_table").append(tr);
                        $("#search_orders_modal").modal('hide');
                    });
                }

                const deleteRow = (val) => {
                    $(val).closest('tr').remove();
                }

                const change_quality = () => {
                    let id = $("#sort_id").val();
                    let quality_reed = $("#quality_reed");
                    let quality_picks = $("#quality_picks");
                    let no_of_ends = $("#no_of_ends");
                    let reed_space = $("#reed_space");
                    let selvedge_id = $("#selvedge_id");
                    let dents = $("#dents");
                    let ends_per_dent = $("#ends_per_dent");
                    let selvedge_ends = $("#selvedge_ends");
                    let width = $("#width");

                    let weft_details = $("#weft_details");
                    let warp_details = $("#warp_details");
                    quality_reed.val('');
                    quality_picks.val('');
                    no_of_ends.val('');
                    reed_space.val('');
                    selvedge_id.val('');
                    dents.val('');
                    ends_per_dent.val('');
                    selvedge_ends.val('');
                    width.val('');

                    weft_details.html('');
                    warp_details.html('');
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
                                    quality_reed.val(data.item.reed);
                                    quality_picks.val(data.item.picks);
                                    no_of_ends.val(data.item.ends_with_selvedge);
                                    reed_space.val(data.item.reed_space);
                                    selvedge_id.val(data.item.selvedge);
                                    dents.val(data.item.dents);
                                    ends_per_dent.val(data.item.ends_per_dent);
                                    selvedge_ends.val(data.item.selvedge_ends);
                                    width.val(data.item.width);
                                    let options = '';
                                    $.each(data.item.warps, function (index, item) {
                                        options += `<option value="${item.material.id}">${item.material.name}</option>`;
                                    });
                                    $.each(data.item.warps, function (index, item) {
                                        let tr = '<tr>';
                                        tr += `<td><input type="checkbox" name="warps[${index}][show_in_print]" checked></td>`;
                                        tr += `<td>`;
                                        tr += `<select class="form-control" name="warps[${index}][material_id]" required>`;
                                        options += `<option value="">Select Material</option>`;
                                        tr += options;
                                        options += ``;
                                        tr += `</td>`;
                                        tr += `<td> ${item.material.name} </td>`;
                                        tr += `<td>`;
                                        tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                                        tr += `        onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">`;
                                        tr += `        </i></button></td>`;
                                        tr += `</td>`;
                                        tr += `</tr>`;
                                        warp_details.append(tr);
                                    });
                                    options = '';
                                    $.each(data.item.wefts, function (index, item) {
                                        options += `<option value="${item.material.id}">${item.material.name}</option>`;
                                    });
                                    $.each(data.item.wefts, function (index, item) {
                                        let tr = '<tr>';
                                        tr += `<td><input type="checkbox" name="wefts[${index}][show_in_print]" checked></td>`;
                                        tr += `<td>`;
                                        tr += `<select class="form-control" name="wefts[${index}][material_id]" required>`;
                                        options += `<option value="">Select Material</option>`;
                                        tr += options;
                                        options += ``;
                                        tr += `</td>`;
                                        tr += `<td> ${item.material.name} </td>`;
                                        tr += `<td>`;
                                        tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                                        tr += `        onclick="$(this).cloest('tr').remove();"><i class="fa fa-trash">`;
                                        tr += `        </i></button></td>`;
                                        tr += `</td>`;
                                        tr += `</tr>`;
                                        weft_details.append(tr);
                                    });


                                }
                            }
                        });
                    }
                }


                const add_weft_details = () => {
                    let index = $("#weft_details TR").length;
                    let tr = '<tr>';
                    tr += `<td><input type="checkbox" name="wefts[${index}][show_in_print]" checked></td>`;
                    tr += `<td>`;
                    tr += `<select class="form-control" name="wefts[${index}][actual_id]" required>`;
                    @foreach ($yarns as $yarn)
                        tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                    @endforeach
                        tr += `</select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `<select class="form-control" name="wefts[${index}][material_id]" required>`;
                    @foreach ($yarns as $yarn)
                        tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                    @endforeach
                        tr += `</select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                    tr += `        onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">`;
                    tr += `        </i></button></td>`;
                    tr += `</td>`;
                    tr += `</tr>`;
                    $("#weft_details").append(tr);
                }

                const add_warp_details = () => {
                    let index = $("#warp_details TR").length;
                    let tr = '<tr>';
                    tr += `<td><input type="checkbox" name="warps[${index}][show_in_print]" checked></td>`;
                    tr += `<td>`;
                    tr += `<select class="form-control" name="warps[${index}][actual_id]" required>`;
                    @foreach ($yarns as $yarn)
                        tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                    @endforeach
                        tr += `</td>`;
                    tr += `<td>`;
                    tr += `<select class="form-control" name="warps[${index}][material_id]" required>`;
                    @foreach ($yarns as $yarn)
                        tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                    @endforeach
                        tr += `</select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                    tr += `        onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">`;
                    tr += `        </i></button></td>`;
                    tr += `</td>`;
                    tr += `</tr>`;
                    $("#warp_details").append(tr);
                }

            </script>

    @endpush
