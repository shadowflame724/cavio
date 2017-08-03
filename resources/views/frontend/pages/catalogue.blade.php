@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'catalogue')

@section('before_header', '')


@section('content')

    <section id="top-waves" class="relative"></section>

    <section id="catalogue" class="">
      <div class="container">
        <div class="small-page-title" data-anim="false"><span class="text-title">{{ trans('frontend.catalogue.title') }}</span></div>
        <div class="wrap-catal wrap-box-shadow clearfix bg-white-marmur" data-anim="false">
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
                  <li data-filter-name="sale" data-filter-val="false" class="active">{{ trans('frontend.catalogue.all') }}</li>
                    <?php
                    // TODO: Сделать фильтр по скидкам (?sale=true)
                    ?>
                  <li data-filter-name="sale" data-filter-val="true">{{ trans('frontend.catalogue.sale') }} %</li>
                </ul>

              </div>
              <div class="inner-catal-side-items">
                @foreach($cats as $category)
                <div class=catal-list-block>
                  <div class=catal-list-title>
                    <a href="{{ route('frontend.catalogue.one', $category['parent']['slug']) }}"
                      @if($category['parent']['active']) class="active"@endif
                    >{{ $category['parent']['name'.$langSuf] }}</a>
                  </div>
                  <ul class="catal-list">
                    @foreach($category['childs'] as $child)
                      <li @if($child['active']) class="active"@endif>
                        <a href="{{ route('frontend.catalogue.one', $child['slug']) }}" class=anim-underline>
                          {{ $child['name'.$langSuf] }}
                        </a>
                    @endforeach
                  </ul>
                </div>
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
                    <?php
                      // TODO: Сделать фильтр по зонам (?zone=slug)
                    ?>
                    @foreach($zones as $zone)
                      <li>
                        <a href="#zone={{ $zone->slug }}"
                           data-filter-name="zone" data-filter-val="{{ $zone->slug }}"
                           class="anim-underline">{{ $zone->{'title'.$langSuf} }}</a>
                        <div class="disactive-item"></div>
                      </li>
                    @endforeach
                  </ul>

                  <div class="zon-col-side zon-col-list-title">
                    <div class="zon-col-side-toggle">{{ trans('frontend.catalogue.collections') }}</div>
                  </div>
                  <ul class="zon-col-list-catal collections">
                    <?php
                    // TODO: Сделать фильтр по колекциям (?collection=slug)
                    ?>
                    @foreach($collections as $collection)
                      <li>
                        <a href="#collection={{ $collection->slug }}"
                           data-filter-name="collection" data-filter-val="{{ $collection->slug }}"
                           class="anim-underline">
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
          <div class="catal-content">
            <div class="catal-content-inner">
              <div class="wrap-catal-filter">
                <?php
                // TODO: Сделать фильтр по поиску (?search=g)
                ?>
                <form action="/search">
                  <input class="catal-filter" type="text" name="g" placeholder="{{ trans('frontend.catalogue.search') }}">
                </form>
                <button class="search-loupe">
                  <svg class="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="../../img/frontend/icons/social.svg#loupe"></use>
                  </svg>
                </button>
              </div>
              <div class="catal-list-info">
                <?php
                // TODO: Вывести выбраные фильтры
                ?>
                <span class="catal-type">dinning</span>
                <span class="catal-item-numb"><span class="numb">{{ count($model) }}</span> products</span>
              </div>
              @if(isset($model) && !empty($model))
              <div class="wrap-catal-list">
                <div class="disp-catal-list clearfix">
                  @foreach($model as $product)
                  @php($prodData = $product->getMainData())
                  <div class="new-products-right-item grid w33 @if($prodData['isDiscount']) discount @endif">
                    <a class="new-products-right-inner-item" href="/product/{{$product->slug}}">
                      <div class="product-img-table">
                        <div class="wrap-new-product-img bg-white-marmur"
                           @if(!empty($prodData['photos'])) style="background-image: url(//cvo-dev.spongeservice.com.ua/api/product-image/{{$prodData['photos']}})" @endif>
                        </div>
                      </div>
                      <div class="wrap-new-product-data">
                        <div class="product-code">{{ $prodData['codes'] }}</div>
                        <div class="product-name">{{ $product->{'name'.$langSuf} }}</div>
                        <div class="product-price">{{ $prodData['prices'] }}</div>
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
                <?php
                // TODO: Вывести пагинацию
                ?>
                {{ $model->links() }}
              </div>
              @else
                <h2 class="no-products">{{ trans('frontend.catalogue.no_products') }}</h2>
              @endif
            </div>
          </div>
        </div>

      </div>
    </section>
@endsection