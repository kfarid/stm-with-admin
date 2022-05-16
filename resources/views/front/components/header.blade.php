<header>
    <a href="/" class="logo">
        <h1>STM</h1>
    </a>
    {{--<a href="/" class="logo1">
        <span style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
            <img src="/Content/assets/img/icons-plus.jpg" class="logo1">
        </span>
    </a>--}}
    <ul>
        @php $locale = session()->get('locale'); @endphp
        <li class="lang dropdown">
            <a id="dropdownMenuButton1" class="dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" type="button">
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
                <a class="dropdown-item" href="lang/az">AZ</a>
                <a class="dropdown-item" href="lang/en">EN</a>
                <a class="dropdown-item" href="lang/ru">RU</a>
                <a class="dropdown-item" href="lang/tr">TR</a>
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
