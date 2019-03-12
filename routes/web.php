<?php

Route::get('/', 'HomeController@index')->name('index');
Route::get('/panel', 'PanelController@index')->name('panel');
Route::resource('/panel/articles', 'ArticlesController');
Route::resource('/panel/profile', 'ProfileController');
Route::resource('/panel/categories', 'CategoriesController');
Route::resource('/panel/users', 'UserController');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

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

Route::get('/{currentCategory}', 'ArticlesCategoryController@index');
Route::get('/{currentCategory}/{articleSlug}', 'HomeController@showArticle');

Route::get('/home', 'HomeController@index')->name('home');
