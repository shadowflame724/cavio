<section id=zones-mobal class=zone-col-modal>
    <div class=wrapper-zone-col-modal>
        <div class="scroller scroller-zc-modal">
            <div class=scroller-inner>
                <div class=close-modal></div>
                <div class="inner-zone-col-modal bg-white-marmur">
                    <div class=wrap-drop-list-zc>
                        <div class=title-list-type>Collections</div>
                        <div id=wrap-news-type class="drop-down show">
                            <span class=curr-news-type>All collections</span>
                            <ul class="zc-modal-types clearfix">
                                @foreach($collection->collectionZones as $zone)
                                    <li>
                                        <a href=#>{{ $zone->title }}</a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class=zc-modal-carousel>
                        <div class="swiper-wrapper shadow-top-bot">
                            <div class="swiper-slide zc-modal-slide" style="background-image: url('/upload/images/zc-carousel-item1.jpg')"></div>
                            <div class="swiper-slide zc-modal-slide" style="background-image: url('/upload/images/banner-main-1.jpg')"></div>
                            <div class="swiper-slide zc-modal-slide" style="background-image: url('/upload/images/zc-carousel-item2.jpg')"></div>
                        </div>
                        <div class="zc-modal-swip-arrow prev"></div>
                        <div class="zc-modal-swip-arrow next"></div>
                        <div class=swiper-pagination></div>
                    </div>
                    <div class=wrap-zc-modal-product-list>
                        <div class=zon-col-upper_list>
                            <div class="wrap-descr_and_title clearfix">
                                <div class=wrap-name-and-prod_numb>
                                    <div class=descr-zon_col-item-name>{{ $collection->title }}</div>
                                    <div class=zc-modal-prod-numb>
                                        <span class=prod-numb>345</span>
                                        products
                                    </div>
                                </div>
                                <div class=descr-zon_col-item>{{ $collection->description }}</div>
                            </div>
                        </div>
                        <div class="zc-modal-product-list clearfix">

                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-1.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>


                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-2.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class=product-img-table>
                                        <div class="wrap-new-product-img bg-white-marmur" style="background-image: url(..//upload/images/un_banner-1-3.jpg)"></div>
                                    </div>
                                    <div class=wrap-new-product-data>
                                        <div class=product-code>#pr117</div>
                                        <div class=product-name>Bench</div>
                                        <div class=product-size>Como</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class=zc-modal-product-show-more>
                            <button class="btn dark" content="show more">show more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>