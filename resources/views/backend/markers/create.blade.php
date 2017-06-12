@extends ('backend.layouts.collection_app')

@section ('title', trans('labels.backend.access.marker.management') . ' | ' . trans('labels.backend.access.marker.edit'))

@section('page-header')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" media="screen">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script type="text/javascript" src="https://unpkg.com/jquery-mousewheel@3.1.13"></script>
    {{ Html::script('js/backend/collection/lib/hammer.min.js') }}
    <script type="text/javascript" src="https://unpkg.com/jquery-hammerjs@2.0.0"></script>
    {{ Html::script('js/backend/collection/lib/imgViewer.js') }}
    {{ Html::style('js/backend/collection/lib/imgNotes.css') }}
    {{ Html::script('js/backend/collection/lib/imgNotes.js') }}
    {{ Html::script('js/backend/collection/lib/printThis.js') }}



    {{ Html::style('css/backend/redactor/redactor.css') }}
    {{ Html::style('css/backend/cropit/cropit.css') }}
    {{ Html::style('css/backend/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/dropzone/basic.css') }}

    <h1>
        {{ trans('labels.backend.access.marker.management') }}
        <small>{{ trans('labels.backend.access.marker.create') }}
        </small>
    </h1>

@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.marker.create') }}</h3>
            <div class="box-tools pull-right">
                @include('backend.collection.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="form-group">
                <img id="image" src="/upload/images/{{$collection->image}}" width="100%"/><br/>

                <div class="col-lg-10">
                    <table cellspacing="0" cellpadding="0" border="0" style="width: 100%; min-width: 320px;">
                        <tr>
                            <td style="padding: 10px">
                                <div align="center">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding: 10px">
                                <div id=txt align="center"></div>
                            </td>
                        </tr>
                    </table>
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ Form::submit("Clear", ['id' => "clear", 'class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit("Export", ['id' => "export", 'class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

@endsection

@section('after-scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function ($) {
            var notes = {!! $markers !!};

            $(window).load(function () {
//
// Hack to get visibility of summernote link and picture dialogs
//
                $('<style />', {text: '.modal-backdrop.in {display: none;}'}).appendTo("head");

                var $img = $("#image").imgNotes({
                    onEdit: function (ev, elem) {
                        var $elem = $(elem);
                        $('#NoteDialog').remove();
                        return $('<div id="NoteDialog"></div>').dialog({
                            title: "Note Editor",
                            resizable: false,
                            modal: true,
                            height: "400",
                            width: "450",
                            position: {my: "left bottom", at: "right top", of: elem},
                            buttons: {
                                "Save": function () {
//										var txt = $('textarea', this).val();
                                    $elem.data("note").note = $(this).summernote('code');
                                    $(this).summernote('destroy');
                                    $(this).dialog("close");
                                },
                                "Delete": function () {
                                    $elem.trigger("remove");
                                    $(this).summernote('destroy');
                                    $(this).dialog("close");
                                },
                                Cancel: function () {
                                    $(this).summernote('destroy');
                                    $(this).dialog("close");
                                }
                            },
                            open: function () {
                                $(this).summernote({
                                    toolbar: [
                                        ['all', ['style', 'bold', 'italic', 'link']]
                                    ]
                                });
                                $(this).summernote('code', $elem.data("note").note);

                            }
                        });
                    }
                });

                $img.imgNotes("import", notes);

                var $export = $("#export");
                $export.on("click", function () {
                    var $table = $("<table/>").addClass("gridtable");
                    var notes = $img.imgNotes('export');
                    $table.append("<th>X</th><th>Y</th><th>NOTE</th>");
                    $.each(notes, function (index, item) {

                        $table.append("<tr><td>" + item.x + "</td><td>" + item.y + "</td><td>" + item.note + "</td></tr>");
                    });
                    $('#txt').html($table);
                    $.post('{{route('admin.collection.marker.store', ['collection' => $collection])}}',
                        {
                            notes: notes
                        },
                        function(data, status){
                            alert("Data: " + data + "\nStatus: " + status);
                        });
                });

                var $clear = $("#clear");
                $clear.on("click", function () {
                    $img.imgNotes('clear');
                });
            });
        })(jQuery);
    </script>
@endsection

