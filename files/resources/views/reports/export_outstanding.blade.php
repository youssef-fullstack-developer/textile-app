@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    EXPORT OUTSTANDING REPORT
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>SL NO</th>
                        <th class="pl-7"><span class="text-dark-75">DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">SO NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">SO DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">SUPPLIER</span></th>
                        <th class="pl-7"><span class="text-dark-75">CUSTOMER</span></th>
                        <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                        <th class="pl-7"><span class="text-dark-75">COMM %</span></th>
                        <th class="pl-7"><span class="text-dark-75">RATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">ORDER QUANTITY(YARDS)</span></th>
                        <th class="pl-7"><span class="text-dark-75">ORDER QUANTITY(METERS)</span></th>
                        <th class="pl-7"><span class="text-dark-75">UNIT</span></th>
                        <th class="pl-7"><span class="text-dark-75">FCL DETAILS</span></th>
                        <th class="pl-7"><span class="text-dark-75">AMOUNT</span></th>
                        <th class="pl-7"><span class="text-dark-75">AMOUNT RS</span></th>
                        <th class="pl-7"><span class="text-dark-75">PI LDS</span></th>
                        <th class="pl-7"><span class="text-dark-75">LC NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">LAST DATE OF SHIPMENT</span></th>
                        <th class="pl-7"><span class="text-dark-75">EX. FACTORY</span></th>
                        <th class="pl-7"><span class="text-dark-75">ETD</span></th>
                        <th class="pl-7"><span class="text-dark-75">VESSEL</span></th>
                        <th class="pl-7"><span class="text-dark-75">REMARKS</span></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($certifications))
                        @foreach ($certifications as $key => $certification)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $certification->name }}</td>
                                <td>
                                <span class="label label-lg font-weight-bold label-inline label-light-{{ $certification->status ?  'success': 'danger' }} ">
                                {{ $certification->status ?  'Active': 'Inactive' }}</span>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('certification.edit', $certification->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                    {{ html()->form('DELETE', '/certification/' . $certification->id)->open() }}
                                    <button type="submit" class="btn btn-danger btn-sm btn-clean btn-icon ml-3"
                                        title="Delete">
                                        <i class="la la-trash"></i>
                                    </button>
                                    {{ html()->form()->close() }}
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
