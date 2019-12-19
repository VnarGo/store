@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("admin.brands.update", [$brand->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route("admin.brands.index") }}">
                                    Back
                                </a>
                            </div>

                            {{--edit name--}}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="required" for="name">name</label>
                                <input class="form-control" type="text" name="name" id="title" value="{{ old('name', $brand->name) }}" required>
                                @if($errors->has('name'))
                                    <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            {{--edit status--}}
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                <label class="required" >status</label>
                                <div class="onoffswitch">
                                    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch"   onclick="setCheckboxVal()"
                                            {{  old('status',$brand->status) == 1 ? 'checked' : '' }}>
                                    <label class="onoffswitch-label" for="myonoffswitch">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                    <input id="set_status" type="hidden" name="status" value="{{ old('status', $brand->status) }}">
                                </div>
                            </div>

                            {{--edit main photo--}}
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                @foreach($brand->photos as $key=>$brands)
                                <a href="#"><img class="form-control"  id="prod_main_photo" src="/uploads/brands/{{ $brands->path }}"></a>
                                <label for="prod_main_photo">main_image</label>
                                <input type="file" name="image">
                                @endforeach
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
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


    <script>
        function setCheckboxVal() {
            var checkBox = document.getElementById('myonoffswitch');
            var input = document.getElementById('set_status');
            if (checkBox.checked == true){
                input.value = '1';
            } else {
                input.value= '0';
            }
        }
    </script>
@endsection