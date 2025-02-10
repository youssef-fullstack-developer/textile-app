@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'po_fabric_processing_jw';
    @endphp
    @php($route = 'po_fabric_processing_jw')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOBWORK PURCHASE ORDER APPROVAL LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route($route.'.edit', $item->id) }}"
                                       class="btn btn-outline-primary btn-sm btn-clean" title="Edit details">
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
