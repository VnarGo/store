@extends('layouts.app')
<style>
    #avatar{
        width:220px;
        height: 240px;
        float: left;
        border-radius: 30%;
        margin-right: 25px;
    }

    #product_image{
        width:40px;
        height: 40px;
        float: left;
        border-radius: 30%;
        margin-right: 25px;
    }

</style>
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img id="avatar" src="/uploads/avatars/{{Auth::User()->avatar}}">
                <h2>{{Auth::user()->name}} {{Auth::user()->surname}}`s profile</h2>
                <form enctype="multipart/form-data" action="profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
<hr>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img id="product_image" src="/uploads/avatars/{{Auth::User()->avatar}}">
                <h2>{{Auth::user()->name}} {{Auth::user()->surname}}`s profile</h2>
                <form enctype="multipart/form-data" action="profile/update" method="POST">
                    <label>Change Product Image</label>
                    <input type="file" name="product_image">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>


@endsection