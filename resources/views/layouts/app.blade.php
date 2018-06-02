<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='robots' content='noindex,follow' />
        <title>{{$settings->title}}</title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">
        <link rel='dns-prefetch' href='//use.fontawesome.com' />
        <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel='stylesheet'  href="{{ asset('css/theme.css') }}" type='text/css' media='all' />
        <link rel='stylesheet'  href="{{ asset('css/swiper.css') }}" type='text/css' media='all' />
        <link rel='stylesheet'  href="{{ asset('css/font-awecome.min.css') }}" type='text/css' media='all' />
        <link rel='stylesheet'  href="{{ asset('css/style.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' href="{{asset ('css/kirki-styles-buntington2-inline-css.css') }}" type='text/css' media='all'>
		<link rel='stylesheet' href="{{asset ('css/gallery.css') }}" type='text/css' media='all'>
		<link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico')}}">
		<script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/min.js') }}"></script>
		<script src="{{ asset('js/swiper.js') }}"></script>
		<script src="{{ asset('js/font-awesome.js') }}"></script>
		<script src="{{ asset('js/lightbox-2.6.min.js') }}"></script>
		<script src="{{ asset('js/ajax.js') }}"></script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afc1be96e78ffbe"></script>
    </head>
    <body class="home page-template page-template-template-page-builder page-template-template-page-builder-php page page-id-425 siteorigin-panels siteorigin-panels-before-js siteorigin-panels-home">
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>    
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </body>
</html>