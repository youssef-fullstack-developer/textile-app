@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action =  'beam_inward/'.$item?->id;
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
                            Receive Sizing Beams
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('beam_inward.index') }}"
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
                            <input type="text" class="form-control" readonly
                                   value="{{ $item?->sizing_name?->name ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Count<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" readonly
                                   value="{{ $item?->actual_count?->counts?->count ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Production For<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" readonly
                                   value="{{ $item?->sizing_for ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>No Of Beams<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" readonly
                                   value="{{ count($item?->beam_inward?->details ?? []) ?? '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Sizing Set No<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" readonly
                                   value="{{ $item?->plan_number ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Receive Date<b class="text-danger">*</b></label>
                            <input type="date" name="receive_date" class="form-control" required
                                   value="{{ $item?->beam_inward?->receive_date ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>No Of Cones Issued<b class="text-danger">*</b></label>
                            <input type="number" name="no_of_cones_issued" class="form-control" required
                                   value="{{ $item?->beam_inward?->no_of_cones_issued ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Quality<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" readonly
                                   value="{{ $item?->yarn?->name ?? '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Warp Count Measure<b class="text-danger">*</b></label>
                            <input type="number" name="warp_count_measure" class="form-control" required
                                   value="{{ $item?->beam_inward?->warp_count_measure ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Receipt No<b class="text-danger">*</b></label>
                            <input type="number" name="receipt_no" class="form-control" required
                                   value="{{ $item?->beam_inward?->receipt_no ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>DC No.<b class="text-danger">*</b></label>
                            <input type="text" name="dc_no" class="form-control" required
                                   value="{{ $item?->beam_inward?->dc_no ?? '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Vehicle No<b class="text-danger">*</b></label>
                            <input type="text" name="vehicle_no" class="form-control" required
                                   value="{{ $item?->beam_inward?->vehicle_no ?? '' }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>WEAVING CONTRACT NO</th>
                                    <th>RECEIVE MTRS</th>
                                    <th>BEAM NUMBER</th>
                                    <th>
                                        <button class="btn btn-icon btn-xs btn-success btn-circle" type="button"
                                                onclick="addRow()"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="details_container">
                                @if(!empty($item?->beam_inward?->details))
                                    @foreach($item?->beam_inward?->details as $index => $row)
                                        <tr>
                                            <td>
                                                <select name="details[{{$index}}][weaving_contract_id]"
                                                        class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($job_work_weaving_contracts as $one)
                                                        <option
                                                            value="{{ $one->id }}" {{ ($row?->weaving_contract_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->vendor?->name.'-'.$one->contract_number  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][receive_metrs]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->receive_metrs : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][beam_number]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->beam_number : '' }}"/>
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
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route('beam_inward.index') }}"
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


                const addRow = () => {
                    let index = $("#details_container TR").length;
                    let tr = '<tr>';
                    tr += '<td>';
                    tr += `    <select name="details[${index}][weaving_contract_id]"`;
                    tr += '            class="form-control">';
                    tr += '        <option value="">Select</option>';
                            @foreach ($job_work_weaving_contracts as $one)
                    tr += '        <option value="{{ $one->id }}">{{ $one->vendor?->name.'-'.$one->contract_number  }}</option>';
                            @endforeach
                    tr += '    </select>';
                    tr += '</td>';
                    tr += '<td>';
                    tr += `    <input type="text" name="details[${index}][receive_metrs]"`;
                    tr += '           class="form-control"/>';
                    tr += '</td>';
                    tr += '<td>';
                    tr += `    <input type="text" name="details[${index}][beam_number]"`;
                    tr += '           class="form-control"/>';
                    tr += '</td>';
                    tr += '<td>';
                    tr += '    <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"';
                    tr += `            onclick="$(this).closest('tr').remove();"><i`;
                    tr += '        class="fa fa-trash"></i></button>';
                    tr += '</td>';
                    tr += '</tr>';


                    $("#details_container").append(tr);
                }
            </script>

    @endpush
