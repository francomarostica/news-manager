<?php

Route::get('/', 'HomeController@index')->name('index');

// PDC Routes //
Route::get('/panel', 'Panel\MainController@index')->name('panel');
Route::resource('/panel/articles', 'Panel\ArticlesController');
Route::get('/panel/profile', 'Panel\ProfileController@index');
Route::resource('/panel/categories', 'Panel\CategoriesController');
Route::resource('/panel/users', 'Panel\UsersController');
Route::get('/panel/testing', 'Panel\TestingController@index');

// API Routes... //
Route::put('/api/profile', 'Api\ProfileController@update');
Route::apiResource('/api/articles', 'Api\ArticlesController')->middleware('api');
Route::apiResource('/api/categories', 'Api\CategoriesController')->middleware('api');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/api/login', 'Auth\LoginController@login');
Route::post('/api/logout', 'Auth\LoginController@logout')->name('api-logout');

// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}

// Password Reset Routes...
if ($options['reset'] ?? true) {
    Route::resetPassword();
}

// Email Verification Routes...
if ($options['verify'] ?? false) {
    Route::emailVerification();
}

Route::get('/{currentCategory}', 'HomeController@secondaryPage');
Route::get('/{currentCategory}/{articleSlug}', 'HomeController@showArticle');

