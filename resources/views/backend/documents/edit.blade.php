@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.documents.management') . ' | ' . trans('labels.backend.access.documents.edit'))
@section('before-styles')
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection
@section('page-header')
    <h1>
        {{ trans('labels.backend.access.documents.management') }}
        <small>{{ trans('labels.backend.access.documents.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($document, ['route' => ['admin.documents.update', $document], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-document', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.documents.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.documents.documents-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('type', trans('validation.attributes.backend.access.documents.type'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select name="type" class="form-control">
                        <option @if($document->type == 0) selected @endif value="0">{{ trans('validation.attributes.backend.access.documents.type_design') }}</option>
                        <option @if($document->type == 1) selected @endif value="1">{{ trans('validation.attributes.backend.access.documents.type_press') }}</option>
                    </select>
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('name', trans('validation.attributes.backend.access.documents.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            <div class="form-group">
                {{ Form::label('link', trans('validation.attributes.backend.access.documents.link'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('link', null, ['id' => 'redactor', 'class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->


            <div class="form-group">
                {{ Form::label('admin_comment', trans('validation.attributes.backend.admin_comment.comment'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('admin_comment', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.documents.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    <script>
        $('#redactor').redactor({
            buttonsHide: ['format', 'bold', 'italic', 'deleted',
                'lists', 'image', 'link', 'horizontalrule'],
            fileUpload: '{{ route("admin.file.upload.documents") }}',
            fileUploadForms: $('#create-doc'),
            callbacks: {
                fileUpload: function () {
                    swal({
                        title: 'File uploaded',
                        type: "success",
                        confirmButtonColor: "#DD6B55 ",
                        confirmButtonText: 'Ок',
                        closeOnConfirm: true
                    });
                },
                fileUploadError: function (json) {
                    swal({
                        title: 'Ooops...',
                        text: json.message.file[0],
                        type: "warning",
                        confirmButtonColor: "#DD6B55"
                    });
                }
            }
        });
    </script>
@endsection