@extends('layouts.app')
@section('title')
    События
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="{{asset('images/site/events.JPG')}}"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">
                    @isset($committee)
                        События комитета {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса
                    @else
                        Ближайшие события
                    @endif
                </h1>
                <p>Список всех событий.</p>
            </div>
        </div>
    </div>
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> /
        @isset($committee)
        <a href="{{ route('oneCommittee',['id' => $committee->id]) }}">Комитет {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса</a> /
        @endisset
        События
    </div>
    
    @if (count($events) > 0)
    <section class="events">
        
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <main id="main" class="site-main" role="main">
                    @foreach($events as $event)
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;"
                             >
                        <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <a href="{{route('event.show',['id'=>$event->id])}}"
                               title="{{ $event->title }}">
                                <img width="1140" height="500"
                                     src="{{asset('images/events/'.$event->photo)}}"
                                     class="attachment-full size-full wp-post-image"
                                     alt=""
                                     srcset="{{asset('images/events/'.$event->photo)}} 1140w, {{asset('images/events/'.$event->photo)}} 600w"
                                     sizes="(max-width: 1140px) 100vw, 1140px"/>
                            </a>
                        </figure>
                        <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h3 class="entry-title">
                                    <a href="{{route('event.show',['id'=>$event->id])}}">{{ $event->title }}</a>
                                </h3>
                                <h5 class="doublef-event-item-date"><a href="{{route('profile',['id'=>$event->user->id])}}">Добавил: {{$event->user->name}} {{$event->user->surname}} </a></h5>
                                <h5 class="doublef-event-item-date">Дата проведения: {{date('j '.$monthNames[date('n', strtotime($event->event_date))].' Y года', strtotime($event->event_date))}} </h5>
                                <h5 class="doublef-event-item-time">Время проведения: {{ $event->event_hours }}</h5>
                                <div class="doublef-event-address">
                                    Место проведения: <a href="https://www.google.com/maps/search/{{implode('+', explode(" ",$event->address))}}">{{$event->address}}</a>
                                </div>
                            </header>
                            <div class="entry-content">
                                <p>{{ $event->description }}
                                    <a class="more-link button"  href="{{ route('event.show',['id'=>$event->id]) }}">Читать далее</a>
                                </p>
                                <span class="screen-reader-text">Продолжить чтение  {{ $event->title }}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    {{ $events->links() }}
                </main>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                <h4 style="margin-top: 25px;">Выберите события за месяц</h4>
                <form method="POST" action="{{route('event.choose')}}">
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
    </section>
    @endif
</div>
@endsection