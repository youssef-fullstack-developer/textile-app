@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/jobwork_weaving_contract/'.$item?->id : '/jobwork_weaving_contract' ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    {{--    @csrf--}}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            JOBWORK WEAVING CONTRACT
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('jobwork_weaving_contract') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Contract Type<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" autocomplete="off"
                                   placeholder="Enter Shade" value="{{ $item ? $item->name : old('name') }}" required/>
                        </div>
                        <div class="col-4">
                            <label>Vendor Group<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" autocomplete="off"
                                   placeholder="Enter Shade" value="{{ $item ? $item->name : old('name') }}" required/>
                        </div>
                        <div class="col-4">
                            <label>Contract No<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" autocomplete="off"
                                   placeholder="Enter Shade" value="{{ $item ? $item->name : old('name') }}" required/>
                        </div>
                        <div class="col-4">
                            <label>Contract Year<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" autocomplete="off"
                                   placeholder="Enter Shade" value="{{ $item ? $item->name : old('name') }}" required/>
                        </div>

                    </div>

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
                                {{$item->weaving_qty}} - {{$item?->unit?->name}}
                            </td>
                            <td>Order Qty (in MTR)<b class="text-danger">*</b></td>
                            <td>
                                {{-- CALCULATED --}}
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
                                autocomplete="off"
                                       value="{{$item ? $item?->shrinkage : 0 }}"/>
                            </td>
                            <td>Total Required Qty (Meters)</td>
                            <td>
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
                                            <td>{{-- CALCULATED --}}</td>
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
                                            <td>{{-- CALCULATED --}}</td>
                                            <td>{{-- CALCULATED --}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($item->yarn_require != 1)
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


                });
            </script>

    @endpush
