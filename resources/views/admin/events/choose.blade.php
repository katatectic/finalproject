@extends('layouts.admin')
@section('title')
	События за {{$thisYear}} года 
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Пользователи</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
							<div class="form-group">
                    <form method="POST" action="{{route('event.admin.choose')}}">
                        {{ csrf_field() }}
                        <div class="col-md-5">
                            <select name="month" class="form-control">
                                @foreach (range(1,12) as $month)
                                    <option value="{{$month}}">{{$monthNames[$month]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="year" class="form-control">
                                @foreach (range($thisYear,2000) as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" id="subbut" class="btn btn-primary mb1 bg-orange">Найти событие</button>
                    </form>
                </div>
				 @if (count($eventsDate) == 0)
                        <h3>Событий не найдено</h3>
                    @else
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
                        @foreach($eventsDate as $event)
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
            {{$eventsDate->links()}}
        </div>
		@endif
    </section>
</div>
<@endsection  
