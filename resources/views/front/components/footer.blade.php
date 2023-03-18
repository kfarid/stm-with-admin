<footer>
    <div class="row">
        <div class="col-1-2">
            <div class="inner">
                <h3>{{__('SOSYAL MEDYADA BİZ')}}</h3>
                    @if($socialMedia == null)
                    @foreach($socialMedia as $social)
                        <ul class="social clearfix">
                            <li class="facebook">
                                <a href="{{$social->facebook}}" target="_blank"></a><br></li>
                            <li class="twitter">
                                <a href="{{$social->twitter}}" target="_blank"></a><br></li>
                            <li class="instagram">
                                <a href="{{$social->instagram}}" target="_blank"></a><br></li>
                            <li class="linkedin ">
                                <a href="{{$social->linkedin}}" target="_blank"></a><br></li>
                            <li class="youtube ">
                                <a href="{{$social->youtube}}" target="_blank"></a><br></li>
                        </ul>
                        @endforeach
                    @else
                    <ul class="social clearfix">
                        <li class="facebook">
                            <a href="#" target="_blank"></a><br></li>
                        <li class="twitter">
                            <a href="#" target="_blank"></a><br></li>
                        <li class="instagram">
                            <a href="#" target="_blank"></a><br></li>
                        <li class="linkedin ">
                            <a href="#" target="_blank"></a><br></li>
                        <li class="youtube ">
                            <a href="#" target="_blank"></a><br></li>
                    </ul>
                    @endif
            </div>
        </div>
        <div class="col-1-2 right-side">
            <div class="inner">
                {{--<ul id="zone_10">
                    --}}{{--                    <li id="article_40">
                                            <a title="SİTE HARİTASI" href="tr/site-haritasi.html"><span>{{__('Site Haritası')}}</span></a>
                                        </li>--}}{{--
                    --}}{{--                    <li id="article_1308">
                                            <a title="BİLGİ TOPLUMU HİZMETLERİ" href="#"
                                               target="_blank"><span>{{__('Bilgi Toplumu Hizmetleri')}}</span></a>
                                        </li>--}}{{--
                    <li id="article_38">
                        <a title="KULLANIM KOŞULLARI"
                           href="tr/kullanim-kosullari.html"><span>{{__('Kullanım Koşulları')}}</span></a>
                    </li>
                    <li id="article_1603">
                        <a title="KİŞİSEL VERİLERİN KORUNMASI"
                           href="tr/kisisel-verilerin-korunmasi.html"><span>{{__('Kişisel Verilerin Korunması')}}</span></a>
                    </li>
                    <li id="article_1639" class="lie">
                        <a title="ÇEREZ POLİTİKASI"
                           href="tr/cerez-politikasi.html"><span>{{__('Çerez Politikası')}}</span></a>
                    </li>

                </ul>--}}
                <!-- Processed in 12,0003 ms menu_temp:  -->
                <p class="copyright">©2022 Sederek Ticaret Merkezi, {{__('All rights reserved.')}}</p>
            </div>
        </div>
    </div>
</footer>
