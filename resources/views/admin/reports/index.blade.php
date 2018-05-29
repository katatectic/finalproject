@extends('layouts.admin')
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
							<th>№</th>
							<th>Автор</th>
							<th>На что потратили</th>
							<th>Стоимость</th>
							<th>Чеки</th>
							</tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
							<td>1</td>
                            <td><a href="{{route('profile',['id'=>$report->user->id])}}">{{$report->user->name}}</a></td>
                            <td>{{str_limit($report->content,25)}}</td>
							<td>{{$report->date}}</td>
                            <td>
                                <div class="image-lightbox">
                                    <a href="{{asset('images/reports/'.$report->pay_check)}}" data-lightbox="{{asset('images/reports/'.$report->pay_check)}}" >
                                        <img width="100" src="{{asset('images/reports/'.$report->pay_check)}}" class="attachment-full size-full wp-post-image"/>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('report.show',['id'=>$report->id])}}" class="fa fa-eye"></a>
                                <a href="" class="fa fa-pencil"></a>
                                <a href="{{route('admin.report.destroy',$report->id)}}" onclick="return confirm('Удалить отчёт?')" class="fa fa-remove"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>
            </div>
            {{$reports->links()}}
        </div>
    </section>
</div>
@endsection  
