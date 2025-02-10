@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'cloth_challan';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : route($route.'.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom ">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} CLOTH CHALLAN
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route.'.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Challan Date<b class="text-danger">*</b></label>
                            <input type="date" name="challan_date" class="form-control"
                                   value="{{$item ? $item?->challan_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Challan Type<b class="text-danger">*</b></label>
                            <select name="challan_type" class="form-control">
                                <option value="">Select</option>
                                <option value="export" {{ ($item?->challan_type == 'export') ? 'selected' : '' }}>
                                    export
                                </option>
                                <option value="domestic" {{ ($item?->challan_type == 'domestic') ? 'selected' : '' }}>
                                    domestic
                                </option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-outline-info form-control" onclick="show_orders()">
                                Buyer <b class="text-danger">*</b></button>
                        </div>
                        <div class="col-2">
                            <label>&nbsp;</label>
                            <select name="buyer_id" id="buyer_id" class="form-control"  >
{{--                                <option value="">Select</option>--}}
                                @if(!empty($item?->buyer ?? false))
                                    <option value="{{$item?->buyer?->id}}" selected>{{$item?->buyer?->name}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Company <b class="text-danger">*</b></label>
                            <input type="text" name="company" class="form-control" readonly
                                   value="{{$item ? $item?->company : session('company') }}"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Lr Number</label>
                            <input type="number" name="lr_number" class="form-control"
                                   value="{{$item ? $item?->lr_number : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Lr Date</label>
                            <input type="date" name="lr_date" class="form-control"
                                   value="{{$item ? $item?->lr_date : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>EWayBill Number</label>
                            <input type="text" name="ewaybill_number" class="form-control"
                                   value="{{$item ? $item?->ewaybill_number : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Transportation</label>
                            <select name="transportation_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($transportations as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->transportation_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Remarks</label>
                            <input type="text" name="remarks" class="form-control"
                                   value="{{$item ? $item?->remarks : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Order Number</label>
                            <select name="order_id" id="order_id" class="form-control" readonly>
{{--                                <option value="">Select</option>--}}
                                @if($item && $item?->order )
                                    <option value="{{$item->order_id}}" selected>{{$item->order?->sales_order?->order_no}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Sort Number</label>
                            <select name="sort_id" id="sort_id" class="form-control" readonly>
{{--                                <option value="">Select</option>--}}
                                @if($item && $item?->sort )
                                    <option value="{{$item->sort_id}}" selected>{{$item->sort?->sort_no}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-3">
                            <label>No. Of Bale / Roll</label>
                            <input type="number" name="no_of_bale_roll" class="form-control"
                                   value="{{$item ? $item?->no_of_bale_roll : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Consignee</label>
                            <select name="consignee_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendors as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->consignee_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_number" class="form-control"
                                   value="{{$item ? $item?->vehicle_number : '' }}"/>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3">
                            <label>Rate</label>
                            <input type="number" name="rate" id="rate" class="form-control"
                                   value="{{$item ? $item?->rate : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 5 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Challan No.</label>
                            <input type="text" name="challan_no" class="form-control"
                                   value="{{$item ? $item?->challan_no : '' }}"/>
                        </div>
                        <div class="col-3">
                            <label>Fabric Seconds Sales</label>
                            <input type="checkbox" name="fabric_seconds_sales" class="form-control w-20px"
                                   value="1" {{$item && $item?->fabric_seconds_sales ? 'checked' : '' }}/>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>SL.NO</th>
                                    <th>ORDER SORT DETAILS</th>
                                    <th>PACKING TYPE <b class="text-danger">*</b></th>
                                    <th>FROM DATE</th>
                                    <th>TO DATE</th>
                                    <th>METER RANGE</th>
                                    <th>AVAILABLE BALES</th>
                                    <th>NO OF BALES/ROLLS</th>
                                    <th>FROM BALE <b class="text-danger">*</b></th>
                                    <th>TO BALE <b class="text-danger">*</b></th>
                                </tr>
                                </thead>
                                <tbody id="detail_container">
{{--                                @if(!empty($item))--}}
                                    <tr>
                                        <td> 1</td>
                                        <td>
                                            <select name="order_sort_id" class="form-control" id="order_sort_id">
{{--                                                <option value="">Select</option>--}}
                                                @if(!empty($item?->order_sort ?? false))
                                                    <option value="{{$item?->order_sort?->id}}" selected
                                                    >{{ $item->order?->sales_order?->order_no.'-'.$item->order_sort?->sort_no.'-'.$item->order?->fabric_type  }}</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select name="packing_type_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($packing_types as $one)
                                                    <option value="{{ $one->id }}"
                                                        {{ ($item?->packing_type_id == $one->id) ? 'selected' : '' }}
                                                    >{{ $one->name  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="from_date" class="form-control"
                                                   value="{{ $item ? $item?->from_date : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="date" name="to_date" class="form-control"
                                                   value="{{ $item ? $item?->to_date : '' }}"/>
                                        </td>
                                        <td>
                                            <select name="meter_range_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($meter_ranges as $one)
                                                    <option value="{{ $one->id }}"
                                                        {{ ($item?->meter_range_id == $one->id) ? 'selected' : '' }}
                                                    >{{ $one->name  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="available_bales" class="form-control"
                                                   value="{{ $item ? $item?->available_bales : '' }}"/>
                                        </td>
                                        <td>
                                            <input type="number" name="no_of_bales_rolls" class="form-control"
                                                   value="{{ $item ? $item?->no_of_bales_rolls : '' }}"/>
                                        </td>
                                        <td>
                                            <select name="from_bale_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($bales as $one)
                                                    <option value="{{ $one->id }}"
                                                        {{ ($item?->from_bale_id == $one->id) ? 'selected' : '' }}
                                                    >{{ $one->order?->order_no  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="to_bale_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($bales as $one)
                                                    <option value="{{ $one->id }}"
                                                        {{ ($item?->to_bale_id == $one->id) ? 'selected' : '' }}
                                                    >{{ $one->order?->order_no  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
{{--                                @endif--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- End Details --}}

                </div>
                <div class="card-footer text-center">
                    <button type="submit" name="submit" value="submit"
                            class="btn btn-success font-weight-bolder mr-4 w-135px">
                        SAVE
                    </button>
                    <a href="{{ route($route.'.index') }}" class="btn btn-warning font-weight-bolder w-135px">
                        CANCEL
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}



    <div class="modal fade" id="search_orders_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table  table-bordered table-hover">
                        <tr class="table-active">
                            <th>Order Number</th>
                            <th>Fabric Type</th>
                            <th>Buyer Name</th>
                            <th>Sort No</th>
                            <th>Quality</th>
                            <th>Rate</th>
                            <th>PO Number</th>
                            <th>ACTION</th>
                        </tr>
                        <tbody id="search_order_tbody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="submit_search()">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>


        function show_orders() {
            $('#search_order_tbody').html('');
            $.ajax({
                url: '{{ route('sales_order.show',0 )   }}',
                type: 'GET',
                data: {
                    'id': 0,
                    'get_details': true,
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status) {
                        $.each(data.item, function (i, item) {
                            let tr = `<tr>`;
                            tr += `<input type="hidden" id="modal_buyer_id_${i}" value="${item.sales_order?.buyer?.id ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_buyer_name_${i}" value="${item.sales_order?.buyer?.name ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_order_id_${i}" value="${item.id ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_order_number_${i}" value="${item.sales_order?.order_no ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_sort_id_${i}" value="${item.finished_quality?.id ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_sort_name_${i}" value="${item.finished_quality?.sort_no ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_rate_${i}" value="${item.rate_per_unit ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_fabric_type_${i}" value="${item.fabric_type ?? ''}" >`;
                            tr += `<td>${item.sales_order?.order_no ?? ''}</td>`;
                            tr += `<td>${item.fabric_type ?? ''}</td>`;
                            tr += `<td>${item.sales_order?.buyer?.name ?? ''}</td>`;
                            tr += `<td>${item.finished_quality?.sort_no ?? ''}</td>`;
                            tr += `<td>${item.finished_quality?.details ?? ''}</td>`;
                            tr += `<td>${item.rate_per_unit ?? ''}</td>`;
                            tr += `<td></td>`;
                            tr += `<td><input type="radio" name="order_details_checkboxs"  `;
                            tr += ` class="order_details_checkboxs" value="${i}" ></td>`;
                            tr += `</tr>`;
                            $('#search_order_tbody').append(tr);
                        });
                        $("#search_orders_modal").modal('show');
                    }
                }
            })
        }

        function submit_search() {
            // let i = $('.order_details_checkboxs').val();
            let i = $('.order_details_checkboxs:checked').val();
            // let i = $(this).data('i');
            $("#buyer_id").html('');
            $("#order_id").html('');
            $("#sort_id").html('');
            $("#order_sort_id").html('');
            $("#rate").val('');
            if (i && i > 0) {
                $("#buyer_id").html(`<option selected value="${$('#modal_buyer_id_' + i).val()}">${$('#modal_buyer_name_' + i).val()}</option>`);
                $("#order_id").html(`<option selected value="${$('#modal_order_id_' + i).val()}">${$('#modal_order_number_' + i).val()}</option>`);
                $("#sort_id").html(`<option selected value="${$('#modal_sort_id_' + i).val()}">${$('#modal_sort_name_' + i).val()}</option>`);
                $("#order_sort_id").html(`<option selected value="${$('#modal_sort_id_' + i).val()}">${$('#modal_order_number_' + i).val()} - ${$('#modal_sort_name_' + i).val()} - ${$('#modal_fabric_type_' + i).val()}</option>`);
                $("#rate").val($('#modal_rate_' + i).val());
            }
            $("#search_orders_modal").modal('hide');
        }


    </script>
@endpush

