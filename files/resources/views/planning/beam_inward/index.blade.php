@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'beam_inward';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    BEAM INWARD
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>SL NO</th>
                    <th class="pl-7"><span class="text-dark-75">SIZING SET NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">SIZING NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">MEASURE</span></th>
                    <th class="pl-7"><span class="text-dark-75">GIVEN MEASURE</span></th>
                    <th class="pl-7"><span class="text-dark-75">RECEIVED METERS</span></th>
                    <th class="pl-7"><span class="text-dark-75">Action</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->plan_number }}</td>
                            <td>{{ $item->sizing_name?->name }}</td>
                            <td>
                                @foreach($item->yarn_details ?? array() as $row)
                                    {{ $row->sort?->sort_no }},
                                @endforeach
                            </td>
                            <td>{{ $item->beam_inward?->receive_date }}</td>
                            <td>{{ $item->total_meter }}</td>
                            <td>{{ $item->beam_inward?->warp_count_measure }}</td>
                            @php
                                $recieved_meters = 0;
                                foreach($item->beam_inward?->details ?? array() as $row) {
                                    $recieved_meters += $row->receive_metrs;
                                }
                            @endphp
                            <td>{{ $recieved_meters }}</td>
                            <td class="d-flex">
                                <a href="{{ route('beam_inward.edit', $item->id) }}"
                                   class="btn btn-outline-info btn-sm btn-clean  " title="Yarn Require">
                                    {{empty($item->beam_inward) ? 'Receive Sizing Beam' : 'Received'}}
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
