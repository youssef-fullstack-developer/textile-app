@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'jobwork_weaving_weft_issue';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOBWORK WEAVING WEFT CONTRACT LIST
                </h3>
            </div>

            <div class="card-toolbar">
                @can($permission_name.'-create')
                    <a href="{{ route('jobwork_weaving_weft_issue.create') }}"
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
                    </a>
                @endcan
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>Sl No</th>
                    <th class="pl-7"><span class="text-dark-75">GATEPASS NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">ISSUE DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">CONTRACT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">ORDER NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">YARN COUNT</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR GROUP</span></th>
                    <th class="pl-7"><span class="text-dark-75">MILL NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">ISSUED QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">CONVERSION VALUE</span></th>
                    <th class="pl-7"><span class="text-dark-75">LOT NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        @php($issued_quantity = 0)
                        @php($convertion_quantity = 0)
                        @php($lot_number = '')
                        @php($mill = '')
                        @foreach ($item->details as $one)
                            @php($issued_quantity += $one->issuing_quantity)
                            @php($convertion_quantity += $one->convertion_value)
                            @php($lot_number = $lot_number . ($loop->last ? '' : '<br>') . $one->lot_no)
                            @php($mill = $mill . ($loop->last ? '' : '<br>') . $one->mill)
                        @endforeach
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->gate_pass_no }}</td>
                            <td>{{ $item->issue_date }}</td>
                            <td>{{ $item->jobWork?->contract_number }}</td>
                            <td>{{ $item->jobWork?->contract_number }}</td>
                            <td>{{ $item->jobWork?->sort?->details }}</td>
                            <td>{{ $item->jobWork?->sort?->sort_no }}</td>
                            <td>{{ $item->jobWork?->vendor?->group }}</td>
                            <td>{{ $mill }}</td>
                            <td>{{ $issued_quantity }}</td>
                            <td>{{ $convertion_quantity }}</td>
                            <td>{{ $lot_number }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route('jobwork_weaving_weft_issue.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
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

    <div class="modal fade" id="addCertificationModel" tabindex="-1" role="dialog"
         aria-labelledby="addCertificationModelLabel" aria-hidden="true">
        {{ html()->form('POST', '/certification')->open() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Certification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Name" value="{{ old('name') }}" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>Status:</label>
                            <div class="col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="status" checked="checked" value="1"/>
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-danger">
                                        <input type="radio" name="status" value="0"/>
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
                            class="btn btn-success font-weight-bolder mr-4 w-135px">SAVE
                    </button>
                    <button type="button" class="btn btn-warning font-weight-bolder w-135px"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>
@endpush
