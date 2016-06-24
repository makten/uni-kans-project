var Vue = require('vue');

window.Vue = Vue;
Vue.config.debug = true;
Vue.use(require('vue-resource'));


Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
Vue.http.options.emulateJSON = true;





Vue.component('showtask', {

    template: '#showtasktemplate',

    props: ['user', 'currentTeam', 'taskId'],

    data: function(){
        return {
            viewers: [],
            task: null,
        }
    },

    ready: function () {

        this.listen();
        this.getTask();
    },

    methods: {

        listen: function(){

            echo.join('task.' + this.taskId)
                .here(function(members){
                    console.log(members);
                    this.viewers = members;
                })
        },
        
        getTask: function () {

            this.$http.get('/api/teams/' + this.currentTeam + '/tasks/' + this.taskId).then(function(response) {
                    this.task = response.data;
                });
        }
    },

    computed: {
        viewersExceptMe: function (){
            //return _.reject(this.viewersExceptMe,  viewer => this.user.id == viewer.id);
        }
    }
});