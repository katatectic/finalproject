@extends('layouts.app')
@section('title')
    Отчёты
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="{{asset('images/site/events.JPG')}}"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">Отчеты</h1>
                <p>
                    @isset($committee)
                        Отчёты комитета {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса
                    @else
                        Список всех отчетов
                    @endif
                </p>
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
        Отчеты
    </div>
    
    @if (count($reports) > 0)
    <section class="events">        
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <main id="main" class="site-main" role="main">
                    @foreach($reports as $report)
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;">                       
                        <div class="post-text-block grid__col grid__col--12-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h3 class="entry-title">  
                                    <a href="{{route('report.show',['id'=>$report->id])}}">Протокол № {{ $report->id }} от {{date('j '.$monthNames[date('n', strtotime($report->date))].' Y года', strtotime($report->date))}}</a>
                                </h3>
                                <h5 class="doublef-event-item-date">
                                    Добавил: <a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}} {{$report->user->surname}}</a></h5>
                                <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($report->date))].' Y года', strtotime($report->date))}} </h5>
                                <div class="entry-content">                                
                                    <a class="more-link button"  href="{{ route('report.show',['id'=>$report->id]) }}">Читать далее</a>
                                </div>
                            </header>
                        </div>
                    </article>
                    @endforeach
                    {{ $reports->links() }}
                </main>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                <form method="POST" action="{{route('report.choose')}}">
                    <h4 style="margin-top: 15px;">Выберите отчеты за месяц</h4>
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
    </section>
    @endif
</div>
@endsection