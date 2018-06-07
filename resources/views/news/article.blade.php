@extends('layouts.app')
@section('title')
    {{$article->title}}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('news')}}">Новости</a> /
        {{$article->title}}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">                
                @if($article)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                    @isset($article->photo)
                    <div class="image-lightbox">
                        <a href="{{asset('images/news/'.$article->photo)}}" data-lightbox="{{asset('images/news/'.$article->photo)}}" title="{{ $article->title }}">
                            <img width="800" height="500" src="{{asset('images/news/'.$article->photo)}}" class="attachment-full size-full wp-post-image" alt="{{$article->title}}"/>
                        </a>
                    </div>
                    @endisset
                    <header class="entry-header">
                        <h3 class="entry-title">{{ $article->title }}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">
                            Добавил: <a href="{{route('profile',['id'=>$article->user->id])}}">{{$article->user->name}} {{$article->user->surname}}</a>
                        </h5>
                        <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($article->date))].' Y года'.' в H:i', strtotime($article->date))}}</h5>					
                    </header>
                    <div class="entry-content">
                        <p>{{$article->content}}</p>
                    </div>
                    @if (!Auth::guest())
                        @if ( Auth::user()->role == 1 or (Auth::user()->role == 2 and Auth::user()->studentsClasses->contains('id', $article->studentClass['id'])) )
                            <a href="{{ route('article.edit',['id'=>$article->id]) }}" class="more-link button pull-left">Редактировать новость</a>
                            <a href="{{route('deletenews',$article->id)}}" onclick="return confirm('Удалить новость?')" class="more-link button pull-right">Удалить новость</a>
                        @endif
                    @endif
                </article>
                @endif
                @include('news.comments')
            </main>      
        </div>
        <div id="primary" class="content-area grid__col grid__col--1-of-3 grid__col--m-1-of-1">
            <div class="col-md-3 blog-right">
                <div>
                    <h4>Последние новости</h4>
                    <ul style="list-style-type:none">
                        @foreach($lastNews as $news)
                            <li><a href="{{ route('article', ['id' => $news->id]) }}">{{ $news->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h4>Выберите новости за месяц</h4>
            <form method="POST" action="{{route('article.choose')}}">
                {{ csrf_field() }}
                <label for="month">Выберите месяц</label>
                <select name="month">
                    @foreach (range(1,12) as $month)
                        <option value="{{$month}}">{{$monthNames[$month]}}</option>
                    @endforeach
                </select>
                <label for="year">Выберите год</label>
                <select name="year">
                    @foreach (range($thisYear,2000) as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                </select>
                <button type="submit" id="subbut" class="button">Найти</button>
            </form>
            @include('widget')
        </div>              
    </div>
</div>
@endsection