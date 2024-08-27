@extends('main')
@section('content')
    {{ html()->form('POST', '/vendors')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Fabric Opening Balance
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('stock.fabric_opening_balance.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Vendor Group:</label>
                            <select name="create_for" class="form-control">
                                <option value="">Select Vendor Group</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Receiving Date</label>
                            <input type="date" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                   placeholder="Enter Sort No" value="{{ old('sort_no') }}" />
                        </div>
                        <div class="col-4">
                            <label>Inward No:</label>
                            <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                placeholder="" value="{{ old('sort_no') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Location:</label>
                            <select name="company" class="form-control">
                                <option value="">Select Location</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Is Inspected:</label>
                            <select name="company" class="form-control">
                                <option value="">Select is inspected</option>
                            </select>
                        </div>
                        <div class="col-4 mt-8">
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="Checkboxes1" class="form-control">
                                    <span></span>
                                    calculation from Master
                                </label>
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
