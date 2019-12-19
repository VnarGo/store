@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create new category
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">name</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('subcategories') ? 'has-error' : '' }}">
                            <label  for="subcategories">subcategories</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                            </div>
                            <select class="form-control select2" name="subcategories[]" id="subcategories" multiple >
                                @foreach($subcategories as $id => $subcategories)
                                    <option value="{{ $id }}" {{ in_array($id, old('subcategories', [])) ? 'selected' : '' }}>{{ $subcategories }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subcategories'))
                                <span class="help-block" role="alert">{{ $errors->first('subcategories') }}</span>
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