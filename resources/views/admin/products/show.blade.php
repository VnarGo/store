@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">

                                    <a class="btn btn-default" href="{{ route("admin.products.index") }}">
                                        Back
                                    </a>
                                    @can('product_edit')
                                        <a class="btn btn-default" href="{{ route('admin.products.edit', $product->id) }}" style="float: right">
                                            Edit
                                        </a>
                                    @endcan
                                </div>

                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        Product Id
                                    </th>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        @switch($product->status)
                                            @case(1)
                                                <span class="label label-info">active</span>
                                            @break
                                            @case(0)
                                                <span class="label label-info">inactive</span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <td>
                                        {{ $product->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Price
                                    </th>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Discount Price
                                    </th>
                                    <td>
                                        {{ $product->discount_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Gender
                                    </th>
                                    <td>
                                        @foreach($product->genders as $key => $gender)
                                            <span class="label label-info">{{ $gender->gender }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Subcategory
                                    </th>
                                    <td>
                                        @foreach($product->subcategories as $key => $subcategory)
                                            <span class="label label-info">{{ $subcategory->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Brand
                                    </th>
                                    <td>
                                        @foreach($product->brand as $key => $products)
                                            <span class="label label-info">{{ $products->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Size
                                    </th>
                                    <td>
                                        @foreach($product->sizes as $key => $size)
                                            <span class="label label-info">{{ $size->size }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle">
                                        Main Photo
                                    </th>
                                    <td>
                                        <div>
                                            <a href="#">
                                                <img id="prod_main_photo" src="/uploads/products/{{ $product->id }}/{{ $product->main_image }}">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route("admin.products.index") }}">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection