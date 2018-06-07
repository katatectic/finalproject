@extends('layouts.admin')
@section('title')
    Отчёты
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Отчёты</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Всего отчётов: {{$reportsCount}}</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('admin.report.create')}}" class="btn btn-primary mb1 bg-orange">Добавить отчёт</a>
                </div>
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
                @endif
                <div class="form-group">
                    <form method="POST" action="{{route('admin.report.choose')}}">
                        {{ csrf_field() }}
                        <div class="col-md-5">
                            <select name="month" class="form-control">
                                @foreach (range(1,12) as $month)
                                    <option value="{{$month}}">{{$monthNames[$month]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="year" class="form-control">
                                @foreach (range($thisYear,2000) as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" id="subbut" class="btn btn-primary mb1 bg-orange">Найти отчёт</button>
                    </form>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Автор</th>
                            <th>Комитет</th>
                            <th>Дата</th>
                            <th>На что потратили</th>
                            <th>Добавить чек</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{$report->id}}</td>
                            <td><a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}}</a></td>
                            <td>{{ $classesNumbers()[ $report->studentClass['id'] ] }} - {{$report->studentClass['letter_class']}}</td>
                            <td>{{date('j '.$monthNames[date('n', strtotime($report->date))].' Y года', strtotime($report->date))}}</td>
                            <td>{{str_limit($report->content,25)}}</td>
                            <td><a href="{{route('check.create',['id'=>$report->id])}}" class="fa fa-plus"></a></td>
                            <td>
                                <a href="{{route('report.show',['id'=>$report->id])}}" class="fa fa-eye"></a>
                                @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->studentsClasses->contains('id', $report->studentClass['id']))
                                    <a href="{{route('admin.report.edit', ['id' => $report->id ] ) }}" class="fa fa-pencil"></a>
                                    <a href="{{route('admin.report.destroy',$report->id)}}" onclick="return confirm('Удалить отчёт?')" class="fa fa-remove"></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            {{$reports->links()}}
        </div>
    </section>
</div>
@endsection  
