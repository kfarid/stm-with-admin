@extends('layouts.front  ')
@section('title','KURUCUMUZ')
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
                        <span itemprop="title">{{__('STM TANIYIN')}}</span>
                    </a>
                </li>
                <li id="28" class="active" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"
                    itemprop="child">
                    @foreach($seconds as $second)
                    <a href="" itemprop="url">
                        <span itemprop="title">{{$second->title_en}}</span>
                    </a>
                    @endforeach
                </li>
            </ul>
            @foreach($thirds as $third)
            <h1>{{$third->title_en}}</h1>
            <div>{!! $third->textarea_en!!}
            </div>

                @foreach($panels as $panel)
                    @if($third->id == $panel->third_id)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div data-parent="#accordion" data-target="#collapse1" data-toggle="collapse">
                                    {{$panel->name_en}}</div>
                            </div>
                            <div class="panel-collapse collapse" id="collapse1">
                                <div class="inner">
                                    <p>{!! $panel->text_en!!}</p>
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
                <div class="image-list clearfix withinfo column-c1">
                    <div class="colon-2">
                        <div class="col-inner">
                            <figure>
                                <img alt="" src="{{$card->img}}" style="max-width: 200px"></figure>
                            <div class="info">
                                <div class="info-in">
                                    <p class="title">{{$card->title}}</p>
                                    <ul class="contact-info">
                                        <li class="location">{{$card->location}} </li>
                                        <li class="address">{{$card->address}} </li>
                                        <li class="email">{{$card->email}} </li>
                                        <li class="phone">
                                            <a href="tel:+{{$card->phone}}">+{{$card->phone}}</a></li>
                                        <li class="fax">
                                            <a href="tel:+{{$card->fax}}">+{{$card->fax}}</a></li>
                                        <li class="mail">
                                         <a href="{{$card->link}}" target="_blank"><strong>{{$card->link}}</strong></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @else
                        <br>
                    @endif
                @endforeach

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
                            <li class="active-link">İLGİLİ İÇERİKLER</li>
                            <li>GÜNCEL İÇERİKLER</li>

                        </ul>
                    </div>
                    <div class="tab-content-wrap">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="3000">

                                    <a href="{{route('index')}}">
                                        <img src="{{asset('DogusGrubu_files/2020112411485660_2_1_sahne1.gif')}}"
                                             class="d-block w-100" alt="...">
                                        <div class="carousel-caption">
                                            <div class="title">{{__('STM TANIYIN')}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="carousel-item" data-interval="6000">
                                    <a href="">
                                        <img
                                            src="{{asset('DogusGrubu_files/20201124115147825_9_1_645x450_hakkimizda.jpg')}}"
                                            class="imgItem" alt="...">
                                        <div class="carousel-caption">

                                            <div class="title">HAKKIMIZDA</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="carousel-item" data-interval="9000">
                                    <a href="">
                                        <img
                                            src="{{asset('DogusGrubu_files/20201124115229830_4_1_645x450_yonetim_kurulu.jpg')}}"
                                            class="imgItem" alt="...">
                                        <div class="carousel-caption">

                                            <div class="title">YÖNETİM KURULU</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="carousel-item" data-interval="12000">
                                    <a href="">
                                        <img src="{{asset('DogusGrubu_files/202011241153080_2_1_sahne1.gif')}}"
                                             class="imgItem"
                                             alt="...">
                                        <div class="carousel-caption">

                                            <div class="title">İNSAN KAYNAKLARI</div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Processed in 7,0022 ms menu_temp:  -->
                <ul class="bottom-list" id="zone_10">
                    <li id="article_40">
                        <a title="SİTE HARİTASI" href="/tr/site-haritasi"><span>Site Haritası</span></a>
                    </li>
                    <li id="article_1308">
                        <a title="BİLGİ TOPLUMU HİZMETLERİ"
                           href="https://e-sirket.mkk.com.tr/esir/Dashboard.jsp#/sirketbilgileri/10717" target="_blank"><span>Bilgi Toplumu Hizmetleri</span></a>
                    </li>
                    <li id="article_38">
                        <a title="KULLANIM KOŞULLARI" href="/tr/kullanim-kosullari"><span>Kullanım Koşulları</span></a>
                    </li>
                    <li id="article_1603">
                        <a title="KİŞİSEL VERİLERİN KORUNMASI" href="/tr/kisisel-verilerin-korunmasi"><span>Kişisel Verilerin Korunması</span></a>
                    </li>
                    <li id="article_1639" class="lie">
                        <a title="ÇEREZ POLİTİKASI" href="/tr/cerez-politikasi"><span>Çerez Politikası</span></a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
@endsection
