@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
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
        <small>{{ trans('labels.backend.access.collection.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($collection, ['route' => ['admin.collection.update', $collection], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-collection', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.collection.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
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
                            {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <div class="dropzone" id="dz_collection"></div>
                            @if($collection->image)
                                <div class="photo active">
                                    {{ Form::hidden('photo', $collection->image) }}
                                    <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                    {{--<img id="add_photo" src="/upload/images/{{ $collection->image  }}" alt="">--}}
                                    <img id="original" src="/upload/tmp/collection/original/{{ $collection->image  }}"
                                         alt="">
                                    <img id="horizontal"
                                         src="/upload/tmp/collection/horizontal/{{ $collection->image  }}" alt="">
                                    <img id="vertical" src="/upload/tmp/collection/vertical/{{ $collection->image  }}"
                                         alt="">
                                </div>
                            @else
                                <div class="photo">
                                    {{ Form::hidden('photo', null) }}
                                    <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                </div>
                            @endif
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


        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.zones.management') }}</h3>

            <div class="box-tools pull-right">
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @foreach($collection->collectionZones as $key => $zone)
                    @php ($i = $key+1)

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{$i}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{$i}}"
                                       aria-expanded="true" aria-controls="collapse{{$i}}">
                                        {{$i}}. {{$zone->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading{{$i}}">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#en{{$i}}" aria-controls="en"
                                                                              role="tab"
                                                                              data-toggle="tab">EN</a>
                                    </li>
                                    <li role="presentation"><a href="#ru{{$i}}" aria-controls="ru" role="tab"
                                                               data-toggle="tab">RU</a></li>
                                    <li role="presentation"><a href="#it{{$i}}" aria-controls="it" role="tab"
                                                               data-toggle="tab">IT</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="en{{$i}}">
                                        <div class="panel-body">
                                            {{ Form::hidden('zones['.$i.'][id]', $zone->id) }}

                                            <div class="form-group">
                                                {{ Form::label('zones['.$i.'][zone_id]', trans('validation.attributes.backend.access.collection.zones.mainZones'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    <select class="form-control"
                                                            name="zones[{{ $i }}][zone_id]">
                                                        @foreach($mainZones as $mainZone)
                                                            <option value="{{ $mainZone->id }}"
                                                                    @if($zone->zone_id == $mainZone->id) selected="selected"@endif>{{ $mainZone->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><!--form control-->

                                            <div class="form-group">
                                                {{ Form::label('title', trans('validation.attributes.backend.access.collection.zones.title'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    {{ Form::text('zones['.$i.'][title]', $zone->title, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                            <div class="form-group">
                                                {{ Form::label('zones['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    <div class="dropzone" id="add_photo"></div>
                                                    @if($zone->image)
                                                        <div class="photo active">
                                                            {{ Form::hidden('zones['.$i.'][photo]', $zone->image, ['id' => 'zones['.$i.'][photo]']) }}

                                                            <div id="dlt_photo{{$i}}"
                                                                 class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                            <img class="add_photo" id="add_photo"
                                                                 src="/upload/images/{{ $zone->image }}"
                                                                 alt="">
                                                        </div>
                                                    @else
                                                        <div id="photo{{$i}}" class="photo">
                                                            {{ Form::hidden('zones['.$i.'][photo]', null, ['id' => 'zones['.$i.'][photo]']) }}

                                                            <div id="dlt_photo"
                                                                 class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                        </div>
                                                    @endif
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                            <a href="{{route('admin.collection.zones.destroy', $zone)}}"
                                               class='btn btn-danger btn-xs'>{{trans('buttons.general.crud.delete')}}</a>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="ru{{$i}}">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                {{ Form::label('title_ru', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    {{ Form::text('zones['.$i.'][title_ru]', $zone->title_ru, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="it{{$i}}">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                {{ Form::label('title_it', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    {{ Form::text('zones['.$i.'][title_it]', $zone->title_it, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{route('admin.collection.zones.store', $collection)}}"
                           class='btn btn-success btn-xs'>{{trans('buttons.general.crud.create_new')}}</a>
            </div>

        </div>

    </div><!-- /.box-body -->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}

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
        $("#dz_collection").dropzone({
            url: "{{route('admin.file.upload.collection')}}",
            maxFiles: 10,
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            success: function (file, res) {
                this.removeFile(file);
                console.log('response', res, 'file', file);

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

                    $('input#photo').val(res['success']['imgName']);
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

        $('.dropzone:not(:first)').each(function (key, el) {
            inp = $('input#zones\\[' + key + '\\]\\[photo\\]');
            myDropzone[key] = new Dropzone($(".dropzone:not(:first)")[key], {
                    uploadMultiple: true,
                    dictDefaultMessage: "Drop files here",
                    url: "{{route('admin.file.upload.collection-zone')}}",
                    maxFiles: 20,
                    headers: {
                        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                    },
                    successmultiple: function (file, res) {
                        console.log(res);
                        this.removeFile(file);

                        if (res[0]['error']) {
                            swal({
                                title: res['error']['title'],
                                text: res['error']['text'],
                                type: "warning",
                                confirmButtonColor: "#DD6B55 ",
                                confirmButtonText: 'Ok',
                                closeOnConfirm: true
                            });

                        } else {
                            var hidden= '';
                            inp = $('.photo').eq(key+1).find(":hidden");
                            res.forEach(function (item, i, res) {
                                $('.photo').eq(key+1).append('<img src="/upload/tmp/' + item.success.imgName + '">');
                                $('.photo').eq(key+1).addClass('active');
                                hidden += item.success.imgName + ', ';
                            });
                            inp.val(hidden);
                            swal({
                                title: res[0]['success']['title'],
                                text: res[0]['success']['text'],
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

//            myDropzone[key].on('thumbnail', function (file) {
//                var selfAccId = key;
//                if (file.cropped) {
//                    return;
//                }
//                var cachedFilename = file.name;
//                myDropzone[selfAccId].removeFile(file);
//
//
//                var $cropperModal = $(modalTemplate);
//                var $uploadCrop = $cropperModal.find('.crop-upload');
//                var $img = $('<img />');
//                var reader = new FileReader();
//                reader.onloadend = function () {
//                    $cropperModal.find('.image-container').html($img);
//                    $img.attr('src', reader.result);
//                    cropper = new Cropper($img[0], {
//                        preview: '.image-preview',
//                        autoCropArea: 1,
//                        movable: false,
//                        cropBoxResizable: true,
//                        minContainerHeight: 320,
//                        minContainerWidth: 568,
//                        crop: function (e) {
//                            $('input#dataWidth').val(e.detail.width);
//                            $('input#dataHeight').val(e.detail.height);
//                            $('#aspectRatio1').on('click', function () {
//                                cropper.setAspectRatio(1.7777777777777777);
//                            });
//                            $('#aspectRatio2').on('click', function () {
//                                cropper.setAspectRatio(0.75);
//                            });
//                            $('#aspectRatio3').on('click', function () {
//                                cropper.setAspectRatio(4.3956044);
//                            });
//                        }
//                    });
//                };
//
//                reader.readAsDataURL(file);
//                $cropperModal.modal('show');
//                $uploadCrop.on('click', function () {
//                    var blob = cropper.getCroppedCanvas().toDataURL();
//                    var newFile = dataURItoBlob(blob);
//                    newFile.cropped = true;
//                    newFile.name = cachedFilename;
//                    myDropzone[selfAccId].addFile(newFile);
//                    myDropzone[selfAccId].processQueue();
//                    $cropperModal.modal('hide');
//                });
//            });
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