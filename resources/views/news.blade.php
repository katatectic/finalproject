@extends('layouts.app')
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">            
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-category invert" data-url="http://buntington2.wpshow.me/wp-content/uploads/2018/03/pexels-photo-258353.jpeg" style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">                
            <div class="wrappr text-left">                    
                <h1 class="h-gigant">Все школьные новости!</h1>
                <p>Вы можете найти что-то интересное для себя. Особенно, если вы любите эту школу.</p>
            </div><!-- .wrappr -->                
        </div><!-- .buntington2-cinema -->            
    </div><!-- .buntington2-cinema-bg -->           
    <div id="mobile-nav-container"></div><!-- Small devices menu -->    
</div><!-- #cinemahead -->
<div id="content" class="site-content wrappr">
    @if (count($all) > 0)   
    <section class="news">
            @foreach($all as $news)
            <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
            <div class="grid"><!-- toast grid declaration -->
                <div id="primary" class="content-area grid__col grid__col--2-of-3 grid__col--m-1-of-1">    
                <main id="main" class="site-main" role="main">
                    <div class="article-wrapper layout-sleek"> 
                        <article id="post-35" class="post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-news tag-galleries tag-meetings tag-school">
                            <figure class="post-thumbnail">
                                <a href="{{route('article',['id'=>$news->id])}}" title="{{ $news->title }}">
                                    <img width="1140" height="500"
                                         src="{{asset('images/'.$news->photo)}}"
                                         class="attachment-full size-full wp-post-image"
                                         alt=""
                                         srcset="{{asset('images/'.$news->photo)}} 1140w, {{asset('images/'.$news->photo)}} 600w"
                                         sizes="(max-width: 1140px) 100vw, 1140px"/>
                                </a>
                            </figure>
                            <header class="entry-header">            
                                <h2 class="entry-title">
                                    <a href="{{route('article',['id'=>$news->id])}}" rel="bookmark">{{$news->title}}</a></h2>
                                <h3 class="doublef-event-item-date">Кто создал <a href="{{route('profile',['id'=>$news->user->id])}}">{{$news->user->name}} {{$news->user->surname}}</a>
                                </h3>
                                <h3 class="doublef-event-item-date">{{$news->date}} </h3>
                            </header><!-- .entry-header -->        
                            <div class="entry-content">            
                                <p>{{$news->content}}
                                    <a class="more-link button" href="{{route('article', ['id'=>$news->id])}}">Читать далее...</a>
                                </p>
                                <span class="screen-reader-text">Продолжить чтение  {{ $news->title }}</span>
                            </div><!-- .entry-content -->        
                        </article><!-- #post-35 -->                   
                    </div>
                </main>
            </div>
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

            function getNews(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.news').html(data);
                }).fail(function () {
                    alert('News could not be loaded.');
                });
            }
        });
    </script>

</div>

@endsection