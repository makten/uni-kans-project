/**
 *  This is the main dashboard app-- All components are called before this -- in admin-bootstrap
 */



var dashboardApp = new Vue({
    el: "#admin_app",

    //ready() {
    //    alert('Start afresh');
    //}
})


//var Vue = require('vue');
//
//window.Vue = Vue;
//Vue.config.debug = true;
//Vue.use(require('vue-resource'));
//var VueRouter = require('vue-router');
// Vue.use(VueRouter);
//Vue.use(require('vue-moment'));
//
//Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
//
//import Overview from './overview.vue';
////Vue.component('dashboard-overview', Overview);
//import CreatePropositie from './propositie/create_edit_propositie.vue';
//import Editpropositie from './propositie/create_edit_propositie.vue';
//import Showpropositie from './propositie/showpropositie.vue';
//
//import CreateUser from './user/create_edit_user.vue';
//import EditUser from './user/create_edit_user.vue';
//
////import AddToTeam from './content/create_edit_propositie.vue';
//
//
//
//
//var App = Vue.extend({
//
//})
//
//
//
//var router = new VueRouter({
//    saveScrollPosition: true
//})
//
//router.map({
//
//    '/': {
//        component: Overview,
//    },
//
//    '/overview': {
//        component: Overview
//    },
//
//    '/create_user': {
//        component: CreateUser
//    },
//
//    '/edit_user': {
//        component: EditUser
//    },
//
//    '/create_propositie': {
//        component: CreatePropositie
//    },
//
//    '/showPropositie': {
//        component: require('./show')
//    },
//
//    '/edit_propositie': {
//        component: Editpropositie
//    },
//
//    '/create_markt': {
//        component: Overview
//    }
//})
//
//router.start(App, '#admin_app');
