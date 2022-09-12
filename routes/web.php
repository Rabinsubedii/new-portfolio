<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
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
// Route::get('/',function(){
//     return redirect('login');
// });

Route::get('/',[FrontendController::class,'index']);
Route::middleware(['auth'])->group(function(){
    Route::get('/profileedit',function(){ return view('profile.edit');})->name('profile.edit');
    Route::get('/home', function () { return view('dashboard');})->name('home');
    Route::get('/table',function(){ return view('pages.table_list');})->name('table');
    Route::get('/typography',function(){ return view('pages.typography');})->name('typography');
    Route::get('/icons',function(){ return view('pages.icons');})->name('icons');
    Route::get('/map',function(){return view('pages.map');})->name('map');
    Route::get('/noti',function(){return view('pages.notifications');})->name('notifications');
    Route::get('/language',function(){return view('pages.language');})->name('language');
    Route::get('/userindex', [UserController::class,"index"])->name('user.index');
    Route::resource('/roles',RoleController::class)->names([
        'index'=>'role.index',
       'create'=>'role.create',
       'destroy'=>'role.delete',
       'store'=>'role.store',
       'edit'=>'role.edit',
       'update'=>'role.update'
    ]);
    Route::get('/rolesassign',[RoleController::class,'assign']);
    Route::get('/roleassign/{id}',[RoleController::class,'assignToPermissions']);
    Route::post('/roleassign/{id}',[RoleController::class,'AssignPermissionToRole']);

    Route::resource('/permissions',PermissionController::class)->names([
        'index'=>'permission.index',
       'create'=>'permission.create',
       'destroy'=>'permission.delete',
       'store'=>'permission.store',
       'edit'=>'permission.edit',
       'update'=>'permission.update'
    ]);
    Route::get('/forbidden',[Controller::class,'forbidden']);

    Route::get('/assignrole/{id}',[UserController::class,'assignRoleView'])->name('roleassign');
    Route::post('assignrole/{id}',[UserController::class,'assignRoleStore'])->name('roleassignstore');
});
