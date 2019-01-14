
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function () {
    $('.btn-warning').click(function(){
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

    $('.btn-success').click(function(){
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
                $('.viewUserModal').find('#img_user').attr("src", "/storage/images/"+data.img_user_link);
            }
        });
    });
});
