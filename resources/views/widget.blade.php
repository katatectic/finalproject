<div id="panel-425-1-2-0"
     class="so-panel widget widget_doublef-courses-search panel-first-child"
     data-index="4">
    <div class="so-widget-doublef-courses-search so-widget-doublef-courses-search-base" style='margin-top:30px'>
        <h2 class="widget-title">Что-то будем искать?</h2>
        <form role="search" method="get" id="course-finder"
              class="search-form one-field-submit"
              action="{{route('search')}}">
            <label>
                <span class="screen-reader-text">Что-нибудь поищи...</span>
                <input type="text" class="search-field" placeholder="Поиск..." name="search"/ required>
                <input type="hidden" name="post_type" value="doublef-course"/>
            </label>
            {{ csrf_field() }}
            <input type="submit" class="search-submit" value="Искать"/>
        </form>
    </div>
</div><br/>
<div id="panel-425-1-2-1"
     class="so-panel widget widget_buntington2-button-banner" data-index="5">
    <div class="panel-widget-style panel-widget-style-for-425-1-2-1">
        <div class="so-widget-buntington2-button-banner so-widget-buntington2-button-banner-base">
            <h2 class="widget-title">Полезные ссылки</h2>
            <a href="http://www.mon.gov.ua/"
               target="_self" class="button-banner-link">
                <div class="button-banner-wrapper" style="background-color: #5dca9d; ; text-align: left; padding: 20px 20px 20px 20px;">
                    <div class="button-banner-text">
                        <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> Министерство образования и науки Украины</h2>
                        <div class="button-banner-tagline" style="color: #FFFFFF;">Ссылка на сайт МОН </div>
                    </div>
                    <div class="dbb-hover-canvas"></div>
                </div>
            </a>
            <a href="http://testportal.gov.ua/"
               target="_self" class="button-banner-link" style="margin-top: 10px;">
                <div class="button-banner-wrapper" style="background-color: #b9becd; ; text-align: left; padding: 20px 20px 20px 20px;">
                    <div class="button-banner-text">
                        <h2 class="button-banner-title" style="color: #f7f5de; font-size: 22px;"> УЦОЯО</h2>
                        <div class="button-banner-tagline"
                             style="color: #FFFFFF;">Ссылка на сайт УЦОЯО
                        </div>
                    </div>
                    <div class="dbb-hover-canvas"></div>
                </div>
            </a>
        </div>
        <div id="panel-425-1-0-1"
             class="so-panel widget widget_doublef-featured-gallery panel-last-child"
             data-index="2">
            <div class="so-widget-doublef-featured-gallery so-widget-doublef-featured-gallery-base"><br/><br/>
                <h5 class="doublef-gallery-photos-num"></h5><h2 class="widget-title"><a href="{{route('album.index')}}">Избранная галлерея</a></h2>
                <div class="doublef-gallery-widget-wrap">
                    <figure class="post-thumbnail">
                        <a href="{{route('album.index')}}"
                           title="Галерея">
                            <img width="1140" height="500"
                                 src="{{asset('images/site/gallery.JPG')}}"
                                 class="attachment-full size-full wp-post-image" alt=""
                                 srcset="{{asset('images/site/gallery.JPG')}}, {{asset('images/site/gallery.JPG')}} 600w"
                                 sizes="(max-width: 1140px) 100vw, 1140px"/>
                        </a>
                    </figure>
                    <div class="doublef-gallery-title-wrap">
                        <h2 class="doublef-gallery-title">
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>