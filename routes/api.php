<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Clients
    Route::resource('clients', 'ClientsApiController');

    // Projects
    Route::resource('projects', 'ProjectApiController');

    // Project Types
    Route::resource('project-types', 'ProjectTypeApiController');

    // Tasks
    Route::resource('tasks', 'TasksApiController');

    // Statuses
    Route::resource('statuses', 'StatusApiController');

    // Comments
    Route::resource('comments', 'CommentsApiController');
});
