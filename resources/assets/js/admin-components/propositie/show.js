Vue.component('proposities-show', {
    props: ['proId'],

    template: '#propositie_show',

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
                });
        },

        humanReadable: function (value) {
            var date = moment(value).fromNow(); // here u modify data
            //this.el.innerText = date; // and set to the view
            return date;

        },
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
