<div class="col-lg-12">
    <div class="input-group input-group-sm" data-type="parent_for_slug">
        {{ Form::label('code', trans('product-form.label.parent.code'), ['class' => 'input-group-addon']) }}
        @if(isset($parentCodes))
            <select class="select2 form-control parent_code" required="required" id="code" name="code">
                @foreach($parentCodes as $key => $code)
                <option value="{{ $key }}" @if($code == $product->code)selected="selected" @endif>{{ $code }}</option>
                @endforeach
            </select>
            {{-- Form::select('code', $parentCodes, $product->code, [
                'class' => 'select2 form-control',
                'required' => 'required',
                'autofocus' => 'autofocus'
            ]) --}}
        @else
            {{ Form::text('code', $product->code, [
                'class' => 'form-control',
                'readonly' => 'readonly',
                'data-type' => 'input-parent-code',
                'maxlength' => '100',
                'required' => 'required'
            ]) }}
        @endif
    </div>
</div>
<div class="col-lg-12">
    <div class="input-group input-group-sm">
        {{ Form::label('category_id', trans('product-form.label.parent.category_ids'), ['class' => 'input-group-addon']) }}
        <select class="select2" multiple required="required"
                id="category_ids" name="category_ids[]">
            @foreach($categoryCodes as $prntCat)
                <optgroup label="{{ $prntCat['label'] }}">
                    @foreach($prntCat['group'] as $cid => $catOne)
                        @php
                            $isSel = '';
                            if(isset($product->category_ids)){
                                $category_ids = explode(',', $product->category_ids);
                                foreach ($category_ids as $id) {
                                    if($cid == $id) $isSel = 'selected="selected"';
                                }
                            }
                        @endphp
                        <option value="{{ $cid }}" {{ $isSel }}>{{ $catOne }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>
</div>
<div class="col-lg-12">
    <div class="input-group input-group-sm">
        {{ Form::label('slug', trans('product-form.label.parent.slug'), ['class' => 'input-group-addon']) }}
        {{ Form::text('slug', $product->slug, [
            'class' => 'form-control',
            'data-type' => 'replace-slug',
            'data-name' => 'slug',
            'maxlength' => '100',
            'required' => 'required'
        ]) }}
        <span class="input-group-addon" style="min-width: 32px;padding-top: 3px;padding-bottom: 3px;">
            <button class="btn btn-warning btn-xs" data-type="generate_slug" type="button">
                <i class="fa fa-dot-circle-o"></i> Generate
            </button>
        </span>
    </div>
</div>
@foreach($langsSuf as $lng)
    <div class="col-lg-4">
        <div class="input-group input-group-sm" data-type="input_for_slug">
            {{ Form::label('name'.$lng['s'], trans('product-form.label.parent.name'.$lng['s']), ['class' => 'input-group-addon']) }}
            {{ Form::text('name'.$lng['s'], $product->{'name'.$lng['s']}, [
                'class' => 'form-control',
                'data-type' => 'replace-input',
                'data-name' => 'name'.$lng['s'],
                'maxlength' => '100',
                //'required' => 'required'
            ]) }}
        </div>
    </div>
@endforeach
@foreach($langsSuf as $lng)
    <div class="col-lg-4">
        <div class="input-group input-group-sm">
            {{ Form::label('prev'.$lng['s'], trans('product-form.label.parent.prev'.$lng['s']), ['class' => 'input-group-addon']) }}
            {{ Form::textarea('prev'.$lng['s'], $product->{'prev'.$lng['s']}, [
                'class' => 'form-control',
                'data-type' => 'replace-input',
                'data-name' => 'prev'.$lng['s'],
                'maxlength' => '100',
                'rows' => '3',
                'required' => 'required'
            ]) }}
        </div>
    </div>
@endforeach
<div class="col-lg-12">
    <div class="input-group input-group-sm">
        <label for="comment" class="input-group-addon"><b>{{ trans('product-form.label.parent.comment') }}</b></label>
        {{ Form::textarea('comment', $product->comment, [
            'id' => 'comment',
            'class' => 'form-control',
            'maxlength' => '100',
            'rows' => '3',
            'required' => 'required'
        ]) }}
    </div>
</div>