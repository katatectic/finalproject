@extends('layouts.app')
@section('title')
Протокол № {{ $report->id }} от {{ $report->date }}
@endsection
@section('content')
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('main')}}">Главная</a> / 
        <a href="{{route('reports')}}">Отчеты</a> /
        Протокол № {{ $report->id }} от {{ $report->date }}
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                @if($report)
                <article id="post-519" class="post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events">                    
                    <header class="entry-header">
                        <h3 class="entry-title">Протокол № {{ $report->id }} от {{ $report->date }}</h3>
                        <div class="addthis_inline_share_toolbox"></div>
                        <h5 class="doublef-event-item-date">
                            Добавил: <a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}} {{$report->user->surname}} </a>
                        </h5>
                        <h5 class="doublef-event-item-date">{{$report->date}}</h5>
                    </header>
                    <div class="entry-content">
                        <p>{{$report->content}}</p>
                    </div>
                    <h5>Платежные чеки</h5>
                    <div class="image-lightbox">
                        <a href="{{asset('images/reports/'.$report->pay_check)}}" data-lightbox="{{asset('images/reports/'.$report->pay_check)}}">
                            <img width="300" height="300" src="{{asset('images/reports/'.$report->pay_check)}}" class="attachment-full size-full wp-post-image"/>
                        </a>
                    </div>	
                    @if (Auth::user())
                    @if (Auth::user()->role == 1 or Auth::user()->role == 2)
                    <a href="{{ route('admin.report.edit',['id'=>$report->id]) }}" class="more-link button">Редактировать отчёт</a>
                    <a href="{{route('admin.report.destroy',['id'=>$report->id])}}" style=""onclick="return confirm('Удалить отчёт?')" class="more-link button">Удалить отчёт</a>
                    @endif
                    @endif
                </article>
                @endif
                <div class="col-md-6 blog-right">
                    <div>
                        <h3>Последние отчёты</h3>
                        <ul>
                            @foreach($lastReports as $reports)
                            <li><a href="{{ route('report.show', ['id' => $reports->id]) }}">Протокол № {{ $reports->id }} от {{ $reports->date }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('reports.comments')
            </main>     
        </div>            
    </div>
</script>
</div>
@endsection