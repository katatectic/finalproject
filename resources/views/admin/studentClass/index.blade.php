<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <style>
        .option {
            display: none;
        }
        .showForm {
            cursor: pointer;
        }
    </style>
</head>
{{--@extends('layouts.footer')--}}
{{--@extends('layouts.header')--}}
@extends('layouts.app')
@section('content')

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
<div>
    <p>Добавить учебный класс</p>
    <form method="post">
        <label>Литтера класса<input type="text" name="letter_class" class="form-control"></label>
        <label>Первый год обучния<input type="text" name="start_year" class="form-control"></label>
        <label>Год выпуска<input type="text" name="year_of_issue" class="form-control"></label>
        <label>Не пропускают 4 класс<input type="radio" name="fourth_class" value="1" checked ></label>
        <label>Пропускают 4 класс<input type="radio" name="fourth_class" value="0"></label>
        <input type="submit"  value="Добавить" class="btn btn-primary">
        {{ csrf_field() }}
    </form>
</div>
{{$studentsClasses->links()}}
<div>
    <table cellspacing="0" border="1" cellpadding="10" class="adminTable">
        <tr>
            <td>Класс</td>
            <td>Год начала обучения</td>
            <td>Год выпуска</td>
            <td>4 класс</td>
            <td>Дата добавления</td>
        </tr>
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
    </table>
    <div class='option'  align="center">
        <form method="post" action="" id="updateClass">
            {{ csrf_field() }}
            <p><input type="hidden" class="id" value="" name="id"></p>
            <p class="className"></p>
            <label>Литтера класса<input type="text" name="letter_class_edit" class="form-control"></label>
            <label>Первый год обучния<input type="text" name="start_year_edit" class="form-control"></label>
            <label>Год выпуска<input type="text" name="year_of_issue_edit" class="form-control"></label>
            <label>Не пропускают 4 класс<input type="radio" id="class_4_1" name="fourth_class_edit" value="1"></label>
            <label>Пропускают 4 класс<input type="radio" id="class_4_0" name="fourth_class_edit" value="0"></label>
            <input type="submit"  value="Пересохранить" class="btn btn-primary">
        </form>
        <p><a href="" class="delete">Удалить</a></p>
        <p><input type="button" class="subm no btn btn-primary" value="Отмена"></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.no').click(function(){
            $('.option').fadeOut('slow');
        });
        $('.showForm').click(function(e){
            $('.option').fadeIn('slow');
            $('.option').css({
                'top':e.pageY,
                'left':e.pageX
            });
            $('input.id').val($(this).attr('id'));
            $('p.className').text($(this).children('td.className').text());
            $('input[name="letter_class_edit"]').val($(this).children('td.className').children('span').text());
            $('input[name="start_year_edit"]').val($(this).children('td.start_year').text());
            $('input[name="year_of_issue_edit"]').val($(this).children('td.year_of_issue').text());
            $('input#class_4_'+$(this).children('td.fourth_class').attr('value')).prop( "checked", true );
        });
    });
</script>
@endsection




