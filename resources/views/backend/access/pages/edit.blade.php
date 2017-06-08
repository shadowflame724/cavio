@extends ('backend.layouts.app')

@section ('title', 'Page management')

@section('page-header')
    {{ Html::style('js/backend/access/pages/redactor/redactor.css') }}
    <h1>
        Edit Page
        <small>Edit Page</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($page, ['route' => ['admin.access.page.update', $page], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-page', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit page - {{$page->title}}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.page-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('pageKey', 'pageKey', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('pageKey', null, ['class' => 'form-control','minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'about']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('title', 'title', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control','minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'About us']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', 'description', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required','minlength' => '3', 'autofocus' => 'autofocus', 'placeholder' => 'SEO info']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('prev', 'prev', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('prev', null, ['id' => 'prev', 'class' => 'form-control', 'required' => 'required','minlength' => '3', 'autofocus' => 'autofocus', 'placeholder' => 'Prev info']) }}

                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('body', 'body', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'required' => 'required','minlength' => '3', 'autofocus' => 'autofocus', 'placeholder' => 'Body']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    @if($page->image != null)
                        <img src="/img/backend/pages/{{$page->image}}" width="300" height="300">
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
            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                        {{ link_to_route('admin.access.page.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                    </div><!--pull-left-->

                    <div class="pull-right">
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Block Management</h3>

                    <div class="box-tools pull-right">
                        @include('backend.access.includes.partials.block-header-buttons')
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="blocks-table" class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--table-responsive-->
                </div><!-- /.box-body -->
            </div>

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
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    <script>
        $('#image-cropper').cropit().dropzone();
    </script>
    <script>
        $(function() {
            $('#blocks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.block.get", ['page' => $page]) }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'title', name: 'title'},
                    {data: 'image', name: 'image', sortable: false},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection