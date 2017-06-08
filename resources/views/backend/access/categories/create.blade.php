@extends ('backend.layouts.app')

@section ('title', 'Category management'))

@section('page-header')
    <h1>
        Create new category
        <small>Create new category</small>
    </h1>

@endsection

@section('before-styles')
    {{ Html::style('css/backend/cropit/cropit.css') }}
@endsection

@section('content')

    {!! Form::open(['route' => 'admin.access.category.create', $p_id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-category', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Category create</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name', 'Category name', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Some category']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            <input type="text" hidden name="p_id" value="{{$p_id}}">

            <div class="form-group">
                {{ Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    <div id="image-cropper" class="dropzone">
                        <div class="cropit-preview"></div>

                        <input type="range" class="cropit-image-zoom-input"/>

                        <!-- The actual file input will be hidden -->
                        <input name="file" type="file" class="cropit-image-input"/>
                        <!-- And clicking on this button will open up select file dialog -->
                        <div class="select-image-btn">Select new image</div>
                    </div>
                </div><!--col-lg-10-->
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.access.category.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/access/categories/script.js') }}
    {{ Html::script('js/backend/access/ImgUtil/dropzone.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js') }}
    {{ Html::script('../dist/jquery.cropit.js') }}
    <script>
        $('#image-cropper').dropzone().cropit();

        // When user clicks select image button,
        // open select file dialog programmatically
        $('.select-image-btn').click(function () {
            $('.cropit-image-input').click();
        });

        // Handle rotation
        $('.rotate-cw-btn').click(function () {
            $('#image-cropper').cropit('rotateCW');
        });
        $('.rotate-ccw-btn').click(function () {
            $('#image-cropper').cropit('rotateCCW');
        });
    </script>

@endsection
