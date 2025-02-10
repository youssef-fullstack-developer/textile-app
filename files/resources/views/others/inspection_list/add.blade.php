@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'inspection_list';
        $action = $jobwork?->id > 0 ? route($route.'.update', $jobwork?->id) : route($route.'.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($jobwork?->id > 0)
        @method('PUT')
    @endif
    <input type="hidden" name="jobwork_fabric_receive_id" value="{{$type == 'finished' ? '' : $jobwork?->id}}">
    <input type="hidden" name="jobwork_finished_fabric_receive_id" value="{{$type == 'finished' ? $jobwork?->id : ''}}">
    <input type="hidden" name="jobwork_finished_fabric_receive_id" value="{{$type == 'fabric' ? $jobwork?->id : ''}}">
    <input type="hidden" name="type" value="{{$type ?? ''}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{$type == 'finished' ? 'FINISHED' : ''}} FABRIC INSPECTION
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
                            <label>Quality </label>
                            <select name="quality_id" class="form-control" onchange="change_quality(this)">
                                <option value="">Select</option>
                                @foreach($sorts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->quality_id == $row->id) ? 'selected' : (($jobwork?->quality_id == $row->id) ? 'selected' : '') }}
                                    >{{$row->details}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Width</label>
                            <input type="text" name="width" class="form-control"
                                   value="{{$item ? $item?->width : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Inspection Date<b class="text-danger">*</b></label>
                            <input type="date" name="inspection_date" class="form-control"
                                   value="{{$item ? $item?->inspection_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>EPI</label>
                            <input type="text" name="epi" id="epi" class="form-control"
                                   value="{{$item ? $item?->epi : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>PPI</label>
                            <input type="text" name="ppi" id="ppi" class="form-control"
                                   value="{{$item ? $item?->ppi : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Weft Count</label>
                            <input type="text" name="weft_count" id="weft_count" class="form-control"
                                   value="{{$item ? $item?->weft_count : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Warp Count</label>
                            <input type="text" name="warp_count" id="warp_count" class="form-control"
                                   value="{{$item ? $item?->warp_count : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Shift</label>
                            <select name="shift" class="form-control">
                                <option value="">Select</option>
                                @foreach($shifts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->shift == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Remark</label>
                            <input type="text" name="remark" class="form-control"
                                   value="{{$item ? $item?->remark : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Packing Type</label>
                            <select name="packing_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($packings as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->packing_type_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Is First Meter Inspection</label>
                            <input type="text" class="form-control" readonly
                                   value="{{$item ? $item?->is_first_meter_inspection : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Is Last Piece</label>
                            <input type="text" class="form-control" readonly
                                   value="{{ ($type == 'finished' ? $jobwork?->jobwork_finished_fabric_receive?->is_last_piece : $jobwork?->jobwork_fabric_receive?->is_last_piece) == '1' ? 'Yes' : 'No' }}"/>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Checker Name</label>
                            <select name="checker_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($checkers as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->checker_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Vendor Group</label>
                            <select name="vendor_group_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendor_groups as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_group_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->group}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div id="details_container">
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
                            <div id="detail_container">
                                @php($details = array())
                                @if(!empty($item->details) || !empty($jobwork))
                                    @if(!empty($item->details))
                                        @php($details = $item->details)
                                    @elseif(empty($item->details) && !empty($jobwork))
                                        @php($details[] = $jobwork)
                                    @else
                                        @php($details = array())
                                    @endif

                                    @foreach($details as $index => $row)
                                        @php($inward_meters = $row->inward_meters ?? '0')
                                        @php($after_fold_length = $row->after_fold_length ?? '0')
                                        @php($shortage_excess_quantity = $row->shortage_excess_quantity ?? '0')
                                        @php($weight = $row->weight ?? '0')
                                        @php($grade_id = $item->grade_id ?? $row->grade_id)
                                        @if(empty($item->details) && !empty($jobwork))
                                            @php($inward_meters = $row->net_piece_mtrs ?? 0)
                                            @php($after_fold_length = $row->piece_meter ?? 0)
                                            @php($shortage_excess_quantity = 0)
                                            @php($weight = $row->avg_wt ?? 0)
                                            @php($grade_id = $item->grade_id ?? ($row->grade && is_object($row->grade) ? $row->grade?->id : 0))
                                        @endif
                                        <div class="form-group border p-3 border-dark border-2 tr">
                                            <input type="hidden" name="details[{{$index}}][id]"
                                                   value="{{ !empty($item->details) && $row ? $row?->id : '' }}">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="col-12 text-right">
                                                        <button
                                                            class="btn btn-icon btn-danger btn-sm btn-circle btn_delete_row"
                                                            type="button"
                                                            onclick="$(this).closest('.tr').remove();"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Table 1 --}}
                                            <div class="col-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr class="table-primary">
                                                        <th>PIECE NO</th>
                                                        <th>INWARD METERS</th>
                                                        <th>AFTER FOLD LENGTH</th>
                                                        <th>SHORTAGE/EXCESS QUANTITY</th>
                                                        <th>WEIGHT</th>
                                                        <th>AVG WEIGHT</th>
                                                        <th>MEASURED WIDTH IN INCHES</th>
                                                        <th>TOTAL DEFECT</th>
                                                        <th>DEFECT POINT</th>
                                                        <th>GRADE</th>
                                                        <th>BATCH</th>
                                                        <th>FENT</th>
                                                        <th>FOLD</th>
                                                        <th>TOTAL MTRS<b class="text-danger">*</b>
                                                        <th>IS SAMPLE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                   name="details[{{$index}}][piece_no]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->piece_no : $jobwork?->piece_no }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][inward_meters]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $inward_meters : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][after_fold_length]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $after_fold_length : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][shortage_excess_quantity]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $shortage_excess_quantity : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][weight]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $weight : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][avg_weight]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->avg_weight : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][measured_width_in_inches]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->measured_width_in_inches : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][total_defect]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->total_defect : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][defect_point]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->defect_point : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <select
                                                                name="details[{{$index}}][grade_id]"
                                                                class="form-control">
                                                                <option value="">Select</option>
                                                                @foreach($grades as $one)
                                                                    <option value="{{ $one->id }}"
                                                                        {{ ($grade_id == $one->id) ? 'selected' : '' }}
                                                                    >{{ $one->name  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   name="details[{{$index}}][batch]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->batch : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][fent]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->fent : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][fold]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->fold : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                   name="details[{{$index}}][total_mtrs]"
                                                                   class="form-control"
                                                                   value="{{ $row ? $row?->total_mtrs : '' }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox"
                                                                   name="details[{{$index}}][is_sample]"
                                                                   class="form-control w-20px" value="1"
                                                                {{$row && $row?->is_sample ? 'checked' : ''}}/>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- Table 2 --}}
                                            <div class="col-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr class="table-primary">
                                                        <th>VARIATION</th>
                                                        <th>FROM MTRS</th>
                                                        <th>TO MTRS</th>
                                                        <th>REASON</th>
                                                        <th>DEFECT POINTS</th>
                                                        <th>WEAVER NAME</th>
                                                        <th>
                                                            <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                                    type="button"
                                                                    onclick="addRowDetails('{{$index}}')"><i
                                                                    class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="detail_details_{{$index}}">
                                                    @if(!empty($row->variations))
                                                        @foreach($row?->variations as $i => $line)
                                                            <tr>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                           name="details[{{$index}}][variations][{{$i}}][variation]"
                                                                           value="{{ $line ? $line?->variation : '' }}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                           name="details[{{$index}}][variations][{{$i}}][from_mtrs]"
                                                                           value="{{ $line ? $line?->from_mtrs : '' }}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                           name="details[{{$index}}][variations][{{$i}}][to_mtrs]"
                                                                           value="{{ $line ? $line?->to_mtrs : '' }}"/>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="details[{{$index}}][variations][{{$i}}][reason_id]"
                                                                        class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach($reasons ?? array() as $one)
                                                                            <option value="{{ $one->id }}"
                                                                                {{ ($line?->reason_id == $one->id) ? 'selected' : '' }}
                                                                            >{{ $one->name  }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                           name="details[{{$index}}][variations][{{$i}}][defect_points]"
                                                                           value="{{ $line ? $line?->defect_points : '' }}"/>
                                                                </td>
                                                                <td>
                                                                    <select
                                                                        name="details[{{$index}}][variations][{{$i}}][weaver_id]"
                                                                        class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach($weavers as $one)
                                                                            <option value="{{ $one->id }}"
                                                                                {{ ($line?->weaver_id == $one->id) ? 'selected' : '' }}
                                                                            >{{ $one->name  }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <button
                                                                        class="btn btn-icon btn-danger btn-sm btn-circle"
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
                                    @endforeach
                                @endif
                            </div>
                        </div>
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
            let index = $("#detail_container .tr").length;
            let html = ``;
            html += `<div class="form-group border p-3 border-dark border-2 tr">`;
            html += `    <input type="hidden" name="details[${index}][id]"`;
            html += `           value="">`;
            html += `        <div class="form-group row">`;
            html += `            <div class="col-12">`;
            html += `                <div class="col-12 text-right">`;
            html += `                    <button`;
            html += `                        class="btn btn-icon btn-danger btn-sm btn-circle btn_delete_row"`;
            html += `                        type="button"`;
            html += `                        onclick="$(this).closest('.tr').remove();"><i`;
            html += `                        class="fa fa-trash"></i></button>`;
            html += `                </div>`;
            html += `            </div>`;
            html += `        </div>`;
            html += `        {{-- Table 1 --}}`;
            html += `        <div class="col-12">`;
            html += `        <table class="table table-bordered table-hover">`;
            html += `            <thead>`;
            html += `            <tr class="table-primary">`;
            html += `                <th>PIECE NO</th>`;
            html += `                <th>INWARD METERS</th>`;
            html += `                <th>AFTER FOLD LENGTH</th>`;
            html += `                <th>SHORTAGE/EXCESS QUANTITY</th>`;
            html += `                <th>WEIGHT</th>`;
            html += `                <th>AVG WEIGHT</th>`;
            html += `                <th>MEASURED WIDTH IN INCHES</th>`;
            html += `                <th>TOTAL DEFECT</th>`;
            html += `                <th>DEFECT POINT</th>`;
            html += `                <th>GRADE</th>`;
            html += `                <th>BATCH</th>`;
            html += `                <th>FENT</th>`;
            html += `                <th>FOLD</th>`;
            html += `                <th>TOTAL MTRS<b class="text-danger">*</b>`;
            html += `                <th>IS SAMPLE</th>`;
            html += `            </tr>`;
            html += `            </thead>`;
            html += `            <tbody>`;
            html += `            <tr>`;
            html += `                <td>`;
            html += `                    <input type="text"`;
            html += `                           name="details[${index}][piece_no]"`;
            html += `                           class="form-control" value="{{$jobwork?->piece_no}}" />`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][inward_meters]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][after_fold_length]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][shortage_excess_quantity]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][weight]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][avg_weight]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][measured_width_in_inches]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][total_defect]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][defect_point]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <select`;
            html += `                        name="details[${index}][grade_id]"`;
            html += `                        class="form-control">`;
            html += `                        <option value="">Select</option>`;
            @foreach($grades as $one)
                html += `                        <option value="{{ $one->id }}">{{ $one->name  }}</option>`;
            @endforeach
                html += `                    </select>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="text"`;
            html += `                           name="details[${index}][batch]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][fent]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][fold]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="number"`;
            html += `                           name="details[${index}][total_mtrs]"`;
            html += `                           class="form-control"/>`;
            html += `                </td>`;
            html += `                <td>`;
            html += `                    <input type="checkbox" value="1" `;
            html += `                           name="details[${index}][is_sample]"`;
            html += `                           class="form-control w-20px"/>`;
            html += `                </td>`;
            html += `            </tr>`;
            html += `            </tbody>`;
            html += `        </table>`;
            html += `        </div>`;
            html += `        {{-- Table 2 --}}`;
            html += `        <div class="col-12">`;
            html += `        <table class="table table-bordered table-hover">`;
            html += `            <thead>`;
            html += `            <tr class="table-primary">`;
            html += `                <th>VARIATION</th>`;
            html += `                <th>FROM MTRS</th>`;
            html += `                <th>TO MTRS</th>`;
            html += `                <th>REASON</th>`;
            html += `                <th>DEFECT POINTS</th>`;
            html += `                <th>WEAVER NAME</th>`;
            html += `                <th>`;
            html += `                    <button class="btn btn-icon btn-xs btn-success btn-circle"`;
            html += `                            type="button"`;
            html += `                            onclick="addRowDetails('${index}')"><i`;
            html += `                        class="fa fa-plus"></i>`;
            html += `                    </button>`;
            html += `                </th>`;
            html += `            </tr>`;
            html += `            </thead>`;
            html += `            <tbody id="detail_details_${index}">`;
            html += `<tr>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][0][variation]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][0][from_mtrs]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][0][to_mtrs]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="details[${index}][variations][0][reason_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($reasons ?? array() as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number"class="form-control"`;
            html += `               name="details[${index}][variations][][defect_points]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="details[${index}][variations][0][weaver_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($weavers as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button`;
            html += `            class="btn btn-icon btn-danger btn-sm btn-circle"`;
            html += `            type="button" onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            html += `</tr>`;
            html += `        </tbody>`;
            html += `    </table>`;
            html += `    </div>`;
            html += `</div>`;

            $('#detail_container').append(html);
        };

        const addRowDetails = (index) => {
            let i = $("#detail_details_" + index + " TR").length;
            let html = `<tr>`;
            html += `<tr>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][${i}][variation]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][${i}][from_mtrs]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" class="form-control"`;
            html += `               name="details[${index}][variations][${i}][to_mtrs]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="details[${index}][variations][${i}][reason_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($reasons ?? array() as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number"class="form-control"`;
            html += `               name="details[${index}][variations][${i}][defect_points]" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="details[${index}][variations][${i}][weaver_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($weavers as $one)
                html += `            <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button`;
            html += `            class="btn btn-icon btn-danger btn-sm btn-circle"`;
            html += `            type="button" onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            html += `</tr>`;
            $('#detail_details_' + index).append(html);
        };

        const change_quality = (elm) => {
            let id = $(elm).val();
            let epi = $("#epi");
            let ppi = $("#ppi");
            let weft_count = $("#weft_count");
            let warp_count = $("#warp_count");
            epi.val('');
            ppi.val('');
            weft_count.val('');
            warp_count.val('');
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
                            let item = data.item;
                            epi.val(item.epi);
                            ppi.val(item.picks);
                            let val_weft_count = '';
                            let val_warp_count = '';
                            console.log(item.wefts);
                            $.each(item.wefts, function (index, one) {
                                val_weft_count += one.material?.counts?.count ?? '';
                                val_weft_count += ', ';
                            });
                            $.each(item.warps, function (index, one) {
                                val_warp_count += one.material?.counts?.count ?? '';
                                val_warp_count += ', ';
                            });
                            weft_count.val(val_weft_count.slice(0, -2));
                            warp_count.val(val_warp_count.slice(0, -2));
                        }
                    }
                });
            }
        }


    </script>
@endpush

