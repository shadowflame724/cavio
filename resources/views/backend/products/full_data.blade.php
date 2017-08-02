@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.product.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
    <style>
        .table_photo {
            max-height:48px;
        }
    </style>
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.product.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.product.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.products.product-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="all_prod-data-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.product.table.price') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.child_code') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.child_name') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.parent_name') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.photo') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.collection_name') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.zone_name') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.collection_zone_name') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.finish') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.tissue') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.category') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.created_at') }}</th>
                        <th>{{ trans('labels.backend.access.product.table.updated_at') }}</th>
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
            {!! history()->renderType('product') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('after-scripts')

    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}


    <script>
        var langSuf = '{{$langSuf}}';
        console.log(langSuf);
        $(function () {

            $('#all_prod-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.full-data-product.get") }}',
                    type: 'post'
                },
                columns: [
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'child_product_code',
                        name: 'child_product_code'
                    },
                    {
                        data: 'child_product_name',
                        name: 'child_product_name'
                    },
                    {
                        data: 'parent_name',
                        name: 'parent_name'
                    },
                    {
                        data: 'photos',
                        name: 'photos'
                    },
                    {
                        data: 'collection_name',
                        name: 'collection_'
                    },
                    {
                        data: 'zones_name',
                        name: 'zones_name'
                    },
                    {
                        data: 'collection_zones_name',
                        name: 'collection_zones_name'
                    },
                    {
                        data: 'finish_name',
                        name: 'finish_name'
                    },
                    {
                        data: 'tissue_name',
                        name: 'tissue_name'
                    },
                    {
                        data: 'categories_name',
                        name: 'categories_name'
                    },
                    {
                        data: 'parent_created_at',
                        name: 'parent_created_at'
                    },
                    {
                        data: 'parent_updated_at',
                        name: 'parent_updated_at'
                    }
                ],
                order: [[1, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
