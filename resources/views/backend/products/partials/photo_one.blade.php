@php
    $phtKey = ($photo->id) ? $photo->id : 'KEY';
@endphp
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">{{ trans('product-form.label.photo.title') }}</div>
        <div class="radio" data-type="photo_radio">
            <label for="photo[{{$phtKey}}][main][{{$ky}}]">
                {{ Form::radio('photo['.$phtKey.'][main]', $photo->main, $photo->main, [
                    'id' => 'photo['.$phtKey.'][main]['.$ky.']'
                ]) }}
                {{ trans('product-form.label.photo.main') }}
            </label>
        </div>
        <div class="checkbox">
            <label for="photo[{{$phtKey}}][published]">
                {{ Form::checkbox('photo['.$phtKey.'][published]', $photo->published, $photo->published, [
                    'id' => 'photo['.$phtKey.'][published]'
                ]) }}
                {{ trans('product-form.label.photo.published') }}
            </label>
        </div>
        <div class="pull-right">
            {{--<button type="button" class="btn btn-xs btn-success"><i class="fa fa-save"></i></button>--}}
            <button type="button"
                    class="btn btn-xs btn-link {{ ($photo->published)?'':'collapsed' }}"
                    data-toggle="collapse"
                    data-parent="#productOne"
                    href="#productPhoto{{ $phtKey }}">
                <i class="caret"></i>
            </button>
        </div>
    </div>
    <div class="panel-collapse collapse {{ ($photo->published)?'in':'' }}" id="productPhoto{{ $photo->id }}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$phtKey.'][photos]', trans('product-form.label.photo.photos'), ['class' => 'input-group-addon']) }}
                        <div class="form-control photos" id="photos">
                            @php($phArr = explode(',', $photo->photos))
                            @if(count($phArr))
                                @foreach($phArr as $key => $img)
                                    @if(!empty($img))
                                    <div class="photo-one" data-key="{{ $key }}" style="background-image:url(/upload/products/{{ $img }});">
                                        {{ Form::hidden('photo['.$phtKey.'][photos]['.$key.']', $img) }}
                                        <button class="btn btn-xs btn-danger dlt_photo">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="input-group-addon">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-image"></i> {{ trans('product-form.label.photo.image') }}
                            </button>
                            {{--<div class="dropzone" id="dz_photo"></div>--}}
                        </div>
                    </div>
                </div>
                @foreach($langsSuf as $lng)
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm">
                            {{ Form::label('photo['.$phtKey.'][prev'.$lng['s'].']', trans('product-form.label.photo.prev'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::textarea('photo['.$phtKey.'][prev'.$lng['s'].']', $photo->{'prev'.$lng['s']}, [
                                'class' => 'form-control',
                                'data-type' => 'replace-input',
                                'data-name' => 'prev'.$lng['s'],
                                'maxlength' => '100',
                                'rows' => '3',
                                //'required' => 'required'
                            ]) }}
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$phtKey.'][finish_ids]', trans('product-form.label.photo.finish_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($finishCodes))
                                <select class="select2"
                                        data-name="finish_ids"
                                        required="required"
                                        multiple
                                        id="photo[{{ $phtKey }}][finish_ids]"
                                        name="photo[{{ $phtKey }}][finish_ids][]">
                                    @foreach($finishCodes as $key => $one)
                                        @php
                                            $isSel = '';
                                            if(isset($photo->finish_ids)){
                                                $finish_ids = explode(',', $photo->finish_ids);
                                                foreach ($finish_ids as $fid) {
                                                    if($key == $fid) $isSel = 'selected="selected"';
                                                }
                                            }
                                        @endphp
                                        <option value="{{ $key }}" {{ $isSel }}>{{ $one['name'] }}</option>
                                    @endforeach
                                </select>
                            @else
                                {{ Form::text('photo['.$phtKey.'][finish_ids]', $photo->finish_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$phtKey.'][tissue_ids]', trans('product-form.label.photo.tissue_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($tissueCodes))
                                <select class="select2"
                                        data-name="tissue_ids"
                                        required="required"
                                        multiple
                                        id="photo[{{ $phtKey }}][tissue_ids]"
                                        name="photo[{{ $phtKey }}][tissue_ids][]">
                                    @foreach($tissueCodes as $key => $one)
                                    @php
                                    $isSel = '';
                                    if(isset($photo->tissue_ids)){
                                        $tissue_ids = explode(',', $photo->tissue_ids);
                                        foreach ($tissue_ids as $tid) {
                                            if($key == $tid) $isSel = 'selected="selected"';
                                        }
                                    }
                                    @endphp
                                    <option value="{{ $key }}" {{ $isSel }}>{{ $one['name'] }}</option>
                                    @endforeach
                                </select>
                            @else
                                {{ Form::text('photo['.$phtKey.'][tissue_ids]', $photo->tissue_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$phtKey.'][collection_ids]', trans('product-form.label.photo.collection_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($collectionCodes))
                                <select class="select2" multiple required="required"
                                        id="photo[{{ $phtKey }}][collection_ids]"
                                        name="photo[{{ $phtKey }}][collection_ids][]">
                                    @foreach($collectionCodes as $colls)
                                        <optgroup label="{{ $colls['label'] }}">
                                        @foreach($colls['group'] as $zid => $zone)
                                            @php
                                                $isSel = '';
                                                if(isset($photo->collection_ids)){
                                                    $collection_ids = explode(',', $photo->collection_ids);
                                                    foreach ($collection_ids as $cid) {
                                                        if($zid == $cid) $isSel = 'selected="selected"';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $zid }}" {{ $isSel }}>{{ $zone }}</option>
                                        @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            @else
                                {{ Form::text('photo['.$phtKey.'][collection_ids]', $photo->collection_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        <label for="photo[{{$phtKey}}][comment]" class="input-group-addon"><b>{{ trans('product-form.label.photo.comment') }}</b></label>
                        {{ Form::textarea('photo['.$phtKey.'][comment]', $photo->comment, [
                            'id' => 'photo['.$phtKey.'][comment]',
                            'data-replace' => 'comment',
                            'class' => 'form-control',
                            'maxlength' => '100',
                            'rows' => '3',
                            //'required' => 'required'
                        ]) }}
                    </div>
                </div>
                <div class="col-lg-12 ">
                    {{ Form::text('photo['.$phtKey.'][prices_data]', $photo->prices_data, [
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'data-type' => 'replace-input',
                        'data-name' => 'prices',
                        'maxlength' => '100',
                        //'required' => 'required'
                    ]) }}
                </div>
            </div>

            <hr class="hr" />
            <button class="btn btn-info btn-xs" data-type="reload-price" type="button">
                <i class="fa fa-refresh"></i> Reload prices
            </button>

            <div class="row" data-type="prices-row">
                @forelse($photo->prices as $price)
                    @include('backend.products.partials.price_one',[
                        'photo_id' => $phtKey,
                        'price' => $price
                    ])
                @empty
                    <div class="new-price hidden">
                        @include('backend.products.partials.price_one',[
                            'photo_id' => $phtKey,
                            'price' => $price
                        ])
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>