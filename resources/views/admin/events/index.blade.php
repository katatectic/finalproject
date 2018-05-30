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
                            <th>Название события</th>
                            <th>Дата проведения</th>
                            <th>Время проведения</th>
                            <th>Адрес</th>
                            <th>Краткое описание</th>
                            <th>Картинка</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$event->user->id])}}">{{$event->user->name}}</a></td>
                            <td>{{$event->title}}</td>
                            <td>{{$event->event_date}}</td>
                            <td>{{$event->event_hours}}</td>
                            <td>{{$event->address}}</td>
                            <td>{{str_limit($event->description,20)}}</td>
                            <td>
                                <div class="image-lightbox">
                                    <a href="{{asset('images/events/'.$event->photo)}}" data-lightbox="{{asset('images/events/'.$event->photo)}}" >
                                        <img width="100" src="{{asset('images/events/'.$event->photo)}}" class="attachment-full size-full wp-post-image"/>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('event.show',['id'=>$event->id])}}" class="fa fa-eye"></a>
                                <a href="{{route('event.edit',['id'=>$event->id])}}" class="fa fa-pencil"></a>
                                <a href="{{route('event.delete',$event->id)}}" onclick="return confirm('Удалить событие?')" class="fa fa-remove"></a>
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
