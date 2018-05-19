@extends('layouts.app')
@section('content')
<div id="cinemahead">
    <div class="buntington2-cinema-bg">            
        <div class="element-gradient buntington2-cinema buntington2-cinema-cat buntington2-cinema-category invert" data-url="http://buntington2.wpshow.me/wp-content/uploads/2018/03/pexels-photo-258353.jpeg" style="background-position: center center; padding-top: 150px; padding-bottom: 20px;">                
            <div class="wrappr text-left">                    
                <h1 class="h-gigant">Отчет</h1>
                <p>Куда уходят деньги</p>
            </div><!-- .wrappr -->                
        </div><!-- .buntington2-cinema -->            
    </div><!-- .buntington2-cinema-bg -->           
    <div id="mobile-nav-container"></div><!-- Small devices menu -->    
</div><!-- #cinemahead -->
<div id="content" class="site-content wrappr">
    
    <section class="report">
            <div>
                <table>
                    <tr>
                        <th>№</th>
                        <th>На что потратили</th>
                        <th>Стоимость</th>
                    </tr>
                    @foreach ($all as $report)
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->name_charge}}</td> 
                        <td>{{$report->value}}</td>                        
                    </tr>
                    @endforeach
                </table>
            </div>
        
    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
                var url = $(this).attr('href');
                getEvents(url);
                window.history.pushState("", "", url);
            });

            function getNews(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.report').html(data);
                }).fail(function () {
                    alert('Report could not be loaded.');
                });
            }
        });
    </script>

</div>

@endsection