@extends ('backend.layouts.app')

@section ('name', trans('labels.backend.access.sort.management'))

@section('after-styles')
    <style>
        .product-photo {
            width: 100px;
        }
    </style>
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.sort.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-name">{{ trans('labels.backend.access.sort.management') }}</h3>

            <div class="box-tools pull-right">
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                @if($type == 'collections')
                    {{ Form::label('type', trans('validation.attributes.backend.access.sort.type_collection'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <select name="collection" class="form-control" id="collectionSelect">
                            <option selected disabled value="">Choice collection</option>
                        @foreach($collections as $key => $collection)
                                <option value="{{ $collection->id }}">{{ $collection->title }}</option>
                            @endforeach
                        </select>
                    </div><!--col-lg-10-->
                @elseif($type == 'categories')

                    {{ Form::label('type', trans('validation.attributes.backend.access.sort.type_category'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select name="category" class="form-control" id="categorySelect">
                            <option selected disabled value="">Choice category</option>
                        @foreach($categories as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div><!--col-lg-10-->
                @elseif($type == 'zones')

                    {{ Form::label('type', trans('validation.attributes.backend.access.sort.type_collectionZone'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select name="collectionZone" class="form-control" id="collectionZoneSelect">
                            <option selected disabled value="">Choice zone</option>
                        @foreach($collections as $key => $collection)
                                <optgroup label="{{ $collection->title }}">
                                    @foreach($collection->collectionZones as $key => $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div><!--col-lg-10-->
                @endif
            </div><!--form control-->

            <div class="box-body" id="products-box">

            </div>
        </div><!-- /.box-body -->
    </div><!--box-->
    <div class="box box-success">
        <div class="box-body">
            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['id' => 'submit-all', 'class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

@endsection
@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/Sortable/1.6.0/Sortable.min.js') }}

    <script>

        $('#collectionSelect').on('change', function (e) {
            var url = '{{ route("admin.sort.collection.show", '')}}' + '/' + e.target.value;
            $('#products-box').children().remove();
            getProducts(url);
        });
        $('#categorySelect').on('change', function (e) {
            var url = '{{ route("admin.sort.category.show", '')}}' + '/' + e.target.value;
            $('#products-box').children().remove();
            getProducts(url);
        });
        $('#collectionZoneSelect').on('change', function (e) {
            var url = '{{ route("admin.sort.collection-zone.show", '')}}' + '/' + e.target.value;
            $('#products-box').children().remove();
            getProducts(url);
        });

        function getProducts(url) {
            $.ajax({
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                },
                type: "POST",
                url: url,
                success: function (data) {
                    data.products.forEach(function (item, i) {

                        $('#products-box').append('<div class="product-box col-lg-2" data-id="' + item.id + '">' +
                            '<b>' + item.code + '</b><br>' +
                            '<b>' + item.name + '</b><br>' +
                            '<img class="product-photo" src="/upload/products/' + JSON.parse(item.main_photo_data).photos + '">' +
                            '</div>');
                    });
                    $('#products-box').append(
                        '<div class="pull-right">' +
                        '<form action="{{ route('admin.sort.update') }}" method="post" id="sort-form">' +
                        '<input type="text" name="type" hidden value ="' + data.type + '">' +
                        '<input type="text" name="id" hidden value ="' + data.id + '">' +
                        '<input type="hidden" name="_token" value="' + document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value + '">' +
                        '<input type="text" id="product_ids" name="product_ids" hidden value ="' + data.product_ids + '">' +
                        '</form>'
                    );
                    moveProduct();
                    update();

                },
                error: function (res) {
                    swal({
                        title: "{{trans('validation.attributes.backend.access.sort.swal.title')}}",
                        text: "{{trans('validation.attributes.backend.access.sort.swal.text')}}",
                        type: "warning",
                        confirmButtonColor: "#DD6B55"
                    })
                }
            });
        }


        function moveProduct() {
            var sortableList = new Sortable(document.getElementById('products-box'), {
                onEnd: function (/**Event*/evt) {
                    var index = sortableList.toArray().indexOf('2fj');
                    clean = sortableList.toArray().splice(0, index);
                    var json = JSON.stringify(clean);
                    $('#product_ids').val(json.replace(/[\[\]"]+/g, ''));
                }
            });

        }

        function update() {
            $('#submit-all').on('click', function () {
                $('#sort-form').submit();
            })
        }

    </script>
@endsection
