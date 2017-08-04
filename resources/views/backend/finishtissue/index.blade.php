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
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                All Finishes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="all-finishes" class="table table-condensed table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.id') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.short') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.title') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                All tissues
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="all-tissues" class="table table-condensed table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.id') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.short') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.title') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Parent finishes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="parent-finishes" class="table table-condensed table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.id') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.short') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.title') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Parent tissues
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body" data-content="">
                            <div class="table-responsive">
                                <table id="parent-tissues" class="table table-condensed table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.id') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.short') }}</th>
                                        <th>{{ trans('labels.backend.access.finishtissue.table.title') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                    </div>
                </div>
            </div>
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
        var langSuf = '{{ $langSuf }}';
        $(function() {
            $('#all-finishes').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.finish-tissue.getAllFinishes") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'short', name: 'short'},
                    {data: 'title' + langSuf, name: 'title' + langSuf},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[1, "asc"]],
                lengthMenu:  [25, 50, "All"],
                searchDelay: 500
            });
        });

        $(function() {
            $('#all-tissues').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.finish-tissue.getAllTissues") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'short', name: 'short'},
                    {data: 'title' + langSuf, name: 'title' + langSuf},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[1, "asc"]],
                lengthMenu:  [25, 50, "All"],
                searchDelay: 500
            });
        });

        $(function() {
            $('#parent-finishes').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.finish-tissue.getParentFinishes") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'short', name: 'short'},
                    {data: 'title' + langSuf, name: 'title' + langSuf},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                order: [[1, "asc"]],
                lengthMenu:  [25, 50, "All"],
                searchDelay: 500
            });
        });

        $(function() {
            $('#parent-tissues').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.finish-tissue.getParentTissues") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'short', name: 'short'},
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
