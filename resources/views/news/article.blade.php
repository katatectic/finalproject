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
                        @if ( Auth::user()->role == 1 or (Auth::user()->role == 2 and Auth::user()->studentsClasses->contains('id', $article->studentClass['id'])) )
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
                @include('news.comments')
            </main>      
        </div>              
    </div>
</div>
@endsection