@extends('layouts.app')
@section('content')
<div class="content">
@foreach($user->events as $event)
<p>{{$event->title}}</p>
@endforeach
    </div>
    @endsection    
</body>
</html>