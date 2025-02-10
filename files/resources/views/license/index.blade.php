@extends('main')
@section('content')
    @php
        $route_main = 'licence';
        $module_label = 'Licence';
        $permission_name = 'licence';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    {{$module_label}} List
                </h3>
            </div>
            <div class="card-toolbar">
                @can($permission_name.'-create')
                <button data-toggle="modal" data-target="#storeCurrentModel"
                        class="btn btn-primary font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                    </span> Add
                </button>
                @endcan
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>id</th>
                    <th class="pl-7"><span class="text-dark-75">Licence Number</span></th>
                    <th class="pl-7"><span class="text-dark-75">Licence Type</span></th>
                    <th class="pl-7"><span class="text-dark-75">Import HSN No</span></th>
                    <th class="pl-7"><span class="text-dark-75">Export HSN No</span></th>
                    <th class="pl-7"><span class="text-dark-75">Description</span></th>
                    <th class="pl-7"><span class="text-dark-75">Licence Date</span></th>
                    <th class="pl-7"><span class="text-dark-75">Expiry Date</span></th>
                    <th class="pl-7"><span class="text-dark-75">Active</span></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->import_hsn_no }}</td>
                            <td>{{ $item->export_hsn_no }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->expiry_date }}</td>
                            <td>
                                <span
                                    class="label label-lg font-weight-bold label-inline label-light-{{ $item->status ?  'success': 'danger' }} ">
                                {{ $item->status ?  'Active': 'Inactive' }}</span>
                            </td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                   class="btn btn-warning btn-sm btn-clean btn-icon btn-edit" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can($permission_name.'-delete')
                                <a href="javascript:void(0)" data-id="{{ $item->id }}" title="Delete"
                                   data-toggle="modal" data-target="#deleteCurrentModal"
                                   class="btn btn-danger btn-sm btn-clean btn-icon ml-3  btn-delete">
                                    <i class="la la-trash"></i>
                                </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="storeCurrentModel" tabindex="-1" role="dialog"
         aria-labelledby="storeCurrentModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                {{ html()->form('POST', '/'.$route_main)->id('storeForm')->open() }}
                <input type="hidden" name="_method" id="_method" value="">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">{{$module_label}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{--Line 1 --}}
                    <div class="form-group mb-2 row">
                        <div class="col-4">
                            <label>Number</label>
                            <input type="text" name="number" id="number" class="form-control"/>
                        </div>
                        <div class="col-4">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select</option>
                                <option value="Duty DrawBack">Duty DrawBack</option>
                                <option value="Advance Licence">Advance Licence</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Import HSN No</label>
                            <input type="text" name="import_hsn_no" id="import_hsn_no" class="form-control"/>
                        </div>
                    </div>
                    {{--Line 2 --}}
                    <div class="form-group mb-2 row">
                        <div class="col-4">
                            <label>Licence Date</label>
                            <input type="date" name="date" id="date" class="form-control"/>
                        </div>
                        <div class="col-4">
                            <label>Description</label>
                            <input type="text" name="description" id="description" class="form-control"/>
                        </div>
                        <div class="col-4">
                            <label>Export HSN No</label>
                            <input type="text" name="export_hsn_no" id="export_hsn_no" class="form-control"/>
                        </div>
                    </div>
                    {{--Line 3 --}}
                    <div class="form-group mb-2 row">
                        <div class="col-4">
                            <label>Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" class="form-control"/>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-8">
                                    <label>Licence Volume</label>
                                    <input type="text" name="volume" id="volume" class="form-control"/>
                                </div>
                                <div class="col-4">
                                    <label>UOM</label>
                                    <select name="uom_id" id="uom_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($uoms as $line)
                                            <option value="{{$line->id}}">{{$line->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label>Licence Value</label>
                                    <input type="text" name="value" id="value" class="form-control"/>
                                </div>
                                <div class="col-6">
                                    <label>Value Currency Type</label>
                                    <select name="currency_type" id="currency_type" class="form-control">
                                        <option value=""></option>
                                        <option value="USD">USD</option>
                                        <option value="RUPEES">RUPEES</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Line 4 --}}
                    <div class="form-group mb-2 row">
                        <div class="col-4">
                            <div class="col-8">
                                <label>Currency Convertion Value</label>
                                <input type="text" name="convertion_value" id="convertion_value" class="form-control"/>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Status</label>
                            <div class="col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="status" id="status_true" checked="checked"
                                               value="1"/>
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-danger">
                                        <input type="radio" name="status" id="status_false" value="0"/>
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
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteCurrentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            {{ html()->form('POST', '')->id('deleteForm')->open() }}
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete {{$module_label}}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this {{$module_label}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>

    <script>
        $(document).ready(function () {
            $('#storeCurrentModel').on('hidden.bs.modal', function () {
                $('#storeForm').attr('action', '/{{$route_main}}');
                $('#storeForm').attr('method', 'post');
                $('#_method').val('');
                $('#number').val('');
                $('#type').val('');
                $('#import_hsn_no').val('');
                $('#date').val('');
                $('#expiry_date').val('');
                $('#description').val('');
                $('#export_hsn_no').val('');
                $('#volume').val('');
                $('#uom_id').val('');
                $('#value').val('');
                $('#currency_type').val('');
                $('#convertion_value').val('');
                $('#status_true').prop("checked", true);
                $('#status_false').prop("checked", false);
            });


            $('.btn-edit').on('click', function () {
                let id = $(this).data('id');
                $.get('/{{$route_main}}/' + id + '/edit', function (data) {
                    $('#storeForm').attr('action', '/{{$route_main}}/' + id);
                    $('#_method').val('PUT');
                    $('#number').val(data.number);
                    $('#type').val(data.type);
                    $('#import_hsn_no').val(data.import_hsn_no);
                    $('#date').val(data.date);
                    $('#expiry_date').val(data.expiry_date);
                    $('#description').val(data.description);
                    $('#export_hsn_no').val(data.export_hsn_no);
                    $('#volume').val(data.volume);
                    $('#uom_id').val(data.uom_id);
                    $('#value').val(data.value);
                    $('#currency_type').val(data.currency_type);
                    $('#convertion_value').val(data.convertion_value);
                    if (data.status === true || data.status === 1 || data.status == '1') {
                        $('#status_true').prop("checked", true);
                        $('#status_false').prop("checked", false);
                    } else {
                        $('#status_true').prop("checked", false);
                        $('#status_false').prop("checked", true);
                    }
                    $('#storeCurrentModel').modal('show');
                });
            });


            $('.btn-delete').on('click', function () {
                let id = $(this).data('id');
                $('#deleteForm').attr('action', '/{{$route_main}}/' + id);
            });


        });
    </script>

@endpush
