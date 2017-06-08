@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))

@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}
    {{ Html::style('css/backend/cropit/cropit.css') }}
    {{ Html::style('css/backend/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/dropzone/basic.css') }}
    <h1>
        {{ trans('labels.backend.access.collection.management') }}
        <small>{{ trans('labels.backend.access.collection.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($collection, ['route' => ['admin.access.collection.update', $collection], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-collection', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus') }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'SEO info']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('preview', trans('validation.attributes.backend.access.collection.preview'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('preview', null, ['class' => 'form-control', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus') }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('body', trans('validation.attributes.backend.access.collection.body'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus', 'placeholder' => 'Body']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->


            <div class="form-group">
                {{ Form::label('image', trans('validation.attributes.backend.access.collection.image'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    @if($collection->image != null)
                        <img class="cropit-preview" src="/img/backend/collection/{{$collection->image}}" width="300" height="300">
                    @endif
                    <div id="image-cropper">
                        <div class="cropit-preview"></div>

                        <input type="range" class="cropit-image-zoom-input"/>

                        <!-- The actual file input will be hidden -->
                        <div class="dropzone" id="my-awesome-dropzone">
                            <input name="file" type="file" class="cropit-image-input" hidden/>
                            <div class="dz-default dz-message"><span>Drop file here</span></div>

                        </div>
                        <!-- And clicking on this button will open up select file dialog -->
                        <div class="select-image-btn">Select new image</div>
                    </div>
                </div><!--col-lg-10-->

            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.access.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/redactor/redactor.js') }}
    {{ Html::script('js/backend/access/collection/script.js') }}
    {{ Html::script('js/backend/access/ImgUtil/dropzone.js') }}
    {{ Html::script('../dist/jquery.cropit.js') }}
    <script>

        var myDropzone = new Dropzone("#my-awesome-dropzone", {url: '{{route("admin.access.collection.store")}}',});
        $('#image-cropper').cropit(myDropzone);

        // When user clicks select image button,
        // open select file dialog programmatically
        $('.select-image-btn').click(function () {
            $('.cropit-image-input').click();
        });

        // Handle rotation
        $('.rotate-cw-btn').click(function () {
            $('#image-cropper').cropit('rotateCW');
        });
        $('.rotate-ccw-btn').click(function () {
            $('#image-cropper').cropit('rotateCCW');
        });


    </script>
@endsection