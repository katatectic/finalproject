@extends('layouts.app')
@section('title')
    Отчёты за {{$thisYear}}
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="{{asset('images/site/events.JPG')}}"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">Отчёты за {{$thisYear}}</h1>
                <p>
                    @isset($committee)
                    Отчёты комитета {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса
                    @else
                    Список всех отчётов
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> /
        <a href="{{route('reports')}}">Отчёты</a> /
        Отчёты за {{$thisYear}}
    </div>
    @if (count($reportDate) == 0)
    <p>Отчётов не найдено</p>
    @else
    <section class="events">
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <main id="main" class="site-main" role="main">
                    @foreach($reportDate as $report)
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
                    {{ $reportDate->links() }}
                </main>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3 grid__col--m-1-of-1">
                <div class="col-md-6 blog-right">
                    <div>
                        <h3>Последние отчёты</h3>
                        <ul style="list-style-type:none">
                            @foreach($lastReports as $reports)
                                <li><a href="{{ route('report.show', ['id' => $reports->id]) }}">Протокол № {{ $reports->id }} от {{ $reports->date }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <h4 style="">Выберите отчеты за месяц</h4>
                <form method="POST" action="{{route('report.choose')}}">
                    {{ csrf_field() }}
                    <label for='month'>Выберите месяц</label>
                    <select name="month">
                        @foreach (range(1,12) as $month)
                            <option value="{{$month}}">{{$monthNames[$month]}}</option>
                        @endforeach
                    </select>
                    <label for='year'>Выберите год</label>
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
        {{ $reportDate->links() }}
    </section>
    @endif
</div>
@endsection