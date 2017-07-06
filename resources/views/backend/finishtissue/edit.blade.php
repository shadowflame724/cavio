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
                                {{ Form::select('type', [
                                "finish" =>
                                trans("validation.attributes.backend.access.finishtissue.type_finish"),
                                "tissue" =>
                                trans("validation.attributes.backend.access.finishtissue.type_tissue")
                                ],
                                ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('title', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title', null, [ 'class' => 'form-control', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
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

            <div class="box-body">

                @foreach($finishTissue->children as $key => $child)
                    @php ($i = $key+1)

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{$i}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{$i}}"
                                       aria-expanded="true" aria-controls="collapse{{$i}}">
                                        {{$i}}. {{$child->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{$i}}">
                                <div class="panel-body">
                                    {{ Form::hidden('children['.$i.'][id]', $child->id) }}


                                    <div class="form-group">
                                        {{ Form::label('title', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                        <div class="col-lg-10">
                                            {{ Form::text('children['.$i.'][title]', $child->title, ['class' => 'form-control', 'maxlength' => '191' ]) }}
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {{ Form::label('children['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-10">
                                            {{ Form::hidden('children['.$i.'][photo]', null) }}
                                            <div class="dropzone" id="add_photo"></div>
                                            @if($child->image)
                                                <div class="photo active">
                                                    <div id="dlt_photo{{$key}}"
                                                         class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                    <img class="add_photo" id="add_photo{{$key}}"
                                                         src="/upload/images/{{ $child->image }}"
                                                         alt="">
                                                </div>
                                            @else
                                                <div class="photo">
                                                    <div id="dlt_photo{{$key}}"
                                                         class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                </div>
                                            @endif
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->
                                    <a href="{{route('admin.finish-tissue.destroy.child', $child->id)}}"
                                       class='btn btn-danger btn-xs'>{{trans('buttons.general.crud.delete')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                <a href="{{route('admin.finish-tissue.store.child', $finishTissue)}}"
                   class='btn btn-success btn-xs'>{{trans('buttons.general.crud.create_new')}}</a>
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

        $('.panel-group').each(function (key, el) {
            var inp = $('input#children\\[' + (key + 1) + '\\]\\[photo\\]');
            if (document.getElementById('add_photo' + key)) {
                var pathname = document.getElementById('add_photo' + key).getAttribute('src');
                var leafname = pathname.split('\\').pop().split('/').pop();
                inp.val(leafname);
            }
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
                                $('.photo >img').replaceWith('<img id="dz_photo" src="/' + res['success']['path'] + '">');
                            } else {
                                $('.photo').eq(key).append('<img id="dz_photo" src="/' + res['success']['path'] + '">');
                                $('.photo').eq(key).addClass('active');
                            }

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
                var selfAccId = $(this['clickableElements']).closest('.panel-group').index();
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
            $('#dlt_photo' + key).on('click', function () {
                $('#add_photo' + key).remove();
                $('.photo').eq(key).removeClass('active');
                inp.val('');
            });
        });
        Dropzone.autoDiscover = false;
    </script>@endsection