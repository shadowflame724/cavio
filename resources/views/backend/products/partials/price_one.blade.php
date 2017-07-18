<div class="col-lg-3">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="panel-title">
                {{ trans('product-form.label.price.title') }} <b>{{ $price->child->code }}</b>
            </div>
        </div>
        <div class="panel-collapse collapse {{ ($price->published)?'in':'' }}" id="productPrice{{ $price->id }}">
            <div class="panel-body">
                <label for="photo[{{$photo_id}}][price][{{$price->id}}][price]">{{ trans('product-form.label.price.price') }}</label>
                <div class="input-group input-group-sm" style="width: 100%;">
                    {{ Form::text('photo['.$photo_id.'][price]['.$price->id.'][price]', $price->price, [
                        'id' => 'photo['.$photo_id.'][price]['.$price->id.'][price]',
                        'class' => 'form-control',
                        'maxlength' => '100',
                        'required' => 'required'
                    ]) }}
                </div>
                <label for="photo[{{$photo_id}}][price][{{$price->id}}][comment]">{{ trans('product-form.label.price.comment') }}</label>
                <div class="input-group input-group-sm" style="width: 100%;">
                    {{ Form::textarea('photo['.$photo_id.'][price]['.$price->id.'][comment]', $price->comment, [
                        'id' => 'photo['.$photo_id.'][price]['.$price->id.'][comment]',
                        'class' => 'form-control',
                        'maxlength' => '100',
                        'rows' => '3',
                        'required' => 'required'
                    ]) }}
                </div>
            </div>
        </div>
    </div>
</div>