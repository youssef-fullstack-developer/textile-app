@extends('main')
@section('content')
    @php
        $route_main = 'vendors';
        $module_label = 'Vendor';
        $permission_name = 'vendor';
    @endphp
    <div class="card card-custom" style="box-shadow: none">
        <div class="card-header flex-wrap border-0 pt-0 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    {{$module_label}}s List
                </h3>
            </div>
            <div class="card-toolbar">
                @can($permission_name.'-create')
                    <button data-toggle="modal" data-target="#storeCurrentModel"
                            class="btn btn-primary font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                    </span> Add
                    </button>
                @endcan
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table_invoice_settings">
                <thead>
                <tr class="text-uppercase">
                    <th>id</th>
                    <th class="pl-7"><span class="text-dark-75">Code</span></th>
                    <th class="pl-7"><span class="text-dark-75">Name</span></th>
                    <th class="pl-7"><span class="text-dark-75">Group</span></th>
                    <th class="pl-7"><span class="text-dark-75">Address</span></th>
                    <th class="pl-7"><span class="text-dark-75">City</span></th>
                    <th class="pl-7"><span class="text-dark-75">PinCode</span></th>
                    <th class="pl-7"><span class="text-dark-75">State</span></th>
                    <th class="pl-7"><span class="text-dark-75">GSTN</span></th>
                    <th class="pl-7"><span class="text-dark-75">Active</span></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($list))
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->vendor_prefix }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->get_vendor_group?->group }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->get_city?->name }}</td>
                            <td>{{ $item->pincode }}</td>
                            <td>{{ $item->get_state?->name }}</td>
                            <td>{{ $item->gstn }}</td>
                            <td>
                                <span
                                    class="label label-lg font-weight-bold label-inline label-light-{{ $item->status ?  'success': 'danger' }} ">
                                {{ $item->status ?  'Active': 'Inactive' }}</span>
                            </td>
                            <td class="d-flex">
                                @can($permission_name.'-update')
                                    <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                       class="btn btn-warning btn-sm btn-clean btn-icon btn-edit" title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endcan
                                @can($permission_name.'-delete')
                                    <a href="javascript:void(0)" data-id="{{ $item->id }}" title="Delete"
                                       data-toggle="modal" data-target="#deleteCurrentModal"
                                       class="btn btn-danger btn-sm btn-clean btn-icon ml-3  btn-delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="storeCurrentModel" tabindex="-1" role="dialog"
         aria-labelledby="storeCurrentModelLabel" aria-hidden="true">
        {{ html()->form('POST', '/'.$route_main)->id('storeForm')->open() }}
        <input type="hidden" name="_method" id="_method" value="">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$module_label}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Line 1 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Vendor Name* </label>
                            <input type="text" name="name" id="name" class="form-control" required/>
                        </div>
                        <div class="col-3">
                            <label>Vendor Prefix </label>
                            <input type="text" name="vendor_prefix" id="vendor_prefix" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Contact Person Name </label>
                            <input type="text" name="contact_person_name" id="contact_person_name"
                                   class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Contact No </label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control"/>
                        </div>
                    </div>
                    {{-- Line 2 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>LandLine Number </label>
                            <input type="text" name="landline_number" id="landline_number" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Email </label>
                            <input type="email" name="email" id="email" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>State* </label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($states as $line)
                                    <option value="{{$line->id}}">{{$line->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>City </label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($cities as $line)
                                    <option value="{{$line->id}}">{{$line->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 3 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>PinCode* </label>
                            <input type="text" name="pincode" id="pincode" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>FAX </label>
                            <input type="text" name="fax" id="fax" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>GSTN </label>
                            <input type="text" name="gstn" id="gstn" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Vendor Rating </label>
                            <input type="text" name="vendor_rating" id="vendor_rating" class="form-control"/>
                        </div>
                    </div>
                    {{-- Line 4 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Vendor Preference </label>
                            <input type="text" name="vendor_preference" id="vendor_preference" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Interest Percent </label>
                            <input type="text" name="interest_percent" id="interest_percent" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>GST Reg. Type </label>
                            <select name="gst_reg_type_id" id="gst_reg_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($gst_registered_types as $line)
                                    <option value="{{$line->id}}">{{$line->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Vendor Group </label>
                            <select name="vendor_group_id" id="vendor_group_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($vendor_groups as $line)
                                    <option value="{{$line->id}}">{{$line->group}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Line 5 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>PAN Number </label>
                            <input type="text" name="pan_number" id="pan_number" class="form-control"/>
                        </div>
                        <div class="col-3">
                            <label>Account Group </label>
                            <select name="account_group_id" id="account_group_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($account_groups as $line)
                                    <option value="{{$line->id}}">{{$line->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Is TDS Applicable </label>
                            <select name="is_tds_applicable" id="is_tds_applicable" class="form-control">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Deductee Type </label>
                            <select name="deductee_type" id="deductee_type" class="form-control">
                                <option value="">Select</option>
                                <option value="94J">94J-%</option>
                                <option value="94C">94C-%</option>
                                <option value="94I">94I-%</option>
                            </select>
                        </div>
                    </div>
                    {{-- Line 6 --}}
                    <div class="form-group row">
                        <div class="col-8">
                            <label>Address </label>
                            <textarea class="form-control" name="address" id="address" rows="1"></textarea>
                        </div>
                        <div class="col-4 row">
                            <div class="col-6 ">
                                <div class="col-form-label">
                                    <label>Status</label>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-success">
                                            <input type="radio" name="status" id="status_true" checked="checked"
                                                   value="1"/>
                                            <span></span>
                                            Active
                                        </label>
                                        <label class="radio radio-danger">
                                            <input type="radio" name="status" id="status_false" value="0"/>
                                            <span></span>
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Line 7 --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label>MSME/Non –MSME </label>
                            <select name="msme_non_msme" id="msme_non_msme" class="form-control">
                                <option value="">Select</option>
                                <option value="MSME">MSME</option>
                                <option value="Non-MSME">Non-MSME</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Purchase Type *</label>
                            <select name="purchase_type" id="purchase_type" class="form-control">
                                <option value="">Select</option>
                                <option value="Yarn">Yarn</option>
                                <option value="Item">Item</option>
                                <option value="Fabric">Fabric</option>
                                <option value="Sizing">Sizing</option>
                                <option value="Jobwork_Weaving">Jobwork Weaving</option>
                                <option value="Jobwork_Process">Jobwork Process</option>
                                <option value="Non_PO">Non PO</option>
                                <option value="Purchase_other_Assest">Purchase other Assest</option>
                                <option value="Warping_Purchase">Warping Purchase</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>MSME Type </label>
                            <select name="msme_type" id="msme_type" class="form-control">
                                <option value="">Select</option>
                                <option value="Micro">Micro</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>MSME Number</label>
                            <input type="text" name="msme_number" id="msme_number" class="form-control"/>
                        </div>
                    </div>
                    {{-- Line 8 --}}
                    <div class="row form-group">
                        <div class="col-12">
                            <table
                                class="table table-head-noborder table-striped table-responsive-sm loading-table table-foot-bg">
                                <thead>
                                <tr class="table-primary">
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Bank Country</th>
                                    <th>Bank State</th>
                                    <th>Bank City</th>
                                    <th>Bank Address</th>
                                    <th>Bank Pin Code</th>
                                    <th>Bank Phone Number</th>
                                    <th>IFSC Code</th>
                                    <th class="p-2 w-10px">
                                        <button class="btn btn-icon btn-sm btn-primary btn-circle" type="button"
                                                onclick="add_bank_details()"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="bank_details">
                                {{-- Remplissage Automatique --}}
                                </tbody>
                            </table>
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


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteCurrentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            {{ html()->form('POST', '')->id('deleteForm')->open() }}
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete {{$module_label}}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this {{$module_label}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('') }}/assets/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}/assets/js/datatables/certifications.js"></script>

    <script>
        $(document).ready(function () {
            $('#storeCurrentModel').on('hidden.bs.modal', function () {
                $('#storeForm').attr('action', '/{{$route_main}}');
                $('#storeForm').attr('method', 'post');
                $('#_method').val('');
                $('#name').val('');
                $('#vendor_prefix').val('');
                $('#contact_person_name').val('');
                $('#contact_no').val('');
                $('#landline_number').val('');
                $('#email').val('');
                $('#state_id').val('');
                $('#city_id').val('');
                $('#pincode').val('');
                $('#fax').val('');
                $('#gstn').val('');
                $('#vendor_rating').val('');
                $('#vendor_preference').val('');
                $('#interest_percent').val('');
                $('#gst_reg_type_id').val('');
                $('#vendor_group_id').val('');
                $('#pan_number').val('');
                $('#account_group_id').val('');
                $('#address').val('');
                $('#is_tds_applicable').val('');
                $('#deductee_type').val('');
                $('#msme_non_msme').val('');
                $('#purchase_type').val('');
                $('#msme_type').val('');
                $('#msme_number').val('');
                $('#bank_details').html('');
                $('#status_true').prop("checked", true);
                $('#status_false').prop("checked", false);
            });


            $('.btn-edit').on('click', function () {
                let id = $(this).data('id');
                $.get('/{{$route_main}}/' + id + '/edit', function (data) {
                    $('#storeForm').attr('action', '/{{$route_main}}/' + id);
                    $('#_method').val('PUT');
                    $('#name').val(data.name);
                    $('#vendor_prefix').val(data.vendor_prefix);
                    $('#contact_person_name').val(data.contact_person_name);
                    $('#contact_no').val(data.contact_no);
                    $('#landline_number').val(data.landline_number);
                    $('#email').val(data.email);
                    $('#state_id').val(data.state_id);
                    $('#city_id').val(data.city_id);
                    $('#pincode').val(data.pincode);
                    $('#fax').val(data.fax);
                    $('#gstn').val(data.gstn);
                    $('#vendor_rating').val(data.vendor_rating);
                    $('#vendor_preference').val(data.vendor_preference);
                    $('#interest_percent').val(data.interest_percent);
                    $('#gst_reg_type_id').val(data.gst_reg_type_id);
                    $('#vendor_group_id').val(data.vendor_group_id);
                    $('#pan_number').val(data.pan_number);
                    $('#account_group_id').val(data.account_group_id);
                    $('#address').val(data.address);
                    $('#is_tds_applicable').val(data.is_tds_applicable);
                    $('#deductee_type').val(data.deductee_type);
                    $('#msme_non_msme').val(data.msme_non_msme);
                    $('#purchase_type').val(data.purchase_type);
                    $('#msme_type').val(data.msme_type);
                    $('#msme_number').val(data.msme_number);
                    if (data.status === true || data.status === 1 || data.status == '1') {
                        $('#status_true').prop("checked", true);
                        $('#status_false').prop("checked", false);
                    } else {
                        $('#status_true').prop("checked", false);
                        $('#status_false').prop("checked", true);
                    }

                    $.each(data.banks, function (index, item) {
                        add_bank_details(item);
                    });

                    $('#storeCurrentModel').modal('show');
                });
            });


            $('.btn-delete').on('click', function () {
                let id = $(this).data('id');
                $('#deleteForm').attr('action', '/{{$route_main}}/' + id);
            });


        });


        const add_bank_details = (item = null) => {
            let html = ``;
            let index = $('#bank_details TR').length;
            html += `<tr>`;
            html += `    <td>`;
            html += `        <select name="bank_details[${index}][bank_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($banks as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" ${item ? ('{{$row->id}}' == item.bank_id ? 'selected' : '') : ''} >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control" name="bank_details[${index}][account_number]"`;
            html += `        value="${item ? item.account_number : ''}"   >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="bank_details[${index}][country_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($countries as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" ${item ? ('{{$row->id}}' == item.country_id ? 'selected' : '') : ''} >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="bank_details[${index}][state_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($states as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" ${item ? ('{{$row->id}}' == item.state_id ? 'selected' : '') : ''} >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="bank_details[${index}][city_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($cities as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" ${item ? ('{{$row->id}}' == item.city_id ? 'selected' : '') : ''} >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control" name="bank_details[${index}][address]" "`;
            html += `        value="${item ? item.address : ''}"   >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control" name="bank_details[${index}][pin_code]" "`;
            html += `        value="${item ? item.pin_code : ''}"   >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control" name="bank_details[${index}][phone_number]" "`;
            html += `        value="${item ? item.phone_number : ''}"   >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control" name="bank_details[${index}][ifsc_code]" "`;
            html += `        value="${item ? item.ifsc_code : ''}"   >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
            html += `                onclick="$(this).closest('tr').remove();"><i class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#bank_details').append(html);
        }


    </script>

@endpush
