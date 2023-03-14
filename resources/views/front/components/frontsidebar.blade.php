<nav class="sidenav nav-menu">
    <ul id="zone_8">
        <li id="article_2">
            <a title="&#304;LET&#304;&#350;&#304;M"
               href="{{route('contact')}}"><span>{{__('CONTACT US')}}</span></a>
        </li>
        @foreach($links as $link)
        <li id="article_2">
            <a title="{{$link->{'title_'.app()->getLocale()} }}" href="{{route('second',$link->id)}}"><span>{{Str::upper($link->{'title_'.app()->getLocale()}) }}</span></a>
        </li>
        @endforeach
    </ul>
    <!-- Processed in 16,0012 ms menu_temp:  -->
</nav>

{{--<nav class="sidenav nav-daily filter-action">
    <ul>
        <li class="all active">
            <div class="link-wrap"><span>TÜMÜ</span></div>
        </li>
        <!--<li class="filter-1 "><div class="link-wrap "><span>YENİ</span></div></li>-->
        <li class="filter-2">
            <div class="link-wrap"><span>SPOR</span></div>
        </li>
        <li class="filter-3">
            <div class="link-wrap"><span>KÜLTÜR SANAT</span></div>
        </li>
        <li class="filter-4">
            <div class="link-wrap"><span>TURİZM</span></div>
        </li>
        <li class="filter-5">
            <div class="link-wrap"><span>HEP DESTEK</span></div>
        </li>
        <li class="filter-6">
            <div class="link-wrap"><span>DOĞUŞLU OLMAK</span></div>
        </li>
        <li class="filter-7">
            <div class="link-wrap"><span>DOĞUŞ GRUBU</span></div>
        </li>
        <li class="filter-8">
            <div class="link-wrap"><span>DİĞER</span></div>
        </li>
    </ul>
</nav>--}}
