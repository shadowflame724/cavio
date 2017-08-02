@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'card')

@section('before_header')
<div id=wrapper-bg-zone-col class=wrapper-bg></div>
@endsection

@section('content')
    <section id="product-card" class="zone-col-modal item_cart" data-anim="false">
        <div class="wrapper-zone-col-modal">
            <div class="scroller scroller-zc-modal">
                <div class="scroller-inner">
                    <div class="close-modal"></div>

                    <div class="inner-zone-col-modal bg-white-marmur relative">
                        <div class="wrap-zc-modal-product-list item_card">
                            <div class="wrap-card-params clearfix">
                                <div class="wrap-card-params-left">
                                    <div class="wrap-card-view clearfix">

                                        <div class="relative">
                                            @if(isset($product['prices']) && !empty($product['prices']))
                                            <?php $i = 1;?>
                                            @foreach($product['prices'] as $one)
                                            @if(isset($one['photosArr']['photos'][0]) && !empty($one['photosArr']['photos'][0]))
                                            <div class="wrap-curr-card-view  @if($i==1) show @else hide @endif">
                                                <div class="curr-card-view bg-white-marmur discount"
                                                     style="background-image: url(//cvo-dev.spongeservice.com.ua/api/product-image/{{$one['photosArr']['photos'][0]}})"></div>
                                            </div>
                                            <?php $i++;?>
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>

                                        <div class="wrap-mini">
                                            <div class="wrap-card-varians-list">
                                                <ul class="card-varians-list">
                                                @if(isset($product['photos']) && !empty($product['photos']))
                                                @php($i=0)
                                                @foreach($product['photos'] as $photo)
                                                    @foreach($photo['photos'] as $img)
                                                    <li @if(!$i) class="active" @endif data-photo="{{$photo['id']}}">
                                                        <div
                                                            class="dot-card_item bg-white-marmur"
                                                            style="background-image: url(//cvo-dev.spongeservice.com.ua/api/product-image/{{ $img }})"></div>
                                                    </li>
                                                    @php($i++)
                                                    @endforeach
                                                @endforeach
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-price_buy it_cart">
                                        <div class="label-price_buy clearfix">
                                            <div class="wrap-swiper-card_price">
                                                <div class="swiper-wrapper">
                                                    @if(isset($product['prices']) && !empty($product['prices']))
                                                    <?php $i = 1;?>
                                                    @foreach($product['prices'] as $one)
                                                    <div data-photo="{{$one['product_photo_id']}}" data-child="{{$one['product_child_id']}}" class="swiper-slide wrap-card-price  @if($i==1) active @endif">
                                                        <div class="t_cell">
                                                            <div class="card-price" data-id="{{$one['id']}}">
                                                                <div>{{$one['price_vat']}} €</div>
                                                                <div class="wrap-under-card_price small">
                                                                    @if($one['discount'] > 0)
                                                                    <div class="under-card-price line-through">{{$one['price_old']}}€</div>
                                                                    @endif
                                                                    <div class="under-card-price">{{$one['price_new']}}€ + 22%VAT</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php $i++;?>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-to_stash">
                                                <a href="#" id="add_to_cart">
                                                    <svg id="card-to_stash" class="svg-card-to_stash" viewBox="0 0 110 128" width="110" height="128">
                                                        <polygon points="71.6,103 14.3,103 0.7,65.3 85.4,65.3 85.4,69.7 7,69.7 17.4,98.6 71.6,98.6  "></polygon>
                                                        <polygon points="70.2,109.8 66.1,108.1 91.2,48 109.4,48 109.4,52.4 94.1,52.4  "></polygon>
                                                        <rect x="31.2" y="114.6" width="27.6" height="4.4"></rect>
                                                        <path d="M66.8,126.9c-5.6,0-10.1-4.5-10.1-10.1c0-5.6,4.5-10.1,10.1-10.1c5.6,0,10.1,4.5,10.1,10.1   C76.9,122.4,72.4,126.9,66.8,126.9z M66.8,111.2c-3.1,0-5.7,2.5-5.7,5.7c0,3.1,2.5,5.7,5.7,5.7c3.1,0,5.7-2.5,5.7-5.7   C72.4,113.7,69.9,111.2,66.8,111.2z"></path>
                                                        <path d="M23.3,126.9c-5.6,0-10.1-4.5-10.1-10.1c0-5.6,4.5-10.1,10.1-10.1s10.1,4.5,10.1,10.1C33.4,122.4,28.9,126.9,23.3,126.9z    M23.3,111.2c-3.1,0-5.7,2.5-5.7,5.7c0,3.1,2.5,5.7,5.7,5.7s5.7-2.5,5.7-5.7C29,113.7,26.4,111.2,23.3,111.2z"></path>
                                                        <path class="st0" d="M44,42.8"></path>
                                                        <g class="stash-arrow">
                                                            <rect x="45.4" y="1.1" width="4.4" height="45.3"></rect>
                                                            <polygon points="47.7,49.6 33.6,35.5 36.7,32.3 47.7,43.3 58.5,32.5 61.6,35.6  "></polygon>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="wrap-card-params-right">
                                    <div class="swiper-wrapper overfl-h">
                                        @if(isset($product['prices']) && !empty($product['prices']))
                                        <?php $i = 1;?>
                                        @foreach($product['prices'] as $one)
                                        <div data-photo="{{$one['product_photo_id']}}" data-child="{{$one['product_child_id']}}" class="swiper-slide bg-white-marmur card_item-params">
                                            <div class="wrap-card-header">
                                                <div class="wrap-card-name">
                                                    <div class="card-zoneCat-list clearfix">

                                                        <div class="wrap-catal-zon_col">
                                                            <div class="swiper-wrapper overfl-h">
                                                                <div class="swiper-slide bg-white-marmur">
                                                                    <div class="wrap-catal-zones">
                                                                        @if(!empty($one['photosArr']['colls_name']['zone']))
                                                                        @foreach($one['photosArr']['colls_name']['zone'] as $zone)
                                                                        <span class="catal-type">{{$zone}}</span>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>
                                                                    <div class="wrap-catal-coll">
                                                                        @if(!empty($one['photosArr']['colls_name']['collection']))
                                                                        @foreach($one['photosArr']['colls_name']['collection'] as $collection)
                                                                        <span class="catal-coll">{{$collection}}</span>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-name">
                                                        <span>{{$one['childsArr']['name']}}</span>
                                                    </div>
                                                    <div class="card-product-code">{{$one['childsArr']['code']}}</div>
                                                </div>
                                            </div>
                                            <div class="wrap-relate-card-more-choices">
                                                <div class="wrap-card-more-choices clearfix">
                                                    <div class="item-standart-choice">
                                                        <div class="block_title-card">finish</div>
                                                        <div class="cell-card-more-choices fin">
                                                            <div class="swiper-wrapper overfl-h">
                                                                <div class="swiper-slide fin_slide bg-white-marmur">
                                                                    @if(isset($one['photosArr']['finish']) && !empty($one['photosArr']['finish']))
                                                                    @foreach($one['photosArr']['finish'] as $finish)
                                                                    <div class="nowrap-list-card_pr">{{$finish}}</div>
                                                                    @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-standart-choice">
                                                        <div class="block_title-card">Tissue</div>
                                                        <div class="cell-card-more-choices tis">
                                                            <div class="swiper-wrapper overfl-h">
                                                                <div class="swiper-slide fin_slide bg-white-marmur">
                                                                    @if(isset($one['photosArr']['tissue']) && !empty($one['photosArr']['tissue']))
                                                                    {{implode(',',$one['photosArr']['tissue'])}}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('frontend.finish-tissue') }}" class="card-mode-choice hov-colMain_clack">More choices →</a>
                                                </div>
                                            </div>
                                            <div class="wrap-card-dimensions">
                                                <div class="wrap-card-block-title clearfix">
                                                    <div class="block_title-card">Dimensions</div>
                                                    <div class="toggle-cent_inch"><span class="toggle-inner-length hov-colMain_clack active">Centimeters</span> / <span class="toggle-inner-length hov-colMain_clack">inches</span></div>
                                                </div>
                                                <div class="wrap-table-dimensions clearfix">
                                                    <ul class="wrap-dimensions-values clearfix">
                                                        @if(isset($product['childs']) && !empty($product['childs']))
                                                        @foreach($product['childs'] as $child)
                                                        <li data-child="{{$child['id']}}" @if($child['id'] == $one['product_child_id']) class="active" @endif>
                                                            <div class="dimensions-item-numb">1</div>
                                                            <div class="wrap-dim-swiper">
                                                                <div class="swiper-wrapper">
                                                                    <ul class="swiper-slide dimensions-values-item bg-white-marmur cent">
                                                                        <li>{{$child['dimensions']->length}}</li>
                                                                        <li>{{$child['dimensions']->width}}</li>
                                                                        <li>{{$child['dimensions']->height}}</li>
                                                                        <li>{{$child['dimensions']->mattress}}</li>
                                                                        <li>{{$child['dimensions']->niche}}</li>
                                                                    </ul>
                                                                    <ul class="swiper-slide dimensions-values-item bg-white-marmur inch">
                                                                        <li>{{$child['dimensions']->length}}</li>
                                                                        <li>{{$child['dimensions']->width}}</li>
                                                                        <li>{{$child['dimensions']->height}}</li>
                                                                        <li>{{$child['dimensions']->mattress}}</li>
                                                                        <li>{{$child['dimensions']->niche}}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                    <ul class="size-name val-rules">
                                                        <li>Length:</li>
                                                        <li>Width:</li>
                                                        <li>Height:</li>
                                                        <li>Mattress:</li>
                                                        <li>Weight:</li>
                                                    </ul>
                                                    <div class="wrap-curr_dim_val-swiper">
                                                        <div class="swiper-wrapper">
                                                            <ul class="swiper-slide size-name no-desktop curr_dimensions_values bg-white-marmur cent">
                                                                <li>194</li>
                                                                <li>100/250</li>
                                                                <li>93</li>
                                                                <li>70x195x14</li>
                                                                <li>80 kg</li>
                                                            </ul>
                                                            <ul class="swiper-slide size-name no-desktop curr_dimensions_values bg-white-marmur inch">
                                                                <li>194</li>
                                                                <li>100/250</li>
                                                                <li>93</li>
                                                                <li>70x195x14</li>
                                                                <li>80 kg</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-card-otherData">
                                                <div class="block_title-card">description</div>
                                                <ul class="card-otherData">
                                                    @if(isset($product['prev']) && !empty($product['prev']))
                                                    <li><p class="prgrph-card-other">{{$product['prev']}}</p></li>
                                                    @endif
                                                    @if(isset($one['photosArr']['prev']) && !empty($one['photosArr']['prev']))
                                                    <li><p class="prgrph-card-other">{{$one['photosArr']['prev']}}</p></li>
                                                    @endif
                                                    @if(isset($one['childsArr']['prev']) && !empty($one['childsArr']['prev']))
                                                    <li><p class="prgrph-card-other">{{$one['childsArr']['prev']}}</p></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    <div class="wrap-share_social">
                                        <div class="label-share">Share:</div>
                                        <div class="wrap-share-soc_icons">
                                            <a href="facebook.com" class="share-social-link">
                                                <svg class="svg-share_social-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#fb"></use>
                                                </svg>
                                            </a>
                                            <a href="instagram.com" class="share-social-link inst">
                                                <svg class="svg-share_social-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
                                                </svg>
                                            </a>
                                            <a href="google.com" class="share-social-link">
                                                <svg class="svg-share_social-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#login_google_plus"></use>
                                                </svg>
                                            </a>
                                            <a href="twitter.com" class="share-social-link">
                                                <svg class="svg-share_social-icon">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="wrap-bigest-swiper">
                                <div class="swiper-wrapper overfl-h">
                                    @if(isset($product['photos']) && !empty($product['photos']))
                                    @foreach($product['photos'] as $photo)
                                    <div class="swiper-slide outer-slide bg-white-marmur">
                                        <div class="wrap-carousel-card">
                                            <div class="swiper-wrapper">
                                                @if(!empty($photo['collection']))
                                                @foreach($photo['collection'] as $img)
                                                @if(!empty($img))
                                                <div class="swiper-slide card-modal-slide bg-white-marmur">
                                                    <img src="//cvo-dev.spongeservice.com.ua/upload/images/zone/horizontal/{{$img}}" alt="">
                                                </div>
                                                @endif
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="wrap-also-buy">
                                <div class="modal-second-title">Related products</div>

                                <div class="wrap-swiper-related overfl-h">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide wrap-also-buy-items">
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-1.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 € </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-2.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-3.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 € - 1295 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-3.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">895 € - 1295 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="swiper-slide wrap-also-buy-items">
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-2.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">795 € - 1495 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-3.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">2295 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-3.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1295 € - 1395 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-3.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 € - 1295 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="swiper-slide wrap-also-buy-items">
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-1.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1395 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-1.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 € - 1895 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item discount">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-1.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">195 € - 295 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="new-products-right-item grid cart_item">
                                                <a class="new-products-right-inner-item" href="#">
                                                    <div class="product-img-table">
                                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(images/un_banner-1-2.jpg)">
                                                            <!--<img src="/upload/images/un_banner-1-3.jpg" alt="">-->
                                                        </div>
                                                    </div>
                                                    <div class="wrap-new-product-data">
                                                        <div class="product-code">#pr117</div>
                                                        <div class="product-name">Bench</div>
                                                        <div class="product-price">1195 € - 1200 €</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_footer')
