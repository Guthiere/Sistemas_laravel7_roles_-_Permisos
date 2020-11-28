<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Role;
use App\Permission;
use App\Pais;
use App\Divadmin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/role', 'RoleController')->names('role');



Route::get('/test', function () {
    $users = User::all();
   // $paises = Pais::orderBy('Pais','ASC')->get();
   // $diva = DB::table('divadmins')->select('id_div','DivAdmin','idDiv_Sup')->where('id_div','340')->get();
    //dd($diva);
    return view('test',compact('users'));

});

Route::get('api/users', function () {
    return Datatables::eloquent(User::query())->make(true);
});

/*
Route::get('/test', function () {

    $user = User::find(2);
    //$user->roles()->sync([4]);

    //return User::get();
    Gate::authorize('haveaccess', 'role.show');
    return $user;
    //return $user->havePermission('role.create');
});*/


Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController',['except'=>['create','store']])->names('user');

Route::resource('/pais', 'PaisController')->names('pais');
