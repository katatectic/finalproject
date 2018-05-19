@extends('layouts.app')
@section('content')
<div class="container">
<a href="{{ route('slider.store')}}" class="more-link button">Добавить слайдер</a>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Название</th>
        <th>Краткое описание</th>
        <th>Изображение</th>
        </thead>
        <tbody >
            @foreach($sliders as $slider)
            <tr>
                <td>{{$slider->title}}</td>
                <td>{{$slider->description}}</td>
                <td class="photo">
                    <div style="width:100px;height:120px">
                        @empty(!$slider->photo)
                        <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/sliders/'.$slider->photo)}}">
                        @else
                        Загрузите изображение
                        @endempty
                    </div>
                </td>
                <td><a href="{{ route('slider.show',['id'=>$slider->id]) }}" class="btn btn-info">Просмотр слайдера</a></td>
                <td><a href="{{ route('slider.edit',['id'=>$slider->id]) }}" class="btn btn-info">Редактировать слайдер</a></td>
                <td><a href="{{route('slider.destroy',$slider->id)}}" onclick="return confirm('Удалить слайдер?')" class="btn btn-info">Удалить слайдер</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$sliders->links()}}
</div>
@endsection  
</body>
</html>