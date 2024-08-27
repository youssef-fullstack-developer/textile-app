@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Domestic Order
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('domestic.sales_order.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Invoice Type:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Invoice Type</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Contract Type:</label>
                            <select name="state" class="form-control">
                                <option value="">Select Contract Type</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Order Route:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Order Route</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Order Date:</label>
                            <input type="date" name="address" class="form-control" id="address" autocomplete="off"
                                placeholder="Enter Order Date" value="{{ old('address') }}" />
                        </div>

                        <div class="col-4">
                            <label>Buyer Name:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Buyer Name</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Address:</label>
                            <input type="text" name="pan" class="form-control" id="pan" autocomplete="off"
                                   placeholder="Enter Address" value="{{ old('pan') }}" />
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-4">
                            <label>Agent / Broker:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Agent / Broker</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Delivery Address:</label>
                            <select name="city" class="form-control">
                                <option value="">Delivery Address</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Confirmation Date:</label>
                            <input type="date" name="pan" class="form-control" id="pan" autocomplete="off"
                                placeholder="Enter Tax ID No." value="{{ old('pan') }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Mode Of Shipment:</label>
                            <select name="city" class="form-control">
                                <option value=""> Mode Of Shipment</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Delivery Terms:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Delivery Terms</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Terms Of Payment:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Terms Of Payment</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>GST Type:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Type</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Sales Co-Ordinator:</label>
                            <select name="city" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Bank:</label>
                            <select name="city" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>SO Type:</label>
                            <select name="city" class="form-control">
                                <option value="">Select SO Type</option>
                            </select>
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
