var marked = require('marked');

marked.setOptions({ghm: true});


Vue.transition('seeMore', {
    enterClass: 'rollIn',
    leaveClass: 'rollOut'
})

// Vue.transition('swipe', {
//     enterClass: 'bounceInDown',
//     leaveClass: 'zoomOutUp'
// });

Vue.component('proposities-show', {
    props: ['user', 'proId'],

    template: '#propositie_show',

    /**
     * All of the component's data.
     */
    data: function() {
        return {
            viewers: [],
            task: null,
            checkMember: '',
            image: '',
            seeMore: false
        };
    },


    /**
     * Prepare the component.
     */
    ready() {
        
        this.getTask();

    },
    methods: {
       
        /**
         * Get the task being viewed.
         */
        getTask() {

            this.$http.get('/api/content/'  + this.proId + '/show')
                .then(response => {
                    this.task = response.data; 
                });
        },

        humanReadable: function (value) {
            var date = moment(value).fromNow();            
            return date;

        },

        getImg: function(link){  


            var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
            return t;
        },

        getNest: function (comment) {

            //$com = '';

            if(comment.comment_parent == 0){


                return "<div class=\"media comment-item\" data-comment-id=\"@{{ comment.id }}\">"
            }
            else{

                return "<li class='media comment-item' data-comment-id=''@{{ comment.id }}'>"
            }

        },

        printComments: function (comments) {

        }
    },

    computed: {
       /**
        * Get all of the current viewers except me.
        */
       whoAmI(member) {        
           // return _.reject(this.viewers, viewer => this.user.id == viewer.id);
       }
    },

    filters: {
        'marked': marked,
    }
});
