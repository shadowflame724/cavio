@extends ('backend.layouts.app')

@section ('title', "Page management")

@section('page-header')
    {{ Html::style('js/backend/access/pages/redactor/redactor.css') }}
    {{ Html::style('css/backend/cropit/cropit.css') }}
    <h1>
        Create new page
        <small>Create new page</small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.access.page.store', 'class' => 'dropzone dz-clickable form-horizontal', 'id' => 'my-awesome-dropzone', 'role' => 'form', 'method' => 'post', 'id' => 'create-page', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.pages.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.page-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pageKey', 'pageKey', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('pageKey', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'about']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('title', 'title', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'About us']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', 'description', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'SEO info']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('prev', 'prev', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('prev', null, ['id' => 'prev', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Prev info']) }}

                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('body', 'body', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Body']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <div id="image-cropper" class="dropzone">
                        <div class="cropit-preview"></div>

                        <input type="range" class="cropit-image-zoom-input"/>

                        <!-- The actual file input will be hidden -->
                        <input name="file" type="file" class="cropit-image-input"/>
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
                {{ link_to_route('admin.access.page.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}


@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/pages/redactor/redactor.js') }}
    {{ Html::script('js/backend/access/pages/script.js') }}
    {{ Html::script('js/backend/access/ImgUtil/dropzone.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js') }}
    {{ Html::script('../dist/jquery.cropit.js') }}
    <script>
        $('#image-cropper').dropzone().cropit();

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
