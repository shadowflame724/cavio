@extends('backend.layouts.app')


@section ('title', trans('labels.backend.access.showroom.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.access.showroom.management') }}</h1>

@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.page.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.showrooms.showrooms-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="showrooms-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.showroom.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.showroom.table.country') }}</th>
                        <th>{{ trans('labels.backend.access.showroom.table.city') }}</th>
                        <th>{{ trans('labels.backend.access.showroom.table.name') }}</th>
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
            {!! history()->renderType('Showroom') !!}
        </div><!-- /.box-body -->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    <script>
        var langSuf = '{{ $langSuf }}';
        $(function() {
            $('#showrooms-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('admin.showroom.get') !!}',
                    type: 'post'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'country' + langSuf, name: 'country' + langSuf },
                    { data: 'city' + langSuf, name: 'city' + langSuf },
                    { data: 'name' + langSuf, name: 'name' + langSuf },
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}                ],
                order: [[3, "asc"]],
                lengthMenu:  [50, 100, "All"],
                searchDelay: 500
            });
        });
    </script>
@endsection