@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    <style>
        #spinner{
            position: absolute;
            height: 100px;
            width: 100px;
            top: 50%;
            left: 50%;
            margin-left: -50px;
            margin-top: -50px;
            background: url(/link/to/your/image);
            background-size: 100%;
        }

        .sweet-alert {
            z-index: 999;
        }

        #dz_photo {
            max-width: 650px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .photo {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .dz-photo {
            margin: 30px 0 50px;
        }

        .photo.active {
            visibility: visible;
        }

        .dlt_photo {
            position: absolute;
            display: block;
            top: 0;
            right: 0;
            color: red;
            font-size: 20px;
        }

        .colZon_photo {
            width: 215px;
        }

        .photo-one-bl {
            position: relative;
            display: inline-block;
            vertical-align: top;
        }
    </style>
@endsection
@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')
@endsection


@section('page-header')

    <h1>
        {{ trans('labels.backend.access.collection.management') }}
        <small>{{ trans('labels.backend.access.collection.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($collection, ['route' => ['admin.collection.update', $collection], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-collection', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.collection.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('banner', trans('validation.attributes.backend.access.collection.banner'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::checkbox('banner', null) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['id'=> 'title', 'class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['id'=> 'description', 'class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.collection.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.collection.description_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_ru', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.collection.title_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.collection.description_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_it', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    <div class="dropzone" id="dz_collection"></div>
                    @if($collection->image)
                        <div class="photo active">
                            {{ Form::hidden('photo', $collection->image, ['id' => 'collection-hidden']) }}
                            <div class="photo-one-bl">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#originalTab"
                                                                              aria-controls="originalTab"
                                                                              role="tab" data-toggle="tab">Original</a>
                                    </li>
                                    <li role="presentation"><a href="#horizontalTab"
                                                               aria-controls="horizontalTab" role="tab"
                                                               data-toggle="tab">Horizontal</a></li>
                                    <li role="presentation"><a href="#thumbTab" aria-controls="thumbTab"
                                                               role="tab" data-toggle="tab">Thumb</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="originalTab">
                                        <img id="original" class="add_photo"
                                             src="/upload/images/collection/original/{{ $collection->image }}"
                                             alt="" data-content="{{ $collection->image }}">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="horizontalTab">
                                        <img id="horizontal" class="add_photo"
                                             src="/upload/images/collection/horizontal/{{ $collection->image }}"
                                             alt="" data-content="{{ $collection->image }}">
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="thumbTab">
                                        <img id="thumb" class="add_photo"
                                             src="/upload/images/collection/thumb/{{ $collection->image }}"
                                             alt="" data-content="{{ $collection->image }}">
                                    </div>
                                </div>
                                <div class="cropperButtons">
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" name="collectionHorizontal"
                                               value="/upload/images/collection/horizontal/{{ $collection->image }}">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="">
                        Horizontal</span></label>
                                    <label class="btn btn-primary">
                                        <input type="radio" class="sr-only" name="collectionThumb"
                                               value="/upload/images/collection/thumb/{{ $collection->image }}">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="">
                        Thumb</span></label>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="photo">
                            {{ Form::hidden('photo', null, ['id' => 'collection-hidden']) }}

                        </div>
                    @endif
                </div><!--col-lg-10-->
            </div><!--form control-->


            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.collection.zones.management') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @foreach($collection->collectionZones as $key => $zone)
                    @php ($i = $key+1)

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{$i}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{$i}}"
                                       aria-expanded="true" aria-controls="collapse{{$i}}">
                                        {{$i}}. {{$zone->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{$i}}">
                                <div class="panel-body">


                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#en{{$i}}"
                                                                                  aria-controls="en"
                                                                                  role="tab"
                                                                                  data-toggle="tab">EN</a>
                                        </li>
                                        <li role="presentation"><a href="#ru{{$i}}" aria-controls="ru" role="tab"
                                                                   data-toggle="tab">RU</a></li>
                                        <li role="presentation"><a href="#it{{$i}}" aria-controls="it" role="tab"
                                                                   data-toggle="tab">IT</a></li>
                                    </ul>
                                    <div class="box-body">


                                        {{ Form::hidden('zones['.$i.'][id]', $zone->id) }}

                                        <div class="form-group">
                                            {{ Form::label('zones['.$i.'][zone_id]', trans('validation.attributes.backend.access.collection.zones.mainZones'), ['class' => 'col-lg-2 control-label']) }}

                                            <div class="col-lg-10">
                                                <select class="form-control"
                                                        name="zones[{{ $i }}][zone_id]">
                                                    @foreach($mainZones as $mainZone)
                                                        <option value="{{ $mainZone->id }}"
                                                                @if($zone->zone_id == $mainZone->id) selected="selected"@endif>{{ $mainZone->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!--form control-->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="en{{$i}}">

                                                <div class="form-group">
                                                    {{ Form::label('title', trans('validation.attributes.backend.access.collection.zones.title'), ['class' => 'col-lg-2 control-label']) }}

                                                    <div class="col-lg-10">
                                                        {{ Form::text('zones['.$i.'][title]', $zone->title, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="ru{{$i}}">
                                                <div class="form-group">
                                                    {{ Form::label('title_ru', trans('validation.attributes.backend.access.block.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                                                    <div class="col-lg-10">
                                                        {{ Form::text('zones['.$i.'][title_ru]', $zone->title_ru, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="it{{$i}}">
                                                <div class="form-group">
                                                    {{ Form::label('title_it', trans('validation.attributes.backend.access.block.title_it'), ['class' => 'col-lg-2 control-label']) }}

                                                    <div class="col-lg-10">
                                                        {{ Form::text('zones['.$i.'][title_it]', $zone->title_it, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('zones['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                            <div class="col-lg-10">
                                                <div class="dropzone" id="add_photo"></div>
                                                @if($zone->image)
                                                    <div class="photo active" id="photo_list">
                                                        {{ Form::hidden('zones['.$i.'][photo]', $zone->image, ['id' => 'zones['.$i.'][photo]']) }}
                                                        @foreach($zone->getImageArray($zone->image) as $key => $image)
                                                            @if(strlen($image) > 0)
                                                                <div class="photo-one-bl">
                                                                    <div id="dlt_photo[{{$i}}][{{$key}}]"
                                                                         class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                                    <img class="colZon_photo"
                                                                         src="/upload/images/zone/original/{{ ltrim($image) }}"
                                                                         alt=""
                                                                         data-content="{{ ltrim($image) }},">
                                                                    <div class="cropperButtons">
                                                                        <label class="btn btn-primary">
                                                                            <input type="radio"
                                                                                   class="sr-only"
                                                                                   name="zoneHorizontal"
                                                                                   value="/upload/images/zone/horizontal/{{ ltrim($image) }}">
                                                                            <span class="docs-tooltip"
                                                                                  data-toggle="tooltip"
                                                                                  title="">
                                                                                Horizontal</span></label>
                                                                        <label class="btn btn-primary">
                                                                            <input type="radio"
                                                                                   class="sr-only"
                                                                                   name="zoneThumb"
                                                                                   value="/upload/images/zone/thumb/{{ ltrim($image) }}">
                                                                            <span class="docs-tooltip"
                                                                                  data-toggle="tooltip"
                                                                                  title="">
                                                                                Thumb</span></label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div id="photo{{$i}}" class="photo">
                                                        {{ Form::hidden('zones['.$i.'][photo]', null, ['id' => 'zones['.$i.'][photo]']) }}
                                                    </div>
                                                @endif
                                            </div><!--col-lg-10-->
                                        </div><!--form control-->

                                        <a href="{{route('admin.collection.zones.destroy', $zone)}}"
                                           class='btn btn-danger btn-xs'>{{trans('buttons.general.crud.delete')}}</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @endforeach
                        <a href="{{route('admin.collection.zones.store', $collection)}}"
                           class='btn btn-success btn-xs'>{{trans('buttons.general.crud.create_new')}}</a>
            </div>

        </div>

    </div><!-- /.box-body -->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/Sortable/1.6.0/Sortable.min.js') }}
    @include('backend.collection.edit_js');
@endsection