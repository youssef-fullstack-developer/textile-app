@extends('main')
@section('content')
    @php
        $route_main = 'po_fabric_processing_jw';
        $module_label = 'JOBWORK PURCHASE ORDER APPROVAL';
        $permission_name = 'po_fabric_processing_jw';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOBWORK PURCHASE ORDER APPROVAL LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type !== '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_processing_jw') }}" role="button">Pending</a>
            <a class="btn @if(!empty($type) && $type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_processing_jw',1) }}" role="button">Approved</a>
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_processing_jw',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_processing_jw',-1) }}" role="button">Rejected</a>
        </div>

        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">SL No</span></th>
                    <th class="pl-7"><span class="text-dark-75">PURCHASE ORDER DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">PURCHASE ORDER NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">ORDER NO.</span></th>
                    <th class="pl-7"><span class="text-dark-75">FINISHED QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">GREY QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">FINAL AMOUNT</span></th>
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
                            <td>{!! $finished_quality !!}</td>
                            <td>{!! $grey_quality !!}</td>
                            <td>{!! $quantity !!}</td>
                            <td>{{ $total_quantity }}</td>
                            <td class="d-flex">
                                <a href="{{ route('po_fabric_processing_jw.edit', $item->id) }}"
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
