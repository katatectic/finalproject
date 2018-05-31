@extends('layouts.app')
@section('title')
	Комитеты
@endsection
@section('content')
<head>
    <style>
        .committees {display:flex;flex-wrap: wrap;}
        .committee {width: 300px; margin:3px 20px;background: #f3f3f3;padding: 0 20px;border-radius: 10px;box-shadow: 0 0 10px rgba(0,0,0,0.5);}
        .committee a {display: block;width: 100%}
        .committee:hover {padding: 0 10px;border-radius: 30px;}
        a.consist {color:#18d220;}
    </style>
</head>
<div id="cinemahead">
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
	<div class="bread">
        <a href="{{route('main')}}">Главная</a> / Комитеты
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pg-425-1" class="panel-grid panel-no-style">
                            <div id="" class="">
                                <h2>Все комитеты</h2>
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
    </div>
</div>
@endsection