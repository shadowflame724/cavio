@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.news.management') . ' | ' . trans('labels.backend.access.news.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection
@section('after-styles')

    <style>
        .sweet-alert {
            z-index: 999;
        }

        #add_photo {
            max-width: 650px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .logo, .dz-photo {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .dz-photo {
            margin: 30px 0 50px;
        }

        .dlt_photo.active {
            visibility: visible;
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

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('pageKey', trans('validation.attributes.backend.access.page.pageKey'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('pageKey', null, ['id' => 'pageKey', 'class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('title', trans('validation.attributes.backend.access.page.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['id' => 'title','class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', trans('validation.attributes.backend.access.page.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('body', trans('validation.attributes.backend.access.page.body'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control redactor', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.block.management') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                @foreach($page->blocks as $key => $block)
                    @php ($i = $key+1)

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{$i}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{$block->id}}"
                                       aria-expanded="true" aria-controls="collapseOne">
                                        {{$i}}. {{$block->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{$i}}">
                                <div class="panel-body">
                                    <div class="form-group">
                                        {{ Form::label('title', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                        <div class="col-lg-10">
                                            {{ Form::text('blocks['.$i.'][title]', $block->title, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {{ Form::label('preview', trans('validation.attributes.backend.access.block.preview'), ['class' => 'col-lg-2 control-label']) }}

                                        <div class="col-lg-10">
                                            {{ Form::textarea('blocks['.$i.'][preview]', $block->preview, ['class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {{ Form::label('body', trans('validation.attributes.backend.access.block.body'), ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-10">
                                            {{ Form::textarea('blocks['.$i.'][body]', $block->body, ['class' => 'form-control redactor', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {{ Form::label('blocks['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-10">
                                            {{ Form::hidden('blocks['.$i.'][photo]', null) }}
                                            <div class="dropzone"></div>
                                            @if($block->image)
                                                <div class="photo active">
                                                    <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                    <img id="dlt_photo" src="/upload/images/{{ $block->image }}"
                                                         alt="">
                                                </div>
                                            @else
                                                <div class="photo">
                                                    <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                </div>
                                            @endif
                                        </div><!--col-lg-10-->
                                    </div><!--form control-->
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
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
        </div>
    </div>


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
            var byteString = atob(dataURI.split(',')[1]);
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], {type: 'image/jpeg'});
        }


        $('.panel-group').on('click', function (e) {
            $(this).toggleClass('acc-open');
            if ($(this).hasClass('acc-open')) {
                currMarkerId = $(this).index() + 1;
                //console.log(currMarkerId);

            }
            else {
                currMarkerId = undefined;
                $("#marker-" + $(this).index()).remove();
            }
        });


        var myDropzone = [];

        $('.panel-group').each(function(key, el){
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
//                            console.log(res['error']);
                            swal({
                                title: res['error']['title'],
                                text: res['error']['text'],
                                type: "warning",
                                confirmButtonColor: "#DD6B55 ",
                                confirmButtonText: 'Ok',
                                closeOnConfirm: true
                            });

                        } else {
//                            console.log(res['success']['path']);
//                            console.log(res['success']['imgName']);
                            if ($('.photo').eq(key).hasClass('active')) {
                                $('.photo >img').replaceWith('<img src="/' + res['success']['path'] + '">');
                            } else {
                                $('.photo').eq(key).append('<img src="/' + res['success']['path'] + '">');
                                $('.photo').eq(key).addClass('active');
                            }


//                            console.log('-------',key, res['success']['imgName']);
                            var inp  = $('input#blocks\\['+(key+1)+'\\]\\[photo\\]');
                            inp.val(res['success']['imgName']);

                            console.log('inp', inp)
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
//                console.log(this['clickableElements'], selfAccId);
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
                        aspectRatio: 16 / 9,
                        preview: '.image-preview',
                        autoCropArea: 1,
                        movable: false,
                        cropBoxResizable: true,
                        minContainerHeight: 320,
                        minContainerWidth: 568
                    });
                };

                reader.readAsDataURL(file);
                $cropperModal.modal('show');
                $uploadCrop.on('click', function () {
                    console.log('0000000000', $uploadCrop, $cropperModal)
                    var blob = cropper.getCroppedCanvas().toDataURL();
                    var newFile = dataURItoBlob(blob);
                    newFile.cropped = true;
                    newFile.name = cachedFilename;
                    myDropzone[selfAccId].addFile(newFile);
                    myDropzone[selfAccId].processQueue();
//                    console.log(newFile);
                    $cropperModal.modal('hide');
                });
            });
        })




//        $('#edit-page').on('submit', function(event){
//            event.preventDefault();
//        });

        Dropzone.autoDiscover = false;
        {{--var myDropzone = new Dropzone($(".dropzone")[0], {--}}
                {{--autoProcessQueue: false,--}}
                {{--dictDefaultMessage: "Drop files here",--}}
                {{--url: "{{route('admin.file.upload')}}",--}}
                {{--maxFiles: 1,--}}
                {{--headers: {--}}
                    {{--'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value--}}
                {{--},--}}
                {{--success: function (file, res) {--}}
                    {{--this.removeFile(file);--}}

                    {{--if (res['error']) {--}}
                        {{--console.log(res['error']);--}}
                        {{--swal({--}}
                            {{--title: res['error']['title'],--}}
                            {{--text: res['error']['text'],--}}
                            {{--type: "warning",--}}
                            {{--confirmButtonColor: "#DD6B55 ",--}}
                            {{--confirmButtonText: 'Ok',--}}
                            {{--closeOnConfirm: true--}}
                        {{--});--}}

                    {{--} else {--}}
                        {{--console.log(res['success']['path']);--}}
                        {{--console.log(res['success']['imgName']);--}}
                        {{--if ($('.photo').hasClass('active')) {--}}
                            {{--$('.photo >img').replaceWith('<img src="/' + res['success']['path'] + '">');--}}
                        {{--} else {--}}
                            {{--$('.photo').append('<img src="/' + res['success']['path'] + '">');--}}
                            {{--$('.photo').addClass('active');--}}
                        {{--}--}}


                        {{--console.log(currMarkerId, res['success']['imgName']);--}}
                        {{--$('input#blocks['+currMarkerId+'][photo]').val(res['success']['imgName']);--}}
                        {{--swal({--}}
                            {{--title: res['success']['title'],--}}
                            {{--text: res['success']['text'],--}}
                            {{--type: "success",--}}
                            {{--confirmButtonColor: "#DD6B55 ",--}}
                            {{--confirmButtonText: 'Ок',--}}
                            {{--closeOnConfirm: true--}}
                        {{--});--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (file, errorMessage, xhr) {--}}
                    {{--var self = this,--}}
                        {{--default_error = '{{trans('validation.attributes.backend.access.image.error.default_error')}}';--}}
                    {{--swal({--}}
                        {{--title: '{{trans('validation.attributes.backend.access.image.error.title')}}',--}}
                        {{--text: '{{trans('validation.attributes.backend.access.image.error.text')}} ' + '\n' + (xhr ? default_error : errorMessage),--}}
                        {{--type: "warning",--}}
                        {{--showCancelButton: false,--}}
                        {{--confirmButtonColor: "#DD6B55",--}}
                        {{--confirmButtonText: 'ОК',--}}
                        {{--closeOnConfirm: true--}}
                    {{--});--}}
                    {{--self.removeFile(file);--}}
                {{--}--}}
            {{--}--}}
        {{--);--}}
        $('.dlt_photo').on('click', function () {
            $('.photo>img').remove();
            $('.photo').removeClass('active');
            $('input#photo').val('');
        });


//        myDropzone.on('thumbnail', function (file) {
//            if (file.cropped) {
//                return;
//            }
//            console.log(435345)
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
//                cropper = new Cropper($img[0], {
//                    aspectRatio: 16 / 9,
//                    preview: '.image-preview',
//                    autoCropArea: 1,
//                    movable: false,
//                    cropBoxResizable: true,
//                    minContainerHeight: 320,
//                    minContainerWidth: 568
//                });
//            };
//
//            reader.readAsDataURL(file);
//            $cropperModal.modal('show');
//            $uploadCrop.on('click', function () {
//                var blob = cropper.getCroppedCanvas().toDataURL();
//                var newFile = dataURItoBlob(blob);
//                newFile.cropped = true;
//                newFile.name = cachedFilename;
//                myDropzone.addFile(newFile);
//                myDropzone.processQueue();
//                console.log(newFile);
//                $cropperModal.modal('hide');
//            });
//        });
        $('.panel-group').on('click', function (e) {
            $(this).toggleClass('acc-open');
            if ($(this).hasClass('acc-open')) {
                currMarkerId = $(this).index();
                console.log(currMarkerId);

            }
            else {
                currMarkerId = undefined;
                $("#marker-" + $(this).index()).remove();
            }
        })

    </script>
@endsection