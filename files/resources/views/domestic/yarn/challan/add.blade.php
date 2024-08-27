@extends('main')
@section('content')
    {{ html()->form('POST', '/consignee')->open() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Yarn Sales Challan
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('domestic.yarn.challan.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-6">
                            <label>Yarn Challan No:</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="" value="{{ old('name') }}" required/>
                        </div>
                        <div class="col-6">
                            <label>Challan Date:</label>
                            <input type="date" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="" value="{{ old('name') }}" required/>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                                <label>Order No:</label>
                                <select name="city" class="form-control">
                                    <option value="">Select</option>
                                </select>
                        </div>
                        <div class="col-6">
                            <label>Buyer:</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label>Remarks:</label>
                           <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="col-6">
                            <label>Vehicle Number:</label>
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
