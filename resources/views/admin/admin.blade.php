@extends('layouts.admin')
@section('title')
    Админка
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Привет! Это админка
            <small>приятные слова..</small>
        </h1>
    </section>
    <section class="content">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('status')}}
        </div>
        @endif
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница</h3>
            </div>
        </div>
    </section>
</div>
@endsection
