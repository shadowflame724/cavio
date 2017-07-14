<div class="form-group">
    {{ Form::label('code', trans('validation.attributes.backend.access.product.code'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('code', $product->code, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required', 'autofocus' => 'autofocus']) }}
    </div><!--col-lg-10-->
</div>

<div class="form-group">
    {{ Form::label('name', trans('validation.attributes.backend.access.product.name'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('name', $product->name, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required', 'autofocus' => 'autofocus']) }}
    </div><!--col-lg-10-->
</div>
<div class="form-group">
    {{ Form::label('prev', trans('validation.attributes.backend.access.product.prev'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {{ Form::text('prev', $product->prev, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required', 'autofocus' => 'autofocus']) }}
    </div><!--col-lg-10-->
</div>

<div class="row">
    @foreach($product->childs as $child)
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="checkboxWarning" value="option1">
                        Один CHILD
                    </label>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group" style="margin-left: 0;margin-right: 0;">
                        {{ Form::label('child_code', trans('validation.attributes.backend.access.product.code')) }}
                        {{ Form::text('child_code', $child->code, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                    </div>
                    <div class="form-group" style="margin-left: 0;margin-right: 0;">
                        {{ Form::label('child_name', trans('validation.attributes.backend.access.product.name')) }}
                        {{ Form::text('child_name', $child->name, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                    </div>
                    <div class="form-group" style="margin-left: 0;margin-right: 0;">
                        {{ Form::label('child_prev', trans('validation.attributes.backend.access.product.prev')) }}
                        {{ Form::text('child_prev', $child->prev, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-xs btn-success">Сохранить</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

@foreach($product->photos as $photo)
    <div class="panel panel-default">
        <div class="panel-heading">
            Одно PHOTO
        </div>
        <div class="panel-body">
            <div class="form-group">
                {{ Form::label('photo_photos', trans('validation.attributes.backend.access.product.code'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('photo_photos', $photo->photos, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div>
            <div class="form-group">
                {{ Form::label('photo_prev', trans('validation.attributes.backend.access.product.name'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('photo_prev', $photo->prev, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div>
        </div>
    </div>
@endforeach

{{--{{ dd($product->childs) }}--}}

<div class="form-group">
    {{ Form::label('category_id', trans('validation.attributes.backend.access.product.category_id'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div><!--col-lg-10-->
</div><!--form control-->
