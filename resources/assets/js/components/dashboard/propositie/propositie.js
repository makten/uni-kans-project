var Dropzone = require('dropzone');

import StopWordsHelper from '../../mixins/StopWordsHelper';


Vue.transition('toggle', {
    enterClass: 'fadeIn',
    leaveClass: 'bounceOut'
});
Vue.transition('swipe', {
    enterClass: 'bounceInDown',
    leaveClass: 'zoomOutUp'
});

Vue.component('create-propositie', {

    mixins: [StopWordsHelper],

    props: ['proId', 'subject'],

    template: '#create_propositie_temp',

    components: [Dropzone],
    /**
     * All of the component's data.
     */
    data: function () {
        return {
            viewers: [],
            pro_name: '',
            hiddenName: '',
            name_changed: false,
            pro_description: '',
            num_char_desc: 250,
            pro_unique: '',
            unique_suggest: [],
            tags: '',
        };
    },

    /**
     * Prepare the component.
     */
    ready() {

        //alert(this.getWords('This is the Name Section Test PHP Viber'));

        //this.listen();

        //this.getTask();

    },


    methods: {

        //getSuggestions: function() {
        //
        //    if(this.hiddenName == this.pro_name.length) return;
        //
        //   //if($('#tags_container li').length > 0 || this.unique_suggest.length < 0 ) return;
        //
        //    //|| this.unique_suggest.length == this.getWords(this.pro_name).length
        //
        //    if (this.pro_name.length >= 3) {
        //        $('#tags_container ul').empty();
        //
        //        this.hiddenName = this.pro_name.length;
        //
        //        var words = this.pro_name;
        //
        //        for (var x = 0; x < this.getWords(words).length; x++){
        //            this.unique_suggest.push({added: false, text: this.getWords(words)[x]});
        //        }
        //
        //    }
        //    //this.unique_suggest = [];
        //},

        addToTags: function (suggestion) {
            suggestion.added = !suggestion.added;
            this.pro_unique += ', ' + suggestion.text;
            $('#pro_unique_input').before('<span class="tag label-default">#' + suggestion.text + ' <a style="color: white;" onclick="removeMe(this)" href="javascript:void(0)"> <i class="fa fa-times"></i> </a></span>');

        },

        //makeTag: function(e){
        //    $('#pro_unique_input').before('<span class="tag label-info">' + this.pro_unique + ' <a style="color: white;" onclick="removeMe(this)" href="javascript:void(0)"> <i class="fa fa-times"></i> </a></span>');
        //
        //},

        createPropositie: function (e) {
            alert('Handling it');
        },

        humanReadable: function (value) {
            var date = moment(value).fromNow(); // here u modify data
            //this.el.innerText = date; // and set to the view
            return date;

        },

    },


    computed: {

        nameChanged: function () {
            if (this.pro_name.length > this.hiddenName) {
                return true;
            }
        },

        /**
         * Get all of the current viewers except me.
         */
        viewersExceptMe() {
            return _.reject(this.viewers, viewer => this.user.id == viewer.id);
        }
    },

    watch: {
        pro_name: function (data) {

            if (data.length >= 3) {
                $('#tags_container ul').empty();
                //this.hiddenName = this.pro_name.length;

                var words = data;
                this.unique_suggest = [];

                for (var x = 0; x < this.getWords(words).length; x++) {
                    this.unique_suggest.push({added: false, text: this.getWords(words)[x]});
                }

            }
        }
    },
});

