<?php
use App\Http\Middleware\LocaleMiddleware;
?>
<header>
    @foreach($settings as $setting)
        @if($setting->logotext != null)
    <a href="/{{APP::getLocale()}}" class="logo">
        <h1>{{$setting->logotext}}</h1>
    </a>
        @else
    <a href="/{{APP::getLocale()}}" class="logo1">
        <div style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
            <img src="{{$setting->logo}}" class="logo1">
        </div>
    </a>
        @endif
    @endforeach
    <ul>
        @php  $locale = APP::getLocale(); @endphp
        <li class="lang dropdown">
            <a id="dropdownMenuButton1" class="dropdown-toggle" role="button"
               data-toggle="dropdown" type="button" href="#">
                 {{--href="<?= route('setlocale', ['lang' => 'az']) ?>">AZ</a>--}}
                @switch($locale)
                    @case('en')
                    EN
                    @break
                    @case('tr')
                    TR
                    @break
                    @case('az')
                    AZ
                    @break
                    @case('ru')
                    RU
                    @break
                    @default
                    AZ
                @endswitch
        </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'az']) ?>">AZ</a>
                <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'en']) ?>">EN</a>
                <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'ru']) ?>">RU</a>
                <a class="dropdown-item" href="<?= route('setlocale', ['lang' => 'tr']) ?>">TR</a>
                {{--<a class="dropdown-item" href="lang/az">AZ</a>
                <a class="dropdown-item" href="lang/en">EN</a>
                <a class="dropdown-item" href="lang/ru">RU</a>
                <a class="dropdown-item" href="lang/tr">TR</a>--}}
            </div>
        </li>
        {{--<li>
            <button onclick="change()">Change Border</button>
        </li>--}}
        <li class="search"><span></span></li>
        <li class="daily"><span>dsgdfs</span></li>
        <li class="menu">
            <div><span class="l1">dsg</span><span class="l2">fdsg</span><span class="l3">fdsgfd</span></div>
            <p>MENU</p>
        </li>
    </ul>
</header>
