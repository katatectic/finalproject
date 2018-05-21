@extends('layouts.app')
@section('content')

<p class="btn btn-primary mb1 bg-green">Всего альбомов: {{$albumsCount}} </p>
<a href="{{route('album.create')}}" class="more-link button">Добавить альбом</a>
<div>
    <table class="adminTable">
        <th>Название</th>
        <th>Краткое описание</th>
        <th>Изображение</th>
        @foreach($albums as $album)
        <tr>
            <td>{{$album->name}}</td>
            <td><div style="max-height:120px;width:100px;overflow-x:hidden">{{$album->description}}</div></td>
            <td>
                <div style="width:100px;height:120px">
                    @empty(!$album->cover_image)
                    <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/albums/'.$album->cover_image)}}">
                    @else
                    Загрузите изображение
                    @endempty
                </div>
            </td>
            <td><a href="{{route('album.show',['id'=>$album->id])}}" class="more-link button"><button type="button"class="btn btn-danger btn-large">Просмотр</button></a></td>
            <td><a href="{{route('album.edit', ['id' => $album->id ] ) }}" class="more-link button"><button type="button"class="btn btn-danger btn-large">Редактировать альбом</button></a></td>
            <td><a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')"><button type="button"class="btn btn-danger btn-large">Удалить альбом</button></a></td>
        </tr>
        @endforeach
    </table>
    {{$albums->links()}}
</div>
</div>@endsection  
</body>
</html>