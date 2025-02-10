@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/shades/'.$item?->id : '/shades' ;
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} Shade
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('shades.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Shade:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Shade" value="{{ $item ? $item->name : old('name') }}" required/>
                        </div>

                        <div class="col-4">
                            <label>Parent Sort:</label>
                            <select name="parent_sort_id" id="parent_sort_id" class="form-control"
                                    onchange="parent_sort_changed()">
                                <option value="">Select Parent Sort</option>
                                @foreach ($sorts as $one)
                                    <option
                                        value="{{ $one->id }}" {{ ($item?->parent_sort_id == $one->id) ? 'selected' : '' }}
                                    >{{ $one->details }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>WARP/WEFT</th>
                                    <th>PATTERN</th>
                                    <th>ACTUAL MATERIAL</th>
                                    <th>MATERIAL</th>
                                </tr>
                                <tbody id="tbl">
                                {{-- Warps List --}}
                                @if(!empty($item->warps))
                                @foreach ($item->warps as $key => $one)
                                    <tr>
                                        <td>Warp{{$key+1}}</td>
                                        <td>{{$one->actual_material?->warp_pattern}}</td>
                                        <td>
                                            <input type="hidden" name="warps[{{$key}}][actual_id]"
                                                   value="{{$one->actual_material?->material?->id}}">{{$one->actual_material?->material?->name}}
                                        </td>
                                        <td>
                                            <select class="form-control" name="warps[{{$key}}][material_id]">
                                                <option value="">Select Material</option>
                                                @foreach ($yarns as $yarn)
                                                    <option
                                                        value="{{ $yarn->id }}" {{$one->material_id == $yarn->id ? 'selected' : ''}}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                {{-- Wefts List --}}
                                @if(!empty($item->wefts))
                                    @foreach ($item->wefts as $key => $one)
                                    <tr>
                                        <td>Weft{{$key+1}}</td>
                                        <td>{{$one->actual_material?->weft_pattern}}</td>
                                        <td>
                                            <input type="hidden" name="wefts[{{$key}}][actual_id]"
                                                   value="{{$one->actual_material?->material?->id}}">{{$one->actual_material?->material?->name}}
                                        </td>
                                        <td>
                                            <select class="form-control" name="wefts[{{$key}}][material_id]">
                                                <option value="">Select Material</option>
                                                @foreach ($yarns as $yarn)
                                                    <option
                                                        value="{{ $yarn->id }}" {{$one->material_id == $yarn->id ? 'selected' : ''}}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
        @endsection
        @push('scripts')

            <script>
                function parent_sort_changed() {
                    $('#tbl').html('');
                    let id = $("#parent_sort_id").val();
                    $.ajax({
                        url: 'get_sort',
                        type: 'GET',
                        data: {
                            'id': id,
                        },
                        dataType: 'json',
                        success: function (data) {
                            $.each(data.item.warps, function (index, item) {
                                let tr = '<tr>';
                                tr += `<td>Warp${index + 1}</td>`;
                                tr += `<td>${item.warp_pattern}</td>`;
                                tr += `<td><input type="hidden" name="warps[${index}][actual_id]" value="${item.material.id}">${item.material.name}</td>`;
                                tr += `<td>`;
                                tr += `<select class="form-control" name="warps[${index}][material_id]">`;
                                tr += `<option value="">Select Material</option>`;
                                @foreach ($yarns as $yarn)
                                    tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                                @endforeach
                                    tr += `</select>`;
                                tr += `</td>`;
                                tr += `</tr>`;
                                $('#tbl').append(tr);
                            });
                            $.each(data.item.wefts, function (index, item) {
                                let tr = '<tr>';
                                tr += `<td>Weft${index + 1}</td>`;
                                tr += `<td>${item.weft_pattern}</td>`;
                                tr += `<td><input type="hidden" name="wefts[${index}][actual_id]" value="${item.material.id}">${item.material.name}</td>`;
                                tr += `<td>`;
                                tr += `<select class="form-control" name="wefts[${index}][material_id]" required>`;
                                tr += `<option value="">Select Material</option>`;
                                @foreach ($yarns as $yarn)
                                    tr += `<option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
                                @endforeach
                                    tr += `</select>`;
                                tr += `</td>`;
                                tr += `</tr>`;
                                $('#tbl').append(tr);
                            });
                        }
                    });
                }

                $(document).ready(function () {


                });
            </script>

    @endpush
