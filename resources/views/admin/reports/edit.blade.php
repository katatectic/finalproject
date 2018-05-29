@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
			Редактировать отчёт
        </h1>
    </section>
    <section class="content">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.report.edit', ['id' => $report->id ])}}" >
            <div class="box">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Дата отчёта</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="date" value="{{ $report->date }}">
                            <span style="color:red">{{ $errors->first('date') }}</span>
                        </div>
                    </div>
					  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>На что потратили</label>
                            <textarea name="content" placeholder="На что потратили" id="" cols="30" rows="10" class="form-control">{{$report->content}}</textarea>
                            <span style="color:red">{{ $errors->first('content') }}</span>
                        </div>
						 <div class="form-group">
                            <label for="exampleInputFile">Чеки</label>
                            <input type="file" name="pay_check" id="exampleInputFile">
                            <span style="color:red">{{ $errors->first('pay_check') }}</span>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-success pull-left bg-orange"onclick="window.history.go(-1); return false;">Назад</button>
                            <button class="btn btn-success pull-right bg-orange">Сохранить</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </section>
</div>
@endsection