<header id="masthead" class="site-header site-header--background" role="banner">                
            <div class="header-bar header-bar-absolute" style="background-color: rgba(255,255,255,0);">
                <div class="header-bar-wrapper wrappr">            
                    <div class="header-bar-spacing">                                            
                        <div class="grid">                                                        
                            <div class="grid__col grid__col--3-of-3">                              
                                <section id="siteorigin-panels-builder-3" class="widget widget_siteorigin-panels-builder">
                                    <div id="pl-w5acdfeaec6c5d"  class="panel-layout" >
                                        <div id="pg-w5acdfeaec6c5d-0"  class="panel-grid panel-has-style" >
                                            <div class="text-right panel-row-style panel-row-style-for-w5acdfeaec6c5d-0" >
                                                <div id="pgc-w5acdfeaec6c5d-0-0"  class="panel-grid-cell" >
                                                    <div id="panel-w5acdfeaec6c5d-0-0-0" class="so-panel widget widget_nav_menu panel-first-child panel-last-child" data-index="0" >
                                                        <ul id="menu-functional" class="menu">
                                                            @if (Auth::guest())
                                                            <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121">
                                                                <a href="{{ route('login') }}">Войти</a>
                                                            </li>
                                                            <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121">
                                                                <a href="{{ route('register') }}">Зарегистрироваться</a>
                                                            </li>
                                                            @else
                                                            <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121">
                                                                <a href="{{route('profile', ['id'=>Auth::user()->id])}}">Вы вошли как {{ Auth::user()->name }}</a>
                                                            </li>
                                                            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                            <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121">
                                                                <a href="{{ route('admin') }}">
                                                                    Админ-панель
                                                                </a>                                        
                                                            </li>
                                                            @endif
                                                            <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121" role="menu">
                                                                <a href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">Выйти
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                </form>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>                                    
                            </div>                                                        
                        </div>                                        
                    </div>                
                </div>                
            </div>                
        <div class="cast-all-inside site-header--background">    
            <div class="wrappr">        
                <div id="navhead" class="site-header--logo-left">            
                    <!-- toggle mobile menu icon -->
                    <span class="menu-toggler">
                        <span id="nav-icon" class="icon">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                    </span>
                    <!-- toggle mobile menu icon END -->                            
                    <div class="site-header--branding">
                        <a href="{{ url('/') }}" rel="home" class="site-header--branding-a" data-img-width="166" data-img-height="120">
                        <img src="https://pp.userapi.com/c631424/v631424704/26f3d/Dxs8EtCzOaE.jpg" alt="Buntington Public Schools" />
                        </a>
                    </div><!-- .site-header--branding -->                        
                    <nav id="site-navigation" class="main-navigation" role="navigation">                
                        <ul id="primary-menu" class="">
                            <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-21">
                                <a title="" href="{{ url('/') }}">Главная</a>                        
                            </li>
                            <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-21">
                                <a title="" href="{{route('about')}}">О нас</a>
                            </li>
                            <li id="menu-item-325" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-325">
                                <a title="" href="{{route('news')}}">Новости</a>
                            </li>
                            <li id="menu-item-512" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-events menu-item-512">
                                <a title="" href="{{route('event.index')}}">События</a>
                            </li>
                            <li id="menu-item-512" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-events menu-item-512">
                                <a title="" href="{{route('report')}}">Отчет</a>
                            </li>
                            
                                @if (!Auth::guest())
                                @if (Auth::user()->role !== 1 )
                                <li id="menu-item-512" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-events menu-item-512">
                                    <a title="" href="{{route('addFeedback')}}">Обратная связь</a>
                                </li>
                                @endif

                                {{--
                                <li id="menu-item-650" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-courses menu-item-650"><a title="" href="{{route('contacts')}}">Контакты</a></li>
                                --}}
                                @if (Auth::user()->role == 2 || Auth::user()->role == 3)
                                <li id="menu-item-650" class="menu-item menu-item-type-taxonomy menu-item-object-doublef-courses menu-item-650"><a title="" href="{{route('event.create')}}">Добавить событие</a></li>       
                                <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309"><a href="{{ route('newsview') }}">Добавить новость</a></li>
                                <li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309"><a href="{{ route('reportform') }}">Сделать отчет</a></li>
                                @endif
                                @endif
                        </ul>                    
                    </nav><!-- #site-navigation -->                                
                </div>        
            </div><!-- .cast-all-inside -->        
        </div>
    </header><!-- #masthead -->

    