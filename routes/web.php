<?php

Route::get('/', 'HomeController@index');
Route::get('/{currentCategory}', 'ArticlesCategoryController@index');