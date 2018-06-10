@extends('layouts.app')
@section('title')
    Отчёты
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="{{asset('images/site/events.jpg')}}"
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
    </section>
    @endif
</div>
@endsection