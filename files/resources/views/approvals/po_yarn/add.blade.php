@extends('main')
@section('content')
    {{ html()->form('POST', 'yarn_po_create')->open() }}
    <input type="hidden" name="id" value="{{$item?->id}}">
    <input type="hidden" name="id" value="{{$type}}">
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
                        <a href="{{ route('approval_yarn_po') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h1 class="text-center">Yarn Purchase Order</h1>
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
                                        <td>{{ $type == 'po' ? $item->po_date : ($type == 'inward' ? $item->date : '')}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>PO NO</b></td>
                                        <td>:</td>
                                        <td>{{ $type == 'po' ? $item->po_number : ($type == 'inward' ? $item->id : '')}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Vendor Group</b></td>
                                        <td>:</td>
                                        <td>{{$item->vendor_group?->group}}</td>
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
                            </div>
                            <div class="col-3 border-right border-4 border-light-dark">
                                <b>Consignee Details : </b><br>
                                {{$item->vendor?->name}}
                            </div>
                            <div class="col-3">
                                <table>
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
                        @foreach($item->details as $index => $row)
                            <div class="row border border-2 border-light-dark p-4">
                                <div class="col-4 border-right border-4 border-light-dark">
                                    <table>
                                        <tr>
                                            <td><b>Yarn Count</b></td>
                                            <td>:</td>
                                            <td>{{ $row == 'po' ? $row->count?->name : ($row == 'inward' ? $row->yarn?->name : '')}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Quantity</b></td>
                                            <td>:</td>
                                            <td>{{$row->total_cones}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Basic Amount</b></td>
                                            <td>:</td>
                                            <td>{{$row->basic_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Delivery Terms</b></td>
                                            <td>:</td>
                                            <td>{{$item->delivery_term?->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mill Gst Price</b></td>
                                            <td>:</td>
                                            <td>{{$row->mill_gst_price}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Delivery Date</b></td>
                                            <td>:</td>
                                            <td>{{$row->delivery_date}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Costing Price</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-4 border-right border-4 border-light-dark">
                                    <table>
                                        <tr>
                                            <td><b>Payment Terms</b></td>
                                            <td>:</td>
                                            <td>{{$item->payment_terms?->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Yarn Certification Type</b></td>
                                            <td>:</td>
                                            <td>{{$item->certification_type?->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Unit Price</b></td>
                                            <td>:</td>
                                            <td>{{$row->mill_price}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Amount</b></td>
                                            <td>:</td>
                                            <td>{{$row->total_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Provisional Freight</b></td>
                                            <td>:</td>
                                            <td>{{$row->provisional_freight}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Final Price</b></td>
                                            <td>:</td>
                                            <td>{{$row->final_price}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Remarks</b></td>
                                            <td>:</td>
                                            <td>{{$row->remark}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-4">
                                    <table>
                                        <tr>
                                            <td><b>SGST {{$row->sgst_val}}%</b></td>
                                            <td>:</td>
                                            <td>{{$row->sgst_amount ?? '0.00'}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>CGST {{$row->cgst_val}}%</b></td>
                                            <td>:</td>
                                            <td>{{$row->cgst_amount ?? '0.00'}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>IGST {{$row->igst_val}}%</b></td>
                                            <td>:</td>
                                            <td>{{$row->igst_amount ?? '0.00'}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
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
                            <a href="{{ route('approval_yarn_po') }}" class="btn btn-warning font-weight-bolder w-135px">
                                CANCEL
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@endsection
