@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create new Role
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">title</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                            <label class="required" for="permissions">permissions</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                            </div>
                            <select class="form-control select2" name="permissions[]" id="permissions" multiple required>
                                @foreach($permissions as $id => $permissions)
                                    <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('permissions'))
                                <span class="help-block" role="alert">{{ $errors->first('permissions') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection