/**
 * Created by Hafiz on 6/17/2016.
 */

var Vue = require('vue');

window.Vue = Vue;
Vue.config.debug = true;
Vue.use(require('vue-resource'));
//var VueRouter = require('vue-router');
// Vue.use(VueRouter);
Vue.use(require('vue-moment'));

import Themas from './themas.vue';
import Marktsegments from './marktsegments.vue';
import Search from './search.vue';
import NavSearch from './navsearch.vue';
import HighlightText from '../mixins/helpers';


Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

Vue.transition('toggle', {
    enterClass: 'fadeIn',
    leaveClass: 'bounceOut'
});
Vue.transition('swipe', {
    enterClass: 'bounceInDown',
    leaveClass: 'zoomOutUp'
});

//Vue.filter('highlight', function(words, query){
//    alert(words); alert(query);
//    //var test =  words.replace("Incidunt", "<span v-class='dan'>Incidunt</span>");
//    //return "<span class='dan'>"+query+"</span>";
//    return '<b>' + query + '</b>';
//})



new Vue({

    mixins: [HighlightText],
    el: 'body',

    data: function(){
        return {
            searchOutput: [],
            hideResult: false,
            words: '',
            query: [],
            navquery: '',
            current_page: '',
            pagination: {
                total: 0,
                per_page: 12,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects

        }

    },

    components:  {
        Search, Themas, Marktsegments, NavSearch
    },
    computed: {
        isActived: function () {

            this.$dispatch('new-current_page', this.pagination.current_page);
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    methods: {
        handleSearchResults: function(searchresults, navquery, pagination, page){

            this.searchOutput = searchresults;
            this.pagination = pagination;
            this.page = page;

            this.query = navquery;

            if(searchresults.length <= 0){
                this.searchOutput = [];
            }
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.navSearch(page);

        },
        navSearch: function (page) {
            var data = {page: page};

            this.$http.get('/api/search/' + this.query, data).then(function (response) {

                //this.searchResults = ;
                this.$set('searchOutput', response.data.data.data);
                this.$set('pagination', response.data.pagination);

                console.log(this.searchOutput);

                //this.pagination = response.data.pagination;
                //this.$dispatch('new-searchresults', this.searchResults, this.navquery, this.pagination, this.page);


            }.bind(this), function (response) {

            })
        },

        getImg: function(link){

            return link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
        }
    },

    ready: function() {
        //this.words = this.highlight('The world is bigger than you and my php', 'dan');
    },

    created: function(){

    },

    events: {
        'new-current_page': function(current_page){
            this.current_page = current_page
        }
    }
});

//var App = Vue.extend()
//
//var router = new VueRouter({
//    saveScrollPosition: true
//})
//
//
//router.map({
//
//    '/': {
//        component: Marktsegments
//    }
//})
//
//router.start(App, '#app');
