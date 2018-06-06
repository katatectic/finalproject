@extends('layouts.app')
@section('title')
    {{$event->title}}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('event.index')}}">События</a> /
        {{$event->title}}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">                
                @if($event)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                    <div class="image-lightbox">
                        <a href="{{asset('images/events/'.$event->photo)}}" data-lightbox="{{asset('images/events/'.$event->photo)}}" title="{{ $event->title }}">
                            <img width="700" height="500" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image" alt=""/>
                        </a>
                    </div>
                    <header class="entry-header">
                        <h3 class="entry-title">{{$event->title}}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">Добавил: 
                            <a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}} {{$event->user->surname}}</a>
                        </h5>
                        <h5 class="doublef-event-item-date">Дата проведения {{date('j '.$monthNames[date('n', strtotime($event->event_date))].' Y года', strtotime($event->event_date))}}</h5>
                        <h5 class="doublef-event-item-time">Время проведения {{$event->event_hours}}</h5>
                        <div class="doublef-event-address">Место проведения - <a href="https://www.google.com/maps/search/{{implode('+', explode(" ",$event->address))}}">{{$event->address}}</a></div>
                    </header>
                    <div class="entry-content">
                        <p>{{$event->content}}</p>
                    </div>
                    @if (!Auth::guest())
                        @if ( Auth::user()->role == 1 or (Auth::user()->role == 2 and Auth::user()->studentsClasses->contains('id', $event->studentClass['id'])) )
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
                @include('events.comments')
            </main>    
        </div>
        <div id="primary" class="content-area grid__col grid__col--1-of-3">
            <h4 style="">Выберите события за месяц</h4>
            <form method="POST" action="{{route('event.choose')}}">
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