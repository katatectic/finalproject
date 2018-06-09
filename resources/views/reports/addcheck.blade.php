@extends('layouts.app')
@section('title')
    Добавить платёжные чеки
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить платёжные чеки</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{URL::route('check.store')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="report_id" value="{{$report->id}}" />
                        <legend>Добавить платёжные чеки в отчёт в отчёт № {{$report->id}}</legend>
                        <div class="form-group">
                            <label for="exampleInputFile">Чеки</label>
                            <input type="file" name="image[]" multiple required>
                            <span style="color:red">{{ $errors->first('image') }}</span>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить платёжный чек"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection