@extends('layouts.app')
@section('title')
	{{$article->title}}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('news')}}">Новости</a> /
        {{$article->title}}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                @if($article)
                    <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                        @isset($article->photo)
                            <div class="image-lightbox">
                                <a href="{{asset('images/news/'.$article->photo)}}" data-lightbox="{{asset('images/news/'.$article->photo)}}" title="{{ $article->title }}">
                                    <img width="500" height="500" src="{{asset('images/news/'.$article->photo)}}" class="attachment-full size-full wp-post-image" alt="{{$article->title}}"/>
                                </a>
                            </div>
                        @endisset
                        <header class="entry-header">
                            <h3 class="entry-title">{{ $article->title }}</h3>
                            <div class="addthis_inline_share_toolbox"></div>
                            <h5 class="doublef-event-item-date">
                                Добавил: <a href="{{route('profile',['id'=>$article->user->id])}}">{{$article->user->name}} {{$article->user->surname}}</a>
                            </h5>
                            <h5 class="doublef-event-item-date">{{$article->date}}</h5>
                        </header>
                        <div class="entry-content">
                            <p>{{$article->content}}</p>
                        </div>
                        @if (!Auth::guest())
                            @if (Auth::user()->role == 1 or Auth::user()->role == 2)
                                <a href="{{ route('article.edit',['id'=>$article->id]) }}" class="more-link button">Редактировать новость</a>
                                <a href="{{route('deletenews',$article->id)}}" onclick="return confirm('Удалить новость?')" class="more-link button">Удалить новость</a>
                            @endif
                        @endif
                    </article>
					<div class="col-md-6 blog-right">
                        <div>
                            <h3>Последние новости</h3>
                            <ul>
                                @foreach($lastNews as $news)
                                    <li><a href="{{ route('article', ['id' => $news->id]) }}">{{ $news->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @foreach($article->comments as $comment)
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
                                                     class='avatar avatar-50 photo' height='50' width='50'
                                                />
                                            </div>
                                            <div class="avatar-body pull-left">
                                                <h6 class="avatar-name">
                                                    <a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}</a>
                                                </h6>
                                                <p class="avatar-time">
                                                    Дата публикации: {{$comment->created_at->format('d.m.Y в H.m')}}
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
                                            <img alt=''
                                                 src="{{asset('images/users/'.$comment->user->avatar)}}"
                                                 srcset="{{asset('images/users/'.$comment->user->avatar)}}"
                                                 class='avatar avatar-50 photo' height='50' width='50'
                                            />
                                        </div>
                                        <div class="avatar-body pull-left">
                                            <h6 class="avatar-name">
                                                <a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}</a>
                                            </h6>
                                            <p class="avatar-time">
                                                Дата публикации: {{$comment->created_at->format('d.m.Y в H.m')}}
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
                @endforeach
				{{$article->comments->links()}}
                @if (!Auth::guest())
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Оставить комментарий</h3>
                        <form action="{{route('add_comment')}}" method="post" id="commentform" class="comment-form" novalidate>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="article_id" value="{{$article->id}}">
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
            </main>      
        </div>              
    </div>
</div>
@endsection