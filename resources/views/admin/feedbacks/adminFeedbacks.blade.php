@extends('layouts.app')
@section('content')
<style>
    .2 {
        background-color:#90EE90
    }
    .1 {
        background-color:#F08080
    }
</style>
<div class="container">
    <p class="btn btn-primary mb1 bg-green">Всего заявок: {{$feedbacksCount}} </p>
    <table class="table table-responsive" >
        <thead class="thead-dark">
        <th>Имя</th>
        <th>Почта</th>
        <th>Сообщение</th>
        <th>Дата отправки заявки</th>
        <th>Статус заявки</th>
        </thead>
        <tbody >
            @foreach($feedbacks as $feedback)
            <tr class="{{$feedback->status}}">
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->email}}</td>
                <td>{{$feedback->message}}</td>
                <td>{{$feedback->created_at}}</td>
                @if($feedback->status==1)
                <td>Не просмотрено</td>
                @else	 <td>Просмотрено</td>
                @endif
                <td><a href="{{ route('adminonefeedback',['id'=>$feedback->id]) }}" class="more-link button">Просмотр заявки</a></td>
                <td><a href="{{route('deletefeedback',$feedback->id)}}" onclick="return confirmDelete();" class="more-link button">Удалить заявку</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$feedbacks->links()}}
</div>
<script>
    function confirmDelete() {
        if (confirm("Вы подтверждаете удаление?")) {
            return true;
        } else {
            return false;
        }
    }
</script>@endsection  
</body>
</html>