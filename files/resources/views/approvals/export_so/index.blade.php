@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'export_so';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Export SO List
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type !== '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so') }}" role="button">Pending</a>
            <a class="btn @if(!empty($type) && $type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so',1) }}" role="button">Approved</a>
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so',-1) }}" role="button">Rejected</a>
        </div>
        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>SL NO</th>
                    <th class="pl-7"><span class="text-dark-75">SO Date</span></th>
                    <th class="pl-7"><span class="text-dark-75">SO No</span></th>
                    <th class="pl-7"><span class="text-dark-75">Buyer Name</span></th>
                    <th class="pl-7"><span class="text-dark-75">Sort Number.</span></th>
                    <th class="pl-7"><span class="text-dark-75">Quality</span></th>
                    <th class="pl-7"><span class="text-dark-75">Order Quantity</span></th>
                    <th class="pl-7"><span class="text-dark-75">Delivery Date</span></th>
                    <th class="pl-7"><span class="text-dark-75">Action</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->sales_order?->order_date }}</td>
                            <td>{{ $item->sales_order?->order_no }}</td>
                            <td>{{ $item->sales_order?->buyer?->name }}</td>
                            <td>{{ $item->quality?->sort_no }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->sales_order_sub_details()?->first()?->ex_factory_date }}</td>
                            <td class="d-flex">
                                <a href="{{ route('export_so_actions.edit', $item->id) }}"
                                   class="btn btn-outline-info btn-sm btn-clean  " title="Select">
                                    Select
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
    <script src="{{ asset('') }}/assets/js/datatables/invoice_settings.js"></script>
@endpush
