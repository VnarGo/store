
@extends('layouts.app')
<style>
    img{
        width:220px;
        height: 240px;
        float: left;
        border-radius: 30%;
        margin-right: 25px;
   }

</style>
@section('content')
<div class="container">
    <div>
        <div class="row">
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/nike"><img src="/uploads/home/brands/nike-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/adidas"><img src="/uploads/home/brands/adidas-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/colmar"><img src="/uploads/home/brands/colmar-logo.jpg" alt="Nike"></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/reebok"><img src="/uploads/home/brands/reebok-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/under-armour"><img src="/uploads/home/brands/under-armour-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/new-balance"><img src="/uploads/home/brands/new-balance-logo.jpg" alt="Nike"></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/nike"><img src="/uploads/home/brands/nike-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/nike"><img src="/uploads/home/brands/nike-logo.jpg" alt="Nike"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 text-center">
                <div>
                    <a href="/products/nike"><img src="/uploads/home/brands/nike-logo.jpg" alt="Nike"></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


{{--

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{ Auth::user()->name }}&nbsp;{{ Auth::user()->surname }} You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>



--}}