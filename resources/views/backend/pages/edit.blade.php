@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.page.management') . ' | ' . trans('labels.backend.access.page.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection

@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')

@endsection
@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}
    <h1>
        {{ trans('labels.backend.access.page.management') }}
        <small>{{ trans('labels.backend.access.page.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($page, ['route' => ['admin.page.update', $page], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-page', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.page.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.pages.page-header-buttons')
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

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="form-group">
                        {{ Form::label('name', trans('validation.attributes.backend.access.page.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', $page->name, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body', trans('validation.attributes.backend.access.page.body'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body', $page->body, ['id' => 'body', 'class' => 'form-control page', 'required' => 'required', 'minlength' => '3' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.page.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', $page->title, ['class' => 'form-control', 'maxlength' => '191' ]) }}
                        </div><!--col-lg-10-->
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.page.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description', $page->description, [ 'class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                </div>

                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="form-group">
                        {{ Form::label('name_ru', trans('validation.attributes.backend.access.page.name_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_ru', $page->name_ru, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body', trans('validation.attributes.backend.access.page.body_ru'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body_ru', $page->body_ru, ['class' => 'form-control page', 'required' => 'required', 'minlength' => '3' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.page.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', $page->title_ru, ['class' => 'form-control', 'maxlength' => '191' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.page.description_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_ru', $page->description_ru, [ 'class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="form-group">
                        {{ Form::label('name_it', trans('validation.attributes.backend.access.page.name_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_it', $page->name_it, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body_it', trans('validation.attributes.backend.access.page.body_it'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body_it', $page->body_it, ['class' => 'form-control page', 'required' => 'required', 'minlength' => '3' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.page.title_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', $page->title_it, ['class' => 'form-control', 'maxlength' => '191']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.page.description_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_it', $page->description_it, [ 'class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('admin_comment', trans('validation.attributes.backend.admin_comment.comment'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('admin_comment', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            @if($page->blocks->isNotEmpty())

                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.access.block.management') }}</h3>

                    <div class="box-tools pull-right">
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($page->blocks as $key => $block)
                            @php ($i = $key+1)

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$i}}">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse{{$i}}"
                                               aria-expanded="true" aria-controls="collapse{{$i}}">
                                                {{$i}}. {{$block->title}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading{{$i}}">
                                        <div class="panel-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#en{{$i}}"
                                                                                          aria-controls="en" role="tab"
                                                                                          data-toggle="tab">EN</a>
                                                </li>
                                                <li role="presentation"><a href="#ru{{$i}}" aria-controls="ru"
                                                                           role="tab"
                                                                           data-toggle="tab">RU</a></li>
                                                <li role="presentation"><a href="#it{{$i}}" aria-controls="it"
                                                                           role="tab"
                                                                           data-toggle="tab">IT</a></li>
                                            </ul>
                                            {{ Form::hidden('blocks['.$i.'][id]', $block->id) }}
                                            <div class="box-body">
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="en{{$i}}">

                                                        <div class="form-group">
                                                            {{ Form::label('title', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                                            <div class="col-lg-10">
                                                                {{ Form::text('blocks['.$i.'][title]', $block->title, ['class' => 'form-control', 'maxlength' => '191' ]) }}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->

                                                        <div class="form-group">
                                                            {!! Form::label('body', trans('validation.attributes.backend.access.block.body'), ['class' => 'col-lg-2 control-label']) !!}
                                                            <div class="col-lg-10">
                                                                {!! Form::textarea('blocks['.$i.'][body]', $block->body, ['class' => 'form-control block', 'maxlength' => '500' ]) !!}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->
                                                    </div>

                                                    <div role="tabpanel" class="tab-pane fade" id="ru{{$i}}">

                                                        <div class="form-group">
                                                            {{ Form::label('title', trans('validation.attributes.backend.access.block.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                                                            <div class="col-lg-10">
                                                                {{ Form::text('blocks['.$i.'][title_ru]', $block->title_ru, ['class' => 'form-control', 'maxlength' => '35' ]) }}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->

                                                        <div class="form-group">
                                                            {!! Form::label('body', trans('validation.attributes.backend.access.block.body_ru'), ['class' => 'col-lg-2 control-label']) !!}
                                                            <div class="col-lg-10">
                                                                {!! Form::textarea('blocks['.$i.'][body_ru]', $block->body_ru, ['class' => 'form-control block', 'maxlength' => '500' ]) !!}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->
                                                    </div>

                                                    <div role="tabpanel" class="tab-pane fade" id="it{{$i}}">

                                                        <div class="form-group">
                                                            {{ Form::label('title', trans('validation.attributes.backend.access.block.title_it'), ['class' => 'col-lg-2 control-label']) }}

                                                            <div class="col-lg-10">
                                                                {{ Form::text('blocks['.$i.'][title_it]', $block->title_it, ['class' => 'form-control', 'maxlength' => '35' ]) }}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->

                                                        <div class="form-group">
                                                            {!! Form::label('body', trans('validation.attributes.backend.access.block.body_it'), ['class' => 'col-lg-2 control-label']) !!}
                                                            <div class="col-lg-10">
                                                                {!! Form::textarea('blocks['.$i.'][body_it]', $block->body_it, ['class' => 'form-control block', 'maxlength' => '500' ]) !!}
                                                            </div><!--col-lg-10-->
                                                        </div><!--form control-->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    {{ Form::label('blocks['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::hidden('blocks['.$i.'][photo]', null) }}
                                                        <div class="dropzone" id="add_photo"></div>
                                                        @if($block->image)
                                                            <div class="photo active">
                                                                <div id="dlt_photo{{$key}}"
                                                                     class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                                <img class="add_photo" id="add_photo{{$key}}"
                                                                     src="/upload/images/{{ $block->image }}"
                                                                     alt="">
                                                            </div>
                                                        @else
                                                            <div class="photo">
                                                                <div id="dlt_photo{{$key}}"
                                                                     class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                            </div>
                                                        @endif
                                                    </div><!--col-lg-10-->
                                                </div>

                                            </div><!--form control-->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.page.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/pages/script.js') }}
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
        var selfAccId;
        $('.panel-default').each(function (key, el) {
            $(this).on('show.bs.collapse', function () {
                selfAccId = key;
            });
        });

        $('.panel-default').each(function (key, el) {
            var inp = $('input#blocks\\[' + (key + 1) + '\\]\\[photo\\]');
            if (document.getElementById('add_photo' + key)) {
                var pathname = document.getElementById('add_photo' + key).getAttribute('src');
                var leafname = pathname.split('\\').pop().split('/').pop();
                inp.val(leafname);
            }

            myDropzone[key] = new Dropzone($(".dropzone")[key], {
                    autoProcessQueue: false,
                    dictDefaultMessage: "Drop files here",
                    url: "{{route('admin.file.upload')}}",
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
                                console.log($('.photo >img'));
                                $('#add_photo' + key).replaceWith('<img class="add_photo" id="#add_photo' + key + '" src="/' + res['success']['path'] + '">');
                            } else {
                                $('.photo').eq(key).append('<img class="add_photo" id="#add_photo' + key + '" src="/' + res['success']['path'] + '">');
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
                        console.log(file, errorMessage);
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
//                var selfAccId = $(this['clickableElements']).closest('.box-body').index();
                console.log(selfAccId);
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
                console.log("remove=", $('#add_photo' + key));
                $(this).parent().find('img').remove();
                $('.photo').eq(key).removeClass('active');
                inp.val('');
            });
        });
        Dropzone.autoDiscover = false;
    </script>
@endsection