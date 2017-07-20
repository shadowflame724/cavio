@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
    <style>
        #original {
            max-width: 650px;
        }
        #horizontal {
            max-width: 650px;
        }
        #vertical {
            max-width: 100px;
        }
    </style>
@endsection
@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')
@endsection
@section('page-header')
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
        {!! Form::open(['route' => 'admin.collection.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="en">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('banner', trans('validation.attributes.backend.access.collection.banner'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::checkbox('banner', null) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

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

                    <div class="form-group">
                        {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::hidden('photo', null, ['id' => 'dz_hidden']) }}
                            <div class="dropzone" id="dz_collection"></div>
                            <div class="photo">
                                <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                            </div>
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="ru">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_ru', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="it">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_it', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
        </div><!--form control-->
    </div><!-- /.box-body -->

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
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    <script>
        var hidden = $('input#photo').val();
        var mimeType;
        var cropper;
        var modalTemplate = '' +
            '<div class="modal fade" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title">Crop Image</h4>' +
            '<div class="input-group input-group-sm">' +
            '<label class="input-group-addon" for="dataWidth">Width</label>' +
            '<input type="text" class="form-control" id="dataWidth" placeholder="Width">' +
            '<span class="input-group-addon">px</span>' +
            '</div>' +
            '<div class="input-group input-group-sm">' +
            '<label class="input-group-addon" for="dataHeight">Height</label>' +
            '<input type="text" class="form-control" id="dataHeight" placeholder="height">' +
            '<span class="input-group-addon">px</span>' +
            '</div>' +

            '<label class="btn btn-primary">' +
            '<input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">' +
            '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Main page banner">' +
            '16:9</span></label>' +

            '<label class="btn btn-primary">' +
            '<input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">' +
            '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Main collection photo">' +
            '3:4</span></label>' +

            '<label class="btn btn-primary">' +
            '<input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">' +
            '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Long Col-zone photo">' +
            '400:91</span></label>' +

            '</div>' +
            '<div class="modal-body">' +
            '<div class="image-container"></div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary crop-upload">Upload</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '';

        // transform cropper dataURI output to a Blob which Dropzone accepts
        function dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);

            // create a view into the buffer
            var ia = new Uint8Array(ab);

            // set the bytes of the buffer to the correct values
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            // write the ArrayBuffer to a blob, and you're done
            var blob = new Blob([ab], {type: mimeString});
            return blob;
        }

        function dataURLtoMimeType(dataURL) {
            var BASE64_MARKER = ';base64,';
            var data;

            if (dataURL.indexOf(BASE64_MARKER) == -1) {
                var parts = dataURL.split(',');
                var contentType = parts[0].split(':')[1];
                data = decodeURIComponent(parts[1]);
            } else {
                var parts = dataURL.split(BASE64_MARKER);
                var contentType = parts[0].split(':')[1];
                var raw = window.atob(parts[1]);
                var rawLength = raw.length;

                data = new Uint8Array(rawLength);

                for (var i = 0; i < rawLength; ++i) {
                    data[i] = raw.charCodeAt(i);
                }
            }

            var arr = data.subarray(0, 4);
            var header = "";
            for (var i = 0; i < arr.length; i++) {
                header += arr[i].toString(16);
            }
            switch (header) {
                case "89504e47":
                    mimeType = "image/png";
                    break;
                case "47494638":
                    mimeType = "image/gif";
                    break;
                case "ffd8ffe0":
                case "ffd8ffe1":
                case "ffd8ffe2":
                    mimeType = "image/jpeg";
                    break;
                default:
                    mimeType = ""; // Or you can use the blob.type as fallback
                    break;
            }

            return mimeType;
        }

        $("#dz_collection").dropzone({
            url: "{{route('admin.file.upload.collection')}}",
            maxFiles: 1,
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            success: function (file, res) {
                this.removeFile(file);

                if (res['error']) {
                    swal({
                        title: res['error']['title'],
                        text: res['error']['text'],
                        type: "warning",
                        confirmButtonColor: "#DD6B55 ",
                        confirmButtonText: 'Ok',
                        closeOnConfirm: true
                    });

                } else {
                    console.log('response', res);
                    if ($('.photo').hasClass('active')) {
                        $('#original').replaceWith('<img id="original" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '">');
                        $('#horizontal').replaceWith('<img id="horizontal" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">');
                        $('#vertical').replaceWith('<img id="vertical" src="/upload/tmp/collection/vertical/' + res['success']['imgName'] + '">');

                    } else {
                        $('.photo').append('<img id="original" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '">');
                        $('.photo').append('<img id="horizontal" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">');
                        $('.photo').append('<img id="vertical" src="/upload/tmp/collection/vertical/' + res['success']['imgName'] + '">');
                        $('.photo').addClass('active');
                    }
                    $('#dz_hidden').val(res['success']['imgName']);
                    console.log($('#dz_hidden'));

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
                console.log(errorMessage, xhr);
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
            }

        });
        $('.dlt_photo').on('click', function () {
            $('.photo>img').remove();
            $('.photo').removeClass('active');
            $('input#photo').val('');
        });

        Dropzone.autoDiscover = false;


        //        myDropzone.on('thumbnail', function (file) {
        //            if (file.cropped) {
        //                return;
        //            }
        //            var cachedFilename = file.name;
        //            myDropzone.removeFile(file);
        //
        //            var $cropperModal = $(modalTemplate);
        //            var $uploadCrop = $cropperModal.find('.crop-upload');
        //            var $img = $('<img />');
        //            var reader = new FileReader();
        //            reader.onloadend = function () {
        //                $cropperModal.find('.image-container').html($img);
        //                $img.attr('src', reader.result);
        //                mimeType = dataURLtoMimeType(reader.result);
        //                cropper = new Cropper($img[0], {
        //                    preview: '.image-preview',
        //                    autoCropArea: 1,
        //                    movable: false,
        //                    cropBoxResizable: true,
        //                    minContainerHeight: 320,
        //                    minContainerWidth: 568,
        //                    crop: function (e) {
        //                        $('input#dataWidth').val(e.detail.width);
        //                        $('input#dataHeight').val(e.detail.height);
        //                        $('#aspectRatio1').on('click', function () {
        //                            cropper.setAspectRatio(1.7777777777777777);
        //                        });
        //                        $('#aspectRatio2').on('click', function () {
        //                            cropper.setAspectRatio(0.75);
        //                        });
        //                        $('#aspectRatio3').on('click', function () {
        //                            cropper.setAspectRatio(4.3956044);
        //                        });
        //                    }
        //                });
        //
        //            };
        //
        //
        //            reader.readAsDataURL(file);
        //            $cropperModal.modal('show');
        //
        //            $uploadCrop.on('click', function () {
        //                var blob = cropper.getCroppedCanvas().toDataURL(mimeType);
        //                var newFile = dataURItoBlob(blob);
        //                newFile.cropped = true;
        //                newFile.name = cachedFilename;
        //                myDropzone.addFile(newFile);
        //                myDropzone.processQueue();
        //                $cropperModal.modal('hide');
        //            });
        //        });
    </script>

@endsection

