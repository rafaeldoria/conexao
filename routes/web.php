<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teste', 'TesteController@index');
Route::get('/menus', 'TypeArticleController@index');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('artigos', 'ArticleController@index');
    Route::get('artigos/{id}', 'ArticleController@show');
});