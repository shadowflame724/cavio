<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">{{ trans('product-form.label.photo.title') }}</div>
        <div class="radio">
            <label for="photo[{{$photo->id}}][main]">
                {{ Form::radio('photo[main][]', $photo->main, $photo->main, [
                    'id' => 'photo['.$photo->id.'][main]'
                ]) }}
                {{ trans('product-form.label.photo.main') }}
            </label>
        </div>
        <div class="checkbox">
            <label for="photo[{{$photo->id}}][published]">
                {{ Form::checkbox('photo['.$photo->id.'][published]', $photo->published, $photo->published, [
                    'id' => 'photo['.$photo->id.'][published]'
                ]) }}
                {{ trans('product-form.label.photo.published') }}
            </label>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-xs btn-success"><i class="fa fa-save"></i></button>
            <button type="button"
                    class="btn btn-xs btn-link {{ ($photo->published)?'':'collapsed' }}"
                    data-toggle="collapse"
                    data-parent="#productOne"
                    href="#productPhoto{{ $photo->id }}">
                <i class="caret"></i>
            </button>
        </div>
    </div>
    <div class="panel-collapse collapse {{ ($photo->published)?'in':'' }}" id="productPhoto{{ $photo->id }}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$photo->id.'][photos]', trans('product-form.label.photo.photos'), ['class' => 'input-group-addon']) }}
                        <div class="form-control photos" id="photos">
                            @php($phArr = explode(',', $photo->photos))
                            @if(count($phArr))
                                @foreach($phArr as $key => $img)
                                    @if(!empty($img))
                                    <div class="photo-one" data-key="{{ $key }}" style="background-image:url(/upload/products/{{ $img }});">
                                        {{ Form::hidden('photo['.$photo->id.'][photos]['.$key.']', $img) }}
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
                            {{ Form::label('photo['.$photo->id.'][prev'.$lng['s'].']', trans('product-form.label.photo.prev'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::textarea('photo['.$photo->id.'][prev'.$lng['s'].']', $photo->{'prev'.$lng['s']}, [
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
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$photo->id.'][finish_ids]', trans('product-form.label.photo.finish_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($finishCodes))
                                {{ Form::select('photo['.$photo->id.'][finish_ids]', $finishCodes, $photo->finish_ids, [
                                    'class' => 'select2',
                                    'required' => 'required'
                                ]) }}
                            @else
                                {{ Form::text('photo['.$photo->id.'][finish_ids]', $photo->finish_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                            <button class="btn btn-xs btn-success">
                                <i class="fa fa-plus"></i> Add finish
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$photo->id.'][tissue_ids]', trans('product-form.label.photo.tissue_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($tissueCodes))
                                {{ Form::select('photo['.$photo->id.'][tissue_ids]', $tissueCodes, $photo->tissue_ids, [
                                    'class' => 'select2',
                                    'required' => 'required'
                                ]) }}
                            @else
                                {{ Form::text('photo['.$photo->id.'][tissue_ids]', $photo->tissue_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                            <button class="btn btn-xs btn-success">
                                <i class="fa fa-plus"></i> Add tissue
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$photo->id.'][collection_ids]', trans('product-form.label.photo.collection_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($collectionCodes))
                                {{ Form::select('photo['.$photo->id.'][collection_ids]', $collectionCodes, $photo->collection_ids, [
                                    'class' => 'select2',
                                    'required' => 'required'
                                ]) }}
                            @else
                                {{ Form::text('photo['.$photo->id.'][collection_ids]', $photo->collection_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                            <button class="btn btn-xs btn-success">
                                <i class="fa fa-plus"></i> Add collection
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group input-group-sm">
                        {{ Form::label('photo['.$photo->id.'][zone_ids]', trans('product-form.label.photo.zone_ids'), ['class' => 'input-group-addon']) }}
                        <div class="form-control nHeight">
                            @if(isset($zoneCodes))
                                {{ Form::select('photo['.$photo->id.'][zone_ids]', $zoneCodes, $photo->zone_ids, [
                                    'class' => 'select2',
                                    'required' => 'required'
                                ]) }}
                            @else
                                {{ Form::text('photo['.$photo->id.'][zone_ids]', $photo->zone_ids, [
                                    'class' => 'form-control inpMb',
                                    'readonly' => 'readonly',
                                    'maxlength' => '100',
                                    'required' => 'required'
                                ]) }}
                            @endif
                            <button class="btn btn-xs btn-success">
                                <i class="fa fa-plus"></i> Add zone
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        <label for="photo[{{$photo->id}}][comment]" class="input-group-addon"><b>{{ trans('product-form.label.photo.comment') }}</b></label>
                        {{ Form::textarea('photo['.$photo->id.'][comment]', $photo->comment, [
                            'id' => 'photo['.$photo->id.'][comment]',
                            'class' => 'form-control',
                            'maxlength' => '100',
                            'rows' => '3',
                            'required' => 'required'
                        ]) }}
                    </div>
                </div>
                <div class="col-lg-12">
                    {{ Form::text('photo['.$photo->id.'][prices_data]', $photo->prices_data, [
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                        'data-type' => 'replace-input',
                        'data-name' => 'prices',
                        'maxlength' => '100',
                        'required' => 'required'
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
                        'photo_id' => $photo->id,
                        'price' => $price
                    ])
                @empty
                    <div class="new-price hidden">
                        @include('backend.products.partials.price_one',[
                            'price' => $price
                        ])
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>