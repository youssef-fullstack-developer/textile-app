@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'export_invoice_list';
    @endphp
    @php($route = 'export_invoice_list')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    EXPORT INVOICE LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">SL NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">INVOICE NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">CUSTOM INVOICE</span></th>
                    <th class="pl-7"><span class="text-dark-75">COMMERCIAL INVOICE</span></th>
                    <th class="pl-7"><span class="text-dark-75">Custom Packing List</span></th>
                    <th class="pl-7"><span class="text-dark-75">TAX INVOICE</span></th>
{{--                    <th class="pl-7"><span class="text-dark-75">CUSTOM PACKING LIST</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">BUYER PACKING LIST</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">QUALITY CERTIFICATE</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">SDF FORM</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">DBK DECLARATION</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">EXPORT VALUE DECLARATION</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">FEMA DECLARATION</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">BANK COVERING LETTER</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">BOE CERTIFICATE</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">INSPECTION CERTIFICATE</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">ANNEXURE</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">VGM</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">SELF SEALING</span></th>--}}
{{--                    <th class="pl-7"><span class="text-dark-75">WOVEN FABRIC FIBER DETAIL SHEET</span></th>--}}
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->invoice_number }}</td>
                            <td >
                                <a href="{{ route('get_custom_invoice', $item->id) }}"
                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="CUSTOM INVOICE">
                                    <i class="fas fa-download"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('get_commercial_invoice', $item->id) }}"
                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="COMMERCIAL INVOICE">
                                    <i class="fas fa-download"></i>
                                </a>
                            </td>
                            <td>
{{--                                <a href="{{ route('get_custom_packing_list', $item->id) }}"--}}
{{--                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="Custom Packing List">--}}
{{--                                    <i class="fas fa-download"></i>--}}
{{--                                </a>--}}
                            </td>
                            <td>
                                <a href="{{ route('get_tax_invoice', $item->id) }}"
                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="TAX INVOICE">
                                    <i class="fas fa-download"></i>
                                </a>
                            </td>
{{--                            <td>--}}
{{--                                <a href="javascript:void(0);"--}}
{{--                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="BUYER PACKING LIST">--}}
{{--                                    <i class="fas fa-download"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="javascript:void(0);"--}}
{{--                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="TAX INVOICE">--}}
{{--                                    <i class="fas fa-download"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="javascript:void(0);"--}}
{{--                                   class="btn btn-outline-success btn-sm btn-clean btn-icon" title="QUALITY CERTIFICATE">--}}
{{--                                    <i class="fas fa-download"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
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
