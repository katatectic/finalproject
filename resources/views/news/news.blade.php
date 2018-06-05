@extends('layouts.app')
@section('title')
    Новости
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">            
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-category invert" data-url="{{asset('images/site/news.JPEG')}}" style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">                
            <div class="wrappr text-left">
                <h1 class="h-gigant">
                    @isset($committee)
                        Новости комитета {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса
                    @else
                        Все школьные новости!
                    @endif
                </h1>
                <p>Вы можете найти что-то интересное для себя. Особенно, если вы любите эту школу.</p>
            </div>           
        </div>         
    </div>    
    <div id="mobile-nav-container"></div>    
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> /
        @isset($committee)
            <a href="{{ route('oneCommittee',['id' => $committee->id]) }}">Комитет {{$classesNumbers()[$committee->id]}}-{{$committee->letter_class}} класса</a> /
        @endisset
        Новости
    </div>
    @if (count($all) > 0)   
    <section class="news">
        @foreach($all as $news)
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
        <div class="grid">
            <div id="primary" class="content-area grid__col grid__col--2-of-3 grid__col--m-1-of-1">    
                <main id="main" class="site-main" role="main">
                    <div class="article-wrapper layout-sleek">
                        <article id="post-35" class="post-35 post type-post status-publish format-standard has-post-thumbnail hentry category-news tag-galleries tag-meetings tag-school" style="margin-top: 30px;">
                            <figure class="post-thumbnail">
                                <a href="{{route('article',['id'=>$news->id])}}" title="{{ $news->title }}">
                                    <img width="1140" height="500"
                                         src="{{asset('images/news/'.$news->photo)}}"
                                         class="attachment-full size-full wp-post-image"
                                         alt=""
                                         srcset="{{asset('images/news/'.$news->photo)}} 1140w, {{asset('images/news/'.$news->photo)}} 600w"
                                         sizes="(max-width: 1140px) 100vw, 1140px"
                                         />
                                </a>
                            </figure>
                            <header class="entry-header">
                                <h3 class="entry-title">
                                    <a href="{{route('article',['id'=>$news->id])}}" rel="bookmark">{{$news->title}}</a></h3>
                                <h5 class="doublef-event-item-date">Добавил: <a href="{{route('profile',['id'=>$news->user->id])}}">{{$news->user->name}} {{$news->user->surname}}</a>
                                </h5>
                                <h5 class="doublef-event-item-date">{{date('j '.$monthNames[date('n', strtotime($news->date))].' Y года'.' в H:i', strtotime($news->date))}}</h5>
                            </header>
                            <div class="entry-content">
                                <p>{{$news->description}}
                                    <a class="more-link button" href="{{route('article', ['id'=>$news->id])}}">Читать далее...</a>
                                </p>
                                <span class="screen-reader-text">Продолжить чтение  {{ $news->title }}</span>
                            </div>
                        </article>
                    </div>
                </main>
            </div>
        </div>
        @endforeach
        {{$all->links()}}
    </section>
    @endif
</div>
@endsection