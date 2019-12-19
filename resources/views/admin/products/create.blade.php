@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Product
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label class="required" for="name">{{ trans('Product Title') }}</label>
                                <input class="form-control" type="text" name="title" id="name"  required>
                                @if($errors->has('title'))
                                    <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                <label class="required" for="price">{{ trans('Product price') }}</label>
                                <input class="form-control" type="number" step="any" name="price" id="price" required>
                                @if($errors->has('price'))
                                    <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('discount_price') ? 'has-error' : '' }}">
                                <label class="required" for="discount_price">{{ trans('Product discount price ') }}</label>
                                <input class="form-control" type="number" step="any" name="discount_price" id="discount_price" required>
                                @if($errors->has('discount_price'))
                                    <span class="help-block" role="alert">{{ $errors->first('discount_price') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label class="required" for="gender">Gender</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                                </div>
                                <select class="form-control select2" name="genders[]" id="gender" multiple required>
                                    @foreach($genders as $id => $gender)
                                        <option value="{{ $id }}">{{ $gender}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('subcategory') ? 'has-error' : '' }}">
                                <label class="required" for="gender">Subcategory</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                                </div>
                                <select class="form-control select2" name="subcategories[]" id="subcategory" multiple required>
                                    @foreach($subcategories as $id => $subcategory)
                                        <option value="{{ $id }}">{{ $subcategory}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('subcategory'))
                                    <span class="help-block" role="alert">{{ $errors->first('subcategory') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                                <label class="required" for="brand_id">Product brand</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                                </div>
                                <select class="form-control select2" name="brand" id="brand" multiple required>
                                    @foreach($products as $id => $brand)
                                        <option value="{{ $id }}">{{ $brand}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('brand'))
                                    <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="required" for="discount_price">Product photos</label>
                                <input class="form-control" type="file" name="image[]" id="image" multiple required>
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Save Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection