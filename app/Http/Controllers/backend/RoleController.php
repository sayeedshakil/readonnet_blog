<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
   /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();

        return view('backend.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('backend.admin.roles.create' , compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('backend.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('name', 'id');

        $role->load('permissions');

        return view('backend.admin.roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('backend.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->load('permissions', 'rolesUsers');

        return view('backend.admin.roles.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->delete();
        $role->rolesUsers()->detach();
        $role->permissions()->detach();


        return redirect()->route('backend.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(MassDestroyRoleRequest $request)
    {

        Role::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