<svg xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink id=svgLayout style=display:none>
    <symbol id=sofa viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M145.9,103.9v37.5h-0.1c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
c-0.5-0.7-0.7-1.5-0.9-2.3H63.8c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
c-0.5-0.7-0.7-1.5-0.9-2.3H52v-37.6h0.3C45.3,102.2,40,95.9,40,88.3c0-8.7,7.1-15.7,15.7-15.7c1.8,0,3.5,0.3,5.1,0.9
C61.4,61.5,71.4,52,83.4,52h32c12.1,0,22,9.5,22.6,21.5c1.6-0.6,3.4-0.9,5.2-0.9c8.7,0,15.7,7.1,15.7,15.7
C159,96.1,153.3,102.6,145.9,103.9z M136.7,142.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3
c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C136.2,141.8,136.4,142.3,136.7,142.7z M54.8,142.7L55,143v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1
c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C54.3,141.8,54.5,142.3,54.8,142.7z M54,139.4h89.9v-35.3
c-0.2,0-0.4,0-0.6,0c-5.9,0-11-3.3-13.7-8.1v27H69.5V96c-2.7,4.8-7.8,8.1-13.7,8.1c-0.6,0-1.2,0-1.7-0.1V139.4z M127.5,121v-11.9
c-0.5-0.5-4.1-3.2-28-3.2s-27.6,2.7-28,3.2V121H127.5z M55.7,74.6c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7
c7.6,0,13.7-6.2,13.7-13.7C69.5,80.8,63.3,74.6,55.7,74.6z M115.4,54h-32C72.2,54,63,63.1,62.8,74.3c5.1,2.6,8.7,7.9,8.7,14v18.5
c3.1-1.5,10.6-2.9,28-2.9s24.9,1.4,28,2.9V88.3c0-6.1,3.5-11.4,8.5-14C135.9,63.1,126.7,54,115.4,54z M143.3,74.6
c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7c7.6,0,13.7-6.2,13.7-13.7C157,80.8,150.8,74.6,143.3,74.6z M143.3,94.8
c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5c3.6,0,6.5,2.9,6.5,6.5C149.8,91.9,146.9,94.8,143.3,94.8z M143.3,83.8
c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5C147.8,85.9,145.8,83.8,143.3,83.8z M115.5,94.5l-2-2l-2,2l-1.4-1.4
l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L115.5,94.5z M115.5,74.3l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2
L115.5,74.3z M87.4,94.5l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,94.5z M87.4,74.3l-2-2l-2,2l-1.4-1.4
l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,74.3z M55.7,94.8c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5
c3.6,0,6.5,2.9,6.5,6.5C62.2,91.9,59.3,94.8,55.7,94.8z M55.7,83.8c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5
C60.2,85.9,58.2,83.8,55.7,83.8z"/>
    </symbol>
    <symbol id=commode viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M154.4,57.3v77.6l1,4.4l2.6,5.9h-0.6c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
c-0.5-0.7-0.8-1.5-0.9-2.2H54.4c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2
c-0.5-0.7-0.8-1.5-0.9-2.2H42l2.6-5.9l1-4.4V57.3l-1-4.4L42,46.9h116l-2.6,5.9L154.4,57.3z M148.3,146.6l0.2,0.3v2.6
c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7C147.8,145.8,148,146.2,148.3,146.6z
 M45.3,146.6l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H51c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7
