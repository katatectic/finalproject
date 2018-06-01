@extends('layouts.app')
@section('content')
@section('title')
    Отчёты пользователя {{$user->name}} {{$user->surname}}
@endsection
<div class="bread">
    <a href="{{route('main')}}">Главная</a> / <a href="{{route('profile',['id'=>$user->id])}}">Профиль пользователя {{$user->name}} {{$user->surname}}</a> / Отчёты пользователя {{$user->name}} {{$user->surname}}
</div>
<h3>Отчёты пользователя {{$user->name}} {{$user->surname}}  </h3>
@if (count($user->reports) > 0)
<section class="events">
    @foreach($user->reports as $report)
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-519"
                         class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                         style="margin-top: 15px; margin-bottom: 15px;">                       
                    <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                        <header class="entry-header">
                            <h3 class="entry-title">  
                                <a href="{{route('report.show',['id'=>$report->id])}}">Протокол № {{ $report->id }} от {{ $report->date }}</a>

                            </h3>
                            <h5 class="doublef-event-item-date">
                                Добавил: <a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}} {{$report->user->surname}}</a></h5>
                            <h5 class="doublef-event-item-date">{{ $report->date }} </h5>
                            <div class="entry-content">                                
                                <a class="more-link button"  href="{{ route('report.show',['id'=>$report->id]) }}">Читать далее</a>
                            </div>
                        </header>
                    </div>
                </article>
            </main>
        </div>
    </div>
    @endforeach
</section>
{{$user->reports->links()}}
@else <h4>У пользователя нет отчётов</h4>
@endif	
<div class="col-md-6 blog-right">
    <div>
        <h3>Последние отчёты</h3>
        <ul>
            @foreach($lastReports as $report)
            <li><a href="{{ route('report.show',['id'=>$report->id]) }}">Протокол № {{ $report->id }} от {{ $report->date }}</a></li>
            @endforeach
        </ul>
    </div>
</div>	
@endsection    