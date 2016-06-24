import Helper from '../mixins/helpers';

Vue.component('dashboard-overview',{

    template: '#dashboard_overview',

    mixins: [Helper],
    props: ['user'],


    data(){
        return{
            pro_order: 1,
            pro_columns: ['Id', 'Photo', 'Creator', 'Name', 'Slug', 'Create at'],
            proposities: [],
            filterPros: '',
            sortKey: '',
            reverse: false,
        }
    },

    ready(){
        this.getPros();
//            admin.user
    },

    methods: {
        getPros: function(){

            this.$http.get('/api/proposities/all').then(function(response){
                this.proposities = response.data;
            }.bind(this), function(response){

            })
        },

        sortBy: function (sortKey) {
            this.reverse = this.sortKey == sortKey? !this.reverse : false;

            this.sortKey = sortKey;
        }
    }
});