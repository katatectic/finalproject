@extends('layouts.app')
@section('title')
    Комитеты
@endsection
@section('content')
<div id="cinemahead">
	<div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-doublef-events invert"
             data-url="{{asset('images/site/events.jpg')}}"
             style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">
                       Список всех комитетов
                </h1>
            </div>
        </div>
    </div>
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr indexCommittees">
	<div class="bread">
        <a href="{{route('main')}}">Главная</a> / Комитеты
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-425" class="post-425 page type-page status-publish hentry">
                    <div id="pl-425" class="panel-layout">
                        <div id="pg-425-0" class="panel-grid panel-has-style">
                            <div class="panel-row-style panel-row-style-for-425-0">
                                <div id="pgc-425-0-0" class="panel-grid-cell">
                                    <div id="panel-425-0-0-0"
                                         class="so-panel widget widget_buntington2-slider-widget panel-first-child panel-last-child"
                                         data-index="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pg-425-1" class="panel-grid panel-no-style">
                            <div id="" class="">
                                <h2>Все комитеты</h2>
                                @if($committees->total() > $committees->count())
                                    <ul class="pagination">
                                        <li><a href="{{$committees->previousPageUrl()}}" >Активные комитеты</a></li>
                                        <li><a href="{{$committees->nextPageUrl()}}" >Закрытые комитеты</a></li>
                                    </ul>
                                @endif
                                <div id="" class="committees">
                                    @foreach ($committees as $committee)
                                        <div class="committee">
                                            <a href="{{ route('oneCommittee',['id' => $committee->id]) }}" class="@if($user != '') @if($user->studentsClasses->contains('pivot.student_class_id', $committee->id)) consist @endif @endif">
                                                {{$classesNumbers()[$committee->id]}}
                                                {{$committee->letter_class}} (Участников: {{$committee->user_count}})
                                                @if($user != '') @if($user->studentsClasses->contains('pivot.student_class_id', $committee->id)) Состоите @endif @endif
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
        <div id="primary" class="content-area grid__col grid__col--1-of-3">
            @include('widget')
        </div>
    </div>
</div>
@endsection