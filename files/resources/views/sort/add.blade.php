@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $action = $item?->id > 0 ? '/sort/'.$item?->id : '/sort' ;
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} Sort Master
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('sort.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Fabric Type:</label>
                            <select name="fabric" class="form-control">
                                <option value="">Select Fabric Type</option>
                                <option value="finished" {{ ($item?->fabric == 'finished') ? 'selected' : '' }}>
                                    Finished
                                </option>
                                <option value="grey" {{ ($item?->fabric == 'grey') ? 'selected' : '' }}>Grey</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Sort No:</label>
                            <input type="text" name="sort_no" class="form-control" id="sort_no" autocomplete="off"
                                   placeholder="Enter Sort No" value="{{$item ? $item->sort_no : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Quality Details:</label>
                            <textarea name="details" class="form-control"
                                      id="details">{{$item ? $item->details : ''}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Weave:</label>
                            <select name="weave" class="form-control">
                                <option value="">Select Weave Type</option>
                                @foreach ($weaves as $weave)
                                    <option
                                        value="{{ $weave->id }}" {{ ($item?->weave == $weave->id) ? 'selected' : '' }}>{{ $weave->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Create For:</label>
                            <select name="create_for" class="form-control">
                                <option value="">Select One</option>
                                <option value="domestic" {{ ($item?->create_for == 'domestic') ? 'selected' : '' }}>
                                    Domestic
                                </option>
                                <option value="export" {{ ($item?->create_for == 'export') ? 'selected' : '' }}>Export
                                </option>
                                <option value="both" {{ ($item?->create_for == 'both') ? 'selected' : '' }}>Both
                                </option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Sort Code:</label>
                            <input type="number" name="code" class="form-control" id="code" autocomplete="off"
                                   placeholder="Enter Sort Code" value="{{$item ? $item->code : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Company:</label>
                            <select name="company" class="form-control" disabled>
                                <option value="">Select Company</option>
                                <option value="sez" @if(session('company') == 'sez') selected @endif>SEZ</option>
                                <option value="domestic" @if(session('company') == 'domestic') selected @endif>
                                    Domestic
                                </option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Numeric Quality:</label>
                            <textarea name="numeric" class="form-control"
                                      id="numeric">{{$item ? $item->numeric : ''}}</textarea>
                        </div>

                        <div class="col-4">
                            <label>Yarn Composition:</label>
                            <textarea name="yarn" class="form-control" id="yarn">{{$item ? $item->yarn : ''}}</textarea>
                        </div>
                    </div>

                    <h2 class="text-center">Shade Details</h2>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Reed:</label>
                            <input type="number" name="reed" class="form-control" id="reed" autocomplete="off"
                                   placeholder="Enter Reed" value="{{$item ? $item->reed : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Denting:</label>
                            <input type="number" name="denting" class="form-control" id="denting" autocomplete="off"
                                   placeholder="Enter Denting" value="{{$item ? $item->denting : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>On Loom EPI:</label>
                            <input type="number" name="epi" class="form-control" id="epi" autocomplete="off"
                                   readonly placeholder="Enter Loom EPI" value="{{$item ? $item->epi : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Width (inches):</label>
                            <input type="number" name="width" class="form-control" id="width" autocomplete="off"
                                   placeholder="Enter Width" value="{{$item ? $item->width : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Extra Width:</label>
                            <input type="number" name="e_width" class="form-control" id="e_width" autocomplete="off"
                                   placeholder="Enter Extra Width" value="{{$item ? $item->e_width : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Reed Space:</label>
                            <input type="number" name="reed_space" class="form-control" id="reed_space"
                                   autocomplete="off" placeholder="Enter Reed Space"
                                   value="{{$item ? $item->reed_space : ''}}"
                                   readonly/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Total Ends:</label>
                            <input type="number" name="total_ends" class="form-control" id="total_ends"
                                   autocomplete="off" placeholder="Enter Total Ends"
                                   value="{{$item ? $item->total_ends : ''}}"
                                   readonly/>
                        </div>

                        <div class="col-4">
                            <label>Picks:</label>
                            <input type="number" name="picks" class="form-control" id="picks" autocomplete="off"
                                   placeholder="Enter Sort Code" value="{{$item ? $item->picks : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Pick Insert:</label>
                            <input type="number" name="pick_insert" class="form-control" id="code"
                                   autocomplete="off" placeholder="Enter Sort Code"
                                   value="{{$item ? $item->code : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Width (cm):</label>
                            <input type="number" name="width_cm" class="form-control" id="width_cm"
                                   autocomplete="off" placeholder="Enter Width (CM)"
                                   value="{{$item ? $item->width_m : ''}}"
                                   readonly/>
                        </div>

                        <div class="col-4">
                            <label>Composition:</label>
                            <input type="text" name="composition" class="form-control" id="composition"
                                   autocomplete="off" placeholder="Enter Composition"
                                   value="{{$item ? $item->composition : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Size Pick up:</label>
                            <input type="number" name="size" class="form-control" id="size" autocomplete="off"
                                   placeholder="Enter Size Pickup" value="{{$item ? $item->size : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Loom Type:</label>
                            <select name="loom_type" class="form-control">
                                <option value="">Select Loom Type</option>
                                @foreach ($loom_types as $type)
                                    <option
                                        value="{{ $type->id }}" {{ ($item?->loom_type == $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Selvedge:</label>
                            <select name="selvedge" id="selvedge" class="form-control">
                                <option value="">Select Selvedge</option>
                                @foreach ($selvedge as $s)
                                    <option
                                        value="{{ $s->id }}" {{ ($item?->selvedge == $s->id) ? 'selected' : '' }}>{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label>Dents:</label>
                                    <input type="text" name="dents" class="form-control" id="dents"
                                           autocomplete="off" placeholder="Dents"
                                           value="{{$item ? $item->dents : ''}}"/>
                                </div>

                                <div class="col-6">
                                    <label>S Width:</label>
                                    <input type="number" name="s_width" class="form-control" id="s_width"
                                           autocomplete="off" placeholder="Enter S Width"
                                           value="{{$item ? $item->s_width : ''}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Ends per Dent:</label>
                            <input type="number" name="ends_per_dent" class="form-control" id="ends_per_dent"
                                   autocomplete="off" placeholder="Enter Ends per Dent"
                                   value="{{$item ? $item->ends_per_dent : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Selvedge Ends:</label>
                            <input type="text" name="selvedge_ends" class="form-control" id="selvedge_ends"
                                   autocomplete="off" placeholder="Enter Selvedge Ends"
                                   value="{{$item ? $item->selvedge_ends : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Ends with Selvedge:</label>
                            <input type="number" name="ends_with_selvedge" class="form-control" id="ends_with_selvedge"
                                   autocomplete="off" placeholder="Enter Ends with Selvedge"
                                   value="{{$item ? $item->ends_with_selvedge : ''}}" readonly/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Beam Type:</label>
                            {{--                            <input type="number" name="beam_type" class="form-control" id="beam_type" autocomplete="off"--}}
                            {{--                                placeholder="Enter Beam Type" value="{{ old('beam_type') }}" />--}}
                            <select name="beam_type" class="form-control">
                                <option value="">Select</option>
                                <option value="1" {{ ($item?->fabric == '1') ? 'selected' : '' }}>Single</option>
                                <option value="2" {{ ($item?->fabric == '2') ? 'selected' : '' }}>Double</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Selvedge Drawing:</label>
                            <input type="number" name="selvedge_drawing" class="form-control" id="selvedge_drawing"
                                   autocomplete="off"
                                   placeholder="Enter Selvedge Drawing"
                                   value="{{$item ? $item->selvedge_drawing : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Paper Tube Size:</label>
                            {{--                            <input type="number" name="tube_size" class="form-control" id="tube_size" autocomplete="off"--}}
                            {{--                                placeholder="Enter Tube Size" value="{{ old('tube_size') }}" />--}}
                            <select name="tube_size" class="form-control">
                                <option value="">Select</option>
                                @foreach ($paper_tube_sizes as $row)
                                    <option
                                        value="{{ $row->id }}" {{ ($item?->tube_size == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Total Warp Patterns:</label>
                            <input type="text" name="total_warp_patterns" class="form-control" id="total_warp_patterns"
                                   autocomplete="off"
                                   placeholder="Enter Total Warp Patterns"
                                   value="{{$item ? $item->total_warp_patterns : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Total Weft Patterns:</label>
                            <input type="text" name="total_weft_patterns" class="form-control" id="total_weft_patterns"
                                   autocomplete="off"
                                   placeholder="Enter Total Weft Pattern"
                                   value="{{$item ? $item->total_weft_patterns : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Total Warps Grams/Meter:</label>
                            <input type="text" name="total_warp_grams" class="form-control" id="total_warp_grams"
                                   autocomplete="off"
                                   placeholder="Enter Total Warp Grams / Meter"
                                   value="{{$item ? $item->total_warp_grams : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Total Weft Grams / Meters:</label>
                            <input type="text" name="total_weft_grams" class="form-control" id="total_weft_grams"
                                   autocomplete="off"
                                   placeholder="Enter Total Weft Grams"
                                   value="{{$item ? $item->total_weft_grams : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>CAL GLM with Shrinkage:</label>
                            <input type="text" name="cal_glm_shrinkage" class="form-control" id="cal_glm_shrinkage"
                                   autocomplete="off"
                                   placeholder="Enter CAL GLM with Shrinkage"
                                   value="{{$item ? $item->cal_glm_shrinkage : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>CAL GSM with Shrinkage:</label>
                            <input type="text" name="cal_gsm_shrinkage" class="form-control" id="cal_gsm_shrinkage"
                                   autocomplete="off"
                                   placeholder="Enter CAL GSM with Shrinkage"
                                   value="{{$item ? $item->cal_gsm_shrinkage : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>CAL GLM without Shrinkage:</label>
                            <input type="text" name="cal_glm_wihtout_shrinkage" class="form-control"
                                   id="cal_glm_wihtout_shrinkage" autocomplete="off"
                                   placeholder="Enter CAL GLM wihtout Shrinkage"
                                   value="{{$item ? $item->cal_glm_wihtout_shrinkage : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>CAL GSM without Shrinkage:</label>
                            <input type="text" name="cal_gsm_without_shrinkage" class="form-control"
                                   id="cal_gsm_without_shrinkage" autocomplete="off"
                                   placeholder="Enter CAL GSM without Shrinkage"
                                   value="{{$item ? $item->cal_gsm_without_shrinkage : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Master Quality:</label>
                            <select name="master_quality" class="form-control">
                                <option value="">Select Master Quality</option>
                                @foreach ($master_quality as $row)
                                    <option
                                        value="{{ $row->id }}" {{ ($item?->master_quality == $row->id) ? 'selected' : '' }}>{{ $row->sort_no }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Act GLM:</label>
                            <input type="number" name="act_glm" class="form-control" id="act_glm" autocomplete="off"
                                   placeholder="Enter Act GLM" value="{{$item ? $item->act_glm : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Act GSM:</label>
                            <input type="number" name="act_gsm" class="form-control" id="act_gsm" autocomplete="off"
                                   placeholder="Enter Act GSM" value="{{$item ? $item->act_gsm : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>On Loom:</label>
                            <input type="number" name="on_loom" class="form-control" id="on_loom" autocomplete="off"
                                   placeholder="Enter On Loom" value="{{$item ? $item->on_loom : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Drawing:</label>
                            <textarea name="drawing" class="form-control"
                                      id="drawing">{{$item ? $item->drawing : ''}}</textarea>
                        </div>

                        <div class="col-4">
                            <label>Peg Plan:</label>
                            <textarea name="peg_plan" class="form-control"
                                      id="peg_plan">{{$item ? $item->peg_plan : ''}}</textarea>
                        </div>

                        <div class="col-4">
                            <label>Display Quality:</label>
                            <textarea name="display_quality" class="form-control"
                                      id="display_quality">{{$item ? $item->display_quality : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Design Paper Image:</label>
                            <input type="file" name="design_paper_image" class="form-control" id="design_paper_image"
                                   autocomplete="off"
                                   placeholder="Select Design Paper Image"
                                   value="{{$item ? $item->design_paper_image : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Fabric Image:</label>
                            <input type="file" name="fabric_image" class="form-control" id="fabric_image"
                                   autocomplete="off"
                                   placeholder="Enter Fabric Image" value="{{$item ? $item->fabric_image : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Thread Count:</label>
                            <input type="text" name="thread_count" class="form-control" id="thread_count"
                                   autocomplete="off"
                                   placeholder="Enter Thread Count" value="{{$item ? $item->thread_count : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Fabric Cover:</label>
                            <input type="number" name="fabric_cover" class="form-control" id="fabric_cover"
                                   autocomplete="off"
                                   placeholder="Enter Fabric Cover" value="{{$item ? $item->fabric_cover : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Fabric Cover Range:</label>
                            <input type="number" name="fabric_cover_range" class="form-control" id="fabric_cover_range"
                                   autocomplete="off"
                                   placeholder="Enter Fabric Cover Range"
                                   value="{{$item ? $item->fabric_cover_range : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Remarks:</label>
                            <textarea name="remarks" class="form-control"
                                      id="remarks">{{$item ? $item->remarks : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Is Master Quality:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="is_master" value="1"
                                                    {{$item ? ($item->is_master == 1 ? 'checked' : '') : 'checked'}}/>
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="is_master" value="0"
                                                    {{$item ? ($item->is_master == 0 ? 'checked' : '') : ''}}/>
                                                <span></span>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Status:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="status" checked="checked" value="1"
                                                    {{$item ? ($item->status == 1 ? 'checked' : '') : 'checked'}}/>
                                                <span></span>
                                                Active
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="status" value="0"
                                                    {{$item ? ($item->status == 0 ? 'checked' : '') : ''}}/>
                                                <span></span>
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-center">Warp Details</h2>

                    <div id="warp" class="mt-5">
                        <div class="form-group row" id="warp_body">
                            <div data-repeater-list="" class="col-lg-12 tr">
                                <div data-repeater-item class="form-group row align-items-center">
                                    <div class="col-md-2">
                                        <label>Pattern:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Material:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Shrinkage:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Total Ends:</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Grams / Meters:</label>
                                    </div>
                                </div>
                            </div>

                            @php($i = 0)
                            @while( (empty($item) &&  $i == 0) || (count($item?->warps ?? []) > $i ) )
                                @php($row = $item ? $item->warps[$i] : NULL)
                                <div data-repeater-list="" class="col-lg-12 tr">
                                    <input type="hidden" name="warp_id[]" value="{{$item ? $row?->id : ''}}">
                                    <div data-repeater-item class="form-group row align-items-center">
                                        <div class="col-md-2">
                                            <input type="text" class="form-control " id="warp_pattern_{{$i}}" data-id="{{$i}}"
                                                   name="warp_pattern[]"
                                                   value="{{$item ? $row?->warp_pattern : ''}}"
                                                   placeholder="Enter Pattern"/>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control warp_material" id="warp_material_{{$i}}" data-id="{{$i}}"
                                                    onchange="calculateGrams(this)"
                                                    name="warp_material[]">
                                                <option value="">Select Material</option>
                                                @foreach ($yarns as $yarn)
                                                    <option value="{{ $yarn->id }}" {{$item && $row?->warp_material == $yarn->id ? 'selected' : ''}}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control warp_shrinkage"
                                                   onchange="calculateGrams(this)"
                                                   data-id="{{$i}}" id="warp_shrinkage_{{$i}}"
                                                   name="warp_shrinkage[]"
                                                   value="{{$item ? $row?->warp_shrinkage : ''}}"
                                                   placeholder="Enter Shrinkage"/>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control " id="warp_total_ends_{{$i}}"
                                                   value="{{$item ? $row?->warp_total_ends : ''}}"
                                                   name="warp_total_ends[]" placeholder="Enter Total Ends"/>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control " id="warp_grams_meters_{{$i}}"
                                                   name="warp_grams_meters[]" placeholder="Enter Grams / Meters"
                                                   value="{{$item ? $row?->warp_grams_meters : ''}}"
                                                   readonly/>
                                        </div>

                                        <div class="col-md-2">
                                            <button class="btn btn-icon btn-primary btn-sm btn-circle mr-2 warp_add_btn"
                                                    type="button" onclick="addWarpRow()"><i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"
                                                    onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @php($i++)
                            @endwhile
                        </div>
                    </div>

                    <h2 class="text-center">Weft Details</h2>

                    <div id="weft" class="mt-5">
                        <div class="form-group row" id="weft_body">
                            <div data-repeater-list="" class="col-lg-12 tr">
                                <div data-repeater-item class="form-group row align-items-center">
                                    <div class="col-md-2">
                                        <label>Pattern:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Material:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Shrinkage:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Total Picks:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Grams / Meters:</label>
                                    </div>
                                </div>
                            </div>
                            @php($i = 0)
                            @while( (empty($item) &&  $i == 0) || (count($item?->wefts ?? []) > $i ) )
                                @php($row = $item ? $item->wefts[$i] : NULL)
                                <div data-repeater-list="" class="col-lg-12 tr">
                                    <input type="hidden" name="weft_id[]" value="{{$item ? $row?->id : ''}}">
                                    <div data-repeater-item class="form-group row align-items-center">
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="weft_pattern[]"
                                                   placeholder="Enter Pattern"
                                                   value="{{$item ? $row?->weft_pattern : ''}}"/>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control weft_material" id="weft_material_{{$i}}"
                                                    data-id="{{$i}}" onchange="calculateWeftGrams(this)"
                                                    name="weft_material[]">
                                                <option value="">Select Material</option>
                                                @foreach ($yarns as $yarn)
                                                    <option
                                                        value="{{ $yarn->id }}" {{$item && $row?->weft_material == $yarn->id ? 'selected' : ''}}>{{ $yarn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control weft_shrinkage"
                                                   id="weft_shrinkage_{{$i}}"
                                                   data-id="{{$i}}" onchange="calculateWeftGrams(this)"
                                                   name="weft_shrinkage[]"
                                                   value="{{$item ? $row?->weft_shrinkage : ''}}"
                                                   placeholder="Enter Shrinkage"/>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" id="weft_picks_{{$i}}"
                                                   name="weft_picks[]" value="{{$item ? $row?->weft_picks : ''}}"
                                                   placeholder="Enter Total Picks"/>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="text" class="form-control " id="weft_grams_meters_{{$i}}"
                                                   name="weft_grams_meters[]" placeholder="Enter Grams / Meters"
                                                   value="{{$item ? $row?->weft_grams_meters : ''}}"
                                                   readonly/>
                                        </div>
                                        <div class="col-md-2">
                                            <button
                                                class="btn btn-icon btn-primary btn-sm btn-circle mr-2 weft_add_btn"
                                                type="button" onclick="addWeftRow()"><i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"
                                                    onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @php($i++)
                            @endwhile
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-2">
                            <label>HSN Number:</label>
                            <input type="number" name="hsn" class="form-control" id="hsn" autocomplete="off"
                                   placeholder="Enter HSN Number" value="{{$item ? $item->hsn : ''}}"/>
                        </div>

                        <div class="col-2">
                            <label>IGST %:</label>
                            {{--                            <input type="number" name="igst" class="form-control" id="igst" autocomplete="off"--}}
                            {{--                                placeholder="Enter IGST" value="{{ old('igst') }}" />--}}
                            <select class=" bg-warning form-control weft_material" name="igst" id="igst">
                                <option value="">Select IGST</option>
                                @foreach ($igst as $one)
                                    <option
                                        value="{{ $one->val }}" {{ ($item?->igst == $one->val) ? 'selected' : '' }}>{{ $one->val }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>CGST %:</label>
                            {{--                            <input type="text" name="cgst" class="form-control" id="cgst" autocomplete="off"--}}
                            {{--                                placeholder="Enter CGST" value="{{ old('cgst') }}" />--}}
                            <select class=" bg-warning form-control weft_material" name="cgst" id="cgst">
                                <option value="">Select CGST</option>
                                @foreach ($sgst as $one)
                                    <option
                                        value="{{ $one->val }}" {{ ($item?->cgst == $one->val) ? 'selected' : '' }}>{{ $one->val }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>SGST %:</label>
                            {{--                            <input type="text" name="sgst" class="form-control" id="sgst" autocomplete="off"--}}
                            {{--                                placeholder="Enter SGST" value="{{ old('sgst') }}" />--}}
                            <select class=" bg-warning form-control weft_material" name="sgst" id="sgst">
                                <option value="">Select SGST</option>
                                @foreach ($cgst as $one)
                                    <option
                                        value="{{ $one->val }}" {{ ($item?->sgst == $one->val) ? 'selected' : '' }}>{{ $one->val }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>Cess %:</label>
                            <input type="text" name="cess" class="form-control" id="cess" autocomplete="off"
                                   placeholder="Enter Cess" value="{{$item ? $item->cess : ''}}"/>
                        </div>

                        <div class="col-2">
                            <label>HSN Description:</label>
                            <input type="text" name="hsn_description" class="form-control" id="hsn_description"
                                   autocomplete="off"
                                   placeholder="Enter HSN Description" value="{{$item ? $item->hsn_description : ''}}"/>
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

@push('scripts')
    <script>

        const addWeftRow = () => {
            var html = '';
            var index = $('.weft_add_btn').length;
            html += `<div data-repeater-list="" class="col-lg-12 tr">`;
            html += `<input type="hidden" name="weft_id[]" value="">`;
            html += `    <div data-repeater-item class="form-group row align-items-center">`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control " name="weft_pattern[]"`;
            html += `                   placeholder="Enter Pattern" />`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <select class="form-control weft_material" onchange="calculateWeftGrams(this)" `;
            html += ` id="weft_material_${index}" data-id="${index}" name="weft_material[]">`;
            html += `                <option value="">Select Material</option>`;
            @foreach ($yarns as $yarn)
                html += `                <option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control weft_shrinkage" onchange="calculateWeftGrams(this)" `;
            html += `            id="weft_shrinkage_${index}" data-id="${index}" name="weft_shrinkage[]"`;
            html += `                   placeholder="Enter Shrinkage" />`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control " id="weft_picks_${index}" name="weft_picks[]"`;
            html += `                   placeholder="Enter Total Picks" />`;
            html += `        </div>`;

            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control " id="weft_grams_meters_${index}"`;
            html += `                   name="weft_grams_meters[]" placeholder="Enter Grams / Meters" />`;
            html += `        </div>`;

            html += `        <div class="col-md-2">`;
            html += `            <button class="btn btn-icon btn-primary btn-sm btn-circle mr-2 weft_add_btn" type="button" onclick="addWeftRow()" ><i class="fa fa-plus"></i></button>`;
            html += `            <button class="btn btn-icon btn-danger btn-sm btn-circle" type="button" onclick="deleteRow(this)" ><i class="fa fa-trash"></i></button>`;
            html += `        </div>`;
            html += `    </div>`;
            html += `</div>`;

            $('#weft_body').append(html);
        }
        const addWarpRow = () => {
            var html = '';
            var index = $('.warp_add_btn').length;
            html += `<div data-repeater-list="" class="col-lg-12 tr">`;
            html += `<input type="hidden" name="warp_id[]" value="">`;
            html += `    <div data-repeater-item class="form-group row align-items-center">`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control "`;
            html += `                   name="warp_pattern[]"`;
            html += `                   placeholder="Enter Pattern"/>`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <select class="form-control warp_material" onchange="calculateGrams(this)" `;
            html += `            id="warp_material_${index}" data-id="${index}"`;
            html += `                    name="warp_material[]">`;
            html += `                <option value="">Select Material</option>`;
            @foreach ($yarns as $yarn)
                html += `                <option value="{{ $yarn->id }}">{{ $yarn->name }}</option>`;
            @endforeach
                html += `            </select>`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control warp_shrinkage" onchange="calculateGrams(this)"`;
            html += `             id='warp_shrinkage_${index}' data-id="${index}"`;
            html += `                   name="warp_shrinkage[]"`;
            html += `                   placeholder="Enter Shrinkage"/>`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control " id="warp_total_ends_${index}"`;
            html += `                   name="warp_total_ends[]" placeholder="Enter Total Ends" />`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <input type="text" class="form-control " id="warp_grams_meters_${index}"`;
            html += `                   name="warp_grams_meters[]" placeholder="Enter Grams / Meters" readonly/>`;
            html += `        </div>`;
            html += `        <div class="col-md-2">`;
            html += `            <button class="btn btn-icon btn-primary btn-sm btn-circle mr-2 warp_add_btn"`;
            html += `                    type="button" onclick="addWarpRow()"><i class="fa fa-plus"></i></button>`;
            html += `            <button class="btn btn-icon btn-danger btn-sm btn-circle " type="button"`;
            html += `                    onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>`;
            html += `        </div>`;
            html += `    </div>`;
            html += `</div>`;

            $('#warp_body').append(html);
        }

        const deleteRow = (val) => {
            $(val).closest('.tr').remove();
        }


        function calculateWeftGrams(elm) {
            let id = $(elm).data('id');
            $.ajax({
                type: 'GET',
                url: 'getYarnDetail',
                data: {
                    'yarn': $('#weft_material_' + id).val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    var reed_space = $('#reed_space').val()
                    var picks = $('#picks').val()
                    $('#weft').find('#weft_picks_' + id).val(picks)
                    var shrinkage = parseFloat($('#weft').find('#weft_shrinkage_' + id).val())
                    var a = parseFloat((reed_space * 453.59 * picks))
                    var c = parseFloat(840.0 * (data.yarn.count.count / 1.73))
                    var s = parseFloat(shrinkage + 100) / 100
                    var grams = 0.0

                    if (isNaN(s)) {
                        grams = a / c
                    } else {
                        grams = a / c * s
                    }
                    $('#weft').find('#weft_grams_meters_' + id).val(parseFloat(grams / 1000).toFixed(4))
                }
            })

        }

        function calculateGrams(elm) {
            let id = $(elm).data('id');
            $.ajax({
                type: 'GET',
                url: 'getYarnDetail',
                data: {
                    'yarn': $('#warp_material_' + id).val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    console.log(data.yarn);
                    var total_ends = $('#ends_with_selvedge').val()
                    var shrinkage = parseFloat($('#warp').find('#warp_shrinkage_' + id).val())
                    var a = parseFloat((total_ends * 1.0936 * 453.59))
                    var c = parseFloat(840.0 * data.yarn.conversion)
                    var s = parseFloat(shrinkage + 100) / 100
                    var grams = 0.0
                    if (isNaN(s)) {
                        grams = a / c
                    } else {
                        grams = a / c * s
                    }
                    $('#warp').find('#warp_grams_meters_' + id).val(parseFloat(grams / 1000).toFixed(4))
                }
            })
        }


        $('document').ready(function () {
            $('#reed').on('change', function () {
                calculateEPI()
                calculateTotalEnds()
                calculateEndsWithSelvedge()
            })

            $('#denting').on('change', function () {
                calculateEPI()
                calculateTotalEnds()
            })

            $('#width').on('change', function () {
                calculateReedSpace()
                calculateTotalEnds()
                calculateWidthCM()
            })

            $('#e_width').on('change', function () {
                calculateReedSpace()
                calculateTotalEnds()
            })

            $('#dents').on('change', function () {
                calculateEndsWithSelvedge()
            })

            $('#ends_per_dent').on('change', function () {
                calculateEndsWithSelvedge()
            })

            $('#selvedge').on('change', function () {
                $.ajax({
                    type: 'GET',
                    url: 'getSelvedgeDetail',
                    data: {
                        'selvedge': $(this).val(),
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data)
                        $('#dents').val(data.selvedge.dents)
                        $('#s_width').val(data.selvedge.selvedge_width)
                        $('#ends_per_dent').val(data.selvedge.ends_per_dent)
                        $('#selvedge_ends').val(data.selvedge.selvedge_ends)

                        calculateEndsWithSelvedge()
                    }
                })
            })

            var calculateEPI = () => {
                var reed = $('#reed').val()
                var denting = $('#denting').val()

                $('#epi').val(reed * (denting / 2))
            }

            var calculateReedSpace = () => {
                var width = $('#width').val()
                var e_width = $('#e_width').val()

                $('#reed_space').val(parseFloat(width) + parseFloat(e_width))
            }

            let calculateWidthCM = () => {
                let width = $('#width').val();
                $('#width_cm').val(width * 2.54)
            }

            let calculateTotalEnds = () => {
                let reedSpace = $('#reed_space').val()
                let epi = $('#epi').val()
                $('#total_ends').val(reedSpace * epi)
                calculateEndsWithSelvedge()
            }

            let calculateEndsWithSelvedge = () => {
                let total_ends = $('#total_ends').val()
                let dents = $('#dents').val()
                let ends_per_dent = $('#ends_per_dent').val()

                $('#ends_with_selvedge').val(parseFloat(total_ends) + (parseFloat(dents) + parseFloat(
                    ends_per_dent)))

                $('.warp_total_ends').val(parseFloat(total_ends) + (parseFloat(dents) + parseFloat(
                    ends_per_dent)))
            }

        });


    </script>
@endpush
