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