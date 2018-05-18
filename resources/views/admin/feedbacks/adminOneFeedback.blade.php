@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        @if($feedback)
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <div class="single_page_content"> 
                        <h2>Имя отправителя: {{ $feedback->name}}</h2>
                        <h2>Почта отправителя: {{ $feedback->email}}</h2>
                        <h2>Сообщение</h2>
                        </p>{{ $feedback->message}}</p>
                        <a href="{{route('deletefeedback',$feedback->id)}}" class="more-link button">Удалить заявку</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection    
</body>
</html>