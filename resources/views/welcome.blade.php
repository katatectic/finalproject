@extends('layouts.app')
@section('content')

    <div id="cinemahead">
        <div id="mobile-nav-container"></div><!-- Small devices menu -->
    </div><!-- #cinemahead -->
    <div id="content" class="site-content wrappr">
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
        <div class="grid"><!-- toast grid declaration -->
            <div id="primary" class="content-area grid__col grid__col--3-of-3">
                <main id="main" class="site-main" role="main">
                    <article id="post-425" class="post-425 page type-page status-publish hentry">
                        <div id="pl-425" class="panel-layout">
                            <div id="pg-425-0" class="panel-grid panel-has-style">
                                <div class="panel-row-style panel-row-style-for-425-0">
                                    <div id="pgc-425-0-0" class="panel-grid-cell">
                                        <div id="panel-425-0-0-0"
                                             class="so-panel widget widget_buntington2-slider-widget panel-first-child panel-last-child"
                                             data-index="0">
                                            <div class="so-widget-buntington2-slider-widget so-widget-buntington2-slider-widget-base">
                                                <div id="swiper-1514403464" class="swiper-container"
                                                     style="height: 600px;"><!-- Slider main container -->
                                                    <!-- wrapper -->
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide"
                                                             style="background: #000000 url( http://buntington2.wpshow.me/wp-content/uploads/2014/06/8724862214_8e0a683196_b.jpg ) no-repeat top center; background-size: cover;">
                                                            <div data-swiper-parallax="-300"
                                                                 data-swiper-parallax-duration="500"
                                                                 class="swiper-slide-content"
                                                                 style="vertical-align: bottom;">
                                                                <div class="clide-content-wrappr invert"
                                                                     style="margin: 0px 0px 0px 0px; padding: 60px; background: rgba( 0,0,0,0.3 );">
                                                                    <h3>Это первый хороший слайд!</h3>
                                                                    <p class="remove-margin-bottom">Не следует, однако забывать, что укрепление и развитие структуры.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide"
                                                             style="background: #000000 url( http://buntington2.wpshow.me/wp-content/uploads/2014/06/8425536360_8d60723f65_b.jpg ) no-repeat top center; background-size: cover;">
                                                            <div data-swiper-parallax="-300"
                                                                 data-swiper-parallax-duration="500"
                                                                 class="swiper-slide-content"
                                                                 style="vertical-align: bottom;">
                                                                <div class="clide-content-wrappr invert"
                                                                     style="margin: 0px 0px 0px 0px; padding: 60px; background: rgba( 0,0,0,0.3 );">
                                                                    <h3>Это второй хороший слайд!</h3>
                                                                    <p class="remove-margin-bottom">Разнообразный и богатый опыт постоянное информационно-пропагандистское.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide"
                                                             style="background: #000000 url( http://buntington2.wpshow.me/wp-content/uploads/2014/06/11980066934_0df2439628_b.jpg ) no-repeat top center; background-size: cover;">
                                                            <div data-swiper-parallax="-300"
                                                                 data-swiper-parallax-duration="500"
                                                                 class="swiper-slide-content"
                                                                 style="vertical-align: bottom;">
                                                                <div class="clide-content-wrappr invert"
                                                                     style="margin: 0px 0px 0px 0px; padding: 60px; background: rgba( 0,0,0,0.3 );">
                                                                    <h3>Это третий хороший слайд!</h3>
                                                                    <p class="remove-margin-bottom">Значимость этих проблем настолько очевидна, что постоянное.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide"
                                                             style="background: #000000 url( http://buntington2.wpshow.me/wp-content/uploads/2014/06/9735272477_9f8b8a81e3_b.jpg ) no-repeat top center; background-size: cover;">
                                                            <div data-swiper-parallax="-300"
                                                                 data-swiper-parallax-duration="500"
                                                                 class="swiper-slide-content"
                                                                 style="vertical-align: bottom;">
                                                                <div class="clide-content-wrappr invert"
                                                                     style="margin: 0px 0px 0px 0px; padding: 60px; background: rgba( 0,0,0,0.3 );">
                                                                    <h3>Это четвертый хороший слайд!</h3>
                                                                    <p class="remove-margin-bottom">Не следует, однако забывать, что сложившаяся структура.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- navigation buttons -->
                                                    <div class="button-prev" style="color: #ffffff;"><i
                                                                class="fa fa-chevron-left"></i></div>
                                                    <div class="button-next" style="color: #ffffff;"><i
                                                                class="fa fa-chevron-right"></i></div>
                                                </div><!-- END Slider main container -->

                                                <script language="javascript">
                                                    jQuery('#swiper-1514403464').css('visibility', 'hidden');
                                                    jQuery(document).ready(function () {
                                                        var mySwiper = new Swiper('#swiper-1514403464', {
                                                            // Optional parameters
                                                            height: 600,
                                                            // sliding effect
                                                            effect: 'slide',
                                                            // slider_autoplay
                                                            // parallax?
                                                            parallax: true,
                                                            // navigation
                                                            navigation: {
                                                                nextEl: '.button-next',
                                                                prevEl: '.button-prev',
                                                            },
                                                            // pagination dots
                                                            pagination: {
                                                                el: '.swiper-pagination',
                                                                type: 'bullets',
                                                                clickable: true,
                                                                renderBullet: function (index, className) {
                                                                    return '<span class="' + className + '" style="background-color: #ffffff;"></span>';
                                                                },
                                                            },
                                                            // uniterrupted loop of slides
                                                            loop: true,
                                                        });
                                                        jQuery('#swiper-1514403464').css('visibility', 'visible');
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pg-425-1" class="panel-grid panel-no-style">
                                <div id="pgc-425-1-0" class="panel-grid-cell">
                                    <div class="panel-cell-style panel-cell-style-for-425-1-0">
                                        <div id="panel-425-1-0-0"
                                             class="so-panel widget widget_buntington2-news-list panel-first-child"
                                             data-index="1">
                                            <div class="panel-widget-style panel-widget-style-for-425-1-0-0">
                                                <div class="so-widget-buntington2-news-list so-widget-buntington2-news-list-base">
                                                    <h2 class="widget-title">Последние новости</h2>
                                                    <div class="news-list-widget-wrap" style="text-align: left;">
                                                        <div class="news-list-item news-list-left has-separator-line-top">
                                                            <figure class="post-thumbnail news-list-item-featured-image">
                                                                <a href="{{route('article')}}">
                                                                    <img width="1140" height="500"
                                                                         src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg"
                                                                         class="attachment-35 size-35 wp-post-image"
                                                                         alt="" large=""
                                                                         srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b-600x263.jpg 600w"
                                                                         sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                                </a>
                                                            </figure>
                                                            <div class="news-list-item-elements ">
                                                                <h2 class="entry-title news-list-item-title">
                                                                    <a href="{{route('article')}}"
                                                                       rel="bookmark">Это первая новость!</a>
                                                                </h2>
                                                                <div class="entry-meta">
                                                                    <ul class="post-meta-wrapper ul-horizontal-list">
                                                                        <li class="post-meta-date">
                                                                          <time class="entry-date published" datetime="2018-02-26T12:47:49+00:00">Feb 26, 2018</time> 
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div><!-- .news-list-item-elements -->
                                                        </div><!-- .news-list-item -->
                                                        <div class="news-list-item news-list-left has-separator-line-top">
                                                            <figure class="post-thumbnail news-list-item-featured-image">
                                                                <a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/">
                                                                    <img width="1140" height="500"
                                                                         src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg"
                                                                         class="attachment-35 size-35 wp-post-image"
                                                                         alt="" large=""
                                                                         srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b-600x263.jpg 600w"
                                                                         sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                                </a>
                                                            </figure>
                                                            <div class="news-list-item-elements ">
                                                                <h2 class="entry-title news-list-item-title">
                                                                    <a href="{{route('article')}}"
                                                                       rel="bookmark">Это вторая новость!</a>
                                                                </h2>
                                                                <div class="entry-meta">
                                                                    <ul class="post-meta-wrapper ul-horizontal-list">
                                                                        <li class="post-meta-date">
                                                                            <a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/"
                                                                               rel="bookmark">
                                                                                <time class="entry-date published"
                                                                                      datetime="2018-02-26T12:47:49+00:00">
                                                                                    Feb 26, 2018
                                                                                </time>
                                                                                <time class="updated"
                                                                                      datetime="2018-04-12T16:59:47+00:00">
                                                                                    Apr 12, 2018
                                                                                </time>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div><!-- .news-list-item-elements -->
                                                        </div><!-- .news-list-item -->
                                                    </div><!-- .news-list-widget-wrap-->
                                                </div>
                                            </div>
                                        </div>
                                        <div id="panel-425-1-0-1"
                                             class="so-panel widget widget_doublef-featured-gallery panel-last-child"
                                             data-index="2">
                                            <div class="so-widget-doublef-featured-gallery so-widget-doublef-featured-gallery-base">
                                                <h2 class="widget-title">Избранная галлерея</h2>
                                                <div class="doublef-gallery-widget-wrap">
                                                    <figure class="post-thumbnail">
                                                        <a href="http://buntington2.wpshow.me/doublef-gallery/school-photo-shots/"
                                                           title="School Photo Shots">
                                                            <img width="1140" height="500"
                                                                 src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b.jpg"
                                                                 class="attachment-full size-full wp-post-image" alt=""
                                                                 srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/14093140180_40cc891232_b-600x263.jpg 600w"
                                                                 sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                        </a>
                                                    </figure>
                                                    <div class="doublef-gallery-title-wrap">
                                                        <h2 class="doublef-gallery-title">
                                                            <a href="http://buntington2.wpshow.me/doublef-gallery/school-photo-shots/"
                                                               title="School Photo Shots">Нужна ли, хрен ее знает</a>
                                                        </h2>
                                                        <h5 class="doublef-gallery-photos-num">11 фото</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Закончился левый сайдбар с новостями + галерея внизу -->

                                <div id="pgc-425-1-1" class="panel-grid-cell">
							
                                    <div class="panel-cell-style panel-cell-style-for-425-1-1">
                                        <div id="panel-425-1-1-0"
                                             class="so-panel widget widget_doublef-event-posts-widget panel-first-child panel-last-child"
                                             data-index="3">
                                            <div class="so-widget-doublef-event-posts-widget so-widget-doublef-event-posts-widget-base">
                                                <h2 class="widget-title">Следующие мероприятия</h2>
                                                <div class="doublef-event-posts-layout_2">
													@foreach($events as $event)
                                                    <article id="post-519"
                                                             class="layout_2 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">
                                                        <figure class="post-thumbnail">
                                                            <a href="{{ route('event',['id'=>$event->id]) }}"
                                                               title="Newcomers welcome party">
                                                                <img width="1140" height="500"
                                                                     src="{{asset('images/'.$event->photo)}}"
                                                                     class="attachment-full size-full wp-post-image"
                                                                     alt=""
                                                                     srcset="{{asset('images/'.$event->photo)}} 1140w, {{asset('images/'.$event->photo)}} 600w"
                                                                     sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                            </a>
                                                        </figure>
                                                        <div class="doublef-events-content-wrap">
                                                            <header class="entry-header">
                                                                <h2 class="entry-title">
                                                                    <a href="{{ route('event',['id'=>$event->id]) }}">{{$event->title}}</a>
                                                                </h2>
																<p class="doublef-event-item-date">Глава {{$event->author_id}}</p>
                                                                <p class="doublef-event-item-date">Дата {{$event->event_date}}</p>
                                                                <p class="doublef-event-item-time">Время {{$event->event_hours}}</p>
                                                                <div class="doublef-event-address">Адрес {{$event->address}}
																<a class="more-link button"  href="{{ route('event',['id'=>$event->id]) }}">Читать далее</a>
                                                                </div><!-- .doublef-event-address -->
                                                            </header><!-- .entry-header -->
                                                        </div><!-- custom/inline style wrapper -->
                                                    </article>
													@endforeach
													{{$events->links()}}<!-- #post-519 -->
                                                </div><!-- .doublef-event-posts-* -->
                                            </div>
                                        </div>
                                    </div>
									
                                </div>

                                <!-- Закончился блок в середине -->

                                <div id="pgc-425-1-2" class="panel-grid-cell">
                                    <div class="panel-cell-style panel-cell-style-for-425-1-2">
                                        <div id="panel-425-1-2-0"
                                             class="so-panel widget widget_doublef-courses-search panel-first-child"
                                             data-index="4">
                                            <div class="so-widget-doublef-courses-search so-widget-doublef-courses-search-base">
                                                <h2 class="widget-title">Что-то будем искать?</h2>
                                                <form role="search" method="get" id="course-finder"
                                                      class="search-form one-field-submit"
                                                      action="http://buntington2.wpshow.me/">
                                                    <label>
                                                        <span class="screen-reader-text">Что-нибудь поищи...</span>
                                                        <input type="search" class="search-field"
                                                               placeholder="Поищи..."
                                                               value="" name="s"
                                                               title="Find a course..."/>
                                                        <input type="hidden" name="post_type" value="doublef-course"/>
                                                    </label>
                                                    <input type="submit" class="search-submit" value="Go"/>
                                                </form>
                                                <p class="doublef-courses-search-help">Здесь всякая муть.</p>
                                            </div>
                                        </div>
                                        <div id="panel-425-1-2-1"
                                             class="so-panel widget widget_buntington2-button-banner" data-index="5">
                                            <div class="panel-widget-style panel-widget-style-for-425-1-2-1">
                                                <div class="so-widget-buntington2-button-banner so-widget-buntington2-button-banner-base">
                                                    <h2 class="widget-title">Полезные ссылки</h2>
                                                    <a href="http://www.mon.gov.ua/"
                                                       target="_self" class="button-banner-link">
                                                        <div class="button-banner-wrapper" style="background-color: #5dca9d; ; text-align: left; padding: 20px 20px 20px 20px;">
                                                            <div class="button-banner-text">
                                                                <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> Министерство образования и науки Украины</h2>
                                                                <div class="button-banner-tagline" style="color: #FFFFFF;">Ссылка на сайт МОН </div>
                                                            </div>
                                                            <div class="dbb-hover-canvas"></div>
                                                        </div>
                                                    </a>
                                                    <a href="http://testportal.gov.ua/"
                                                       target="_self" class="button-banner-link" style="margin-top: 10px;">
                                                        <div class="button-banner-wrapper" style="background-color: #b9becd; ; text-align: left; padding: 20px 20px 20px 20px;">
                                                            <div class="button-banner-text">
                                                                <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> УЦОЯО</h2>
                                                                <div class="button-banner-tagline"
                                                                     style="color: #FFFFFF;">Ссылка на сайт УЦОЯО
                                                                </div>
                                                            </div>
                                                            <div class="dbb-hover-canvas"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .grid-->
    </div><!-- #content -->
@endsection