@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'jobwork_fabric_receive';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Jobwork Fabric Receive List
                </h3>
            </div>

            <div class="card-toolbar">
                @can($permission_name.'-create')
                    <a href="{{ route('jobwork_fabric_receive.create') }}"
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
                    <th class="pl-7"><span class="text-dark-75">ENT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">JOBWORK CONTRACT NO (PO NO)</span></th>
                    <th class="pl-7"><span class="text-dark-75">SO NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR GROUP</span></th>
                    <th class="pl-7"><span class="text-dark-75">NO OF PIECES</span></th>
                    <th class="pl-7"><span class="text-dark-75">LENGTH</span></th>
                    <th class="pl-7"><span class="text-dark-75">RECEIVED DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">SLIP NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">LOCATION</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->jobwork?->contract_number }}</td>
                            <td>
                                @foreach ($item->jobwork?->orders ?? array() as $key => $row)
                                    {{ $row->order_no }} |
                                @endforeach
                            </td>
                            <td>
                                @php($lenght = 0)
                                @foreach ($item->details ?? array() as $key => $row)
                                    {{ $row->quality?->details }}
                                    @php( $lenght += ($row->net_piece_mtrs ?? 0))
                                @endforeach
                            </td>
                            <td>{{ $item->vendor?->name }}</td>
                            <td>{{ count($item->details ?? array()) }}</td>
                            <td>{{ $lenght }}</td>
                            <td>{{ $item->received_date }}</td>
                            <td>{{ $item->slip_no }}</td>
                            <td>{{ $item->location?->name }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route('jobwork_fabric_receive.edit', $item->id) }}"
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
