@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'orders_list';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Orders List
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) && $type == '0') btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so',0) }}" role="button">On Hold</a>
            <a class="btn @if(!empty($type) && $type == -1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('export_so',-1) }}" role="button">Rejected</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>SL NO</th>
                    <th class="pl-7"><span class="text-dark-75">Order Type</span></th>
                    <th class="pl-7"><span class="text-dark-75">Order Date</span></th>
                    <th class="pl-7"><span class="text-dark-75">Order No</span></th>
                    <th class="pl-7"><span class="text-dark-75">Sort No</span></th>
                    <th class="pl-7"><span class="text-dark-75">Quality</span></th>
                    <th class="pl-7"><span class="text-dark-75">Party Name</span></th>
                    <th class="pl-7"><span class="text-dark-75">Quantity</span></th>
                    <th class="pl-7"><span class="text-dark-75">Delivery Date</span></th>
                    <th class="pl-7 w-80px"><span class="text-dark-75">Yarn Require</span></th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        @if($item->approved)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->sales_order?->invoice_type?->name }}</td>
                                <td>{{ $item->sales_order?->order_date }}</td>
                                <td>{{ $item->sales_order?->order_no }}</td>
                                <td>{{$item->quality?->sort_no}}</td>
                                <td>{{$item->quality?->sort_no}}</td>
                                <td>{{ $item->sales_order?->buyer?->name }}</td>
                                <td>{{ $item->weaving_qty + 0 }} - {{ $item->unit?->name }}</td>
                                <td></td>
                                <td class="d-flex">
                                    <a href="{{ route('orders_list.edit', $item->id) }}"
                                       class="btn btn-outline-info btn-sm btn-clean  " title="Yarn Require">
                                        Yarn Require
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addCertificationModel" tabindex="-1" role="dialog"
         aria-labelledby="addCertificationModelLabel" aria-hidden="true">
        {{ html()->form('POST', '/certification')->open() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Certification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Name" value="{{ old('name') }}" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label>Status:</label>
                            <div class="col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="status" checked="checked" value="1"/>
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-danger">
                                        <input type="radio" name="status" value="0"/>
                                        <span></span>
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">SAVE
                    </button>
                    <button type="button" class="btn btn-warning font-weight-bolder w-135px"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>
@endpush
