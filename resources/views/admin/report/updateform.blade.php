@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Редактировать</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('update', $report->id)}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id"  value='{{$report->id}}'>
                            <label for="title" class="col-md-4 control-label">На что потратили</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="content" rows='23' name="name_charge" placeholder="Введите текст" autofocus>{{$report->name_charge}}</textarea>
                                <span style="color:red">{{ $errors->first('name_charge') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Стоимость</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="value" value="{{ $report->value }}"  autofocus>
                                <span style="color:red">{{ $errors->first('name_charge') }}</span>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value=""> 
                        
                                           
                        
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Редактировать"/>
                        </div>
                    </form>                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection