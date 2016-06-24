window.Pusher = require('pusher-js');
var Vue = require('vue');


import Echo from "laravel-echo"

window.echo = new Echo('98b83c2dfe5593de48fb');


window.Vue = Vue;
Vue.config.debug = true;
Vue.use(require('vue-resource'));
Vue.use(require('vue-moment'));

var Dropzone = require('dropzone');
var marked = require('marked');
marked.setOptions({ghm: true});

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
Vue.http.options.emulateJSON = true;

require('./home.js');
//require('./admin-components/admin_bootstrap');

import DashboardOverview from './dashboard/home/home.vue';
import ShowPropositie from './dashboard/propositie/show.vue';
// require('./dashboard/bootstrap');
// require('./home/home');

//Pull in all required components to start the App

//var AppComponent = require('./.......')

Vue.transition('toggle', {
    enterClass: 'fadeIn',
    leaveClass: 'bounceOut'
});
Vue.transition('swipe', {
    enterClass: 'bounceInDown',
    leaveClass: 'zoomOutUp'
});

//Vue.transition('fade', {
//    enterClass: 'fa',
//    leaveClass: 'slideOutDown',
//});


new Vue({
    el: 'body',

    components: {
        'dashboard-overview': DashboardOverview,
        'show-propositie': ShowPropositie,
    },

    ready() {

    }
});
