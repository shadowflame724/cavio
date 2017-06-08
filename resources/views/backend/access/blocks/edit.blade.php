@extends ('backend.layouts.app')

@section ('title', "Blocks management")

@section('page-header')
    {{ Html::style('js/backend/access/pages/redactor/redactor.css') }}
    <h1>
        Edit Block
        <small>Edit Block</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($block, ['route' => ['admin.access.page.block.update', $block->page , $block], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-block', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit block - {{$block->title}}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.block-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('title', 'title', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'About us']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('body', 'body', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Body']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <img src="/img/backend/blocks/{{$block->image}}" width="300" height="300">

                    <div id="image-cropper">
                        <!-- This is where the preview image is displayed -->
                        <div class="cropit-image-preview"></div>

                        <!-- This range input controls zoom -->
                        <!-- You can add additional elements here, e.g. the image icons -->
                        <input type="range" class="cropit-image-zoom-input"/>

                        <!-- This is where user selects new image -->
                        <input type="file" class="cropit-image-input"/>

                        <!-- The cropit- classes above are needed so cropit can identify these elements -->
                    </div>

                </div><!--col-lg-10-->
            </div><!--form control-->
            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                        {{ link_to_route('admin.access.page.edit', trans('buttons.general.cancel'), [$page], ['class' => 'btn btn-danger btn-xs']) }}
                    </div><!--pull-left-->

                    <div class="pull-right">
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

        </div>
    </div>

    {{ Form::close() }}

    <div class="pull-center">
        {{ link_to_route('admin.access.page.index', 'Page list', [], ['class' => 'btn btn-success btn-xs']) }}
    </div><!--pull-left-->

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/pages/redactor/redactor.js') }}
    {{ Html::script('js/backend/access/pages/script.js') }}
    {{ Html::script('js/backend/access/pages/dropzone.js') }}
    {{ Html::script('dist/jquery.cropit.js') }}
    <script>
        $('#image-cropper').cropit().dropzone();
    </script>
@endsection