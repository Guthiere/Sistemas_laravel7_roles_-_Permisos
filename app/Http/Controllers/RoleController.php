<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Gate::authorize('haveaccess', 'role.index');

        $roles = Role::orderBy('id','Asc')->paginate(5);

        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Gate::authorize('haveaccess', 'role.create');

        $permissions = Permission::get();

        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'role.create');

        //
            $request->validate([
                'name' => 'required|max:50|unique:roles,name',
                'slug' => 'required|max:50|unique:roles,slug',
                'full-access'=> 'required|in:yes,no',
            ]);

            $role = Role::create($request->all());

           //if ($request->get('permission')) {

               //return $request->all();
                $role->permissions()->sync($request->get('permission'));

         //  }

       return redirect()->route('role.index')->with('status_success','Role Save Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('haveaccess', 'role.show');
        //
        $permission_role =[];

        foreach ($role->permissions as $permission) {

            $permission_role[]= $permission->id;
        }

        $permissions = Permission::get();

        return view('admin.role.view',compact('permissions','role','permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');
        //
        $permission_role =[];

        foreach ($role->permissions as $permission) {

            $permission_role[]= $permission->id;
        }

        $permissions = Permission::get();

        return view('admin.role.edit',compact('permissions','role','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');
        //
        $request->validate([
            'name' => 'required|max:50|unique:roles,name,'.$role->id,
            'slug' => 'required|max:50|unique:roles,slug,'.$role->id,
            'full-access'=> 'required|in:yes,no',
        ]);

        $role->update($request->all());

      // if ($request->get('permission')) {

           //return $request->all();
            $role->permissions()->sync($request->get('permission'));

     //  }

   return redirect()->route('role.index')->with('status_success','Role updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('haveaccess', 'role.destroy');

        $role->delete();

        return redirect()->route('role.index')->with('status_success','Role deleted Successfuly');

    }
}
