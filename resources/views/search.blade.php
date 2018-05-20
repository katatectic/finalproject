@extends('layouts.app')
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
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->address }}</td>
                            <td>{{ $event->event_hours }}</td>
                            <td><div style="max-height:120px;overflow-x:hidden">{{$event->description}}</div></td>
                            <td><div style="max-height:120px;overflow-x:hidden">{{$event->content}}</div></td>
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
                            <td>{{ $article->title }}</td>
                            <td><div style="max-height:120px;overflow-x:hidden">{{$event->content}}</div></td>
                            <td>
                                <a href="{{route('article', $article->id) }}" class="btn btn-info btn-xs"><i class="more-link button">Просмотр</i></a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
                @endif
            </div>
        </div>
    </div>
</div>@endsection  
</body>
</html>