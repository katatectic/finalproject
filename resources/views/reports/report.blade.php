@extends('layouts.app')
@section('title')
    Протокол № {{ $report->id }} от {{ $report->date }}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread" style="margin-top: 10px; margin-bottom: 10px;">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('reports')}}">Отчеты</a> /
        Протокол № {{ $report->id }} от {{ $report->date }}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">                
                @if($report)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">                    
                    <header class="entry-header">
                        <h3 class="entry-title">Протокол № {{ $report->id }} от {{date('j '.$monthNames[date('n', strtotime($report->date))].' Y года', strtotime($report->date))}}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">
                            Добавил: <a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}} {{$report->user->surname}} </a>
                        </h5>
                        <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($report->date))].' Y года', strtotime($report->date))}}</h5>
                    </header>
                    <div class="entry-content">
                        <p>{{$report->content}}</p>
                    </div>
                    @if (Auth::user())
                        @if (Auth::user()->role == 1 or Auth::user()->role == 2)		
                            <a href="{{ route('admin.report.edit',['id'=>$report->id]) }}" class="more-link button">Редактировать отчёт</a>
                            <a href="{{route('check.create',['id'=>$report->id])}}"><button type="button"class="btn btn-primary btn-large">Добавить платёжный чек</button></a>
                            <a href="{{route('admin.report.destroy',['id'=>$report->id])}}" style=""onclick="return confirm('Удалить отчёт?')" class="more-link button">Удалить отчёт</a>
                        @endif
                    @endif
                    <h5>Платежные чеки</h5>
                    <div class="gallery">
                        @foreach($report->checks as $check)
                        <figure>
                            <div class="image-lightbox">
                                <a href="{{asset('images/reports/checks/'.$check->image)}}" data-lightbox="roadtrip">
                                    <img src="{{asset('images/reports/checks/'.$check->image)}}"/>
                                </a>
                            </div>   
                            @if((Auth::user() and Auth::user()->role==1) or (Auth::user() and Auth::user()->role==2))
                                <a href="{{route('check.delete',$check->id)}}" onclick="return confirm('Удалить чек?')" class="more-link button" style="margin:0 auto">Удалить чек</a>
                            @endif
                        </figure>
                        @endforeach
                    </div>
                </article>
                @endif
                <div class="col-md-6 blog-right">
                    <div>
                        <h3>Последние отчёты</h3>
                        <ul>
                            @foreach($lastReports as $reports)
                                <li><a href="{{ route('report.show', ['id' => $reports->id]) }}">Протокол № {{ $reports->id }} от {{ $reports->date }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('reports.comments')
            </main> 
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                <h4 style="">Выберите отчеты за месяц</h4>
                <form method="POST" action="{{route('report.choose')}}">
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
</div>
@endsection