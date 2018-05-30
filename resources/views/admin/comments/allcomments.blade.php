@extends('layouts.admin')
@section('title')
	Комментарии
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Комментарии</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="btn btn-primary mb1 bg-orange">Всего неопубликованных комментариев: {{$unpublishedCommentsCount}}</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Автор</th>
                            <th>Заголовок новости</th>
                            <th>Заголовок события</th>
                            <th>Комментарий</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $comment)
                        @if ($comment->ispublished == 0)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}}</a></td>
                            @if ($comment->article_id !== null)
                            <td><a href="{{route('article', ['id'=>$comment->article->id])}}">{{$comment->article->title}}</a></td>
                            @else
                            <td class="date">---</td>
                            @endif
                            @if ($comment->event_id !== null)
                            <td><a href="{{route('event.show', ['id'=>$comment->event->id])}}">{{$comment->event->title}}</a></td>
                            @else
                            <td class="date">---</td>
                            @endif
                            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$comment->comment}}</div></td>
                            <td><a href="{{route('comment.confirm', ['id'=>$comment->id])}}" class="btn btn-primary mb1 bg-orange">Одобрить комментарий</a></td>
                            <td><a href="{{route('deletecomment',$comment->id)}}" onclick="return confirm('Удалить комментарий?')" class="btn btn-primary mb1 bg-orange">Удалить комментарий</a></td>   
                        </tr>
                        @endif
                        @endforeach
                        </tfoot>
                </table>
            </div>
            {{$all->links()}}
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="btn btn-primary mb1 bg-orange">Всего опубликованных комментариев: {{$publishedCommentsCount}}</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Автор</th>
                            <th>Заголовок новости</th>
                            <th>Заголовок события</th>
                            <th>Комментарий</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $comment)
                        @if ($comment->ispublished == 1)
                        <tr>
                            <td><a href="{{route('profile',['id'=>$comment->user->id])}}">{{$comment->user->name}}</a></td>
                            @if ($comment->article_id !== null)
                            <td><a href="{{route('article', ['id'=>$comment->article->id])}}">{{$comment->article->title}}</a></td>
                            @else
                            <td class="date">---</td>
                            @endif
                            @if ($comment->event_id !== null)
                            <td><a href="{{route('event.show', ['id'=>$comment->event->id])}}">{{$comment->event->title}}</a></td>
                            @else
                            <td class="date">---</td>
                            @endif
                            <td class="content"><div style="max-height:120px;width:100px;overflow-x:hidden">{{$comment->comment}}
                            <td><a href="{{route('deletecomment',$comment->id)}}" onclick="return confirm('Удалить комментарий?')" class="btn btn-primary mb1 bg-orange">Удалить комментарий</a></td>   
                        </tr>
                        @endif
                        @endforeach
                        </tfoot>
                </table>
            </div>
            {{$all->links()}}
        </div>
    </section>
</div>
@endsection  
