<?php

Route::get('/test', function () {
    /*
    return Role::Create([
        'name'=>'Test2',
        'slug'=>'test2',
        'description'=>'tester2',
        'full-access'=>'no'
    ]);

    */
    /*
    $user = User::find(1);

    $user->roles()->sync([1,3]);

    return $user->roles;
    */
    /*
    return Permission::Create([
        'name'=>'Test2',
        'slug'=>'test2',
        'description'=>'tester2',

    ]);*/



    $role = Role::find(1);

    $role->permissions()->sync([1]);

    return $role->permissions;

    });



$permission = Permission::Create([
                    'name'=>'List User',
                    'slug'=>'user.index',
                    'description'=>'A user can list user',
                    ]);

            $permission_all[] = $permission->id;

/*
$permission = Permission::Create([
                    'name'=>'Show User',
                    'slug'=>'user.show',
                    'description'=>'A user can see user',
                    ]);

            $permission_all[] = $permission->id;
*/

$permission = Permission::Create([
                    'name'=>'Create User',
                    'slug'=>'user.create',
                    'description'=>'A user can create user',
                    ]);

            $permission_all[] = $permission->id;


$permission = Permission::Create([
                    'name'=>'Edit User',
                    'slug'=>'user.edit',
                    'description'=>'A user can edit user',
                    ]);

            $permission_all[] = $permission->id;


$permission = Permission::Create([
                    'name'=>'Destroy User',
                    'slug'=>'user.destroy',
                    'description'=>'A user can destroy user',
                    ]);

            $permission_all[] = $permission->id;
