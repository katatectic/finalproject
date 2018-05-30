<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/ionicons/2.0.1/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/dist/css/skins/_all-skins.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/style.css')}}">
		<link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('partials.admin.header')
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('images/users/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                        </div>
                    </div>
                    <form action="{{route('admin.search')}}" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Поиск...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    <ul class="sidebar-menu">
                        <li class="header">НАВИГАЦИЯ</li>
                        <li class="treeview">
                            <a href="{{route('admin')}}">
                                <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
                            </a>
                        </li>
                        <li><a href="{{route('adminnews')}}"><i class="fa fa-sticky-note-o"></i> <span>Новости</span></a></li>
                        <li><a href="{{route('adminevents')}}"><i class="fa fa-list-ul"></i> <span>События</span></a></li>
                        <li><a href="{{route('adminAlbums')}}"><i class="fa fa-list-ul"></i> <span>Альбомы</span></a></li>
                        <li><a href="{{route('admincomments')}}"><i class="fa fa-commenting"></i> <span>Комментарии</span></a></li>
                        @if (Auth::user()->role == 1)
                        <li><a href="{{route('studentsClasses')}}"><i class="fa fa-sticky-note-o"></i> <span>Классы</span></a></li>
                        <li><a href="{{route('users')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
                        <li><a href="{{route('admin.feedback.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Обратная связь</span></a></li>
                        <li><a href="{{route('adminSliders')}}"><i class="fa fa-sticky-note-o"></i> <span>Слайдеры</span></a></li>
                        <li><a href="{{route('adminReports')}}"><i class="fa fa-sticky-note-o"></i> <span>Отчёты</span></a></li>
						<li><a href="{{route('mail')}}"><i class="fa fa-sticky-note-o"></i> <span>Отправка почты</span></a></li>
                        @endif
                    </ul>
                </section>
            </aside>
            @yield('content')
            <aside class="control-sidebar control-sidebar-dark">
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="control-sidebar-home-tab">
                    </div>
                </div>
            </aside>
        </div>
        @include('partials.admin.footer')
        <script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('assets/dist/js/app.min.js')}}"></script>
        <script src="{{asset('assets/dist/js/demo.js')}}"></script>
        <script src="{{ asset('js/lightbox-2.6.min.js') }}"></script>
    </body>
</html>


