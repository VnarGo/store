@extends('layouts.app')
<!-- Styles -->
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/ad/ad1.jpg" class="d-block w-100" alt=Slide1>
            </div>
            <div class="carousel-item ">
                <img src="/ad/ad2.jpg" class="d-block w-100" alt=Slide2>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-6">
            <h2>PRODUCTS</h2>
        </div>
        <div class="col-sm-6">
            <p class="text-right">{{ count($products) }} available products</p>
        </div>
    </div>
    <hr>
<div class="row">
    <div class="col-xs-12 col-sm-3 col-lg-2">
        <ul class="myul">
            <li>
                <a href="{{ route('footwear') }}"><b>Footwear</b></a>
            </li>
            <li>
                <a href="{{ route('clothing') }}"><b>Clothing</b></a>
            </li>
            <li>
                <a href="{{ route('accessories') }}"><b>Accessories</b></a>
            </li>
        </ul>
        <hr>

        <div class="container my-4">
            <section class="section-preview">
                <div class="heading">
                    <h4>Gender</h4>
                </div>
                <form name="form" class="filter-form" action="{{ htmlspecialchars($_SERVER["PHP_SELF"]) }}" method="GET">
                    @foreach($genders as $gender)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="gender[]" value="{{ $gender->id}}" id="{{ $gender->gender }}" onChange="this.form.submit()"
                                    {{ !empty(request('gender')) && in_array( $gender->id, request('gender')) ? 'checked' : '' }} >
                            <label class="custom-control-label" for="{{ $gender->gender  }}">{{ $gender->gender }}</label>
                        </div>
                    @endforeach
                    <hr>
                    <div class="heading">
                        <h4>Brands</h4>
                    </div>
                    @foreach($brands as $brand)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="brand[]" value="{{ $brand->id }}" id="{{ $brand->name }}" onChange="this.form.submit()"
                                {{ !empty(request('brand')) && in_array( $brand->id, request('brand')) ? 'checked' : '' }} >
                        <label class="custom-control-label" for="{{ $brand->name }}">{{ $brand->name }}</label>
                    </div>
                    @endforeach
                    <hr>
                    <div class="heading">
                        <h4>Sizes</h4>
                    </div>
                    @foreach($sizes as $size)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="size[]" value="{{ $size->id }}" id="{{ $size->size }}" onChange="this.form.submit()"
                                {{ !empty(request('size')) && in_array( $size->id, request('size')) ? 'checked' : '' }} >
                        <label class="custom-control-label" for="{{ $size->size }}">{{ $size->size }}</label>
                    </div>
                    @endforeach
                </form>
            </section>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <div class="grid-container">
            @foreach($products as $product)
                <div class="grid-item">
                    <div class="img-rounded">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img id="image1" src="/uploads/products/{{$product->id}}/{{ $product->main_image }}">
                        </a>
                    </div>

                    <div id="productInfo" class="text-wrapper">
                        @foreach($product->brand as $id => $brand  )
                        <b>{{ $brand->name }}</b>
                        @endforeach
                        <div>
                            <a>{{$product->title}}</a>
                        </div>
                            <hr style="border-top: 1px solid black">
                        <p style="color: red">{{$product->discount_price}} €</p>
                        <strike>{{$product->price}} €</strike>
                    </div>
                </div>
            @endforeach
        </div>
</div>
</div>

    <script>

    </script>


@endsection

{{--

{{ !empty(request('brand')) && in_array($brand->id ,request('brand')) ? 'checked' : '' }}

--}}
