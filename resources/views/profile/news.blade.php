@extends('layouts.app')
@section('content')
@section('title')
    Новости пользователя {{$user->name}} {{$user->surname}}
@endsection
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('profile',['id'=>$user->id])}}">Профиль пользователя {{$user->name}} {{$user->surname}}</a> /
        Новости пользователя {{$user->name}} {{$user->surname}}
    </div>
    @if (count($user->articles) == 0)
        <h4>У пользователя {{$user->name}} {{$user->surname}} нет новостей</h4>
    @else
        <h4>Новости пользователя {{$user->name}} {{$user->surname}} </h4>
    @endif
    <section class="events">
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <main id="main" class="site-main" role="main">
                    @foreach($user->articles as $article)
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;"
                             >
                        <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <a href="{{route('article',['id'=>$article->id])}}"
                               title="{{ $article->title }}">
                                <img width="940" height="500"
                                     src="{{asset('images/news/'.$article->photo)}}"
                                     class="attachment-full size-full wp-post-image"
                                     alt=""
                                     srcset="{{asset('images/news/'.$article->photo)}} 940w, {{asset('images/news/'.$article->photo)}} 600w"
                                     sizes="(max-width: 940px) 100vw, 1140px"/>
                            </a>
                        </figure>
                        <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h3 class="entry-title">
                                    <a href="{{route('article',['id'=>$article->id])}}">{{ $article->title }}</a>
                                </h3>
                                <h5 class="doublef-event-item-date"><a href="{{route('profile',['id'=>$article->user->id])}}">Добавил: {{$article->user->name}} {{$article->user->surname}} </a></h5>
                                <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($article->date))].' Y года'.' в H:i', strtotime($article->date))}} </h5>
                            </header>
                            <div class="entry-content">
                                <p>{{ $article->description }}
                                    <a class="more-link button"  href="{{route('article',['id'=>$article->id])}}">Читать далее</a>
                                </p>
                                <span class="screen-reader-text">Продолжить чтение  {{ $article->title }}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </main>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                <div class="col-md-6 blog-right">
                    <div>
                        <h4>Последние новости</h4>
                        <ul style="list-style-type:none">
                            @foreach($lastNews as $news)
                                <li><a href="{{ route('article', ['id' => $news->id]) }}">{{ $news->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('widget')
            </div>
        </div>
    </section>
    {{$user->articles->links()}}	
</div>
@endsection    
