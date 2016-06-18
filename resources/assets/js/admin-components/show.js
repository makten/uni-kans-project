Vue.component('proposities-show', {
    props: ['proId'],

    template: '#sheeeeje',

    /**
     * All of the component's data.
     */
    data: function() {
        return {
            viewers: [],
            task: null,
            nameme: ''
        };
    },


    /**
     * Prepare the component.
     */
    ready() {
        //this.listen();

        this.getTask();
        alert('arrived')

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

            this.$http.get('/api/content/'  + this.proId + '/show')
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
