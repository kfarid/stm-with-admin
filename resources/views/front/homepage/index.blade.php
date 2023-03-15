@extends('layouts.front')
@section('title',__('HOME'))
@section('content')
    <x-infograph></x-infograph>
    <article class="sidecontent-inner">
        <div class="boxGridWrapper clearfix boxWrapper indexContent">
            @foreach($homes as $home)
                <div class="box-item filter-7">
                <a href="{{route('second',['slug_en' => $home->{'slug_en'}])}}">
                    <figure><img src="{{$home->img}}" alt="">
                    </figure>
                    <div class="hover">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             src="{{url('http://www.w3.org/2000/svg')}}"
                             version="1.1"
                             preserveAspectRatio="none">
                            <circle cx="148" cy="53" r="50" class="arc" fill="none" stroke="#fff"
                                    stroke-width="2" stroke-dasharray="0,20000"
                                    transform="rotate(-90,100,100)"/>
                        </svg>
                        <div class="line-wrap">
                            <div class="line1"></div>
                            <div class="line2"></div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <div class="group">STM</div>
                        <div class="title">{{Str::upper($home->{'title_'.app()->getLocale()}) }}</div>
                    </div>
                </a>
            </div>
            @endforeach
            {{--<div class="box-item">
                <a href="" data-video="">
                    <figure><img src="{{asset('DogusGrubu_files/202011181172236_900x620_kss.jpg')}}" alt=""></figure>
                    <div class="hover">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             version="1.1"
                             preserveAspectRatio="none">
                            <circle cx="148" cy="53" r="50" class="arc" fill="none"
                                    stroke="#fff" stroke-width="2" stroke-dasharray="0,20000"
                                    transform="rotate(-90,100,100)"/>
                        </svg>
                        <div class="line-wrap">
                            <div class="line1"></div>
                            <div class="line2"></div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <div class="group">DOĞUŞ/GRUBU</div>
                        <div class="title">Kurumsal Sorumluluk</div>
                    </div>
                </a>
            </div>
            <div class="box-item">
                <a href="">
                    <figure><img src="{{asset('DogusGrubu_files/202012812519115_1088_1_1300x970_basin_odasi.jpg')}}"
                                 alt=""></figure>

                    <div class="hover">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             version="1.1"
                             preserveAspectRatio="none">
                            <circle cx="148" cy="53" r="50" class="arc" fill="none" stroke="#fff"
                                    stroke-width="2" stroke-dasharray="0,20000"
                                    transform="rotate(-90,100,100)"/>
                        </svg>
                        <div class="line-wrap">
                            <div class="line1"></div>
                            <div class="line2"></div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <div class="group">{{__('STM GRUBU')}}</div>
                        <div class="title">{{__('BASIN ODASI')}}</div>
                    </div>
                </a>
            </div>--}}
        </div>
    </article>


    <x-footer></x-footer>


    <!-- Article Before Body -->
    <style>
        #indexPage #article-1574 #banner-1574 a {
            width: 100%;
            display: block;
            overflow: hidden;
            height: 100%;
        }

        #banner-1588 a {
            position: absolute;
            width: 100%;
            height: 100%;
            display: block;
        }

        .st-content .boxWrapper .openVideo .line-wrap .line1 {
            width: 130px;
            height: 136px !important;
            background: url({{asset('Content/assets/img/play-button.png')}}) !important;
            content: " ";
            margin-top: 22%;
            -webkit-transform: translateY(-90px) !important;
            transform: translateY(-90px) !important;
        }

        .st-content .boxWrapper .openVideo .line-wrap .line2,
        .st-content .boxWrapper .box-item .openVideo svg {
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

@endsection
