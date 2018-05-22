@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Результаты поиска</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <h1>Найдено событий: {{count($events)}}</h1>
                @if (count($events) > 0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Адрес</th>
                            <th>Время</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->title }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->address }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->event_hours }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{str_limit($event->description,20)}}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{str_limit($event->content,20)}}</a></td>
                            <td>
                                <a href="{{route('event.show', $event->id) }}" class="fa fa-eye"></a>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>
                @endif
            </div>
            {{$events->links()}}
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <h1>Найдено новостей: {{count($news)}}</h1>
                @if (count($news) > 0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $article)
                        <tr>
                            <td><a href="{{route('article',['id'=>$article->id])}}">{{ $article->title }}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}">{{str_limit($article->content,20)}}</a></td>
                            <td></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}" class="fa fa-eye"></a></tr>
                        @endforeach
                        </tfoot>
                </table>
                @endif
            </div>
            {{$news->links()}}
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <h1>Найдено пользователей: {{count($users)}}</h1>
                @if (count($users) > 0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Отчество</th>
                            <th>Почта</th>
                            <th>Телефон</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                            <td><a href="{{route('profile',['id'=>$user->id])}}">{{ $user->surname }}</a></td>
                            <td><a href="{{route('profile',['id'=>$user->id])}}">{{ $user->middle_name }}</a></td>
                            <td><a href="{{route('profile',['id'=>$user->id])}}">{{ $user->email }}</a></td>
                            <td><a href="{{route('profile',['id'=>$user->id])}}">{{ $user->phone }}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}" class="fa fa-eye"></a></tr>
                        @endforeach
                        </tfoot>
                </table>
                @endif
            </div>
            {{$users->links()}}
        </div>
    </section>
</div>
@endsection  