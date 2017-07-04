@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))
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
                        {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    @if($collection->banner == 1)
                        <div class="form-group">
                            {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-lg-10">
                                {{ Form::hidden('photo', null) }}
                                <div class="dropzone" id="dz_photo"></div>
                                @if($collection->image)
                                    <div class="photo active">
                                        <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                        <img id="add_photo" src="/upload/images/{{ $collection->image  }}" alt="">
                                    </div>
                                @else
                                    <div class="photo">
                                        <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                    </div>
                                @endif
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    @else
                        <div class="form-group">
                            {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-lg-10">
                                @if($collection->image)
                                    <img class="add_photo" src="/upload/images/{{ $collection->image  }}" alt="">
                            </div>
                            @endif
                        </div><!--col-lg-10-->
                    @endif
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="ru">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_ru', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="it">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_it', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
        </div><!--form control-->

        @if($collection->banner == 0)

            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.collection.zones.management') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                @foreach($collection->collectionZones as $key => $zone)
                    @php ($i = $key+1)

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
                                                    <select class="chosen-select" multiple="multiple" name="zones[{{$i}}][zone_id][]">
                                                        @foreach($zones as $key => $mainZone)
                                                            <option value="{{$key}}" @foreach($zone->mainZones as $z) @if($key == $z->id)selected="selected"@endif @endforeach>{{ $mainZone }}</option>
                                                        @endforeach
                                                    </select>

                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                            <div class="form-group">
                                                {{ Form::label('title', trans('validation.attributes.backend.access.collection.zones.title'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    {{ Form::text('zones['.$i.'][title]', $zone->title, ['class' => 'form-control', 'required' => 'required' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                            <div class="form-group">
                                                {{ Form::label('mainPhoto', trans('validation.attributes.backend.access.collection.zones.mainPhoto'), ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    @if($collection->image == $zone->image)
                                                        {{ Form::checkbox('zones['.$i.'][mainPhoto]', null, true) }}
                                                    @else
                                                        {{ Form::checkbox('zones['.$i.'][mainPhoto]', null) }}
                                                    @endif
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                            <div class="form-group">
                                                {{ Form::label('zones['.$i.'][photo]', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    {{ Form::hidden('zones['.$i.'][photo]', null) }}
                                                    <div class="dropzone" id="add_photo"></div>
                                                    @if($zone->image)
                                                        <div class="photo active">
                                                            <div id="dlt_photo{{$i-1}}"
                                                                 class="btn glyphicon glyphicon-remove dlt_photo"></div>
                                                            <img class="add_photo" id="add_photo{{$i-1}}"
                                                                 src="/upload/images/{{ $zone->image }}"
                                                                 alt="">
                                                        </div>
                                                    @else
                                                        <div id="photo{{$i-1}}" class="photo">
                                                            <div id="dlt_photo{{$i-1}}"
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
                                                    {{ Form::text('zones['.$i.'][title_ru]', $zone->title_ru, ['class' => 'form-control', 'required' => 'required' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="it{{$i}}">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                {{ Form::label('title_it', trans('validation.attributes.backend.access.block.title'), ['class' => 'col-lg-2 control-label']) }}

                                                <div class="col-lg-10">
                                                    {{ Form::text('zones['.$i.'][title_it]', $zone->title_it, ['class' => 'form-control', 'required' => 'required' ]) }}
                                                </div><!--col-lg-10-->
                                            </div><!--form control-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                <a href="{{route('admin.collection.zones.store', $collection)}}"
                   class='btn btn-success btn-xs'>{{trans('buttons.general.crud.create_new')}}</a>
            </div>
        @endif

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
    @if($collection->banner == 1)
        @include('backend.includes.dropzone_cropper_collection')
    @else
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

            $('.panel-group').each(function (key, el) {
                var inp = $('input#zones\\[' + (key + 1) + '\\]\\[photo\\]');
                console.log(inp);
                console.log('add_photo' + key);
                if (document.getElementById('add_photo' + key)) {
                    var pathname = document.getElementById('add_photo' + key).getAttribute('src');
                    var leafname = pathname.split('\\').pop().split('/').pop();
                    console.log('path=' + pathname, 'leaf='+leafname);
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
                                    $('.photo >img').eq(key).replaceWith('<img id="dz_photo" src="/' + res['success']['path'] + '">');
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
                        console.log('0000000000', $uploadCrop, $cropperModal)
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
        </script>
    @endif
@endsection