C44.8,145.8,45,146.2,45.3,146.6z M45,143.3h109.9l-1.1-2.7H46.2L45,143.3z M152.6,56.2l0.6-2.7H46.8l0.6,2.7H152.6z M47.5,58.2V134
h104.9V58.2H47.5z M152.6,136H47.3l-0.6,2.7h106.4L152.6,136z M45,48.9l1.1,2.7h107.6l1.1-2.7H45z M55.4,110.6h89.2v17.8H55.4V110.6
z M57.4,126.4h85.2v-13.8H57.4V126.4z M123.6,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
C127.1,121.4,125.5,122.9,123.6,122.9z M123.6,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5
C125.1,118.7,124.4,118.1,123.6,118.1z M76.4,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
C79.8,121.4,78.3,122.9,76.4,122.9z M76.4,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5
C77.8,118.7,77.2,118.1,76.4,118.1z M55.4,87.2h89.2V105H55.4V87.2z M57.4,103h85.2V89.2H57.4V103z M123.6,99.6
c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C127.1,98,125.5,99.6,123.6,99.6z M123.6,94.7
c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5C125.1,95.3,124.4,94.7,123.6,94.7z M76.4,99.6
c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C79.8,98,78.3,99.6,76.4,99.6z M76.4,94.7
c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5C77.8,95.3,77.2,94.7,76.4,94.7z M55.4,64.2h89.2v17.8H55.4
V64.2z M57.4,79.9h85.2V66.2H57.4V79.9z M123.6,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
C127.1,74.9,125.5,76.5,123.6,76.5z M123.6,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5
C125.1,72.2,124.4,71.6,123.6,71.6z M76.4,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4
C79.8,74.9,78.3,76.5,76.4,76.5z M76.4,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5
C77.8,72.2,77.2,71.6,76.4,71.6z"/>
    </symbol>
    <symbol id=bookcase viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M138.5,42.4v108.4l1,4.5l2.6,6h-0.6c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1
c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.8-1.5-0.9-2.3H70.4c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1
c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.8-1.5-0.9-2.3H58l2.6-6l1-4.5V42.4l-1-4.5L58,32h84l-2.6,6L138.5,42.4z M132.3,162.7l0.2,0.3
v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7
C131.8,161.8,132,162.3,132.3,162.7z M61.3,162.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H67c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3
c0.3-0.4,0.5-0.9,0.6-1.3h-7.7C60.8,161.8,61,162.3,61.3,162.7z M61,159.3h77.9l-1.1-2.7H62.2L61,159.3z M63.5,130.8V150h72.9v-19.2
H63.5z M136.4,128.7V43.3H101v85.4H136.4z M99,128.7V43.3H63.5v85.4H99z M136.6,41.3l0.6-2.7H62.8l0.6,2.7H136.6z M136.6,152H63.3
l-0.6,2.7h74.5L136.6,152z M61,34l1.1,2.7h75.6l1.1-2.7H61z M96,125.3H66.5V47.7H96V125.3z M94,49.7H68.5v73.6H94V49.7z M87.4,93.8
c1.6,0,2.8,1.3,2.8,2.8c0,1.6-1.3,2.8-2.8,2.8s-2.8-1.3-2.8-2.8C84.6,95.1,85.9,93.8,87.4,93.8z M87.4,97.5c0.5,0,0.8-0.4,0.8-0.8
c0-0.5-0.4-0.8-0.8-0.8c-0.5,0-0.8,0.4-0.8,0.8C86.6,97.1,87,97.5,87.4,97.5z M133.4,125.3H104V47.7h29.4V125.3z M131.4,49.7H106
v73.6h25.4V49.7z M112.5,93.8c1.6,0,2.8,1.3,2.8,2.8c0,1.6-1.3,2.8-2.8,2.8c-1.6,0-2.8-1.3-2.8-2.8C109.7,95.1,111,93.8,112.5,93.8z
 M112.5,97.5c0.5,0,0.8-0.4,0.8-0.8c0-0.5-0.4-0.8-0.8-0.8c-0.5,0-0.8,0.4-0.8,0.8C111.7,97.1,112.1,97.5,112.5,97.5z M66.5,133.5
h66.9v13.8H66.5V133.5z M68.5,145.3h62.9v-9.8H68.5V145.3z M117.6,143.2c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8
c1.6,0,2.8,1.3,2.8,2.8C120.4,141.9,119.1,143.2,117.6,143.2z M117.6,139.5c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8
c0.5,0,0.8-0.4,0.8-0.8C118.4,139.9,118,139.5,117.6,139.5z M82.4,143.2c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8
c1.6,0,2.8,1.3,2.8,2.8C85.3,141.9,84,143.2,82.4,143.2z M82.4,139.5c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8
c0.5,0,0.8-0.4,0.8-0.8C83.2,139.9,82.9,139.5,82.4,139.5z"/>
    </symbol>
    <symbol id=mirror viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M122.4,154H77.6L46,122.3V77.6l31.6-31.6h44.7L154,77.6v44.7L122.4,154z M152,78.4l-30.5-30.5H78.4L48,78.4
v43.1L78.4,152h43.1l30.5-30.5V78.4z M79.1,150.5l-29.6-29.6V79l29.6-29.6h41.8L150.5,79v41.8l-29.6,29.6H79.1z M148.5,79.9
l-28.4-28.4H79.9L51.5,79.9V120l28.4,28.4h40.2l28.4-28.4V79.9z M83.8,139.1l-23-23V83.7l23-23h32.5l23,23v32.5l-23,23H83.8z
 M137.2,84.5l-21.8-21.8H84.6L62.8,84.5v30.8l21.8,21.8h30.8l21.8-21.8V84.5z M85.3,135.4l-20.8-20.8V85.2l20.8-20.8h29.4l20.8,20.8
v29.4l-20.8,20.8H85.3z M133.5,86.1l-19.6-19.6H86.1L66.5,86.1v27.8l19.6,19.6h27.8l19.6-19.6V86.1z"/>
    </symbol>
    <symbol id=bed viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M166.5,61.7h-3.7c-1.3,0-2.4,1.1-2.4,2.5v0.7c-8-3.1-47.1-17.9-52.2-17.9c-2.1,0-3.6,0.5-4.6,1.5
c-1.4,1.4-1.4,3.5-1.4,5.3l0,0.7c0,1.9-1.8,2-2.2,2c-0.2,0-2.2-0.1-2.2-2l0-0.7c0-1.8,0-3.9-1.4-5.3c-1-1-2.5-1.5-4.6-1.5
c-5.1,0-44.3,14.9-52.2,17.9v-0.7c0-1.4-1.1-2.5-2.4-2.5h-3.7c-1.3,0-2.4,1.1-2.4,2.5v85.3c0,1.4,1.1,2.5,2.4,2.5h3.7
c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h120c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h3.7c1.4,0,2.4-1.1,2.4-2.5V64.2
C169,62.8,167.9,61.7,166.5,61.7z M37.6,120.8v8v2v18.7c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5V75.5h4.6V120.8z
 M37.6,73.5H33v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z M160.4,149.4L160.4,149.4c0,0.3-0.2,0.5-0.4,0.5H40
c-0.2,0-0.4-0.2-0.4-0.4v0v-18.6h120.8V149.4z M160.4,128.7H39.6v-8c0-2.6,2.1-4.8,4.7-4.8h111.4c2.6,0,4.7,2.1,4.7,4.8V128.7z
 M59.2,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6c0,0.3-0.2,0.5-0.5,0.5H59.7
C59.4,113.9,59.2,113.7,59.2,113.5z M106.3,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6
c0,0.3-0.2,0.5-0.5,0.5h-33.6C106.5,113.9,106.3,113.7,106.3,113.5z M160.4,115.9c-1.2-1.2-2.9-2-4.7-2h-13c0-0.2,0.1-0.3,0.1-0.5
V97.9c0-1.4-1.1-2.5-2.4-2.5h-33.6c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-8.7c0-0.2,0.1-0.3,0.1-0.5V97.9
c0-1.4-1.1-2.5-2.4-2.5H59.7c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-13c-1.8,0-3.5,0.8-4.7,2V75.5h120.8V115.9z
 M160.4,73.5H39.6v-3.9c20.6-7.9,49.1-17.8,52.2-17.9c0.6,0,0.9,0.1,1.1,0.1c0,0.3,0.1,1,0,1.8l0,0.7c0,4.5,3.6,6.9,7,6.9
