@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))

@section('page-header')
    {{ Html::style('/css/backend/redactor/redactor.css') }}
    {{ Html::style('css/backend/cropit/cropit.css') }}
    {{ HTML::style('/css/backend/dropzone/dropzone.css') }}
    <style>
        .sweet-alert {
            z-index: 999;
        }

        #add_logo {
            display: inline-block;
            width: 320px;
            height: 290px;
            float: left;
            margin-right: 10px;
        }

        #add_image {
            max-width: 650px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .logo, .image {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .image {
            margin: 30px 0 50px;
        }

        .logo {
            width: 320px;
            height: 290px;
        }

        .logo.active, .image.active {
            visibility: visible;
        }

        .dlt_logo, .dlt_image {
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 25px;
        }

    </style>
    <h1>
        {{ trans('labels.backend.access.collection.management') }}
        <small>{{ trans('labels.backend.access.collection.create') }}
        </small>
    </h1>

@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.collection.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <div class="box-body">

        {!! Form::open(['route' => 'admin.collection.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}

            <div class="form-group">
                {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['id'=> 'title', 'class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['id'=> 'description', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

        <div class="form-group">
            {{ Form::label('image', trans('validation.attributes.backend.access.news.image'), ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::hidden('image', null) }}
                <div class="dropzone" id="add_image"></div>
                <div class="image">
                    <div class="btn glyphicon glyphicon-remove dlt_image"></div>
                </div>
            </div><!--col-lg-10-->
        </div><!--form control-->

        </div><!--form control-->
    </div><!-- /.box-body -->
    </div><!--box-->


    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['id' => 'submit-all', 'class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->


    {!! Form::close() !!}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/ImgUtil/cropper.min.js') }}
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/ImgUtil/dropzone.js') }}
    {{ Html::script('js/backend/news/script.js') }}
    <script>
        function imageDropzone(id, url) {
            $('#add_' + id).dropzone({
                url: url,
                paramName: "file",
                acceptedFiles: "image/jpeg,image/png,image/jpg",
                clickable: true,
                uploadMultiple: false,
                dictFileTooBig: "{{trans('validation.attributes.backend.access.image.error.dictFileTooBig')}}",
                dictFallbackMessage: "{{trans('validation.attributes.backend.access.image.error.dictFallbackMessage')}}",
                dictInvalidFileType: "{{trans('validation.attributes.backend.access.image.error.dictInvalidFileType')}}",
                dictMaxFilesExceeded: "{{trans('validation.attributes.backend.access.image.error.dictMaxFilesExceeded')}}",
                addRemoveLinks: false,
                maxFiles: 1,
                parallelUploads: 1,
                sending: function (file, xhr, form) {
                    form.append('_token', $('meta[name=csrf-token]').attr('content'));
                },
                success: function (file, res) {
                    this.removeFile(file);

                    if (res['error']) {
                        console.log(res['error']);
                        swal({
                            title: res['error']['title'],
                            text: res['error']['text'],
                            type: "warning",
                            confirmButtonColor: "#DD6B55 ",
                            confirmButtonText: 'Ok',
                            closeOnConfirm: true
                        });

                    } else {
                        console.log(res['success']['path']);
                        console.log(res['success']['imgName']);
                        if ($('.' + id).hasClass('active')) {
                            $('.' + id + '>img').replaceWith('<img src="/' + res['success']['path'] + '">');
                        } else {
                            $('.' + id).append('<img src="/' + res['success']['path'] + '">');
                            $('.' + id).addClass('active');
                        }
                        $('input#' + id).val(res['success']['imgName']);
                        swal({
                            title: res['success']['title'],
                            text: res['success']['text'],
                            type: "success",
                            confirmButtonColor: "#DD6B55 ",
                            confirmButtonText: 'Ок',
                            closeOnConfirm: true
                        });
                    }

                },
                error: function (file, errorMessage, xhr) {
                    var self = this,
                        default_error = '{{trans('validation.attributes.backend.access.image.error.default_error')}}';
                    swal({
                        title: '{{trans('validation.attributes.backend.access.image.error.title')}}',
                        text: '{{trans('validation.attributes.backend.access.image.error.text')}} ' + '\n' + (xhr ? default_error : errorMessage),
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: 'ОК',
                        closeOnConfirm: true
                    });
                    self.removeFile(file);
                },
                maxFilesize: 2
            });
            $('.dlt_' + id).on('click', function () {
                $('.' + id + '>img').remove();
                $('.' + id).removeClass('active');
                $('input#' + id).val('');
            });
        }
        imageDropzone('image', "{!! route('admin.file.upload') !!}");
        Dropzone.autoDiscover = false;
    </script>
@endsection


