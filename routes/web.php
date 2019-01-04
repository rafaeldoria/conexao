<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('comentarios', 'CommentController@index');
Route::get('artigos/{id}', 'ArticleController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teste', 'TesteController@index');
Route::get('/menus', 'TypeArticleController@index');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('artigos', 'ArticleController@index')->middleware('can:administrator');
    Route::get('artigo/novo', 'ArticleController@create')->middleware('can:author');
    Route::post('artigo/salvar', 'ArticleController@post')->middleware('can:author');
    Route::get('artigos/{id}/editar', 'ArticleController@edit')->middleware('can:author');
    Route::get('artigos/{id}/alterar', 'ArticleController@update')->middleware('can:author');
    Route::get('artigos/{id}/excluir', 'ArticleController@delete')->middleware('can:administrator');
});

Route::middleware(['auth'])->group(function(){
    Route::get('comentario/novo', 'CommentController@create');
    Route::post('comentario/salvar', 'CommentController@post');
    Route::get('comentario/{id}/editar', 'CommentController@edit');
    Route::get('comentario/{id}/alterar', 'CommentController@update');
    Route::get('comentario/{id}/excluir', 'CommentController@delete');
});