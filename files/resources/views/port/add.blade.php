@extends('main')
@section('content')
    {{ html()->form('POST', '/port')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Port
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('port.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Port Code:</label>
                            <input type="text" name="code" class="form-control" id="code" autocomplete="off"
                                placeholder="Enter Port Code" value="{{ old('code') }}" required />
                        </div>

                        <div class="col-4">
                            <label>State:</label>
                            <select name="state" class="form-control">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Port Name:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                placeholder="Enter Port Name" value="{{ old('name') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-4">
                            <label>Pin:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Pin" value="{{ old('pin') }}" />
                        </div>

                        <div class="col-4">
                            <label>City:</label>
                            <select name="city" class="form-control">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
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
                                                <input type="radio" name="status" checked="checked" value="1" />
                                                <span></span>
                                                Active
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="status" value="0" />
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
