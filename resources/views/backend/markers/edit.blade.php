@extends ('backend.layouts.app')
@section('after-styles')
    {{ Html::style('/css/backend/redactor/redactor.css') }}
    {{ HTML::style('/css/backend/dropzone/dropzone.css') }}

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

        .sweet-alert {
            z-index: 999;
        }

        .redactor-toolbar {
            z-index: 20;
        }

        #add_cont_IMG {
            display: inline-block;
            max-width: 320px;
            height: 300px;
            float: left;
            margin-right: 10px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .cont_IMG {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .cont_IMG {
            max-width: 560px;
            width: auto;
            height: auto;
        }

        .cont_IMG img {
            width: 100%;
            height: auto;
        }

        .cont_IMG.active {
            visibility: visible;
        }

        .dlt_cont_IMG {
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 25px;
        }

    </style>
@endsection

@section ('title', 'Collections' . ' | '  . 'Create collection marker')

@section('page-header')
    <h1>
        Contacts
        <small>Create collection marker</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create contact marker
            </h3>
        </div>
        <!-- /.box-header -->


        {{ Form::open(['route' => ['admin.marker.update'], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}

        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div id="map" width="100%"><img src="/upload/images/{{$collection->image}}" alt=""></div>
                </div>
            </div><!--form control-->

            @foreach($collection->markers as $key => $marker)
                @php ($i = $key+1)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{$i}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse{{$i}}"
                                   aria-expanded="true" aria-controls="collapse{{$i}}">
                                    {{$i}}. {{$marker->title}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="heading{{$i}}">
                            <div class="panel-body">
                                <div class="form-group">
                                    {{ Form::hidden('markers['.$i.'][id]', $marker->id, ['class' => 'form-control', 'id' => 'markers['.$i.'][id]']) }}

                                    {{ Form::label('title', trans('validation.attributes.backend.access.marker.title'), ['class' => 'col-lg-2 control-label']) }}

                                    <div class="col-lg-10">
                                        {{ Form::text('markers['.$i.'][title]', $marker->title, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->

                                <div class="form-group">
                                    {{ Form::label('code', trans('validation.attributes.backend.access.marker.code'), ['class' => 'col-lg-2 control-label']) }}
                                    <div class="col-lg-10">
                                        {{ Form::text('markers['.$i.'][code]', $marker->code, ['class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                                {{ Form::hidden('markers['.$i.'][x]', $marker->x, ['class' => 'form-control', 'id' => 'markers['.$i.'][x]']) }}
                                {{ Form::hidden('markers['.$i.'][y]', $marker->y, ['class' => 'form-control', 'id' => 'markers['.$i.'][y]']) }}

                                <a href="{{route('admin.marker.destroy', $marker)}}" class = 'btn btn-danger btn-xs'>Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{route('admin.collection.marker.store', $collection)}}" class = 'btn btn-success btn-xs'>Create new marker</a>

        </div>


    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', 'Cancel', [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit('Create', ['class' => 'btn btn-success btn-xs']) }}
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

        map.onclick = function (e) {
            if (!currMarkerId)  return;
            var mapMainH = mapMain.innerHeight();
            var mapMainW = mapMain.innerWidth();
            var x = e.offsetX == undefined ? e.layerX : e.offsetX;
            var y = e.offsetY == undefined ? e.layerY : e.offsetY;
            markerX = x / mapMainW * 100;
            markerY = y / mapMainH * 100;
            //mapMain.find('.marker').remove();
//            mapMain.append('<div class="marker" style="position: absolute; top: ' + (y) + 'px; left: ' + (x) + 'px"></div>');
            $('#markers\\[' + currMarkerId + '\\]\\[x\\]').val(x.toFixed(2));
            $('#markers\\[' + currMarkerId + '\\]\\[y\\]').val(y.toFixed(2));
            $('#marker-' + currMarkerId).css({top: y + 'px', left: x + 'px'});
        };

        $('.panel-group').on('click', function (e) {
            $(this).toggleClass('acc-open');
            if ($(this).hasClass('acc-open')) {
                currMarkerId = $(this).index();
                console.log(currMarkerId);

                var x = $('#markers\\[' + currMarkerId + '\\]\\[x\\]').val();
                var y = $('#markers\\[' + currMarkerId + '\\]\\[y\\]').val();
                mapMain.append('<div id=' + "marker-" + currMarkerId + ' class="marker" style="position: absolute; top: ' + (y) + 'px; left: ' + (x) + 'px"></div>');
            }
            else {
                currMarkerId = undefined;
                $("#marker-" + $(this).index()).remove();
            }
        })
    </script>
@endsection
