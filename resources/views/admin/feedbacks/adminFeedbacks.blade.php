@extends('layouts.admin')
@section('content')
<style>
    .2 {
        background-color:#90EE90
    }
    .1 {
        background-color:#F08080
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Заявки от пользователей</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="btn btn-success bg-orange">Всего заявок: {{$feedbacksCount}}</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>		
                        <tr>
                            <th>Имя</th>
                            <th>Почта</th>
                            <th>Сообщение</th>
                            <th>Дата отправки заявки</th>
                            <th>Статус заявки</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                        <tr class="{{$feedback->status}}">
                            <td>{{$feedback->name}}</td>
                            <td>{{$feedback->email}}</td>
                            <td>{{$feedback->message}}</td>
                            <td>{{$feedback->created_at}}</td>
                            @if($feedback->status==1)
                                <td>Не просмотрено</td>
                            @else	 
                                <td>Просмотрено</td>
                            @endif
                            <td>
                                <a href="{{ route('adminonefeedback',['id'=>$feedback->id]) }}" class="fa fa-eye"></a>
                                <a href="{{route('deletefeedback',$feedback->id)}}" onclick="return confirm('Удалить заявку?')" class="fa fa-remove"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>		  
            </div>
            {{$feedbacks->links()}}
        </div>
    </section>
</div>
@endsection  
