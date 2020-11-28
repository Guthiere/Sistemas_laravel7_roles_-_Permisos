<?php

namespace App\Traits;

trait UserTrait{

    public function havePermission($permission){
        foreach ($this->roles as $role) {
            if ($role['full-access'] == 'yes') {
                return true ;
            }
            foreach ($role->permissions as $perm) {
                if ($perm->slug == $permission) {
                    return true;
                }
            }
        }
        return false;
    }

    /*Relaciones entre Modelos*/
    //Relacion 1 - n Usuario Modelo Role
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimesTamps();
    }



}
