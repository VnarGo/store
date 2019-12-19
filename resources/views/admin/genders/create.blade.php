@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create gender
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.genders.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label class="required" for="name">Gender name</label>
                                <input class="form-control" type="text" name="gender" id="gender"  required>
                                @if($errors->has('gender'))
                                    <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>

                          {{--  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="prod_main_photo">gender Image</label>
                                <input type="file" name="image" id="image">
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif
                            </div>--}}

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Save Gender
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection