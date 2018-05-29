@extends('layouts.app')
@section('content')
<head>
    <style>
        .committees {display:flex;flex-wrap: wrap;}
        .committee {width: 220px; margin:20px;}
        a.consist {color:#18d220}
    </style>
</head>
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
                                            <a href="{{ route('oneCommittee',['id' => $committee->id]) }}" class="@if($user->studentsClasses->contains('pivot.student_class_id', $committee->id)) consist @endif">
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
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .grid-->
</div><!-- #content -->
@endsection