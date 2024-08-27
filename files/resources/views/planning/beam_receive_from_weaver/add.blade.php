@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Beam Receive From Weaver
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
                            <label>Vendor Name:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Vendor Name" value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>Jobwork Contract:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Jobwork Contract</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Slip No:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Slip No" value="{{ old('address') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Received Date:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Slip Date" value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>Location:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Location</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>CHK No:</label>
                            <input type="text" name="pin" class="form-control" id="pin" autocomplete="off"
                                placeholder="Enter CHK No" value="{{ old('pin') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>CHK Name:</label>
                            <select name="state" class="form-control">
                                <option value="">Select CHK Name</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>ENT No:</label>
                            <select name="state" class="form-control">
                                <option value="">Select ENT No</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Lot No:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Lot No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-12">
                            <table class="table-hover table table-bordered">
                                <tr>
                                    <th>SL No.</th>
                                    <th>Quality</th>
                                    <th>Design</th>
                                    <th>Char</th>
                                    <th>Piece No</th>
                                    <th>Vendor Pice No</th>
                                    <th>Vendor Lot No</th>
                                    <th>Issued Meters</th>
                                    <th>Piece Meter</th>
                                    <th>Fold</th>
                                    <th>Net Piece Meters</th>
                                    <th>Weight</th>
                                    <th>Remarks</th>
                                    <th>Is Cut Piece</th>
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