c3.4,0,7-2.4,7-6.9l0-0.7c0-0.9,0-1.5,0-1.8c0.2,0,0.5-0.1,1.1-0.1c3.2,0.1,31.7,10,52.3,17.9V73.5z M160.4,67.5
c-18.9-7.2-48.4-17.7-52.2-17.8c-0.9,0-2.1,0.1-2.6,0.7c-0.5,0.5-0.6,1.4-0.5,3.3l0,0.7c0,3.2-2.6,4.9-5,4.9c-2.4,0-5-1.7-5-4.8
l0-0.7c0-1.9,0-2.8-0.5-3.3c-0.5-0.5-1.7-0.7-2.6-0.7c0,0,0,0,0,0C88,49.8,58.4,60.3,39.6,67.5V67c13.7-5.3,48-18.1,52.2-18.1
c1.5,0,2.6,0.3,3.2,0.9c0.8,0.8,0.8,2.3,0.8,3.9l0,0.7c0,2.9,2.5,4,4.2,4c1.7,0,4.2-1.1,4.2-4l0-0.7c0-1.6,0-3.1,0.8-3.9
c0.6-0.6,1.7-0.9,3.2-0.9c4.3,0,38.6,12.8,52.2,18.1V67.5z M167,149.4c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5v-18.7v-2
v-8V75.5h4.6V149.4z M167,73.5h-4.6v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z"/>
    </symbol>
    <symbol id=small-table viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M161.8,134.2c-0.2-0.1-0.4-0.2-0.6-0.4c-1.3-0.8-2.3-1.4-2.3-3.9c0-2.6,1.8-5.1,3.6-7.4
c1.8-2.4,3.5-4.6,3.5-7.2c0-3.9-1.3-5.7-2.1-6.4v-9.3h-54.2c1.9-2.1,4-6.4,4-15c0-6.2-1.3-10.5-4-13c-1.3-1.2-2.7-1.7-3.6-1.9v-4.9
l1.4-1.4c0.6-0.6,0.8-1.5,0.5-2.3c-0.3-0.8-1.1-1.3-2-1.3h-6.5H93c-0.9,0-1.6,0.5-2,1.3c-0.3,0.8-0.1,1.7,0.5,2.3l1.4,1.4v4.9
c-0.9,0.2-2.3,0.6-3.6,1.9c-2.6,2.5-4,6.8-4,13c0,8.6,2.1,12.9,4,15H35.1v9.3c-0.7,0.7-2.1,2.6-2.1,6.4c0,2.5,1.7,4.8,3.5,7.2
c1.8,2.4,3.6,4.8,3.6,7.4c0,2.5-1,3.1-2.3,3.9c-0.2,0.1-0.4,0.2-0.6,0.4c-1,0.6-1.4,1.8-1.1,2.9c0.3,1.1,1.3,1.9,2.5,1.9H44l0.1,0
c1.6-0.2,4.7-1.9,4.7-7c0-2-1.2-4.5-2.4-7.2c-1.4-3-3-6.5-2-8c0.5-0.7,1.6-1.1,3.5-1.1c3.4,0,5.3,0.6,8,1.5
c5.7,1.8,14.2,4.6,43.6,4.6c29.4,0,38-2.8,43.6-4.6c2.7-0.9,4.7-1.5,8-1.5c1.8,0,3,0.4,3.5,1.1c1,1.5-0.6,4.9-2,8
c-1.2,2.7-2.4,5.2-2.4,7.2c0,5,3.1,6.8,4.7,7l5.5,0c1.2,0,2.2-0.8,2.5-1.9C163.2,135.9,162.8,134.8,161.8,134.2z M87.3,84.7
c0-2.5,0.2-4.6,0.6-6.2c3.8,0.7,7.7,1.1,11.6,1.1c3.9,0,7.8-0.4,11.6-1.1c0.4,1.6,0.6,3.7,0.6,6.2c0,0.3,0,0.7,0,1
c-8,1.5-16.4,1.5-24.4,0C87.3,85.3,87.3,85,87.3,84.7z M92.9,62c0-0.1,0.1-0.1,0.1-0.1h6.5h6.5c0,0,0.1,0,0.1,0.1c0,0.1,0,0.1,0,0.1
l-1.9,1.9v5.8c-3.1,0.5-6.3,0.5-9.3,0v-5.8l-1.9-1.9C92.9,62.1,92.8,62.1,92.9,62z M90.6,73.2c1.5-1.4,3-1.5,3.2-1.5
c1.9,0.4,3.8,0.6,5.8,0.6c1.9,0,3.9-0.2,5.8-0.6c0.2,0,1.7,0,3.2,1.5c0.7,0.7,1.5,1.7,2.1,3.4c-7.2,1.3-14.8,1.3-22.1,0
C89.1,74.9,89.8,73.8,90.6,73.2z M87.4,87.7c4,0.7,8.1,1.1,12.1,1.1c4.1,0,8.2-0.4,12.1-1.1c-0.7,9.7-4.4,11.7-5.1,12h-7.1h-7.1
C91.8,99.4,88,97.4,87.4,87.7z M37.1,101.7h62.4h7.4h55.1v6.7H37.1V101.7z M160.9,136.5c0,0.1-0.2,0.4-0.6,0.4h-5.3
c-0.4-0.1-2.9-0.7-2.9-5c0-1.6,1.1-4,2.2-6.4c1.7-3.7,3.5-7.5,1.9-9.9c-0.9-1.3-2.5-2-5.1-2c-3.7,0-5.9,0.7-8.7,1.6
c-5.5,1.8-13.9,4.5-43,4.5c-29.1,0-37.5-2.7-43-4.5c-2.8-0.9-5-1.6-8.7-1.6c-2.6,0-4.3,0.7-5.1,2c-1.5,2.4,0.2,6.2,1.9,9.9
c1.1,2.4,2.2,4.8,2.2,6.4c0,4.2-2.5,4.9-2.9,5h-5.3c-0.4,0-0.5-0.3-0.6-0.4c0-0.1-0.1-0.4,0.2-0.6c0.2-0.1,0.3-0.2,0.5-0.3
c1.4-0.8,3.3-2,3.3-5.6c0-3.3-2.1-6.1-4-8.6c-1.6-2.1-3.1-4.1-3.1-6c0-3.1,1-4.5,1.5-5h126.1c0.4,0.4,1.5,1.8,1.5,5
c0,1.9-1.5,3.9-3.1,6c-1.9,2.5-4,5.3-4,8.6c0,3.6,1.9,4.7,3.3,5.6c0.2,0.1,0.4,0.2,0.5,0.3C161,136.1,161,136.4,160.9,136.5z"/>
    </symbol>
    <symbol id=tv viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M164,109.8l-2.6,6l-1,4.5v16.3h0.7l2.9,6.7h-0.6c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4H155
c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H47.3c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1
c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H35l2.9-6.7h0.7v-16.3l-1-4.5l-2.6-6h50.2v-3.8H50.9V50h97.3v56.1h-34.3v3.8
H164z M154.4,144.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6
C153.8,143.8,154,144.3,154.4,144.7z M37.7,143.3c0.1,0.5,0.3,0.9,0.6,1.3l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H44
c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3H37.7z M38,141.3H161l-1.1-2.7h-41.1H80.3H39.2L38,141.3z M80.3,119.2
h38.4h40l0.6-2.7H39.7l0.6,2.7H80.3z M40.5,121.2v15.4h39.8v-15.4H40.5z M116.7,127.9v-6.7H82.3v6.7H116.7z M82.3,129.9v6.7h34.4
v-6.7H82.3z M118.7,121.2v15.4h39.8v-15.4H118.7z M146.2,104.1V52H52.9v52.1h32.3h28.6H146.2z M87.2,106.1v3.8h24.6v-3.8H87.2z
 M85.2,111.8H38l1.1,2.7h120.7l1.1-2.7h-47.1H85.2z M54.9,54h89.3v48.1H54.9V54z M56.9,100.1h85.3V56H56.9V100.1z M137.7,131.8
c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C140.5,130.5,139.2,131.8,137.7,131.8z M137.7,128.1
c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C138.5,128.5,138.1,128.1,137.7,128.1z M61.1,131.8
c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C63.9,130.5,62.6,131.8,61.1,131.8z M61.1,128.1
c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C61.9,128.5,61.5,128.1,61.1,128.1z"/>
    </symbol>
    <symbol id=panchette viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M177,133.8L177,133.8c0,0.9-0.3,1.8-0.8,2.6v1.5c0,1.2-1,2.1-2.1,2.1h-4c-1.2,0-2.1-1-2.1-2.1v-1.5
