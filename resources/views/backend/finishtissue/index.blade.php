@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.finishtissue.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.finishtissue.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.finishtissue.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.finishtissue.finishtissue-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="finish-tissue-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.finishtissue.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.finishtissue.table.type') }}</th>
                        <th>{{ trans('labels.backend.access.finishtissue.table.title') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
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
            {!! history()->renderType('FinishTissue') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>

        $(function() {
            $('#finish-tissue-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.finish-tissue.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'type', name: 'type'},
                    {data: 'title', name: 'title'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[1, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
