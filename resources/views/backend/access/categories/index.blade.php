@extends ('backend.layouts.app')

@section ('title', 'Category management'))

@section('after-styles')
@endsection

@section('page-header')
    <h1>Category management</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Category management</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.category-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div id="cat_tree">
                <ul></ul>
            </div>
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
            {!! history()->renderType('Category') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('after-scripts')
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js") }}
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js") }}
    {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css") }}
    <script>
        $(function () {
            $('#cat_tree').jstree({
                'core': {
                    'data': {!!  $categoryList !!}
                },
                "contextmenu": {
                    "items": function (data) {
                        var tree = $("#cat_tree").jstree(true);
                        return {
                            "Create": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Create",
                                "action": function (obj) {
                                    data = tree.create_node(data);
                                    tree.edit(data);
                                    var id = obj.reference.prevObject.selector.slice(1);
                                    window.location = window.location.href + "/create/" +id;
                                }
                            },
                            "Edit": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Edit",
                                "action": function (obj) {
                                    tree.edit(data);
                                    var id = obj.reference.prevObject.selector.slice(1);
                                    window.location = window.location.href + "/edit/" +id;
                                }
                            },
                            "Remove": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Remove",
                                "action": function (obj) {
                                    tree.delete_node(data);
                                    var id = obj.reference.prevObject.selector.slice(1);
                                    $.ajax(window.location.href + "/delete/" +id);
                                }
                            }
                        };
                    }
                },
                "plugins": ["contextmenu", "wholerow"]
            });
        });
    </script>
@endsection
