@if($comment->comment_parent)

    {{$comment->comment_parent}}
    <div class="media comment-item" data-comment-id="{{ $comment->id }}">
@else
    <li class="media comment-item" data-comment-id="{{ $comment->id }}">
@endif
     <a class="pull-left" href="#">
         <img class="media-object" style="width: 32px; height: 32px;" src="{{str_replace(public_path(), '', $comment->user->avatar)}}">
     </a>

<div class="media-body">
     <div class="col-xs-12 comment-header">
         {!! $comment->user->first_name .' '. $comment->user->last_name  !!}
         •
         @if($comment->user_id == $comment->propositie->user_id)
            <span class="label label-default tiny-badge">Propositiehouder</span> •
         @endif
           <span><i id="basic-addon1" class="time-ago addon right" title="{{$comment->created_at->format('d-m-Y h:i:s')}}">
               {{$comment->created_at->diffForHumans()}}</i>
               {{--{!! $comment->content->user_id!!}--}}
           </span>
     </div>

    @if(Auth::user()->id == $comment->user->id)
        <div class="col-xs-12 comment-owner">
            <p>{{ $comment->message }}</p>
        </div>
    @else
        <div class="col-xs-12">
            <p>{{ $comment->message }}</p>
            <p><a class='comment_reply_to' href='#writecomment' data-replyto='{{ $comment->id }}' onclick="toggleReply('{{ $comment->id .'_'. $comment->created_at->format('Y-d-m')}}')">Reply</a></p>
        </div>
    @endif
    <div style="display: none;" class="{{ $comment->id .'_'. $comment->created_at->format('Y-d-m')}}">
        {!! Form::open(['route' => 'commentreply.store', 'class' => 'form-vertical', 'id' => $comment->id .'_'. $comment->created_at->format('d-m-Y')]) !!}
            {{Form::hidden('reply_to', $comment->id)}}
            {!! Form::hidden('propositie_id', $comment->propositie_id)!!}

            <textarea name="message" class="form-control send-message" rows="2" placeholder="Schrijf uw bericht hier..."></textarea>
            <div class="btn-panel">
                <a type="button" id="refresh" class="col-lg-4 btn text-right send-message-btn pull-right"
                   role="button" onclick="sendReply('{{$comment->id .'_'. $comment->created_at->format('d-m-Y')}}')"><i class="fa fa-plus"></i> Reageer</a>
            </div>

        {!! Form::close()!!}
    </div>

         @if($comment->replies->count())
             <div class="col-xs-12">
              {!! dumpComments($comment->replies) !!}
             </div>
         @endif
</div>

@if($comment->comment_parent)
    </div>
@else
    </li>
@endif

<script>
    function toggleReply($id)
    {
        $('.'+$id).toggle();
    }

    function sendReply($form)
    {
        $('#'+$form).submit();
    }
</script>
