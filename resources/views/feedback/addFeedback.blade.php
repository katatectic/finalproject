@extends('layouts.app')
@section('title')
	Обратная связь
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="contact_area">
                    <h2>Вы оставили заявку</h2>
                    <h2>Сейчас вы будете переадресованы на главную страницу</h2>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
<script>

    setTimeout('location="{{route('main')}}";', 5000);

</script>

