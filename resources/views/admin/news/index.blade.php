@extends('layouts.admin')
@section('title')
	Новости
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Новости</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Всего новостей: {{$newsCount}}</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('newsview')}}" class="btn btn-primary mb1 bg-orange">Добавить новость</a>
                </div>
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
                        @foreach($all as $news)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$news->user->id])}}">{{$news->user->name}}</a></td>
                            <td>{{ $classesNumbers()[ $news->studentClass['id'] ] }} - {{$news->studentClass['letter_class']}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->date}}</td>
                            <td>{{str_limit($news->content,25)}}</td>
                            <td>
                                @isset($news->photo)
                                    <div class="image-lightbox">
                                        <a href="{{asset('images/news/'.$news->photo)}}" data-lightbox="{{asset('images/news/'.$news->photo)}}" >
                                            <img width="100" src="{{asset('images/news/'.$news->photo)}}" class="attachment-full size-full wp-post-image"/>
                                        </a>
                                    </div>
                                @else
                                    Отсутствует
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
            {{$all->links()}}
        </div>
    </section>
</div>
@endsection  
