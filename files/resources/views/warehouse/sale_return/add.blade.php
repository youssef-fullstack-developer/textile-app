@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Sale Return
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('warehouse.sale_return.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Date:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Date" value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>Invoice No:</label>
                            <select name="date" class="form-control">
                                <option value="">Select Invoice No</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Buyer PO:</label>
                            <input type="text" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Buyer PO" value="{{ old('address') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Remakrs:</label>
                            <textarea name="date" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <table class="table-hover table table-bordered">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Bale / Roll No</th>
                                    <th>Quality</th>
                                    <th>Piece No</th>
                                    <th>Receiving Piece No</th>
                                    <th>Actual Quantity</th>
                                    <th>Receiving Quantity</th>
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
