<template>

    <form class=" navbar-form navbar-left" @submit.prevent>
        <div class="form-group" style=" margin-bottom:0px;">
            <div class="input-group col-md-12 ">
                        <span class="input-group-btn">
                    <button @click="show = ! show" type="button" id="sendQuery" class="btn btn-default btn-sm" style="color: white;"><i v-bind:class="['fa fa-search', show ? 'fa fa-times' : '']"></i>
                    </button>
                    </span>
                <input v-show="show" transition="toggle" type="text"
                       id="navSearchInput"
                       v-model="navquery"
                       v-on:keyup.enter="navSearch(pagination.current_page)"
                       debounce="500"
                       class='animated form-control  col-md-10' placeholder="Zoek">
            </div>
        </div>
    </form>

</template>




<script>



    export default{
        data(){
            return{
                show: false,
                navquery: '',
                searchResults: [],
                pagination: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,// left and right padding from the pagination <span>,just change it to see effects

            }
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
            navSearch: function (page) {
//                var data = {page: page};


//                if(this.navquery.length < 2) {
//                    this.searchResults = [];
//                    return false;
//                }sd
                this.$http.get('/api/search/' + this.navquery).then(function (response) {

                    this.searchResults = response.data.data.data;

                    this.pagination = response.data.pagination;

                    this.$dispatch('new-searchresults', this.searchResults, this.navquery, this.pagination, this.page);
                    this.navquery = '';

                }.bind(this), function (response) {

                })
            }
        }
    }
</script>