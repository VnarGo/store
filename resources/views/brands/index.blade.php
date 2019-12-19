@extends('layouts.app')

<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@section('content')

    <div class="grid-container" id="brands">
        @foreach($brands as $brand)
            <div class="grid-item">
                <div class="img-rounded">
                    @foreach($brand->photos as $id => $photo)
                    <a href="{{ route('brands.show', $brand->id) }}">
                        <img id="image1" src="/uploads/brands/{{ $photo->path }}">
                    </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@endsection








































