@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? 'beam_outward/'.$item?->id : 'beam_outward' ;
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
                            BEAM OUTWARD
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('beam_outward.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Sizing Name<b class="text-danger">*</b></label>
                            <select name="size_id" id="size_id" class="form-control" onchange="change_sizing_name()" required>
                                <option value="">Select</option>
                                @foreach ($vendors as $one)
                                    <option
                                        value="{{ $one->id }}" {{$item?->size_id ?? 0 == $one->id ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Set Number<b class="text-danger">*</b></label>
                            <select name="set_id" id="set_id" class="form-control" onchange="sizing_plan_change(this);" required>
                                <option value="">Select</option>
                                @foreach ($sets as $one)
                                    <option
                                        value="{{ $one->id }}" {{$item?->set_id ?? 0 == $one->id ? 'selected' : '' }}
                                    >{{ $one->set_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Sort Number<b class="text-danger">*</b></label>
                            <select name="sort_id" class="form-control" required>
                                <option value="">Select </option>
                                @foreach ($sorts as $one)
                                    <option
                                        value="{{ $one->id }}" {{$item?->sort_id == $one->id ? 'selected' : '' }}
                                    >{{ $one->sort_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Outward Date<b class="text-danger">*</b></label>
                            <input type="date" name="outward_date" class="form-control"
                                   value="{{$item?->outward_date ?? '' }}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicule_number" id="vehicule_number" class="form-control"
                                   value="{{$item?->vehicule_number ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Transport</label>
                            <input type="text" name="transport" id="transport" class="form-control"
                                   value="{{$item?->transport ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>HSN Code</label>
                            <input type="text" name="hsn_code" class="form-control"
                                   value="{{$item?->hsn_code ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>SAC Code</label>
                            <input type="text" name="sac_code" class="form-control"
                                   value="{{$item?->sac_code ?? '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>E-way Bill No.</label>
                            <input type="text" name="e_way_bill_no" class="form-control"
                                   value="{{$item?->e_way_bill_no ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Approx Value</label>
                            <input type="text" name="approx_value" class="form-control"
                                   value="{{$item?->approx_value ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>DC No.<b class="text-danger">*</b></label>
                            <input type="number" name="dc_no" class="form-control"
                                   value="{{$item?->dc_no ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Vendor<b class="text-danger">*</b></label>
                            <select name="vendor_id" id="vendor_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($vendors as $one)
                                    <option
                                        value="{{ $one->id }}" {{$item?->vendor_id ?? 0 == $one->id ? 'selected' : '' }}
                                    >{{ $one->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-12">
                            <table class="table-hover table table-bordered">
                                <thead>
                                <tr class="table-primary">
                                    <th>JOBWORK CONTRACT<b class="text-danger">*</b></th>
                                    <th>ORDER NUMBER</th>
                                    <th>BEAM NUMBER<b class="text-danger">*</b></th>
                                    <th>QUALITY</th>
                                    <th>METERS</th>
                                    <th>WIDTH (FABRIC OUTPUT)</th>
                                    <th>EXPECTED WEAVING MTR</th>
                                    <th>REEDSPACE</th>
                                    <th>PICKS</th>
                                    <th>TOTAL ENDS</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="details">
                                @if(!empty($item))
                                    @foreach($item?->details as $index => $row)
                                        <tr>
                                            <input type="hidden" name="details[{{$index}}][id]"
                                                   value="{{$row->id}}"/>
                                            <input type="hidden" name="details[{{$index}}][weaver_id]"
                                                   value="{{$row->weaver_id}}"/>
                                            <input type="hidden" name="details[{{$index}}][order_id]"
                                                   value="{{$row->order_id}}"/>
                                            <td>{{$row->weaver?->name}}</td>
                                            <td>{{$row->order?->order_no}}</td>
                                            <td><input type="number" name="details[{{$index}}][beam_number]"
                                                       class="form-control" value="{{$row->beam_number}}"/></td>
                                            <td><select name="details[{{$index}}][yarn_id]" class="form-control"
                                                        required>
                                                    <option value="">Select</option>
                                                    @foreach ($yarns as $one)
                                                        <option
                                                            value="{{ $one->id }}" {{$row?->yarn_id == $one->id ? 'selected' : '' }}
                                                        >{{ $one->name }}</option>
                                                    @endforeach
                                                </select></td>
                                            <td><input type="number" name="details[{{$index}}][meteres]"
                                                       class="form-control"
                                                       value="{{$row->meteres}}"/></td>
                                            <td><input type="number" name="details[{{$index}}][width]"
                                                       class="form-control"
                                                       value="{{$row->width}}"/></td>
                                            <td><input type="number" name="details[{{$index}}][expexted_weaving_mtr]"
                                                       class="form-control"
                                                       value="{{$row->expexted_weaving_mtr}}"/></td>
                                            <td><input type="number" name="details[{{$index}}][reed_space]"
                                                       class="form-control"
                                                       value="{{$row->reed_space}}"/></td>
                                            <td><input type="number" name="details[{{$index}}][picks]"
                                                       class="form-control"
                                                       value="{{$row->picks}}"/></td>
                                            <td><input type="number" name="details[{{$index}}][total_ends]"
                                                       class="form-control"
                                                       value="{{$row->total_ends}}"/></td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>SET Close<b class="text-danger">*</b></label>
                            <select name="set_close" class="form-control d-inline-block w-200px ml-10" required>
                                <option value="">Select</option>
                                <option value="1" {{$item?->set_close == 1 ? 'selected' : '' }}>Open</option>
                                <option value="0" {{$item?->set_close == 0 ? 'selected' : '' }}>Close</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">
                        SAVE
                    </button>
                    <a href="{{ route('beam_outward.index') }}"
                       class="btn btn-warning font-weight-bolder w-135px">
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
        const sizing_plan_change = (elm) => {
            $("#details").html('');
            $("#vehicule_number").val('');
            $("#transport").val('');
            $("#vendor_id").val('');
            $id = $(elm).val();
            if ($id > 0) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('sizing_plan_get')}}",
                    data: {
                        'id': $id,
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status) {
                            $("#vehicule_number").val(data.item?.sizing_yarn_issue?.van_no)
                            $("#transport").val(data.item?.sizing_yarn_issue?.transport?.name)
                            $("#vendor_id").val(data.item?.vendor_id)

                            $.each(data.item.beam_details, function (index, item) {
                                let tr = '<tr>';
                                tr += `<input type="hidden" name="details[${index}][weaver_id]" value="${item.weaver_id}" />`;
                                tr += `<input type="hidden" name="details[${index}][order_id]" value="${item.order_id ?? ''}" />`;
                                tr += `<td>${item.weaver?.name}</td>`;
                                tr += `<td>${item.order?.order_no ?? ''}</td>`;
                                tr += `<td><input type="number" name="details[${index}][beam_number]" class="form-control" value=""/></td>`;
                                tr += `<td><select name="details[${index}][yarn_id]" class="form-control" required>`;
                                tr += '    <option value="">Select</option>';
                                @foreach ($yarns as $one)
                                    tr += '    <option value="{{ $one->id }}" ';
                                tr += (data.item.yarn_id == '{{ $one->id }}') ? 'selected' : '';
                                tr += '>{{ $one->name }}</option>';
                                @endforeach
                                    tr += '</select></td>';
                                tr += `<td><input type="number" name="details[${index}][meteres]" class="form-control"`;
                                tr += `value="${item.beam_meters}"/></td>`;
                                tr += `<td><input type="number" name="details[${index}][width]" class="form-control"`;
                                tr += `value=""/></td>`;
                                tr += `<td><input type="number" name="details[${index}][expexted_weaving_mtr]" class="form-control"`;
                                tr += `value="${item.expected_fabric_mtrs}"/></td>`;
                                tr += `<td><input type="number" name="details[${index}][reed_space]" class="form-control"`;
                                tr += `value=""/></td>`;
                                tr += `<td><input type="number" name="details[${index}][picks]" class="form-control"`;
                                tr += `value=""/></td>`;
                                tr += `<td><input type="number" name="details[${index}][total_ends]" class="form-control"`;
                                tr += `value=""/></td>`;
                                tr += `        <td>`;
                                tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                                tr += `                onclick="$(this).closest('tr').remove();"><i class="fa fa-trash">`;
                                tr += `        </i></button></td>`;
                                tr += '</tr>';
                                $("#details").append(tr);
                            });

                        }
                    },
                    error: function (data) {
                        // alert(data)
                    }
                });
            }
        }

        const change_sizing_name = () => {
            let id = $("#size_id").val();
            // let set_id = $("#set_id");
            // set_id.html('<option value="">Select</option>').change();
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
                            let options = '';
                            $.each(data.item.sizing_plans, function (index, item) {
                                options += `<option value="${item.id}">${item.plan_number} - ${item.id}</option>`;
                            });
                            // set_id.append(options);
                        }
                    }
                });
            }
        }
        $(document).ready(function () {

        });

    </script>

@endpush
