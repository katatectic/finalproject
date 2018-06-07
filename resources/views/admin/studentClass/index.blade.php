<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style>
        .option {display: none;}
        .showForm {cursor: pointer;}
        .admin.students-classes .confirmation {display:none;}
        .admin.students-classes #confirmForm {float: left;margin-right: 5px}
        .admin.students-classes #confirmation {display:flex;justify-content: center;}
        .admin.students-classes .option {text-align:center;max-height:392px;position: absolute;background: #fafafa;padding: 19.5px 15px;border-left: 2px solid #d2d6de;border-radius: 0px;top: 24.8%;right: 0.9%;}
        .admin.students-classes p.className {font-weight: 600;font-size: 16px;text-align: center}
        .admin.students-classes tr:hover td {background: #ffd79d;}
        .admin.students-classes tr.select {background: #fdca7f;outline: 2px solid #ffc107 }
        .admin.students-classes .select td {background: #fdca7f;}
        .admin.students-classes input[type="radio"] + label {cursor: pointer;font-size: 15px;background: #fafafa;border: 2px solid #cacaca;padding: 2px 5px;border-radius: 30px;margin:2px;}
        .admin.students-classes input[type="radio"] + label:hover {border: 2px solid #fafafa;box-shadow: 0 0 10px rgba(0,0,0,0.5);}
        .admin.students-classes input:checked + label {background: #ff851b;color:#fff}
        .admin.students-classes .option input[type="radio"] + label {}
    </style>
</head>
@extends('layouts.admin')
@section('title')
    Классы
@endsection
@section('content')
<div class="content-wrapper admin students-classes">
    <section class="content-header">
        <h1>Классы</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <form method="post" action="{{route('storeStudentsClasses')}}">
                        <label>Литтера класса<input type="text" name="letter_class" class="form-control"></label>
                        <label>Первый год обучния<input type="text" name="start_year" class="form-control"></label>
                        <label>Год выпуска<input type="text" name="year_of_issue" class="form-control"></label>
                        <input type="radio" id="createVal1" name="fourth_class" value="1" checked class="hidden">
                        <label for="createVal1">Не пропускают 4 класс</label>
                        <input type="radio" id="createVal0" name="fourth_class" value="0" class="hidden">
                        <label for="createVal0">Пропускают 4 класс</label>
                        <input type="submit"  value="Добавить учебный класс" class="btn btn-primary bg-orange">
                        {{ csrf_field() }}
                    </form>
                    Классы
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>		
                        <tr>
                            <th>Класс</th>
                            <th>Год начала обучения</th>
                            <th>Год выпуска</th>
                            <th>4 класс</th>
                            <th>Дата добавления</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentsClasses as $class)
                            <tr class="showForm" id="{{$class->id}}">
                                <td class="className">
                                    @if ($thisYear - $class->start_year + $transition < 4)
                                        {{$thisYear - $class->start_year + $transition}}
                                    @elseif ($thisYear <= $class->year_of_issue)
                                        {{$thisYear - $class->start_year + $transition + 1 - $class->fourth_class}}
                                    @else
                                        (Выпустился) {{$class->year_of_issue - $class->start_year - $class->fourth_class}}
                                    @endif
                                    <span>{{$class->letter_class}}</span>
                                </td>
                                <td class="start_year">{{$class->start_year}}</td>
                                <td class="year_of_issue">{{$class->year_of_issue}}</td>
                                <td class="fourth_class" value="{{$class->fourth_class}}">@if (!$class->fourth_class) Пропускают @else Проходят @endif</td>
                                <td>{{$class->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>	
				{{$studentsClasses->links()}}
                <div class='option' style="width:450px;margin:auto">
                    <p class="className"></p>
                    <form method="post" action="{{route('updateStudentsClasses')}}"  id="updateClass" class="form-horizontal">
                        <div class="box">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <input type="hidden" class="id" value="" name="id">
                                <div class="col-md-12">
                                    <div>
                                        <label>Литтера класса</label>
                                        <input type="text" class="form-control" name="letter_class">
                                    </div>
                                    <div>
                                        <label>Первый год обучния</label>
                                        <input type="text" class="form-control" name="start_year">
                                    </div>
                                    <div >
                                        <label>Год выпуска</label>
                                        <input type="text" class="form-control" name="year_of_issue">
                                    </div>
                                    <input type="radio" id="editVal1" name="fourth_class" value="1" class="hidden">
                                    <label for="editVal1">Не пропускают 4 класс</label>
                                    <input type="radio" id="editVal0" name="fourth_class" value="0" class="hidden">
                                    <label for="editVal0">Пропускают 4 класс</label>
                                </div>
                                <div class="box-footer">
                                    <button class="btn btn-success pull-left bg-orange">Отмена</button>
                                    <input type="submit"  value="Пересохранить" class="btn btn-success pull-right bg-orange">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="confirmation">
                        <div class="delete"><input type="button" id="delete" value="Удалить" class="btn btn-primary bg-orange"></div>
                        <div class="confirmation">
                            <form action="" id="confirmForm">
                                <input type="submit" id="annulment" value="Подтвердить удаление" class="btn btn-success pull-left bg-orange">
                            </form>
                            <input type="button" id="annulment" value="Не удалять" class="btn btn-success pull-right bg-orange">
                        </div>
                    </div>
                </div>
            </div><br/>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('.no').click(function () {
            $('.option').fadeOut('slow');
        });
        $('.showForm').click(function (e) {
            $('.confirmation').fadeOut(10);
            $('#delete').fadeIn(10);
            $('.option').fadeIn('slow');
            $('input.id').val($(this).attr('id'));
            $('p.className').text($(this).children('td.className').text() + 'класс');
            $('.option input[name="letter_class"]').val($(this).children('td.className').children('span').text());
            $('.option input[name="start_year"]').val($(this).children('td.start_year').text());
            $('.option input[name="year_of_issue"]').val($(this).children('td.year_of_issue').text());
            $('.option input#editVal' + $(this).children('td.fourth_class').attr('value')).prop("checked", true);
            $('#confirmForm').attr('action', window.location.pathname + '/delete/' + $(this).attr('id'));
            $('.select').removeClass("select");
            $(this).addClass("select");
        });
        $('input#delete').click(function () {
            $('#delete').fadeOut(10);
            $('.confirmation').fadeIn(10);
        });
        $('input#annulment').click(function () {
            $('#delete').fadeIn(10);
            $('.confirmation').fadeOut(10);
        });
    });
</script>
@endsection




