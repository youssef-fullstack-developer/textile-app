@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    BEAM INWARD AGAINST JOB CONTRACT REPORT
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th colspan="7">
                            Job Contract
                        </th>
                        <th colspan="5">
                            Beam Inward
                        </th>
                        <th colspan="4">
                            Beam Return
                        </th>
                        <th rowspan="2">
                            Balance Beam to Issue
                        </th>
                    </tr>
                    <tr class="text-uppercase">
                        <th>SL NO</th>
                        <th class="pl-7"><span class="text-dark-75">Contract No</span></th>
                        <th class="pl-7"><span class="text-dark-75">Date</span></th>
                        <th class="pl-7"><span class="text-dark-75">Party Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">Meters</span></th>
                        <th class="pl-7"><span class="text-dark-75">Rate</span></th>
                        <th class="pl-7"><span class="text-dark-75">Agent</span></th>
                        <th class="pl-7"><span class="text-dark-75">Set No</span></th>
                        <th class="pl-7"><span class="text-dark-75">Date</span></th>
                        <th class="pl-7"><span class="text-dark-75">Sizing Name</span></th>
                        <th class="pl-7"><span class="text-dark-75">No of Beams</span></th>
                        <th class="pl-7"><span class="text-dark-75">Meters</span></th>
                        <th class="pl-7"><span class="text-dark-75">Ent No</span></th>
                        <th class="pl-7"><span class="text-dark-75">Date</span></th>
                        <th class="pl-7"><span class="text-dark-75">No of Beams</span></th>
                        <th class="pl-7"><span class="text-dark-75">Meters</span></th>
                        <th class="pl-7"><span class="text-dark-75"></span></th>
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
