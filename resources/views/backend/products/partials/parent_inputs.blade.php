<div class="col-lg-12">
    <div class="input-group input-group-sm">
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
                'maxlength' => '100',
                'required' => 'required'
            ]) }}
        @endif
    </div>
</div>
<div class="col-lg-12">
    <div class="input-group input-group-sm">
        {{ Form::label('category_id', trans('product-form.label.parent.category_ids'), ['class' => 'input-group-addon']) }}
        @if(isset($parentCodes))
            <select class="select2" multiple required="required"
                    id="category_ids" name="category_ids">
                @foreach($categoryCodes as $prntCat)
                    <optgroup label="{{ $prntCat['label'] }}">
                        @foreach($prntCat['group'] as $cid => $catOne)
                            @php
                                $isSel = '';
                                if(isset($product->category_ids)){
                                    $category_ids = explode(',', $product->category_ids);
                                    foreach ($category_ids as $id) {
                                        if($zid == $id) $isSel = 'selected="selected"';
                                    }
                                }
                            @endphp
                            <option value="{{ $cid }}" {{ $isSel }}>{{ $catOne }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            {{-- Form::select('category_ids', $parentCodes, $product->category_ids, [
                'class' => 'select2 form-control',
                'required' => 'required',
                'autofocus' => 'autofocus'
            ]) --}}
        @else
            {{ Form::text('category_ids', $product->category_ids, [
                'class' => 'form-control',
                'readonly' => 'readonly',
                'maxlength' => '100',
                'required' => 'required'
            ]) }}
        @endif
    </div>
</div>
@foreach($langsSuf as $lng)
    <div class="col-lg-4">
        <div class="input-group input-group-sm">
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