c-0.5-0.8-0.8-1.7-0.8-2.6h0v-14.6H62.5v8.7v0.6v5.3c0,0.9-0.3,1.8-0.8,2.6v1.5c0,1.2-1,2.1-2.1,2.1h-4c-1.2,0-2.1-1-2.1-2.1v-1.5
c-0.5-0.8-0.8-1.7-0.8-2.6v-5.3v-0.6v-8.7v-1l0,0c0-26-17-34.7-18.7-35.5C27.9,82.6,23,77.5,23,71.4C23,65.1,28.1,60,34.3,60h14.8
c4.9,0,9.8,1.1,14.3,3.2l20.1,9.4c2.7,1.3,5.7,1.9,8.7,1.9h27.2c7.3,0,13.3,5.7,13.8,12.9h35.4c4.7,0,8.5,3.8,8.5,8.5v23.2h0v8.7
c0,0,0,0,0,0v0.6c0,0,0,0,0,0V133.8z M169.2,125.3c0.2,0,0.4-0.1,0.6-0.1h4.6c0.2,0,0.4,0,0.6,0.1v-6.2h-5.8V125.3z M169.2,127.8
v0.6c0,0.3,0.3,0.6,0.6,0.6h4.6c0.3,0,0.6-0.3,0.6-0.6v-0.6c0-0.3-0.3-0.6-0.6-0.6h-4.6C169.5,127.3,169.2,127.5,169.2,127.8z
 M54.8,133.8c0,0.6,0.2,1.2,0.6,1.7l0.2,0.3v2.1c0,0.1,0.1,0.1,0.1,0.1h4c0.1,0,0.1-0.1,0.1-0.1v-2.1l0.2-0.3
c0.4-0.5,0.6-1.1,0.6-1.7V131c-0.2,0-0.4,0.1-0.6,0.1h-4.6c-0.2,0-0.4,0-0.6-0.1V133.8z M54.8,128.5c0,0.3,0.3,0.6,0.6,0.6H60
c0.3,0,0.6-0.3,0.6-0.6v-0.6c0-0.3-0.3-0.6-0.6-0.6h-4.6c-0.3,0-0.6,0.3-0.6,0.6V128.5z M54.8,125.3c0.2,0,0.4-0.1,0.6-0.1H60
c0.2,0,0.4,0,0.6,0.1v-6.2h-5.8V125.3z M52.8,103.6V96c0-3.8,2.5-7,5.9-8.1c-0.4-12.7-8.1-19.3-14.8-22.6c1.1,1.8,1.8,3.9,1.8,6.1
c0,5.2-3.5,9.6-8.3,10.9C41.4,84.9,49.1,91.3,52.8,103.6z M34.2,62c-5.1,0-9.3,4.2-9.3,9.4c0,5.2,4.2,9.4,9.3,9.4
c5.1,0,9.3-4.2,9.3-9.4c0-3.5-1.9-6.6-4.8-8.2C36.4,62.4,34.7,62.1,34.2,62z M119.3,76.6H92.1c-3.3,0-6.6-0.7-9.5-2.1L62.5,65
c-4.2-2-8.8-3-13.4-3h-7.8c7.5,3,18.7,10,19.4,25.5c0.2,0,0.4,0,0.6,0h69.9C130.6,81.4,125.5,76.6,119.3,76.6z M175,96
c0-3.6-2.9-6.5-6.5-6.5H61.2c-3.6,0-6.5,2.9-6.5,6.5v21.2H175V96z M175,133.8V131c-0.2,0-0.4,0.1-0.6,0.1h-4.6c-0.2,0-0.4,0-0.6-0.1
v2.8l0,0c0,0.6,0.2,1.2,0.6,1.7l0.2,0.3v2.1c0,0.1,0.1,0.1,0.1,0.1h4c0.1,0,0.1-0.1,0.1-0.1v-2.1l0.2-0.3
C174.8,135,175,134.4,175,133.8L175,133.8z M34.3,76.6c-2.9,0-5.2-2.3-5.2-5.2c0-2.9,2.3-5.2,5.2-5.2c2.9,0,5.2,2.3,5.2,5.2
C39.5,74.2,37.2,76.6,34.3,76.6z M34.3,68.1c-1.8,0-3.2,1.4-3.2,3.2s1.4,3.2,3.2,3.2c1.8,0,3.2-1.4,3.2-3.2S36.1,68.1,34.3,68.1z"/>
    </symbol>
    <symbol id=work-chair viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M133.9,163c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.2-3.3c-0.7-0.1-1.5-0.2-2.2-0.4l-24.3-5.9v6.2h-0.1
c0.8,0.9,1.3,2.1,1.3,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.3-3.3h-0.1v-6.2l-24.3,5.9
c-0.7,0.2-1.5,0.3-2.2,0.4c0.8,0.9,1.2,2,1.2,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.4,0.6-2.6,1.4-3.5v-0.6
c0-3.7,2.5-6.9,6.1-7.8l25.5-6.5V124h2.4v-5.6H75l-0.2-0.5l-6-6.5c-1.5-1.6-2.3-3.7-2.3-5.9v-15c-1.4-1.2-2.4-2.9-2.4-4.9
c0-3.3,2.6-6.1,5.9-6.3l4.7-5.7V55.1c0-10.5,8.6-19.1,19.2-19.1H105c10.6,0,19.2,8.6,19.2,19.1v18.3l4.8,5.7c3.3,0.3,5.9,3,5.9,6.3
c0,2-0.9,3.8-2.4,4.9v15c0,2.2-0.8,4.3-2.3,5.9l-6.1,6.5l-0.2,0.5h-20.5v5.6h2.4v15.6l25.5,6.5c3.6,0.9,6.1,4.1,6.1,7.8v0.6
c0.9,0.9,1.4,2.2,1.4,3.5C139,160.7,136.7,163,133.9,163z M68.5,105.4c0,1.7,0.6,3.3,1.8,4.5l3,3.2l-0.2-0.5
c-0.2-0.5-0.2-0.9-0.2-1.4l-1.3-5.2c-0.2-0.9-0.3-1.8-0.3-2.7V91.8c-0.2,0-0.5,0-0.7,0c-0.7,0-1.4-0.1-2-0.3V105.4z M74.7,76.6
l-2.3,2.8c0.9,0.3,1.7,0.7,2.3,1.3V76.6z M74.7,84.4c-0.5-1.9-2.2-3.3-4.2-3.3c-2.4,0-4.4,2-4.4,4.4c0,2.4,2,4.4,4.4,4.4
c2,0,3.7-1.4,4.2-3.3V84.4z M74.7,90.2c-0.4,0.4-0.9,0.7-1.5,1v12.3c0,0.3,0,0.6,0.1,0.9l1.4-3.6V90.2z M128.7,110
c1.2-1.2,1.8-2.9,1.8-4.5V91.5c-0.6,0.2-1.3,0.3-2,0.3c-0.3,0-0.5,0-0.7,0v11.7c0,0.9-0.1,1.8-0.3,2.7l-1.4,5.3
c0,0.4-0.1,0.9-0.2,1.3l-0.2,0.5L128.7,110z M124.2,100.8l1.5,3.6c0-0.3,0.1-0.6,0.1-0.9V91.2c-0.6-0.3-1.1-0.6-1.5-1V100.8z
 M124.2,86.5c0.5,1.9,2.2,3.4,4.3,3.4c2.4,0,4.4-2,4.4-4.4c0-2.4-2-4.4-4.4-4.4c-2.1,0-3.8,1.4-4.3,3.4V86.5z M124.2,80.7
c0.7-0.6,1.5-1.1,2.4-1.4l-2.4-2.9V80.7z M99.5,161c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1c-1.7,0-3.1,1.4-3.1,3.1
C96.4,159.6,97.8,161,99.5,161z M101.4,153.2v-11.9h-3.9v11.9c0.6-0.2,1.3-0.4,1.9-0.4C100.2,152.8,100.8,153,101.4,153.2z
 M62,157.9c0,1.7,1.4,3.1,3.1,3.1c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1C63.4,154.8,62,156.2,62,157.9z M68,147.9
c-2.4,0.6-4.1,2.5-4.5,4.9h2.6c1.5,0,3.1-0.2,4.6-0.5l24.8-6v-5h-1.3L68,147.9z M122.2,86.7c-0.1-0.4-0.1-0.8-0.1-1.3
c0-0.4,0-0.8,0.1-1.3V55.1c0-9.4-7.7-17.1-17.2-17.1H93.9c-9.5,0-17.2,7.7-17.2,17.1v29c0.1,0.4,0.2,0.9,0.2,1.4
c0,0.5-0.1,0.9-0.2,1.4V100h45.5V86.7z M124,105.5l-1.4-3.5H76.4l-1.4,3.5c-0.2,0.5-0.1,0.9,0.1,1.3c0.3,0.4,0.7,0.6,1.2,0.6h46.3
c0.5,0,0.9-0.2,1.2-0.6C124.1,106.4,124.1,105.9,124,105.5z M122.5,116.3l1.4-4.2c0.2-0.7,0.1-1.5-0.3-2c-0.2-0.2-0.5-0.6-1.1-0.6
H76.4c-0.5,0-0.9,0.4-1.1,0.6c-0.4,0.6-0.5,1.3-0.3,2l1.4,4.2h19.1h7.9H122.5z M97.5,118.3v5.6h3.9v-5.6H97.5z M103.9,126h-0.4h-7.9
h-0.4v13.4h0.4h7.9h0.4V126z M130.9,147.9l-26.2-6.6h-1.3v5l24.8,6c1.5,0.4,3,0.5,4.6,0.5h2.6C135.1,150.5,133.3,148.5,130.9,147.9z
 M133.9,154.8c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1C137,156.2,135.6,154.8,133.9,154.8z M87.4,49.1
