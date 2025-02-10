@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'sizing_yarn_issue';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    JOB WORK SIZING SET LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">Sizing Plan No</span></th>
                        <th class="pl-7"><span class="text-dark-75">Total Measure</span></th>
                        <th class="pl-7"><span class="text-dark-75">Expected Measure</span></th>
                        <th class="pl-7"><span class="text-dark-75">Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($list))
                        @foreach ($list as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->plan_number }}</td>
                                <td>{{ $item->total_meter }}</td>
                                <td>{{ $item->expected_meter }}</td>
                                <td>
                                    @foreach($item->yarn_details as $row)
                                    {{ $row->sort?->sort_no }},
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('sizing_yarn_issue.edit', $item->id) }}"
                                       class="btn btn-outline-info btn-sm btn-clean  " title="Yarn Require">
                                        Yarn Issue
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
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>
@endpush
