//window.Pusher = require('pusher-js');

//import Echo from "laravel-echo"
//
//window.echo = new Echo('98b83c2dfe5593de48fb');
//
//var Vue = require('vue');
//window.Vue = Vue;
//Vue.config.debug = true;
//Vue.use(require('vue-resource'));
//Vue.use(require('vue-moment'));

/**
 * Pass socket ID with every request.
 */
// Vue.http.interceptors.push(function () {
// 	alert(echo.socketId);
//     return {
//         request(request) {
//             request.headers['X-Socket-Id'] = echo.socketId();
//             return request;
//         }
//     }
// });

//Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
//Vue.http.options.emulateJSON = true;

require('./components/bootstrap');
