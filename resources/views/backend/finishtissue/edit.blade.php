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
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('type', trans('validation.attributes.backend.access.finishtissue.type'), ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-lg-10">
                                <select name="type" class="form-control">
                                    @if($finishTissue->type == "finish")
                                        <option selected
                                                value="finish">{{ trans("validation.attributes.backend.access.finishtissue.type_finish") }}</option>
                                        <option
                                                value="tissue">{{ trans("validation.attributes.backend.access.finishtissue.type_tissue") }}</option>
                                    @else
                                        <option
                                                value="finish">{{ trans("validation.attributes.backend.access.finishtissue.type_finish") }}</option>
                                        <option selected
                                                value="tissue">{{ trans("validation.attributes.backend.access.finishtissue.type_tissue") }}</option>
                                    @endif
                                </select>
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('parent', trans('validation.attributes.backend.access.finishtissue.parent'), ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-lg-10">
                                <select class="form-control"
                                        name="parent">
                                    @if($finishTissue->parent_id == null)
                                        <option value="null" selected>Root</option>
                                    @endif
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}"
                                                @if($finishTissue->parent_id == $parent->id) selected="selected"@endif>{{ $parent->title }}</option>
                                    @endforeach
                                </select>

                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('title', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

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

                        <div class="form-group">
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
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('title_ru', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_ru', null, [ 'class' => 'form-control', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('title_it', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_it', null, [ 'class' => 'form-control', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
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

        function dataURItoBlob(dataURI) {
            var byteString = atob(dataURI.split(',')[1]);
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], {type: 'image/jpeg'});
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
                    var blob = cropper.getCroppedCanvas().toDataURL();
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