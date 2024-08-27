@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Sort Master List
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('sort.create')}}"
                    class="btn btn-primary font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span> Add
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">Sort No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Master Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Numeric Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Yarn Composition</span></th>
                        <th class="pl-7"><span class="text-dark-75">Weave</span></th>
                        <th class="pl-7"><span class="text-dark-75">Final Reed</span></th>
                        <th class="pl-7"><span class="text-dark-75">Total Ends</span></th>
                        <th class="pl-7"><span class="text-dark-75">Total Picks</span></th>
                        <th class="pl-7"><span class="text-dark-75">Active</span></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($sorts))
                        @foreach ($sorts as $key => $sort)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sort->sort_no }}</td>
                                <td>{{ $sort->details }}</td>
                                <td>{{ $sort->master_quality }}</td>
                                <td>{{ $sort->numeric }}</td>
                                <td>{{ $sort->composition }}</td>
                                <td>{{ $sort->weave }}</td>
                                <td>{{ $sort->reed }}</td>
                                <td>{{ $sort->total_ends }}</td>
                                <td>{{ $sort->picks }}</td>
                                <td>
                                <span class="label label-lg font-weight-bold label-inline label-light-{{ $sort->status ?  'success': 'danger' }} ">
                                {{ $sort->status ?  'Active': 'Inactive' }}</span>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('sort.edit', $sort->id) }}"
                                        class="btn btn-warning btn-sm btn-clean btn-icon" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                    {{ html()->form('DELETE', '/sort/' . $sort->id)->open() }}
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
