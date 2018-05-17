@extends('layouts.app')
@section('content')
<div class="content">
@foreach($userEvents as $events)
<p>{{$events->title}}</p>
@endforeach
    </div>
    @endsection    
</body>
</html>