c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,50.2,86.1,49.1,87.4,49.1z M87.4,51.9
c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,51.7,87.2,51.9,87.4,51.9z M87.4,59.1
c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S86.1,59.1,87.4,59.1z M87.4,61.9c0.2,0,0.4-0.2,0.4-0.4
c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,61.7,87.2,61.9,87.4,61.9z M87.4,69.1c1.3,0,2.4,1.1,2.4,2.4
c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,70.2,86.1,69.1,87.4,69.1z M87.4,71.9c0.2,0,0.4-0.2,0.4-0.4
c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,71.7,87.2,71.9,87.4,71.9z M87.4,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4
c-1.3,0-2.4-1.1-2.4-2.4S86.1,79.1,87.4,79.1z M87.4,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
C87,81.7,87.2,81.9,87.4,81.9z M87.4,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
C85,90.1,86.1,89.1,87.4,89.1z M87.4,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
C87,91.7,87.2,91.9,87.4,91.9z M99.5,49.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
C97.1,50.2,98.2,49.1,99.5,49.1z M99.5,51.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
C99.1,51.7,99.3,51.9,99.5,51.9z M99.5,59.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,59.1,99.5,59.1z
 M99.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,61.7,99.3,61.9,99.5,61.9z M99.5,69.1
c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,70.2,98.2,69.1,99.5,69.1z M99.5,71.9
c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,71.7,99.3,71.9,99.5,71.9z M99.5,79.1
c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,79.1,99.5,79.1z M99.5,81.9c0.2,0,0.4-0.2,0.4-0.4
c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,81.7,99.3,81.9,99.5,81.9z M99.5,89.1c1.3,0,2.4,1.1,2.4,2.4
c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,90.1,98.2,89.1,99.5,89.1z M99.5,91.9c0.2,0,0.4-0.2,0.4-0.4
c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,91.7,99.3,91.9,99.5,91.9z M111.5,49.1c1.3,0,2.4,1.1,2.4,2.4
c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C109.1,50.2,110.2,49.1,111.5,49.1z M111.5,51.9c0.2,0,0.4-0.2,0.4-0.4
c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C111.1,51.7,111.3,51.9,111.5,51.9z M111.5,59.1c1.3,0,2.4,1.1,2.4,2.4
s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S110.2,59.1,111.5,59.1z M111.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4
c-0.2,0-0.4,0.2-0.4,0.4C111.1,61.7,111.3,61.9,111.5,61.9z M111.5,69.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4
c-1.3,0-2.4-1.1-2.4-2.4C109.1,70.2,110.2,69.1,111.5,69.1z M111.5,71.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4
c-0.2,0-0.4,0.2-0.4,0.4C111.1,71.7,111.3,71.9,111.5,71.9z M111.5,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4
c-1.3,0-2.4-1.1-2.4-2.4S110.2,79.1,111.5,79.1z M111.5,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
C111.1,81.7,111.3,81.9,111.5,81.9z M111.5,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4
C109.1,90.1,110.2,89.1,111.5,89.1z M111.5,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4
C111.1,91.7,111.3,91.9,111.5,91.9z"/>
    </symbol>
    <symbol id=writing-desk viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M30,64.9v7.7h6v11.8h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2c-0.9,0.8-1.5,1.9-1.5,3.2
c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2c-0.9,0.8-1.5,1.9-1.5,3.2
c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5c0-1.4-0.7-2.6-1.7-3.3
c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3c0-1.3-0.6-2.4-1.5-3.2
c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1v-3.6h102.5v3.6h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2
c-0.9,0.8-1.5,1.9-1.5,3.2c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2
c-0.9,0.8-1.5,1.9-1.5,3.2c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5
c0-1.4-0.7-2.6-1.7-3.3c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3
c0-1.3-0.6-2.4-1.5-3.2c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1V72.7h6v-7.7H30z M44.3,130l-0.2,0.3v1.7h-3.1v-1.4l0-0.3
l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5C44.3,129.7,44.3,129.9,44.3,130z M42.5,128
c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2C44.7,127,43.7,128,42.5,128z M46.2,100.7L44,120.2
c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1
c0.9,0,1.7,0.4,2.3,1C46.1,98.9,46.3,99.8,46.2,100.7z M41.9,90.9h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1
c-1.2,0-2.2-1-2.2-2.2C39.8,91.8,40.7,90.9,41.9,90.9z M39.8,86.7c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2
h-1.1C40.7,88.9,39.8,87.9,39.8,86.7z M46.8,80.9v1.6h-3.7h-1.1H38v-9.8h8.8V80.9z M151.3,78.9H48.8v-6.2h102.5V78.9z M159.5,130
l-0.2,0.3v1.7h-3.1v-1.4l0-0.3l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5
C159.6,129.7,159.5,129.9,159.5,130z M157.8,128c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2
C159.9,127,159,128,157.8,128z M161.5,100.7l-2.2,19.5c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5
c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1c0.9,0,1.7,0.4,2.3,1C161.3,98.9,161.6,99.8,161.5,100.7z M157.2,90.9
h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1c-1.2,0-2.2-1-2.2-2.2C155,91.8,156,90.9,157.2,90.9z M155,86.7
c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1C156,88.9,155,87.9,155,86.7z M162,82.5h-3.7h-1.1h-3.9v-1.6
v-8.2h8.8V82.5z M168,70.7h-4h-10.8h-2H48.8h-2H36h-4v-3.7h136V70.7z"/>
    </symbol>
    <symbol id=small-table viewBox="0 0 200 200">
        <path fill-rule=evenodd d="M161.8,134.2c-0.2-0.1-0.4-0.2-0.6-0.4c-1.3-0.8-2.3-1.4-2.3-3.9c0-2.6,1.8-5.1,3.6-7.4
