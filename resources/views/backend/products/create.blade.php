@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.product.management') . ' | ' . trans('labels.backend.access.product.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/plugin/select2/select2.min.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection
@section('after-styles')
    {{--@include('backend.includes.dropzone_cropper_css')--}}
    <style>
        .sweet-alert {
            z-index: 999;
        }

        #add_photo {
            max-width: 650px;
        }

        .add_photo {
            max-width: 650px;
        }

        .dz_photo {
            max-width: 650px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .photo {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .dz-photo {
            margin: 30px 0 50px;
        }

        .photo.active {
            visibility: visible;
            max-width: 650px;
        }

        .dlt_photo {
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 25px;
        }

    </style>
@endsection
@section('page-header')
    <h1>
        {{ trans('labels.backend.access.product.management') }}
        <small>{{ trans('labels.backend.access.product.create') }}</small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.product.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.product.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.products.product-header-buttons')
            </div><!--box-tools pull-right-->
        </div>
        <div class="box-body">
            @include('backend.products._form')
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.product.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}


@endsection

@section('after-scripts')
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/select2/select2.full.min.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    <script type="text/javascript">
      $(document).ready(function() {
        var importData = {!! json_encode($importData) !!};
        console.info(importData);
        $(".select2").select2();
        $(".new-child select.select2,.new-photo select.select2").select2("destroy");

        var replIputs = function ($prnt,data) {
          $prnt.find('[data-type="replace-input"]').each(function (i, el) {
            var $inp = $(el);
            var name = $inp.attr('data-name');
            var dataVal = (typeof data[name] === 'object')? JSON.stringify(data[name]) : data[name];
            var inpVal = dataVal || '';
            $inp.val(inpVal);
            $inp.trigger('change');
          });
        };
        var childTemp = $('.new-child').html();
        var photoTemp = $('.new-photo').html();
        $('.new-child, .new-photo').remove();

        $('select.parent_code').on('change', function () {
          var _th = $(this);
          var val = _th.val();
          var isImportConfirm = false;
          var prntItem = importData[val] || false;
          if(confirm('Сделать импорт из PARENT_CODE: '+val)){
            isImportConfirm = true;
            $('.oneChild,.onePhoto').remove();
          }
          if(prntItem && isImportConfirm) {
            var $prntItem = $('[data-type="parent_item"]');
            //
            replIputs($prntItem, prntItem);
            //

            $.each(prntItem.childs, function (id,child) {
              var childKeyTemp = childTemp.replace(/child\[KEY]/g, 'child[' + id + ']');
              var $chOne = $('<div class="oneChild" />').html(childKeyTemp);
              var onChildId = $chOne.find('.panel-collapse').attr('id') + id;
              $chOne.find('.panel-collapse').addClass('in').attr('id', onChildId);
              $chOne.find('[data-toggle="collapse"]').removeClass('collapsed').attr('href', '#' + onChildId);
              //
              replIputs($chOne, child);
              //
              $('.child-after').after($chOne);

              var phKey = 0;
              $.each(child['photos'], function (phid,photo) {
                var photoKeyTemp = photoTemp.replace(/photo\[KEY]/g, 'photo[' + phKey + ']');
                var $phOne = $('<div class="onePhoto" />').html(photoKeyTemp);
                var onPhotoId = $phOne.find('.panel-collapse').attr('id') + id + '_' + phid;
                $phOne.find('.panel-collapse').addClass('in').attr('id', onPhotoId);
                $phOne.find('[data-toggle="collapse"]').removeClass('collapsed').attr('href', '#' + onPhotoId);
                //
                replIputs($phOne, photo);
                //

                $('.photo-after').after($phOne);
                phKey++;
//                console.info('photo: ',photo);
              });
            });
            setTimeout(function () {
                $('.onePhoto .select2').select2({
                  tags: true
                });
            }, 100);

          }

        });
        $('body')
          .on('click', '[data-type="reload-price"]', function () {
              var $prnt = $(this).closest('.panel-body');
              var pricesRow = $prnt.find('[data-type="prices-row"]');
              var priceTemp = pricesRow.find('.new-price').html();
              var dataFn = {!! json_encode($finishCodes) !!};
              var dataTs = {!! json_encode($tissueCodes) !!};

              var prvFn = false,
                uniqFn = false,
                prvTs = false,
                uniqTs = false;
              $prnt.find('[data-name="finish_ids"]').each(function (i,fn) {
                var _ids = $(fn).val().splice(',');
                $.each(_ids, function (i,_id) {
                    var val = dataFn[_id].short || false;
                    if(!prvFn) {
                      prvFn = val;
                      uniqFn = true;
                    }
                    if(prvFn !== val){
                      uniqFn = false;
                    }
                });
              });
              $prnt.find('[data-name="tissue_ids"]').each(function (i,ts) {
                var _ids = $(ts).val().splice(',');
                $.each(_ids, function (i,_id) {
                    var val = dataTs[_id].short || false;
                    if(!prvTs) {
                      prvTs = val;
                      uniqTs = true;
                    }
                    if(prvTs !== val){
                      uniqTs = false;
                    }
                });
              });

              $prnt.find('.onePrice').remove();
              var prKey = 0;
              $('.oneChild').each(function (i, ch) {
                var $el = $(ch);
                var code = $el.find('[data-name="code"]').val();
                var priceKeyTemp = priceTemp.replace(/\[price]\[KEY]/g, '[price][' + prKey + ']');
                var onePrice = $('<div class="onePrice" />').html(priceKeyTemp);
                // CHILD_CODE
                onePrice.find('[data-replace="child_code"]').html(code);
                onePrice.find('[data-replace="child_code_input"]').val(code);
                // цена
                var isPrice = false;
                if(uniqFn && uniqTs){ // если все оббивки и отделки имеют одинаковые типы
                  var dataPrices = JSON.parse($prnt.find('[data-name="prices"]').val());
                  var needPrice = dataPrices[prvTs][prvFn] || false;
    //              console.warn(needPrice,'<<',dataPrices,prvTs,prvFn);
                  if(needPrice) {
                    onePrice.find('[data-replace="def_price"]').val(needPrice);
                    onePrice.find('[data-replace="custom"]').prop('checked', false);
                    onePrice.find('[data-replace="price"]').attr('readonly', 'readonly').val(needPrice);
                    isPrice = true;
                  }
                }
                if(!isPrice){
                  onePrice.find('[data-replace="def_price"]').attr('readonly', 'readonly').val('');
                  onePrice.find('[data-replace="custom"]').prop('checked', true);
                  onePrice.find('[data-replace="price"]').removeAttr('readonly').val('');
                }
                onePrice.find('[data-replace="discount"]').val(0);

                pricesRow.append(onePrice);
                prKey++;
              });

          });
        $('body').on('change', '[data-type="custom_price_check"] input[type="checkbox"]', function () {
          var $prnt = $(this).closest('[data-type="custom_price_check"]');
          var is_ch = $(this).prop('checked');

          if (is_ch) {
            $prnt.prev().find('input').attr('readonly', 'readonly');
            $prnt.find('input').removeAttr('readonly');
          } else {
            $prnt.prev().find('input').removeAttr('readonly');
            $prnt.find('input').attr('readonly', 'readonly');
          }
        });

      });
    </script>
    @include('backend.products.partials._form_scripts')
    <script>
        $('.addPanel').click(function () {
            var x = $('.panels .panel').length + 1;
            var template = '<div class="panel panel-primary">';
            template += '<div class="panel-heading" role="tab">';
            template += '<h4 class="panel-title">';
            template += '<a data-toggle="collapse" href="#' + x + '" aria-expanded="false" aria-controls="collapseOne">Dimensions ' + x + '</a>';
            template += '<a id="removeSlide' + x + '" style="cursor: pointer" class="pull-right" data-toggle="tooltip" data-placement="top" title="Delete this"><i class="fa fa-lg fa-trash"></i></a>';
            template += '</h4></div>';
            template += '<div id="' + x + '" class="panel-collapse collapse" role="tabpanel"><div class="panel-body">';

            // length
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="length">length</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][length]" class="form-control">';
            template += '</div></div>';

            // width
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="width">width</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][width]" class="form-control">';
            template += '</div></div>';

            // height
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="height">height</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][height]" class="form-control">';
            template += '</div></div>';

            // mattress
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="mattress">mattress</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][mattress]" class="form-control">';
            template += '</div></div>';

            // weight
            template += '<div class="form-group">';
            template += '<label class="form-label col-md-2" for="height">weight</label>';
            template += '<div class="col-md-10">';
            template += '<input type="text" name="dimensions[' + x + '][weight]" class="form-control">';
            template += '</div></div>';

            // Close open tags
            template += '</div></div></div>';

            $('.panels').append(template);
            $('.fa-trash').each(function (index) {
                $(this).on("click", function () {
                    console.log(index);
                    $(this).parent().parent().parent().parent().remove();
                });
            });
        });

        var mimeType;
        var cropper;
        var modalTemplate = '' +
            '<div class="modal fade" tabindex="-1" role="dialog">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title">Crop Image</h4>' +
            '<div class="input-group input-group-sm">' +
            '<label class="input-group-addon" for="dataWidth">Width</label>' +
            '<input type="text" class="form-control" id="dataWidth" placeholder="Width">' +
            '<span class="input-group-addon">px</span>' +
            '</div>' +
            '<div class="input-group input-group-sm">' +
            '<label class="input-group-addon" for="dataHeight">Height</label>' +
            '<input type="text" class="form-control" id="dataHeight" placeholder="height">' +
            '<span class="input-group-addon">px</span>' +
            '</div>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="image-container"></div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary crop-upload">Upload</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '';

        // transform cropper dataURI output to a Blob which Dropzone accepts
        function dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);

            // create a view into the buffer
            var ia = new Uint8Array(ab);

            // set the bytes of the buffer to the correct values
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            // write the ArrayBuffer to a blob, and you're done
            var blob = new Blob([ab], {type: mimeString});
            return blob;
        }
        function dataURLtoMimeType(dataURL) {
            var BASE64_MARKER = ';base64,';
            var data;

            if (dataURL.indexOf(BASE64_MARKER) == -1) {
                var parts = dataURL.split(',');
                var contentType = parts[0].split(':')[1];
                data = decodeURIComponent(parts[1]);
            } else {
                var parts = dataURL.split(BASE64_MARKER);
                var contentType = parts[0].split(':')[1];
                var raw = window.atob(parts[1]);
                var rawLength = raw.length;

                data = new Uint8Array(rawLength);

                for (var i = 0; i < rawLength; ++i) {
                    data[i] = raw.charCodeAt(i);
                }
            }

            var arr = data.subarray(0, 4);
            var header = "";
            for (var i = 0; i < arr.length; i++) {
                header += arr[i].toString(16);
            }
            switch (header) {
                case "89504e47":
                    mimeType = "image/png";
                    break;
                case "47494638":
                    mimeType = "image/gif";
                    break;
                case "ffd8ffe0":
                case "ffd8ffe1":
                case "ffd8ffe2":
                    mimeType = "image/jpeg";
                    break;
                default:
                    mimeType = ""; // Or you can use the blob.type as fallback
                    break;
            }

            return mimeType;
        }

        var count = 0;

        if($('.dropzone').length){
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", {
                    autoProcessQueue: false,
                    url: "{{route('admin.file.upload.finish-tissue')}}",
                    maxFiles: 1,
                    headers: {
                        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                    },
                    success: function (file, res) {
                        var _ref = file.previewElement, error;
                        this.removeFile(file);

                        if (res['error']) {
                            swal({
                                title: res['error']['title'],
                                text: res['error']['text'],
                                type: "warning",
                                confirmButtonColor: "#DD6B55 ",
                                confirmButtonText: 'Ok',
                                closeOnConfirm: true
                            });

                        } else {
                            $('#photos').append('<div class="photo">' +
                                '<div class="btn glyphicon glyphicon-remove dlt_photo">' +
                                '</div><img id="images" class="dz_photo" src="/' + res['success']['path'] + '"></div>');
                            $('.photo').addClass('active');

                            $('form').append('<input id="images'+ count +'" name=\"images[]\" value=\"' + res['success']['imgName'] + '\" type=\"hidden\"/>');
                            count++;
                            swal({
                                title: res['success']['title'],
                                text: res['success']['text'],
                                type: "success",
                                confirmButtonColor: "#DD6B55 ",
                                confirmButtonText: 'Ок',
                                closeOnConfirm: true
                            });
                        }
                    },
                    error: function (file, errorMessage, xhr) {
                        var self = this,
                            default_error = '{{trans('validation.attributes.backend.access.image.error.default_error')}}';
                        swal({
                            title: '{{trans('validation.attributes.backend.access.image.error.title')}}',
                            text: '{{trans('validation.attributes.backend.access.image.error.text')}} ' + '\n' + (xhr ? default_error : errorMessage),
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: 'ОК',
                            closeOnConfirm: true
                        });
                        self.removeFile(file);
                    }
                }
            );
            myDropzone.on('thumbnail', function (file) {
            if (file.cropped) {
              return;
            }
            var cachedFilename = file.name;
            myDropzone.removeFile(file);

            var $cropperModal = $(modalTemplate);
            var $uploadCrop = $cropperModal.find('.crop-upload');
            var $img = $('<img />');
            var reader = new FileReader();
            reader.onloadend = function () {
              $cropperModal.find('.image-container').html($img);
              $img.attr('src', reader.result);
              mimeType = dataURLtoMimeType(reader.result);
              cropper = new Cropper($img[0], {
                preview: '.image-preview',
                autoCropArea: 1,
                movable: false,
                cropBoxResizable: true,
                minContainerHeight: 320,
                minContainerWidth: 568,
                crop: function (e) {
                  $('input#dataWidth').val(e.detail.width);
                  $('input#dataHeight').val(e.detail.height);
                }
              });
            };

            reader.readAsDataURL(file);
            $cropperModal.modal('show');
            $uploadCrop.on('click', function () {
              var blob = cropper.getCroppedCanvas().toDataURL(mimeType);
              var newFile = dataURItoBlob(blob);
              newFile.cropped = true;
              newFile.name = cachedFilename;
              myDropzone.addFile(newFile);
              myDropzone.processQueue();
              $cropperModal.modal('hide');
            });

            $('.dlt_photo').each(function (index) {
              $(this).on("click", function () {
                console.log(index);

                $(this).parent().remove();
                document.getElementById('images' + index).remove();
                count--;
              });
            });
          });
        }




    </script>
@endsection

