@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Yarn Sales Contract
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('domestic.yarn.sales_contract.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Contract Date:</label>
                            <input type="date" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="" value="{{ old('name') }}" required/>
                        </div>
                        <div class="col-4">
                            <label>Buyer:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Buyer</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Buyer Address:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="" value="{{ old('name') }}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Agent:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Agent</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Agent Percent:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Po No:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Po Date:</label>
                            <input type="date" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Agent Conf No:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-4">
                            <label>Mode Of Shipment:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Mode Of Shipment</option>
                            </select>
                        </div>


                    </div>

                    <div class="form-group row">
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
                        <div class="col-4">
                            <label>GST Type:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Gst</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Terms And Condition:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Terms And Condition</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>User:</label>
                            <select name="city" class="form-control">
                                <option value="">Select User</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Sales Co-Ordinator:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Bank:</label>
                            <select name="city" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Transportation:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Transportation</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Delivery Name:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Delivery Name</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Delivery Address:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>
                        <div class="col-4">
                            <div class="checkbox-list mt-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="Checkboxes1" value="1" class="form-control">
                                    <span></span>
                                    Is BottomSales
                                </label>
                            </div>
                        </div>
                    </div>
                    <h2>Yarn Sales Contract</h2>

                    <div class="form-group row">
                        <div class="col-3">
                            <label>Count :</label>
                            <select name="city" class="form-control">
                                <option value="">Select Yarn Name</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Ticket Name:</label>
                            <select name="city" class="form-control">
                                <option value="">Select Ticket Name</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <label>No Of Bags*:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-3">
                            <label>Bag Weight:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-3">
                            <label>Net Weight in Kgs*:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-3">
                            <label>Unit Price:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
                        </div>

                        <div class="col-3">
                            <label>Total Price:</label>
                            <input type="text" name="gstn" class="form-control" id="gstn" autocomplete="off"
                                   placeholder="" value="{{ old('gstn') }}"/>
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
