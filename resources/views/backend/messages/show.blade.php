@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.message.management') . ' | ' . trans('labels.backend.access.message.show'))

@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}
    <style>
        .jumbotron {
            word-wrap:break-word;
        }
    </style>

    <h1>
        {{ trans('labels.backend.access.message.management') }}
        <small>{{ trans('labels.backend.access.message.show') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.message.show') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <h3>{{ trans('labels.backend.access.message.from') }}: {!! $message->name !!}</h3>

                    {{ trans('labels.backend.access.message.date') }}: {{ $message->created_at->diffForHumans() }}

                    <div class="jumbotron col-lg-12" style="margin-bottom:0px">
                            <p>{{ $message->message }}</p>
                    </div>
                </div>

            </div><!--form control-->
        </div>
    </div><!-- /.box-body -->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.messages.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->


            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/redactor/redactor.js') }}
@endsection