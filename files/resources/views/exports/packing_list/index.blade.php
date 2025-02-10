@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'packing_list';
    @endphp
    @php($route = 'packing_list')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    EXPORT PACKAGING LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">SL NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">PL NO.</span></th>
                    <th class="pl-7"><span class="text-dark-75">PL DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">SO NO.</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">BUYER</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->challan_date }}</td>
                            <td>{{ $item->order?->sales_order?->order_no }}</td>
                            <td>{{ $item->sort?->details }}</td>
                            <td>{{ $item->buyer?->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route($route.'.edit', $item->id) }}"
                                   class="btn btn-outline-info btn-sm btn-clean" title="Edit details">
                                    Generate Invoice
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
