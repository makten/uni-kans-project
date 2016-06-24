<template>

    <button @click="showHideToggle" class="btn btn-block btn-default">Reacties {{showHideText | capitalize}}</button>
    <div v-show="showHide">

        <ul class="media-list list-group" v-for="comment in reacties">

            {{{ getNest(comment) }}}


            <a class="pull-left" href="#">
                <img class="media-object img-circle" style="width: 32px; height: 32px;"
                     :src="getImg(comment.user.avatar)">
            </a>

            <div class="media-body">
                <div class="col-xs-12 comment-header">
                    {{ comment.user.first_name +' '+ comment.user.last_name }}
                    •

                    <span v-if="comment.user_id == comment.propositie.user_id" class="label label-default tiny-badge">Propositiehouder</span>
                    •

                                <span>
                                    <i id="basic-addon1" class="time-ago addon right"
                                       title="{{comment.created_at | moment 'ddd, DD MMM YYY HH:mm:ss ZZ'}}">
                                        {{humanReadable(comment.created_at) }}</i>
                                    {{ comment.propositie.user_id}}
                                </span>
                </div>

                <div v-if="user.id == comment.user_id" class="col-xs-12 comment-owner">
                    <p>{{ comment.message }}</p>
                </div>

                <div v-else class="col-xs-12">
                    <p>{{ comment.message }}</p>
                    <p><a class='comment_reply_to' href='#writecomment'
                          data-replyto='{{ comment.id }}'
                          onclick="toggleReply('{{ comment.id +'_'+ comment.created_at | moment 'ddd, DD MMM YYY HH:mm:ss ZZ'}}')">Reply</a>
                    </p>
                </div>


                <!--<div style="display: none;"-->
                <!--class="{{ comment->id +'_'+ $comment.created_at | moment 'Y-d-m'}}">-->
                <!--{!! Form::open(['route' => 'commentreply.store', 'class' => 'form-vertical', 'id' => {{comment.id +'_'+-->
                <!--{{comment.created_at->format('d-m-Y')]) !!}-->
                <!--{{Form::hidden('reply_to', $comment->id)}}-->
                <!--{!! Form::hidden('propositie_id', $comment->propositie_id)!!}-->

                <!--<textarea name="message" class="form-control send-message" rows="2"-->
                <!--placeholder="Schrijf uw bericht hier..."></textarea>-->
                <!--<div class="btn-panel">-->
                <!--<a type="button" id="refresh"-->
                <!--class="col-lg-4 btn text-right send-message-btn pull-right"-->
                <!--role="button"-->
                <!--onclick="sendReply('{{$comment->id .'_'. comment->created_at->format('d-m-Y')}}')"><i-->
                <!--class="fa fa-plus"></i> Reageer</a>-->
                <!--</div>-->

                <nested-comments :replies="comment.replies" :user="user"></nested-comments>

            </div>



    </div v-if="comment.parent_parent == 0">
    </li v-else>

    </ul>



    <center><h4 v-if="reacties.length <= 0"> Geen reacties</h4></center>

</template>


<script>

    import Replies from './replies.vue';

    var marked = require('marked');
    marked.setOptions({ghm: true});

    export default{
        props: ['user', 'propositie'],

        data(){
            return {
                reacties: [],
                showHide: false,
            }
        },

        ready() {
            this.reacties = this.propositie.nested_reacties;
        },
        components: {
            'nested-comments': Replies,
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
        }
    }
</script>