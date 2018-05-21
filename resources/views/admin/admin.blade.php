@extends('layouts.app')
@section('content')
<div id="content" class="site-content wrappr">
    <main id="main" class="site-main" role="main">
        <div><a href="{{route('adminnews')}}">Новости</a></div>
        <div><a href="{{route('adminevents')}}">События</a></div>
        <div><a href="{{route('adminAlbums')}}">Альбомы</a></div>
        <div><a href="{{route('admincomments')}}">Комментарии</a></div>
        @if (Auth::user()->role == 1)
        <div><a href="{{route('users')}}">Пользователи</a></div>
        <div><a href="{{route('adminfeedbacks')}}">Обратная связь</a></div>
        <div><a href="{{route('adminSliders')}}">Слайдеры</a></div>
        @endif
    </main>		
</div>
@endsection