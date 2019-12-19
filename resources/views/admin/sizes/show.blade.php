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

                                <a class="btn btn-default" href="{{ route("admin.genders.index") }}">
                                    Back
                                </a>
                                @can('gender_edit')
                                    <a class="btn btn-default" href="{{ route('admin.genders.edit', $gender->id) }}" style="float: right">
                                        Edit
                                    </a>
                                @endcan
                            </div>

                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        gender Id
                                    </th>
                                    <td>
                                        {{ $gender->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        gender Id
                                    </th>
                                    <td>
                                        {{ $gender->gender }}
                                    </td>
                                </tr>
                                {{--<tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        @switch($gender->status)
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
                                        gender Photo
                                    </th>
                                    <td>
                                        <div>
                                            @foreach($gender->photos as $key => $genders )
                                            <a href="#">
                                                <img id="prod_main_photo" src="/uploads/genders/{{ $genders->path }}">
                                            </a>
                                                @endforeach
                                        </div>
                                    </td>
                                </tr>--}}
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route("admin.genders.index") }}">
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