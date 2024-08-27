@extends('main')
@section('content')
    @php($route = 'inspection_list')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    INSPECTION LIST
                </h3>
            </div>

            {{--            <div class="card-toolbar">--}}
            {{--                <a href="{{ route($route.'.create') }}" class="btn btn-primary font-weight-bolder mr-2">--}}
            {{--                    <span class="svg-icon svg-icon-md">--}}
            {{--                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"--}}
            {{--                             height="24px" viewBox="0 0 24 24" version="1.1">--}}
            {{--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
            {{--                                <rect x="0" y="0" width="24" height="24" />--}}
            {{--                                <circle fill="#000000" cx="9" cy="15" r="6" />--}}
            {{--                                <path--}}
            {{--                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"--}}
            {{--                                    fill="#000000" opacity="0.3" />--}}
            {{--                            </g>--}}
            {{--                        </svg>--}}
            {{--                    </span> Add--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">PIECE NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">JOBWORK CONTRACT NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">INHOUSE / JOBWORK</span></th>
                    <th class="pl-7"><span class="text-dark-75">SORT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">FABRIC TYPE</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">LENGTH</span></th>
                    <th class="pl-7"><span class="text-dark-75">GRADE</span></th>
                    <th class="pl-7"><span class="text-dark-75">MEASURED WIDTH IN INCHES</span></th>
                    <th class="pl-7"><span class="text-dark-75">BATCH</span></th>
                    <th class="pl-7"><span class="text-dark-75">IS LAST PIECE</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $item->piece_no }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->jobwork?->jobwork_number }}</td>
                            <td>{{ 'JobWork' }}</td>
                            <td>{{ $item->quality?->sort_id }}</td>
                            <td>{{ $item->quality?->fabric }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->vendor?->name }}</td>
                            <td>{{ $item->net_piece_mtrs }}</td>
                            <td>{{ $item->grade }}</td>
                            @php($measured_width = 0)
                            @php($batch = '')
                            @foreach (($item->inspection?->details ?? array()) as $row)
                                @php($measured_width += $row->measured_width_in_inches)
                                @php($batch .= $row->batch. ' ')
                            @endforeach
                            <td>{{ $measured_width }}</td>
                            <td>{{ $batch }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->is_last_piece == 1 ? 'Yes' : 'No' }}</td>
                            <td class="d-flex">
                                <a href="{{ route($route.'.edit', $item->id) }}"
                                   class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                    Inspection
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>
@endpush
