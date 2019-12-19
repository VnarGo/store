@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create size
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.sizes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                                <label class="required" for="name">size</label>
                                <input class="form-control" type="text" name="size" id="size"  required>
                                @if($errors->has('size'))
                                    <span class="help-block" role="alert">{{ $errors->first('size') }}</span>
                                @endif
                            </div>

                          {{--  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="prod_main_photo">size Image</label>
                                <input type="file" name="image" id="image">
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif
                            </div>--}}

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Save size
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection