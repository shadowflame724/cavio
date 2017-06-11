@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.category.management') . ' | ' . trans('labels.backend.access.category.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.category.management') }}
        <small>{{ trans('labels.backend.access.category.create') }}
        </small>
    </h1>

@endsection

@section('before-styles')
    {{ Html::style('css/backend/cropit/cropit.css') }}
    {{ Html::style('css/backend/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/dropzone/basic.css') }}
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.category.create', $p_id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-category', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.category.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.categories.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name', trans('validation.attributes.backend.access.category.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            <input type="text" hidden name="p_id" value="{{$p_id}}">

            <div class="form-group">
                {{ Form::label('image', trans('validation.attributes.backend.access.collection.image'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <div class="dropzone-previews"></div>

                    <div class="dropzone" id="myDropzone"></div>
                    <!-- And clicking on this button will open up select file dialog -->
                </div>
            </div><!--col-lg-10-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.category.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/ImgUtil/dropzone.js') }}
    {{ Html::script('../dist/jquery.cropit.js') }}
    {{ Html::script('js/backend/categories/script.js') }}

    <script>
        Dropzone.options.myDropzone = {
            url: "",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: "image/*",

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;

                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                });

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {

                    formData.append("name", $("#name").val());

                });
            }
        };
    </script>

@endsection
