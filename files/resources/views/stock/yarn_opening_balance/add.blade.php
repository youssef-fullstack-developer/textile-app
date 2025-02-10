@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'yarn_opening_balance';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} Yarn Opening Balance
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
                        <div class="col-4">
                            <label>Date<b class="text-danger">*</b></label>
                            <input type="date" name="date" class="form-control" required
                                   value="{{$item ? $item?->date : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Transportation Details</label>
                            <input type="text" name="transportation_details" class="form-control"
                                   value="{{$item ? $item?->transportation_details : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Vendor Group<b class="text-danger">*</b></label>
                            <select name="vendor_group_id" id="vendor_group_id" onchange="change_vendor()"
                                    class="form-control" required>
                                <option value="">Select</option>
                                @foreach($vendor_groups as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_group_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->group}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>DC No/Gate Pass No</label>
                            <input type="text" name="gate_pass_no" class="form-control"
                                   value="{{$item ? $item?->gate_pass_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>DC Date/ Gate Pass Date</label>
                            <input type="date" name="gate_pass_date" class="form-control"
                                   value="{{$item ? $item?->gate_pass_date : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Taxable Amount</label>
                            <input type="number" name="taxable_amount" class="form-control"
                                   value="{{$item ? $item?->taxable_amount : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Location <b class="text-danger">*</b></label>
                            <select name="location_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($locations as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->location_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Stock Type <b class="text-danger">*</b></label>
                            <select name="stock_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($stock_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->stock_type_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Is JobWorkOrder</label>
                            <input type="checkbox" name="is_jobwork_order" class="form-control w-20px H-20px" value="1"
                                {{$item && $item?->is_jobwork_order ? 'checked' : '' }}/>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="col-12 text-right">
                                <button
                                    class="btn btn-success btn-sm btn-circle mr-2 btn_add_order_details"
                                    type="button" onclick="add_detail_row()"><i class="fa fa-plus"></i>
                                    Add Item
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="details_container">
                        @php($i = 0)
                        @while( (empty($item) &&  $i == 0) || (count($item?->details ?? []) > $i ) )
                            @php($detail = $item ? $item->details[$i] : NULL)
                            <div class="form-group border p-3 border-dark border-2 tr">
                                <input type="hidden" name="details[{{$i}}][id]"
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
                                {{-- Line 1 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Yarn Count<b class="text-danger">*</b></label>
                                        <select name="details[{{$i}}][yarn_id]" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($yarns as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->yarn_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Mill Name<b class="text-danger">*</b></label>
                                        <select name="details[{{$i}}][mill_id]" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($mill_names as $row)
                                                <option
                                                    value="{{$row->id}}" {{ ($detail?->mill_id == $row->id) ? 'selected' : '' }}
                                                >{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Line 2 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Total No Of Bags<b class="text-danger">*</b></label>
                                        <input type="number" name="details[{{$i}}][total_no_of_bags]"
                                               class="form-control" required
                                               value="{{$detail ? $detail?->total_no_of_bags : '' }}"/>
                                    </div>
                                    <div class="col-4">
                                        <label>Kgs Per Bag (Bag Weight)<b class="text-danger">*</b></label>
                                        <input type="number" name="details[{{$i}}][kgs_per_bag]"
                                               class="form-control" required
                                               value="{{$detail ? $detail?->kgs_per_bag : '' }}"/>
                                    </div>
                                </div>
                                {{-- Line 3 --}}
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>Cones Per Bag</label>
                                        <input type="number" name="details[{{$i}}][cones_per_bag]"
                                               class="form-control"
                                               value="{{$detail ? $detail?->cones_per_bag : '' }}"/>
                                    </div>
                                    <div class="col-3">
                                        <label>Total Cones</label>
                                        <input type="number" name="details[{{$i}}][total_cones]"
                                               class="form-control"
                                               value="{{$detail ? $detail?->total_cones : '' }}"/>
                                    </div>
                                    <div class="col-6">
                                        <label>Total Kgs<b class="text-danger">*</b></label>
                                        <input type="number" name="details[{{$i}}][total_kgs]"
                                               class="form-control" required
                                               value="{{$detail ? $detail?->total_kgs : '' }}"/>
                                    </div>
                                </div>
                                {{-- Line 4 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Rate Per Kg<b class="text-danger">*</b></label>
                                        <input type="number" name="details[{{$i}}][rate_per_kg]"
                                               class="form-control" required
                                               value="{{$detail ? $detail?->rate_per_kg : '' }}"/>
                                    </div>
                                    <div class="col-6">
                                        <label>Basic Amount</label>
                                        <input type="number" name="details[{{$i}}][basic_amount]"
                                               class="form-control"
                                               value="{{$detail ? $detail?->basic_amount : '' }}"/>
                                    </div>
                                </div>
                                {{-- Line 5 --}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Gross Weight</label>
                                        <input type="number" name="details[{{$i}}][gross_weight]"
                                               class="form-control"
                                               value="{{$detail ? $detail?->gross_weight : '' }}"/>
                                    </div>
                                </div>
                                {{-- Lots Numbers Table--}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr class="table-primary">
                                                <th>LOT NO.</th>
                                                <th>NO. OF BAGS<b class="text-danger">*</b></th>
                                                <th>KGS PER BAG<b class="text-danger">*</b></th>
                                                <th>TOTAL KGS<b class="text-danger">*</b></th>
                                                <th>CONES PER BAG<b class="text-danger">*</b></th>
                                                <th>
                                                    <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                            type="button"
                                                            onclick="addRow_lots('{{$i}}')"><i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="lots_container_{{$i}}">
                                            @if(!empty($detail))
                                                @foreach($detail?->lots as $index => $row)
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                   name="details[{{$i}}][lots][{{$index}}][lot_no]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->lot_no : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$i}}][lots][{{$index}}][no_of_bags]"
                                                                   class="form-control" required
                                                                   value="{{ $row ? $row?->no_of_bags : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$i}}][lots][{{$index}}][kgs_per_bag]"
                                                                   class="form-control" required
                                                                   value="{{ $row ? $row?->kgs_per_bag : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$i}}][lots][{{$index}}][totalkgs]"
                                                                   class="form-control" required
                                                                   value="{{ $row ? $row?->totalkgs : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$i}}][lots][{{$index}}][cones_per_bag]"
                                                                   class="form-control" required
                                                                   value="{{ $row ? $row?->cones_per_bag : '' }}"/>
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
                            </div>
                            @php($i++)
                        @endwhile
                    </div>
                    {{-- End Details --}}

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
        const add_detail_row = () => {
            let i = $("#details_container .tr").length;
            let html = '';
            html += `<div class="form-group border p-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="details[${i}][id]" value="">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-12">`;
            html += `                <div class="col-12 text-right">`;
            html += `                    <button class="btn btn-icon btn-danger btn-sm btn-circle btn_delete_row"`;
            html += `                            type="button"`;
            html += `                            onclick="$(this).closest('.tr').remove();"><i class="fa fa-trash"></i></button>`;
            html += `                </div>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        {{-- Line 1 --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-6">`;
            html += `            <label>Yarn Count<b class="text-danger">*</b></label>`;
            html += `            <select name="details[${i}][yarn_id]" id="yarn_id_${i}" class="form-control" required>`;
            html += `                <option value="">Select</option>`;
            @foreach($yarns as $row)
                html += `                <option value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        <div class="col-6">`;
            html += `            <label>Mill Name<b class="text-danger">*</b></label>`;
            html += `            <select name="details[${i}][mill_id]" id="mill_id_${i}" class="form-control" required>`;
            html += `                <option value="">Select</option>`;
            @foreach($mill_names as $row)
                html += `                <option value="{{$row->id}}"  >{{$row->name}}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        </div>`;
            html += `        {{-- Line 2 --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-6">`;
            html += `            <label>Total No Of<b class="text-danger">*</b></label>`;
            html += `            <input type="number" name="details[${i}][total_no_of_bags]" id="total_no_of_bags_${i}"`;
            html += `                   class="form-control" required />`;
            html += `        </div>`;
            html += `        <div class="col-4">`;
            html += `            <label>Kgs Per Bag(Bag Weight)<b class="text-danger">*</b></label>`;
            html += `            <input type="number" name="details[${i}][kgs_per_bag]" id="kgs_per_bag_${i}"`;
            html += `                   class="form-control" required />`;
            html += `        </div>`;
            html += `        </div>`;
            html += `        {{-- Line 3 --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-3">`;
            html += `            <label>Cones Per Bag</label>`;
            html += `            <input type="number" name="details[${i}][cones_per_bag]" id="cones_per_bag_${i}" class="form-control" />`;
            html += `        </div>`;
            html += `        <div class="col-3">`;
            html += `            <label>Total Cones</label>`;
            html += `            <input type="number" name="details[${i}][total_cones]" id="total_cones_${i}" class="form-control" />`;
            html += `        </div>`;
            html += `        <div class="col-6">`;
            html += `            <label>Total Kgs<b class="text-danger">*</b></label>`;
            html += `            <input type="number" name="details[${i}][total_kgs]" id="total_kgs_${i}"`;
            html += `                   class="form-control" required />`;
            html += `        </div>`;
            html += `        </div>`;
            html += `        {{-- Line 4 --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-6">`;
            html += `            <label>Rate Per Kg<b class="text-danger">*</b></label>`;
            html += `            <input type="number" name="details[${i}][rate_per_kg]" id="rate_per_kg_${i}" class="form-control" required />`;
            html += `        </div>`;
            html += `        <div class="col-6">`;
            html += `            <label>Basic Amount</label>`;
            html += `            <input type="number" name="details[${i}][basic_amount]" id="basic_amount_${i}" class="form-control" />`;
            html += `        </div>`;
            html += `        </div>`;
            html += `        {{-- Line 5 --}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-6">`;
            html += `            <label>Gross Weight</label>`;
            html += `            <input type="number" name="details[${i}][gross_weight]" id="gross_weight_${i}" class="form-control" />`;
            html += `        </div>`;
            html += `        </div>`;
            html += `        {{-- Lots Numbers Table--}}`;
            html += `        <div class="form-group row">`;
            html += `        <div class="col-12">`;
            html += `            <table class="table table-bordered table-hover">`;
            html += `                <thead>`;
            html += `                <tr class="table-primary">`;
            html += `                    <th>LOT NO.</th>`;
            html += `                    <th>NO. OF BAGS<b class="text-danger">*</b></th>`;
            html += `                    <th>KGS PER BAG<b class="text-danger">*</b></th>`;
            html += `                    <th>TOTAL KGS<b class="text-danger">*</b></th>`;
            html += `                    <th>CONES PER BAG<b class="text-danger">*</b></th>`;
            html += `                    <th>`;
            html += `                        <button class="btn btn-icon btn-xs btn-success btn-circle"`;
            html += `                                type="button" onclick="addRow_lots('${i}')"><i class="fa fa-plus"></i>`;
            html += `                        </button>`;
            html += `                    </th>`;
            html += `                </tr>`;
            html += `                </thead>`;
            html += `                <tbody id="lots_container_${i}">`;
            html += `                </tbody>`;
            html += `            </table>`;
            html += `        </div>`;
            html += `        </div>`;
            html += `</div>`;
            $('#details_container').append(html);
        };
        const addRow_lots = (i) => {
            let index = $("#lots_container_" + i + " TR").length;
            let html = '';
            html += `<tr>`;
            html += `<td>`;
            html += `    <input type="text"`;
            html += `           name="details[${i}][lots][${index}][lot_no]"`;
            html += `           class="form-control" />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${i}][lots][${index}][no_of_bags]"`;
            html += `           class="form-control" required />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${i}][lots][${index}][kgs_per_bag]"`;
            html += `           class="form-control" required />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${i}][lots][${index}][totalkgs]"`;
            html += `           class="form-control" required />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${i}][lots][${index}][cones_per_bag]"`;
            html += `           class="form-control" required  />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <button class="btn btn-icon btn-danger btn-sm btn-circle"`;
            html += `            type="button"  onclick="$(this).closest('tr').remove();"><i`;
            html += `        class="fa fa-trash"></i></button>`;
            html += `</td>`;
            html += `</tr>`;
            $('#lots_container_' + i).append(html);
        };

        const change_vendor = () => {
            let id = $("#vendor_group_id").val();
            let po_no = $("#purchase_order_id");
            po_no.html('<option value="">Select</option>');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('vendor_groups.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            let options = '<option value="">Select</option>';
                            $.each(data.item.yarn_pos, function (index, item) {
                                options += `<option value="${item.id}">${item.po_number} - ${item.manual_po_number}</option>`;
                            });
                            po_no.html(options);
                            change_purchase_order();
                        }
                    }
                });
            }
        }

        const change_purchase_order = () => {
            let id = $("#purchase_order_id").val();
            $("#details_container").html('');
            if (id > 0) {
                $.ajax({
                    url: '{{ route('yarn_po.show', 0) }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            $.each(data.item.details, function (index, item) {
                                let i = $("#details_container .tr").length;
                                add_detail_row();
                                $("#yarn_id_" + i).val(item.count_id);
                                $("#mill_id_" + i).val(item.mill_name_id);
                                $("#total_no_of_bags_" + i).val(item.no_of_bags);
                                $("#kgs_per_bag_" + i).val(item.kg_per_bag);
                                $("#cones_per_bag_" + i).val(item.cones_per_bag);
                                $("#total_cones_" + i).val((parseFloat(item.no_of_bags) * parseFloat(item.cones_per_bag)) ?? 0);
                                $("#total_kgs_" + i).val((parseFloat(item.no_of_bags) * parseFloat(item.kg_per_bag)) ?? 0);
                                $("#rate_per_kg_" + i).val(item.mill_price);
                                $("#basic_amount_" + i).val(item.basic_amount);
                            });
                        }
                        if ($("#details_container .tr").length == 0) {
                            add_detail_row();
                        }
                    }
                });
            } else {
                add_detail_row();
            }
        }
    </script>
@endpush

