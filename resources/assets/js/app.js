
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function () {
    $('.edit_user').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/usuario/'+id,
            type: 'GET',
            success: function (data) {
                user = JSON.parse(data);
                $('.editUserModal').modal('show');
                $('.editUserModal').find('#usernameEdit').val(user.username);
                $('.editUserModal').find('#emailEdit').val(user.email);
                $('.editUserModal').find('#type_userEdit').val(user.type_user_id);
                $('.editUserModal').find("#editUser").attr('action', '/admin/usuario/' + user.id + '/alterar');
            }
        });
    });

    $('.view_user').click(function () {
        id = this.id;
        $.ajax({
            url: '/dados/completos/'+id,
            type: 'GET',
            success: function (data) {
                $('.viewUserModal').modal('show');
                $('.viewUserModal').find('#username').text(data.username);
                $('.viewUserModal').find('#email').text(data.email);
                $('.viewUserModal').find('#type_user').text(data.desc_type_user);
                $('.viewUserModal').find('#desc_user').text(data.desc_user);
                $('.viewUserModal').find('#total_articles').text(data.total_articles);
                $('.viewUserModal').find('#created_at').text(data.created_at);
                $('.viewUserModal').find('#img_user').attr("src", "/storage/images/profiles/"+data.img_user_link);
            }
        });
    });

    $('.delete_user').click(function () {
        id = this.id;
        $('.deleteUserModal').modal('show');
        $('.deleteUserModal').find("#deleteUser").attr('action', '/admin/usuario/' + id + '/excluir');
    });

    $('.edit_article').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/artigo/' + id,
            type: 'GET',
            success: function (data) {
                article = JSON.parse(data);
                $('.editArticleModal').modal('show');
                $('.editArticleModal').find('#title').val(article.title);
                $('.editArticleModal').find('#type_articleEdit').val(article.type_article_id);
                $('.editArticleModal').find('#visibility').val(article.visibility);
                $('.editArticleModal').find("#editArticle").attr('action', '/admin/artigo/' + article.id + '/alterar');
            }
        });
    });

    $('.delete_article').click(function () {
        id = this.id;
        $('.deleteArticleModal').modal('show');
        $('.deleteArticleModal').find("#deleteArticle").attr('action', '/admin/artigo/' + id + '/excluir');
    });

    $('.write_article').click(function (){
        id = this.id;
        window.location.href = '/admin/artigo/'+id+'/escrever';
    });

    $('.edit_comment').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/comentario/'+id,
            type: 'GET',
            success: function (data) {
                comment = JSON.parse(data);
                $('.editCommentModal').modal('show');
                $('.editCommentModal').find('#txt_mensagemEdit').val(comment.txt_message);
                $('.editCommentModal').find("#editComment").attr('action', '/admin/comentario/' + comment.id + '/alterar');
            }
        });
    });

    $('.view_comment').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/comentario/'+id,
            type: 'GET',
            success: function (data) {
                comment = JSON.parse(data);
                $('.viewCommentModal').modal('show');
                $('.viewCommentModal').find('#title').text(comment.article_title);
                $('.viewCommentModal').find('#username').text(comment.username);
                $('.viewCommentModal').find('#txt_mensagem').text(comment.txt_message);
                $('.viewCommentModal').find('#created_at').text(comment.data_created);
            }
        });
    });

    $('.delete_comment').click(function () {
        id = this.id;
        $('.deleteCommentModal').modal('show');
        $('.deleteCommentModal').find("#deleteComment").attr('action', '/admin/comentario/' + id + '/excluir');
    });

    $('.alter_visibility').click(function(){
        id = this.id;
        $.ajax({
            url: '/admin/article/alterarVisibilidade/'+id,
            type: 'GET',
            success: function () {
                location.reload();
            }
        });
    });

    $('.edit_data_user').click(function () {
        id = this.id;
        $.ajax({
            url: 'dados/completos/'+ id,
            type: 'GET',
            success: function (data) {
                $('.editUserDataModal').modal('show');
                $('.editUserDataModal').find('#usernameDataEdit').val(data.username);
                $('.editUserDataModal').find('#nameDataEdit').val(data.name);
                $('.editUserDataModal').find('#emailDataEdit').val(data.email);
                $('.editUserDataModal').find('#dt_birthDataEdit').val(data.dt_birth);
                $('.editUserDataModal').find('#desc_userDataEdit').val(data.desc_user);
                $('.editUserDataModal').find("#editDataUser").attr('action', 'dados/' + id + '/alterar');
            }
        });
    });

    $('#refresh').click(function (){
        location.reload();
    });

    $('.edit_type_user').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/tipo/usuario/'+id,
            type: 'GET',
            success: function (data) {
                typeuser = JSON.parse(data);
                $('.editTypeUserModal').modal('show');
                $('.editTypeUserModal').find('#desc_type').val(typeuser.desc_type_user);
                $('.editTypeUserModal').find('#status_type').val(typeuser.status_type_user);
                $('.editTypeUserModal').find("#editTypeUser").attr('action', '/admin/tipo/usuario/' + typeuser.id + '/alterar');
            }
        });
    });

    $('.delete_type_user').click(function () {
        id = this.id;
        $('.deleteTypeUserModal').modal('show');
        $('.deleteTypeUserModal').find("#deleteTypeUser").attr('action', '/admin/tipo/usuario/' + id + '/excluir');
    });

    $('.edit_type_article').click(function () {
        id = this.id;
        $.ajax({
            url: '/admin/menu/artigo/' + id,
            type: 'GET',
            success: function (data) {
                typearticle = JSON.parse(data);
                $('.editTypeArticleModal').modal('show');
                $('.editTypeArticleModal').find('#desc_type').val(typearticle.desc_type_article);
                $('.editTypeArticleModal').find('#status_type').val(typearticle.status_type_article);
                $('.editTypeArticleModal').find("#editTypeArticle").attr('action', '/admin/menu/artigo/' + typearticle.id + '/alterar');
            }
        });
    });

    $('.delete_type_article').click(function () {
        id = this.id;
        $('.deleteTypeArticleModal').modal('show');
        $('.deleteTypeArticleModal').find("#deleteTypeArticle").attr('action', '/admin/menu/artigo/' + id + '/excluir');
    });

});
