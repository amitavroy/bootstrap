<?php

/**
 * This is the route file where all bootstrap routes are present.
 * This is basically to move out the default routes from the
 * main routes and allow the developer to focus on the only
 * the routes which are related to the project.
 */

Route::get('roles', 'RolesController@index')->name('roles.index');
