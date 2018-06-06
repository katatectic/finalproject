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
                        <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($article->date))].' Y года'.' в H:i', strtotime($article->date))}}</h5>					
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
        <div id="primary" class="content-area grid__col grid__col--1-of-3 grid__col--m-1-of-1">
                <h4>Выберите новости за месяц</h4>
                <form method="POST" action="{{route('article.choose')}}">
                    {{ csrf_field() }}
                    <select name="month">
                        @foreach (range(1,12) as $month)
                            <option value="{{$month}}">{{$monthNames[$month]}}</option>
                        @endforeach
                    </select>
                    <select name="year">
                        @foreach (range($thisYear,2000) as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <button type="submit" id="subbut" class="button">Найти</button>
                </form>
                <div class="so-widget-doublef-courses-search so-widget-doublef-courses-search-base">
                    <h2 class="widget-title" style="margin-top: 20px;">Что-то будем искать?</h2>
                    <form role="search" method="get" id="course-finder"
                          class="search-form one-field-submit"
                          action="{{route('search')}}">
                        <label>
                            <span class="screen-reader-text">Что-нибудь поищи...</span>
                            <input type="text" class="search-field" placeholder="Поиск..." name="search"/>
                            <input type="hidden" name="post_type" value="doublef-course"/>
                        </label>
                        {{ csrf_field() }}
                        <input type="submit" class="search-submit" value="Искать"/>
                    </form>
                </div>
                <div class="so-widget-buntington2-button-banner so-widget-buntington2-button-banner-base">
                    <h2 class="widget-title" style="margin-top: 20px;">Полезные ссылки</h2>  
                    <a href="http://www.mon.gov.ua/"
                       target="_self" class="button-banner-link">
                        <div class="button-banner-wrapper" style="background-color: #5dca9d; ; text-align: left; padding: 20px 20px 20px 20px;">
                            <div class="button-banner-text">
                                <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> Министерство образования и науки Украины</h2>
                                <div class="button-banner-tagline" style="color: #FFFFFF;">Ссылка на сайт МОН </div>
                            </div>
                            <div class="dbb-hover-canvas"></div>
                        </div>
                    </a>
                    <a href="http://testportal.gov.ua/"
                       target="_self" class="button-banner-link" style="margin-top: 10px;">
                        <div class="button-banner-wrapper" style="background-color: #b9becd; ; text-align: left; padding: 20px 20px 20px 20px;">
                            <div class="button-banner-text">
                                <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> УЦОЯО</h2>
                                <div class="button-banner-tagline"
                                     style="color: #FFFFFF;">Ссылка на сайт УЦОЯО
                                </div>
                            </div>
                            <div class="dbb-hover-canvas"></div>
                        </div>
                    </a>
                </div>
            </div>              
    </div>
</div>
@endsection