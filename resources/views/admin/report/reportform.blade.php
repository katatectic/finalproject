@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 200px;">
            <div class="panel panel-default">
                <div class="panel-heading">Сделать отчет</div><br/><br/>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{route('makereport')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">На что потратили</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="content" rows='23' name="name_charge" placeholder="Введите текст" autofocus>{{ old('name_charge') }}</textarea>
                                <span style="color:red">{{ $errors->first('name_charge') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Стоимость</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="value" value="{{ old('value') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('name_charge') }}</span>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value=""> 
                        
                        <div class="form-group">
                            <label for="event_date" class="col-md-4 control-label">Дата</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}"  autofocus>
                                <span style="color:red">{{ $errors->first('date') }}</span>
                            </div>
                        </div>                        
                        
                        <div class="form-group">
                            <input name="submit" type="submit" id="submit" class="submit" value="Добавить"/>
                        </div>
                    </form>                    
                </div>
            </div>
            <div>
                <table>
                    <tr>
                        <th>№</th>
                        <th>На что потратили</th>
                        <th>Стоимость</th>
                        <th>Обновить</th>
                        <th>Удалить</th>
                    </tr>
                    @foreach ($all as $report)
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->name_charge}}</td> 
                        <td>{{$report->value}}</td>                        
                        <td><a href="{{route('updateform', $report->id)}}">Обновить</a></td>
                        <td><a href="{{route('delete', $report->id)}}">Удалить</a></td> 
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection