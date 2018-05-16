@extends('layouts.app')
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="http://buntington2.wpshow.me/wp-content/uploads/2014/06/9510947151_ef1d3fdf52_b.jpg"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">Ближайшие события</h1>
                <p>Список всех событий.</p>
            </div><!-- .wrappr -->
        </div><!-- .buntington2-cinema -->
    </div><!-- .buntington2-cinema-bg -->
    <div id="mobile-nav-container"></div><!-- Small devices menu -->
</div>
<div id="content" class="site-content wrappr">
    @if (count($all) > 0)
    <section class="events">
        @foreach($all as $event)
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
        <div class="grid"><!-- toast grid declaration -->
            <div id="primary" class="content-area grid__col grid__col--3-of-3">
                <main id="main" class="site-main" role="main">
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;">
                        <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <a href="{{route('event',['id'=>$event->id])}}"
                               title="{{ $event->title }}">
                                <img width="1140" height="500"
                                     src="{{asset('images/'.$event->photo)}}"
                                     class="attachment-full size-full wp-post-image"
                                     alt=""
                                     srcset="{{asset('images/'.$event->photo)}} 1140w, {{asset('images/'.$event->photo)}} 600w"
                                     sizes="(max-width: 1140px) 100vw, 1140px"/>
                            </a>
                        </figure>
                        <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="{{route('event',['id'=>$event->id])}}">{{ $event->title }}</a>
                                </h2>
                                <h3 class="doublef-event-item-date">Кто создал {{$event->user->name}} {{$event->user->name}} </h3>
                                <h3 class="doublef-event-item-date">{{ $event->event_date }} </h3>
                                <h3 class="doublef-event-item-time">{{ $event->event_hours }}</h3>
                                <div class="doublef-event-address">
                                    {{ $event->address }}
                                </div><!-- .doublef-event-address -->
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <p>{{ $event->description }}
                                    <a class="more-link button"  href="{{ route('event',['id'=>$event->id]) }}">Читать далее</a>
                                </p>
                                <span class="screen-reader-text">Продолжить чтение  {{ $event->title }}</span>
                            </div><!-- .entry-content -->
                        </div><!-- .post-text-block -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
        @endforeach
        {{ $all->links() }}
    </section>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
$(function () {
    $('body').on('click', '.pagination a', function (e) {
        e.preventDefault();
        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
        var url = $(this).attr('href');
        getEvents(url);
        window.history.pushState("", "", url);
    });

    function getEvents(url) {
        $.ajax({
            url: url
        }).done(function (data) {
            $('.events').html(data);
        }).fail(function () {
            alert('Evens could not be loaded.');
        });
    }
});
    </script>
</div><!-- #content -->
@endsection