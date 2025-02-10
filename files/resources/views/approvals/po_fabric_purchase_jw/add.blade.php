@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'inspection_list';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} FABRIC INSPECTION
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
                            <select name="vendor_group_id" class="form-control" required >
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
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>WWWWWWWWW<b class="text-danger">*</b></th>
                                    <th>WWWWWWWWW<b class="text-danger">*</b></th>
                                    <th>
                                        <button class="btn btn-icon btn-xs btn-success btn-circle"
                                                type="button"
                                                onclick="addRow()"><i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="detail_container">
                                @if(!empty($detail))
                                    @foreach($detail?->lots as $index => $row)
                                        <tr>
                                            <td>
                                                <select
                                                    name="details[{{$index}}][cone_tip_color_id]"
                                                    class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($colors as $one)
                                                        <option value="{{ $one->id }}"
                                                            {{ ($row?->cone_tip_color_id == $one->id) ? 'selected' : '' }}
                                                        >{{ $one->name  }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="details[{{$index}}][lot_no]"
                                                       class="form-control"
                                                       value="{{ $row ? $row?->lot_no : '' }}"/>
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
            let index = $("#lots_container_"+i+" TR").length;
            let html = '';
            html += `<tr>`;
            html += `<td>`;
            html += `    <select`;
            html += `        name="details[${i}][lots][${index}][cone_tip_color_id]"`;
            html += `        class="form-control">`;
            html += `        <option value="">Select</option>`;
                    @foreach ($colors as $one)
            html += `        <option value="{{ $one->id }}" >{{ $one->name  }}</option>`;
                    @endforeach
            html += `    </select>`;
            html += `</td>`;
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
            $('#lots_container_'+i).append(html);
        };
    </script>
@endpush

