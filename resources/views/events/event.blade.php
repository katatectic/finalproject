@extends('layouts.app')
@section('title')
{{$event->title}}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('event.index')}}">События</a> /
        {{$event->title}}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                @if($event)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                    <div class="image-lightbox">
                        <a href="{{asset('images/events/'.$event->photo)}}" data-lightbox="{{asset('images/events/'.$event->photo)}}" title="{{ $event->title }}">
                            <img width="500" height="500" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image" alt=""/>
                        </a>
                    </div>
                    <header class="entry-header">
                        <h3 class="entry-title">{{$event->title}}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">Добавил: 
                            <a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}} {{$event->user->surname}}</a>
                        </h5>
                        <h5 class="doublef-event-item-date">Дата проведения {{$event->event_date}}</h5>
                        <h5 class="doublef-event-item-time">Время проведения {{$event->event_hours}}</h5>
                        <div class="doublef-event-address">Место проведения - {{$event->address}}</div>
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
    </div>
</div>
@endsection