@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'catalogue')

@section('before_header', '')

@section('content')

    <section id="top-waves" class="relative"></section>

    <section id="catalogue" class="">
      <div class="container">
        <div class="small-page-title hide"><span class="text-title">{{ trans('frontend.catalogue.title') }}</span></div>
        <div class="wrap-catal wrap-box-shadow clearfix bg-white-marmur hide">
          <div class="catal-side relative">
            <div class="catal-filter-head">
              <!--<svg class="title-wave" viewBox="0 0 1395.63 1237.68">-->
                <!--<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>-->
              <!--</svg>-->
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
                        <a href="{{ route('frontend.catalogue.one', $category->slug) }}">

                          {{ $category->{'name'.$langSuf} }}
                          {{$category->slug}}

                        </a>
                      </div>
                      <ul class="catal-list">
                        @foreach($category->children as $child)
                          <li>
                            <a href="{{ route('frontend.catalogue.one', $child->slug) }}" class=anim-underline>
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
                      <a class="active" for="zones" href="#">{{ trans('frontend.catalogue.zones') }}</a>
                      <span class="slash">/</span>
                      <a href="#" for="collections">{{ trans('frontend.catalogue.collections') }}</a>
                    </div>
                  </div>

                  <div class="zon-col-side zon-col-list-title">
                    <div class="zon-col-side-toggle">{{ trans('frontend.catalogue.zones') }}</div>
                  </div>

                  <ul class="zon-col-list-catal zones">
                    @foreach($zones as $zone)
                      <li>
                        <a href=# class="anim-underline">{{ $zone->{'title'.$langSuf} }}</a>
                        <div class="disactive-item"></div>
                      </li>
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
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @if(isset($model) && !empty($model))
          <div class="catal-content">
            <div class="catal-content-inner">
              <div class="wrap-catal-filter">
                <form action="">
                  <input class="catal-filter" type="text" placeholder="{{ trans('frontend.catalogue.search') }}">
                </form>
                <button class="search-loupe">
                  <svg class="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="../../img/frontend/icons/social.svg#loupe"></use>
                  </svg>
                </button>
              </div>
              <div class="catal-list-info">
                <span class="catal-type">dinning</span>
                <span class="catal-item-numb"><span class="numb">64</span> products</span>
              </div>
              <div class="wrap-catal-list">
                <div class="disp-catal-list clearfix">
                  @foreach($model as $product)
                  <div class="new-products-right-item grid w33 @if($product['isDiscount']) discount @endif">
                    <a class="new-products-right-inner-item" href="/product/{{$product['slug']}}">
                      <div class="product-img-table">
                        <div class="wrap-new-product-img bg-white-marmur"
                           @if(!empty($product['photos'])) style="background-image: url(//cvo-dev.spongeservice.com.ua/api/product-image/{{$product['photos']}})" @endif>
                        </div>
                      </div>
                      <div class="wrap-new-product-data">
                        <div class="product-code">#{{$product['code']}}</div>
                        <div class="product-name">{{$product['name']}}</div>
                        <div class="product-price">{{$product['prices']}}</div>
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
                <ul class="list-pagination clearfix">
                  <li class="pag-item active">1</li>
                  <li class="pag-item">2</li>
                  <li class="pag-item">3</li>
                  <li class="pag-item">4</li>
                </ul>
              </div>
            </div>
          </div>
          @endif
        </div>

      </div>
    </section>
@endsection