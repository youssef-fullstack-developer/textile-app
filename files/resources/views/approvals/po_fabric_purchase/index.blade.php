@extends('main')
@section('content')
    @php
        $route_main = 'po_fabric_purchase';
        $module_label = 'PO-Fabric Purchase';
        $permission_name = 'po_fabric_purchase';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    FABRIC PURCHASE ORDER APPROVAL LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type !== '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_purchase') }}" role="button">Pending</a>
            <a class="btn @if(!empty($type) && $type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_purchase',1) }}" role="button">Approved</a>
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_purchase',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('approval_po_fabric_purchase',-1) }}" role="button">Rejected</a>
        </div>

        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>SL NO</th>
                    <th class="pl-7"><span class="text-dark-75">PO DATE</span></th>
                    <th class="pl-7"><span class="text-dark-75">PO No</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUANTITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">FINAL PRICE</span></th>
                    <th class="pl-7"><span class="text-dark-75">Action</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        @php
                            $quality = '';
                            $quantity = 0.00;
                            $final_price = 0.00;
                            foreach ($item->details as $row) {
                                $quality .= $row->quality?->details.'<br>';
                                $quantity += $row->quantity;
                                $final_price += $row->final_price;
                            }
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->po_date }}</td>
                            <td>{{ $item->po_number }}</td>
                            <td>{{ $item->vendor?->name }}</td>
{{--                            <td>{{ $quality }}</td>--}}
                            <td>{{ $quantity }}</td>
                            <td>{{ $final_price }}</td>
                            <td class="d-flex">
                                <a href="{{ route('approval_po_fabric_purchase_get', $item->id) }}"
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
    <script src="{{ asset('') }}/assets/js/datatables/invoice_settings.js"></script>
    <script>

    </script>
@endpush
