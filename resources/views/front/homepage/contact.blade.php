@extends('layouts.front')
@section('title','Contacts')
@section('content')

    <section class="st-pusher">
        <div class="mouse-frame"><span class="mouse"></span></div>
        <div class="st-content">
            <!-- Article #1 -->
            <div class="st-content-inner">


                <div class="fixedColumn hover" style="width: 38%;">
                    <div class="inner"
                         style="background-image: url({{asset('Content/assets/img/1089_1_1300-970iletisim.jpg')}}); opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                        <div class="cover" style="transform: translate(100%, 0%) matrix(1, 0, 0, 1, 0, 0);"></div>
                    </div>
                </div>
                <div class="sideContent" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <article class="sidecontent-inner" style="min-height: 600px;">
                        <h1>{{__('CONTACT US')}}</h1>
                        @foreach($contacts as $c)
                        <div class="subtitle">
                            <ul class="contact-info">
                                <li class="address">{{$c->address}}</li>
                                <li class="phone"><a href="tel:+{{$c->num1}}"> +{{$c->num1}}</a></li>
                                <li class="phone"><a href="tel:+{{$c->num2}}">+{{$c->num2}}</a></li>
                                <li class="mail"><a href="mailto:{{$c->email}}">{{$c->email}}</a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <form method="POST" action="{{route('contact.store')}}" class="contactForms">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-1-2 form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input class="form-control" name="name" type="text" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1-2 form-group">
                                    <label for="email">{{__('Email')}}</label>
                                    <input class="form-control" name="email" type="text" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1-2 form-group">
                                    <label for="subject">{{__('Subject')}}</label>
                                    <input class="form-control" name="subject" type="text" required>
                                    @if ($errors->has('subject'))
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1-1 form-group">
                                    <label for="phone">{{__('Phone')}}</label>
                                    <input class="form-control" name="phone" type="number" required>
                                    @if ($errors->has('number'))
                                        <span class="text-danger">{{ $errors->first('number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1-1 form-group">
                                    <label for="message">{{__('Message')}}</label>
                                    <textarea class="form-control" name="message" id="message" required></textarea>
                                    @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button id="btn-contact-send" class="submit" value="Send" type="submit">
                                        <i class="far fa-paper-plane"></i>
                                        {{__('SEND')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </article>

                {{-- @if(Session::has('success'))
                     <div class="alert alert-success">
                         {{ Session::get('success') }}
                         @php
                             Session::forget('success');
                         @endphp
                     </div>

             @endif--}}
                <!-- Processed in 7,0022 ms menu_temp:  -->
                    <ul class="bottom-list" id="zone_10">
                        <li id="article_40">
                            <a title="SİTE HARİTASI" href="https://www.dogusgrubu.com.tr/tr/site-haritasi"><span>{{__('Site Haritası')}}</span></a>
                        </li>
                        <li id="article_38">
                            <a title="KULLANIM KOŞULLARI"
                               href="https://www.dogusgrubu.com.tr/tr/kullanim-kosullari"><span>{{__('Kullanım Koşulları')}}</span></a>
                        </li>
                        <li id="article_1603">
                            <a title="KİŞİSEL VERİLERİN KORUNMASI"
                               href="https://www.dogusgrubu.com.tr/tr/kisisel-verilerin-korunmasi"><span>{{__('Kişisel Verilerin Korunması')}}</span></a>
                        </li>
                        <li id="article_1639" class="lie">
                            <a title="ÇEREZ POLİTİKASI" href="https://www.dogusgrubu.com.tr/tr/cerez-politikasi"><span>{{__('Çerez Politikası')}}</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
