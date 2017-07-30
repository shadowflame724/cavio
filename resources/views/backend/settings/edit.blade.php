@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.settings.management') . ' | ' . trans('labels.backend.access.settings.edit'))
@section('page-header')
    <h1>
        {{ trans('labels.backend.access.settings.management') }}
        <small>{{ trans('labels.backend.access.settings.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($settings, ['route' => ['admin.settings.update', $settings], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-settings', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.settings.edit') }}</h3>
        </div><!-- /.box-header -->


        <div class="box-body">

            <div class="form-group">
                {{ Form::label('soc_links', trans('validation.attributes.backend.access.settings.soc_links'), ['class' => 'col-lg-2 control-label']) }}
                <div class="btn btn-box-tool" id="add_soc_links"><i class="fa fa-plus"></i></div>

                <div class="col-lg-9" id="soc_links">
                    @php($keySoc=0)
                        @if($socLinksArr == null)
                            <div class="input-group">
                                <span class="input-group-addon">www.</span>
                                {{ Form::text('soc_links['.$keySoc.']', null, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                                <span class="input-group-addon remove-soc"><i class="fa fa-times"></i></span>
                            </div>
                        @else
                            @foreach($socLinksArr as $socLink)
                                <div class="input-group">
                                    <span class="input-group-addon">www.</span>
                                    {{ Form::text('soc_links['.$keySoc.']', $socLink, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                                    <span class="input-group-addon remove-soc"><i class="fa fa-times"></i></span>
                                </div>
                                @php($keySoc++)
                                    @endforeach
                                    @endif

                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('discount_data', trans('validation.attributes.backend.access.settings.discount_data'), ['class' => 'col-lg-2 control-label']) }}
                <div class="btn btn-box-tool" id="add_discount_data"><i class="fa fa-plus"></i></div>
                <div class="col-lg-9" id="discount_data">
                    @php($key=0)
                        @if($discountDataArr == null)
                            <div class="input-group">
                                <span class="input-group-addon">From</span>
                                <input name="discount_data[{{$key}}][from]" type="text" class="form-control" required
                                       number/>
                                <span class="input-group-addon" style="border-left: 0; border-right: 0;">to</span>
                                <input name="discount_data[{{$key}}][to]" type="text" class="form-control" required
                                       number/>
                                <span class="input-group-addon" style="border-left: 0; border-right: 0;">=</span>
                                <input name="discount_data[{{$key}}][equal]" type="text" class="form-control" required
                                       number/>
                                <span class="input-group-addon" style="border-left: 0;">%</span>
                                <span class="input-group-addon remove-discount"><i class="fa fa-times"></i></span>
                            </div>
                        @else
                            @foreach($discountDataArr as $discountData)
                                <div class="input-group">
                                    <span class="input-group-addon">From</span>
                                    <input name="discount_data[{{$key}}][from]" value="{{ $discountData->from }}"
                                           type="text" class="form-control" required number/>
                                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">to</span>
                                    <input name="discount_data[{{$key}}][to]" value="{{ $discountData->to }}"
                                           type="text" class="form-control" required number/>
                                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">=</span>
                                    <input name="discount_data[{{$key}}][equal]" value="{{ $discountData->equal }}"
                                           type="text" class="form-control" required number/>
                                    <span class="input-group-addon" style="border-left: 0;">%</span>
                                    <span class="input-group-addon remove-discount"><i class="fa fa-times"></i></span>
                                </div>
                                @php($key++)
                                    @endforeach
                                    @endif
                </div><!--col-lg-10-->
                <div class="col-lg-1">
                </div>
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('koef_data', trans('validation.attributes.backend.access.settings.koef_data'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <input name="koef_data" value="@if($koefData != null){{ $koefData }}@endif" type="text"
                           class="form-control" required number/></div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('vat_data', trans('validation.attributes.backend.access.settings.vat_data'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <div class="input-group">
                        <input name="vat_data" value="@if($vatData != null){{ $vatData }}@endif" type="text"
                               class="form-control" required number/>
                        <span class="input-group-addon" style="border-left: 0;">%</span>
                    </div>
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('admin_comment', trans('validation.attributes.backend.admin_comment.comment'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('admin_comment', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div>
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Settings') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection

@section('after-scripts')
    <script>
        function removeSoc() {
            $('.remove-soc:not(:first)').each(function () {
                $(this).on('click', function () {
                    $(this).parent().remove();
                })
            })
        }

        function removeDiscount() {
            $('.remove-discount:not(:first)').each(function () {
                $(this).on('click', function () {
                    $(this).parent().remove();
                })
            })
        }

        var countSocLinks = {{$keySoc}};
        $('#add_soc_links').on('click', function () {
            countSocLinks++;
            $('#soc_links').append('<div class="input-group">' +
                '<span class="input-group-addon">www.</span>' +
                '<input name="soc_links[' + countSocLinks + ']" type="text" class="form-control"/>' +
                '<span class="input-group-addon remove-soc"><i class="fa fa-times"></i></span>' +
                '</div>');
            removeSoc();
        });
        var countDiscount = {{$key}};
        $('#add_discount_data').on('click', function () {
            countDiscount++;
            $('#discount_data').append('<div class="input-group">' +
                '<span class="input-group-addon">From</span>' +
                '<input name="discount_data[' + countDiscount + '][from]" type="text" class="form-control"/>' +
                '<span class="input-group-addon" style="border-left: 0; border-right: 0;">to</span>' +
                '<input name="discount_data[' + countDiscount + '][to]" type="text" class="form-control"/>' +
                '<span class="input-group-addon" style="border-left: 0; border-right: 0;">=</span>' +
                '<input name="discount_data[' + countDiscount + '][equal]" type="text" class="form-control"/>' +
                '<span class="input-group-addon" style="border-left: 0;">%</span>' +
                '<span class="input-group-addon remove-discount"><i class="fa fa-times"></i></span>' +
                '</div>');
            removeDiscount();
        });

        removeSoc();
        removeDiscount();

    </script>
@endsection