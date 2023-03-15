@extends('layouts.front')
@foreach($homes as $home)
    @section('title',$home->{'title_'.app()->getLocale()})
@endforeach
@section('content')
    <article class="sidecontent-inner">
        <div class="topSpace">
            <ul class="breadcrumb">
                <li><a href="/">{{__('HOME')}}</a></li>
                @foreach($homes as $home)
                <li>{{Str::upper($home->{'title_'.app()->getLocale()}) }}</li>
            </ul>
            <h1>{{strtoupper($home->{'title_'.app()->getLocale()})}}</h1>
            @endforeach
        </div>
         <div class="boxMenuWrapper clearfix boxWrapper">
             @foreach($seconds as $second)
                <div class="box-item">
                <a href="{{route('third',['slug_en'=>$second->slug_en])}}">
                    <figure><img src="{{$second->img}}" alt=""></figure>
                    <div class="item-detail">
                        <div class="title">{{$second->{'title_'.app()->getLocale()} }}</div>
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

