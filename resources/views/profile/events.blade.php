@extends('layouts.app')
@section('content')
@section('title')
    События пользователя {{$user->name}} {{$user->surname}}
@endsection
<div id="content" class="site-content wrappr">
<div class="bread">
    <a href="{{route('main')}}">Главная</a> / <a href="{{route('profile',['id'=>$user->id])}}">Профиль пользователя {{$user->name}} {{$user->surname}}</a> / События пользователя {{$user->name}} {{$user->surname}}
</div>
<h3>События пользователя {{$user->name}} {{$user->surname}}</h3>
@if (count($user->events) > 0)
<section class="events">
    @foreach($user->events as $event)
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-519"
                         class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                         style="margin-top: 15px; margin-bottom: 15px;"
                         >
                    <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                        <a href="{{route('event.show',['id'=>$event->id])}}"
                           title="{{ $event->title }}">
                            <img width="940" height="500"
                                 src="{{asset('images/events/'.$event->photo)}}"
                                 class="attachment-full size-full wp-post-image"
                                 alt=""
                                 srcset="{{asset('images/events/'.$event->photo)}} 940w, {{asset('images/events/'.$event->photo)}} 600w"
                                 sizes="(max-width: 1140px) 100vw, 940px"/>
                        </a>
                    </figure>
                    <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <a href="{{route('event.show',['id'=>$event->id])}}">{{ $event->title }}</a>
                            </h3>
                            <h5 class="doublef-event-item-date"><a href="{{route('profile',['id'=>$event->user->id])}}">Добавил: {{$event->user->name}} {{$event->user->surname}} </a></h5>
                            <h5 class="doublef-event-item-date">Дата проведения: {{ $event->event_date }} </h5>
                            <h5 class="doublef-event-item-time">Время проведения: {{ $event->event_hours }}</h5>
                            <div class="doublef-event-address">
                                Место проведения: {{ $event->address }}
                            </div>
                        </header>
                        <div class="entry-content">
                            <p>{{ $event->description }}
                                <a class="more-link button"  href="{{route('event.show',['id'=>$event->id])}}">Читать далее</a>
                            </p>
                            <span class="screen-reader-text">Продолжить чтение  {{ $event->title }}</span>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
    @endforeach
</section>
{{$user->events->links()}}
@else <h4>У пользователя нет событий</h4>
@endif
<div class="col-md-6 blog-right">
    <div>
        <h3>Последние события</h3>
        <ul>
            @foreach($lastEvents as $event)
            <li><a href="{{ route('event.show', ['id' => $event->id]) }}">{{ $event->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>	
</div>	
@endsection    
