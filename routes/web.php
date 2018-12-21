<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', 'TesteController@index');
Route::get('/artigos', 'ArticleController@index');
Route::get('/menus', 'TypeArticleController@index');
