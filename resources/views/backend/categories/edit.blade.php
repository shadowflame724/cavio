@extends ('backend.layouts.app')

@section ('title', "Category management")

@section('page-header')
    <h1>
        Edit Category
        <small>Edit Category</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($category, ['route' => ['admin.category.edit', $category], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'POST', 'id' => 'edit-category', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit category - {{ $category->name }}</h3>

            <div class="box-tools pull-right">
                @include('backend.categories.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name', 'Category name', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Root']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    @if($category->image != null)
                        <img src="/img/backend/categories/{{$category->image}}" width="300" height="300">
                    @endif
                    <div id="image-cropper">
                        <!-- This is where the preview image is displayed -->
                        <div class="cropit-image-preview"></div>

                        <!-- This range input controls zoom -->
                        <!-- You can add additional elements here, e.g. the image icons -->
                        <input type="range" class="cropit-image-zoom-input"/>

                        <!-- This is where user selects new image -->
                        <input name='file' type="file" class="cropit-image-input"/>

                        <!-- The cropit- classes above are needed so cropit can identify these elements -->
                    </div>

                </div><!--col-lg-10-->
            </div><!--form control-->
        </div>


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
    </div>
    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/pages/redactor/redactor.js') }}
    {{ Html::script('js/backend/category/script.js') }}
    {{ Html::script('js/backend/dropzone/dropzone.js') }}
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