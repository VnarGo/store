<div class="content">
    @can('photo_create')


    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <form method="POST" action="{{ route("admin.photos.store", [$product->id]) }}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="required" for="discount_price">Product photos</label>
                            <input class="form-control" type="file" name="image[]" id="image" multiple >
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    @endcan
</div>
