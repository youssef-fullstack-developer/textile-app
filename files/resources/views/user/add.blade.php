@extends('main')
@section('content')
    @php
        if(empty($item)){
            $item = NULL;
        }
        $route_main = 'user';
        $module_label = 'User';
        $action = $item?->id > 0 ? route($route_main.'.update', $item?->id) : route($route_main.'.store') ;
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
                            {{ $item?->id > 0 ? 'Edit' : 'Add' }} {{ $module_label }}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route($route_main.'.index') }}"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Name <b class="text-danger">*</b></label>
                            <input type="text" name="name" id="name" class="form-control" autofocus
                                   placeholder="Enter Name" value="{{ $item?->name ?? '' }}" required/>
                        </div>
                        <div class="col-4">
                            <label>E-mail <b class="text-danger">*</b></label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Enter E-mail" value="{{ $item?->email ?? '' }}" required/>
                        </div>
                        <div class="col-4">
                            <label>Password <b class="text-danger">*</b></label>
                            <input type="password" name="password" id="password" autocomplete="off"
                                   class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <table class="table ">
                            <thead>
                            <tr class="table-primary">
                                <th class="text-center"><b>Permission</b></th>
                                <th class="w-100px">
                                    <input type="checkbox" class="h-20px w-20px position-relative" style="top: 5px;"
                                           onchange="select_checkboxs(this, '.views')"/>
                                    <b class="ml-2">View</b>
                                </th>
                                <th class="w-100px">
                                    <input type="checkbox" class="h-20px w-20px position-relative" style="top: 5px;"
                                           onchange="select_checkboxs(this, '.adds')"/>
                                    <b class="ml-2">Add</b>
                                </th>
                                <th class="w-100px">
                                    <input type="checkbox" class="h-20px w-20px position-relative" style="top: 5px;"
                                           onchange="select_checkboxs(this, '.edits')"/>
                                    <b class="ml-2">Edit</b>
                                </th>
                                <th class="w-100px">
                                    <input type="checkbox" class="h-20px w-20px position-relative" style="top: 5px;"
                                           onchange="select_checkboxs(this, '.deletes')"/>
                                    <b class="ml-2">Delete</b>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($families ?? array() as $row)
                                <tr class="table-active">
                                    <td class="text-left"><b>{{$row->libelle}}</b></td>
                                    <td>
                                        <input type="checkbox" class="h-20px w-20px views"
                                               onchange="select_checkboxs(this, '.views.{{$row->name}}')"/>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="h-20px w-20px adds"
                                               onchange="select_checkboxs(this, '.adds.{{$row->name}}')"/>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="h-20px w-20px edits"
                                               onchange="select_checkboxs(this, '.edits.{{$row->name}}')"/>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="h-20px w-20px deletes"
                                               onchange="select_checkboxs(this, '.deletes.{{$row->name}}')"/>
                                    </td>
                                </tr>
                                @php($temp_array = array())
                                @foreach($row->permissions ?? array() as $line)
                                    @if(!in_array($line->libelle, $temp_array))
                                        <tr>
                                            <td>{{$line->libelle}}</td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                       class="h-20px w-20px views {{$row->name}}"
                                                       value="{{explode('-', $line->name)[0].'-view'}}"
                                                    {{ in_array(explode('-', $line->name)[0].'-view', $permissionsArray) ? 'checked' : '' }}
                                                />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                       class="h-20px w-20px adds {{$row->name}}"
                                                       value="{{explode('-', $line->name)[0].'-create'}}"
                                                    {{ in_array(explode('-', $line->name)[0].'-create', $permissionsArray) ? 'checked' : '' }}
                                                />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                       class="h-20px w-20px edits {{$row->name}}"
                                                       value="{{explode('-', $line->name)[0].'-update'}}"
                                                    {{ in_array(explode('-', $line->name)[0].'-update', $permissionsArray) ? 'checked' : '' }}
                                                />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                       class="h-20px w-20px deletes {{$row->name}}"
                                                       value="{{explode('-', $line->name)[0].'-delete'}}"
                                                    {{ in_array(explode('-', $line->name)[0].'-delete', $permissionsArray) ? 'checked' : '' }}
                                                />
                                            </td>
                                        </tr>
                                        @php($temp_array[] = $line->libelle)
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="card-footer text-center">
                        <button type="submit" name="submit" value="submit"
                                class="btn btn-success font-weight-bolder mr-4 w-135px">
                            SAVE
                        </button>
                        <a href="{{ route($route_main.'.index') }}"
                           class="btn btn-warning font-weight-bolder w-135px">
                            CANCEL
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection

@push('scripts')
    <script>

        function select_checkboxs(elm, name = '') {
            let elements = $(name);
            let current = $(elm);
            if (current.is(':checked')) {
                elements.prop('checked', true);
            } else {
                elements.prop('checked', false);
            }
        }

    </script>

@endpush
