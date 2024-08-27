@extends('main')
@section('content')
    {{ html()->form('POST', '/agent')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Agent
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('agent.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                placeholder="Enter Location" value="{{ old('name') }}" required />
                        </div>

                        <div class="col-4">
                            <label>Country:</label>
                            <select name="location" class="form-control">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contact No:</label>
                            <input type="text" name="contact_no" class="form-control" id="name" autocomplete="off"
                                placeholder="Enter Contact No" value="{{ old('name') }}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Secondary Contact No:</label>
                            <input type="text" name="selvedge_width" class="form-control" id="contact"
                                autocomplete="off" placeholder="Enter Secondary Contact No" value="{{ old('contact') }}" />
                        </div>

                        <div class="col-4">
                            <label>Address:</label>
                            <input type="text" name="selvedge_width" class="form-control" id="contact"
                                autocomplete="off" placeholder="Enter Address" value="{{ old('contact') }}" />
                        </div>

                        <div class="col-4">
                            <label>Pin Code:</label>
                            <input type="text" name="selvedge_width" class="form-control" id="contact"
                                autocomplete="off" placeholder="Enter Pin Code" value="{{ old('contact') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent Percent:</label>
                            <input type="text" name="zone" class="form-control" id="zone" autocomplete="off"
                                placeholder="Enter Agent Percent" value="{{ old('zone') }}" />
                        </div>

                        <div class="col-4">
                            <label>Agent Type:</label>
                            <select name="location" class="form-control">
                                <option value="">Select Agent Type</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>A/C Group:</label>
                            <select name="location" class="form-control">
                                <option value="">Select A/C Group</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Status:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="is_active" checked="checked" value="1" />
                                                <span></span>
                                                Active
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="is_active" value="0" />
                                                <span></span>
                                                Inactive
                                            </label>
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
