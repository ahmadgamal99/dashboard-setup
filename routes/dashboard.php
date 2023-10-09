<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'namespace' => 'Dashboard', 'as' => 'dashboard.' , 'middleware' => ['web', 'auth:admin', 'set_locale' , 'update_admin_cache' ] ] , function (){

    /** set theme mode ( light , dark ) **/
    Route::get('/change-theme-mode/{mode}', function ($mode) {

        session()->put('theme_mode', $mode);
        return redirect()->back();

    });

    /** dashboard index **/
    Route::get('/' , 'DashboardController@index')->name('index');

    /** resources routes **/
    Route::resource('roles','RoleController');
    Route::resource('admins','AdminController');
    Route::resource('settings','SettingController')->only(['index','store']);

    /** ajax routes **/
    Route::get('role/{role}/admins','RoleController@admins');

    /** admin profile routes **/

    Route::view('edit-profile','dashboard.admins.edit-profile')->name('edit-profile');
    Route::put('update-profile', 'AdminController@updateProfile')->name('update-profile');
    Route::put('update-password', 'AdminController@updatePassword')->name('update-password');

    /** Trash routes */
    Route::get('trash/{modelName?}','TrashController@index')->name('trash');
    Route::get('trash/{modelName}/{id}','TrashController@restore');
    Route::delete('trash/{modelName}/{id}','TrashController@forceDelete');

});
