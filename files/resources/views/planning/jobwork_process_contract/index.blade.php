@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'jobwork_process_contract';
    @endphp
    @php($route = 'jobwork_process_contract')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOBWORK PROCESS CONTRACT LIST
                </h3>
            </div>

            <div class="card-toolbar">
                @can($permission_name.'-create')
                    <a href="{{ route($route.'.create') }}" class="btn btn-primary font-weight-bolder mr-2">
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
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type !== '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('jobwork_process_contract_list') }}" role="button">Pending</a>
            <a class="btn @if(!empty($type) && $type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('jobwork_process_contract_list',1) }}" role="button">Approved</a>
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('jobwork_process_contract_list',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('jobwork_process_contract_list',-1) }}" role="button">Rejected</a>
        </div>
        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>SL NO</th>
                    <th class="pl-7"><span class="text-dark-75">PO DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">CONTRACT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">ORDER NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">SORT NO.</span></th>
                    <th class="pl-7"><span class="text-dark-75">FINISHED QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">GREY QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">TOTAL QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">Action</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->booking_date }}</td>
                            <td>{{ $item->contract_number }}</td>
                            <td>{{ $item->vendor?->name }}</td>
                            @php($order_no = '')
                            @php($sort_no = '')
                            @php($finished_quality = '')
                            @php($grey_quality = '')
                            @php($quantity = 0)
                            @php($total_quantity = 0)
                            @foreach($item->details as $row)
                                @php($order_no .= $row->order_no .'<br>')
                                @php($sort_no .= $row->sort_no.'<br>')
                                @php($finished_quality .= $row->finished_quality.'<br>')
                                @php($grey_quality .= $row->grey_quality.'<br>')
                                @php($quantity .= $row->quantity.'<br>')
                                @php($total_quantity += $row->quantity)
                            @endforeach
                            <td>{!! $order_no !!}</td>
                            <td>{!! $sort_no !!}</td>
                            <td>{!! $finished_quality !!}</td>
                            <td>{!! $grey_quality !!}</td>
                            <td>{!! $quantity !!}</td>
                            <td>{{ $total_quantity }}</td>
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
