@extends('layouts.app')
@section('title')
    О нас
@endsection
@section('content')
<head>
    <style>
     .ul li {display:inline} 
     </style>
</head>
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('home')}}">Главная</a> / Добавить
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--2-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-18" class="post-18 page type-page status-publish has-post-thumbnail hentry">
                    <div class="entry-content" style="margin-top: 15px">
                        <h4 style="text-align: center">Добавить</h4>
                        <ul class="ul" style="list-style-type:none">
                            <li id="menu-item-650" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-courses menu-item-650">
                                <a title="" href="{{route('user.event.create')}}"><label class="more-link button">Добавить событие</label>
                            </li>       
                            <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309">
                                <a href="{{ route('user.news.create') }}"><label class="more-link button">Добавить новость</label>
                            </li>
                            <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309">
                                <a href="{{ route('user.reports.create') }}"><label class="more-link button">Добавить отчёт</label>
                            </li>
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