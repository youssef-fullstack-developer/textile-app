@extends('main')
@section('content')
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Warehouse Stock Report
                </h3>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                    <tr class="text-uppercase">
                        <th>id</th>
                        <th class="pl-7"><span class="text-dark-75">Sort No.</span></th>
                        <th class="pl-7"><span class="text-dark-75">Constructions</span></th>
                        <th class="pl-7"><span class="text-dark-75">Fabric Type</span></th>
                        <th class="pl-7"><span class="text-dark-75">Weave Type</span></th>
                        <th class="pl-7"><span class="text-dark-75">Numeric Quality</span></th>
                        <th class="pl-7"><span class="text-dark-75">Yarn Composition</span></th>
                        <th class="pl-7"><span class="text-dark-75">Up to DES</span></th>
                        <th class="pl-7"><span class="text-dark-75">CU Desp</span></th>
                        <th class="pl-7"><span class="text-dark-75">Packed</span></th>
                        <th class="pl-7"><span class="text-dark-75">Loose</span></th>
                        <th class="pl-7"><span class="text-dark-75">Not Checked</span></th>
                        <th class="pl-7"><span class="text-dark-75">REJ Loose</span></th>
                        <th class="pl-7"><span class="text-dark-75">REJ Packed</span></th>
                        <th class="pl-7"><span class="text-dark-75">Active</span></th>
                        <th>Action</th>
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
