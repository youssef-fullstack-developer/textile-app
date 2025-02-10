@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'po_fabric_processing_jw';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : '' ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            APPROVE DETAILS
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route.'.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h1 class="text-center">Jobwork Process Order</h1>
                        {{-- First table --}}
                        <table class="table">
                            {{-- Line 1 --}}
                            <tr>
                                <td class="text-center">
                                    <h1>{{session('company')}}</h1>
                                    <h6>Tel: | Email: | Web:</h6>
                                </td>
                            </tr>
                        </table>
                        <div class="row border border-2 border-light-dark p-4">
                            <div class="col-3 border-right border-4 border-light-dark">
                                <table>
                                    <tr>
                                        <td><b>Date</b></td>
                                        <td>:</td>
                                        <td>{{$item->booking_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>PO NO</b></td>
                                        <td>:</td>
                                        <td>{{$item->contract_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Vendor Group</b></td>
                                        <td>:</td>
                                        <td>{{$item->vendor_group?->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Agent Name</b></td>
                                        <td>:</td>
                                        <td>{{$item->agent?->name}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-3 border-right border-4 border-light-dark">
                                <b>Vendor Details : </b><br>
                                {{$item->vendor?->name}}
                                <br><b>GSTIN No : </b>
                                {{$item->vendor?->name}}
                            </div>
                            <div class="col-3 border-right border-4 border-light-dark">
                                <b>Consignee Details : </b><br>
                                {{$item->vendor?->name}}
                            </div>
                            <div class="col-3">
                                <table>
                                    <tr>
                                        <td><b>Fabric Type</b></td>
                                        <td>:</td>
                                        <td>{{$item->igst}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>GST Type</b></td>
                                        <td>:</td>
                                        <td>{{$item->igst ? 'IGST' : 'CGST/SGST'}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Terms And Conditions</b></td>
                                        <td>:</td>
                                        <td>{{$item->terms_conditions?->name}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- Details --}}
                            <div class="row border border-2 border-light-dark p-4">
                                <div class="col-12 border-right border-4 border-light-dark">
                                    <table class="table">
                                        <tr class="table-active">
                                            <th>GREY FABRIC DETAILS</th>
                                            <th>FINISHED FABRIC DETAILS</th>
                                            <th>ORDER NO.</th>
                                            <th>QUANTITY</th>
                                            <th>FINISH RATE</th>
                                            <th>TAXABLE AMOUNT</th>
                                        </tr>
                                        @foreach($item->details as $index => $row)
                                            <tr>
                                                <th>{{$row->grey_quality}}</th>
                                                <th>{{$row->finished_quality}}</th>
                                                <th>{{$row->order_no}}</th>
                                                <th>{{$row->quantity}}</th>
                                                <th>{{$row->rate}}</th>
                                                <th>{{$row->taxable_amount}}</th>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        {{-- Totals --}}
                        <div class="row border border-2 border-light-dark p-4">
                            <div class="col-6">
                                <table class="table">
                                    <tr>
                                        <td><b>SGST {{$item->gst_type == 'igst' ? $item->gst_percent : '0.00'}}%</b></td>
                                        <td>:</td>
                                        <td>{{$item->sgst_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>CGST {{$item->gst_type == 'igst' ? $item->gst_percent : '0.00'}}%</b></td>
                                        <td>:</td>
                                        <td>{{$item->cgst_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>IGST {{$item->gst_type == 'igst' ? $item->gst_percent : '0.00'}}%</b></td>
                                        <td>:</td>
                                        <td>{{$item->igst_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Grand Total</b></td>
                                        <td>:</td>
                                        <td>{{$item->grand_total}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- Last table --}}
                        <div class="row border border-2 border-light-dark p-4">
                            <table class="table ">
                                {{-- Line 1 --}}
                                <tr>
                                    <td>
                                        <b>Date</b>
                                    </td>
                                    <td colspan="5">
                                        <input type="hidden" name="approval_date"
                                               value="{{$item->approval_date ?? $currentDateTime}}">
                                        {{$item->approval_date ?? $currentDateTime}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Internal Remark</b></td>
                                    <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="internal_remark" @else disabled @endif
                                              >{{$item->internal_remark}}</textarea>
                                    </td>
                                    <td><b>Customer Instruction</b></td>
                                    <td colspan="2">
                                    <textarea rows="2" @if(empty($item->approval)) name="customer_instruction" @else disabled @endif
                                              >{{$item->customer_instruction}}</textarea>
                                    </td>
                                    <td><b>Comments</b></td>
                                    <td>
                                    <textarea rows="2" @if(empty($item->approval)) name="comments" @else disabled @endif
                                    >{{$item->comments}}</textarea>
                                    </td>
                                </tr>
                            </table>
                            @if(empty($item->approval))
                                <div class="text-center">
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="1"/>
                                                <span></span>
                                                Approve
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="-1"/>
                                                <span></span>
                                                Reject
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="approval" value="0"/>
                                                <span></span>
                                                Hold
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(empty($item->approval))
                        <div class="card-footer text-center">
                            <button type="submit" name="submit" value="submit"
                                    class="btn btn-success font-weight-bolder mr-4 w-135px">
                                SAVE
                            </button>
                            <a href="{{ route($route.'.index') }}" class="btn btn-warning font-weight-bolder w-135px">
                                CANCEL
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@endsection
