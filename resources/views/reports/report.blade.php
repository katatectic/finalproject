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
                            <a href="{{ route('admin.report.edit',['id'=>$report->id]) }}" class="more-link button pull-left">Редактировать отчёт</a>
                            <a href="{{route('admin.report.destroy',$report->id)}}" onclick="return confirm('Удалить отчёт?')" class="more-link button pull-right">Удалить отчёт</a>
                        @endif
                    @endif
                    <h5 style='margin-top:100px'>Платежные чеки</h5>
                    <a href="{{route('check.create',['id'=>$report->id])}}" class="more-link button pull-center">Добавить платёжный чек</a>
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
                @include('reports.comments')
            </main> 
        </div>  
        <div id="primary" class="content-area grid__col grid__col--1-of-3">
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
</div>
@endsection