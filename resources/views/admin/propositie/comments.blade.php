<template id="commentstemplate">
        hellosljsj
{{ propositie }}

    @if($propositie->reacties->count())
    <ul class="media-list">
    <li>{!! dumpComments($propositie->nestedReacties)!!}</li>
    </ul>
    @endif


    <ul v-for="comment in task.reacties">

        @{{{ getNest(comment) }}}

        <a class="pull-left" href="#">
            <img class="media-object img-circle" style="width: 32px; height: 32px;"
                 src="@{{getImg(comment.user.avatar)}}">
        </a>

        <div class="media-body">
            <div class="col-xs-12 comment-header">
                @{{ comment.user.first_name +' '+ comment.user.last_name  }}
                •

                <span v-if="comment.user_id == comment.propositie.user_id" class="label label-default tiny-badge">Propositiehouder</span>
                •

                                <span><i id="basic-addon1" class="time-ago addon right"
                                         title="@{{.comment.created_at | moment 'd-m-Y h:i:s'}}">
                                        @{{humanReadable(comment.created_at) }}</i>
                                    @{{ comment.content.user_id}}
                                </span>
            </div>

            @if(Auth::user()->id == $comment->user->id)
            <div v-if="user.id == comment.user_id" class="col-xs-12 comment-owner">
                <p>@{{ comment.message }}</p>
            </div>
            @else
            <div v-else class="col-xs-12">
                <p>@{{ comment.message }}</p>
                <p><a class='comment_reply_to' href='#writecomment'
                      data-replyto='@{{ comment.id }}'
                      onclick="toggleReply('@{{ comment.id +'_'+ comment.created_at | moment 'Y-d-m'}}')">Reply</a>
                </p>
            </div>
            @endif

            <div style="display: none;"
            class="@{{ comment->id +'_'+ $comment.created_at | moment 'Y-d-m'}}">
            {!! Form::open(['route' => 'commentreply.store', 'class' => 'form-vertical', 'id' => @{{comment.id +'_'+ @{{comment.created_at->format('d-m-Y')]) !!}
            {{Form::hidden('reply_to', $comment->id)}}
            {!! Form::hidden('propositie_id', $comment->propositie_id)!!}

            <textarea name="message" class="form-control send-message" rows="2"
            placeholder="Schrijf uw bericht hier..."></textarea>
            <div class="btn-panel">
            <a type="button" id="refresh"
            class="col-lg-4 btn text-right send-message-btn pull-right"
            role="button"
            onclick="sendReply('{{$comment->id .'_'. $comment->created_at->format('d-m-Y')}}')"><i
            class="fa fa-plus"></i> Reageer</a>
            </div>

            {!! Form::close()!!}
            </div>

            @if($comment->comment_parent)
        </div v-if="comment.parent_parent == 0">
        @else
        </li v-else>
    @endif
    </ul>

</template>