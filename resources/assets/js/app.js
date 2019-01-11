
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
                // user = JSON.parse(data);
                console.log(data.username);
                // $('.viewUserModal').modal('show');
                // $('.viewUserModal').find('#username').text(user.username);
                // $('.viewUserModal').find('#email').text(user.email);
                // $('.viewUserModal').find('#type_user').text(user.type_user.desc_type_user);
            }
        });
        // $.ajax({
        //     url: '/dados/'+id,
        //     type: 'GET',
        //     success: function (data) {
        //         user = JSON.parse(data);
        //         $('.viewUserModal').find('#usernameview').val(user.username);
        //         $('.viewUserModal').find('#emailview').val(user.email);
        //         $('.viewUserModal').find('#type_userview').val(user.type_user_id);
        //         $('.viewUserModal').find("#editUser").attr('action', '/admin/usuario/' + user.id + '/alterar');
        //     }
        // });
    });
});
