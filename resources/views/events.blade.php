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
    </div><!-- #cinemahead -->

    <div id="content" class="site-content wrappr">
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
        <div class="grid"><!-- toast grid declaration -->
            <div id="primary" class="content-area grid__col grid__col--3-of-3">
                <main id="main" class="site-main" role="main">
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;">
                        <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <a href="{{route('event')}}"
                               title="Newcomers welcome party">
                               <img width="1140" height="500"
                                    src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h.jpg"
                                    class="attachment-full size-full wp-post-image"
                                    alt=""
                                    srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h-600x263.jpg 600w"
                                    sizes="(max-width: 1140px) 100vw, 1140px"/>
                                </a>
                        </figure>
                        <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="{{route('event')}}">Собрание родительского комитета 5-А класса</a>
                                </h2>
                                <h3 class="doublef-event-item-date">5 Января, 2018 </h3>
                                <h3 class="doublef-event-item-time">16:00-17:30</h3>
                                <div class="doublef-event-address">
                                    Класс 27, 3-ий этаж
                                </div><!-- .doublef-event-address -->
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <p>На повестке дня вопросы выпускного, поведения и денег бы...
                                    <a class="more-link button"  href="{{route('event')}}">Читать далее</a>
                                </p>
                                <span class="screen-reader-text">Continue reading "Newcomers welcome party"</span>
                            </div><!-- .entry-content -->
                        </div><!-- .post-text-block -->
                    </article><!-- #post-519 -->
                    <article id="post-519"
                             class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events"
                             style="margin-top: 15px; margin-bottom: 15px;">
                        <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <a href="http://buntington2.wpshow.me/doublef-event/newcomers-welcome-party/"
                               title="Newcomers welcome party">
                               <img width="1140" height="500"
                                    src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h.jpg"
                                    class="attachment-full size-full wp-post-image"
                                    alt=""
                                    srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/13069143783_c1580628f3_h-600x263.jpg 600w"
                                    sizes="(max-width: 1140px) 100vw, 1140px"/>
                                </a>
                        </figure>
                        <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="http://buntington2.wpshow.me/doublef-event/newcomers-welcome-party/">Собрание родительского комитета 11-Е класса</a>
                                </h2>
                                <h3 class="doublef-event-item-date">25 Февраля, 2018 </h3>
                                <h3 class="doublef-event-item-time">17:00-18:30</h3>
                                <div class="doublef-event-address">
                                    Класс 13, 1-ый этаж
                                </div><!-- .doublef-event-address -->
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <p>На повестке дня вопросы выпускного, поведения и денег бы...
                                    <a class="more-link button"  href="http://buntington2.wpshow.me/doublef-event/newcomers-welcome-party/">Читать далее</a>
                                </p>
                                <span class="screen-reader-text">Continue reading "Newcomers welcome party"</span>
                            </div><!-- .entry-content -->
                        </div><!-- .post-text-block -->
                    </article><!-- #post-519 -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .grid-->
    </div><!-- #content -->

@endsection