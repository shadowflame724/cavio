@extends ('backend.layouts.app')
@section('after-styles')
    <style>
        #map {
            position: relative;
        }

        .marker {
            width: 30px;
            height: 30px;
            margin-left: -15px;
            margin-top: -15px;
            background-size: cover;
            z-index: 99999;
            border-radius: 100%;
            background-image: url(/upload/images/marker.png);
        }

        #map img {
            height: auto;
            width: 100%;
        }
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
            <h3 class="box-title">{{trans('menus.backend.access.marker.edit')}}
            </h3>
        </div>
        <!-- /.box-header -->
        {{ Form::open(['route' => ['admin.marker.update'], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}

        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div id="map" width="100%"><img src="/upload/images/collection/original/{{$collection->image}}" alt=""></div>
                </div>
            </div><!--form control-->

            <div class="panel-group" id="accordion">
                @foreach($collection->markers as $key => $marker)
                    @php ($i = $key+1)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse{{$key}}"
                                       aria-expanded="true" aria-controls="collapse{{$key}}">
                                        {{$i}}. {{$marker->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$key}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#en{{$key}}" aria-controls="en"
                                                                                  role="tab"
                                                                                  data-toggle="tab">EN</a>
                                        </li>
                                        <li role="presentation"><a href="#ru{{$key}}" aria-controls="ru" role="tab"
                                                                   data-toggle="tab">RU</a></li>
                                        <li role="presentation"><a href="#it{{$key}}" aria-controls="it" role="tab"
                                                                   data-toggle="tab">IT</a></li>
                                    </ul>
                                    <div class="box-body">

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="en{{$key}}">
                                                <div class="form-group">
                                                    {{ Form::hidden('markers['.$key.'][id]', $marker->id, ['class' => 'form-control', 'id' => 'markers['.$key.'][id]']) }}

                                                    {{ Form::label('title', trans('validation.attributes.backend.access.marker.title'), ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('markers['.$key.'][title]', $marker->title, ['class' => 'form-control', 'maxlength' => '30', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="ru{{$key}}">
                                                <div class="form-group">
                                                    {{ Form::label('title', trans('validation.attributes.backend.access.marker.title_ru'), ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('markers['.$key.'][title_ru]', $marker->title_ru, ['class' => 'form-control', 'maxlength' => '30', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="it{{$key}}">
                                                <div class="form-group">
                                                    {{ Form::label('title', trans('validation.attributes.backend.access.marker.title_it'), ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::text('markers['.$key.'][title_it]', $marker->title_it, ['class' => 'form-control', 'maxlength' => '30', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                                    </div><!--col-lg-10-->
                                                </div><!--form control-->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('code', trans('validation.attributes.backend.access.marker.code'), ['class' => 'col-lg-2 control-label']) }}
                                            <div class="col-lg-10">
                                                {{ Form::text('markers['.$key.'][code]', $marker->code, ['class' => 'form-control redactor', 'maxlength' => '20', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                            </div><!--col-lg-10-->
                                        </div><!--form control-->
                                        {{ Form::hidden('markers['.$key.'][x]', $marker->x, ['class' => 'form-control', 'id' => 'markers['.$key.'][x]']) }}
                                        {{ Form::hidden('markers['.$key.'][y]', $marker->y, ['class' => 'form-control', 'id' => 'markers['.$key.'][y]']) }}

                                        <a href="{{route('admin.marker.destroy', $marker)}}"
                                           class='btn btn-danger btn-xs'>{{trans('buttons.general.crud.delete')}}</a>


                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
            </div>
            <a href="{{route('admin.collection.marker.store', $collection)}}"
               class='btn btn-success btn-xs'>{{trans('buttons.general.crud.create_new')}}</a>
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
    {{ Form::close() }}


@endsection

@section('after-scripts')
    <script type="text/javascript">
        var currMarkerId;
        var map = document.querySelector('#map');
        var mapMain = $('#map');
        var markerX;// = $('#markers\\[1\\]\\[x\\]').val();
        var markerY;// = $('#markers\\[1\\]\\[y\\]').val();

        $(map).on('click', function (e) {

            var mapMainH = mapMain.innerHeight();
            var mapMainW = mapMain.innerWidth();
            var x = e.offsetX == undefined ? e.layerX : e.offsetX;
            var y = e.offsetY == undefined ? e.layerY : e.offsetY;
            markerX = x / mapMainW * 100;
            markerY = y / mapMainH * 100;

            $('#markers\\[' + currMarkerId + '\\]\\[x\\]').val(markerX);
            $('#markers\\[' + currMarkerId + '\\]\\[y\\]').val(markerY);
            $('#marker-' + currMarkerId).css({top: markerY+ '%', left: markerX + '%'});
        });

        $('.panel').on('shown.bs.collapse', function () {
            currMarkerId = $(this).index();
            var x = $('#markers\\[' + currMarkerId + '\\]\\[x\\]').val();
            var y = $('#markers\\[' + currMarkerId + '\\]\\[y\\]').val();
            mapMain.append('<div id=' + "marker-" + currMarkerId + ' class="marker" style="position: absolute; top: ' + (y) + '%; left: ' + (x) + '%"></div>');
        })
            .on('hide.bs.collapse', function () {
                $("#marker-" + $(this).index()).remove();
            });

    </script>
@endsection
