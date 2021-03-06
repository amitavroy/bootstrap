<?php

/**
 * This is the route file where all bootstrap routes are present.
 * This is basically to move out the default routes from the
 * main routes and allow the developer to focus on the only
 * the routes which are related to the project.
 */

Route::group(['middleware' => ['permission:manage roles']], function () {
    /*Roles related routes*/
    Route::get('roles', 'RolesController@index')->name('roles.index');
    Route::get('roles/add', 'RolesController@create')->name('roles.add');
    Route::post('roles/add', 'RolesController@store')->name('roles.create');
    Route::get('roles/edit/{id}', 'RolesController@edit')->name('roles.edit');
    Route::post('roles/update', 'RolesController@update')->name('roles.update');
    Route::post('roles/delete', 'RolesController@destroy')->name('roles.delete');
});

Route::group(['middleware' => ['permission:manage permissions']], function () {
    /*Permissions related routes*/
    Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
    Route::get('permissions/add', 'PermissionsController@create')->name('permissions.add');
    Route::post('permissions/add', 'PermissionsController@store')->name('permissions.create');
    Route::get('permissions/edit/{id}', 'PermissionsController@edit')->name('permissions.edit');
    Route::post('permissions/update', 'PermissionsController@update')->name('permissions.update');
    Route::post('permissions/delete', 'PermissionsController@destroy')->name('permissions.delete');
});

Route::group(['middleware' => ['permission:manage settings']], function () {
    /*Permissions related routes*/
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings/add', 'SettingsController@add')->name('settings.add');
});
