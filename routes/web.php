<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('comentarios', 'CommentController@index');
Route::get('artigos/{id}', 'ArticleController@show');

Auth::routes();

Route::get('/conexao', 'ConexaoController@index')->name('conexao');
Route::get('/teste', 'TesteController@index');
Route::get('/menus', 'TypeArticleController@index');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('artigos', 'ArticleController@index')->middleware('can:administrator');
    Route::get('artigo/novo', 'ArticleController@create')->middleware('can:author');
    Route::post('artigo/salvar', 'ArticleController@post')->middleware('can:author');
    Route::get('artigo/{id}/editar', 'ArticleController@edit')->middleware('can:author');
    Route::put('artigo/{id}/alterar', 'ArticleController@update')->middleware('can:author');
    Route::delete('artigo/{id}/excluir', 'ArticleController@delete')->middleware('can:administrator');
    Route::get('usuarios', 'UserController@index')->middleware('can:administrator');
    Route::get('usuario/novo', 'UserController@create')->middleware('can:administrator');
    Route::post('usuario/salvar', 'UserController@post')->middleware('can:administrator');
    Route::get('usuario/{id}', 'UserController@show')->middleware('can:administrator');
    Route::get('usuario/{id}/editar', 'UserController@edit')->middleware('can:administrator');
    Route::put('usuario/{id}/alterar', 'UserController@update')->middleware('can:administrator');
    Route::delete('usuario/{id}/excluir', 'UserController@delete')->middleware('can:administrator');
});

Route::middleware(['auth'])->group(function(){
    Route::get('comentario/novo', 'CommentController@create');
    Route::post('comentario/salvar', 'CommentController@post');
    Route::get('comentario/{id}/editar', 'CommentController@edit');
    Route::put('comentario/{id}/alterar', 'CommentController@update');
    Route::delete('comentario/{id}/excluir', 'CommentController@delete');
});

Route::middleware(['auth'])->group(function(){
    Route::get('dados', 'UserDataController@index')->middleware('can:administrator');
    Route::get('dados/novo', 'UserDataController@create');
    Route::post('dados/salvar', 'UserDataController@post');
    Route::get('dados/{id}', 'UserDataController@show');
    Route::get('dados/{id}/editar', 'UserDataController@edit');
    Route::put('dados/{id}/alterar', 'UserDataController@update');
    Route::delete('dados/{id}/excluir', 'UserDataController@delete')->middleware('can:administrator');
});