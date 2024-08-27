@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    EXPORT SALES ORDER STATUS (GREIGE)
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>ROUTE</th>
                        <th class="pl-7"><span class="text-dark-75">SO DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">SO NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">BUYER</span></th>
                        <th class="pl-7"><span class="text-dark-75">AGENT</span></th>
                        <th class="pl-7"><span class="text-dark-75">SORT NUMBER</span></th>
                        <th class="pl-7"><span class="text-dark-75">QUALITY DETAILS</span></th>
                        <th class="pl-7"><span class="text-dark-75">ORDER QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">LSD</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">GROUP</span></th>
                        <th class="pl-7"><span class="text-dark-75">COUNT</span></th>
                        <th class="pl-7"><span class="text-dark-75">MILL</span></th>
                        <th class="pl-7"><span class="text-dark-75">ORDER QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">RECEIVED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">RECEIVED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">TOTAL RECEIVED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">VENDOR</span></th>
                        <th class="pl-7"><span class="text-dark-75">ORDER QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">RECEIVED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">RECEIVED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">TOTAL RECEIVED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">SIZING DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">SIZING PLAN NO</span></th>
                        <th class="pl-7"><span class="text-dark-75">SIZER</span></th>
                        <th class="pl-7"><span class="text-dark-75">PLANNED QTY IN MTRS</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAMS PLANNED</span></th>
                        <th class="pl-7"><span class="text-dark-75">YARN ISSUED</span></th>
                        <th class="pl-7"><span class="text-dark-75">YARN ISSUED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAMS RECEIVED</span></th>
                        <th class="pl-7"><span class="text-dark-75">QUANTITY IN MTRS</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAMS RECEIVED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PO NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEAVER</span></th>
                        <th class="pl-7"><span class="text-dark-75">PLANNED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAMS ISSUED</span></th>
                        <th class="pl-7"><span class="text-dark-75">BEAMS ISSUED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT YARN ISSUED</span></th>
                        <th class="pl-7"><span class="text-dark-75">WEFT YARN ISSUED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">FABRIC RECEIVED IN MTRS</span></th>
                        <th class="pl-7"><span class="text-dark-75">FABRIC RECEIVED DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PENDING QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">INSPECTED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">REJECTED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">PACKING LIST NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">PACKING LIST DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">PACKING LIST QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">BILL DATE</span></th>
                        <th class="pl-7"><span class="text-dark-75">BILL NO.</span></th>
                        <th class="pl-7"><span class="text-dark-75">BILLED QTY</span></th>
                        <th class="pl-7"><span class="text-dark-75">BALANCE TO BILL QTY</span></th>
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
