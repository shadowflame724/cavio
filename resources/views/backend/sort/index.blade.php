@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.sort.management'))

@section('after-styles')
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.sort.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.sort.management') }}</h3>

            <div class="box-tools pull-right">
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => 'admin.sort.collection.update', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'sort-form']) !!}

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('type', trans('validation.attributes.backend.access.finishtissue.type'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    <select name="collection" class="form-control" id="collectionSelect">
                        @foreach($collections as $key => $collection)
                            <option selected
                                    value="{{ $collection->id }}"
                            >{{ $collection->title }}</option>
                        @endforeach
                    </select>
                </div><!--col-lg-10-->

                {{ Form::label('type', trans('validation.attributes.backend.access.finishtissue.type'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select name="category" class="form-control" id="categorySelect">
                        @foreach($categories as $key => $category)
                            <option selected
                                    value="{{ $category->id }}"
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div><!--col-lg-10-->
                {{ Form::label('type', trans('validation.attributes.backend.access.finishtissue.type'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select name="collectionZone" class="form-control" id="collectionZoneSelect">
                        @foreach($collectionZones as $key => $collectionZone)
                            <option selected
                                    value="{{ $collectionZone->id }}"
                            >{{ $collectionZone->title }}</option>
                        @endforeach
                    </select>
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="box-body" id="products-box">

            </div>
        </div><!-- /.box-body -->
    </div><!--box-->
    <div class="box box-success">
        <div class="box-body">
            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {!! Form::close() !!}

@endsection
@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    <script>
        $('#collectionSelect').on('change', function (e) {
            var url = '{{ route("admin.sort.collection.show", '')}}' + '/' + e.target.value;
            getProducts(url);
        });
        $('#categorySelect').on('change', function (e) {
            var url = '{{ route("admin.sort.category.show", '')}}' + '/' + e.target.value;
            getProducts(url);
        });
        $('#collectionZoneSelect').on('change', function (e) {
            var url = '{{ route("admin.sort.collection-zone.show", '')}}' + '/' + e.target.value;
            getProducts(url);
        });
        var template = '<div class="content" id="products-box">' +
            '<div class="col-lg-3">' +
            '</div>' +
            '</div>';

        function getProducts(url) {
            $.ajax({
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                },
                type: "GET",
                url: url,
                success: function (data) {
                    console.log('success', data);
                    $('#products-box').replaceWith(template);
                },
                error: function (res) {
                    console.log('error', res);
                    data.forEach(function (item, i) {
                        $('#products-box').append('<div class="content" id="products-box">' +
                            '<div class="col-lg-3">' +
                            i + '.<img src="' + item.image + '">' +
                            'Product:' + item.name +
                            '</div>' +
                            '</div>');
                    });
                }
            });
        }
    </script>
@endsection
