@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'yarn_master';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Yarn List
                </h3>
            </div>
            <div class="card-toolbar">
                @can($permission_name.'-create')
                <a href="{{route('yarn.create')}}"
                    class="btn btn-primary font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span> Add
                </a>
                @endcan
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">Yarn Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">UOM</span></th>
                        <th class="pl-7"><span class="text-dark-75">Buying UOM</span></th>
                        <th class="pl-7"><span class="text-dark-75">Yarn Type</span></th>
                        <th class="pl-7"><span class="text-dark-75">Ply</span></th>
                        <th class="pl-7"><span class="text-dark-75">Count</span></th>
                        <th class="pl-7"><span class="text-dark-75">Variety</span></th>
                        <th class="pl-7"><span class="text-dark-75">Active</span></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($yarns))
                        @foreach ($yarns as $key => $yarn)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $yarn->name }}</td>
                                <td>{{ $yarn->unit }}</td>
                                <td>{{ $yarn->buy_uom }}</td>
                                <td>{{ $yarn->type }}</td>
                                <td>{{ $yarn->plys?->ply }}</td>
                                <td>{{ $yarn->counts?->count }}</td>
                                <td>{{ $yarn->get_variety?->code }}</td>
                                <td>
                                <span class="label label-lg font-weight-bold label-inline label-light-{{ $yarn->status ?  'success': 'danger' }} ">
                                {{ $yarn->status ?  'Active': 'Inactive' }}</span>
                                </td>
                                <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route('yarn.edit', $yarn->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endcan
                                @can($permission_name.'-delete')
{{--                                    {{ html()->form('DELETE', '/yarn/' . $yarn->id)->open() }}--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm btn-clean btn-icon ml-3"--}}
{{--                                        title="Delete">--}}
{{--                                        <i class="la la-trash"></i>--}}
{{--                                    </button>--}}
{{--                                    {{ html()->form()->close() }}--}}
                                @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addInvoiceSettingModal" tabindex="-1" role="dialog"
        aria-labelledby="addInvoiceSettingModalLabel" aria-hidden="true">
        {{ html()->form('POST', '/uom')->acceptsFiles()->open() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add UOM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Code:</label>
                            <input type="text" name="code" class="form-control" id="key" autocomplete="off"
                                placeholder="Enter Name" value="{{ old('key') }}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>To Meter Conversion Value:</label>
                            <input type="text" name="meter_conversion" class="form-control" id="key"
                                autocomplete="off" placeholder="Enter Meter Conversion Value" value="{{ old('key') }}"
                                required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>UOM Type:</label>
                            <select class="form-control">
                                <option value="">Select UOM Type</option>
                                <option value="fabric">Fabric</option>
                                <option value="other_item">Other Item</option>
                                <option value="yarn_unit">Yarn Unit</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>Status:</label>
                            <div class="col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="is_active" checked="checked" value="1" />
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-danger">
                                        <input type="radio" name="is_active" value="0" />
                                        <span></span>
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">SAVE</button>
                    <button type="button" class="btn btn-warning font-weight-bolder w-135px"
                            data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/datatables/invoice_settings.js"></script>
@endpush