c1.8-2.4,3.5-4.6,3.5-7.2c0-3.9-1.3-5.7-2.1-6.4v-9.3h-54.2c1.9-2.1,4-6.4,4-15c0-6.2-1.3-10.5-4-13c-1.3-1.2-2.7-1.7-3.6-1.9v-4.9
l1.4-1.4c0.6-0.6,0.8-1.5,0.5-2.3c-0.3-0.8-1.1-1.3-2-1.3h-6.5H93c-0.9,0-1.6,0.5-2,1.3c-0.3,0.8-0.1,1.7,0.5,2.3l1.4,1.4v4.9
c-0.9,0.2-2.3,0.6-3.6,1.9c-2.6,2.5-4,6.8-4,13c0,8.6,2.1,12.9,4,15H35.1v9.3c-0.7,0.7-2.1,2.6-2.1,6.4c0,2.5,1.7,4.8,3.5,7.2
c1.8,2.4,3.6,4.8,3.6,7.4c0,2.5-1,3.1-2.3,3.9c-0.2,0.1-0.4,0.2-0.6,0.4c-1,0.6-1.4,1.8-1.1,2.9c0.3,1.1,1.3,1.9,2.5,1.9H44l0.1,0
c1.6-0.2,4.7-1.9,4.7-7c0-2-1.2-4.5-2.4-7.2c-1.4-3-3-6.5-2-8c0.5-0.7,1.6-1.1,3.5-1.1c3.4,0,5.3,0.6,8,1.5
c5.7,1.8,14.2,4.6,43.6,4.6c29.4,0,38-2.8,43.6-4.6c2.7-0.9,4.7-1.5,8-1.5c1.8,0,3,0.4,3.5,1.1c1,1.5-0.6,4.9-2,8
c-1.2,2.7-2.4,5.2-2.4,7.2c0,5,3.1,6.8,4.7,7l5.5,0c1.2,0,2.2-0.8,2.5-1.9C163.2,135.9,162.8,134.8,161.8,134.2z M87.3,84.7
c0-2.5,0.2-4.6,0.6-6.2c3.8,0.7,7.7,1.1,11.6,1.1c3.9,0,7.8-0.4,11.6-1.1c0.4,1.6,0.6,3.7,0.6,6.2c0,0.3,0,0.7,0,1
c-8,1.5-16.4,1.5-24.4,0C87.3,85.3,87.3,85,87.3,84.7z M92.9,62c0-0.1,0.1-0.1,0.1-0.1h6.5h6.5c0,0,0.1,0,0.1,0.1c0,0.1,0,0.1,0,0.1
l-1.9,1.9v5.8c-3.1,0.5-6.3,0.5-9.3,0v-5.8l-1.9-1.9C92.9,62.1,92.8,62.1,92.9,62z M90.6,73.2c1.5-1.4,3-1.5,3.2-1.5
c1.9,0.4,3.8,0.6,5.8,0.6c1.9,0,3.9-0.2,5.8-0.6c0.2,0,1.7,0,3.2,1.5c0.7,0.7,1.5,1.7,2.1,3.4c-7.2,1.3-14.8,1.3-22.1,0
C89.1,74.9,89.8,73.8,90.6,73.2z M87.4,87.7c4,0.7,8.1,1.1,12.1,1.1c4.1,0,8.2-0.4,12.1-1.1c-0.7,9.7-4.4,11.7-5.1,12h-7.1h-7.1
C91.8,99.4,88,97.4,87.4,87.7z M37.1,101.7h62.4h7.4h55.1v6.7H37.1V101.7z M160.9,136.5c0,0.1-0.2,0.4-0.6,0.4h-5.3
c-0.4-0.1-2.9-0.7-2.9-5c0-1.6,1.1-4,2.2-6.4c1.7-3.7,3.5-7.5,1.9-9.9c-0.9-1.3-2.5-2-5.1-2c-3.7,0-5.9,0.7-8.7,1.6
c-5.5,1.8-13.9,4.5-43,4.5c-29.1,0-37.5-2.7-43-4.5c-2.8-0.9-5-1.6-8.7-1.6c-2.6,0-4.3,0.7-5.1,2c-1.5,2.4,0.2,6.2,1.9,9.9
c1.1,2.4,2.2,4.8,2.2,6.4c0,4.2-2.5,4.9-2.9,5h-5.3c-0.4,0-0.5-0.3-0.6-0.4c0-0.1-0.1-0.4,0.2-0.6c0.2-0.1,0.3-0.2,0.5-0.3
c1.4-0.8,3.3-2,3.3-5.6c0-3.3-2.1-6.1-4-8.6c-1.6-2.1-3.1-4.1-3.1-6c0-3.1,1-4.5,1.5-5h126.1c0.4,0.4,1.5,1.8,1.5,5
c0,1.9-1.5,3.9-3.1,6c-1.9,2.5-4,5.3-4,8.6c0,3.6,1.9,4.7,3.3,5.6c0.2,0.1,0.4,0.2,0.5,0.3C161,136.1,161,136.4,160.9,136.5z"/>
    </symbol>
    <symbol id=stash viewBox="0 0 49 37">
        <path fill-rule=evenodd
              d="M40.773,0.950 L37.515,8.985 L-0.001,8.985 L6.130,26.022 L30.423,26.022 L29.718,28.015 C27.578,28.041 25.795,29.853 25.340,31.887 L14.621,31.887 C14.163,29.835 12.354,28.009 10.188,28.009 C7.679,28.009 5.636,29.788 5.636,32.326 C5.636,34.864 7.679,36.928 10.188,36.928 C12.354,36.928 14.163,35.960 14.621,33.908 L25.340,33.908 C25.798,35.960 27.608,36.928 29.773,36.928 C32.283,36.928 34.325,34.864 34.325,32.326 C34.325,30.487 33.247,29.196 31.702,28.458 L42.104,2.971 L49.000,2.971 L49.000,0.950 L40.773,0.950 ZM10.188,34.907 C8.781,34.907 7.636,33.750 7.636,32.326 C7.636,30.902 8.781,30.030 10.188,30.030 C11.596,30.030 12.741,30.902 12.741,32.326 C12.741,33.750 11.596,34.907 10.188,34.907 ZM32.326,32.326 C32.326,33.750 31.180,34.907 29.773,34.907 C28.366,34.907 27.221,33.750 27.221,32.326 C27.221,30.902 28.366,30.030 29.773,30.030 C31.180,30.030 32.326,30.902 32.326,32.326 ZM31.258,24.000 L7.533,24.000 L2.846,11.007 L36.681,11.007 L31.258,24.000 Z"/>
    </symbol>
    <symbol id=main-logo viewBox="0 0 240 39">
        <path fill-rule=evenodd
              d="M228.686,38.199 L228.686,37.665 L231.919,36.863 L228.956,27.247 L217.912,27.247 L215.219,36.329 L218.720,37.665 L218.720,38.199 L210.639,38.199 L210.639,37.665 L214.141,36.329 L224.646,-0.001 L225.455,-0.001 L236.768,36.863 L240.000,37.665 L240.000,38.199 L228.686,38.199 ZM223.245,8.547 L218.181,26.231 L228.633,26.231 L223.245,8.547 ZM207.488,36.169 C206.572,37.060 205.485,37.754 204.229,38.253 C202.971,38.750 201.606,39.000 200.134,39.000 C198.769,39.000 197.602,38.867 196.632,38.600 C195.663,38.333 194.855,38.021 194.208,37.665 C193.454,37.273 192.825,36.828 192.323,36.329 C192.035,36.863 191.649,37.363 191.165,37.825 C190.680,38.287 190.168,38.590 189.629,38.733 L188.821,38.733 C188.856,38.234 188.892,37.700 188.929,37.131 C188.964,36.668 189.000,36.151 189.036,35.581 C189.072,35.012 189.090,34.459 189.090,33.925 C189.090,33.320 189.072,32.723 189.036,32.135 C189.000,31.548 188.964,31.005 188.929,30.506 C188.892,29.936 188.856,29.384 188.821,28.849 L189.629,28.849 C190.455,31.806 191.649,34.058 193.212,35.608 C194.774,37.157 196.902,37.932 199.595,37.932 C201.751,37.932 203.501,37.247 204.848,35.875 C206.195,34.504 206.868,32.608 206.868,30.185 C206.868,28.725 206.437,27.470 205.576,26.419 C204.713,25.368 203.636,24.397 202.343,23.507 C201.050,22.617 199.640,21.744 198.114,20.889 C196.587,20.034 195.177,19.064 193.885,17.977 C192.591,16.891 191.515,15.618 190.652,14.157 C189.791,12.697 189.360,10.917 189.360,8.814 C189.360,7.604 189.593,6.464 190.060,5.395 C190.526,4.327 191.173,3.392 191.999,2.590 C192.825,1.789 193.794,1.157 194.908,0.694 C196.021,0.231 197.225,-0.001 198.518,-0.001 C199.595,-0.001 200.547,0.142 201.373,0.427 C202.199,0.712 202.899,1.014 203.474,1.335 C204.121,1.727 204.713,2.172 205.252,2.670 C205.539,2.136 205.925,1.638 206.410,1.175 C206.895,0.712 207.407,0.409 207.946,0.266 L208.754,0.266 C208.682,0.801 208.627,1.335 208.592,1.869 C208.556,2.368 208.529,2.893 208.511,3.445 C208.493,3.998 208.485,4.540 208.485,5.075 C208.485,5.681 208.493,6.277 208.511,6.865 C208.529,7.452 208.556,7.996 208.592,8.494 C208.627,9.064 208.682,9.616 208.754,10.150 L207.946,10.150 C207.119,7.194 205.970,4.941 204.498,3.392 C203.025,1.842 201.212,1.068 199.057,1.068 C197.297,1.068 195.824,1.674 194.639,2.884 C193.454,4.095 192.861,5.716 192.861,7.746 C192.861,9.207 193.293,10.462 194.154,11.512 C195.016,12.564 196.094,13.534 197.387,14.424 C198.680,15.315 200.088,16.187 201.616,17.042 C203.142,17.897 204.551,18.868 205.845,19.954 C207.138,21.041 208.215,22.314 209.077,23.774 C209.939,25.235 210.370,27.015 210.370,29.117 C210.370,30.506 210.118,31.806 209.616,33.016 C209.112,34.228 208.404,35.279 207.488,36.169 ZM176.699,37.665 L179.932,36.863 L176.969,27.247 L165.925,27.247 L163.232,36.329 L166.733,37.665 L166.733,38.199 L158.652,38.199 L158.652,37.665 L162.154,36.329 L172.659,-0.001 L173.468,-0.001 L184.781,36.863 L188.013,37.665 L188.013,38.199 L176.699,38.199 L176.699,37.665 ZM171.258,8.547 L166.194,26.231 L176.646,26.231 L171.258,8.547 ZM155.663,35.928 C154.782,36.908 153.768,37.665 152.619,38.199 C151.469,38.733 150.248,39.000 148.956,39.000 C147.267,39.000 145.633,38.600 144.053,37.798 C142.472,36.997 141.063,35.786 139.824,34.165 C138.585,32.545 137.597,30.515 136.861,28.075 C136.124,25.636 135.757,22.777 135.757,19.500 C135.757,16.223 136.124,13.365 136.861,10.925 C137.597,8.486 138.566,6.455 139.770,4.834 C140.973,3.214 142.329,2.003 143.838,1.201 C145.346,0.400 146.872,-0.001 148.417,-0.001 C149.279,-0.001 150.060,0.142 150.760,0.427 C151.460,0.712 152.062,1.033 152.565,1.388 C153.139,1.781 153.643,2.226 154.073,2.724 C154.360,2.190 154.747,1.682 155.232,1.201 C155.717,0.721 156.229,0.409 156.767,0.266 L157.576,0.266 C157.503,0.801 157.449,1.335 157.414,1.869 C157.378,2.368 157.351,2.893 157.333,3.445 C157.314,3.998 157.306,4.540 157.306,5.075 C157.306,5.681 157.314,6.277 157.333,6.865 C157.351,7.452 157.378,7.996 157.414,8.494 C157.449,9.064 157.503,9.616 157.576,10.150 L156.767,10.150 C155.940,7.194 154.836,4.941 153.454,3.392 C152.071,1.842 150.572,1.068 148.956,1.068 C147.950,1.068 146.963,1.353 145.993,1.922 C145.023,2.493 144.161,3.481 143.407,4.888 C142.652,6.295 142.041,8.183 141.575,10.551 C141.108,12.920 140.874,15.903 140.874,19.500 C140.874,23.098 141.108,26.080 141.575,28.449 C142.041,30.818 142.671,32.705 143.460,34.112 C144.250,35.519 145.166,36.508 146.208,37.077 C147.249,37.647 148.344,37.932 149.495,37.932 C150.428,37.932 151.380,37.683 152.350,37.184 C153.320,36.686 154.208,35.991 155.017,35.100 C155.825,34.210 156.506,33.159 157.064,31.948 C157.620,30.738 157.970,29.437 158.114,28.048 L158.922,28.048 C158.778,29.651 158.418,31.120 157.845,32.456 C157.270,33.791 156.542,34.949 155.663,35.928 ZM127.457,21.670 C126.080,21.670 124.963,20.544 124.963,19.155 C124.963,17.766 126.080,16.640 127.457,16.640 C128.834,16.640 129.951,17.766 129.951,19.155 C129.951,20.544 128.834,21.670 127.457,21.670 ZM114.505,34.165 C113.301,35.786 111.946,36.997 110.438,37.798 C108.929,38.600 107.402,39.000 105.858,39.000 C104.314,39.000 102.788,38.600 101.279,37.798 C99.771,36.997 98.415,35.786 97.212,34.165 C96.008,32.545 95.038,30.515 94.303,28.075 C93.566,25.636 93.198,22.777 93.198,19.500 C93.198,16.223 93.566,13.365 94.303,10.925 C95.038,8.486 96.008,6.455 97.212,4.834 C98.415,3.214 99.771,2.003 101.279,1.201 C102.788,0.400 104.314,-0.001 105.858,-0.001 C107.402,-0.001 108.929,0.400 110.438,1.201 C111.946,2.003 113.301,3.214 114.505,4.834 C115.708,6.455 116.677,8.486 117.414,10.925 C118.150,13.365 118.518,16.223 118.518,19.500 C118.518,22.777 118.150,25.636 117.414,28.075 C116.677,30.515 115.708,32.545 114.505,34.165 ZM112.727,10.391 C112.278,7.987 111.685,6.072 110.949,4.647 C110.213,3.223 109.395,2.226 108.498,1.655 C107.600,1.086 106.720,0.801 105.858,0.801 C104.996,0.801 104.116,1.086 103.219,1.655 C102.321,2.226 101.503,3.223 100.767,4.647 C100.031,6.072 99.438,7.987 98.990,10.391 C98.540,12.795 98.316,15.832 98.316,19.500 C98.316,23.169 98.540,26.205 98.990,28.609 C99.438,31.013 100.031,32.928 100.767,34.352 C101.503,35.777 102.321,36.775 103.219,37.344 C104.116,37.914 104.996,38.199 105.858,38.199 C106.720,38.199 107.600,37.914 108.498,37.344 C109.395,36.775 110.213,35.777 110.949,34.352 C111.685,32.928 112.278,31.013 112.727,28.609 C113.176,26.205 113.401,23.169 113.401,19.500 C113.401,15.832 113.176,12.795 112.727,10.391 ZM77.575,37.665 L80.807,36.863 L80.807,2.136 L77.575,1.335 L77.575,0.801 L88.619,0.801 L88.619,1.335 L85.387,2.136 L85.387,36.863 L88.619,37.665 L88.619,38.199 L77.575,38.199 L77.575,37.665 ZM62.761,39.000 L61.952,39.000 L50.640,2.136 L47.407,1.335 L47.407,0.801 L58.721,0.801 L58.721,1.335 L55.488,2.136 L64.108,30.185 L71.650,2.670 L68.148,1.335 L68.148,0.801 L76.229,0.801 L76.229,1.335 L72.727,2.670 L62.761,39.000 ZM52.256,37.665 L52.256,38.199 L40.943,38.199 L40.943,37.665 L44.175,36.863 L41.212,27.247 L30.168,27.247 L27.474,36.329 L30.977,37.665 L30.977,38.199 L22.896,38.199 L22.896,37.665 L26.397,36.329 L36.902,-0.001 L37.711,-0.001 L49.024,36.863 L52.256,37.665 ZM35.502,8.547 L30.438,26.231 L40.889,26.231 L35.502,8.547 ZM19.906,35.928 C19.025,36.908 18.011,37.665 16.861,38.199 C15.712,38.733 14.491,39.000 13.198,39.000 C11.510,39.000 9.876,38.600 8.296,37.798 C6.715,36.997 5.306,35.786 4.067,34.165 C2.828,32.545 1.840,30.515 1.104,28.075 C0.367,25.636 -0.000,22.777 -0.000,19.500 C-0.000,16.223 0.367,13.365 1.104,10.925 C1.840,8.486 2.809,6.455 4.013,4.834 C5.216,3.214 6.572,2.003 8.080,1.201 C9.589,0.400 11.115,-0.001 12.659,-0.001 C13.522,-0.001 14.302,0.142 15.003,0.427 C15.703,0.712 16.304,1.033 16.808,1.388 C17.382,1.781 17.885,2.226 18.316,2.724 C18.603,2.190 18.990,1.682 19.474,1.201 C19.959,0.721 20.471,0.409 21.010,0.266 L21.818,0.266 C21.746,0.801 21.692,1.335 21.656,1.869 C21.620,2.368 21.593,2.893 21.576,3.445 C21.557,3.998 21.549,4.540 21.549,5.075 C21.549,5.681 21.557,6.277 21.576,6.865 C21.593,7.452 21.620,7.996 21.656,8.494 C21.692,9.064 21.746,9.616 21.818,10.150 L21.010,10.150 C20.183,7.194 19.079,4.941 17.697,3.392 C16.313,1.842 14.815,1.068 13.198,1.068 C12.192,1.068 11.205,1.353 10.235,1.922 C9.266,2.493 8.404,3.481 7.649,4.888 C6.895,6.295 6.284,8.183 5.818,10.551 C5.351,12.920 5.117,15.903 5.117,19.500 C5.117,23.098 5.351,26.080 5.818,28.449 C6.284,30.818 6.913,32.705 7.703,34.112 C8.493,35.519 9.409,36.508 10.451,37.077 C11.492,37.647 12.587,37.932 13.737,37.932 C14.671,37.932 15.623,37.683 16.593,37.184 C17.562,36.686 18.451,35.991 19.259,35.100 C20.067,34.210 20.749,33.159 21.306,31.948 C21.863,30.738 22.213,29.437 22.357,28.048 L23.165,28.048 C23.021,29.651 22.661,31.120 22.087,32.456 C21.512,33.791 20.785,34.949 19.906,35.928 Z"/>
    </symbol>
</svg>
@endsection