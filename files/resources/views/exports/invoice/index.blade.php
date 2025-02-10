@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'export_invoice_list';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Export Invoice List
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">Custom Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">Commercial Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">Custom Packing List</span></th>
                        <th class="pl-7"><span class="text-dark-75">Buyer Packing List</span></th>
                        <th class="pl-7"><span class="text-dark-75">Tax Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">Quality Certificate</span></th>
                        <th class="pl-7"><span class="text-dark-75">SDF Form</span></th>
                        <th class="pl-7"><span class="text-dark-75">DBK Declaration</span></th>
                        <th class="pl-7"><span class="text-dark-75">FEMA Declaration</span></th>
                        <th class="pl-7"><span class="text-dark-75">Bank Covering Letter</span></th>
                        <th class="pl-7"><span class="text-dark-75">BOE Certificate</span></th>
                        <th class="pl-7"><span class="text-dark-75">Inspection Certificate</span></th>
                        <th class="pl-7"><span class="text-dark-75">Annexure</span></th>
                        <th class="pl-7"><span class="text-dark-75">VGM</span></th>
                        <th class="pl-7"><span class="text-dark-75">Self Sealing</span></th>
                        <th class="pl-7"><span class="text-dark-75">Fabric Detail Sheet</span></th>
                        <th class="pl-7"><span class="text-dark-75">Shipment Bill</span></th>
                        <th class="pl-7"><span class="text-dark-75">Forwarder to Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">Transport Details</span></th>
                        <th class="pl-7"><span class="text-dark-75">E - Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">E - Invoice</span></th>
                        <th class="pl-7"><span class="text-dark-75">E - Waybill</span></th>
                        <th class="pl-7"><span class="text-dark-75">E - Waybill</span></th>
                        <th class="pl-7"><span class="text-dark-75">E - Waybill</span></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($buyers))
                        @foreach ($buyers as $key => $buyer)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $buyer->name }}</td>
                                <td>{{ $buyer->no }}</td>
                                <td>{{ $buyer->country }}</td>
                                <td>{{ $buyer->state }}</td>
                                <td>{{ $buyer->city }}</td>
                                <td>{{ $buyer->address }}</td>
                                <td>{{ $buyer->pincode }}</td>
                                <td>{{ $buyer->representative }}</td>
                                <td>{{ $buyer->created_in }}</td>
                                <td>
                                <span class="label label-lg font-weight-bold label-inline label-light-{{ $buyer->status ?  'success': 'danger' }} ">
                                {{ $buyer->status ?  'Active': 'Inactive' }}</span>
                                </td>
                                <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route('buyers.edit', $buyer->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endcan
                                @can($permission_name.'-delete')
                                    {{ html()->form('DELETE', '/buyers/' . $buyer->id)->open() }}
                                    <button type="submit" class="btn btn-danger btn-sm btn-clean btn-icon ml-3"
                                        title="Delete">
                                        <i class="la la-trash"></i>
                                    </button>
                                    {{ html()->form()->close() }}
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
    <script src="{{ asset('') }}/assets/js/datatables/invoice_settings.js"></script>
@endpush
