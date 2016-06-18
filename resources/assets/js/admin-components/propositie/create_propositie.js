//var Dropzone = require('dropzone');

Vue.component('create-propositie', {
    props: ['proId'],

    template: '#create_propositie_temp',

    //components: [Dropzone],
    /**
     * All of the component's data.
     */
    data: function() {
        return {
            viewers: [],
            task: null,
            name: ''
        };
    },


    /**
     * Prepare the component.
     */
    ready() {
        //this.listen();

        //this.getTask();
        alert('arrived create template');
        alert('and further');

    },



    methods: {
        /**
         * Listen to Echo channels.
         */
        //listen() {
        //    echo.join('task.' + this.taskId)
        //        .here(viewers => {
        //            this.viewers = viewers;
        //        });
        //},


        /**
         * Get the task being viewed.
         */
        getTask() {

            this.$http.post('/api/content/show')
                .then(response => {
                    this.task = response.data;
                    this.nameme = response.data.pro_name;

                    console.log(this.task);

                    alert(response.data.pro_name);
                });
        }
    },


    //computed: {
    //    /**
    //     * Get all of the current viewers except me.
    //     */
    //    viewersExceptMe() {
    //        return _.reject(this.viewers, viewer => this.user.id == viewer.id);
    //    }
    //}
});

var App = new Vue({});
