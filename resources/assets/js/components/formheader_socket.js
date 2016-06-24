require('vue')

window.Pusher = require('pusher-js');

import Echo from "laravel-echo"

window.echo = new Echo('98b83c2dfe5593de48fb');

/**
 * Pass socket ID with every request.
 */
Vue.http.interceptors.push(function () {
    return {
        request(request) {
            request.headers['X-Socket-Id'] = echo.socketId();
            return request;
        }
    }
});