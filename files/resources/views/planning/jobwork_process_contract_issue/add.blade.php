@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'jobwork_process_contract_issue';
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} JOBWORK PROCESS PIECE ISSUE
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
                        <div class="col-4">
                            <label>JobWork Process Number<b class="text-danger">*</b></label>
                            <select name="jobwork_process_contract_id" id="jobwork_process_contract_id"
                                    onchange="change_jobwork()" class="form-control">
                                <option value="">Select</option>
                                @foreach($jobwork_process_contracts as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->jobwork_process_contract_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->contract_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Vendor Name<b class="text-danger">*</b></label>
                            <input type="text" id="vendor_name" class="form-control" readonly
                                   {{--                                   name="vendor_name" id="vendor_name" --}}
                                   value="{{$item ? $item->jobwork_process_contract?->vendor?->name : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Issue Date<b class="text-danger">*</b></label>
                            <input type="date" name="issue_date" class="form-control"
                                   value="{{$item ? $item?->issue_date : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Transporter<b class="text-danger">*</b></label>
                            <select name="transporter_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($transporters as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->transporter_id == $row->id) ? 'selected' : '' }}
                                    >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Lr No.<b class="text-danger">*</b></label>
                            <input type="text" name="lr_no" class="form-control"
                                   value="{{$item ? $item?->lr_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Lr Date<b class="text-danger">*</b></label>
                            <input type="date" name="lr_date" class="form-control"
                                   value="{{$item ? $item?->lr_date : '' }}"/>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Internal Lot No.</label>
                            <input type="text" name="internal_lot_no" class="form-control"
                                   value="{{$item ? $item?->internal_lot_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Vendor Lot No.</label>
                            <input type="text" name="vendor_lot_no" class="form-control"
                                   value="{{$item ? $item?->vendor_lot_no : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Fabric Type</label>
                            <select name="fabric_type" class="form-control">
                                <option value="">Select</option>
                                <option value="pieces" {{ ($item?->fabric_type == 'pieces') ? 'selected' : '' }}>
                                    Pieces
                                </option>
                                <option
                                    value="cloth_challan" {{ ($item?->fabric_type == 'cloth_challan') ? 'selected' : '' }}>
                                    Cloth Challan
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Mode of Shipment<b class="text-danger">*</b></label>
                            <select name="mode_of_shipment" class="form-control">
                                <option value="">Select</option>
                                <option value="SEA" {{ ($item?->mode_of_shipment == 'SEA') ? 'selected' : '' }}>SEA
                                </option>
                                <option value="AIR" {{ ($item?->mode_of_shipment == 'AIR') ? 'selected' : '' }}>AIR
                                </option>
                                <option value="ROAD" {{ ($item?->mode_of_shipment == 'ROAD') ? 'selected' : '' }}>
                                    ROAD
                                </option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_number" class="form-control"
                                   value="{{$item ? $item?->vehicle_number : '' }}"/>
                        </div>
                        <div class="col-4">
                            <label>Issue Type<b class="text-danger">*</b></label>
                            <select name="issue_type" class="form-control">
                                <option value="">Select</option>
                                <option value="New" {{ ($item?->issue_type == 'New') ? 'selected' : '' }}>New</option>
                                <option value="Reprocess" {{ ($item?->issue_type == 'Reprocess') ? 'selected' : '' }}>
                                    Reprocess
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>SL NO.</th>
                                    <th>QUALITY</th>
                                    <th>GREY QUALITY</th>
                                    <th>TOTAL QUANTITY</th>
                                    <th>ISSUED QUANTITY</th>
                                    <th>BALANCE QUANTITY</th>
                                </tr>
                                </thead>
                                <tbody id="jobwork_detail_container">
                                @if(!empty($item->jobwork_process_contract?->details))
                                    @foreach($item->jobwork_process_contract?->details ?? array() as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$row->finished_quality}}</td>
                                            <td>{{$row->grey_quality}}</td>
                                            <td>{{$row->quantity}}</td>
                                            <td>{{0.00}}</td>
                                            <td>{{0.00}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- End Details --}}
                    {{-- Begin Details --}}
                    <div class="form-group row">
                        <h1>Piece Issue Details *</h1>
                        <div class="row ml-4 mb-4  ">
                            <button type="button" class="btn btn-success" onclick="show_orders()">PIECE ISSUE</button>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="table-primary">
                                    <th>QUALITY</th>
                                    <th>PIECE NO.</th>
                                    <th>PIECE MTR</th>
                                    <th>WEIGHT</th>
                                    <th>AVG WT.</th>
                                    <th>PICKS</th>
                                    <th>GRADE</th>
                                    <th>LOT NO</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="detail_container">
                                @if(!empty($item))
                                    @foreach($item->details ?? array() as $index => $row)
                                        <tr>
                                            <input type="hidden" name="detail[{{$index}}][id]" value="{{$row->id ?? ''}}">
                                            <td>
                                                <input type="text" name="detail[{{$index}}][quality]"
                                                       class="form-control"
                                                       value="{{$row ? $row?->quality : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="detail[{{$index}}][piece_no]"
                                                       class="form-control"
                                                       value="{{$row ? $row?->piece_no : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="detail[{{$index}}][piece_mtr]"
                                                       class="form-control"
                                                       value="{{$row ? $row?->piece_mtr : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="detail[{{$index}}][weight]"
                                                       class="form-control"
                                                       value="{{$row ? $row?->weight : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="detail[{{$index}}][avg_wt]"
                                                       class="form-control"
                                                       value="{{$row ? $row?->avg_wt : '' }}"/>
                                            </td>
                                            <td>
                                                <input type="text" name="detail[{{$index}}][picks]" class="form-control"
                                                       value="{{$row ? $row?->picks : '' }}"/>
                                            </td>
                                            <td>{{$row ? $row?->grade : '' }}</td>
                                            <td>{{$row ? $row?->lot_no : '' }}</td>
                                            <td>
                                                <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                        onclick="$(this).closest('tr').remove();"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
                            <th>ENT NUMBER/CHALLAN NO</th>
                            <th>LOT NO</th>
                            <th>QUALITY</th>
                            <th>PIECE NO.(PIECES)/PIECE COUNT(CLOTH CHALLAN)</th>
                            <th>PIECE MTR</th>
                            <th>WEIGHT</th>
                            <th>AVG WT.</th>
                            <th>PICKS</th>
                            <th>GRADE</th>
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

        function change_jobwork() {
            let id = $('#jobwork_process_contract_id').val();
            $('#jobwork_detail_container').html('');
            $("#vendor_name").val('');
            $.ajax({
                url: '{{ route('jobwork_process_contract.show', 0)   }}',
                type: 'GET',
                data: {
                    'id': id,
                    'get_details': false,
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status) {
                        $("#vendor_name").val(data.item?.vendor?.name ?? '');
                        $.each(data.item.details, function (i, item) {
                            let index = $('#jobwork_detail_container TR').length;
                            let tr = `<tr>`;
                            tr += `<td>${index + 1}</td>`;
                            tr += `<td>${item.finished_quality}</td>`;
                            tr += `<td>${item.grey_quality}</td>`;
                            tr += `<td>${item.quantity}</td>`;
                            tr += `<td>${0.00}</td>`;
                            tr += `<td>${0.00}</td>`;
                            tr += `</tr>`;
                            $('#jobwork_detail_container').append(tr);
                        });
                    }
                }
            })
        }



        function show_orders() {
            $('#search_order_tbody').html('');
            $.ajax({
                url: '{{ route('jobwork_fabric_receive.show', 0)   }}',
                type: 'GET',
                data: {
                    'id': 0,
                    'get_details': true,
                },
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        $.each(data.item, function (i, item) {
                            let tr = `<tr>`;
                            tr += `<input type="hidden" id="modal_quality_${i}" value="${item.quality?.details ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_piece_no_${i}" value="${item.piece_no ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_piece_mtr_${i}" value="${item.piece_meter ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_weight_${i}" value="${item.weight ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_avg_wt_${i}" value="${item.avg_wt ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_picks_${i}" value="${item.picks ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_grade_${i}" value="${item.grade ?? ''}" >`;
                            tr += `<input type="hidden" id="modal_lot_no_${i}" value="" >`;
                            tr += `<td></td>`;
                            tr += `<td></td>`;
                            tr += `<td>${item.quality?.details ?? ''}</td>`;
                            tr += `<td>${item.piece_no ?? ''}</td>`;
                            tr += `<td>${item.piece_meter ?? ''}</td>`;
                            tr += `<td>${item.weight ?? ''}</td>`;
                            tr += `<td>${item.avg_wt ?? ''}</td>`;
                            tr += `<td>${item.picks ?? ''}</td>`;
                            tr += `<td>${item.grade ?? ''}</td>`;
                            tr += `<td><input type="checkbox" class="order_details_checkboxs" data-i="${i}" ></td>`;
                            tr += `</tr>`;
                            $('#search_order_tbody').append(tr);
                        });
                        $("#search_orders_modal").modal('show');
                    }
                }
            })
        }

        function submit_search() {
            let checkedCheckboxes = $('.order_details_checkboxs:checked');
            // $("#detail_container").html('');
            let index = $("#detail_container TR").length;
            let tr = ``;
            checkedCheckboxes.each(function () {
                let i = $(this).data('i');
                tr = `<tr>`;
                tr += `<input type="hidden" name="detail[${index}][id]">`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][quality]"`;
                tr += `               class="form-control"`;
                tr += `               value="${$('#modal_quality_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][piece_no]"`;
                tr += `               class="form-control"`;
                tr += `               value="${$('#modal_piece_no_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][piece_mtr]"`;
                tr += `               class="form-control"`;
                tr += `               value="${$('#modal_piece_mtr_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][weight]"`;
                tr += `               class="form-control"`;
                tr += `               value="${$('#modal_weight_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][avg_wt]"`;
                tr += `               class="form-control"`;
                tr += `               value="${$('#modal_avg_wt_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>`;
                tr += `        <input type="text" name="detail[${index}][picks]" class="form-control"`;
                tr += `               value="${$('#modal_picks_'+i).val()}"/>`;
                tr += `    </td>`;
                tr += `    <td>${$('#modal_grade_'+i).val()}</td>`;
                tr += `    <td>${$('#modal_lot_no_'+i).val()}</td>`;
                tr += `    <td>`;
                tr += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
                tr += `                onclick="$(this).closest('tr').remove();"><i`;
                tr += `            class="fa fa-trash"></i></button>`;
                tr += `    </td>`;
                tr += `</tr>`;
                $("#detail_container").append(tr);
                $("#search_orders_modal").modal('hide');
            });
        }

    </script>
@endpush

