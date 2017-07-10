@extends ('backend.layouts.app')
@section('after-styles')
    <style>
    </style>
@endsection

@section ('title', trans('menus.backend.access.marker.management') . ' | '  . trans('menus.backend.access.marker.edit'))

@section('page-header')
    <h1>
        {{trans('menus.backend.access.marker.management')}}
        <small>{{trans('menus.backend.access.marker.edit')}}</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">excel</h3>
        </div>
        <div class="box-body">
            <div class="form-group" style="overflow-x:auto;">
                <table class="table">
                    <thead>
                    @foreach($titles as $row)
                        <tr>
                        @foreach($row as $nm => $column)
                            <th>{{ $column }} <br><i>{{ $nm }}</i></th>
                        @endforeach
                        </tr>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        @foreach($row as $product)
                        <tr>
                            @foreach($product as $column)
                            <td>{{ $column }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div><!--form control-->
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->


@endsection

@section('after-scripts')
@endsection
