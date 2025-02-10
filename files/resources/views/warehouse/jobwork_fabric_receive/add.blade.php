@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'jobwork_fabric_receive';
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
                            JOBWORK CONTRACT FABRIC RECEIVE
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
                            <label>Vendor Name<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($vendors as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->vendor_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>JobWork Contract<b class="text-danger">*</b></label>
                            <select name="jobwork_id" class="form-control" onchange="change_jobwork(this)" required>
                                <option value="">Select</option>
                                @foreach ($jobworks as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->jobwork_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->contract_number  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Pick rate<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="pick_rate" id="pick_rate" class="form-control"
                                   value="{{ $item ? $item?->pick_rate : '' }}" required />
                        </div>
                        <div class="col-3">
                            <label>Slip No<b class="text-danger">*</b></label>
                            <input type="text" name="slip_no" class="form-control"
                                   value="{{ $item ? $item?->slip_no : '' }}" required />
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Received Date<b class="text-danger">*</b></label>
                            <input type="date" name="received_date" class="form-control"
                                   value="{{ $item ? $item?->received_date : '' }}" required />
                        </div>
                        <div class="col-3">
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
                        <div class="col-3">
                            <label>CHK Name<b class="text-danger">*</b></label>
                            <select name="chk_name_id" class="form-control" required >
                                <option value="">Select</option>
                                @foreach ($chks as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->chk_name_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>CHK No<b class="text-danger">*</b></label>
                            <input type="number" name="chk_no" class="form-control"
                                   value="{{ $item ? $item?->chk_no : '' }}" required />
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Picks</label>
                            <input type="number" name="picks" id="picks" class="form-control"
                                   value="{{ $item ? $item?->picks : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Unit No</label>
                            <input type="number" name="unit_no" class="form-control"
                                   value="{{ $item ? $item?->unit_no : '' }}"/>
                        </div>
                        <div class="col-2">
                            <label>Total Beam Inward Mtrs</label>
                            <input type="text" name="total_beam_inward_mtrs" class="form-control" readonly
                                   value="{{ $item ? $item?->total_beam_inward_mtrs : '' }}"/>
                        </div>
                        <div class="col-2">
                            <label>Total Fabric Receive Mtrs</label>
                            <input type="text" name="total_fabric_receive_ptrs" class="form-control" readonly
                                   value="{{ $item ? $item?->total_fabric_receive_ptrs : '' }}"/>
                        </div>
                        <div class="col-2">
                            <label>Balance Mtrs</label>
                            <input type="text" name="balance_mtrs" class="form-control" readonly
                                   value="{{ $item ? $item?->balance_mtrs : '' }}"/>
                        </div>
                    </div>
                    {{-- Line Table --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>Quality</th>
                                    <th>Char</th>
                                    <th>Piece No<b class="text-danger">*</b></th>
                                    <th>Vendor Piece Number<b class="text-danger">*</b></th>
                                    <th>Net Piece Mtrs</th>
                                    <th>Fold</th>
                                    <th>Piece Meter<b class="text-danger">*</b></th>
                                    <th>Weight<b class="text-danger">*</b></th>
                                    <th>Avg Wt</th>
                                    <th>Picks<b class="text-danger">*</b></th>
                                    <th>Job Rate</th>
                                    <th>Grade</th>
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
                                                <select name="details[{{$index}}][quality_id]" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($sorts as $one)
                                                        <option value="{{ $one->id }}"
                                                            {{ ($row?->quality_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->details  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][char]" class="form-control"
                                                       value="{{ $row ? $row?->char : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][piece_no]"
                                                       class="form-control"
                                                       required value="{{ $row ? $row?->piece_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][vendor_piece_number]"
                                                       class="form-control"
                                                       required value="{{ $row ? $row?->vendor_piece_number : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][net_piece_mtrs]"
                                                       class="form-control" id="net_piece_mtrs_{{$index}}" onchange="change_piece_meter({{$index}})"
                                                       value="{{ $row ? $row?->net_piece_mtrs : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][fold]"
                                                       class="form-control" id="fold_{{$index}}" onchange="change_piece_meter({{$index}})"
                                                       value="{{ $row ? $row?->fold : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][piece_meter]"
                                                       class="form-control" id="piece_meter_{{$index}}" readonly
                                                       required value="{{ $row ? $row?->piece_meter : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][weight]"
                                                       class="form-control" readonly
                                                       required value="{{ $row ? $row?->weight : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][avg_wt]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->avg_wt : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][picks]"
                                                       class="form-control"
                                                       required value="{{ $row ? $row?->picks : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number" name="details[{{$index}}][job_rate]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->job_rate : '' }}"/>
                                            </td>
                                            <td>
                                                <select name="details[{{$index}}][grade]" class="form-control">
                                                    <option value="">Select</option>
                                                    <option
                                                        value="PASS" {{ ($row?->grade == 'PASS') ? 'selected' : '' }}>
                                                        PASS
                                                    </option>
                                                    <option value="B" {{ ($row?->grade == 'B') ? 'selected' : '' }}>B
                                                    </option>
                                                    <option value="C" {{ ($row?->grade == 'C') ? 'selected' : '' }}>C
                                                    </option>
                                                    <option value="R" {{ ($row?->grade == 'R') ? 'selected' : '' }}>R
                                                    </option>
                                                    <option
                                                        value="HOLD" {{ ($row?->grade == 'HOLD') ? 'selected' : '' }}>
                                                        HOLD
                                                    </option>
                                                    <option
                                                        value="FAIL" {{ ($row?->grade == 'FAIL') ? 'selected' : '' }}>
                                                        FAIL
                                                    </option>
                                                    <option value="LAB" {{ ($row?->grade == 'LAB') ? 'selected' : '' }}>
                                                        LAB
                                                    </option>
                                                </select>
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
                        <a href="{{ route('jobwork_fabric_receive.index') }}"
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

                const change_jobwork = (elm) => {
                    $("#pick_rate").val('');
                    $("#picks").val('');
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('jobwork_weaving_contract.show', 0) }}',
                        data: {'id': $(elm).val()},
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status) {
                                let item = data.item;
                                $('#pick_rate').val(item?.pick_rate);
                                $('#picks').val(item?.sort?.picks);
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
                    tr += `    <select name="details[${index}][quality_id]" class="form-control">`;
                    tr += `        <option value="">Select</option>`;
                    @foreach ($sorts as $one)
                        tr += `        <option value="{{ $one->id }}"  >{{ $one->details  }}</option>`;
                    @endforeach
                        tr += `    </select>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="text" name="details[${index}][char]" class="form-control" />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][piece_no]" class="form-control" required  />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][vendor_piece_number]" class="form-control" required />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][net_piece_mtrs]" class="form-control" `;
                    tr += `    id="net_piece_mtrs_${index}" onchange="change_piece_meter(${index})"`;
                    tr += `    />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][fold]" class="form-control" `;
                    tr += `    id="fold_${index}" onchange="change_piece_meter(${index})"`;
                    tr += `    />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][piece_meter]" class="form-control" required `;
                    tr += `    id="piece_meter_${index}" readonly />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][weight]" class="form-control" required `;
                    tr += `    id="weight_${index}" readonly />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][avg_wt]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][picks]" class="form-control" required />`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <input type="number" name="details[${index}][job_rate]" class="form-control"/>`;
                    tr += `</td>`;
                    tr += `<td>`;
                    tr += `    <select name="details[${index}][grade]" class="form-control">`;
                    tr += `        <option value="">Select</option>`;
                    tr += `        <option value="PASS" >PASS</option>`;
                    tr += `        <option value="B" >B</option>`;
                    tr += `        <option value="C" >C</option>`;
                    tr += `        <option value="R" >R</option>`;
                    tr += `        <option value="HOLD" >HOLD</option>`;
                    tr += `        <option value="FAIL" >FAIL</option>`;
                    tr += `        <option value="LAB" >LAB</option>`;
                    tr += `    </select>`;
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
