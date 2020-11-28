<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

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
        $this->authorize('haveaccess', 'user.index');
        //
        $users = User::with('roles')->orderBy('id','Asc')->paginate(20);

        return view('admin.user.index',compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view',[$user,['user.show','userown.show']]);

        $roles = Role::orderBy('name','Asc')->get();

        return view('admin.user.view',compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',[$user,['user.edit','userown.edit']]);
        //
        $roles = Role::orderBy('name','Asc')->get();

        //return $roles;

        return view('admin.user.edit',compact('roles','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|max:50|unique:users,name,'.$user->id,
            'email' => 'required|max:50|unique:users,email,'.$user->id,

        ]);
          //  dd($request->all());
       $user->update($request->all());

          $user->roles()->sync($request->get('roles'));

        return redirect()->route('user.index')->with('status_success','User Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess', 'user.destroy');

       $user->delete();

        return redirect()->route('user.index')->with('status_success','User deleted Successfuly');
    }
}
