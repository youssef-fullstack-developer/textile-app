@extends('main')
@section('content')
    @php
        $route_main = 'approval_invoice';
        $module_label = 'INVOICE';
        $permission_name = 'invoice';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    INVOICE LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type !== '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('get_approval_invoice') }}" role="button">Pending</a>
            <a class="btn @if(!empty($type) && $type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('get_approval_invoice',1) }}" role="button">Approved</a>
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('get_approval_invoice',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('get_approval_invoice',-1) }}" role="button">Rejected</a>
        </div>

        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">SL NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">Invoice NO.</span></th>
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
                            <td>{{ $item->invoice_number }}</td>
                            <td>{{ $item->challan_date }}</td>
                            <td>{{ $item->order?->order_no }}</td>
                            <td>{{ $item->sort?->details }}</td>
                            <td>{{ $item->buyer?->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route($route_main.'.edit', $item->id) }}"
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
    <script>

    </script>
@endpush
