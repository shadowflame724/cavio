<div class="wrap-total_result-ord_it stast ver_2">
    <div class="label-total">{{ trans('frontend.shoppingCart.totalToPay') }}:</div>

    @if($summ['discount_all'] > 0)
        @php($summF = $summ['summ_vat']*$summ['discount_all']/100)
        @php($total = round($summ['summ_vat']-$summF))
        <div class="total_price-ord_it">{{$total}} €</div>
        <div class="crossed-price">{{$summ['summ_vat']}} €</div>
    @else
        <div class="total_price-ord_it">{{$summ['summ_vat']}} €</div>
    @endif

    <div class="price-vat">**{{ trans('frontend.shoppingCart.including') }}
        {{$config['vat_data']}}% ({{round($summ['summ_default']*0.22)}}€) {{ trans('frontend.shoppingCart.vat') }}

        @if($summ['discount_all'] > 0)
            ,and Additional discount {{$summ['discount_all']}}% ({{round($summF)}}€)
        @endif
    </div>
</div>