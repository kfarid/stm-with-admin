<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>@yield('title')</title>
    <meta name="DESCRIPTION"
          content="Doğuş Grubu, Türkiye'nin önde gelen grupları arasında yer almakta ve küresel bir oyuncu olma yolunda emin adımlarla ilerlemektedir."/>
    <meta name="KEYWORDS"
          content="Gayrimenkul, Turizm, Restorasyon, Konut, Otel, Mix-used, Gayreimenkul geliştime, konut geliştirme, proje geliştirme, karma projeler"/>
    <!--<link rel="canonical" href=""/>-->
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@foreach($googles as $google)
    {{$google->analytics_link}}
    {!! $google->analytics_script!!}
    {!! $google->search_script!!}
    {{$google->tag_link}}
    {!! $google->tag_script_head!!}
@endforeach

    <!-- Basic Page Needs -->
    <meta http-equiv="X-UA-Compatible " content="IE=11">
    <meta name="viewport " content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#0065b1">
    <meta name="msapplication-navbutton-color" content="#0065b1">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0065b1">
    <meta property="og:type " content="website "/>
    <!--       <meta property="og:site_name " content="STM ">-->
    <meta property="og:url " content="# "/>
    <!--<meta property="og:title " content="STM ANASAYFA " />-->
    <meta property="og:image " content="# "/>
    <meta property="og:image:type " content="image/jpeg "/>
    <meta property="og:image:width " content="780 "/>
    <meta property="og:image:height " content="450 "/>
    <meta property="og:description " content=" "/>

    <!-- Styles -->
    <link href={{asset('Content/assets/css/Carousel.css')}} rel="stylesheet">
    <link href={{asset('Content/assets/css/font-awesome.min.css')}} rel="stylesheet">
    <link href={{asset('Content/assets/css/plugins_min.css')}} rel="stylesheet"/>
    <link href={{asset('Content/assets/css/slick.css')}} rel="stylesheet"/>
    <link href={{asset('Content/assets/css/slick-theme.css')}} rel="stylesheet"/>
    <link href={{asset('Content/assets/css/main.css')}} rel="stylesheet"/>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @media only screen and (max-width: 767px) {
            #splash {
                width: 100% !important;
                height: 100% !important;
                left: 80% !important;
            }

            #splash video {
                width: 100%;
            }
        }

        #overlay {
            background-color: #000;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0.5;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 99999;
        }

        #splash {
            width: 730px;
            height: 440px;
            position: absolute;
            left: 45%;
            top: 65%;
            margin: -300px 0 0 -300px;
            z-index: 99999;
            display: block;
        }

        #splash #close {
            position: absolute;
            right: 0;
            top: 0;

            cursor: pointer;
            width: 35px;
            height: 30px;
            text-indent: -99999px;
        }

        h1 {
           /* color: #1c1c1c;*/
            text-decoration: none !important;
        }

        .logo {
            text-decoration: none !important;
        }
    </style>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=1213343435445466&ev=PageView&noscript=1"/>
    </noscript>
    {{--<script>
        function change()
        {
            document.querySelector("link[href='/Content/assets/css/main.css']").href = "/Content/assets/css/main-dark.css";
            document.querySelector("link[href='/Content/assets/css/plugins_min.css']").href = "/Content/assets/css/plugins_min-dark.css";
        }
    </script>--}}
</head>
<body >
@foreach($googles as $google)
    {!! $google->tag_script_body!!}
@endforeach

<div class="st-container" id="indexPage">


    <x-header></x-header>

    <x-frontsidebar></x-frontsidebar>
    <section class="st-pusher">
        <div class="st-content">
            <!-- Article #1 -->
            <div class="bigslider">
                <div class="slide">
                    <div class="close"></div>
                </div>
                <div class="slider-content"></div>
            </div>
            <div class="st-content-inner">
                <div class="wideSpace">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>


    <div class="search-wrap">
        <form class="morphsearch-form" action="{{route('search')}}" method="get">
            <input class="morphsearch-input" name="search" placeholder="{{__('Search')}} ..." type="text">
            <button class="morphsearch-submit" type="submit">{{__('SEARCH')}}</button>
        </form>
    </div>
    <div class="overlay"></div>
    <div class="search-overlay"></div>
</div>

<p class="article_id">2</p>
<p class="zone_id">8</p>


<div class="tablet-indicator"></div>
<div class="mobile-indicator"></div>

<script>
    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 4; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>
<script src={{asset('Content/assets/js/vendor/jquery-1.11.3.min.js')}}></script>
<script src={{asset('Content/assets/js/vendor/TweenMax.min.js')}}></script>
<script src={{asset('Content/assets/js/vendor/validate.min.js')}}></script>
<script src={{asset('Content/assets/js/plugins.js')}}></script>
<script src={{asset('Content/assets/js/jquery_cookie.js')}}></script>
<script src={{asset('Content/assets/js/slick_min.js')}}></script>
<script src={{asset('Content/assets/js/main.js')}}></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/855351163/?guid=ON&script=0"/>
    </div>
</noscript>
<style>
    .st-content .boxWrapper .openVideo .line-wrap .line1 {
        width: 130px;
        height: 136px !important;
        content: "";
        margin-top: 22%;
        -webkit-transform: translateY(-90px) !important;
        transform: translateY(-90px) !important;
    }

    .st-content .boxWrapper .openVideo .line-wrap .line2, .st-content .boxWrapper .box-item .openVideo svg {
        display: none !important;
    }

    .st-content .boxWrapper .openVideo .line-wrap {
        height: 136px !important;
        width: 136px !important;
    }


    .boxGridWrapper .box-item.col-3 .item-detail {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        width: 100% !important;
        padding: 30px 30px 50px 30px !important;
        z-index: 11 !important;
        -webkit-backface-visibility: hidden !important;
        -moz-backface-visibility: hidden !important;
        backface-visibility: hidden !important;
    }

    .boxGridWrapper .box-item.col-3 .item-detail .title {
        color: #fff !important;
        font-size: 1.2em !important;
    }

    .boxGridWrapper .box-item.col-3 .item-detail:after {
        background: none !important;
    }
</style>
</body>
</html>
