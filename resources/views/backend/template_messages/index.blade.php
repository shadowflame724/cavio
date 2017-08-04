@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.templateMessage.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.templateMessage.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.templateMessage.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.template_messages.template-messages-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="template-messages-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.templateMessage.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.templateMessage.table.type') }}</th>
                        <th>{{ trans('labels.backend.access.templateMessage.table.title') }}</th>
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
            {!! history()->renderType('TemplateMessage') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>
        var langSuf = '{{ $langSuf }}';
        $(function() {
            $('#template-messages-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.template-messages.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'type', name: 'type'},
                    {data: 'title' + langSuf, name: 'title' + langSuf},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[1, "asc"]],
                lengthMenu:  [25, 50, "All"],
                searchDelay: 500
            });
        });
    </script>
@endsection
