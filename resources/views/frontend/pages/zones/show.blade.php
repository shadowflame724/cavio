<!doctype html>
<meta charset=utf-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=description content="">
<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1"><title>{{ $page->title }}</title>
<meta name=msapplication-tap-highlight content=no>
<link rel=manifest href="manifest.json">
<meta name=mobile-web-app-capable content=yes>
<meta name=application-name content="{{ $page->title }}">
<link rel=icon sizes=192x192 href="http://cvo.spongeservice.com.ua//upload/images/touch/chrome-touch-icon-192x192.png">
<meta name=apple-mobile-web-app-capable content=yes>
<meta name=apple-mobile-web-app-status-bar-style content=black>
<meta name=apple-mobile-web-app-title content="{{ $page->title }}">
<link rel=apple-touch-icon href="http://cvo.spongeservice.com.ua//upload/images/touch/apple-touch-icon.png">
<meta name=msapplication-TileImage content=/upload/images/touch/ms-touch-icon-144x144-precomposed.png>
<meta name=msapplication-TileColor content=#2F3BA2>
<meta name=theme-color content=#2F3BA2>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css>
{{ Html::style('css/frontend/main.css') }}
{{ Html::style('css/frontend/smooth-scrollbar.css') }}
{{ Html::script('js/frontend/url.js') }}
@include('frontend.includes.physics_script')
{{ Html::script('js/frontend/two.js') }}
<body id="zone-col" class="zone-col">
@include('frontend.includes.header')
@include('frontend.includes.login_modal')
<div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
<section id="zones-mobal" class="zone-col-modal">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>
                <div class="inner-zone-col-modal bg-white-marmur">
                    <div class="wrap-drop-list-zc">
                        <div class="title-list-type">{{ trans('frontend.zones-collections.zones') }}</div>
                        <div id=wrap-news-type class="drop-down show">
                            <span class="curr-news-type">{{ trans('frontend.zones-collections.allZones') }}</span>
                            <ul class="zc-modal-types clearfix">
                                @foreach($zone->collectionZones as $collectionZones)
                                    <li>
                                        <a href=#>
                                            @if (App::getLocale() == 'ru')
                                                {{ $collectionZones->collection->title_ru }}
                                            @elseif(App::getLocale() == 'it')
                                                {{ $collectionZones->collection->title_it }}
                                            @else
                                                {{ $collectionZones->collection->title }}
                                            @endif
                                        </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="zc-modal-carousel">
                        <div class="swiper-wrapper shadow-top-bot">
                            <div class="swiper-slide zc-modal-slide"
                                 style="background-image: url('/upload/images/zc-carousel-item1.jpg')"></div>
                            <div class="swiper-slide zc-modal-slide"
                                 style="background-image: url('/upload/images/banner-main-1.jpg')"></div>
                            <div class="swiper-slide zc-modal-slide"
                                 style="background-image: url('/upload/images/zc-carousel-item2.jpg')"></div>
                        </div>
                        <div class="zc-modal-swip-arrow prev"></div>
                        <div class="zc-modal-swip-arrow next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="wrap-zc-modal-product-list">
                        <div class="zon-col-upper_list">
                            <div class="wrap-descr_and_title col clearfix">
                                <div class="descr-zon_col-item-name col">
                                    @if (App::getLocale() == 'ru')
                                        {{ $zone->title_ru }}
                                    @elseif(App::getLocale() == 'it')
                                        {{ $zone->title_it }}
                                    @else
                                        {{ $zone->title }}
                                    @endif
                                </div>
                            </div>
                            <div class="zc-modal-prod-numb"><span class="prod-numb">345</span> {{ trans('frontend.zones-collections.products') }}</div>
                        </div>

                        <div class="zc-modal-product-list clearfix">

                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-1.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>


                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-2.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data">
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data">
                                        <div class="product-code">#pr117</div>
                                        <div class="product-name">Bench</div>
                                        <div class="product-size">Como</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class=zc-modal-product-show-more>
                            <button class="btn dark" content="{{ trans('frontend.zones-collections.showMore') }}">{{ trans('frontend.zones-collections.showMore') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<main id=main-scrollbar>
    <section class="wrap-banner no_space">
        <div class=wrap-banner-cont>
            <h3 class=section-title>
                @if (App::getLocale() == 'ru')
                    {{ $zone->title_ru }}
                @elseif(App::getLocale() == 'it')
                    {{ $zone->title_it }}
                @else
                    {{ $zone->title }}
                @endif
                    <a href="{{ route('frontend.zones') }}"
                                        class="back-zol_col anim-underline">← {{ trans('frontend.zones-collections.backToZones') }}</a>
                <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                </svg>
            </h3>
        </div>
    </section>
    <section>
        <div class=container>
            <div class="zon-col-list clearfix z_c-list">
                @foreach($zone->collectionZones as $collectionZone)
                <div class="item-coll zon-col z_c-list to_modal">
                    <a href=#>
                        <div class="wrap-img-bg small">
                            <div class="img-back wave-dark">
                                <svg width=1395.63 height=1237.68>
                                    <use xlink:href=wave.svg#wave></use>
                                </svg>
                            </div>
                            <img src=/upload/images/{{ $collectionZone->image }} alt="">
                        </div>
                        <div>
                            <div class=coll-name>
                                @if (App::getLocale() == 'ru')
                                    {{ $collectionZone->collection->title_ru  }}
                                @elseif(App::getLocale() == 'it')
                                    {{ $collectionZone->collection->title_it  }}
                                @else
                                    {{ $collectionZone->collection->title  }}
                                @endif
                                <span class=wrap-coll-name-arrow>
                                        <span class=coll-name-arrow>→</span>
                                    </span>
                            </div>
                            <div class=numb-prod>{{ $collectionZone->collection->goods->count() }} {{ trans('frontend.zones-collections.products') }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('frontend.includes.footer')
</main>
<svg xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink style=display:none>
    <symbol id=stash viewBox="0 0 49 37">
        <path fill-rule=evenodd
              d="M40.773,0.950 L37.515,8.985 L-0.001,8.985 L6.130,26.022 L30.423,26.022 L29.718,28.015 C27.578,28.041 25.795,29.853 25.340,31.887 L14.621,31.887 C14.163,29.835 12.354,28.009 10.188,28.009 C7.679,28.009 5.636,29.788 5.636,32.326 C5.636,34.864 7.679,36.928 10.188,36.928 C12.354,36.928 14.163,35.960 14.621,33.908 L25.340,33.908 C25.798,35.960 27.608,36.928 29.773,36.928 C32.283,36.928 34.325,34.864 34.325,32.326 C34.325,30.487 33.247,29.196 31.702,28.458 L42.104,2.971 L49.000,2.971 L49.000,0.950 L40.773,0.950 ZM10.188,34.907 C8.781,34.907 7.636,33.750 7.636,32.326 C7.636,30.902 8.781,30.030 10.188,30.030 C11.596,30.030 12.741,30.902 12.741,32.326 C12.741,33.750 11.596,34.907 10.188,34.907 ZM32.326,32.326 C32.326,33.750 31.180,34.907 29.773,34.907 C28.366,34.907 27.221,33.750 27.221,32.326 C27.221,30.902 28.366,30.030 29.773,30.030 C31.180,30.030 32.326,30.902 32.326,32.326 ZM31.258,24.000 L7.533,24.000 L2.846,11.007 L36.681,11.007 L31.258,24.000 Z"/>
    </symbol>
    <symbol id=main-logo viewBox="0 0 240 39">
        <path fill-rule=evenodd
              d="M228.686,38.199 L228.686,37.665 L231.919,36.863 L228.956,27.247 L217.912,27.247 L215.219,36.329 L218.720,37.665 L218.720,38.199 L210.639,38.199 L210.639,37.665 L214.141,36.329 L224.646,-0.001 L225.455,-0.001 L236.768,36.863 L240.000,37.665 L240.000,38.199 L228.686,38.199 ZM223.245,8.547 L218.181,26.231 L228.633,26.231 L223.245,8.547 ZM207.488,36.169 C206.572,37.060 205.485,37.754 204.229,38.253 C202.971,38.750 201.606,39.000 200.134,39.000 C198.769,39.000 197.602,38.867 196.632,38.600 C195.663,38.333 194.855,38.021 194.208,37.665 C193.454,37.273 192.825,36.828 192.323,36.329 C192.035,36.863 191.649,37.363 191.165,37.825 C190.680,38.287 190.168,38.590 189.629,38.733 L188.821,38.733 C188.856,38.234 188.892,37.700 188.929,37.131 C188.964,36.668 189.000,36.151 189.036,35.581 C189.072,35.012 189.090,34.459 189.090,33.925 C189.090,33.320 189.072,32.723 189.036,32.135 C189.000,31.548 188.964,31.005 188.929,30.506 C188.892,29.936 188.856,29.384 188.821,28.849 L189.629,28.849 C190.455,31.806 191.649,34.058 193.212,35.608 C194.774,37.157 196.902,37.932 199.595,37.932 C201.751,37.932 203.501,37.247 204.848,35.875 C206.195,34.504 206.868,32.608 206.868,30.185 C206.868,28.725 206.437,27.470 205.576,26.419 C204.713,25.368 203.636,24.397 202.343,23.507 C201.050,22.617 199.640,21.744 198.114,20.889 C196.587,20.034 195.177,19.064 193.885,17.977 C192.591,16.891 191.515,15.618 190.652,14.157 C189.791,12.697 189.360,10.917 189.360,8.814 C189.360,7.604 189.593,6.464 190.060,5.395 C190.526,4.327 191.173,3.392 191.999,2.590 C192.825,1.789 193.794,1.157 194.908,0.694 C196.021,0.231 197.225,-0.001 198.518,-0.001 C199.595,-0.001 200.547,0.142 201.373,0.427 C202.199,0.712 202.899,1.014 203.474,1.335 C204.121,1.727 204.713,2.172 205.252,2.670 C205.539,2.136 205.925,1.638 206.410,1.175 C206.895,0.712 207.407,0.409 207.946,0.266 L208.754,0.266 C208.682,0.801 208.627,1.335 208.592,1.869 C208.556,2.368 208.529,2.893 208.511,3.445 C208.493,3.998 208.485,4.540 208.485,5.075 C208.485,5.681 208.493,6.277 208.511,6.865 C208.529,7.452 208.556,7.996 208.592,8.494 C208.627,9.064 208.682,9.616 208.754,10.150 L207.946,10.150 C207.119,7.194 205.970,4.941 204.498,3.392 C203.025,1.842 201.212,1.068 199.057,1.068 C197.297,1.068 195.824,1.674 194.639,2.884 C193.454,4.095 192.861,5.716 192.861,7.746 C192.861,9.207 193.293,10.462 194.154,11.512 C195.016,12.564 196.094,13.534 197.387,14.424 C198.680,15.315 200.088,16.187 201.616,17.042 C203.142,17.897 204.551,18.868 205.845,19.954 C207.138,21.041 208.215,22.314 209.077,23.774 C209.939,25.235 210.370,27.015 210.370,29.117 C210.370,30.506 210.118,31.806 209.616,33.016 C209.112,34.228 208.404,35.279 207.488,36.169 ZM176.699,37.665 L179.932,36.863 L176.969,27.247 L165.925,27.247 L163.232,36.329 L166.733,37.665 L166.733,38.199 L158.652,38.199 L158.652,37.665 L162.154,36.329 L172.659,-0.001 L173.468,-0.001 L184.781,36.863 L188.013,37.665 L188.013,38.199 L176.699,38.199 L176.699,37.665 ZM171.258,8.547 L166.194,26.231 L176.646,26.231 L171.258,8.547 ZM155.663,35.928 C154.782,36.908 153.768,37.665 152.619,38.199 C151.469,38.733 150.248,39.000 148.956,39.000 C147.267,39.000 145.633,38.600 144.053,37.798 C142.472,36.997 141.063,35.786 139.824,34.165 C138.585,32.545 137.597,30.515 136.861,28.075 C136.124,25.636 135.757,22.777 135.757,19.500 C135.757,16.223 136.124,13.365 136.861,10.925 C137.597,8.486 138.566,6.455 139.770,4.834 C140.973,3.214 142.329,2.003 143.838,1.201 C145.346,0.400 146.872,-0.001 148.417,-0.001 C149.279,-0.001 150.060,0.142 150.760,0.427 C151.460,0.712 152.062,1.033 152.565,1.388 C153.139,1.781 153.643,2.226 154.073,2.724 C154.360,2.190 154.747,1.682 155.232,1.201 C155.717,0.721 156.229,0.409 156.767,0.266 L157.576,0.266 C157.503,0.801 157.449,1.335 157.414,1.869 C157.378,2.368 157.351,2.893 157.333,3.445 C157.314,3.998 157.306,4.540 157.306,5.075 C157.306,5.681 157.314,6.277 157.333,6.865 C157.351,7.452 157.378,7.996 157.414,8.494 C157.449,9.064 157.503,9.616 157.576,10.150 L156.767,10.150 C155.940,7.194 154.836,4.941 153.454,3.392 C152.071,1.842 150.572,1.068 148.956,1.068 C147.950,1.068 146.963,1.353 145.993,1.922 C145.023,2.493 144.161,3.481 143.407,4.888 C142.652,6.295 142.041,8.183 141.575,10.551 C141.108,12.920 140.874,15.903 140.874,19.500 C140.874,23.098 141.108,26.080 141.575,28.449 C142.041,30.818 142.671,32.705 143.460,34.112 C144.250,35.519 145.166,36.508 146.208,37.077 C147.249,37.647 148.344,37.932 149.495,37.932 C150.428,37.932 151.380,37.683 152.350,37.184 C153.320,36.686 154.208,35.991 155.017,35.100 C155.825,34.210 156.506,33.159 157.064,31.948 C157.620,30.738 157.970,29.437 158.114,28.048 L158.922,28.048 C158.778,29.651 158.418,31.120 157.845,32.456 C157.270,33.791 156.542,34.949 155.663,35.928 ZM127.457,21.670 C126.080,21.670 124.963,20.544 124.963,19.155 C124.963,17.766 126.080,16.640 127.457,16.640 C128.834,16.640 129.951,17.766 129.951,19.155 C129.951,20.544 128.834,21.670 127.457,21.670 ZM114.505,34.165 C113.301,35.786 111.946,36.997 110.438,37.798 C108.929,38.600 107.402,39.000 105.858,39.000 C104.314,39.000 102.788,38.600 101.279,37.798 C99.771,36.997 98.415,35.786 97.212,34.165 C96.008,32.545 95.038,30.515 94.303,28.075 C93.566,25.636 93.198,22.777 93.198,19.500 C93.198,16.223 93.566,13.365 94.303,10.925 C95.038,8.486 96.008,6.455 97.212,4.834 C98.415,3.214 99.771,2.003 101.279,1.201 C102.788,0.400 104.314,-0.001 105.858,-0.001 C107.402,-0.001 108.929,0.400 110.438,1.201 C111.946,2.003 113.301,3.214 114.505,4.834 C115.708,6.455 116.677,8.486 117.414,10.925 C118.150,13.365 118.518,16.223 118.518,19.500 C118.518,22.777 118.150,25.636 117.414,28.075 C116.677,30.515 115.708,32.545 114.505,34.165 ZM112.727,10.391 C112.278,7.987 111.685,6.072 110.949,4.647 C110.213,3.223 109.395,2.226 108.498,1.655 C107.600,1.086 106.720,0.801 105.858,0.801 C104.996,0.801 104.116,1.086 103.219,1.655 C102.321,2.226 101.503,3.223 100.767,4.647 C100.031,6.072 99.438,7.987 98.990,10.391 C98.540,12.795 98.316,15.832 98.316,19.500 C98.316,23.169 98.540,26.205 98.990,28.609 C99.438,31.013 100.031,32.928 100.767,34.352 C101.503,35.777 102.321,36.775 103.219,37.344 C104.116,37.914 104.996,38.199 105.858,38.199 C106.720,38.199 107.600,37.914 108.498,37.344 C109.395,36.775 110.213,35.777 110.949,34.352 C111.685,32.928 112.278,31.013 112.727,28.609 C113.176,26.205 113.401,23.169 113.401,19.500 C113.401,15.832 113.176,12.795 112.727,10.391 ZM77.575,37.665 L80.807,36.863 L80.807,2.136 L77.575,1.335 L77.575,0.801 L88.619,0.801 L88.619,1.335 L85.387,2.136 L85.387,36.863 L88.619,37.665 L88.619,38.199 L77.575,38.199 L77.575,37.665 ZM62.761,39.000 L61.952,39.000 L50.640,2.136 L47.407,1.335 L47.407,0.801 L58.721,0.801 L58.721,1.335 L55.488,2.136 L64.108,30.185 L71.650,2.670 L68.148,1.335 L68.148,0.801 L76.229,0.801 L76.229,1.335 L72.727,2.670 L62.761,39.000 ZM52.256,37.665 L52.256,38.199 L40.943,38.199 L40.943,37.665 L44.175,36.863 L41.212,27.247 L30.168,27.247 L27.474,36.329 L30.977,37.665 L30.977,38.199 L22.896,38.199 L22.896,37.665 L26.397,36.329 L36.902,-0.001 L37.711,-0.001 L49.024,36.863 L52.256,37.665 ZM35.502,8.547 L30.438,26.231 L40.889,26.231 L35.502,8.547 ZM19.906,35.928 C19.025,36.908 18.011,37.665 16.861,38.199 C15.712,38.733 14.491,39.000 13.198,39.000 C11.510,39.000 9.876,38.600 8.296,37.798 C6.715,36.997 5.306,35.786 4.067,34.165 C2.828,32.545 1.840,30.515 1.104,28.075 C0.367,25.636 -0.000,22.777 -0.000,19.500 C-0.000,16.223 0.367,13.365 1.104,10.925 C1.840,8.486 2.809,6.455 4.013,4.834 C5.216,3.214 6.572,2.003 8.080,1.201 C9.589,0.400 11.115,-0.001 12.659,-0.001 C13.522,-0.001 14.302,0.142 15.003,0.427 C15.703,0.712 16.304,1.033 16.808,1.388 C17.382,1.781 17.885,2.226 18.316,2.724 C18.603,2.190 18.990,1.682 19.474,1.201 C19.959,0.721 20.471,0.409 21.010,0.266 L21.818,0.266 C21.746,0.801 21.692,1.335 21.656,1.869 C21.620,2.368 21.593,2.893 21.576,3.445 C21.557,3.998 21.549,4.540 21.549,5.075 C21.549,5.681 21.557,6.277 21.576,6.865 C21.593,7.452 21.620,7.996 21.656,8.494 C21.692,9.064 21.746,9.616 21.818,10.150 L21.010,10.150 C20.183,7.194 19.079,4.941 17.697,3.392 C16.313,1.842 14.815,1.068 13.198,1.068 C12.192,1.068 11.205,1.353 10.235,1.922 C9.266,2.493 8.404,3.481 7.649,4.888 C6.895,6.295 6.284,8.183 5.818,10.551 C5.351,12.920 5.117,15.903 5.117,19.500 C5.117,23.098 5.351,26.080 5.818,28.449 C6.284,30.818 6.913,32.705 7.703,34.112 C8.493,35.519 9.409,36.508 10.451,37.077 C11.492,37.647 12.587,37.932 13.737,37.932 C14.671,37.932 15.623,37.683 16.593,37.184 C17.562,36.686 18.451,35.991 19.259,35.100 C20.067,34.210 20.749,33.159 21.306,31.948 C21.863,30.738 22.213,29.437 22.357,28.048 L23.165,28.048 C23.021,29.651 22.661,31.120 22.087,32.456 C21.512,33.791 20.785,34.949 19.906,35.928 Z"/>
    </symbol>
</svg>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/7.3.1/smooth-scrollbar.js></script>
<script src=https://cdn.jsdelivr.net/jquery.bez/1.0.11/jquery.bez.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js></script>
{{ Html::script('js/frontend/main.js') }}
<script>(function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');</script>