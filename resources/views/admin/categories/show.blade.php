@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                                back
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        id
                                    </th>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        title
                                    </th>
                                    <td>
                                        {{ $role->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        permissions
                                    </th>
                                    <td>
                                        @foreach($role->permissions as $key => $permissions)
                                            <span class="label label-info">{{ $permissions->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                                back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Related Data
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#roles_users" aria-controls="roles_users" role="tab" data-toggle="tab">
                            User-Role Relationship
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="roles_users">
                        @includeIf('admin.roles.relationships.rolesUsers', ['users' => $role->rolesUsers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection