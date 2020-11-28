<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Permission;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate tables usando DB
        DB::statement("SET foreign_key_checks = 0");
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            //Truncate table Utilizando el modelo
            Permission::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks = 1");

        //User DATA Admin
        $useradmin = User::where('email','admin@admin.com')->first();

        if($useradmin){
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name' =>'Admin',
            'email' => 'Admin@admin.com',
            'password' => Hash::make('admin'),
        ]);


        $roleadmin = Role::Create([
                            'name'=>'Admin',
                            'slug'=>'admin',
                            'description'=>'Administrator',
                            'full-access'=>'yes'
                                ]);

        $useradmin->roles()->sync([$roleadmin->id]);



        //Permission
        $permission_all = [];

        //Permission Role
            $permission = Permission::Create([
                'name'=>'List Role',
                'slug'=>'role.index',
                'description'=>'A user can list role',
            ]);

            $permission_all[] = $permission->id;


            $permission = Permission::Create([
                'name'=>'Show Role',
                'slug'=>'role.show',
                'description'=>'A user can see role',
            ]);

            $permission_all[] = $permission->id;


            $permission = Permission::Create([
                'name'=>'Create Role',
                'slug'=>'role.create',
                'description'=>'A user can create role',
            ]);

            $permission_all[] = $permission->id;


            $permission = Permission::Create([
                'name'=>'Edit Role',
                'slug'=>'role.edit',
                'description'=>'A user can edit role',
            ]);

            $permission_all[] = $permission->id;


            $permission = Permission::Create([
                'name'=>'Destroy Role',
                'slug'=>'role.destroy',
                'description'=>'A user can destroy role',
            ]);

            $permission_all[] = $permission->id;



            //Table Permission User


            $permission = Permission::Create([
                'name'=>'List User',
                'slug'=>'user.index',
                'description'=>'A user can list user',
                ]);

            $permission_all[] = $permission->id;

            $permission = Permission::Create([
                'name'=>'Show User',
                'slug'=>'user.show',
                'description'=>'A user can see user',
                ]);

                $permission_all[] = $permission->id;

                /*
                $permission = Permission::Create([
                    'name'=>'Create User',
                    'slug'=>'user.create',
                    'description'=>'A user can create user',
                    ]);

                    $permission_all[] = $permission->id;

                    */

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


            $permission = Permission::Create([
                'name'=>'Edit Own User',
                'slug'=>'userown.edit',
                'description'=>'A user can edit own user',
                ]);

            $permission_all[] = $permission->id;

            $permission = Permission::Create([
                    'name'=>'Show Own User',
                    'slug'=>'userown.show',
                    'description'=>'A user can see own user',
                    ]);


                    //rol Registered User
        $roleuser = Role::Create([
            'name'=>'Registered User',
            'slug'=>'registereduser',
            'description'=>'Registered User',
            'full-access'=>'no'
                ]);

        $useradmin->roles()->sync([$roleadmin->id]);
            //Table Permission_role
            //$roleadmin->permissions()->sync([$roleadmin->id]);
           $roleadmin->find(2)->permissions()->sync([6,10,11]);
    }
}
