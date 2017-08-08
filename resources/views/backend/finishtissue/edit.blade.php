@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.finishtissue.management') . ' | ' . trans('labels.backend.access.finishtissue.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
@endsection
@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')
@endsection
@section('page-header')

    <h1>
        {{ trans('labels.backend.access.finishtissue.management') }}
        <small>{{ trans('labels.backend.access.finishtissue.edit') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::model($finishTissue, ['route' => ['admin.finish-tissue.update', $finishTissue], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}
    <div class="box">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.finishtissue.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.finishtissue.finishtissue-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab"
                                                          data-toggle="tab">EN</a>
                </li>
                <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
                <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
            </ul>
            <div class="box-body">


                <div class="form-group">
                    {{ Form::label('parent', trans('validation.attributes.backend.access.finishtissue.parent'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <select name="parent" class="form-control" id="parentSelector">
                            <option value="rootFinish"
                                    @if($finishTissue->parent_id == null AND $finishTissue->type == 'finish')
                                    selected @endif>Root Finish
                            </option>
                            <option value="rootTissue"
                                    @if($finishTissue->parent_id == null AND $finishTissue->type == 'tissue')
                                    selected @endif>Root Tissue
                            </option>
                            <optgroup label="Finish">
                                @foreach($parents as $parent)
                                    @if($parent->type == 'finish')
                                        <option @if($finishTissue->parent_id == $parent->id)
                                                selected @endif
                                                value="{{ $parent->id }}">{{ $parent->title }}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                            <optgroup label="Tissue">
                                @foreach($parents as $parent)
                                    @if($parent->type == 'tissue')
                                        <option @if($finishTissue->parent_id == $parent->id)
                                                selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    </div><!--col-lg-10-->
                </div><!--form control-->


                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="en">

                        <div class="form-group">
                            {{ Form::label('title', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                    <div role="tabpanel" class="tab-pane fade" id="ru">
                        <div class="form-group">
                            {{ Form::label('title_ru', trans('validation.attributes.backend.access.finishtissue.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_ru', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="it">
                        <div class="form-group">
                            {{ Form::label('title_it', trans('validation.attributes.backend.access.finishtissue.title_it'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_it', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
                <div class="form-group">
                    {{ Form::label('short', trans('validation.attributes.backend.access.finishtissue.short'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('short', null, [ 'class' => 'form-control', 'maxlength' => '10', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('comment', trans('validation.attributes.backend.access.finishtissue.comment'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('comment', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '200', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                <div class="form-group" id="forChild" @if($finishTissue->parent_id == null) hidden @endif>

                    {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <div class="dropzone" id="dz_photo"></div>
                        @if($finishTissue->image)
                            <div class="photo active">
                                {{ Form::hidden('photo', $finishTissue->image, ['id' => 'photo']) }}
                                <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                <img id="add_photo" src="/upload/images/{{ $finishTissue->image  }}" alt="">
                            </div>
                        @else
                            <div class="photo">
                                {{ Form::hidden('photo', null, ['id' => 'photo']) }}
                                <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                            </div>
                        @endif
                    </div>
                </div><!--form control-->

            </div>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.finish-tissue.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    <script>
        $(parentSelector).on('change', function () {
            var x = this.value;
            if (x != "rootFinish" && x != "rootTissue") {
                $(forChild).fadeIn('slow');
            } else {
                $(forChild).fadeOut('slow');
                photo = document.getElementsByClassName('photo');
                $(document.getElementById('hiddenPhoto')).val('');
                $(photo).removeClass('active');
                $(photo).find('img').remove();
            }
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

        var myDropzone = [];
        var inp;

        $('.dropzone').each(function (key, el) {
            inp = $('input#zones\\[' + key + '\\]\\[photo\\]');
            myDropzone[key] = new Dropzone($(".dropzone")[key], {
                    autoProcessQueue: false,
                    dictDefaultMessage: "Drop files here",
                    url: "{{route('admin.file.upload.finish-tissue')}}",
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
                            if ($('.photo').eq(key).hasClass('active')) {
                                $('.photo >img').eq(key).replaceWith('<img src="/' + res['success']['path'] + '">');
                            } else {
                                $('.photo').eq(key).append('<img src="/' + res['success']['path'] + '">');
                                $('.photo').eq(key).addClass('active');
                            }
                            inp = $('.photo').eq(key).find(":hidden");
                            console.log(inp.val(), res['success']['imgName']);

                            inp.val(res['success']['imgName']);

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

            myDropzone[key].on('thumbnail', function (file) {
                var selfAccId = key;
                if (file.cropped) {
                    return;
                }
                var cachedFilename = file.name;
                myDropzone[selfAccId].removeFile(file);


                var $cropperModal = $(modalTemplate);
                var $uploadCrop = $cropperModal.find('.crop-upload');
                var $img = $('<img />');
                var reader = new FileReader();
                reader.onloadend = function () {
                    $cropperModal.find('.image-container').html($img);
                    $img.attr('src', reader.result);
                    cropper = new Cropper($img[0], {
                        preview: '.image-preview',
                        autoCropArea: 1,
                        aspectRatio: 1,
                        movable: false,
                        zoomOnWheel: false,
                        viewMode: 3,
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
                    myDropzone[selfAccId].addFile(newFile);
                    myDropzone[selfAccId].processQueue();
                    $cropperModal.modal('hide');
                });
            });
            $('.dlt_photo').each(function (index) {
                $(this).on('click', function () {
                    $(this).parent().children('img').remove();
                    $(this).parent().removeClass('active');
                    $(this).parent().find(":hidden").val('');
                });
            });
        });
        Dropzone.autoDiscover = false;
    </script>
@endsection