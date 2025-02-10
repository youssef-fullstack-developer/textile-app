@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'fabric_opening_balance';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : route($route.'.store') ;
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
                            FABRIC OPENING BALANCE
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
                            <label>Vendor Group</label>
                            <select name="vendor_group_id" class="form-control" onchange="change_vendor_group(this)">
                                <option value="">Select</option>
                                @foreach ($vendor_groups as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->vendor_group_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->group  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Received Date<b class="text-danger">*</b></label>
                            <input type="date" name="received_date" class="form-control"
                                   value="{{ $item ? $item?->received_date : '' }}" required />
                        </div>
                        <div class="col-4">
                            <label>Inward No<b class="text-danger">*</b></label>
                            <input type="text" name="inward_no" id="inward_no" class="form-control"
                                   value="{{ $item ? $item?->inward_no : '' }}" required />
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Location<b class="text-danger">*</b></label>
                            <select name="location_id" class="form-control" required >
                                <option value="">Select</option>
                                @foreach ($locations as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->location_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Is Inspected<b class="text-danger">*</b></label>
                            <select name="is_inspected" class="form-control" required >
                                <option value="">Select</option>
                                <option value="Yes" {{ $item?->is_inspected == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $item?->is_inspected == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Calculation from Master</label>
                            <input type="checkbox" name="calculation_from_master" class="form-control h-20px"
                                   value="1" {{ $item && $item?->calculation_from_master == 1 ? 'checked': '' }}/>
                        </div>
                    </div>
                    {{-- Line Table --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>Sort Number</th>
                                    <th>Quality</th>
                                    <th>Char</th>
                                    <th>Piece No</th>
                                    <th>Net Piece Mtrs</th>
                                    <th>Fold</th>
                                    <th>Piece Meter</th>
                                    <th>Weight</th>
                                    <th>Avg Wt</th>
                                    <th>Picks</th>
                                    <th>Job Rate</th>
                                    <th>Grade</th>
                                    <th>Job Work Piece Rate</th>
                                    <th>Remarks</th>
                                    <th>Is Cutpiece</th>
                                    <th>
                                        <button class="btn btn-icon btn-xs btn-success btn-circle" type="button"
                                                onclick="addRow()"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="details_container">
                                @if(!empty($item?->details))
                                    @foreach($item?->details as $index => $row)
                                        <tr>
                                            <td>
                                                <select name="details[{{$index}}][quality_id]" class="form-control" onchange="change_sort_no(this,{{$index}})">
                                                    <option value="">Select</option>
                                                    @foreach ($sorts as $one)
                                                        <option value="{{ $one->id }}"
                                                            {{ ($row?->quality_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->sort_no  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][quality_name]" id="details_quality_name_{{$index}}" class="form-control"
                                                       value="{{ $row ? $row?->quality_name : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][char]" class="form-control"
                                                       value="{{ $row ? $row?->char : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][piece_no]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->piece_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][net_piece_mtrs]"
                                                       class="form-control" id="net_piece_mtrs_{{$index}}" onchange="change_piece_meter({{$index}})"
                                                       value="{{ $row ? $row?->net_piece_mtrs : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][fold]"
                                                       class="form-control" id="fold_{{$index}}" onchange="change_piece_meter({{$index}})"
                                                       value="{{ $row ? $row?->fold : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][piece_meter]"
                                                       class="form-control" id="piece_meter_{{$index}}" readonly
                                                       value="{{ $row ? $row?->piece_meter : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][weight]"
                                                       class="form-control" readonly
                                                       value="{{ $row ? $row?->weight : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][avg_wt]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->avg_wt : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][picks]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->picks : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="details[{{$index}}][job_rate]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->job_rate : '' }}"/>
                                            </td>
                                            <td>
                                                <select name="details[{{$index}}][grade_id]" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($grades as $one)
                                                        <option value="{{ $one->id }}"
                                                            {{ ($row?->grade_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->name  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][job_work_piece_rate]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->job_work_piece_rate : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][remarks]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->remarks : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="details[{{$index}}][is_cutpiece]" value="1"
                                                       class="form-control w-20px"
                                                    {{$row->is_cutpiece == '1' ? 'checked' : ''}}/>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
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
                        <div class="col-3">
                            <label>Is Last Piece</label>
                            <input type="checkbox" name="is_last_piece" class="w-100px h-20px"
                                   value="1" {{ $item && $item?->is_last_piece == 1 ? 'checked': '' }}/>
                        </div>
                    </div>
                    {{--Details--}}
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route($route.'.index') }}"
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
                $(document).ready(function () {


                });

                const change_vendor_group = (elm) => {
                    $("#po_id").html('<option value ="">Select</option>');
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('fabric_po.show', 0) }}',
                        data: {'vendor_group_id': $(elm).val()},
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status) {
                                let items = data.item;
                                $.each(items, function(index, item) {
                                    let option = `<option value ="${item.id}">${item.po_number}</option>`;
                                    $("#po_id").append(option);
                                });

                            }
                        },
                        error: function (data) {
                            // alert(data)
                        }
                    })
                };
                const change_sort_no= (elm, index) => {
                    $(`#details_quality_name_${index}`).val('');
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('sort.show', 0) }}',
                        data: {'id': $(elm).val()},
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status) {
                                let item = data.item;
                                $(`#details_quality_name_${index}`).val(item?.details);
                            }
                        },
                        error: function (data) {
                            // alert(data)
                        }
                    })
                };

                const addRow = () => {
                    let index = $("#details_container TR").length;
                    let tr = `<tr>`;
                    tr += `<td>`;
                    tr += `    <select name="details[${index}][quality_id]" class="form-control" onchange="change_sort_no(this,${index})">`;
                    tr += `        <option value="">Select</option>`;
                    tr += `        @foreach ($sorts as $one)`;
                    tr += `        <option value="{{ $one->id }}" >{{ $one->sort_no  }}</option>`;
                    tr += `        @endforeach`;
                    tr += `    </select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="text" name="details[${index}][quality_name]" id="details_quality_name_${index}" class="form-control"`;
                    tr += `           />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="text" name="details[${index}][char]" class="form-control" />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][piece_no]" class="form-control"  />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][net_piece_mtrs]" class="form-control" `;
                    tr += `    id="net_piece_mtrs_${index}" onchange="change_piece_meter(${index})"`;
                    tr += `    />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][fold]" class="form-control" `;
                    tr += `    id="fold_${index}" onchange="change_piece_meter(${index})"`;
                    tr += `    />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][piece_meter]" class="form-control" `;
                    tr += `    id="piece_meter_${index}" />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][weight]" class="form-control" `;
                    tr += `    id="weight_${index}" />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][avg_wt]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][picks]" class="form-control" />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" step="0.01" name="details[${index}][job_rate]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <select name="details[${index}][grade_id]" class="form-control">`;
                    tr += `        <option value="">Select</option>`;
                    tr += `        @foreach ($grades as $one)`;
                    tr += `        <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
                    tr += `        @endforeach`;
                    tr += `    </select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="text" name="details[${index}][job_work_piece_rate]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="text" name="details[${index}][remarks]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="checkbox" name="details[${index}][is_cutpiece]"`;
                    tr += `           value="1" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                    tr += `            onclick="$(this).closest('tr').remove();"><i`;
                    tr += `        class="fa fa-trash"></i></button>`;
                    tr += `</td>`;
                    tr += `</tr>`;
                    $("#details_container").append(tr);
                }

                const change_piece_meter = (index) => {
                  let net_piece_mtrs = $("#net_piece_mtrs_"+index).val() ?? 0;
                  let fold = $("#fold_"+index).val() ?? 0;
                  $("#piece_meter_"+index).val((parseFloat(net_piece_mtrs) / parseFloat(fold)));
                  $("#weight_"+index).val((parseFloat(net_piece_mtrs) / parseFloat(fold)));
                }
            </script>

    @endpush
