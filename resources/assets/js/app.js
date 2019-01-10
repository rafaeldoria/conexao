
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
        console.log(id);
        // $.ajax({
        //     url: '/usuario/'.id,
        //     type: 'POST',
        // },
        $.ajax({
            url: '/admin/usuario/'+id,
            type: 'GET',
            success: function (data) {
                user = JSON.parse(data);
                console.log(user.username);
                $('.editUserModal').modal('show');
                $('.editUserModal').find('#username').val(user.username);
                $('.editUserModal').find('#email').val(user.email);
                $('.editUserModal').find('#type_user').val(user.type_user_id);
                $('.editUserModal').find("#editUser").attr('action', '/admin/usuario/' + user.id + '/alterar');
            }
        });
    });
});
