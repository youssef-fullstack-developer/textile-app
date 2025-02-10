@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'selvedge';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : route($route.'.store') ;
    @endphp
    {{ html()->form('POST', $action)->open() }}
    @if($item?->id > 0)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom " id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Selvedge
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('selvedge.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Name<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Enter Name" value="{{ $item?->name ?? '' }}" required/>
                        </div>

                        <div class="col-4">
                            <label>Catch Cord Ends<b class="text-danger">*</b></label>
                            <input type="number" name="catch_cord_ends" class="form-control" id="catch_cord_ends"
                                   autocomplete="off"
                                   placeholder="Enter Catch Cord Ends" value="{{ $item?->catch_cord_ends ?? '' }}" required/>
                        </div>

                        <div class="col-4">
                            <label>Reed Count<b class="text-danger">*</b></label>
                            <input type="number" name="reed_count" class="form-control" id="reed_count"
                                   autocomplete="off"
                                   placeholder="Enter Reed Count" value="{{ $item?->reed_count ?? '' }}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Selvedge Width<b class="text-danger">*</b></label>
                            <input type="number" name="selvedge_width" class="form-control" id="selvedge_width"
                                   autocomplete="off" placeholder="Enter Selvedge Width" required
                                   value="{{ $item?->selvedge_width ?? '' }}"/>
                        </div>

                        <div class="col-4">
                            <label>Dents</label>
                            <input type="text" name="dents" class="form-control" id="dents" autocomplete="off" readonly
                                   placeholder="Enter Dents" value="{{ $item?->dents ?? '' }}"/>
                        </div>

                        <div class="col-4">
                            <label>Ends per Dent<b class="text-danger">*</b></label>
                            <input type="number" name="ends_per_dent" class="form-control" id="ends_per_dent" required
                                   autocomplete="off"
                                   placeholder="Enter Ends per Dent" value="{{ $item?->ends_per_dent ?? '' }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Extra Ends</label>
                            <input type="text" name="extra_ends" class="form-control" id="extra_ends" autocomplete="off"
                                   placeholder="Enter Extra Ends" value="{{ $item?->extra_ends ?? '' }}" />
                        </div>

                        <div class="col-4">
                            <label>Selvedge Ends</label>
                            <input type="text" name="selvedge_ends" class="form-control" id="selvedge_ends" readonly
                                   autocomplete="off" placeholder="Enter Selvedge Ends"
                                   value="{{ $item?->selvedge_ends ?? '' }}"/>
                        </div>

                        <div class="col-4">
                            <label>Selvedge Weave</label>
                            <select name="weave_id" class="form-control" >
                                <option value="">Select Selvedge Weave</option>
                                @foreach($weaves as $weave)
                                    <option value="{{$weave->id}}" {{ $item?->weave_id == $weave->id ? 'selected' : '' }}>{{$weave->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Ends per Heild</label>
                            <input type="number" name="ends_per_heild" class="form-control" id="ends_per_heild"
                                   autocomplete="off"
                                   placeholder="Enter Ends per Heild" value="{{ $item?->ends_per_heild ?? '' }}"/>
                        </div>

                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>status</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="status" value="1"
                                                {{ $item?->status == '1' || is_null($item?->status) ? 'checked' : '' }}/>
                                                <span></span>
                                                Active
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="status" value="0"
                                                {{ $item?->status == '0' ? 'checked' : '' }}/>
                                                <span></span>
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Ends per Wire<b class="text-danger">*</b></label>
                            <input type="number" name="ends_per_wire" class="form-control" id="ends_per_wire" required
                                   autocomplete="off"
                                   placeholder="Enter Ends per Wire" value="{{ $item?->ends_per_wire ?? '' }}"/>
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
    </div>
    {{ html()->form()->close() }}
@endsection
@push('scripts')
    <script>
        $('#reed_count, #selvedge_width').on('blur', function (){
           var reed_count = parseFloat($('#reed_count').val()).toFixed(2);
           var selvedge_width = parseFloat($('#selvedge_width').val()).toFixed(2);
           var total = selvedge_width / 25.4 * reed_count / 2
            if(!isNaN(total)) {
                $('#dents').val(parseFloat(total).toFixed(2));
                SelvedgeEnds();
            }else {
                $('#dents').val(parseFloat(0.00).toFixed(2));
                SelvedgeEnds();
            }
        });
    </script>
    <script>
        $('#ends_per_dent, #catch_cord_ends').on('blur', function () {
           SelvedgeEnds();
        });

        const SelvedgeEnds = () => {
            var dents =  parseFloat($('#dents').val()).toFixed(2);
            var ends_per_dent =  parseFloat($('#ends_per_dent').val()).toFixed(2);
            var catch_cord_ends =  parseFloat($('#catch_cord_ends').val()).toFixed(2);
            if(!isNaN(ends_per_dent)){
                if(!isNaN(dents)){
                    var total = dents * ends_per_dent
                    if (!isNaN(catch_cord_ends)){
                        total = parseFloat(catch_cord_ends) + parseFloat(total);
                        $('#selvedge_ends').val(parseFloat(total).toFixed(2));
                    }else {
                        $('#selvedge_ends').val(parseFloat(total).toFixed(2));
                    }
                }else {
                    $('#selvedge_ends').val(parseFloat(0).toFixed(2));
                }
            }else {
                $('#selvedge_ends').val(parseFloat(0).toFixed(2));
            }
        }
    </script>
@endpush
