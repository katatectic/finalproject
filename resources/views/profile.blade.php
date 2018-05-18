@extends('layouts.app')
@section('content')
<div class="content">
    <section id="contentSection">
        <div class="row">
            @if($user or $eventCount or $newsCount)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <p>Пользователь сайта</p>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body" style="margin:0 auto;width:500px">
                        <div style="width:100px;height:120px">
                            @empty(!$user->avatar)
                            <img class="mw-100" style="width:100%;height:100%" src="{{asset('images/users/'.$user->avatar)}}">
                            @else
                            Нет аватарки
                            @endempty
                        </div>
                        <div class="text-center" id="author">
                            <table class="table table-th-block">
                                <tbody>
                                    <tr><td class="active">Имя:</td><td>{{$user->name}}</td></tr>
                                    <tr><td class="active">Фамилия:</td><td>{{$user->surname}}</td></tr>
                                    <tr><td class="active">Отчество:</td><td>{{$user->middle_name}}</td></tr>
                                    <tr><td class="active">Почта:</td><td>{{$user->email}}</td></tr>
                                    <tr><td class="active">Телефон:</td><td>{{$user->phone}}</td></tr>
                                    <tr><td class="active">Дата регистрации</td><td>{{$user->created_at}}</td></tr>
									<tr><td class="active">Всего объявлений</td>
									@if (!empty($eventCount) )
									<td>{{$eventCount}}</td></tr>
									@else <td>0</td>
									@endif
									<tr><td class="active">Всего новостей</td>
									@if (!empty($newsCount) )
									<td>{{$newsCount}}</td></tr>
									@else <td>0</td>
									@endif
                                </tbody>
                            </table>

							@if (Auth::user()->role == 1 || Auth::user()->id == $user->id)
                            <a href="{{route('edituser',['id'=>$user->id]) }}" class="more-link button">Изменить данные</a>
                            <a href="{{route('deleteuser',$user->id)}}" onclick="return confirmDelete();" class="more-link button">Удалить профиль</a>
							@endif
                        </div>
                        <div style="margin-top: 20px;">
                            <h3>Список событий автора</h3>
                            @foreach($user->events as $event)
                            <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
                            <div class="grid"><!-- toast grid declaration -->
                                <div id="primary" class="content-area grid__col grid__col--3-of-3">
                                    <main id="main" class="site-main" role="main">
                                        <article id="post-519" class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events" style="margin-top: 15px; margin-bottom: 15px;">
                                            <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                                                <a href="{{route('event',['id'=>$event->id])}}"
                                                   title="{{ $event->title }}">
                                                    <img width="1140" height="500"
                                                         src="{{asset('images/'.$event->photo)}}"
                                                         class="attachment-full size-full wp-post-image"
                                                         alt=""
                                                         srcset="{{asset('images/'.$event->photo)}} 1140w, {{asset('images/'.$event->photo)}} 600w"
                                                         sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                </a>
                                            </figure>
                                            <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                                                <header class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('event',['id'=>$event->id])}}">{{ $event->title }}</a>
                                                    </h2>
                                                </header><!-- .entry-header -->
                                            </div><!-- .post-text-block -->
                                    </main><!-- #main -->
                                </div><!-- #primary -->
                            </div>
                            @endforeach
                            {{-- {{ $user->events->links() }} --}}
                            <h3>Список новостей автора</h3>
                            @foreach($user->articles as $article)
                            <div id="site-to-top"><i class="fa fa-chevron-up fa-lg"></i></div><!-- back to top button -->
                            <div class="grid"><!-- toast grid declaration -->
                                <div id="primary" class="content-area grid__col grid__col--3-of-3">
                                    <main id="main" class="site-main" role="main">
                                        <article id="post-519" class="grid layout_1 post-519 doublef-event type-doublef-event status-publish has-post-thumbnail hentry doublef-events-school-events" style="margin-top: 15px; margin-bottom: 15px;">
                                            <figure class="post-thumbnail grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                                                <a href="{{route('article',['id'=>$article->id])}}"
                                                   title="{{ $article->title }}">
                                                    <img width="1140" height="500"
                                                         src="{{asset('images/'.$article->photo)}}"
                                                         class="attachment-full size-full wp-post-image"
                                                         alt=""
                                                         srcset="{{asset('images/'.$article->photo)}} 1140w, {{asset('images/'.$article->photo)}} 600w"
                                                         sizes="(max-width: 1140px) 100vw, 1140px"/>
                                                </a>
                                            </figure>
                                            <div class="post-text-block grid__col grid__col--6-of-12 grid__col--m-1-of-1">
                                                <header class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('article',['id'=>$article->id])}}">{{ $article->title }}</a>
                                                    </h2>
                                                </header><!-- .entry-header -->
                                            </div><!-- .post-text-block -->
                                    </main><!-- #main -->
                                </div><!-- #primary -->
                            </div>
                            @endforeach
                            {{-- {{ $user->events->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>            
            @endif
        </div>
        <script>
            function confirmDelete() {
                if (confirm("Вы подтверждаете удаление?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </section>
@endsection