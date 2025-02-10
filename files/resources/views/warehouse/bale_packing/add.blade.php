@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'bale_packing';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} BALE/ROLL PACKING
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
                            <label>Packing Date<b class="text-danger">*</b></label>
                            <input type="date" name="packing_date" class="form-control"
                                   value="{{$item ? $item?->packing_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Packing Type<b class="text-danger">*</b></label>
                            <select name="packing_type_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($packing_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->packing_type_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Order Type</label>
                            <select name="order_type" class="form-control"  >
                                <option value="">Select</option>
                                <option value="export" {{ ($item?->order_type == 'export') ? 'selected' : '' }}>export</option>
                                <option value="domestic" {{ ($item?->order_type == 'domestic') ? 'selected' : '' }}>domestic</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Buyer</label>
                            <select name="buyer_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($buyers as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->buyer_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Order No.</label>
                            <select name="order_id" class="form-control" >
                                <option value="">Select</option>
                                @foreach($orders as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->order_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->order_no}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Bale Length<b class="text-danger">*</b></label>
                            <select name="bale_length" class="form-control"  >
                                <option value="">Select</option>
                                <option value="good length" {{ ($item?->bale_length == 'good length') ? 'selected' : '' }}>good length</option>
                                <option value="short length" {{ ($item?->bale_length == 'short length') ? 'selected' : '' }}>short length</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Quality<b class="text-danger">*</b></label>
                            <select name="quality_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($sorts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->quality_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->details}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Yard<b class="text-danger">*</b></label>
                            <select name="yard_id" class="form-control"  >
                                <option value="">Select</option>
                                <option value="1" {{ ($item?->yard_id == 1) ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ ($item?->yard_id == 0) ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Tare Weight<b class="text-danger">*</b></label>
                            <input type="number" name="tare_weight" class="form-control"
                                   value="{{$item ? $item?->tare_weight : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Gross Weight</label>
                            <input type="number" name="gross_weight" class="form-control"
                                   value="{{$item ? $item?->gross_weight : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Location<b class="text-danger">*</b></label>
                            <select name="location" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->location == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Company</label>
                            <input type="text" name="company" class="form-control" readonly
                                   value="{{$item ? $item?->company : session('company') }}"/>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Bale/Roll Number<b class="text-danger">*</b></label>
                            <input type="number" name="bale_roll_number" class="form-control"
                                   value="{{$item ? $item?->bale_roll_number : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Bale/Roll Manual No.</label>
                            <input type="number" name="bale_roll_manual_no" class="form-control"
                                   value="{{$item ? $item?->bale_roll_manual_no : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Loom Type</label>
                            <select name="loom_type_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($loom_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->loom_type_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Consignee</label>
                            <select name="consignee_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->consignee_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 5 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Remarks</label>
                            <input type="text" name="remarks" class="form-control"
                                   value="{{$item ? $item?->remarks : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Conversion</label>
                            <input type="text" name="conversion" class="form-control"
                                   value="{{$item ? $item?->conversion : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>By Location</label>
                            <input type="checkbox" name="by_location" class="form-control w-20px"
                                   value="1" {{$item && $item?->by_location ? 'checked' : '' }}/>
                        </div>
                        <div class="col-3">
                            <label>Grade<b class="text-danger">*</b></label>
                            <select name="grade_id" class="form-control"  >
                                <option value="">Select</option>
                                @foreach($grades as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->grade_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 6 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Rack Location</label>
                            <input type="date" name="rack_location" class="form-control"
                                   value="{{$item ? $item?->rack_location : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Fabric Seconds Sales</label>
                            <input type="checkbox" name="fabric_seconds_sales" class="form-control w-20px"
                                   value="1" {{$item && $item?->fabric_seconds_sales ? 'checked' : '' }}/>
                        </div>
                        <div class="col-3">
                            <label>Piece No. to scan</label>
                            <input type="text" name="piece_no_to_scan" class="form-control"
                                   value="{{$item ? $item?->piece_no_to_scan : '' }}"/>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>PIECE NUMBER<b class="text-danger">*</b></th>
                                    <th>PIECE METERS</th>
                                    <th>LOCATION</th>
                                    <th>YARD</th>
                                    <th>NET WT</th>
                                    <th>AVG WT.</th>
                                    <th>GLM</th>
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
                                    @foreach($item->details ?? array()  as $index => $row)
                                        <tr>
                                            <td>
                                                <select
                                                    name="details[{{$index}}][piece_number_id]"
                                                    class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach($piece_numbers as $one)
                                                        <option value="{{ $one->val }}"
                                                            {{ ($row?->piece_number_id == $one->val) ? 'selected' : '' }}
                                                        >{{ $one->val  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][piece_meters]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->piece_meters : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       name="details[{{$index}}][location]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->location : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][yard]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->yard : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][net_wt]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->net_wt : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][avg_wt]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->avg_wt : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][glm]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->glm : '' }}"/>
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
            let index = $("#detail_container TR").length;
            let html = '';
            html += `<tr>`;
            html += `    <td>`;
            html += `        <select`;
            html += `            name="details[${index}][piece_number_id]"`;
            html += `            class="form-control">`;
            html += `            <option value="">Select</option>`;
                        @foreach($piece_numbers as $one)
            html += `            <option value="{{ $one->val }}" >{{ $one->val  }}</option>`;
                        @endforeach
            html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="details[${index}][piece_meters]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" name="details[${index}][location]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="details[${index}][yard]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="details[${index}][net_wt]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="details[${index}][avg_wt]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="number" name="details[${index}][glm]" class="form-control" />`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle"`;
            html += `                type="button" onclick="$(this).closest('tr').remove();"><i`;
            html += `            class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#detail_container').append(html);
        };
    </script>
@endpush

