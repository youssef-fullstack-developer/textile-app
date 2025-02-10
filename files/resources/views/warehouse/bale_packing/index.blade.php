@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'bale_packing';
    @endphp
    @php($route = 'bale_packing')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    BALE PACKING LIST
                </h3>
            </div>

            <div class="card-toolbar">
                @can($permission_name.'-create')
                <a href="{{ route($route.'.create') }}" class="btn btn-primary font-weight-bolder mr-2">
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
                    <th class="pl-7"><span class="text-dark-75">SL NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">PACKAGING SLIP NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">BALE/ROLL MANUAL NO.</span></th>
                    <th class="pl-7"><span class="text-dark-75">PIECE NUMBERS</span></th>
                    <th class="pl-7"><span class="text-dark-75">ORDER NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">SORT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">LOCATION</span></th>
                    <th class="pl-7"><span class="text-dark-75">BUYER</span></th>
                    <th class="pl-7"><span class="text-dark-75">NO OF PIECES</span></th>
                    <th class="pl-7"><span class="text-dark-75">PIECE METERS</span></th>
                    <th class="pl-7"><span class="text-dark-75">YARD METERS</span></th>
                    <th class="pl-7"><span class="text-dark-75">NET WEIGHT</span></th>
                    <th class="pl-7"><span class="text-dark-75">GLM</span></th>
                    <th class="pl-7"><span class="text-dark-75">GRADE</span></th>
                    <th class="pl-7"><span class="text-dark-75">RACK LOCATION</span></th>
                    <th class="pl-7"><span class="text-dark-75">DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            @php($piece_meters = 0)
                            @php($yerd_meters = 0)
                            @php($net_wt = 0)
                            @php($glm = 0)
                            @foreach($item->details ?? array() as $row)
                                @php($piece_meters += $row->piece_meters)
                                @php($yerd_meters += $row->yard)
                                @php($net_wt += $row->net_wt)
                                @php($glm += $row->glm)
                            @endforeach
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->bale_roll_number }}</td>
                            <td>{{ $item->bale_roll_manual_no }}</td>
                            <td>{{ '' }}</td>
                            <td>{{ $item->order?->order_no }}</td>
                            <td>{{ $item->quality?->sort_no }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->buyer?->name }}</td>
                            <td>{{ count($item->details ?? array()) }}</td>
                            <td>{{ $piece_meters }}</td>
                            <td>{{ $yerd_meters }}</td>
                            <td>{{ $net_wt }}</td>
                            <td>{{ $glm }}</td>
                            <td>{{ $item->grade?->name }}</td>
                            <td>{{ $item->rack_location }}</td>
                            <td>{{ $item->packing_date }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                <a href="{{ route($route.'.edit', $item->id) }}"
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
@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>
@endpush
