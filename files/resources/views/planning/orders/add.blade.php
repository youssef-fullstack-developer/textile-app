@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
    @endphp
    {{ html()->form('POST', '/orders_list/'.$item?->id)->open() }}
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            YARN REQUIRED ENTRY
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('planning.orders') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table border border-dark border-2">
                        {{-- Line 1  --}}
                        <tr>
                            <td>Order Type<b class="text-danger">*</b></td>
                            <td>
                                @if($item->yarn_require == 1)
                                    Ordered
                                @else
                                    <select name="ordered" class="f">
                                        <option value="1">Ordered</option>
                                    </select>
                                @endif
                            </td>
                            <td>Order Number<b class="text-danger">*</b></td>
                            <td>
                                {{$item?->sales_order?->order_no}}
                            </td>
                            <td>Sort Number<b class="text-danger">*</b></td>
                            <td>
                                {{$item?->quality?->sort_no}}
                            </td>
                        </tr>
                        {{-- Line 2  --}}
                        <tr>
                            <td>Quality</td>
                            <td>
                                {{$item?->quality?->sort_no}}
                            </td>
                            <td>ReedSpace</td>
                            <td>
                                {{$item?->quality?->reed_space}}
                            </td>
                            <td>Order Number</td>
                            <td>
                                {{$item?->sales_order?->order_no}}
                            </td>
                        </tr>
                        {{-- Line 3  --}}
                        <tr>
                            <td>Actual Reed</td>
                            <td>
                                {{$item?->quality?->reed_space}}
                            </td>
                            <td>Total Ends</td>
                            <td>
                                {{$item?->quality?->total_ends}}
                            </td>
                            <td>Picks</td>
                            <td>
                                {{$item?->quality?->picks}}
                            </td>
                        </tr>
                    </table>

                    <div class="col-12">
                        <h2 class="text-center">Count And Ply Details</h2>
                        <table class="table table-bordered table-hover">
                            <tr class="table-primary">
                                <th>MATERIAL</th>
                                <th>COUNT</th>
                                <th>PLY</th>
                                <th>TYPE</th>
                            </tr>
                            <tbody>
                            {{-- Warps List --}}
                            @if(!empty($item->quality?->warps))
                                @foreach ($item->quality?->warps as $key => $one)
                                    <tr>
                                        <td>{{$one->material?->name}}</td>
                                        <td>{{$one->material?->counts?->count}}</td>
                                        <td>{{$one->material?->plys?->ply}}</td>
                                        <td>Warp</td>
                                    </tr>
                                @endforeach
                            @endif
                            {{-- Wefts List --}}
                            @if(!empty($item->quality?->wefts))
                                @foreach ($item->quality?->wefts as $key => $one)
                                    <tr>
                                        <td>{{$one->material?->name}}</td>
                                        <td>{{$one->material?->counts?->count}}</td>
                                        <td>{{$one->material?->plys?->ply}}</td>
                                        <td>Weft</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <table class="table border border-dark border-2">
                        {{-- Line 1  --}}
                        <tr>
                            <td>Order Qty<b class="text-danger">*</b></td>
                            <td>
                                <input type="hidden" id="order_qte" value="{{$item->weaving_qty}}">
                                {{$item->weaving_qty}} - {{$item?->unit?->name}}
                            </td>
                            <td>Order Qty (in MTR)<b class="text-danger">*</b></td>
                            <td>
                                {{$item->weaving_qty}}
                            </td>
                            <td>ACT GLM</td>
                            <td>
                                {{-- CALCULATED --}}
                            </td>
                        </tr>
                        {{-- Line 2  --}}
                        <tr>
                            <td>Variation %</td>
                            <td>
                                {{$item?->variation}}
                            </td>
                            <td>Shrinkage %<b class="text-danger">*</b></td>
                            <td>
                                <input type="number" name="shrinkage" @if($item->yarn_require == 1) disabled @endif
                                id="shrinkage" autocomplete="off" onchange="change_total_qte();"
                                       value="{{$item ? $item?->shrinkage : 0 }}"/>
                            </td>
                            <td>Total Required Qty (Meters)</td>
                            <td id="total_required_qte">
                                {{-- CALCULATED --}}
                            </td>
                        </tr>
                    </table>
                    <h2 class="text-center">Warp Details</h2>
                    {{-- Warp Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <tr class="table-primary">
                                    <th>PATTERN</th>
                                    <th>MATERIAL</th>
                                    <th>WASTE/SHRINKAGE</th>
                                    <th>TOTAL ENDS</th>
                                    <th>WARP/GRMS/MTRS</th>
                                    <th>WARP REQUIRED IN KGS</th>
                                    <th>YARN IN STORE</th>
                                </tr>
                                <tbody>
                                {{-- Warps List --}}
                                @if(!empty($item->quality?->warps))
                                    @foreach ($item->quality?->warps as $key => $one)
                                        <tr>
                                            <td>{{$one->warp_pattern}}</td>
                                            <td>{{$one->material?->name}}</td>
                                            <td>{{$one->warp_shrinkage}}</td>
                                            <td>{{$one->warp_total_ends}}</td>
                                            <td>{{$one->warp_grams_meters}}</td>
                                            <td>{{(floatval($one->warp_grams_meters) * 1000) ?? ''  }}</td>
                                            <td>{{-- CALCULATED --}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="text-center">Weft Details</h2>
                    {{-- Weft Details --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <tr class="table-primary">
                                    <th>PATTERN</th>
                                    <th>MATERIAL</th>
                                    <th>WASTE/SHRINKAGE</th>
                                    <th>TOTAL ENDS</th>
                                    <th>WEFT/GRMS/MTRS</th>
                                    <th>WEFT REQUIRED IN KGS</th>
                                    <th>YARN IN STORE</th>
                                </tr>
                                <tbody>
                                {{-- Wefts List --}}
                                @if(!empty($item->quality?->wefts))
                                    @foreach ($item->quality?->wefts as $key => $one)
                                        <tr>
                                            <td>{{$one->weft_pattern}}</td>
                                            <td>{{$one->material?->name}}</td>
                                            <td>{{$one->weft_shrinkage}}</td>
                                            <td>{{$one->weft_total_ends}}</td>
                                            <td>{{$one->weft_grams_meters}}</td>
                                            <td>{{(floatval($one->weft_grams_meters) * 1000) ?? ''  }}</td>
                                            <td>{{-- CALCULATED --}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($item->yarn_require != 1)
                        <div class="form-group row text-center" style="display: none;">
                            <div class="col-12">
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" name="is_active" checked value="1"/>
                                        <span></span>
                                        Approve
                                    </label>
                                    <label class="radio radio-success">
                                        <input type="radio" name="is_active"  value="0"/>
                                        <span></span>
                                        Hold
                                    </label>
                                    <label class="radio radio-success">
                                        <input type="radio" name="is_active" value="-1"/>
                                        <span></span>
                                        Reject
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" name="submit" value="submit"
                                    class="btn btn-success font-weight-bolder mr-4 w-135px">
                                SAVE
                            </button>
                            <a href="{{ route('planning.orders') }}" class="btn btn-warning font-weight-bolder w-135px">
                                CANCEL
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}
        @endsection
        @push('scripts')

            <script>
                $(document).ready(function () {
                    change_total_qte();
                });
                const change_total_qte = () => {
                    let order_qte = $("#order_qte").val();
                    let shrinkage = $("#shrinkage").val();
                    let total_required_qte = (parseFloat(order_qte ?? 0)) + parseFloat((order_qte ?? 0) * (shrinkage ?? 0) / 100);

                    $("#total_required_qte").html(total_required_qte)

                }
            </script>

    @endpush
