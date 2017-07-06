@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.good.management') . ' | ' . trans('labels.backend.access.good.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection
@section('after-styles')
    {{--@include('backend.includes.dropzone_cropper_css')--}}
    <style>
        .sweet-alert {
            z-index: 999;
        }

        #add_photo {
            max-width: 650px;
        }

        .add_photo {
            max-width: 650px;
        }

        .dz_photo {
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
            max-width: 650px;
        }

        .dlt_photo {
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 25px;
        }

    </style>
@endsection
@section('page-header')
    <h1>
        {{ trans('labels.backend.access.good.management') }}
        <small>        {{ trans('labels.backend.access.good.create') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.good.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.good.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.goods.good-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab"
                                                      data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="en">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('category_id', trans('validation.attributes.backend.access.good.category_id'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('collectionZone_id', trans('validation.attributes.backend.access.good.collection_id'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {!! Form::select('collectionZone_id[]', $collectionZones, null, ['class' => 'form-control', 'multiple' => true]) !!}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('finishTissues', trans('validation.attributes.backend.access.good.tissue'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('finishTissues_id[]', $finishTissues, null, ['class' => 'form-control', 'required' => 'required', 'multiple' => true]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('code', trans('validation.attributes.backend.access.good.code'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('code', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('name', trans('validation.attributes.backend.access.good.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('price', trans('validation.attributes.backend.access.good.price'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('price', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.good.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10" id="photos">
                            <div class="dropzone" id="add_photo"></div>

                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade" id="ru">
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('name_ru', trans('validation.attributes.backend.access.good.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_ru', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.good.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_ru', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="it">
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('name_it', trans('validation.attributes.backend.access.good.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_it', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.good.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_it', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
        </div>
        <button class="btn btn-default btn-block addPanel" type="button">Add dimensions</button>
        <div class="panel-group panels" id="accordion" role="tablist" aria-multiselectable="false"></div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.good.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    <script>
        $('.addPanel').click(function () {
            var x = $('.panels .panel').length + 1;
            var template = '<div class="panel panel-primary">';
            template += '<div class="panel-heading" role="tab">';
            template += '<h4 class="panel-title">';
            template += '<a data-toggle="collapse" href="#' + x + '" aria-expanded="false" aria-controls="collapseOne">Dimensions ' + x + '</a>';
            template += '<a id="removeSlide' + x + '" style="cursor: pointer" class="pull-right" data-toggle="tooltip" data-placement="top" title="Delete this"><i class="fa fa-lg fa-trash"></i></a>';
            template += '</h4></div>';
            template += '<div id="' + x + '" class="panel-collapse collapse" role="tabpanel"><div class="panel-body">';

            // length
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="length">length</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][length]" class="form-control">';
            template += '</div></div>';

            // width
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="width">width</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][width]" class="form-control">';
            template += '</div></div>';

            // height
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="height">height</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][height]" class="form-control">';
            template += '</div></div>';

            // mattress
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="mattress">mattress</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][mattress]" class="form-control">';
            template += '</div></div>';

            // weight
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="height">weight</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][weight]" class="form-control">';
            template += '</div></div>';

            // Close open tags
            template += '</div></div></div>';

            $('.panels').append(template);
            $('.fa-trash').each(function (index) {
                $(this).on("click", function () {
                    console.log(index);
                    $(this).parent().parent().parent().parent().remove();
                });
            });
        });

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

        var count = 0;

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
                autoProcessQueue: false,
                url: "{{route('admin.file.upload.finish-tissue')}}",
                maxFiles: 1,
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                },
                success: function (file, res) {
                    var _ref = file.previewElement, error;
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
                        $('#photos').append('<div class="photo">' +
                            '<div class="btn glyphicon glyphicon-remove dlt_photo">' +
                            '</div><img id="images" class="dz_photo" src="/' + res['success']['path'] + '"></div>');
                        $('.photo').addClass('active');

                        $('form').append('<input id="images'+ count +'" name=\"images[]\" value=\"' + res['success']['imgName'] + '\" type=\"hidden\"/>');
                        count++;
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
                }
            }
        );



        myDropzone.on('thumbnail', function (file) {
            if (file.cropped) {
                return;
            }
            var cachedFilename = file.name;
            myDropzone.removeFile(file);

            var $cropperModal = $(modalTemplate);
            var $uploadCrop = $cropperModal.find('.crop-upload');
            var $img = $('<img />');
            var reader = new FileReader();
            reader.onloadend = function () {
                $cropperModal.find('.image-container').html($img);
                $img.attr('src', reader.result);
                mimeType = dataURLtoMimeType(reader.result);
                cropper = new Cropper($img[0], {
                    preview: '.image-preview',
                    autoCropArea: 1,
                    movable: false,
                    cropBoxResizable: true,
                    minContainerHeight: 320,
                    minContainerWidth: 568,
                    crop: function (e) {
                        $('input#dataWidth').val(e.detail.width);
                        $('input#dataHeight').val(e.detail.height);
                    }
                });
            };

            reader.readAsDataURL(file);
            $cropperModal.modal('show');
            $uploadCrop.on('click', function () {
                var blob = cropper.getCroppedCanvas().toDataURL(mimeType);
                var newFile = dataURItoBlob(blob);
                newFile.cropped = true;
                newFile.name = cachedFilename;
                myDropzone.addFile(newFile);
                myDropzone.processQueue();
                $cropperModal.modal('hide');
            });

            $('.dlt_photo').each(function (index) {
                $(this).on("click", function () {
                    console.log(index);

                    $(this).parent().remove();
                    document.getElementById('images' + index).remove();
                    count--;
                });
            });
        });

    </script>
@endsection

