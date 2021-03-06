@extends('layouts.admin')
@section('title')
    Новости за {{$thisYear}} года
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Новости за {{$thisYear}} года</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <form method="POST" action="">
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
                        <button type="submit" id="subbut" class="btn btn-primary mb1 bg-orange">Найти новость</button>
                    </form>
                    @if (count($newsDate) == 0)
                        <h3>Новостей не найдено</h3>
                    @else
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Автор</th>
                                <th>Комитет</th>
                                <th>Заголовок</th>
                                <th>Дата новости</th>
                                <th>Текст новости</th>
                                <th>Картинка</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newsDate as $news)
                            <tr>
                                <td><a href="{{route('profile',['id'=>$news->user->id])}}">{{$news->user->name}}</a></td>
                                <td>{{ $classesNumbers()[ $news->studentClass['id'] ] }} - {{$news->studentClass['letter_class']}}</td>
                                <td>{{$news->title}}</td>
                                <td>{{date('j '.$monthNames[date('n', strtotime($news->date))].' Y года'.' в H:i', strtotime($news->date))}}</td>
                                <td>{{str_limit($news->content,25)}}</td>
                                <td>
                                    @isset($news->photo)
                                        <div class="image-lightbox">
                                            <a href="{{asset('images/news/'.$news->photo)}}" data-lightbox="{{asset('images/news/'.$news->photo)}}" >
                                                <img width="100" src="{{asset('images/news/'.$news->photo)}}" class="attachment-full size-full wp-post-image"/>
                                            </a>
                                        </div>
                                    @else
                                        Изображение отсутствует
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{route('article', ['id'=>$news->id])}}" class="fa fa-eye"></a>
                                    @if(Auth::user()->role == 1 || Auth::user()->studentsClasses->contains('id', $news->studentClass['id']))
                                        <a href="{{route('article.edit',['id'=>$news->id]) }}" class="fa fa-pencil"></a>
                                        <a href="{{route('deletenews',$news->id)}}" onclick="return confirm('Удалить новость?')" class="fa fa-remove"></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
                {{$newsDate->links()}}
                @endif
            </div>
        </div>
    </section>
</div>
@endsection  
