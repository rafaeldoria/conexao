<?php

// Route::get('/cke', function () {
//     return view('cke');
// });
Auth::routes();

Route::get('artigo/{id}', 'ArticleController@read')->name('readArticle');
Route::get('artigosGeral', 'ArticleController@allView')->name('allArticles');
Route::post('resultadoPesquisa', 'ArticleController@search')->name('searchArticles');
Route::get('/artigosMenu/{id}', 'ArticleController@showForType')->name('articlesForType');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/menus', 'TypeArticleController@index')->name('typesArticle');
Route::get('/menus/{id}', 'TypeArticleController@show')->name('getTypeArticle');
Route::get('/contato', 'HomeController@contact')->name('contact');
Route::post('/enviarMensagem', 'HomeController@sendContactNotification')->name('sendContact');
Route::get('/sobre', 'HomeController@about')->name('about');
Route::post('/newsletter', 'NewsletterController@addNewsletter')->name('addNewsletter');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/conexao', 'ConexaoController@index')->name('conexao');
    Route::get('artigos', 'ArticleController@index')->middleware('can:administrator')->name('articles');
    Route::get('artigo/novo', 'ArticleController@create')->middleware('can:author');
    Route::get('artigo/{id}', 'ArticleController@show')->middleware('can:author');
    Route::post('artigo/salvar', 'ArticleController@store')->middleware('can:author')->name('newArticles'); 
    Route::post('artigo/guardar/{id}', 'ArticleController@save')->middleware('can:author')->name('saveArticle'); 
    Route::get('artigo/{id}/editar', 'ArticleController@edit')->middleware('can:author');
    Route::patch('artigo/{id}/alterar', 'ArticleController@update')->middleware('can:author');
    Route::delete('artigo/{id}/excluir', 'ArticleController@destroy')->middleware('can:administrator')->name('deleteArticles');
    Route::get('artigo/{id}/escrever', 'ArticleController@write');
    Route::get('article/alterarVisibilidade/{id}', 'ArticleController@alterVisibility');
    Route::get('usuarios', 'UserController@index')->middleware('can:administrator')->name('users');
    Route::get('usuario/novo', 'UserController@create')->middleware('can:administrator');
    Route::post('usuario/salvar', 'UserController@store')->middleware('can:administrator')->name('newUsers');
    Route::get('usuario/{id}', 'UserController@show')->middleware('can:administrator');
    Route::get('usuario/{id}/editar', 'UserController@edit')->middleware('can:administrator');
    Route::patch('usuario/{id}/alterar', 'UserController@update')->middleware('can:administrator')->name('editUsers');
    Route::delete('usuario/{id}/excluir', 'UserController@destroy')->middleware('can:administrator')->name('deleteUsers');
    Route::get('comentario/{id}', 'CommentController@view')->middleware('can:administrator');
    Route::get('comentarios', 'CommentController@index')->name('comments');
    Route::get('comentario/novo', 'CommentController@create');
    Route::get('comentario/{id}/editar', 'CommentController@edit');
    Route::patch('comentario/{id}/alterar', 'CommentController@update')->middleware('can:administrator')->name('EditComments');
    Route::delete('comentario/{id}/excluir', 'CommentController@destroy');
    Route::get('logs', 'LogController@index')->middleware('can:administrator')->name('logs');
    Route::get('tipos/usuarios', 'TypeUserController@index')->middleware('can:administrator')->name('typesusers');
    Route::post('tipo/usuario/salvar', 'TypeUserController@store')->middleware('can:administrator')->name('newTypeUser');
    Route::get('tipo/usuario/{id}', 'TypeUserController@show')->middleware('can:administrator');
    Route::patch('tipo/usuario/{id}/alterar', 'TypeUserController@update')->middleware('can:administrator')->name('editTypeUser');
    Route::delete('tipo/usuario/{id}/excluir', 'TypeUserController@destroy')->middleware('can:administrator')->name('deleteUsers');
    Route::get('menus/artigos', 'TypeArticleController@index')->middleware('can:author')->name('typesarticles');
    Route::post('menu/artigo/salvar', 'TypeArticleController@store')->middleware('can:author')->name('newTypeArticle');
    Route::get('menu/artigo/{id}', 'TypeArticleController@show')->middleware('can:author');
    Route::patch('menu/artigo/{id}/alterar', 'TypeArticleController@update')->middleware('can:author')->name('editTypeArticle');
    Route::delete('menu/artigo/{id}/excluir', 'TypeArticleController@destroy')->middleware('can:author')->name('deleteArticles');
    Route::get('instagram', 'InstagramImageController@index')->middleware('can:administrator')->name('instagram');
    Route::get('imageI/{id}', 'InstagramImageController@show')->middleware('can:administrator');
    Route::post('imageI/salvar', 'InstagramImageController@store')->middleware('can:administrator')->name('saveImageI');
    Route::patch('imageI/{id}/alterar', 'InstagramImageController@update')->middleware('can:administrator')->name('editImageI');
    Route::delete('imageI/{id}/excluir', 'InstagramImageController@destroy')->middleware('can:administrator')->name('deleteImageI');
});

Route::middleware(['auth'])->group(function(){
    Route::post('upload_image','ImageController@uploadImage')->name('upload');
});

Route::middleware(['auth'])->group(function(){
    Route::get('dados', 'UserDataController@index')->middleware('can:administrator');
    Route::get('dados/novo', 'UserDataController@create');
    Route::post('dados/salvar', 'UserDataController@store');
    Route::get('dados/{id}', 'UserDataController@show');
    Route::get('dados/{id}/editar', 'UserDataController@edit');
    Route::patch('dados/{id}/alterar', 'UserDataController@update');
    Route::delete('dados/{id}/excluir', 'UserDataController@destroy')->middleware('can:administrator');
    Route::get('dados/completos/{id}', 'UserController@showComplete');
    Route::get('dados_usuario', 'UserController@view')->name('profile');
    Route::post('comentario/salvar', 'CommentController@store')->name('newComment');
});