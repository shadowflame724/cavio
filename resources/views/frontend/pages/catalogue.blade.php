@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'catalogue')

@section('before_header', '')

@section('content')
<section id="top-waves" class="relative"></section>
<section id="catalogue">
    <div class="container">
        <div class="small-page-title hide"><span class=text-title>{{ trans('frontend.catalogue.title') }}</span></div>
        <div class="wrap-catal wrap-box-shadow clearfix bg-white-marmur hide">
            <div class="catal-side relative">
                <div class="catal-filter-head">
                    <div class="filter-title">{{ trans('frontend.catalogue.filter') }}</div>
                    <div class="close-catal-menu"></div>
                </div>
                <div class="wrap-catal-side-items">
                    <div class="wrap-percents">
                        <ul class="catal-perc clearfix">
                            <li class="active">{{ trans('frontend.catalogue.all') }}</li>
                            <li>{{ trans('frontend.catalogue.sale') }} %</li>
                        </ul>
                    </div>
                    <div class="inner-catal-side-items">
                        @foreach($categories as $category)
                            @if($category->parent_id == null)
                                <div class=catal-list-block>
                                    <div class=catal-list-title>
                                        <a href="{{ route('frontend.catalogue', $category->id) }}">

                                                {{ $category->{'name'.$langSuf} }}

                                        </a>
                                    </div>
                                    <ul class="catal-list">
                                        @foreach($category->children as $child)
                                            <li><a href="{{ route('frontend.catalogue', $child->id) }}"
                                                   class=anim-underline>

                                                        {{ $child->{'name'.$langSuf} }}

                                                </a>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                        <div class="wrap-zon-col-side">
                            <div class="zon-col-side">
                                <div class="zon-col-side-toggle">
                                    <a class="active" for="zones" href=#>{{ trans('frontend.catalogue.zones') }}</a>
                                    <span class="slash">/</span>
                                    <a href=# for="collections">{{ trans('frontend.catalogue.collections') }}</a>
                                </div>
                            </div>
                            <div class="zon-col-side zon-col-list-title">
                                <div class="zon-col-side-toggle">{{ trans('frontend.catalogue.zones') }}</div>
                            </div>
                            <ul class="zon-col-list-catal zones">
                                @foreach($zones as $zone)
                                    <li>
                                        <a href=# class="anim-underline">

                                                {{ $zone->{'title'.$langSuf} }}

                                        </a>
                                        <div class="disactive-item"></div>
                                @endforeach
                            </ul>
                            <div class="zon-col-side zon-col-list-title">
                                <div class="zon-col-side-toggle">{{ trans('frontend.catalogue.collections') }}</div>
                            </div>
                            <ul class="zon-col-list-catal collections">
                                @foreach($collections as $collection)
                                    <li>
                                        <a href=# class="anim-underline">

                                                {{ $collection->{'title'.$langSuf} }}

                                        </a>
                                        <div class="disactive-item"></div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catal-content">
                <div class="catal-content-inner">
                    <div class="wrap-catal-filter">
                        <form action="catalogue.html"><input class="catal-filter" placeholder="{{ trans('frontend.catalogue.search') }}">
                        </form>
                        <button class="search-loupe">
                            <svg>
                                <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xlink:href="images/icons/social.svg#loupe"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="catal-list-info"><span class="catal-type">dinning</span> <span
                                class="catal-item-numb"><span class="numb">64</span> {{ trans('frontend.catalogue.products') }}</span></div>
                    <div class="wrap-catal-list">
                        <div class="disp-catal-list clearfix">
                            <div class="new-products-right-item grid w33 discount"><a class="new-products-right-inner-item" href="#"><div class="product-img-table"><div class="wrap-new-product-img bg-white-marmur" style="background-image: url(../img/frontend/un_banner-1-1.jpg)"></div></div><div class="wrap-new-product-data"><div class="product-code">#pr117</div><div class="product-name">Bench</div><div class="product-price">695 € — 795 €</div></div></a></div>
                            <div class="new-products-right-item grid w33"><a class="new-products-right-inner-item" href="#"><div class="product-img-table"><div class="wrap-new-product-img bg-white-marmur" style="background-image: url(../img/frontend/un_banner-1-2.jpg)"></div></div><div class="wrap-new-product-data"><div class="product-code">#pr117</div><div class="product-name">Bench</div><div class="product-price">295 €</div></div></a></div>
                        </div>
                        <ul class="list-pagination clearfix">
                            <li class="pag-item active">1
                            <li class="pag-item">2
                            <li class="pag-item">3
                            <li class="pag-item">4
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection