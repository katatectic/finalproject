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
<div id="content" class="site-content wrappr"  style="text-align: center; margin-top: 20px;">    
<div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
    <div class="grid"><!-- toast grid declaration -->
        <div id="primary" class="content-area grid__col grid__col--2-of-3 grid__col--m-1-of-1">    
            <main id="main" class="site-main" role="main">
                <div class="article-wrapper layout-sleek"> 
                    <article id="post-35" class="post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-news tag-galleries tag-meetings tag-school">
                        <figure class="post-thumbnail">
                            <a href="{{route('article', '$id')}}" title="Great school post with image gallery inserted">
                                <img width="1140" height="500" src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b-600x263.jpg 600w" sizes="(max-width: 1140px) 100vw, 1140px" />
                            </a>
                        </figure>
                        <header class="entry-header">            
                            <h2 class="entry-title"><a href="{{route('article', '$id')}}" rel="bookmark">Вот первая новость</a></h2>
                            <div class="entry-meta">                
                                <ul class="post-meta-wrapper ul-horizontal-list">
                                    <li class="post-meta-author">
                                        <span class="author vcard author_name">
                                            <a class="url fn n" href="#">admin@school</a>
                                        </span>
                                    </li>
                                    <li class="post-meta-date">
                                        <a href="#" rel="bookmark">
                                            <time class="entry-date published" datetime="2018-02-26T12:47:49+00:00">26-ое февраля, 2018 г.</time>
                                        </a>
                                    </li>
                                    <li class="post-meta-comments">
                                        <a href="#">1 комментарий</a>
                                    </li>
                                </ul>                    
                            </div><!-- .entry-meta --> 
                        </header><!-- .entry-header -->        
                        <div class="entry-content">            
                            <p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст.
                                <a class="more-link button" href="{{route('article', '$id')}}">Читать далее...</a>
                            </p>
                            <span class="screen-reader-text">Continue reading "Great school post with image gallery inserted"</span>
                        </div><!-- .entry-content -->        
                    </article><!-- #post-35 -->
                    <article id="post-35" class="post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-news tag-galleries tag-meetings tag-school">
                        <figure class="post-thumbnail">
                            <a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/" title="Great school post with image gallery inserted">
                                <img width="1140" height="500" src="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg" class="attachment-full size-full wp-post-image" alt="" srcset="http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b.jpg 1140w, http://buntington2.wpshow.me/wp-content/uploads/2014/06/8748862640_01cd0eb9b8_b-600x263.jpg 600w" sizes="(max-width: 1140px) 100vw, 1140px" />
                            </a>
                        </figure>
                        <header class="entry-header">            
                            <h2 class="entry-title"><a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/" rel="bookmark">Вот вторая новость</a></h2>
                            <div class="entry-meta">                
                                <ul class="post-meta-wrapper ul-horizontal-list">
                                    <li class="post-meta-author">
                                        <span class="author vcard author_name">
                                            <a class="url fn n" href="http://buntington2.wpshow.me/author/adminschool/">admin@school</a>
                                        </span>
                                    </li>
                                    <li class="post-meta-date">
                                        <a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/" rel="bookmark">
                                            <time class="entry-date published" datetime="2018-02-26T12:47:49+00:00">26-ое февраля, 2018 г.</time>
                                        </a>
                                    </li>
                                    <li class="post-meta-comments">
                                        <a href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/#comments">1 комментарий</a>
                                    </li>
                                </ul>                    
                            </div><!-- .entry-meta --> 
                        </header><!-- .entry-header -->        
                        <div class="entry-content">            
                            <p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст.
                                <a class="more-link button" href="http://buntington2.wpshow.me/news/great-post-with-image-gallery-inserted/">Читать далее...</a>
                            </p>
                            <span class="screen-reader-text">Continue reading "Great school post with image gallery inserted"</span>
                        </div><!-- .entry-content -->        
                    </article><!-- #post-35 -->
                </div>
            </main>
        </div>
    </div>
</div>

@endsection