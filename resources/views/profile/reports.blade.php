@extends('layouts.app')
@section('content')
@section('title')
    Отчёты пользователя {{$user->name}} {{$user->surname}}
@endsection
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('profile',['id'=>$user->id])}}">Профиль пользователя {{$user->name}} {{$user->surname}}</a> 
        / Отчёты пользователя {{$user->name}} {{$user->surname}}
    </div>
    @if (count($user->reports) == 0)
        <h4>У пользователя {{$user->name}} {{$user->surname}} нет отчётов</h4>
    @else
        <h4>Отчёты пользователя {{$user->name}} {{$user->surname}} </h4>
    @endif
    <section class="events">
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3">
                <main id="main" class="site-main" role="main">
                    @foreach($user->reports as $report)
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
                </main>
            </div>
            <div id="primary" class="content-area grid__col grid__col--1-of-3">
                <div class="col-md-6 blog-right">
                    <div>
                        <h4>Последние отчёты</h4>
                        <ul style="list-style-type:none">
                            @foreach($lastReports as $report)
                                <li><a href="{{ route('report.show',['id'=>$report->id]) }}">Протокол № {{ $report->id }} от {{ $report->date }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('widget')
            </div>
        </div>
    </section>
    {{$user->reports->links()}}
</div>  
@endsection    
