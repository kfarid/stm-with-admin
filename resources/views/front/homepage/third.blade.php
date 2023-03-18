@extends('layouts.front  ')
@foreach($seconds as $second)
    @section('title',$second->{'title_'.app()->getLocale()})
@endforeach
@section('content')
    <x-backbutton></x-backbutton>
    <div class="fixedColumn hover" style="width: 38%;">
        @foreach($thirds as $third)
            <img class="inner seperator" src="{{$third->img}}"
                 style="opacity: 1; transform:
                 matrix(1, 0, 0, 1, 0, 0);">
            <div class="cover" style="transform: translate(100%, 0%) matrix(1, 0, 0, 1, 0, 0);"></div>
            </img>
        @endforeach
    </div>
    <div class="sideContent" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
        <article class="sidecontent-inner1">
            <ul class="breadcrumb">
                <li id="26" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" itemref="28">
                    <a href="{{route('index')}}" itemprop="url">
                        <span itemprop="title">{{__('HOME')}}</span>
                    </a>
                </li>
                <li id="28" class="active" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"
                    itemprop="child">
                    @foreach($seconds as $second)
                        <a href="" itemprop="url">
                            <span itemprop="title">{{Str::upper($second->{'title_'.app()->getLocale()}) }}</span>
                        </a>
                    @endforeach
                </li>
            </ul>
            @foreach($thirds as $third)
                <h1 class="title-text">{{$third->{'title_'.app()->getLocale()} }}</h1>
                <div>{!! $third->{'textarea_'.app()->getLocale()}!!}
                </div>

                @foreach($panels as $panel)
                    @if($third->id == $panel->third_id)
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div data-parent="#accordion" data-target="#collapse{{$panel->id}}"
                                         data-toggle="collapse">
                                        {{$panel->{'name_'.app()->getLocale()} }}</div>
                                </div>
                                <div class="panel-collapse collapse" id="collapse{{$panel->id}}">
                                    <div class="inner">
                                        <p>{!! $panel->{'text_'.app()->getLocale()} !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <br>
                    @endif
                @endforeach
                    @foreach($cards as $card)
                        @if($third->id == $card->third_id)
                            @if($card->email !== null || $card->location !== null)
                        <div class="image-list clearfix withinfo">
                                <div class="colon-2 card">
                                    <div class="col-inner">
                                        <figure>
                                            <img alt="" src="{{$card->img}}" ></figure>
                                        <div class="info">
                                            <div class="info-in">
                                                <p class="title">{{$card->title}}</p>
                                                <ul class="contact-info">
                                                    <li class="location">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        {{$card->location}}
                                                    </li>
                                                    <li class="email">
                                                        <a href="mailto:{{$card->email}}">
                                                            <i class="fa-solid fa-envelope"></i>
                                                            {{$card->email}}
                                                        </a>
                                                    </li>
                                                    <li class="phone">
                                                        <a href="tel:+{{$card->phone}}">
                                                            <i class="fa-solid fa-phone"></i>
                                                            +{{$card->phone}}
                                                        </a>
                                                    </li>
                                                    <li class="fax">
                                                        <a href="tel:+{{$card->fax}}">
                                                            <i class="fa-solid fa-fax"></i>
                                                            +{{$card->fax}}
                                                        </a>
                                                    </li>
                                                    <li class="mail">
                                                        <a href="{{$card->link}}" target="_blank">
                                                            <i class="fa-solid fa-globe"></i>
                                                            <strong>{{$card->link}}</strong>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="image-list clearfix withinfo">
                                    <div class="colon-2 card">
                                        <div class="col-inner">
                                            <figure>
                                                <img alt="" src="{{$card->img}}" >
                                            </figure>
                                        </div>
                                    </div>
                            @endif

                            @endif
                        @endforeach
                    </div>

            @endforeach
            <br>
            <br>


        </article>
    </div>
    <div class="sideContent" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
        <div class="related-section">
            <div class="inner">
                <div class="tab-wrapper">
                    <div class="tab-link-wrap col-2">
                        <ul class="clearfix">
                            <li class="active-link">{{__('İLGİLİ İÇERİKLER')}}</li>
                            <li>{{__('GÜNCEL İÇERİKLER')}}</li>

                        </ul>
                    </div>
                    <x-slider></x-slider>


                    <!-- Processed in 7,0022 ms menu_temp:  -->
                    <ul class="bottom-list" id="zone_10">
                        <li id="article_38">
                            <a title="KULLANIM KOŞULLARI"
                               href="kullanim-kosullari"><span>{{__('Kullanım Koşulları')}}</span></a>
                        </li>
                        <li id="article_1603">
                            <a title="KİŞİSEL VERİLERİN KORUNMASI"
                               href="kisisel-verilerin-korunmasi"><span>{{__('Kişisel Verilerin Korunması')}}</span></a>
                        </li>
                        <li id="article_1639" class="lie">
                            <a title="ÇEREZ POLİTİKASI" href="cerez-politikasi"><span>{{__('Çerez Politikası')}}</span></a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
@endsection
