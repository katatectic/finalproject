@extends('layouts.app')
@section('title')
    О нас
@endsection
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">
        <div class="element-gradient buntington2-cinema buntington2-cinema-page invert" data-url="{{asset('images/site/about.jpg')}}" style="background-position: center center; padding-top: 350px; padding-bottom: 40px;">
            <div class="wrappr text-left">
                <h1 class="h-gigant">Список комитетов школы № 25</h1>
                <p>Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации форм развития.</p>
            </div>
        </div>
    </div>
    <div id="mobile-nav-container"></div>
</div>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('home')}}">Главная</a> / О нас
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-18" class="post-18 page type-page status-publish has-post-thumbnail hentry">
                    <div class="entry-content" style="margin-top: 15px;">
                        <h4>Мы рады приветствовать Вас на странице родительского комитета.</h4>
                        <p>Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения существенных финансовых и административных условий. Повседневная практика показывает, что сложившаяся структура организации требуют от нас анализа модели развития. Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения соответствующий условий активизации. Не следует, однако забывать, что рамки и место обучения кадров играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач.</p>
                        <p>Не следует, однако забывать, что сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям. С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий. Задача организации, в особенности же реализация намеченных плановых заданий требуют от нас анализа модели развития.</p>
                        <h4>Перечень родительских комитетов в школе.</h4>
                        <i><a href="{{ route('allCommittees') }}">Список всех комитетов</a></i>
                        <ul>
                            @foreach ($committees->random($rand) as $committee)
                            <li>
                                <a href="{{ route('oneCommittee',['id' => $committee->id]) }}">
                                    {{$classesNumbers()[$committee->id]}} - {{$committee->letter_class}} класс
                                </a>
                            </li>
                            @endforeach
                        </ul>
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