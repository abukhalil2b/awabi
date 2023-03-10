<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleIndex()
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rolePermission(Role $role)
    {
        $attendanceUsers = Permission::whereCate('attendance.user')->get();


        $attendanceRoundplays = Permission::whereCate('attendance.roundplay')->get();

        $attendanceUserRoundplays = Permission::whereCate('attendance.user_roundplay')->get();

        $attendanceCates = Permission::whereCate('attendance.cate')->get();

        $attendanceQuestions = Permission::whereCate('attendance.question')->get();

        $distanceUsers = Permission::whereCate('distance.user')->get();

        $distanceCates = Permission::whereCate('distance.cate')->get();

        $distanceQuestions = Permission::whereCate('distance.question')->get();

        return view('admin.role.permission', compact(
        'attendanceUsers',
        'attendanceRoundplays',
        'attendanceUserRoundplays',
        'attendanceCates',
        'attendanceQuestions',
        'distanceUsers',
        'distanceCates',
        'distanceQuestions',
        'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rolePermissionStore(Request $request, Role $role)
    {
        if($request->user()->id != 1){
            abort(401);
        }



        if ($request->permissionIds) {
            $role->permissions()->sync($request->permissionIds);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
