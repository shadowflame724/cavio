@extends('frontend.layouts.app_dev')
@section('head')
    <body class=stash>
    @endsection
    @section('content')

        <section id=modal-order class="zone-col-modal modal-log_reg order">
            <div class=wrapper-zone-col-modal>
                <div class="scroller scroller-zc-modal">
                    <div class=scroller-inner>
                        <div class=close-modal></div>
                        <div class="wrap-swiper-log_reg inner-zone-col-modal order relative">
                            <div class=small_modal-title>Order</div>
                            <div class="swiper-wrapper wrap-log_reg-items">
                                <div class="swiper-slide log_reg-item reg">
                                    <form class=login_reg>
                                        <div class="wrap-2-input clearfix">
                                            <div class=wrap-inp_W_50><input class=fullW placeholder="First name"
                                                                            name=first_name></div>
                                            <div class=wrap-inp_W_50><input class=fullW placeholder="Last name"
                                                                            name=last_name>
                                            </div>
                                        </div>
                                        <div class="wrap-2-input clearfix">
                                            <div class=wrap-inp_W_50><input class=fullW placeholder=Phone name=phone>
                                            </div>
                                            <div class=wrap-inp_W_50><input class=fullW placeholder="Last name"
                                                                            name=last_name>
                                            </div>
                                        </div>
                                        <hr class=login_reg-line>
                                        <input class=fullW placeholder=E-mail type=email> <input class=fullW
                                                                                                 placeholder=Password
                                                                                                 type=password>
                                        <button id=order-in_stash class="btn small login_reg-submit" content=register>
                                            register
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main id=main-scrollbar>
            <section id=top-waves class=relative></section>
            <section id=catalogue>
                <div class=container>
                    <div class="small-page-title hide"><span class=text-title>Shopping Cart</span></div>
                    <div class="wrap-catal stash wrap-box-shadow clearfix bg-white-marmur hide">
                        <div class="wrap-stash-list">
                            <div class="item-detail-order-data-wrap_anim">
                                <div class="item-detail-order-data stash">
                                    <div class="order-item-img"
                                         style="background-image: url(images/order-litem-1.jpg)"></div>
                                    <div class="wrap-center-order_it-data stash">
                                        <div>
                                            <div class="wrap-head-ord_it-for_mobile stash">
                                                <div class="kick-ord_it"></div>
                                                <div class="top-center-ord_it-data clearfix">
                                                    <div class="ord_it-name">Sofa 2 Seats Folding</div>
                                                    <div class="wrap-calc_price">
                                                        <div class="ord_it-numb"><span
                                                                    class="calc_it minus disabled"></span><span
                                                                    class="ord_it-numb-val">1</span><span
                                                                    class="calc_it plus"></span></div>
                                                        <div class="ord_it-price">1445 €</div>
                                                    </div>
                                                </div>
                                                <div class="mibble-center-ord_it-data order"><span class="ord_it-code">FR2272</span>
                                                    <span class="catal-type">dinning</span> <span
                                                            class="catal-item-numb">Villa Cannes</span></div>
                                            </div>
                                            <div class="bottom-center-ord_it-data"><span class="material-ord_it"><div
                                                            class="label-bot-ord_it-data">finish</div>Ebano Lucido Scuro</span>
                                                <span class="material-ord_it-code"><div class="label-bot-ord_it-data">Tissue</div>TS445</span>
                                                <span class="size-ord_it"><div
                                                            class="label-bot-ord_it-data">Dimensions</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-detail-order-data-wrap_anim">
                                <div class="item-detail-order-data stash">
                                    <div class="order-item-img"
                                         style="background-image: url(images/order-litem-1.jpg)"></div>
                                    <div class="wrap-center-order_it-data stash">
                                        <div>
                                            <div class="wrap-head-ord_it-for_mobile stash">
                                                <div class="kick-ord_it"></div>
                                                <div class="top-center-ord_it-data clearfix">
                                                    <div class="ord_it-name">Sofa 2 Seats Folding</div>
                                                    <div class="wrap-calc_price">
                                                        <div class="ord_it-numb"><span
                                                                    class="calc_it minus disabled"></span><span
                                                                    class="ord_it-numb-val">1</span><span
                                                                    class="calc_it plus"></span></div>
                                                        <div class="ord_it-price">1445 €</div>
                                                    </div>
                                                </div>
                                                <div class="mibble-center-ord_it-data order"><span class="ord_it-code">FR2272</span>
                                                    <span class="catal-type">dinning</span> <span
                                                            class="catal-item-numb">Villa Cannes</span></div>
                                            </div>
                                            <div class="bottom-center-ord_it-data"><span class="material-ord_it"><div
                                                            class="label-bot-ord_it-data">finish</div>Ebano Lucido Scuro</span>
                                                <span class="material-ord_it-code"><div class="label-bot-ord_it-data">Tissue</div>TS445</span>
                                                <span class="size-ord_it"><div
                                                            class="label-bot-ord_it-data">Dimensions</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-detail-order-data-wrap_anim">
                                <div class="item-detail-order-data stash">
                                    <div class="order-item-img"
                                         style="background-image: url(images/order-litem-1.jpg)"></div>
                                    <div class="wrap-center-order_it-data stash">
                                        <div>
                                            <div class="wrap-head-ord_it-for_mobile stash">
                                                <div class="kick-ord_it"></div>
                                                <div class="top-center-ord_it-data clearfix">
                                                    <div class="ord_it-name">Sofa 2 Seats Folding</div>
                                                    <div class="wrap-calc_price">
                                                        <div class="ord_it-numb"><span
                                                                    class="calc_it minus disabled"></span><span
                                                                    class="ord_it-numb-val">1</span><span
                                                                    class="calc_it plus"></span></div>
                                                        <div class="ord_it-price">1445 €</div>
                                                    </div>
                                                </div>
                                                <div class="mibble-center-ord_it-data order"><span class="ord_it-code">FR2272</span>
                                                    <span class="catal-type">dinning</span> <span
                                                            class="catal-item-numb">Villa Cannes</span></div>
                                            </div>
                                            <div class="bottom-center-ord_it-data"><span class="material-ord_it"><div
                                                            class="label-bot-ord_it-data">finish</div>Ebano Lucido Scuro</span>
                                                <span class="material-ord_it-code"><div class="label-bot-ord_it-data">Tissue</div>TS445</span>
                                                <span class="size-ord_it"><div
                                                            class="label-bot-ord_it-data">Dimensions</div>L: 205, W: 100, H: 50, Mattress: 70x195x14</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-bot-stash_list clearfix">
                                <div class="footnote">* The full cost of the goods is indicated, the shipping cost is
                                    considered by manager.
                                </div>
                                <div class="wrap-total_result-ord_it stast">
                                    <div class="label-total">total:</div>
                                    <div class="total_price-ord_it">10 235 €</div>
                                    <div class="crossed-price">10 735 €</div>
                                    <div class="price-vat">Including 22% (2 364€) VAT</div>
                                </div>
                            </div>
                        </div>
                        <div class=wrap-stash_order>
                            <button id=order-now class="btn dark-profile" content="Order now">Order now</button>
                        </div>
                    </div>
                </div>
            </section>
            @endsection
        </main>
