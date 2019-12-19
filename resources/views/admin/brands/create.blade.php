@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Brand
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="required" for="name">Brand name</label>
                                <input class="form-control" type="text" name="name" id="name"  required>
                                @if($errors->has('name'))
                                    <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="prod_main_photo">Brand Image</label>
                                <input type="file" name="image" id="image">
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Save Brand
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection