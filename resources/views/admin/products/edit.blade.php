@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route("admin.products.index") }}">
                                    Back
                                </a>
                            </div>

                            {{--edit title--}}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label class="required" for="title">Name</label>
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required>
                                @if($errors->has('title'))
                                    <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            {{--edit status--}}
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                <label class="required" >Status</label>
                                <div class="onoffswitch">
                                    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch"   onclick="setCheckboxVal()"
                                {{  old('status',$product->status) == 1 ? 'checked' : '' }}>
                                    <label class="onoffswitch-label" for="myonoffswitch">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                    <input id="set_status" type="hidden" name="status" value="{{ old('status', $product->status) }}">
                                </div>
                            </div>
                            {{--edit gender--}}
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label class="required" for="gender">Gender</label>
                                <select class="form-control select2" name="genders[]" id="gender" multiple required>
                                    @foreach($genders as $id => $genders)
                                        <option value="{{ $id }}" {{ (in_array($id, old('genders', [])) || $product->genders->contains($id) ) ? 'selected' : '' }}>
                                            {{ $genders }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                            {{--edit subcategory--}}
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label class="required" for="gender">Subcategory</label>
                                <select class="form-control select2" name="subcategories[]" id="subcategory" multiple required>
                                    @foreach($subcategories as $id => $subcategory)
                                        <option value="{{ $id }}" {{ (in_array($id, old('subcategories', [])) || $product->subcategories->contains($id) ) ? 'selected' : '' }}>
                                            {{ $subcategory }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                            {{--edit price--}}
                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                <label class="required" for="price">Price</label>
                                <input class="form-control" type="number" step="any" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                                @if($errors->has('price'))
                                    <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            {{--edit discount price--}}
                            <div class="form-group {{ $errors->has('discount_price') ? 'has-error' : '' }}">
                                <label class="required" for="discount_price">Discount price</label>
                                <input class="form-control" type="number" step="any" name="discount_price" id="discount_price" value="{{ old('discount_price', $product->discount_price) }}" required>
                                @if($errors->has('discount_price'))
                                    <span class="help-block" role="alert">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>
                            {{--edit brand--}}
                            <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                                <label class="required" for="brand_id">Brand</label>
                                <select class="form-control select2" name="brand[]" id="brand_id" multiple required>
                                    @foreach($brand as $id => $brands)
                                        <option value="{{ $id }}" {{ (in_array($id, old('brand', [])) || $product->brand->contains($id) ) ? 'selected' : '' }}>
                                            {{ $brands }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('brand'))
                                    <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                                @endif
                            </div>
                            {{--edit size--}}
                            <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                                <label class="required" for="brand_id">Size</label>
                                <select class="form-control select2" name="sizes[]" id="brand_id" multiple required>
                                    @foreach($sizes as $id => $sizes)
                                        <option value="{{ $id }}" {{ (in_array($id, old('sizes', [])) || $product->sizes->contains($id) ) ? 'selected' : '' }}>
                                            {{ $sizes }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('sizes'))
                                    <span class="help-block" role="alert">{{ $errors->first('sizes') }}</span>
                                @endif
                            </div>
                            {{--edit main photo--}}
                            <div class="form-group {{ $errors->has('main_image') ? 'has-error' : '' }}">
                                <a href="#"><img class="form-control"  id="prod_main_photo" src="/uploads/products/{{ $product->id }}/{{ $product->main_image }}"></a>
                                <label for="prod_main_photo">Select main image</label>
                                <select class="form-control select2" name="main_image" id="image" multiple>
                                    @foreach($product->photos as $id => $photo)
                                        <option value="{{ $photo->path }}"  {{ ($product->main_image === $photo->path ) ? 'selected' : '' }}>
                                            Photo number: {{$id}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            {{--available photos--}}
                            <div class="form-group {{ $errors->has('main_image') ? 'has-error' : '' }}">
                                <label for="prod_main_photo">Available photos</label>
                                <div class="row">
                                    @foreach($product->photos as $id => $photo)
                                        <div class="col-sm-1">
                                            <img class="form-control"  id="prod_main_photo" src="/uploads/products/{{ $product->id }}/{{ $photo->path }}">
                                            <b>Photo: {{$id}}</b>
                                        </div>
                                    @endforeach
                                </div>
                                @if($errors->has('image'))
                                    <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Save
                                </button>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Related Data
                                </div>
                                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                                    <li role="presentation">
                                        <a href="#permissions_roles" aria-controls="permissions_roles" role="tab" data-toggle="tab">
                                            Product Photos
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" role="tabpanel" id="permissions_roles">
                                        @includeIf('admin.products.relationships.photosProduct')
                                    </div>
                                </div>
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
{{--

<div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
<label class="required" for="permissions">permissions</label>
<div style="padding-bottom: 4px">
    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
</div>
<select class="form-control select2" name="permissions[]" id="permissions" multiple required>
    @foreach($permissions as $id => $permissions)
        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
    @endforeach
</select>
@if($errors->has('permissions'))
    <span class="help-block" role="alert">{{ $errors->first('permissions') }}</span>
    @endif
    </div>

<tr>
    <th style="vertical-align: middle">
        Other Photos
    </th>
    <td>
        @foreach($product->photos as $photo)
            <div class="col-sm-2 pull-right">
                <div class="row">
                    <div class="col-sm-2" >
                        <a href="#">
                            <img id="prod_main_photo" src="/uploads/products/{{$product->id}}/{{ $photo->path }}">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </td>
</tr>

--}}