@extends('layouts.app')
@section('title')
    О нас
@endsection
@section('content')
<div id="content" class="site-content wrappr">
    <div class="bread">
        <a href="{{route('home')}}">Главная</a> / Добавить
    </div>
    <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
    <div class="grid">
        <div id="primary" class="content-area grid__col grid__col--3-of-3">
            <main id="main" class="site-main" role="main">
                <article id="post-18" class="post-18 page type-page status-publish has-post-thumbnail hentry">
                    <div class="entry-content" style="margin-top: 15px;">						
                        <ul>Добавить
                            <li id="menu-item-650" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-courses menu-item-650">
                                <a title="" href="{{route('user.event.create')}}">Добавить событие</a>
                            </li>       
                            <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309">
                                <a href="{{ route('user.news.create') }}">Добавить новость</a>
                            </li>
                            <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309">
                                <a href="{{ route('user.reports.create') }}">Добавить отчет</a>
                            </li>
                        </ul>
                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
@endsection