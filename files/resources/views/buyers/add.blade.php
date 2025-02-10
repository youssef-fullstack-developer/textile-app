@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/buyers/'.$item?->id : '/buyers' ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} Buyers
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('buyers.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Name<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Name" value="{{$item ? $item->name : old('name')}}" required/>
                        </div>

                        <div class="col-4">
                            <label>GST Number</label>
                            <input type="text" name="gst" class="form-control" id="gst" autocomplete="off"
                                   placeholder="" value="{{$item ? $item->gst : old('gst')}}"/>
                        </div>

                        <div class="col-4">
                            <label>Buyer Country<b class="text-danger">*</b></label>
                            <select name="country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{$country->id}}" {{ ($item?->country_id == $country->id) ? 'selected' : '' }}>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>State:</label>
                            <select name="state_id" class="form-control">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option
                                        value="{{$state->id}}" {{ ($item?->state_id == $state->id) ? 'selected' : '' }}>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Buyer Address 1<b class="text-danger">*</b></label>
                            <input type="text" name="address_1" class="form-control" id="address_1" autocomplete="off"
                                   placeholder="Enter Address" value="{{$item ? $item->address_1 : old('address_1')}}"
                                   required/>
                        </div>
                        <div class="col-4">
                            <label>Buyer Address 2:</label>
                            <input type="text" name="address_2" class="form-control" id="address_2" autocomplete="off"
                                   placeholder="Enter Address" value="{{$item ? $item->address_2 : old('address_2')}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Buyer Address 3:</label>
                            <input type="text" name="address_3" class="form-control" id="address_3" autocomplete="off"
                                   placeholder="Enter Address" value="{{$item ? $item->address_3 : old('address_3')}}"/>
                        </div>

                        <div class="col-4">
                            <label>Buyer City:</label>
                            <select name="city_id" class="form-control">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option
                                        value="{{$city->id}}" {{ ($item?->city_id == $city->id) ? 'selected' : '' }}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Buyer Phone no:</label>
                            <input type="text" name="phone" class="form-control" id="phone" autocomplete="off"
                                   placeholder="Enter Phone" value="{{$item ? $item->phone : old('phone')}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Buyer Pincode<b class="text-danger">*</b></label>
                            <input type="text" name="buyer_pincode" class="form-control" id="buyer_pincode"
                                   autocomplete="off" placeholder="Enter Pincode"
                                   value="{{$item ? $item->buyer_pincode : old('buyer_pincode')}}" required/>
                        </div>
                        <div class="col-4">
                            <label>Buyer Email Id :</label>
                            <input type="text" name="email" class="form-control" id="email" autocomplete="off"
                                   placeholder="Enter Email Id" value="{{$item ? $item->email : old('email')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Buyer No:</label>
                            <input type="text" name="buyer_no" class="form-control" id="buyer_no" autocomplete="off"
                                   placeholder="Enter buyer no" value="{{$item ? $item->buyer_no : old('buyer_no')}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Buyer Code:</label>
                            <input type="text" name="buyer_code" class="form-control" id="buyer_code" autocomplete="off"
                                   placeholder="Enter buyer code"
                                   value="{{$item ? $item->buyer_code : old('buyer_code')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Bank:</label>
                            <input type="text" name="bank" class="form-control" id="bank" autocomplete="off"
                                   placeholder="Enter Bank" value="{{$item ? $item->bank : old('bank')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Bank Country:</label>
                            <select name="bank_country_id" class="form-control">
                                <option value="">Select country</option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{$country->id}}" {{ ($item?->bank_country_id == $country->id) ? 'selected' : '' }}>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Bank State:</label>
                            <select name="bank_state_id" class="form-control">
                                <option value="">Select Bank State</option>
                                @foreach($states as $state)
                                    <option
                                        value="{{$state->id}}" {{ ($item?->bank_state_id == $state->id) ? 'selected' : '' }}>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>State Code:</label>
                            <input type="text" name="state_code" class="form-control" id="buyer_code" autocomplete="off"
                                   placeholder="Enter State code"
                                   value="{{$item ? $item->state_code : old('state_code')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Bank Address:</label>
                            <textarea placeholder="" name="bank_address" rows="3" class="form-control"
                            >{{$item ? $item->bank_address : old('bank_address')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Pincode:</label>
                            <input type="text" name="pincode" class="form-control" id="pincode" autocomplete="off"
                                   value="{{$item ? $item->pincode : old('pincode')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Bank City:</label>
                            <select name="bank_city_id" class="form-control">
                                <option value="">Select Bank City</option>
                                @foreach($cities as $city)
                                    <option
                                        value="{{$city->id}}" {{ ($item?->bank_city_id == $city->id) ? 'selected' : '' }}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <div class="checkbox-list mt-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="is_active" value="1" class="form-control"
                                        {{$item ? ($item->is_active == 1 ? 'checked' : '') : 'checked'}}/>
                                    <span></span>
                                    Is Active
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Credit Limit:</label>
                            <input type="text" name="credit_limit" class="form-control" id="credit_limit"
                                   autocomplete="off"
                                   value="{{$item ? $item->credit_limit : old('credit_limit')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Interest %:</label>
                            <input type="text" name="interest" class="form-control" id="interest" autocomplete="off"
                                   value="{{$item ? $item->interest : old('interest')}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>GST Reg. Type<b class="text-danger">*</b></label>
                            <select name="gst_type" class="form-control" required>
                                <option value="">Select GST Reg. Type</option>
                                @foreach($gst_registered_types as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->gst_type == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="checkbox-list mt-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="consignee_as_buyer" value="1" class="form-control"
                                        {{$item ? ($item->consignee_as_buyer == 1 ? 'checked' : '') : 'checked'}} />
                                    <span></span>
                                    Consignee as a buyer
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Account Group:</label>
                            <select name="account_group" class="form-control">
                                <option value="">Select Account Group</option>
                                @foreach($account_groups as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->account_group == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Group:</label>
                            <select name="vendor_group_id" class="form-control">
                                <option value="">Select vendor group</option>
                                @foreach($vendor_groups as $vendor_group)
                                    @if(strtolower($vendor_group?->get_group_type?->name ?? '') == 'buyer')
                                        <option
                                            value="{{$vendor_group->id}}"
                                            {{ ($item?->vendor_group_id == $vendor_group->id) ? 'selected' : '' }}
                                        >{{$vendor_group->group}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Tax Id:</label>
                            <input type="text" name="tax_id" class="form-control" id="tax_id" autocomplete="off"
                                   value="{{$item ? $item->tax_id : old('tax_id')}}"/>
                        </div>
                        <div class="col-4">
                            <label>Pan Number:</label>
                            <input type="text" name="pan" class="form-control" id="pan" autocomplete="off"
                                   value="{{$item ? $item->pan : old('pan')}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Port Of Loading:</label>
                            <select name="port_landing" class="form-control">
                                <option value="">Select Port Of Landing</option>
                                @foreach($ports as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->port_landing == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Port Of Destination:</label>
                            <select name="port_destination" class="form-control">
                                <option value="">Select Port Of Destination</option>
                                @foreach($port_of_destinations as $row)
                                    <option
                                        value="{{$row->id}}" {{ ($item?->port_destination == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Currency:</label>
                            <select name="currency" class="form-control">
                                <option value="">Select Currency</option>
                                <option value="usd" {{ ($item?->currency == 'usd') ? 'selected' : '' }}>USD</option>
                                <option value="rupess" {{ ($item?->currency == 'rupess') ? 'selected' : '' }}>RUPEES
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <div class="checkbox-list mt-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="is_self" value="1" class="form-control"
                                        {{$item ? ($item->is_self == 1 ? 'checked' : '') : 'checked'}}/>
                                    <span></span>
                                    Is Self
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="row my-4">
                        <h3>
                            Consignee Details <b class="text-danger">*</b>
                        </h3>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <table
                                class="table table-head-noborder table-striped table-responsive-sm loading-table table-foot-bg">
                                <thead>
                                <tr class="table-primary">
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Pin Code</th>
                                    <th>Phone Number</th>
                                    <th>Email Id</th>
                                    <th>GSTN</th>
                                    <th>Pan NO</th>
                                    <th class="p-2 w-10px">
                                        <button class="btn btn-icon btn-sm btn-primary btn-circle" type="button"
                                                onclick="add_consignee_details()"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="consignee_details">
                                @foreach($item?->consignee_details ?? array() as $index => $line)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][name]"
                                                   value="{{$line?->name}}">
                                        </td>
                                        <td>
                                            <select name="consignee_details[{{$index}}][country_id]"
                                                    class="form-control">
                                                <option value="">Select</option>
                                                @foreach($countries as $row)
                                                    <option
                                                        value="{{$row->id}}" {{ ($line?->country_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="consignee_details[{{$index}}][state_id]" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($states as $row)
                                                    <option
                                                        value="{{$row->id}}" {{ ($line?->state_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="consignee_details[{{$index}}][city_id]" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($cities as $row)
                                                    <option
                                                        value="{{$row->id}}" {{ ($line?->city_id == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][address]"
                                                   value="{{$line?->address}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][pin_code]"
                                                   value="{{$line?->pin_code}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][phone_number]"
                                                   value="{{$line?->phone_number}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][email_id]"
                                                   value="{{$line?->email_id}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][gstn]"
                                                   value="{{$line?->gstn}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   name="consignee_details[{{$index}}][pan_no]"
                                                   value="{{$line?->pan_no}}">
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                    onclick="$(this).closest('tr').remove();"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row my-4">
                        <h3>
                            Buyer Representative
                        </h3>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <table
                                class="table table-head-noborder table-striped table-responsive-sm loading-table table-foot-bg">
                                <thead>
                                <tr>
                                    <th>REPRESENTATIVE NAME</th>
                                    <th>CONTACT NUMBER</th>
                                    <th>
                                        <button class="btn btn-icon btn-sm btn-primary btn-circle" type="button"
                                                onclick="addRow()"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="tbl">
                                @php($i = 0)
                                @while( (empty($item) &&  $i == 0) || (count($item?->representatives ?? []) > $i ) )
                                    @php($row = $item ? $item->representatives[$i] : NULL)
                                    <tr class="representative">
                                        <td style="vertical-align: middle">
                                            <input type="text" step="any" class="form-control"
                                                   name="representatives[{{$i}}][representative_name]"
                                                   id="representatives[{{$i}}][representative_name]"
                                                   value="{{$item ? $row?->representative_name : ''}}">
                                        </td>
                                        <td style="vertical-align: middle">
                                            <input type="text" step="any" class="form-control"
                                                   name="representatives[{{$i}}][representative_phone]"
                                                   id="representatives[{{$i}}][representative_phone]"
                                                   value="{{$item ? $row?->representative_phone : ''}}">
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"
                                                    onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @php($i++)
                                @endwhile
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
@push('scripts')
    <script>
        const addRow = () => {
            let html = '';
            let index = $('.representative').length;
            html += '<tr class="representative">';
            html += `<td style="vertical-align: middle"><input type="text" step="any" class="form-control" name="representatives[${index}][representative_name]" id="representatives[${index}][representative_name]"></td>`;
            html += `<td style="vertical-align: middle"><input type="text" step="any" class="form-control" name="representatives[${index}][representative_phone]" id="representatives[${index}][representative_phone]"></td>`;
            html += '<td>';
            html += '<button class="btn btn-icon btn-danger btn-sm btn-circle" type="button" onclick="deleteRow(this)" ><i class="fa fa-trash"></i></button>';
            html += '</td>';
            html += '</tr>';
            $('#tbl').append(html);
        }

        const add_consignee_details = () => {
            let html = ``;
            let index = $('#consignee_details TR').length;
            html += `<tr>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][name]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="consignee_details[${index}][country_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($countries as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="consignee_details[${index}][state_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($states as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <select name="consignee_details[${index}][city_id]" class="form-control">`;
            html += `            <option value="">Select</option>`;
            @foreach($cities as $row)
                html += `            <option`;
            html += `                value="{{$row->id}}" >{{$row->name}}</option>`;
            @endforeach
                html += `        </select>`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][address]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][pin_code]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][phone_number]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][email_id]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][gstn]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <input type="text" class="form-control"`;
            html += `               name="consignee_details[${index}][pan_no]" >`;
            html += `    </td>`;
            html += `    <td>`;
            html += `        <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button"`;
            html += `                onclick="$(this).closest('tr').remove();"><i class="fa fa-trash"></i></button>`;
            html += `    </td>`;
            html += `</tr>`;
            $('#consignee_details').append(html);
        }

        const deleteRow = (val) => {
            $(val).closest('tr').remove();
        }
    </script>
@endpush
