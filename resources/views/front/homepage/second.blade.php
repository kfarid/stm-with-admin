@extends('layouts.front')
@section('content')
    <article class="sidecontent-inner">
        <div class="topSpace">
            <ul class="breadcrumb">
                <li><a href="/">{{__('HOME')}}</a></li>
                <li>{{$homes->title_en}}</li>
            </ul>
            <h1>{{strtoupper($homes->title_en)}}</h1>
        </div>
        <div class="extra-items">
            <div class="box-item">
                <figure><img src="{{asset('DogusGrubu_files/202011181132140_yatirimci_new_2.jpg')}}" alt=""></figure>
            </div>
            <div class="box-item">
                <figure><img src="{{asset('DogusGrubu_files/202011181132140_yatirimci_new_2.jpg')}}" alt=""></figure>
            </div>
        </div>
         <div class="boxMenuWrapper clearfix boxWrapper">
             @foreach($seconds as $second)
                <div class="box-item">
                <a href="">
                    <figure><img src="/{{$second->img}}" alt=""></figure>
                    <div class="item-detail">
                        <div class="title">{{$second->title_en}}</div>
                    </div>
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
                </a>
            </div>
             @endforeach
         </div>
    </article>

    <x-footer></x-footer>
@endsection

