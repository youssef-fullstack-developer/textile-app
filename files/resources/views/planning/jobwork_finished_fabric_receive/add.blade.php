@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'jobwork_finished_fabric_receive';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} JOBWORK FINISHED FABRIC RECEIVE
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
                            <label>Vendor Name<b class="text-danger">*</b></label>
                            <select name="vendor_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->vendor_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>JobWork Contract<b class="text-danger">*</b></label>
                            <select name="jobwork_process_contract_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($jobwork_contracts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->jobwork_process_contract_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->contract_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Slip No<b class="text-danger">*</b></label>
                            <input type="text" name="slip_no" class="form-control"
                                   value="{{$item ? $item?->slip_no : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Received Date<b class="text-danger">*</b></label>
                            <input type="date" name="received_date" class="form-control"
                                   value="{{$item ? $item?->received_date : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Location<b class="text-danger">*</b></label>
                            <select name="location_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->location_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>CHK No</label>
                            <input type="number" name="chk_no" class="form-control"
                                   value="{{$item ? $item?->chk_no : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>CHK Name</label>
                            <select name="chk_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($cheks as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->chk_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>ENT No</label>
                            <input type="text" name="ent_no" class="form-control"
                                   value="{{$item ? $item?->ent_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Lot Number<b class="text-danger">*</b></label>
                            <select name="lot_number" class="form-control">
                                <option value="">Select</option>
                                @foreach($lot_numbers ?? array() as $row)
                                    <option
                                        value="{{$row->val}}" {{ ($item?->lot_number == $row->val) ? 'selected' : '' }}
                                    >{{$row->val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>SL NO</th>
                                    <th>QUALITY</th>
                                    <th>DESIGN</th>
                                    <th>CHAR</th>
                                    <th>PIECE NO</th>
                                    <th>VENDOR PIECE NUMBER</th>
                                    <th>VENDOR LOT NUMBER</th>
                                    <th>ISSUED MTRS</th>
                                    <th>PIECE METER<b class="text-danger">*</b></th>
                                    <th>FOLD</th>
                                    <th>NET PIECE MTRS</th>
                                    <th>WEIGHT</th>
                                    <th>REMARKS</th>
                                    <th>IS CUTPIECE</th>
                                    <th>
                                        <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                type="button"
                                                onclick="addRow()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="detail_container">
                                @if(!empty($item))
                                    @foreach($item->details ?? array() as $index => $row)
                                        <tr>
                                            <td> {{$index + 1}} </td>
                                            <td>
                                                <select
                                                    name="details[{{$index}}][quality_id]" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach($sorts as $one)
                                                        <option value="{{ $one->id }}"
                                                            {{ ($row?->quality_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->details  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select
                                                    name="details[{{$index}}][design_id]" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][char]" class="form-control"
                                                       value="{{ $row ? $row?->char : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][piece_no]" class="form-control"
                                                       value="{{ $row ? $row?->piece_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][vendor_piece_number]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->vendor_piece_number : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][vendor_lot_number]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->vendor_lot_number : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][issued_mtrs]" class="form-control"
                                                       value="{{ $row ? $row?->issued_mtrs : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][piece_meter]" class="form-control"
                                                       value="{{ $row ? $row?->piece_meter : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][fold]" class="form-control"
                                                       value="{{ $row ? $row?->fold : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][net_piece_mtrs]" class="form-control"
                                                       value="{{ $row ? $row?->net_piece_mtrs : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][weight]" class="form-control"
                                                       value="{{ $row ? $row?->weight : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="details[{{$index}}][remarks]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->remarks : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="details[{{$index}}][is_cutpiece]"
                                                       class="form-control w-20px" value="1"
                                                       {{ $row && $row?->is_cutpiece ? 'checked' : '' }}/>
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
                    <div class="form-group row">
                        <div class="col-2">
                            <label>Is Last Piece</label>
                            <input type="checkbox" name="is_last_piece"
                                   class="form-control d-inline-block ml-10 h-20px w-20px"
                                   value="{{ $item ? $item?->is_last_piece : '' }}"/>
                        </div>
                    </div>
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
        const addRow = () => {
            let index = $("#detail_container  TR").length;
            let html = '';
            html += `<tr>`;
            html += `<td> ${index + 1} </td>`;
            html += `<td>`;
            html += `    <select`;
            html += `        name="details[${index}][quality_id]" class="form-control">`;
            html += `        <option value="">Select</option>`;
            @foreach($sorts as $one)
                html += `        <option value="{{ $one->id }}">{{ $one->details  }}</option>`;
            @endforeach
                html += `    </select>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <select`;
            html += `        name="details[${index}][design_id]" class="form-control">`;
            html += `        <option value="">Select</option>`;
            html += `    </select>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="text"`;
            html += `           name="details[${index}][char]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][piece_no]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][vendor_piece_number]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="text"`;
            html += `           name="details[${index}][vendor_lot_number]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][issued_mtrs]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][piece_meter]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][fold]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][net_piece_mtrs]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="number"`;
            html += `           name="details[${index}][weight]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="text" name="details[${index}][remarks]" class="form-control"/>`;
            html += `</td>`;
            html += `<td>`;
            html += `    <input type="checkbox" name="details[${index}][is_cutpiece]" class="form-control w-20px" />`;
            html += `</td>`;
            html += `<td>`;
            html += `    <button class="btn btn-icon btn-danger btn-sm btn-circle"`;
            html += `            type="button"`;
            html += `            onclick="$(this).closest('tr').remove();"><i`;
            html += `        class="fa fa-trash"></i></button>`;
            html += `</td>`;
            html += `</tr>`;
            $('#detail_container').append(html);
        };
    </script>
@endpush

