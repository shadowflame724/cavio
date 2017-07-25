@php
    $prcKey = ($price->id) ? $price->id : 'KEY';
@endphp
<div class="col-lg-3">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="panel-title">
                {{ trans('product-form.label.price.title') }} <b
                        data-replace="child_code">{{ $price->child->code or '' }}</b>
                <input type="text" data-replace="child_code_input"
                       name="photo[{{ $photo_id }}][price][{{ $prcKey }}][child_code]"
                       value="{{ $price->child->code or '' }}">
                <input type="number"
                       name="photo[{{ $photo_id }}][price][{{ $prcKey }}][price]"
                       value="{{ $price->price or '' }}">
            </div>
        </div>
        <div class="panel-body">
            @php
                $isNotCust = ($price->custom) ? true : false;
            @endphp
            <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][price]">{{ trans('product-form.label.price.price') }}</label>
            <div class="input-group input-group-sm" style="width: 100%;">
                {{ Form::number('photo['. $photo_id .'][price]['.$prcKey.'][def_price]', $price->def_price, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][def_price]',
                    'data-replace' => 'def_price',
                    'class' => 'form-control',
                    'readonly' => $isNotCust,
                    'min' => '0',
                    'maxlength' => '100',
                    //'required' => 'required'
                ]) }}
                <span class="input-group-addon" style="min-width: 32px;">
                    <i class="fa fa-eur"></i>
                </span>
            </div>
            <div class="input-group input-group-sm" data-type="custom_price_check" style="width: 100%;">
                <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][custom]" class="input-group-addon" style="min-width: 0;">
                    {{ Form::checkbox('photo['.$photo_id.'][price]['.$prcKey.'][custom]', $price->custom, $price->custom, [
                        'data-replace' => 'custom',
                        'id' => 'photo['.$photo_id.'][price]['.$prcKey.'][custom]'
                    ]) }} Custom?
                </label>
                {{ Form::number('photo['. $photo_id .'][price]['.$prcKey.'][cus_price]', $price->cus_price, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][cus_price]',
                    'data-replace' => 'price',
                    'class' => 'form-control',
                    'readonly' => !$isNotCust,
                    'min' => '0',
                    'maxlength' => '100',
                    //'required' => 'required'
                ]) }}
                <span class="input-group-addon" style="min-width: 32px;">
                    <i class="fa fa-eur"></i>
                </span>
            </div>
            <div class="input-group input-group-sm" style="width: 100%;">
                <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][discount]" class="input-group-addon" style="min-width: 0;">
                    Discount:
                </label>
                {{ Form::number('photo['. $photo_id .'][price]['.$prcKey.'][discount]', $price->discount, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][discount]',
                    'data-replace' => 'discount',
                    'class' => 'form-control',
                    'maxlength' => '100',
                    'min' => '0',
                    'max' => '99',
                    //'required' => 'required'
                ]) }}
                <span class="input-group-addon" style="min-width: 32px;">
                    <i class="fa fa-percent"></i>
                </span>
            </div>
            <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][comment]">{{ trans('product-form.label.price.comment') }}</label>
            <div class="input-group input-group-sm" style="width: 100%;">
                {{ Form::textarea('photo['. $photo_id .'][price]['.$prcKey.'][comment]', $price->comment, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][comment]',
                    'class' => 'form-control',
                    'data-replace' => 'comment',
                    'maxlength' => '100',
                    'rows' => '3',
                    //'required' => 'required'
                ]) }}
            </div>
        </div>
    </div>
</div>