<template>
    <div class="right-inner-addon">
    <i class="fa fa-search hidden-xs"></i>
        <input id="searchinput" v-model="query"
               v-on:keyup.enter="search"
               v-on:keyup="clearSearch"
               debounce="500"
               class="form-control input-md" type="search" placeholder="Search">


        <div class="buttonRight visible-xs">
            <span class="">
                    <button class="btn btn-success btn-raised btn-sm">Zoek</button>
            </span>
        </div>

    </div>

    <div id="searchResult" class="row" v-if="searchResults.length">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" >{{ totalFound }} Results found</div>

                <div class="panel-body"  v-for="result in searchResults">

                    <p class="m-b-none">
                        {{ result.pro_slug }} on {{ result.created_at}}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: [
            'app'
        ],
        data: function () {
            return {
                external: {},
                query: '',
                searchResults: {},
                clear: true,
                totalFound: '',

            }
        },

        ready: function () {

            // Instantiate the Bloodhound suggestion engine
            var proposities = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: {
                    ttl: 0,
                    url: '/typeahead',
                    filter: function (response) {
                        return $.map(response, function (propositie) {
                            return {
                                name: propositie.pro_name,
                                slug: propositie.pro_slug
                            };
                        });
                    }
                },
                cache: false
            });

            // Initialize the Bloodhound suggestion engine
            proposities.initialize();

            $('#searchinput').typeahead({
                        hint: false,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        source: proposities.ttAdapter(),
                        displayKey: 'name',
                        limit: 5,
                        templates: {
                            empty: [
                                '<div class="empty-message">',
                                'Sorry no data !',
                                '</div>'
                            ].join('\n'),
                            suggestion: function (hit) {
                                return (
                                        '<div>' +
                                        '<h4 class="pro_name">' + hit.name + '</h4>' +
                                        '<h5 class="pro_slug">' + hit.slug + '</h5>' +
                                        '</div>'
                                )
                            }
                        }
                    }).on('typeahead:select', function (e, suggestion) {
                this.query = suggestion.name;
            }.bind(this));
        },

        created: function () {

        },

        methods: {
            clearSearch: function(){
//                alert(this.query.length)
              if(this.query.length <= 0){
//                  this.clear = ! this.clear;
//                  $('.tt-suggestion').addClass('animated zoomOut');
//                  $('#searchResult').addClass('animated zoomOut');
              }
            },
            search: function () {
//                if (this.query.length < 3) return;
                $('.tt-suggestion').addClass('animated zoomOut');


                this.$http.get('/typeahead/' + this.query).then(function (response) {

                    this.searchResults = response.data;
                    this.totalFound = this.searchResults.length;

                }.bind(this), function (response) {

                })

            }
        }


    }
</script>


<style>
    .tt-menu {
        position: relative;
        z-index: 99;
        padding: 20px 10px;
    }

    .right-inner-addon {
        position: relative;
        z-index: 1;
    }

    .right-inner-addon input {
        padding-right: 30px;
    }

    .right-inner-addon i {
        position: absolute;
        right: 0px;
        padding: 40px 12px;
        pointer-events: none;
    }

    .buttonRight {
        position: absolute;
        right: 0px;
        top: 20px;
    }
    .twitter-typeahead,
    .tt-hint,
    .tt-input,
    .tt-menu {
        width: 100%;
    }

    .tt-suggestion {
        padding: 3px 20px;
        font-size: 18px;
        line-height: 24px;
        border-bottom: 1px solid #e3e3e3;
        background-color: white;
    }

    .tt-cursor {
        background-color: #e3e3e3;
    }
</style>