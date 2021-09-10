@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.role.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.id') }}
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.title') }}
                        </th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Permissions
                        </th>
                        <td>
                            @foreach($role->permissions()->pluck('name') as $permissions)
                                <span class="label label-info label-many badge badge-info">{{ $permissions }}</span>
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#roles_users" role="tab" data-toggle="tab">
                        {{ trans('cruds.user.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" role="tabpanel" id="roles_users">
                    @includeIf('backend.admin.roles.relationships.rolesUsers', ['users' => $role->rolesUsers])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
