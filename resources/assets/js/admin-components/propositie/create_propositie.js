var Dropzone = require('dropzone');

import StopWordsHelper from '../../mixins/StopWordsHelper';

Vue.component('create-propositie', {

    mixins: [StopWordsHelper],

    props: ['proId'],

    template: '#create_propositie_temp',

    components: [Dropzone],
    /**
     * All of the component's data.
     */
    data: function () {
        return {
            viewers: [],
            pro_name: '',
            pro_description: '',
            num_char_desc: 250,
            pro_unique: '',
            unique_suggest: [],
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

        getSuggestions: function () {

            if (this.pro_name.length >= 3) {

                var words = this.pro_name + this.pro_description;
                this.unique_suggest = this.getWords(words);

                alert(this.unique_suggest);

            }
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
