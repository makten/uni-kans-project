// var Vue = require('vue');

// window.Vue = Vue;
// Vue.config.debug = true;
// Vue.use(require('vue-resource'));
// Vue.use(require('vue-moment'));
// 
var marked = require('marked');

marked.setOptions({ghm: true});


// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
// Vue.http.options.emulateJSON = true;

// window.Pusher = require('pusher-js');

// import Echo from "laravel-echo"

// window.echo = new Echo('98b83c2dfe5593de48fb');


Vue.component('taskshome', {
    //props: ['user', 'currentTeam'],

    template: '#taskshometemplate',

    /**
     * All of the component's data.
     */
    data: function() {
        return {
            tasks: {},
            name: '',
            mark: 'Treat as code block lovely'
        }
    },


    /**
     * Prepare the component.
     */
    ready: function() {

        this.listen();

        this.getTasks();
    },


    methods: {
        /**
         * Listen to the Echo channels.
         */
        listen() {
             echo.channel('teams.' + 1 + '.tasks')
                .listen('TaskCreated', function(data){
                    // console.table(data.task);
                    this.tasks.push(data.task);

             });


            //echo.channel('teams.' + 1 + '.tasks')
            //    .listen('TaskCreated', event => {
            //        this.tasks.push(event.task);
            //        console.log()
            //    })
            //    .listen('TaskDeleted', event => {
            //        this.removeTaskFromData(event.taskId);
            //    });
        },


        /**
         * Get all of the tasks for the team.
         */
        getTasks() {

            this.$http.get('/api/teams/' + 1 + '/tasks')
                .then(response => {
                    this.tasks = response.data;
                });
        },
        //this.currentTeam.id


        /**
         * Create a fresh task.
         */
        create() {

            var formData = new FormData();
            formData.append('name', this.name);

            this.$http.post('/api/teams/' + 1 + '/tasks', formData).then(function(response){
                this.name = '';
                this.tasks.push(response.data);

            });

            //var formData = new FormData();
            //formData.append('name', this.name);
            //this.$http.post('/api/teams/' + 1 + '/tasks', formData, {emulateJSON:true})
            //    .then(task => {
            //        this.tasks.push(task);
            //        console.log(task);
            //    });
        },


        /**
         * Delete the given task.
         */
        deleteTask(task) {
            this.$http.delete('/api/teams/' + this.currentTeam.id + '/tasks/' + task.id);

            this.removeTaskFromData(task.id);
        },


        /**
         * Remove the task from the component's data.
         */
        removeTaskFromData(taskId) {
            this.tasks = _.reject(this.tasks, t => t.id == taskId);
        }
    },

    filters: {
        marked: marked
    }
});
