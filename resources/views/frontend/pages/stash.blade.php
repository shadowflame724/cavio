@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'stash')

@section('before_header')
  <section id="modal-order" class="zone-col-modal modal-log_reg order">
    <div class="wrapper-zone-col-modal">
      <div class="scroller scroller-zc-modal">
        <div class="scroller-inner">
          <div class="close-modal"></div>

          <div class="wrap-swiper-log_reg inner-zone-col-modal order relative">

            <div class="small_modal-title">{{ trans('frontend.modalOrder.title') }}</div>

            <div class="swiper-wrapper wrap-log_reg-items">
              <div class="swiper-slide log_reg-item reg">

                <form class="login_reg">

                  <div class="wrap-2-input clearfix">
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.firstName') }}" name="first_name">
                    </div>
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.lastName') }}" name="last_name">
                    </div>
                  </div>

                  <div class="wrap-2-input clearfix">
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.phone') }}" name="phone">
                    </div>
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.region') }}" name="region">
                    </div>
                  </div>

                  <div class="wrap-2-input clearfix">
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.city') }}" name="city">
                    </div>
                    <div class="wrap-inp_W_50">
                      <input class="fullW" placeholder="{{ trans('frontend.modalOrder.zipCode') }}" name="zip_code">
                    </div>
                  </div>

                  <hr class="login_reg-line">

                  <input class="fullW" placeholder="{{ trans('frontend.modalOrder.email') }}" type="email">
                  <button id="order-in_stash" class="btn small login_reg-submit" content="{{ trans('frontend.modalOrder.title') }}">{{ trans('frontend.modalOrder.title') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="modal-thank_you-subs" class="zone-col-modal modal-log_reg ty">
  <div class="wrapper-zone-col-modal">
    <div class="scroller scroller-zc-modal">
      <div class="scroller-inner">
        <div class="close-modal"></div>

        <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

          <h3 class="section-title modal show">Thank You For Subscribing!</h3>

          <div class="ty-text">Thank You For Subscribing!222</div>

          <div class="wrap-stash_order">
            <button class="btn dark-profile btn-close-modal" content="ok">ok</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <section id="modal-thank_you" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
      <div class="scroller scroller-zc-modal">
        <div class="scroller-inner">
          <div class="close-modal"></div>

          <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

            <h3 class="section-title modal show">{{ trans('frontend.thankForOrderModal.title') }}.</h3>

            <div class="ty-text">{{ trans('frontend.thankForOrderModal.body') }}.</div>

            <div class="wrap-stash_order">
              <button id="ty-ok" class="btn dark-profile" content="ok">ok</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
    <section id="top-waves" class="relative"></section>

    <section id="catalogue" class="">
      <div class="container">
        <div class="small-page-title hide"><span class="text-title">{{ trans('frontend.shoppingCart.title') }}</span></div>
        <div class="wrap-catal stash wrap-box-shadow clearfix bg-white-marmur hide">
          <div class="wrap-stash-list">
            <div class="item-detail-order-data-wrap_anim discount">
              <div class="item-detail-order-data stash">
                <div class="inner-order-item-img">
                  <div class="for-disp_discount">
                    <div class="order-item-img bg-white-marmur" style="background-image: url(../../upload/images/order-litem-1.jpg)"></div>
                  </div>
                </div>
                <div class="wrap-center-order_it-data stash">
                    <div>
                      <div class="wrap-head-ord_it-for_mobile stash">
                        <div class="kick-ord_it"></div>
                        <div class="top-center-ord_it-data clearfix">
                          <div class="ord_it-name">Sofa 2 Seats Folding</div>
                          <div class="wrap-calc_price">
                            <div class="ord_it-numb"><span class="calc_it minus disabled"></span><span class="ord_it-numb-val">1</span><span class="calc_it plus"></span></div>
                            <div class="ord_it-price">1445 €</div>
                          </div>
                        </div>
                        <div class="mibble-center-ord_it-data order stash">
                          <span class="ord_it-code">FR2272</span>
                          <span class="catal-type">dinning</span>
                          <span class="catal-type">dinning</span>
                          <span class="catal-type">dinning</span>
                          <span class="catal-item-numb">Villa Cannes</span>
                          <span class="catal-item-numb">Villa Cannes</span>
                          <span class="catal-item-numb">Villa Cannes</span>
                        </div>
                      </div>
                      <div class="bottom-center-ord_it-data clearfix">
                        <span class="material-ord_it">
                          <div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.finishing') }}</div>
                          <span class="inner-nowrap">Ebano Lucido Scuro</span>
                          <span class="inner-nowrap">Ebano Lucido</span>
                          <span class="inner-nowrap">Ebano Scuro</span>
                        </span>
                        <span class="material-ord_it-code">
                          <div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.tissue') }}</div>
                          <span class="inner-nowrap">TS445</span>
                          <span class="inner-nowrap">TS111</span>
                          <span class="inner-nowrap">TS222</span>
                          <span class="inner-nowrap">TS333</span>
                        </span>
                        <span class="size-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.dimensions') }}</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="item-detail-order-data-wrap_anim">
              <div class="item-detail-order-data stash">
                <div class="inner-order-item-img">
                  <div class="for-disp_discount">
                    <div class="order-item-img bg-white-marmur" style="background-image: url(../../upload/images/order-litem-1.jpg)"></div>
                  </div>
                </div>
                <div class="wrap-center-order_it-data stash">
                  <div>
                    <div class="wrap-head-ord_it-for_mobile stash">
                      <div class="kick-ord_it"></div>
                      <div class="top-center-ord_it-data clearfix">
                        <div class="ord_it-name">Sofa 2 Seats Folding</div>
                        <div class="wrap-calc_price">
                          <div class="ord_it-numb"><span class="calc_it minus disabled"></span><span class="ord_it-numb-val">1</span><span class="calc_it plus"></span></div>
                          <div class="ord_it-price">1445 €</div>
                        </div>
                      </div>
                      <div class="mibble-center-ord_it-data order stash">
                        <span class="ord_it-code">FR2272</span>
                        <span class="catal-type">dinning</span>
                        <span class="catal-item-numb">Villa Cannes</span>
                      </div>
                    </div>
                    <div class="bottom-center-ord_it-data clearfix">
                      <span class="material-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.finishing') }}</div>Ebano Lucido Scuro</span>
                      <span class="material-ord_it-code"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.tissue') }}</div>TS445</span>
                      <span class="size-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.dimensions') }}</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-detail-order-data-wrap_anim">
              <div class="item-detail-order-data stash">
                <div class="inner-order-item-img">
                  <div class="for-disp_discount">
                    <div class="order-item-img bg-white-marmur" style="background-image: url(../../upload/images/order-litem-1.jpg)"></div>
                  </div>
                </div>
                <div class="wrap-center-order_it-data stash">
                  <div>
                    <div class="wrap-head-ord_it-for_mobile stash">
                      <div class="kick-ord_it"></div>
                      <div class="top-center-ord_it-data clearfix">
                        <div class="ord_it-name">Sofa 2 Seats Folding</div>
                        <div class="wrap-calc_price">
                          <div class="ord_it-numb"><span class="calc_it minus disabled"></span><span class="ord_it-numb-val">1</span><span class="calc_it plus"></span></div>
                          <div class="ord_it-price">1445 €</div>
                        </div>
                      </div>
                      <div class="mibble-center-ord_it-data order stash">
                        <span class="ord_it-code">FR2272</span>
                        <span class="catal-type">dinning</span>
                        <span class="catal-item-numb">Villa Cannes</span>
                      </div>
                    </div>
                    <div class="bottom-center-ord_it-data clearfix">
                      <span class="material-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.finishing') }}</div>Ebano Lucido Scuro</span>
                      <span class="material-ord_it-code"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.tissue') }}</div>TS445</span>
                      <span class="size-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.dimensions') }}</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="wrap-bot-stash_list clearfix">
              <div class="footnote">
                <div class="item-footnote">* {{ trans('frontend.shoppingCart.fullCostMessage') }}.</div>
                <div class="item-footnote">
                  ** {{ trans('frontend.shoppingCart.additionalDiscountsMessage') }}:
                  <div class="marg-t clearfix">
                    <div class="descr-disc-label">{{ trans('frontend.shoppingCart.from') }}</div>
                    <div class="descr-disc">
                      5000 {{ trans('frontend.shoppingCart.to') }} 10000 – 5%<br>
                      10001 to 20000  - 10%<br>
                      >20000  - {{ trans('frontend.shoppingCart.customDiscount') }}
                    </div>
                  </div>
                </div>
              </div>

              <!--<div class="wrap-total_result-ord_it stast">-->
                <!--<div class="stash-total_amount clearfix">-->
                  <!--<div class="left-label">Total amount</div>-->
                  <!--<div class="right-val">10 000 Eur</div>-->
                <!--</div>-->
                <!--<div class="stash-addit_discount clearfix">-->
                  <!--<div class="left-label">**Additional discount 5%</div>-->
                  <!--<div class="right-val">500 Eur</div>-->
                <!--</div>-->
                <!--<div class="stash-total_play clearfix">-->
                  <!--<div class="left-label">Total to pay</div>-->
                  <!--<div class="right-val">9 500 Eur</div>-->
                <!--</div>-->
                <!--<div class="stash-incl clearfix">-->
                  <!--<div class="left-label">Including 22% VAT</div>-->
                  <!--<div class="right-val">(2 364Eur)</div>-->
                <!--</div>-->
              <!--</div>-->
              <div class="wrap-total_result-ord_it stast ver_2">
                <div class="label-total">{{ trans('frontend.shoppingCart.totalToPay') }}:</div>
                <div class="total_price-ord_it">9 500 €</div>
                <div class="crossed-price">10 000 €</div>
                <div class="price-vat">**{{ trans('frontend.shoppingCart.including') }} 22% (220€) {{ trans('frontend.shoppingCart.vat') }}, and Additional discount 5% (500€)</div>
            </div>
          </div>
            <div class="wrap-stash_order clearfix">
              <button id="order-now" class="btn dark-profile" content="{{ trans('frontend.shoppingCart.orderNow') }}">{{ trans('frontend.shoppingCart.orderNow') }}</button>
            </div>
            <div class="mob_copy-footnote">
              <div class="item-footnote">* {{ trans('frontend.shoppingCart.fullCostMessage') }}.</div>
              <div class="item-footnote">
                ** {{ trans('frontend.shoppingCart.additionalDiscountsMessage') }}:
                <div class="marg-t clearfix">
                  <div class="descr-disc-label">{{ trans('frontend.shoppingCart.from') }}</div>
                  <div class="descr-disc">
                    5000 {{ trans('frontend.shoppingCart.to') }} 10000 – 5%<br>
                    10001 {{ trans('frontend.shoppingCart.to') }} 20000  - 10%<br>
                    >20000  - {{ trans('frontend.shoppingCart.customDiscount') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection