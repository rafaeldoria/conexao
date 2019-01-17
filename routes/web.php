<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('comentarios', 'CommentController@index');
Route::get('artigos/{id}', 'ArticleController@showBlog');

Auth::routes();

Route::get('/conexao', 'ConexaoController@index')->name('conexao');
Route::get('/teste', 'TesteController@index');
Route::get('/menus', 'TypeArticleController@index');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('artigos', 'ArticleController@index')->middleware('can:administrator')->name('articles');
    Route::get('artigo/novo', 'ArticleController@create')->middleware('can:author');
    Route::get('artigo/{id}', 'ArticleController@show')->middleware('can:author');
    Route::post('artigo/salvar', 'ArticleController@store')->middleware('can:author')->name('newArticles');
    Route::get('artigo/{id}/editar', 'ArticleController@edit')->middleware('can:author');
    Route::patch('artigo/{id}/alterar', 'ArticleController@update')->middleware('can:author');
    Route::delete('artigo/{id}/excluir', 'ArticleController@destroy')->middleware('can:administrator')->name('deleteArticles');
    Route::get('usuarios', 'UserController@index')->middleware('can:administrator')->name('users');
    Route::get('usuario/novo', 'UserController@create')->middleware('can:administrator');
    Route::post('usuario/salvar', 'UserController@store')->middleware('can:administrator')->name('newUsers');
    Route::get('usuario/{id}', 'UserController@show')->middleware('can:administrator');
    Route::get('usuario/{id}/editar', 'UserController@edit')->middleware('can:administrator');
    Route::patch('usuario/{id}/alterar', 'UserController@update')->middleware('can:administrator')->name('editUsers');
    Route::delete('usuario/{id}/excluir', 'UserController@destroy')->middleware('can:administrator')->name('deleteUsers');
});

Route::middleware(['auth'])->group(function(){
    Route::get('comentario/novo', 'CommentController@create');
    Route::post('comentario/salvar', 'CommentController@store');
    Route::get('comentario/{id}/editar', 'CommentController@edit');
    Route::put('comentario/{id}/alterar', 'CommentController@update');
    Route::delete('comentario/{id}/excluir', 'CommentController@destroy');
});

Route::middleware(['auth'])->group(function(){
    Route::get('dados', 'UserDataController@index')->middleware('can:administrator');
    Route::get('dados/novo', 'UserDataController@create');
    Route::post('dados/salvar', 'UserDataController@store');
    Route::get('dados/{id}', 'UserDataController@show');
    Route::get('dados/{id}/editar', 'UserDataController@edit');
    Route::put('dados/{id}/alterar', 'UserDataController@update');
    Route::delete('dados/{id}/excluir', 'UserDataController@destroy')->middleware('can:administrator');
    Route::get('dados/completos/{id}', 'UserController@showComplete');
});