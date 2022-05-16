@extends('layouts.front')
@section('title','Search')
@section('content')

    <section class="st-pusher">
        <div class="mouse-frame"><span class="mouse"></span></div>
        <div class="st-content">
            <!-- Article #1 -->
            <div class="bigslider">
                <div class="slide">
                    <div class="close"></div>
                </div>
                <div class="slider-content"></div>
            </div>
            <div class="st-content-inner">


                <div class="fixedColumn hover" style="width: 38%;">
                    <div class="inner"
                         style="background-image: url(/Content/assets/img/1300x970_aramasonuc.jpg); opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                        <div class="cover" style="transform: translate(100%, 0%) matrix(1, 0, 0, 1, 0, 0);"></div>
                    </div>
                </div>

                <div class="sideContent" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <article class="sidecontent-inner" style="min-height: 454px;">
                        <h1>{{__('SEARCH RESULT')}}</h1>
                        <!-- Article #1 -->
                        <form class="search-form" action="{{ route('search') }}" method="GET">
                            <input class="search-input" name="seacrh" placeholder="{{__('Search')}} ..." type="text">
                            <button class="search-submit" type="submit"></button>
                        </form>
                        <br>
                        @if($seconds->isNotEmpty())
                                @foreach ($seconds as $second)
                                    <div class="search-result-list">
                                        <div class="item">
                                            <a href="{{route('third',['slug_en'=>$second['slug_en']])}}">
                                                <p class="title">{{ $second->{('title_'.app()->getLocale())} }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                        @else
                            <div>
                                <h2><strong> No search result found.</strong></h2>
                            </div>
                        @endif
                    </article>
                </div>


            </div>
        </div>
    </section>

@endsection


