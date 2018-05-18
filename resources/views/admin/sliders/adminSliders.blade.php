@extends('layouts.app')
@section('content')
<div class="container">
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
                <td><a href="{{ route('adminOneSlider',['id'=>$slider->id]) }}" class="btn btn-info">Просмотр слайдера</a></td>
                <td><a href="{{ route('editSlider',['id'=>$slider->id]) }}" class="btn btn-info">Редактировать слайдер</a></td>
                <td><a href="{{route('deleteSlider',$slider->id)}}" onclick="return confirmDelete();" class="btn btn-info">Удалить слайдер</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$sliders->links()}}
</div>
<script>
    function confirmDelete() {
        if (confirm("Вы подтверждаете удаление?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection  
</body>
</html>