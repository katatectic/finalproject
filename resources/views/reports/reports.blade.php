@extends('layouts.app')
@section('title')
    Отчёты
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="http://buntington2.wpshow.me/wp-content/uploads/2014/06/9510947151_ef1d3fdf52_b.jpg"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">Отчеты</h1>
                <p>Список всех отчетов</p>
            </div>
        </div>
    </div>
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / Отчеты
    </div>
    @if (count($reports) > 0)
    <section class="events">
        @foreach($reports as $report)
        <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
        <div class="grid"><!-- toast grid declaration -->
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
        {{ $reports->links() }}
    </section>
    @endif
</div>
@endsection