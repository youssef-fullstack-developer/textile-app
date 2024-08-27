@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Yarn Process Contract
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('consignee.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Booking Date:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Booking Date." value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>Process:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Process</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Group:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Group</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Vendor:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Vendor</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contract Number:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                placeholder="Enter Contract Number" value="{{ old('gstn') }}" />
                        </div>

                        <div class="col-4">
                            <label>Contract Date:</label>
                            <input type="date" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Contract Date" value="{{ old('pin') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Agent</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contact Person 1:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Contact Person 1</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contact Person 2:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Person 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Rate per Meter:</label>
                            <input type="number" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Rate per Meter" value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <label>Delivery Date:</label>
                            <input type="date" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Rate per Meter" value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <label>Inspection Type:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Inspection Type</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Payment Terms:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Payment Terms</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Order Meters:</label>
                            <input type="text" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Order Meters" value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <label>Transport:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Transport</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Delivery Location:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Delivery Location</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Wastage:</label>
                            <input type="text" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Wastage" value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <label>GST Type:</label>
                            <select name="state" class="form-control">
                                <option value="">Select GST</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Terms & Conditions:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Terms & Conditions</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Remarks 1:</label>
                            <textarea name="state" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <table class="table-hover table table-bordered">
                                <tr>
                                    <th>Sort No.</th>
                                    <th>Finished Quality</th>
                                    <th>Grey Quality</th>
                                    <th>Order No.</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Taxable Amount</th>
                                    <th>Action</th>
                                </tr>
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
