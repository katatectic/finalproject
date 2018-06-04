@extends('layouts.app')
@section('title')
    Поиск
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>Результаты поиска</p>
            </div>
            <div class="panel-body">
                Найдено событий {{count($events)}}
                @if (count($events) > 0)
                <table class="table table-responsive" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Название</th>
                            <th>Адрес</th>
                            <th>Время</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->title }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->address }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->event_hours }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{str_limit($event->description,20)}}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{str_limit($event->content,20)}}</a></td>
                            <td>
                                <a href="{{route('event.show', $event->id) }}" class="btn btn-info btn-xs"><i class="more-link button">Просмотр</i></a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $events->links() }}
                @endif
            </div>
            <div class="panel-body">
                Найдено новостей {{count($news)}}
                @if (count($news) > 0)
                <table class="table table-responsive" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Название</th>
                            <th>Полное описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $article)
                        <tr>
                            <td><a href="{{route('article',['id'=>$article->id])}}">{{ $article->title }}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}">{{str_limit($article->content,20)}}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}" class="btn btn-info btn-xs"><i class="more-link button">Просмотр</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection  