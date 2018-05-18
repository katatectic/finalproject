@extends('layouts.app')
@section('content')
<div class="content">
        <div class="row">
            @if($article)
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">
                        <div class="single_page_content"> 
                            <h2>Имя отправителя: {{ $article->name}}</h2>
                            <h2>Почта отправителя: {{ $article->email}}</h2>
                            <h2>Сообщение</h2>
                            </p>{{ $article->message}}</p>
                            <a href="{{route('deletefeedback',$article->id)}}" class="btn btn-info" style="float:right">Удалить заявку</a>
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