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
                            <img width="800" height="500" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image" alt=""/>
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
                            <a href="{{ route('event.edit',['id'=>$event->id]) }}" class="more-link button pull-left">Редактировать событие</a>
                            <a href="{{route('event.delete',$event->id)}}" onclick="return confirm('Удалить событие?')" class="more-link button pull-right">Удалить событие</a>
                        @endif
                    @endif
                </article>
                @endif
                @include('events.comments')
            </main>    
        </div>
        <div id="primary" class="content-area grid__col grid__col--1-of-3">
            <div class="col-md-6 blog-right">
                <div>
                    <h3>Последние события</h3>
                    <ul style="list-style-type:none">
                        @foreach($lastEvents as $events)
                        <li><a href="{{ route('event.show', ['id' => $events->id]) }}">{{ $events->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <h4 style="">Выберите события за месяц</h4>
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
            @include('widget')
        </div>
    </div>
</div>
@endsection