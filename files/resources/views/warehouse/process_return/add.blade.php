@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Jobwork Fabric Receive
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('warehouse.jobwork_fabric_receive.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
                            <label>PO No:</label>
                            <select name="date" class="form-control">
                                <option value="">Select PO No</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Bill Quantity @ 100 cm:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Booking Date." value="{{ old('address') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Remakrs:</label>
                            <textarea name="date" class="form-control"></textarea>
                        </div>

                        <div class="col-4">
                            <label>Vendor Invoice No:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                placeholder="Enter Vendor Invoice No" value="{{ old('gstn') }}" />
                        </div>

                        <div class="col-4">
                            <label>Folding Less:</label>
                            <input type="date" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Folding Less" value="{{ old('pin') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Shortage:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Shortage" value="{{ old('pin') }}" />
                        </div>

                        <div class="col-4">
                            <label>Purchase Amount / Meter:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Purchase Amount / Meter" value="{{ old('pin') }}" />
                        </div>

                        <div class="col-4">
                            <label>Vehicle No:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter Vehicle No" value="{{ old('pin') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Terns & Conditions:</label>
                            <select name="state" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>L. No:</label>
                            <input type="date" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter L No." value="{{ old('pan') }}" />
                        </div>

                        <div class="col-4">
                            <label>Other Returns:</label>
                            <input type="date" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Other Returns" value="{{ old('pan') }}" />
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <table class="table-hover table table-bordered">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Quality</th>
                                    <th>Piece No.</th>
                                    <th>Quantity</th>
                                    <th>Vendor</th>
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
