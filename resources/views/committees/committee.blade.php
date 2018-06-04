@extends('layouts.app')
@section('title')
Комитет {{$classesNumbers()[$committee->id]}} - {{$committee->letter_class}} класса
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
	<div class="bread">
        <a href="{{route('main')}}">Главная</a> /
		<a href="{{route('allCommittees')}}">Комитеты</a> /
        <a href="{{ route('oneCommittee', ['id' => $committee->id]) }}}}">Комитет {{$classesNumbers()[$committee->id]}} - {{$committee->letter_class}} класса</a>
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-425" class="post-425 page type-page status-publish hentry">
                    <div id="pl-425" class="panel-layout">
                        <h1>
                            Комитет {{$classesNumbers()[$committee->id]}} - {{$committee->letter_class}} класса
                        </h1>
                        <div id="pg-425-1" class="panel-grid panel-no-style">
                            <div id="pgc-425-1-0" class="panel-grid-cell">
                                <div class="panel-cell-style panel-cell-style-for-425-1-0">
                                    <div id="panel-425-1-0-0"
                                         class="so-panel widget widget_buntington2-news-list panel-first-child"
                                         data-index="1">
                                        <div class="panel-widget-style panel-widget-style-for-425-1-0-0">
                                            <div class="so-widget-buntington2-news-list so-widget-buntington2-news-list-base">
                                                <h2 class="widget-title"><a href="{{ route('newsCommittee',['committeeId' => $committee->id]) }}">Последние новости</a></h2>
                                                <p>@if(empty($committee->news->first())) Нет новостей  @endif</p>
                                                <div class="news-list-widget-wrap" style="text-align: left;">
                                                    @foreach($committee->news->take(-4) as $article)
                                                    <div class="news-list-item news-list-left has-separator-line-top">
                                                        @isset($article->photo)
                                                            <figure class="post-thumbnail news-list-item-featured-image">
                                                                <a href="{{route('article',['id'=>$article->id])}}">
                                                                    <img width="1140" height="500"
                                                                         src="{{asset('images/news/'.$article->photo)}}"
                                                                         class="attachment-full size-full wp-post-image"
                                                                         alt=""
                                                                         srcset="{{asset('images/news/'.$article->photo)}} 1140w, {{asset('images/news/'.$article->photo)}} 600w"
                                                                         sizes="(max-width: 1140px) 100vw, 1140px"
                                                                    />
                                                                </a>
                                                            </figure>
                                                        @endisset
                                                        <div class="news-list-item-elements ">
                                                            <h5>
                                                                <a href="{{route('article', ['id'=>$article->id])}}"
                                                                   rel="bookmark">{{$article->title}}</a>
                                                            </h5>
                                                            <h6 class="doublef-event-item-date">
                                                                Добавил:
                                                                <a href="{{route('profile',['id'=>$article->user->id])}}">{{$article->user->name}} {{$article->user->surname}}
                                                                </a>
                                                            </h6>
                                                            <div class="entry-meta">
                                                                <ul class="post-meta-wrapper ul-horizontal-list">
                                                                    <li class="post-meta-date">
                                                                        <time class="entry-date published">{{$article->created_at->format('d.m.Y')}}</time>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pgc-425-1-1" class="panel-grid-cell">
                                <div class="panel-cell-style panel-cell-style-for-425-1-1">
                                    <div id="panel-425-1-1-0"
                                         class="so-panel widget widget_doublef-event-posts-widget panel-first-child panel-last-child"
                                         data-index="3">
                                        <div class="so-widget-doublef-event-posts-widget so-widget-doublef-event-posts-widget-base">
                                            <h2 class="widget-title"><a href="{{ route('eventCommittee',['committeeId' => $committee->id]) }}" title="посмотрть все мероприятия комитета">Будущие мероприятия</a></h2>
                                            <div class="doublef-event-posts-layout_2">
                                                @if(empty($committee->event->first())) Мероприятий нет @endif
                                                @foreach($committee->event->take(-3) as $event)
                                                <article id="post-519"
                                                         class="layout_2 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                                                    <figure class="post-thumbnail">
                                                        <a href="{{ route('event.show',['id'=>$event->id]) }}"
                                                           title="Newcomers welcome party">
                                                            <img width="1140" height="500"
                                                                 src="{{asset('images/events/'.$event->photo)}}"
                                                                 class="attachment-full size-full wp-post-image"
                                                                 alt=""
                                                                 srcset="{{asset('images/events/'.$event->photo)}} 1140w, {{asset('images/events/'.$event->photo)}} 600w"
                                                                 sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                        </a>
                                                    </figure>
                                                    <div class="doublef-events-content-wrap">
                                                        <header class="entry-header">
                                                            <h5 class="entry-title">
                                                                <a href="{{ route('event.show',['id'=>$event->id]) }}">{{$event->title}}</a>
                                                            </h5>
                                                            <h6 class="doublef-event-item-date">
                                                                Автор:
                                                                <a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}}
                                                                </a>
                                                            </h6>
                                                            <p class="doublef-event-item-date">Дата {{date('j '.$monthNames[date('n', strtotime($event->event_date))].' Y года', strtotime($event->event_date))}}</p>
                                                            <p class="doublef-event-item-time">Время {{$event->event_hours}}</p>
                                                            <div class="doublef-event-address">Адрес: <a href="https://www.google.com/maps/search/{{implode('+', explode(" ",$event->address))}}">{{$event->address}}</a>
                                                                <a class="more-link button"  href="{{ route('event.show',['id'=>$event->id]) }}">Читать далее</a>
                                                            </div>
                                                        </header>
                                                    </div>
                                                </article>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Закончился блок в середине -->
                            <div id="pgc-425-1-2" class="panel-grid-cell">
                                <div class="panel-cell-style panel-cell-style-for-425-1-2">
                                    <div id="panel-425-1-2-0"
                                         class="so-panel widget widget_doublef-courses-search panel-first-child"
                                         data-index="4">
                                        <div class="so-widget-doublef-courses-search so-widget-doublef-courses-search-base">
                                            <h2 class="widget-title">Участники комитета ({{$committee->user->count()}})</h2>
                                            <ul>
                                                @foreach ($committee->user as $user)
                                                <li><a href="{{route('profile',['id'=>$user->id])}}">{{$user->name}} {{$user->surname}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="panel-425-1-2-1"
                                         class="so-panel widget widget_buntington2-button-banner" data-index="5">
                                        <div class="panel-widget-style panel-widget-style-for-425-1-2-1">
                                            <div class="so-widget-buntington2-button-banner so-widget-buntington2-button-banner-base">
                                                <h2 class="widget-title">Полезные ссылки</h2>
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
                                            <div id="panel-425-1-0-1"
                                                 class="so-panel widget widget_doublef-featured-gallery panel-last-child"
                                                 data-index="2">
                                                @isset($albums)
                                                <div class="so-widget-doublef-featured-gallery so-widget-doublef-featured-gallery-base"><br/><br/>
                                                    <a href="{{route('album.index')}}"><h5 class="doublef-gallery-photos-num"></h5><h2 class="widget-title">Избранная галлерея</h2></a>
                                                    <div class="doublef-gallery-widget-wrap">
                                                        <figure class="post-thumbnail">
                                                            <a href="{{route('album.index')}}"
                                                               title="School Photo Shots">
                                                                <img width="1140" height="500"
                                                                     src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b.jpg"
                                                                     class="attachment-full size-full wp-post-image" alt=""
                                                                     srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b-600x263.jpg 600w"
                                                                     sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                            </a>
                                                        </figure>
                                                        <div class="doublef-gallery-title-wrap">
                                                            <h2 class="doublef-gallery-title">
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
@endsection