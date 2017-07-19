@php
    $prcKey = ($price->id) ? $price->id : 'KEY';
@endphp
<div class="col-lg-3">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="panel-title">
                {{ trans('product-form.label.price.title') }} <b
                        data-replace="child_code">{{ $price->child->code or '' }}</b>
            </div>
        </div>
        <div class="panel-body">
            <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][price]">{{ trans('product-form.label.price.price') }}</label>
            <div class="input-group input-group-sm" style="width: 100%;">
                {{ Form::text('photo['. $photo_id .'][price]['.$prcKey.'][def_price]', $price->def_price, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][def_price]',
                    'data-replace' => 'def_price',
                    'class' => 'form-control',
                    'maxlength' => '100',
                    //'required' => 'required'
                ]) }}
            </div>
            <div class="input-group input-group-sm" style="width: 100%;">
                <label for="photo[{{ $photo_id }}][price][{{$prcKey}}][custom]" class="input-group-addon" style="min-width: 0;">
                    {{ Form::checkbox('photo['.$photo_id.'][price]['.$prcKey.'][custom]', $price->custom, $price->custom, [
                        'data-replace' => 'custom',
                        'id' => 'photo['.$photo_id.'][price]['.$prcKey.'][custom]'
                    ]) }} Custom?
                </label>
                {{ Form::text('photo['. $photo_id .'][price]['.$prcKey.'][price]', $price->price, [
                    'id' => 'photo['. $photo_id .'][price]['.$prcKey.'][price]',
                    'data-replace' => 'price',
                    'class' => 'form-control',
                    'maxlength' => '100',
                    //'required' => 'required'
                ]) }}
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