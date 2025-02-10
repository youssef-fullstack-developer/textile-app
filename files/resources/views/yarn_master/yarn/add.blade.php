@extends('main')
@section('content')
    @php
    if(empty($item)){
        $item = NULL;
    }
    $action = $item?->id > 0 ? '/yarn/'.$item?->id : '/yarn' ;
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
                                {{ $item?->id > 0 ? 'Edit' : 'Add' }}  Yarn
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('yarn.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Count:</label>
                            <select name="count" id="count" class="form-control" required>
                                <option value="">Select Count</option>
                                @foreach ($counts as $count)
                                    <option
                                        value="{{ $count->id }}" {{ ($item?->count == $count->id) ? 'selected' : '' }}>{{ $count->count }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Ply:</label>
                            <select name="ply" id="ply" class="form-control" required>
                                <option value="">Select Ply</option>
                                @foreach ($ply as $p)
                                    <option value="{{ $p->id }}" {{ ($item?->ply == $p->id) ? 'selected' : '' }}>{{ $p->ply }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Filaments:</label>
                            <select name="filaments" class="form-control">
                                <option value="">Select Filaments</option>
                                @foreach ($filaments as $row)
                                    <option
                                        value="{{ $row->id }}" {{ ($item?->filaments == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Yarn Type:</label>
                            <select name="type" id="yarn_type" class="form-control" required>
                                <option value="">Select Yarn Type</option>
                                @foreach ($types as $type)
                                    <option
                                        value="{{ $type->id }}" {{ ($item?->type == $type->id) ? 'selected' : '' }}>{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Yarn Unit:</label>
                            <select name="unit" id="yarn_unit" class="form-control" required>
                                <option value="">Select Yarn Unit</option>
                                @foreach ($uom as $u)
                                    <option value="{{ $u->id }}" {{ ($item?->unit == $u->id) ? 'selected' : '' }}>{{ $u->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>TPM:</label>
                            <select name="tpm" class="form-control">
                                <option value="">Select TPM</option>
                                @foreach ($tpms as $row)
                                    <option
                                        value="{{ $row->id }}" {{ ($item?->tpm == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Color:</label>
                            <select name="color" id="color" class="form-control">
                                <option value="">Select Color</option>
                                @foreach ($colors as $color)
                                    <option
                                        value="{{ $color->id }}" {{ ($item?->color == $color->id) ? 'selected' : '' }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Yarn Variety:</label>
                            <select name="variety" id="variety" class="form-control" required>
                                <option value="">Select Variety</option>
                                @foreach ($varieties as $variety)
                                    <option
                                        value="{{ $variety->id }}" {{ ($item?->variety == $variety->id) ? 'selected' : '' }}>{{ $variety->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Reorder Quantity Level:</label>
                            <input type="text" class="form-control" name="reorder"
                                   value="{{$item ? $item->reorder : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Buying UOM:</label>
                            <select name="buy_uom" id="buy_uom" class="form-control" required>
                                <option value="">Select Color</option>
                                @foreach ($buy_uom as $uom)
                                    <option
                                        value="{{ $uom->id }}" {{ ($item?->buy_uom == $uom->id) ? 'selected' : '' }}>{{ $uom->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Blend:</label>
                            <select name="blend" class="form-control">
                                <option value="">Select Blend</option>
                                @foreach ($blends as $row)
                                    <option
                                        value="{{ $row->id }}" {{ ($item?->blend == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Danger Quantity Level:</label>
                            <input type="text" class="form-control" name="danger"
                                   value="{{$item ? $item->danger : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label>Yarn Name:</label>
                            <input type="text" id="name" class="form-control" name="name"
                                   value="{{$item ? $item->name : ''}}" readonly/>
                        </div>

                        <div class="col-4">
                            <label>Conversion Count:</label>
                            <input type="text" class="form-control" name="conversion"
                                   value="{{$item ? $item->conversion : ''}}"/>
                        </div>

                        <div class="col-4">
                            <label>Dsiplay Name:</label>
                            <input type="text" id="display_name" class="form-control" name="display_name"
                                   value="{{$item ? $item->display_name : ''}}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Apply Ply for Conversion:</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="is_apply" value="1"
                                                    {{$item ? ($item->is_apply == 1 ? 'checked' : '') : 'checked'}} />
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio radio-danger">
                                                <input type="radio" name="is_apply" value="0"
                                                    {{$item ? ($item->is_apply == 0 ? 'checked' : '') : ''}}/>
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
                                                <input type="radio" name="status" value="1"
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

                    <div class="form-group row">
                        <div class="col-2">
                            <label>HSN No:</label>
                            <input type="text" class="form-control" name="hsn" value="{{$item ? $item->hsn : ''}}"/>
                        </div>

                        <div class="col-2">
                            <label>IGST%:</label>
                            <select name="igst" id="igst" class="form-control" required>
                                <option value=""></option>
                                @foreach ($igst as $line)
                                    <option
                                        value="{{ $line->val }}" {{ ($item?->igst == $line->val) ? 'selected' : '' }}>{{ $line->val }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>CGST%:</label>
                            <select name="cgst" id="cgst" class="form-control" required>
                                <option value=""></option>
                                @foreach ($cgst as $line)
                                    <option
                                        value="{{ $line->val }}" {{ ($item?->cgst == $line->val) ? 'selected' : '' }}>{{ $line->val }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>SGST%:</label>
                            <select name="sgst" id="sgst" class="form-control" required>
                                <option value=""></option>
                                @foreach ($sgst as $line)
                                    <option
                                        value="{{ $line->val }}" {{ ($item?->sgst == $line->val) ? 'selected' : '' }}>{{ $line->val }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <label>Cess%:</label>
                            <input type="text" class="form-control" name="cess" value="{{$item ? $item->cess : ''}}"/>
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
        $('#count').on('change', () => {
            updateName()
        })

        $('#ply').on('change', () => {
            updateName()
        })

        $('#yarn_type').on('change', () => {
            updateName()
        })

        $('#yarn_unit').on('change', () => {
            updateName()
        })

        $('#color').on('change', () => {
            updateName()
        })

        $('#variety').on('change', () => {
            updateName()
        })


        function updateName() {
            var count = ''
            var ply = ''
            var yarn_type = ''
            var yarn_unit = ''
            var color = ''
            var variety = ''

            if ($('#count').val()) {
                count = $('#count option:selected').text();
            }

            if ($('#ply').val()) {
                ply = $('#ply option:selected').text();
            }

            if ($('#yarn_type').val()) {
                yarn_type = $('#yarn_type option:selected').text()
            }

            if ($('#yarn_unit').val()) {
                yarn_unit = $('#yarn_unit option:selected').text()
            }

            if ($('#color').val()) {
                color = $('#color option:selected').text()
            }

            if ($('#variety').val()) {
                variety = $('#variety option:selected').text()
            }

            $('#name').val(ply + "/" + count + ' ' + yarn_unit + ' ' + yarn_type + ' ' + variety + ' ' + color)
            $('#display_name').val(ply + "/" + count + ' ' + yarn_unit + ' ' + yarn_type + ' ' + variety + ' ' + color)
        }
    </script>
@endpush
