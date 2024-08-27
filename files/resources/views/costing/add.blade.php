@extends('main')
@section('content')
    @php
        $route_main = 'costings';
        $module_label = 'Costing';
    @endphp
    {{ html()->form('POST', '/'.$route_main)->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{$module_label}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route_main.'.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                placeholder="Enter Name" value="{{ old('name') }}" required />
                        </div>

                        <div class="col-4">
                            <label>State:</label>
                            <select name="state_id" class="form-control">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{old('state_id') == $state->id ? 'selected' : ''}} >{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>City:</label>
                            <select name="city_id" class="form-control">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Address" value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>GSTN:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                placeholder="Enter GSTN" value="{{ old('gstn') }}" />
                        </div>

                        <div class="col-4">
                            <label>Pin Code:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Pin Code" value="{{ old('pin') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Contact No:</label>
                            <input type="text" name="contact" class="form-control" id="contact" autocomplete="off"
                                placeholder="Enter Contact" value="{{ old('contact') }}" />
                        </div>

                        <div class="col-4">
                            <label>PAN:</label>
                            <input type="text" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter PAN" value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>status:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="active" checked="checked" value="1" />
                                                <span></span>
                                                Active
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="active" value="0" />
                                                <span></span>
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
