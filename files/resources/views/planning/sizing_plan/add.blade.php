@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/sizing_plan/'.$item?->id : '/sizing_plan' ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    {{--    @csrf--}}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Sizing Plan
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('sizing_plan.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Line 1--}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Sizing For<b class="text-danger">*</b></label>
                            <select name="sizing_for" class="form-control" required>
                                <option value="">Select</option>
                                <option value="jobwork" {{$item?->sizing_for == 'jobwork' ? 'selected' : '' }}>JobWork
                                </option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Sizing Name<b class="text-danger">*</b></label>
                            <select name="sizing_name_id" id="sizing_name_id" onchange="change_sizing_name()"
                                    class="form-control" required>
                                <option value="">Select</option>
                                @foreach($vendors as $one)
                                    <option
                                        value="{{$one->id}}" {{$item?->sizing_name_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Is Sizing Order</label>
                            <input type="checkbox" name="is_sizing_order" class="form-control w-20px" autocomplete="off"
                                   value="1" {{$item && $item?->is_sizing_order ? 'checked' : ''}}/>
                        </div>
                    </div>
                    {{-- Line 2--}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Planning Date<b class="text-danger">*</b></label>
                            <input type="date" name="planning_date" class="form-control" autocomplete="off"
                                   placeholder="Enter Planning Date" required
                                   value="{{$item ? $item?->planning_date : old('address') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Sizing Amount (Rs / Kg)<b class="text-danger">*</b></label>
                            <input type="number" step="0.01" name="sizing_amount" class="form-control"
                                   autocomplete="off"
                                   required value="{{$item ? $item?->sizing_amount : old('sizing_amount') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Remarks:</label>
                            <textarea name="remarks" rows="1"
                                      class="form-control">{{$item ? $item?->remarks : old('remarks') }}</textarea>
                        </div>

                    </div>
                    {{-- Line 3--}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Payment Terms<b class="text-danger">*</b></label>
                            <select name="payment_term_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($payment_terms as $one)
                                    <option
                                        value="{{$one->id}}" {{$item?->payment_term_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Machine Number<b class="text-danger">*</b></label>
                            <select name="machine_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($machines as $one)
                                    <option
                                        value="{{$one->id}}" {{$item?->machine_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Marchendiser<b class="text-danger">*</b></label>
                            <select name="merchandiser_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($employes as $one)
                                    <option
                                        value="{{$one->id}}" {{$item?->merchandiser_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    {{-- Line 4--}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Ref Number</label>
                            <input type="number" step="0.01" name="ref_number" class="form-control" autocomplete="off"
                                   value="{{$item ? $item?->ref_number : old('ref_number') }}"/>
                        </div>
                        <div class="col-4">
                            <label>Beam Receive Date<b class="text-danger">*</b></label>
                            <input type="date" name="beam_recieve_date" class="form-control" autocomplete="off"
                                   required
                                   value="{{$item ? $item?->beam_recieve_date : old('beam_recieve_date') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Vendor<b class="text-danger">*</b></label>
                            <select name="vendor_id" id="vendor_id" class="form-control" required>
                                <option value="">Select</option>
                                @if(!empty($item?->vendor))
                                    <option
                                        value="{{$item?->vendor->id}}" selected }}>{{$item?->vendor->name}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 border border-2 border-light-dark p-4">
                        {{-- Sub-line 1 --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Actual Count<b class="text-danger">*</b></label>
                                <select name="actual_count_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($yarns as $one)
                                        <option
                                            value="{{$one->id}}" {{$item?->actual_count_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Yarn<b class="text-danger">*</b></label>
                                <select name="yarn_id" id="yarn_id" onchange="change_yarn()" class="form-control"
                                        required>
                                    <option value="">Select</option>
                                    @foreach($yarns as $one)
                                        <option
                                            value="{{$one->id}}" {{$item?->yarn_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Count</label>
                                <input type="text" id="count" name="count" class="form-control"
                                       value="{{$item?->count ?? '' }}" readonly/>
                            </div>
                        </div>
                        {{-- Sub-line 2 --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Mill Name</label>
                                <select name="mill_name_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($mill_names as $one)
                                        <option
                                            value="{{$one->id}}" {{$item?->mill_name_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Cone Per Bag<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="cone_per_bag" class="form-control"
                                       autocomplete="off"
                                       id="cone_per_bag" onchange="change_weight_per_cone();"
                                       required value="{{$item ? $item?->cone_per_bag : old('cone_per_bag') }}"/>
                            </div>
                            <div class="col-4">
                                <label>Kg Per Bag<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="kg_per_bag" class="form-control"
                                       autocomplete="off"
                                       required id="kg_per_bag" onchange="change_weight_per_cone();"
                                       value="{{$item ? $item?->kg_per_bag : old('kg_per_bag') }}"/>
                            </div>
                        </div>
                        {{-- Sub-line 3 --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Weight Per Cone<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="weight_per_cone" class="form-control"
                                       autocomplete="off"
                                       required id="weight_per_cone" readonly
                                       value="{{$item ? $item?->weight_per_cone : old('weight_per_cone') }}"/>
                            </div>
                            <div class="col-4">
                                <label>Bottom Percent<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="bottom_percent" class="form-control"
                                       autocomplete="off"
                                       required
                                       value="{{$item ? $item?->bottom_percent : old('bottom_percent') }}"/>
                            </div>
                            <div class="col-4">
                                <label>Total Meter<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="total_meter" class="form-control"
                                       autocomplete="off"
                                       required value="{{$item ? $item?->total_meter : old('total_meter') }}"/>
                            </div>
                        </div>
                        {{-- Sub-line 4 --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Expected Meter<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="expected_meter" class="form-control"
                                       autocomplete="off"
                                       required
                                       value="{{$item ? $item?->expected_meter : old('expexcted_meter') }}"/>
                            </div>
                            <div class="col-4">
                                <label>Meter Per Part<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="meter_per_part" class="form-control"
                                       autocomplete="off"
                                       required
                                       value="{{$item ? $item?->meter_per_part : old('meter_per_part') }}"/>
                            </div>
                            <div class="col-4">
                                <label>No Of Bags Required<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="no_of_bags" id="no_of_bags" class="form-control"
                                       required value="{{$item ? $item?->no_of_bags : old('no_of_bags') }}"/>
                            </div>
                        </div>
                        {{-- Sub-line 5 --}}
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Copart<b class="text-danger">*</b></label>
                                <select name="copart_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($coparts as $one)
                                        <option
                                            value="{{$one->id}}" {{$item?->copart_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Given Meters<b class="text-danger">*</b></label>
                                <input type="number" step="0.01" name="given_meters" id="given_meters"
                                       class="form-control"
                                       required value="{{$item ? $item?->given_meters : old('given_meters') }}"/>
                            </div>
                        </div>
                        {{-- Table Yarns --}}
                        <div class="">
                            <h2 class="text-center">Yarn Details</h2>
                            <div class="">
                                <table class="table-hover table table-bordered">
                                    <tr class="table-primary">
                                        <th>Yarn<b class="text-danger">*</b></th>
                                        <th>Sort<b class="text-danger">*</b></th>
                                        <th>Sort Ends<b class="text-danger">*</b></th>
                                        <th>Sizing Ends<b class="text-danger">*</b></th>
                                        <th>Width<b class="text-danger">*</b></th>
                                        <th>Parts<b class="text-danger">*</b></th>
                                        <th>Ends per Parts<b class="text-danger">*</b></th>
                                        <th>DBF<b class="text-danger">*</b></th>
                                        <th>Weave Type<b class="text-danger">*</b></th>
                                        <th>Loom Type<b class="text-danger">*</b></th>
                                        <th>Meters<b class="text-danger">*</b></th>
                                        <th>Warp Meters<b class="text-danger">*</b></th>
                                        <th>
                                            <button
                                                class="btn btn-icon btn-success btn-sm btn-circle mr-2"
                                                type="button" onclick="add_yarn_detail()"><i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    <tbody id="yarn_details_body">
                                    {{-- Remplissage automatique --}}
                                    @foreach($item?->yarn_details ?? array() as $index => $row)
                                        {{--                                    @php($row = null)--}}
                                        {{--                                    @php($index = 0)--}}
                                        <tr>
                                            <td>
                                                <select name="yarn_details[{{$index}}][yarn_id]" class="form-control"
                                                        required>
                                                    <option value="">Select</option>
                                                    @foreach($yarns as $one)
                                                        <option
                                                            value="{{$one->id}}" {{$row?->yarn_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="yarn_details[{{$index}}][sort_id]" class="form-control"
                                                        onchange="change_sort({{$index}})" id="sort_id_{{$index}}"
                                                        required>
                                                    <option value="">Select</option>
                                                    @foreach($sorts as $one)
                                                        <option
                                                            value="{{$one->id}}" {{$row?->sort_id == $one->id ? 'selected' : '' }}>{{$one->sort_no}}
                                                            - {{$one->details}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="yarn_details[{{$index}}][sort_ends]"
                                                       class="form-control" autocomplete="off" required
                                                       id="sort_ends_{{$index}}" readonly
                                                       onchange="change_sizing_ends({{$index}})"
                                                       value="{{$row ? $row?->sort_ends : ''}}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="yarn_details[{{$index}}][sizing_ends]"
                                                       class="form-control" id="sizing_ends_{{$index}}" required
                                                       value="{{$row ? $row?->sizing_ends : ''}}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="yarn_details[{{$index}}][width]"
                                                       class="form-control" autocomplete="off" required
                                                       id="width_{{$index}}" onchange="change_sizing_ends({{$index}})"
                                                       value="{{$row ? $row?->width : ''}}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="yarn_details[{{$index}}][parts]"
                                                       class="form-control" id="parts_{{$index}}"
                                                       onchange="change_ends_per_parts({{$index}})"
                                                       value="{{$row ? $row?->parts : ''}}" required/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="yarn_details[{{$index}}][ends_per_parts]"
                                                       class="form-control" id="ends_per_parts_{{$index}}" required
                                                       value="{{$row ? $row?->ends_per_parts : ''}}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="yarn_details[{{$index}}][dbf]"
                                                       class="form-control" autocomplete="off" required
                                                       id="dbf_{{$index}}" value="{{$row ? $row?->dbf : ''}}"/>
                                            </td>
                                            <td>
                                                <select name="yarn_details[{{$index}}][weave_type_id]"
                                                        class="form-control" id="weave_type_id_{{$index}}" required>
                                                    <option value="">Select</option>
                                                    @foreach($weave_types as $one)
                                                        <option
                                                            value="{{$one->id}}" {{$row?->weave_type_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="yarn_details[{{$index}}][loom_type_id]"
                                                        class="form-control" id="loom_type_id_{{$index}}" required>
                                                    <option value="">Select</option>
                                                    @foreach($loom_types as $one)
                                                        <option
                                                            value="{{$one->id}}" {{$row?->loom_type_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="yarn_details[{{$index}}][meters]"
                                                       required
                                                       id="meters_{{$index}}" onchange="change_totals({{$index}})"
                                                       class="form-control meters"
                                                       value="{{$row ? $row?->meters : ''}}"/>
                                            </td>
                                            <td>
                                                <input type="number" step="0.01"
                                                       name="yarn_details[{{$index}}][warp_meters]"
                                                       class="form-control" id="warp_meters_{{$index}}" required
                                                       value="{{$row ? $row?->warp_meters : ''}}"/>
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-icon btn-danger btn-sm btn-circle delete_yarn_row"
                                                    type="button" onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="row p-4">
                        <div class="col-4">
                            Default Meter For Beam
                            <input type="checkbox" name="default_meter_for_beam" class="w-30px"
                                   autocomplete="off" value="1"
                                {{$item && $item?->default_meter_for_beam ? 'checked' : ''}}/>
                        </div>
                    </div>
                    <div class="border border-2 border-light-dark p-4">
                        <h2 class="text-center">Beam Details</h2>
                        <table class="table-hover table table-bordered">
                            <tr class="table-primary">
                                <th>BEAM NUMBER</th>
                                <th>WEAVER NAME</th>
                                <th>ORDER NUMBER</th>
                                <th>LOOM MODEL</th>
                                <th>LOOM NO</th>
                                <th>BEAM METERS</th>
                                <th>EXPECTED FABRIC MTRS</th>
                                <th>WARP METERS/BEAM</th>
                                <th>BEAM DIA</th>
                                <th>LOOM SHED</th>
                                <th>IS SETBEAM</th>
                                <th>
                                    <button
                                        class="btn btn-icon btn-success btn-sm btn-circle mr-2"
                                        type="button" onclick="add_beam_details()"><i class="fa fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                            <tbody id="beam_details_body">
                            {{-- Remplissage automatique --}}
                            @foreach($item?->beam_details ?? array() as $index => $row)
                                {{--                            @php($row = null)--}}
                                {{--                            @php($index = 0)--}}
                                <tr>
                                    <td>
                                        {{$index+1}}
                                    </td>
                                    <td>
                                        <select name="beam_details[{{$index}}][weaver_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($weavers as $one)
                                                <option
                                                    value="{{$one->id}}" {{$row?->weaver_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="beam_details[{{$index}}][order_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($orders as $one)
                                                <option
                                                    value="{{$one->id}}" {{$row?->order_id == $one->id ? 'selected' : '' }}>{{$one->order_no}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="beam_details[{{$index}}][loom_model_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($loom_models as $one)
                                                <option
                                                    value="{{$one->id}}" {{$row?->loom_model_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="beam_details[{{$index}}][loom_number_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($looms as $one)
                                                <option
                                                    value="{{$one->id}}" {{$row?->loom_number_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="beam_details[{{$index}}][beam_meters]"
                                               class="form-control"
                                               autocomplete="off"
                                               value="{{$row ? $row?->beam_meters : ''}}"/>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01"
                                               name="beam_details[{{$index}}][expected_fabric_mtrs]"
                                               class="form-control" autocomplete="off"
                                               value="{{$row ? $row?->expected_fabric_mtrs : ''}}"/>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="beam_details[{{$index}}][warp_meters]"
                                               class="form-control"
                                               value="{{$row ? $row?->warp_meters : ''}}"/>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="beam_details[{{$index}}][beam_dia]"
                                               class="form-control"
                                               autocomplete="off"
                                               value="{{$row ? $row?->beam_dia : ''}}"/>
                                    </td>
                                    <td>
                                        <select name="beam_details[{{$index}}][loom_ched_id]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($looms as $one)
                                                <option
                                                    value="{{$one->id}}" {{$row?->loom_ched_id == $one->id ? 'selected' : '' }}>{{$one->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="beam_details[{{$index}}][is_set_beam]"
                                               class="form-control w-30px" value="1"
                                            {{$row && $row?->is_set_beam ? 'checked' : ''}}/>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon btn-danger btn-sm btn-circle delete_beam_row "
                                                type="button"
                                                onclick="$(this).closest('tr').remove();"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-4">
                        <div class="col-4">
                            Is Complete
                            <input type="checkbox" name="is_complete" class="w-30px" value="1"
                                {{$item && $item?->is_complete ? 'checked' : ''}}/>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer text-center">
                            <button type="submit" name="submit" value="submit"
                                    class="btn btn-success font-weight-bolder mr-4 w-135px">
                                SAVE
                            </button>
                            <a href="{{ route('sizing_plan.index') }}"
                               class="btn btn-warning font-weight-bolder w-135px">
                                CANCEL
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}

        @endsection
        @push('scripts')
            <script>
                // Add row in yarn details table
                const add_yarn_detail = () => {
                    let index = $(".delete_yarn_row").length;
                    let html = `<tr>`;
                    html += ``;
                    html += `<tr>`;
                    html += `    <td>`;
                    html += `        <select name="yarn_details[${index}][yarn_id]" class="form-control"`;
                    html += `                required>`;
                    html += `            <option value="">Select</option>`;
                    @foreach($yarns as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="yarn_details[${index}][sort_id]" class="form-control"`;
                    html += `             onchange="change_sort(${index})" id="sort_id_${index}"   required>`;
                    html += `            <option value="">Select</option>`;
                    @foreach($sorts as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->sort_no}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" readonly name="yarn_details[${index}][sort_ends]"`;
                    html += `               id="sort_ends_${index}" onchange="change_sizing_ends(${index})"`;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][sizing_ends]"`;
                    html += `               id="sizing_ends_${index}"`;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][width]"`;
                    html += `               id="width_${index}" onchange="change_sizing_ends(${index})"`;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][parts]"`;
                    html += `               id="parts_${index}" onchange="change_ends_per_parts(${index})"`;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][ends_per_parts]"`;
                    html += `               id="ends_per_parts_${index}" `;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][dbf]"`;
                    html += `             id="dbf_${index}"  class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="yarn_details[${index}][weave_type_id]"`;
                    html += `               id="weave_type_id_${index}" class="form-control" required>`;
                    html += `            <option value="">Select</option>`;
                    @foreach($weave_types as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="yarn_details[${index}][loom_type_id]"`;
                    html += `               id="loom_type_id_${index}" class="form-control" required>`;
                    html += `            <option value="">Select</option>`;
                    @foreach($loom_types as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][meters]"`;
                    html += `                id="meters_${index}" onchange="change_totals(${index})"`;
                    html += `               class="form-control meters" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="yarn_details[${index}][warp_meters]"`;
                    html += `                 id="warp_meters_${index}"`;
                    html += `               class="form-control" autocomplete="off" required/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <button`;
                    html += `            class="btn btn-icon btn-danger btn-sm btn-circle delete_yarn_row"`;
                    html += `            type="button" onclick="$(this).closest('tr').remove();"><i`;
                    html += `            class="fa fa-trash"></i></button>`;
                    html += `    </td>`;
                    html += `</tr>`;
                    $("#yarn_details_body").append(html);
                }


                // Add row in beam details table
                const add_beam_details = () => {
                    let index = $(".delete_beam_row").length;
                    let html = `<tr>`;
                    html += `    <td>`;
                    html += `        ${index + 1}`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="beam_details[${index}][weaver_id]" class="form-control">`;
                    html += `            <option value="">Select</option>`;
                    @foreach($weavers as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="beam_details[${index}][order_id]" class="form-control">`;
                    html += `            <option value="">Select</option>`;
                    @foreach($orders as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->order_no}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="beam_details[${index}][loom_model_id]" class="form-control">`;
                    html += `            <option value="">Select</option>`;
                    @foreach($loom_models as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="beam_details[${index}][loom_number_id]" class="form-control">`;
                    html += `            <option value="">Select</option>`;
                    @foreach($looms as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="beam_details[${index}][beam_meters]"`;
                    html += `               class="form-control" autocomplete="off"/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="beam_details[${index}][expected_fabric_mtrs]"`;
                    html += `               class="form-control" autocomplete="off"/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="beam_details[${index}][warp_meters]"`;
                    html += `               class="form-control"/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="number" step="0.01" name="beam_details[${index}][beam_dia]"`;
                    html += `               class="form-control"/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <select name="beam_details[${index}][loom_ched_id]" class="form-control">`;
                    html += `            <option value="">Select</option>`;
                    @foreach($looms as $one)
                        html += `            <option`;
                    html += `                value="{{$one->id}}">{{$one->name}}</option>`;
                    @endforeach
                        html += `        </select>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <input type="checkbox" name="beam_details[${index}][is_set_beam]"`;
                    html += `               class="form-control w-30px" value="1"/>`;
                    html += `    </td>`;
                    html += `    <td>`;
                    html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle delete_beam_row "`;
                    html += `                type="button"`;
                    html += `                onclick="$(this).closest('tr').remove();"><i class="fa fa-trash"></i>`;
                    html += `        </i></button></td>`;
                    html += `        </button>`;
                    html += `    </td>`;
                    html += `</tr>`;
                    $("#beam_details_body").append(html);
                }


                const change_weight_per_cone = () => {
                    let cone_per_bag = $("#cone_per_bag").val() ?? 0;
                    let kg_per_bag = $("#kg_per_bag").val() ?? 0;
                    let weight_per_cone = parseFloat(kg_per_bag) / parseFloat(cone_per_bag);
                    $("#weight_per_cone").val(weight_per_cone)

                }

                const change_sizing_ends = (index) => {
                    let sort_ends = $("#sort_ends_" + index).val() ?? 0;
                    let width = $("#width_" + index).val() ?? 0;
                    let sizing_ends = parseFloat(sort_ends) * parseFloat(width);
                    $("#sizing_ends_" + index).val(sizing_ends)
                    change_ends_per_parts(index);
                }

                const change_ends_per_parts = (index) => {
                    let sort_ends = $("#sort_ends_" + index).val() ?? 0;
                    let width = $("#width_" + index).val() ?? 0;
                    let parts = $("#parts_" + index).val() ?? 0;
                    let value = parseFloat(sort_ends) * parseFloat(width) / parseFloat(parts);
                    $("#ends_per_parts_" + index).val(value);
                }

                const change_totals = (index) => {
                    $("#warp_meters_" + index).val($("#meters_" + index).val());
                }

                const change_sizing_name = () => {
                    let id = $("#sizing_name_id").val();
                    $("#vendor_id").html('<option value="">Select</option>');
                    if (id > 0) {
                        $("#vendor_id").append(`<option value="${id}">${$("#sizing_name_id").find('option:selected').text()}</option>`);
                    }
                }

                const change_yarn = () => {
                    let id = $("#yarn_id").val();
                    let count = $("#count");
                    count.val('');
                    if (id > 0) {
                        $.ajax({
                            url: '{{ route('yarn.show', 0) }}',
                            type: 'GET',
                            data: {
                                'id': id,
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.status) {
                                    count.val(data.item?.counts?.count ?? '');
                                }
                            }
                        });
                    }
                }

                const change_sort = (i) => {
                    let id = $("#sort_id_" + i).val();
                    let sort_ends = $("#sort_ends_" + i);
                    let sizing_ends = $("#sizing_ends_" + i);
                    let width = $("#width_" + i);
                    let weave_type_id = $("#weave_type_id_" + i);
                    let loom_type_id = $("#loom_type_id_" + i);
                    sizing_ends.val('');
                    width.val('');
                    weave_type_id.val('');
                    loom_type_id.val('');
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
                                    sizing_ends.val(data.item.ends_with_selvedge);
                                    sort_ends.val(data.item.ends_with_selvedge);
                                    width.val(data.item.width);
                                    weave_type_id.val(data.item.weave);
                                    loom_type_id.val(data.item.loom_type);
                                }
                            }
                        });
                    }
                }

            </script>
    @endpush
