@extends ('backend.layouts.app')

@section ('title', 'Page management')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>Page management</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Page management</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.page-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="pages-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>PageKey</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Page') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>
        $(function() {
            $('#pages-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.page.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'pageKey', name: 'pageKey' },
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description', sortable: false},
                    {data: 'image', name: 'image', sortable: false},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
        function del(page)
        {
            var url = route("admin.access.page.destroy", 'page');
            $.get(url, function(data) {
                alert(data.message);
            });
        }

    </script>
@endsection
