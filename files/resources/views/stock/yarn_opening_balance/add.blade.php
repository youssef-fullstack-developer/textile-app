@extends('main')
@section('content')
    {{ html()->form('POST', '/vendors')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Yarn Opening Balance
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('stock.yarn_opening_balance.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Date</label>
                            <input type="date" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                   placeholder="Enter Sort No" value="{{ old('sort_no') }}" />
                        </div>

                        <div class="col-4">
                            <label>Transportation Details:</label>
                            <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                placeholder="" value="{{ old('sort_no') }}" />
                        </div>

                        <div class="col-4">
                            <label>Vendor Group:</label>
                            <select name="create_for" class="form-control">
                                <option value="">Select Vendor Group</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>DC No/Gate Pass No:</label>
                            <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                   placeholder="" value="{{ old('sort_no') }}" />
                        </div>

                        <div class="col-4">
                            <label>DC Date/ Gate Pass Date</label>
                            <input type="date" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                   placeholder="Enter Sort No" value="{{ old('sort_no') }}" />
                        </div>

                        <div class="col-4">
                            <label>Taxable Amount:</label>
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
                            <label>Stock Type:</label>
                            <select name="company" class="form-control">
                                <option value="">Select Stock Type</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <div class="checkbox-list mt-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="Checkboxes1" class="form-control">
                                    <span></span>
                                    Is JobWorkOrder
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>
                            Add Item
                        </button>
                    </div>

                    <div class="container border-1">
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Yarn Count:</label>
                                <select name="company" class="form-control">
                                    <option value="">Select Yarn Count</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label>Mill Name :</label>
                                <select name="company" class="form-control">
                                    <option value="">Select Mill</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Total No Of Bags / Box:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Kgs Per Bag / Box(Bag / Box Weight):</label>
                                        <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                               placeholder="" value="{{ old('sort_no') }}" />
                                    </div>
                                    <div class="col-6">
                                        <label></label>
                                        <input type="text" name="sort_no" class="form-control mt-2" id="sort_no" autocomplete="off"
                                               placeholder="" value="{{ old('sort_no') }}" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Cones Per Bag / Box</label>
                                        <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                               placeholder="" value="{{ old('sort_no') }}" />
                                    </div>
                                    <div class="col-6">
                                        <label>Total Cones</label>
                                        <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                               placeholder="" value="{{ old('sort_no') }}" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <label>Total Kgs:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Rate Per Kg:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
                            </div>
                            <div class="col-6">
                                <label>Basic Amount:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Gross Weight:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label>is Multiple Lot:</label>
                                <select name="company" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Number Of LOT:</label>
                                <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                       placeholder="" value="{{ old('sort_no') }}" />
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
