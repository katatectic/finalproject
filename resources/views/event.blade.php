@extends('layouts.app')
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div><!-- Small devices menu -->
</div><!-- #cinemahead -->
<div id="content" class="site-content wrappr">
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
    <div class="grid"><!-- toast grid declaration -->
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                @if($event)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                    <figure class="post-thumbnail">
                        <img width="1140" height="500" src="{{asset('images/'.$event->photo)}}" class="attachment-full size-full wp-post-image" alt="" srcset="{{asset('images/'.$event->photo)}} 1140w, {{asset('images/'.$event->photo)}} 600w" sizes="(max-width: 1140px) 100vw, 1140px"/>
                    </figure>
                    <header class="entry-header">
                        <h1 class="entry-title">{{$event->title}}</h1>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                        <h3 class="doublef-event-item-date">Кто создал 
                            <a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}}</a>
                        </h3>
                        <h3 class="doublef-event-item-date">Дата проведения {{$event->event_date}}</h3>
                        <h3 class="doublef-event-item-time">Время проведения {{$event->event_hours}}</h3>
                        <div class="doublef-event-address">Место проведения - {{$event->address}}</div>
                    </header>
                    <div class="entry-content">
                        <p>{{$event->content}}</p>
                    </div>
                    <a href="{{ route('editevent',['id'=>$event->id]) }}" class="more-link button">Редактировать событие</a>
                    <a href="{{route('deleteevent',$event->id)}}" onclick="return confirm('Удалить событие?')" class="more-link button" style="float:right">Удалить событие</a><!-- .entry-content -->
                </article>
                @endif
                @foreach($event->comments as $comment)
                <div id="comments" class="comments-area">
                    <div class="comment_list comment-list">
                        <div class="comment byuser comment-author-adminschool bypostauthor even thread-even depth-1" id="comment-7">
                            <div class="avatar clear">
                                <div class="avatar-image pull-left">
                                    <img alt=''
                                         src='http://2.gravatar.com/avatar/5a338e41aca0e2e1d4b43bae120eec90?s=50&#038;d=mm&#038;r=g'
                                         srcset='http://2.gravatar.com/avatar/5a338e41aca0e2e1d4b43bae120eec90?s=100&#038;d=mm&#038;r=g 2x'
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
                        </div><!-- #comment-## -->
                    </div><!-- .comment-list -->
                    @endforeach
                    @if (!Auth::guest())
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Оставить комментарий</h3>
                        <form action="{{route('add_comment')}}" method="post" id="commentform" class="comment-form" novalidate>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="event_id" value="{{$event->id}}">
                            {{--<p class="comment-notes">
                            <span id="email-notes">Ваш адрес электронной почты не будет опубликован.</span> Обязательные для заполнения поля отмечены <span class="required">*</span>
                                                 </p>--}}
                            <p class="comment-form-comment">
                                <label for="comment">Комментарий</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                            </p>                                
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Опубликовать комментарий"/>
                                <input type='hidden' name='comment_post_ID' value='35' id='comment_post_ID'/>
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                            </p>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    @endif                      
                </div><!-- #comments -->
            </main><!-- #main -->        
        </div>           
    </div>
    </script>
</div>
@endsection