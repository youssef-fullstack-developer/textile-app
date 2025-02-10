@extends('main')
@section('content')
    @php
        $route_main = 'consignee';
        $module_label = 'Consignee';
        $permission_name = 'consignee';
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
                <a href="{{route('consignee.create')}}"
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
            </div>
                @endcan
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>id</th>
                    <th class="pl-7"><span class="text-dark-75">CONSIGNEE NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">STATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">CITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">GSTN</span></th>
                    <th class="pl-7"><span class="text-dark-75">IS ACTIVE</span></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($consignee))
                    @foreach ($consignee as $key => $con)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $con->name }}</td>
                            <td>{{ $con->state?->name }}</td>
                            <td>{{ $con->city?->name }}</td>
                            <td>{{ $con->gstn }}</td>
                            <td>
                                <span class="label label-lg font-weight-bold label-inline label-light-{{ $con->active ?  'success': 'danger' }} ">
                                {{ $con->active ?  'Active': 'Inactive' }}</span>
                            </td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                <a href="{{ route('consignee.edit', $con->id) }}"
                                   class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can($permission_name.'-delete')
                                <a href="javascript:void(0)" data-id="{{ $con->id }}" title="Delete"
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

            $('.btn-delete').on('click', function () {
                let id = $(this).data('id');
                $('#deleteForm').attr('action', '/{{$route_main}}/' + id);
            });


        });
    </script>

@endpush
