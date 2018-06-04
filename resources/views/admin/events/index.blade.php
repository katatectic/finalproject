@extends('layouts.admin')
@section('title')
	Список событий
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Пользователи</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Всего событий: {{$eventsCount}}</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('event.create')}}" class="btn btn-primary mb1 bg-orange">Добавить событие</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Руководитель</th>
                            <th>Комитет</th>
                            <th>Название события</th>
                            <th>Дата проведения</th>
                            <th>Время проведения</th>
                            <th>Адрес</th>
                            <th>Краткое описание</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}}</a></td>
                            <td>{{ $classesNumbers()[ $event->studentClass['id'] ] }} - {{$event->studentClass['letter_class']}}</td>
                            <td>{{str_limit($event->title, 10)}}</td>
                            <td>{{date('j '.$monthNames[date('n', strtotime($event->event_date))].' Y года', strtotime($event->event_date))}}</td>
                            <td>{{str_limit($event->event_hours, 7)}}</td>
                            <td><a href="https://www.google.com/maps/search/{{implode('+', explode(" ",$event->address))}}">{{$event->address}}</a></td>
                            <td>{{str_limit($event->description,10)}}</td>
                            <td>
                                @isset($event->photo)
                                    <div class="image-lightbox">
                                        <a href="{{asset('images/events/'.$event->photo)}}" data-lightbox="{{asset('images/events/'.$event->photo)}}" >
                                            <img width="100" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image"/>
                                        </a>
                                    </div>
                                @else
                                    Отсутствует
                                @endisset
                            </td>
                            <td>
                                <a href="{{route('event.show',['id'=>$event->id])}}" class="fa fa-eye"></a>
                                @if(Auth::user()->role == 1 || Auth::user()->studentsClasses->contains('id', $event->studentClass['id']))
                                    <a href="{{route('event.edit',['id'=>$event->id])}}" class="fa fa-pencil"></a>
                                    <a href="{{route('event.delete',$event->id)}}" onclick="return confirm('Удалить событие?')" class="fa fa-remove"></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>
            </div>
            {{$events->links()}}
        </div>
    </section>
</div>
<@endsection  
