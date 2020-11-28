<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the usera can view any users.
     *
     * @param  \App\usera  $usera
     * @return mixed
     */
    public function viewAny(user $usera)
    {
        //

    }

    /**
     * Determine whether the usera can view the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function view(user $usera, user $user, $perm=null){
        //dd($usera->id);
        if ($usera->havePermission($perm[0])) {
           return true;
        } elseif ($usera->havePermission($perm[1])) {
            return $usera->id === $user->id;
        }
        else {
            return false;
        }
    }

    /**
     * Determine whether the usera can create users.
     *
     * @param  \App\usera  $usera
     * @return mixed
     */
    public function create(user $usera)
    {
        //
    }

    /**
     * Determine whether the usera can update the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function update(user $usera, user $user, $perm=null)
    {
        //
        if ($usera->havePermission($perm[0])) {
            return true;
         } elseif ($usera->havePermission($perm[1])) {
             return $usera->id === $user->id;
         }
         else {
             return false;
         }
    }

    /**
     * Determine whether the usera can delete the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function delete(user $usera, user $user)
    {
        //
    }

    /**
     * Determine whether the usera can restore the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function restore(user $usera, user $user)
    {
        //
    }

    /**
     * Determine whether the usera can permanently delete the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function forceDelete(user $usera, user $user)
    {
        //
    }
}
