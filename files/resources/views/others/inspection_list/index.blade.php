@extends('main')
@section('content')
    @php
        $route_main = '';
        $module_label = '';
        $permission_name = 'inspection_list';
        $route = 'inspection_list'
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    INSPECTION LIST
                </h3>
            </div>
        </div>
        <hr>
        <div class="ml-10">
            <a class="btn @if(empty($type) || $type == 0) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('inspection_list_get') }}" role="button">Pending</a>
            <a class="btn @if($type == 1) btn-linkedin @else btn-outline-info @endif"
               href="{{ route('inspection_list_get',1) }}" role="button">Completed</a>
        </div>
        <div class="card-body pt-2">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th class="pl-7"><span class="text-dark-75">SL No</span></th>
                    <th class="pl-7"><span class="text-dark-75">PIECE NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">JOBWORK CONTRACT NO</span></th>
                    <th class="pl-7"><span class="text-dark-75">INHOUSE / JOBWORK</span></th>
                    <th class="pl-7"><span class="text-dark-75">SORT NUMBER</span></th>
                    <th class="pl-7"><span class="text-dark-75">FABRIC TYPE</span></th>
                    <th class="pl-7"><span class="text-dark-75">QUALITY</span></th>
                    <th class="pl-7"><span class="text-dark-75">VENDOR NAME</span></th>
                    <th class="pl-7"><span class="text-dark-75">LENGTH</span></th>
                    <th class="pl-7"><span class="text-dark-75">GRADE</span></th>
                    <th class="pl-7"><span class="text-dark-75">MEASURED WIDTH IN INCHES</span></th>
                    <th class="pl-7"><span class="text-dark-75">BATCH</span></th>
                    <th class="pl-7"><span class="text-dark-75">IS LAST PIECE</span></th>
                    <th class="pl-7"><span class="text-dark-75">ACTION</span></th>
                    @if($type == 1)
                        <th class="pl-7"><span class="text-dark-75">Sticker Print</span></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @php($key = 0)
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        @php($measured_width = 0)
                        @php($batch = '')
                        @php($grade = '')
                        @foreach (($item->inspection?->details ?? array()) as $row)
                            @php($measured_width += $row->measured_width_in_inches)
                            @php($batch .= $row->batch. ' ')
                            @php($grade .= $row->grade?->name. ' ')
                        @endforeach
                        <tr>
                            <input type="hidden" id="roll_no_{{$item->id}}" value="{{$item->piece_no ?? ''}}">
                            <input type="hidden" id="quality_{{$item->id}}" value="{{$item->quality?->sort_no ?? ''}}">
                            <input type="hidden" id="shade_{{$item->id}}" value= "-">
                            <input type="hidden" id="meter_{{$item->id}}" value="{{$item->net_piece_mtrs ?? ''}}">
                            <input type="hidden" id="width_{{$item->id}}" value="{{$measured_width ?? ''}}">
                            <input type="hidden" id="grade_{{$item->id}}" value="{{$grade ?? ''}}">
                            <input type="hidden" id="date_{{$item->id}}" value="{{$item->inspection?->inspection_date ?? ''}}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->piece_no }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->jobwork?->jobwork_number }}</td>
                            <td>{{ 'JobWork' }}</td>
                            <td>{{ $item->quality?->sort_no }}</td>
                            <td>{{ $item->quality?->fabric }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->vendor?->name }}</td>
                            <td>{{ $item->net_piece_mtrs }}</td>
                            <td>{{ $grade }}</td>
                            <td>{{ $measured_width }}</td>
                            <td>{{ $batch }}</td>
                            <td>{{ $item->jobwork_fabric_receive?->is_last_piece == 1 ? 'Yes' : 'No' }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route($route.'.edit', $item->id) }}"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Inspection
                                    </a>
                                @endcan
                            </td>
                            @if($type == 1)
                                <td>
                                    <a href="javascript:void(0);" onclick="sticker_print({{$item->id}})"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Sticker-Print
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                @if (!empty($list2))
                    @foreach ($list2 as $key2 => $item)
                        @php($measured_width = 0)
                        @php($batch = '')
                        @php($grade = '')
                        @foreach (($item->inspection?->details ?? array()) as $row)
                            @php($measured_width += $row->measured_width_in_inches)
                            @php($batch .= $row->batch. ' ')
                            @php($grade .= $row->grade?->name. ' ')
                        @endforeach
                        <tr>
                            <input type="hidden" id="roll_no_finished_{{$item->id}}" value="{{$item->piece_no ?? ''}}">
                            <input type="hidden" id="quality_finished_{{$item->id}}" value="{{$item->quality?->sort_no ?? ''}}">
                            <input type="hidden" id="shade_finished_{{$item->id}}" value= "-">
                            <input type="hidden" id="meter_finished_{{$item->id}}" value="{{$item->net_piece_mtrs ?? ''}}">
                            <input type="hidden" id="width_finished_{{$item->id}}" value="{{$measured_width ?? ''}}">
                            <input type="hidden" id="grade_finished_{{$item->id}}" value="{{$grade ?? ''}}">
                            <input type="hidden" id="date_finished_{{$item->id}}" value="{{$item->inspection?->inspection_date ?? ''}}">
                            <td>{{ $key + $key2 + 1 }}</td>
                            <td>{{ $item->piece_no }}</td>
                            <td>{{ $item->jobwork_finished_fabric_receive?->jobwork_process_contract?->contract_number }}</td>
                            <td>{{ 'JobWork Finished' }}</td>
                            <td>{{ $item->quality?->sort_no }}</td>
                            <td>{{ $item->quality?->fabric }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->jobwork_finished_fabric_receive?->vendor?->name }}</td>
                            <td>{{ $item->net_piece_mtrs }}</td>
                            <td>{{ $grade }}</td>
                            <td>{{ $measured_width }}</td>
                            <td>{{ $batch }}</td>
                            <td>{{ $item->jobwork_finished_fabric_receive?->is_last_piece == 1 ? 'Yes' : 'No' }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route($route.'.edit', 'finished_'.$item->id) }}"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Inspection
                                    </a>
                                @endcan
                            </td>
                            @if($type == 1)
                                <td>
                                    <a href="javascript:void(0);" onclick="sticker_print('finished_{{$item->id}}')"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Sticker-Print
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                @if (!empty($list3))
                    @foreach ($list3 as $key3 => $item)
                        @php($measured_width = 0)
                        @php($batch = '')
                        @php($grade = '')
                        @foreach (($item->inspection?->details ?? array()) as $row)
                            @php($measured_width += $row->measured_width_in_inches)
                            @php($batch .= $row->batch. ' ')
                            @php($grade .= $row->grade?->name. ' ')
                        @endforeach
                        <tr>
                            <input type="hidden" id="roll_no_finished_{{$item->id}}" value="{{$item->piece_no ?? ''}}">
                            <input type="hidden" id="quality_finished_{{$item->id}}" value="{{$item->quality?->sort_no ?? ''}}">
                            <input type="hidden" id="shade_finished_{{$item->id}}" value= "-">
                            <input type="hidden" id="meter_finished_{{$item->id}}" value="{{$item->net_piece_mtrs ?? ''}}">
                            <input type="hidden" id="width_finished_{{$item->id}}" value="{{$measured_width ?? ''}}">
                            <input type="hidden" id="grade_finished_{{$item->id}}" value="{{$grade ?? ''}}">
                            <input type="hidden" id="date_finished_{{$item->id}}" value="{{$item->inspection?->inspection_date ?? ''}}">
                            <td>{{ $key + $key3 + 1 }}</td>
                            <td>-{{ $item->piece_no }}</td>
                            <td>{{ $item->fabric_inward?->po?->po_number }}</td>
                            <td>{{ 'InHouse' }}</td>
                            <td>{{ $item->quality?->sort_no }}</td>
                            <td>{{ $item->quality?->fabric }}</td>
                            <td>{{ $item->quality?->details }}</td>
                            <td>{{ $item->fabric_inward?->vendor_group?->group }}</td>
                            <td>{{ $item->net_piece_mtrs }}</td>
                            <td>{{ $item->grade?->name }}</td>
                            <td>{{ $measured_width }}</td>
                            <td>{{ $batch }}</td>
                            <td>{{ $item->fabric_inward?->is_last_piece == 1 ? 'Yes' : 'No' }}</td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="{{ route($route.'.edit', 'fabric_'.$item->id) }}"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Inspection
                                    </a>
                                @endcan
                            </td>
                            @if($type == 1)
                                <td>
                                    <a href="javascript:void(0);" onclick="sticker_print('finished_{{$item->id}}')"
                                       class="btn btn-outline-primary btn-sm btn-clean " title="Edit details">
                                        Sticker-Print
                                    </a>
                                </td>
                            @endif
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

    <script>
        function sticker_print(id) {
            let roll_no = $("#roll_no_"+id).val();
            let quality = $("#quality_"+id).val();
            let shade = $("#shade_"+id).val();
            let meter = $("#meter_"+id).val();
            let width = $("#width_"+id).val();
            let grade = $("#grade_"+id).val();
            let date = $("#date_"+id).val();


            let table = $('<table border="1" cellspacing="0" cellpadding="5"></table>'); // Create a new table
            // Add line number as the first column
            table.append('<tr><td>1.</td><td>Roll No</td><td>' + roll_no + '</td></tr>');
            table.append('<tr><td>2.</td><td>Quality</td><td>' + quality + '</td></tr>');
            table.append('<tr><td>3.</td><td>Shade</td><td>' + shade + '</td></tr>');
            table.append('<tr><td>4.</td><td>Meter</td><td>' + meter + '</td></tr>');
            table.append('<tr><td>5.</td><td>Width</td><td>' + width + '</td></tr>');
            table.append('<tr><td>6.</td><td>Grade</td><td>' + grade + '</td></tr>');
            table.append('<tr><td>7.</td><td>Date</td><td>' + date + '</td></tr>');


            // Print the table (without header)
            let newWindow = window.open();
            newWindow.document.write('<html><head><title></title>');
            newWindow.document.write('<style> table { width: 280px; border-collapse: collapse; margin: auto;}');
            newWindow.document.write(' td { border: 1px solid black; padding: 5px; }</style>');
            newWindow.document.write('</head><body>');
            newWindow.document.write(table[0].outerHTML);
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.print();
        }
    </script>

@endpush
