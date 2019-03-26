
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

// custom
    // prevent multiple form submitting
$("body").on("submit", "form", function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});

    // notification toasts
$(".lajtof-alert").fadeTo(5000, 500).slideUp(500, function(){
    $(this).slideUp(500);
});

    // ajax
        // ajax csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    // ajax /users search
$(document).ready(function(){
    $('#search').on('keyup', function(){
        var text = $('#search').val();
        $.ajax({
            type: 'POST',
            url: 'users/search',
            data: {text: $('#search').val()},
            success: function(response) {
                $('tbody').empty();
                $('.lajtof-section-pagination').remove();
                for (var user of response) {
                    console.log(user);
                    $('tbody').append(
                        '<tr>' +
                        '<td>' + user.id + '</td>' +
                        '<td>' + user.username + '</td>' +
                        '<td>' + user.email + '</td>' +
                        '</tr>'
                    );
                }
            }
        });
    });
});
