@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3 ">
                @foreach($product->photos as $id => $photo)
                    <div>
                        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="{{ $id }}" class="active"><img id="image" src="/uploads/products/{{ $product->id }}/{{ $product->photos[$id]->path }}"></a>
                    </div>
                @endforeach
                </div>

        <div class="col-sm-5 ">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach($product->photos as $id => $photo)
                            <div class="carousel-item {{ ($photo->path == $product->photos[0]->path) ? 'active' : ''}} ">
                                <img class="d-block w-100" src="/uploads/products/{{ $product->id }}/{{ $product->photos[$id]->path }}" >
                            </div>
                            @endforeach
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>

                    </div>

                </div>

        <div class="col-sm-4 ">
            <div class="text-center" >
                <img id="image" src="/uploads/brands/{{ $brandPhotoPath }}">
            </div>
            <div>
                <h1>{{ $product->find($product->id)->brand->first()->name }} {{$product->find($product->id)->subcategories->first()->name}} {{$product->title}}</h1>
            </div>
            <div>
                <h4>Main Price</h4>
                <p>{{ $product->price }} €</p>
            </div>
            <div>
                <h4>Discount Price</h4>
                <h1>{{ $product->discount_price }} €</h1>
                <b>saving</b>
                <p>{{ $save = $product->price - $product->discount_price }} €</p>
            </div>
            <div>
                <form>
                    <button type="submit" class="btn btn-dark">
                        <i class="fab fa-opencart" aria-hidden="true"></i>
                        Add To Cart
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <h1>Product details</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Detail</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td>Title</td>
            <td>{{$product->title}}</td>
        </tr>
        <tr>
            <td>Gender</td>
            @foreach($product->genders as $gender)
                <td>{{$gender->gender}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Brand</td>
            @foreach($product->brand as $brand)
                <td>{{$brand->name}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Category</td>
            @foreach($subcategory as $category)
                <td>{{ $category->name }}</td>
            @endforeach
        </tr>
        <tr>
            <td>Subcategory</td>
            @foreach($product->subcategories as $subcategory)
                <td>{{$subcategory->name}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>

</div>
@endsection

