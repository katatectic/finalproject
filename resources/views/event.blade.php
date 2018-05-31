@extends('layouts.app')
@section('title')
    {{$event->title}}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('event.index')}}">События</a> /
        {{$event->title}}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                @if($event)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                    <div class="image-lightbox">
                        <a href="{{asset('images/events/'.$event->photo)}}" data-lightbox="{{asset('images/events/'.$event->photo)}}" title="{{ $event->title }}">
                            <img width="500" height="500" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image" alt=""/>
                        </a>
                    </div>
                    <header class="entry-header">
                        <h3 class="entry-title">{{$event->title}}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">Добавил: 
                            <a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}} {{$event->user->surname}}</a>
                        </h5>
                        <h5 class="doublef-event-item-date">Дата проведения {{$event->event_date}}</h5>
                        <h5 class="doublef-event-item-time">Время проведения {{$event->event_hours}}</h5>
                        <div class="doublef-event-address">Место проведения - {{$event->address}}</div>
                    </header>
                    <div class="entry-content">
                        <p>{{$event->content}}</p>
                    </div>
                    @if (!Auth::guest())
                    @if (Auth::user()->role == 1 or Auth::user()->role == 2)
                    <a href="{{ route('event.edit',['id'=>$event->id]) }}" class="more-link button">Редактировать событие</a>
                    <a href="{{route('event.delete',$event->id)}}" onclick="return confirm('Удалить событие?')" class="more-link button">Удалить событие</a>
                    @endif
                    @endif
                </article>
                @endif
				<div class="col-md-6 blog-right">
                    <div>
                        <h3>Последние события</h3>
                        <ul>
                            @foreach($lastEvents as $events)
                        <li><a href="{{ route('event.show', ['id' => $events->id]) }}">{{ $events->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($event->comments as $comment)
                    @if(Auth::user())
                        @if ($comment->ispublished == 0 AND Auth::user()->id == $comment->user->id)
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
                                                <a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}<a/>
                                            </h6>
                                            <p class="avatar-time">Дата публикации: {{$comment->created_at->format('d.m.Y в H.m')}}
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
                                        <p class="avatar-time">Дата публикации: {{$comment->created_at->format('d.m.Y в H.m')}}</p>
                                    </div>
                                </div>
                                <div class="copy clear">
                                    <p>{{$comment->comment}}</p>
                                </div>
                                @if (Auth::user()->role == 1 || Auth::user()->id == $comment->user->id)
                                <p>
                                    <a style="float:right" onclick="return confirm('Удалить комментарий?')" href="{{route('deleteComment',$comment->id)}}" class="more-link button">Удалить комментарий</a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @if (!Auth::guest())
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Оставить комментарий</h3>
                    <form action="{{route('add_comment')}}" method="post" id="commentform" class="comment-form" novalidate>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="event_id" value="{{$event->id}}">
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
            </main>    
        </div>           
    </div>
</script>
</div>
@endsection