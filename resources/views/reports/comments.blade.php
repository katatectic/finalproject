@foreach($report->comments as $comment)
@if(Auth::user())
@if ($report->ispublished == 0 AND Auth::user()->id == $comment->user->id)
<div id="comments" class="comments-area">
    <div class="comment_list comment-list">
        <div class="comment byuser comment-author-adminschool bypostauthor even thread-even depth-1" id="comment-7">
            <h4>Неопубликованный</h4>
            <div class="avatar clear">
                <div class="avatar-image pull-left">
                    <img src="{{asset('images/users/'.$comment->user->avatar)}}"
                         srcset="{{asset('images/users/'.$comment->user->avatar)}}"
                         class='avatar avatar-50 photo' height='50' width='50'/>
                </div>
                <div class="avatar-body pull-left">
                    <h6 class="avatar-name">
                        <a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}</a>
                    </h6>
                    <p class="avatar-time">Дата публикации: {{date('j '.$monthNames[date('n', strtotime($comment->created_at))].' Y года'.' в H:i', strtotime($comment->created_at))}}
                    </p>
                </div>
            </div>
            <div class="copy clear">
                <p>{{$comment->comment}}</p>
            </div>
            @if(Auth::user())
            @if (Auth::user()->role == 1 || Auth::user()->id == $comment->user->id)
            <p>
                <a style="float:right" onclick="return confirm('Удалить комментарий?')" href="{{route('deleteComment',$comment->id)}}" class="more-link button">Удалить комментарий</a>
            </p>
            @endif
            @endif
        </div>
    </div>
</div>
@endif
@endif
@if ($comment->ispublished == 1)
<div id="comments" class="comments-area">
    <div class="comment_list comment-list">
        <div class="comment byuser comment-author-adminschool bypostauthor even thread-even depth-1" id="comment-7">
            <div class="avatar clear">
                <div class="avatar-image pull-left">
                    <img src="{{asset('images/users/'.$comment->user->avatar)}}"
                         srcset="{{asset('images/users/'.$comment->user->avatar)}}"
                         class='avatar avatar-50 photo' height='50' width='50'/>
                </div>
                <div class="avatar-body pull-left">
                    <h6 class="avatar-name">
                        <a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}<a/>
                    </h6>
                    <p class="avatar-time">Дата публикации: {{date('j '.$monthNames[date('n', strtotime($comment->created_at))].' Y года'.' в H:i', strtotime($comment->created_at))}}
                    </p>
                </div>
            </div>
            <div class="copy clear">
                <p>{{$comment->comment}}</p>
            </div>
            @if(Auth::user())
            @if (Auth::user()->role == 1 || Auth::user()->id == $comment->user->id)
            <p>
                <a style="float:right" onclick="return confirm('Удалить комментарий?')" href="{{route('deleteComment',$comment->id)}}" class="more-link button">Удалить комментарий</a>
            </p>
            @endif
            @endif
        </div>
    </div>
    @endif
    @endforeach
    {{$report->comments->links()}}
    @if (!Auth::guest())
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">Оставить комментарий</h3>
        <form action="{{route('add_comment')}}" method="post" id="commentform" class="comment-form" novalidate>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="report_id" value="{{$report->id}}">
            <p class="comment-form-comment">
                <label for="comment">Комментарий</label>
                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="Комментарий" required="required"></textarea>
            </p>                                
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="Опубликовать комментарий"/>
            </p>
            {{ csrf_field() }}
        </form>
    </div>
    @endif                      
</div>
