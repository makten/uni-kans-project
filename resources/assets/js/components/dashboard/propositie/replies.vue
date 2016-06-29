<template>

    <ul class="media-list list-group" v-for="reply in replies">

        {{{ getNest(reply) }}}

        <a class="pull-left" href="#">
            <img class="media-object img-circle" style="width: 32px; height: 32px;"
                 :src="getImg(reply.user.avatar)">
        </a>

        <div class="media-body">
            <div class="col-xs-12 reply-header">
                {{ reply.user.first_name +' '+ reply.user.last_name }}
                •

                <span v-if="reply.user_id == reply.propositie.user_id" class="label label-default tiny-badge">Propositiehouder</span>
                •
                    <span>
                        <i id="basic-addon1" class="time-ago addon right"
                             title="{{.reply.created_at | moment 'd-m-Y h:i:s'}}">
                        {{humanReadable(reply.created_at) }}
                        </i>
                    </span>

            </div>


            <!--<div v-if="user.id == reply.user_id" class="col-xs-12 reply-owner">-->
            <!--<p>{{ reply.message }}</p>-->
            <!--</div>-->

            <div v-else class="col-xs-12">
                <p>{{ reply.message }}</p>
                <p><a class='reply_reply_to' href='writereply'
                      data-replyto='{{ reply.id }}'
                      onclick="toggleReply('{{ reply.id +'_'+ reply.created_at | moment 'Y-d-m'}}')">Reply</a>
                </p>
            </div>


            <!--&lt;!&ndash;&lt;!&ndash;<div style="display: none;"&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;class="{{ reply->id +'_'+ reply.created_at | moment 'Y-d-m'}}">&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;Form::open(['route' => 'replyreply.store', 'class' => 'form-vertical', 'id' => {{reply.id +'_'+&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;reply.created_at->format('d-m-Y')])&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;Form::hidden('reply_to', $reply->id)&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;Form::hidden('propositie_id', $reply->propositie_id)&ndash;&gt;&ndash;&gt;-->

            <!--&lt;!&ndash;&lt;!&ndash;<textarea name="message" class="form-control send-message" rows="2"&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;placeholder="Schrijf uw bericht hier..."></textarea>&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;<div class="btn-panel">&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;<a type="button" id="refresh"&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;class="col-lg-4 btn text-right send-message-btn pull-right"&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;role="button"&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;onclick="sendReply('{{$reply->id .'_'. reply->created_at->format('d-m-Y')}}')"><i&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;class="fa fa-plus"></i> Reageer</a>&ndash;&gt;&ndash;&gt;-->
            <!--&lt;!&ndash;&lt;!&ndash;</div>&ndash;&gt;&ndash;&gt;-->

        </div>


        </div v-if="reply.parent_parent == 0">
        </li v-else>

    </ul>

</template>


<script>

    var marked = require('marked');
    marked.setOptions({ghm: true});

    export default{
        props: ['user', 'comment'],

        data(){
            return {
                replies: [],
                formStat: false,
            }
        },

        ready() {
            this.replies = this.comment.replies
        },
        components: {},

        methods: {

            getImg: function (link) {

                var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
                return t;
            },

            humanReadable: function (value) {
                var date = moment(value).fromNow();
                return date;

            },

            getNest: function (reply) {


                if (reply.comment_parent == 0) {


                    return "<div class=\"media comment-item\" data-comment-id=\"{{ reply.id }}\">"
                }
                else {

                    return "<li class='media comment-item' data-comment-id=''{{ reply.id }}'>"
                }

            },
            
        },
        
        filters: {
            'marked': marked,
        },
        
        computed: {
            showForm: function () {
                
            }
        }
    }
</script>