<template>

    <button @click="showHideToggle" class="btn btn-block btn-default">Reacties {{showHideText | capitalize}}</button>
    <div v-show="showHide">

        <ul class="media-list list-group" v-for="comment in reacties">

            {{{ getNest(comment) }}}


            <a class="pull-left" href="#">
                <img class="media-object img-square" style="width: 45px; height: 45px; margin 2px 0px;"
                     :src="getImg(comment.user.avatar)">
            </a>

            <div class="media-body">
                <div class="col-xs-12 comment-header useful-links">
                <a href="#">
                    {{ comment.user.first_name +' '+ comment.user.last_name }}
                </a>
                    •

                    <span v-if="comment.user_id == comment.propositie.user_id" class="label label-success tiny-badge">Propositiehouder</span>
                    •

                                <span>
                                    <i id="basic-addon1" class="time-ago addon right"
                                       title="{{comment.created_at | moment 'ddd, DD MMM YYY HH:mm:ss ZZ'}}">
                                        {{humanReadable(comment.created_at) }}</i>
                                </span>
                </div>

                <div v-if="user.id == comment.user_id" class="col-xs-12 comment-owner">
                    <p>{{ comment.message }}</p>
                </div>

                <div v-else class="col-xs-12">
                    <p>{{ comment.message }}</p>
                    <p>
                        <!-- <button id="show-modal" @click="showModal = true">Show Modal</button> -->

                        <!-- <a class='comment_reply_to' href='javascript:void(0)' -->
                          <!-- data-replyto='{{ comment.id }}' -->
                          <!-- @click="toggleReply($index, comment.id +'_'+ comment.created_at)">Reply</a> -->
                    </p>
                </div>  


                    
                <modal :bundle.sync="comment" :user="user" :propositie="propositie">
                <!-- :show.sync="showModal"  -->

                    <!-- <h3 slot="header">Reactie op {{comment.pro_name}}</h3> -->

                  <!--   <div slot="body">                        
                    </div> -->

                </modal>



                <!--<div style="display: none;" class="{{ comment->id +'_'+ $comment.created_at | moment 'Y-d-m'}}">-->

                    <nested-comments :comment="comment" :user="user"></nested-comments>

                <!--</div>-->


            </div v-if="comment.parent_parent == 0">
            </li v-else>

        </ul>

        <center><h4 v-if="reacties.length <= 0"> Geen reacties</h4></center>

</template>


<script>

    import Replies from './replies.vue';
    import Modal from './comment_formmodal.vue';

    var marked = require('marked');
    marked.setOptions({ghm: true});

    export default{
        props: ['user', 'propositie'],

        data(){
            return {
                reacties: [],
                showHide: false,
                message: '',
                showModal: false,

            }
        },

        ready() {
            this.reacties = this.propositie.nested_reacties;                       
        },
        components: {
            'nested-comments': Replies,
            'modal': Modal,
        },

        methods: {

            getNest: function (comment) {

                if (comment.comment_parent == 0) {

                    return "<div class='media comment-item' data-comment-id='{{ comment.id }}'>"
                }
                else {

                    return "<li class='media comment-item' data-comment-id='{{ comment.id }}'>"
                }

            },

            getImg: function (link) {

                var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
                return t;
            },

            humanReadable: function (value) {
                var date = moment(value).fromNow();
                return date;

            },

            showHideToggle: function () {
                this.showHide = !this.showHide;
            }
        },

        computed: {
            showHideText() {
                if (this.showHide) {
                    return "verbergen";
                }
                else {
                    return 'weergeven'
                }
            }
        },

        filters: {
            'marked': marked,
        },

        events: {
        'new-comment': function(data){

            // console.log(indexthis.reacties)
            console.log(data);
            // this.reacties.push(data);

            // this.current_page = current_page
        }
        }
    }
</script>