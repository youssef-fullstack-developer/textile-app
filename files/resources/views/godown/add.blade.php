@extends('main')
@section('content')
    {{ html()->form('POST', '/godown')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Godown Location
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('godown.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Godown Location:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Location" value="{{ old('name') }}" required/>
                        </div>

                        <div class="col-4">
                            <label>Description:</label>
                            <textarea name="description" class="form-control"
                                      id="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-4">
                            <label>Location:</label>
                            <select name="location" class="form-control">
                                <option value="">Select Location</option>
                                <option value="others">Others</option>
                                <option value="yarn_godown">Yarn Godown</option>
                                <option value="fabric_receive_godown">Fabric Receive Godown</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Location Code:</label>
                            <input type="text" name="code" class="form-control" id="contact"
                                   autocomplete="off" placeholder="Enter Location Code" value="{{ old('code') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Vendor Group:</label>
                            <select name="vendor_group_id" class="form-control">
                                <option value="">Select Vendor Group</option>
                                @foreach($vendor_groups as $group)
                                    <option value="{{$group->id}}">{{$group->group}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Location Type:</label>
                            <select name="type" class="form-control">
                                <option value="">Select Location Type</option>
                                <option value="warehouse">WareHouse</option>
                                <option value="sizing">Sizing</option>
                                <option value="inhouse">InHouse</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Zone:</label>
                            <input type="text" name="zone" class="form-control" id="zone" autocomplete="off"
                                   placeholder="Enter Zone" value="{{ old('zone') }}"/>
                        </div>

                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Default:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="is_default" checked="checked" value="1"/>
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="is_default" value="0"/>
                                                <span></span>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
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
