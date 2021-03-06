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

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab"
                                                      data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="box-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="form-group">
                        {{ Form::label('news_types', trans('validation.attributes.backend.access.settings.news_types'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10" id="soc_links">
                            <div class="input-group">
                                <span class="input-group-addon">1</span>
                                {{ Form::text('news_types[0][name]', $newsTypesArr[0]->name, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">2</span>
                                {{ Form::text('news_types[1][name]', $newsTypesArr[1]->name, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">3</span>
                                {{ Form::text('news_types[2][name]', $newsTypesArr[2]->name, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">4</span>
                                {{ Form::text('news_types[3][name]', $newsTypesArr[3]->name, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">5</span>
                                {{ Form::text('news_types[4][name]', $newsTypesArr[4]->name, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="form-group">
                        {{ Form::label('news_types', trans('validation.attributes.backend.access.settings.news_types_ru'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10" id="soc_links">
                            <div class="input-group">
                                <span class="input-group-addon">1</span>
                                {{ Form::text('news_types[0][name_ru]', $newsTypesArr[0]->name_ru, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">2</span>
                                {{ Form::text('news_types[1][name_ru]', $newsTypesArr[1]->name_ru, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">3</span>
                                {{ Form::text('news_types[2][name_ru]', $newsTypesArr[2]->name_ru, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">4</span>
                                {{ Form::text('news_types[3][name_ru]', $newsTypesArr[3]->name_ru, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">5</span>
                                {{ Form::text('news_types[4][name_ru]', $newsTypesArr[4]->name_ru, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="form-group">
                        {{ Form::label('news_types', trans('validation.attributes.backend.access.settings.news_types_it'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10" id="soc_links">
                            <div class="input-group">
                                <span class="input-group-addon">1</span>
                                {{ Form::text('news_types[0][name_it]', $newsTypesArr[0]->name_it, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">2</span>
                                {{ Form::text('news_types[1][name_it]', $newsTypesArr[1]->name_it, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">3</span>
                                {{ Form::text('news_types[2][name_it]', $newsTypesArr[2]->name_it, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">4</span>
                                {{ Form::text('news_types[3][name_it]', $newsTypesArr[3]->name_it, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">5</span>
                                {{ Form::text('news_types[4][name_it]', $newsTypesArr[4]->name_it, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                            </div>
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('soc_links', trans('validation.attributes.backend.access.settings.soc_links'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-9" id="soc_links">

                    <div class="input-group">
                        <span class="input-group-addon">Facebook</span>
                        {{ Form::text('soc_links[fb]', $socLinksArr->fb, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Youtube</span>
                        {{ Form::text('soc_links[youtube]', $socLinksArr->youtube, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Instagram</span>
                        {{ Form::text('soc_links[instagram]', $socLinksArr->instagram, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Pinterest</span>
                        {{ Form::text('soc_links[pinterest]', $socLinksArr->pinterest, ['class' => 'form-control',  'autofocus' => 'autofocus']) }}
                    </div>

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

        function removeDiscount() {
            $('.remove-discount:not(:first)').each(function () {
                $(this).on('click', function () {
                    $(this).parent().remove();
                })
            })
        }

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

        removeDiscount();

    </script>
@endsection