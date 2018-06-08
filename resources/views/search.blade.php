@extends('layouts.app')
@section('title')
	Поиск
@endsection
@section('content')
<div id="content" class="site-content wrappr">
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
                            <th>Автор события</th>
                            <th>Дата проведения</th>
                            <th>Адрес</th>
                            <th>Краткое описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->title }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{$event->user->name}} {{$event->user->surname}}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{date('j '.$monthNames[date('n', strtotime($event->event_date))].' Y года', strtotime($event->event_date))}}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{ $event->address }}</a></td>
                            <td><a href="{{route('event.show', $event->id) }}">{{str_limit($event->description,20)}}</a></td>
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
                            <th>Автор новости</th>
                            <th>Дата новости</th>
                            <th>Краткое описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $article)
                        <tr>
                            <td><a href="{{route('article',['id'=>$article->id])}}">{{ $article->title }}</a></td>
                            <td><a href="{{route('article',['id'=>$article->id])}}">{{$article->user->name}} {{$article->user->surname}}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}">{{date('j '.$monthNames[date('n', strtotime($article->date))].' Y года'.' в H:i', strtotime($article->date))}}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}">{{str_limit($article->content,20)}}</a></td>
                            <td><a href="{{route('article', ['id'=>$article->id])}}" class="btn btn-info btn-xs"><i class="more-link button">Просмотр</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
                @endif
            </div>
            <div class="panel-body">
                Найдено отчётов {{count($reports)}}
                @if (count($reports) > 0)
                <table class="table table-responsive" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Название</th>
                            <th>Автор отчёта</th>
                            <th>Краткое описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td><a href="{{route('report.show',['id'=>$report->id])}}">Протокол № {{ $report->id }} от {{date('j '.$monthNames[date('n', strtotime($report->created_at))].' Y года', strtotime($report->created_at))}}</a></td>
                            <td><a href="{{route('report.show',['id'=>$report->id])}}">{{$report->user->name}} {{$report->user->surname}}</a></td>
                            <td><a href="{{route('report.show',['id'=>$report->id])}}">{{str_limit($report->content,20)}}</a></td>
                            <td><a href="{{route('report.show',['id'=>$report->id])}}" class="btn btn-info btn-xs"><i class="more-link button">Просмотр</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $reports->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection  