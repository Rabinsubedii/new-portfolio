<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LatestworkController;
use App\Http\Controllers\OthervoiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DownloadcvController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
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
Route::get('work/{slug}',[LatestworkController::class,'workdetails']);


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

    //test
    Route::get('test',[TestController::class,'index']);
    Route::get('add-test',[TestController::class,'create']);
    Route::post('add-test',[TestController::class,'store']);
    Route::post('/upload',[TestController::class,'upload'])
    ->name('ckeditor.upload');

    Route::get('edit-test/{id}',[TestController::class,'edit']);
    Route::put('updatest/{id}',[TestController::class,'update']);
    Route::get('delete-test/{id}',[TestController::class,'destroy']);


    // service

    Route::get('service',[ServiceController::class,'index']);
    Route::get('add-service',[ServiceController::class,'create']);
    Route::post('add-service',[ServiceController::class,'store']);
    Route::get('edit-service/{id}',[ServiceController::class,'edit']);
    Route::put('updateservice/{id}',[ServiceController::class,'update']);
    Route::get('delete-service/{id}',[ServiceController::class,'destroy']);

    // Latest Work
    Route::get('latestwork',[LatestworkController::class,'index']);
    Route::get('add-work',[LatestworkController::class,'create']);
    Route::post('add-work',[LatestworkController::class,'store']);
    Route::post('/upload',[LatestworkController::class,'upload'])
    ->name('ckeditor.upload');
    Route::get('edit-work/{id}',[LatestworkController::class,'edit']);
    Route::put('updatework/{id}',[LatestworkController::class,'update']);
    Route::get('delete-work/{id}',[LatestworkController::class,'destroy']);

    // Other Voice
    Route::get('othervoice',[OthervoiceController::class,'index']);
    Route::get('add',[OthervoiceController::class,'create']);
    Route::post('add',[OthervoiceController::class,'store']);
    Route::get('edit-othersvoice/{id}',[OthervoiceController::class,'edit']);
    Route::put('updateothersvoice/{id}',[OthervoiceController::class,'update']);
    Route::get('delete-othersvoice/{id}',[OthervoiceController::class,'destroy']);

    //Setting
    Route::get('settings',[SettingController::class,'index']);
    Route::get('add-setting',[SettingController::class,'create']);
    Route::post('add-setting',[SettingController::class,'store']);
    Route::get('edit-setting/{id}',[SettingController::class,'edit']);
    Route::put('updatesetting/{id}',[SettingController::class,'update']);
    Route::get('delete-setting/{id}',[SettingController::class,'destroy']);

    //Contact
    Route::get('contact',[ContactController::class,'index']);
    Route::post('add-contact',[ContactController::class,'store']);
    Route::get('delete-contact/{id}',[ContactController::class,'destroy']);


    //Download Cv
    Route::get('cv',[DownloadcvController::class,'index']);
    Route::get('add-cv',[DownloadcvController::class,'create']);
    Route::post('add-cv',[DownloadcvController::class,'store']);
    Route::get('edit-cv/{id}',[DownloadcvController::class,'edit']);
    Route::put('updatecv/{id}',[DownloadcvController::class,'update']);
    Route::get('delete-cv/{id}',[DownloadcvController::class,'destroy']);

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
