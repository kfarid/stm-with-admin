<div class="tab-content-wrap">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($seconds as $key => $second)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-interval="{{rand(3000,12000)}}">
                    <a href="{{$second->slug_en}}">
                        <img src="{{$second->img}}"
                             class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <div class="title">{{$second->{('title_'.app()->getLocale())} }}</div>
                        </div>
                    </a>
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
            @endforeach
        </div>
    </div>
</div>
