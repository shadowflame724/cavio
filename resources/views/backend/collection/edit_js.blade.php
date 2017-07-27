<script>
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

    $('.carousel').carousel({
        interval: 200000
    });


    var $sortableList = [];

    function movePhoto() {
        $('.photo.active:not(:first)').each(function (key, el) {
            $sortableList[key] = Sortable.create(el, {
                onEnd: function (/**Event*/evt) {
                    var colZonHidden = '';
                    var colZonPhotos = $(el).children().slice(1);
                    colZonPhotos.each(function () {
                        colZonHidden += $(this).find('img').data().content;
                    });
                    $(el).children()[0].value = colZonHidden;
                }
            });
        });
    }

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

    var myDropzone = [];
    var inp;
    $("#dz_collection").dropzone({
        url: "{{route('admin.file.upload.collection')}}",
        maxFiles: 10,
        headers: {
            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
        },
        success: function (file, res) {
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
                if ($('.photo').hasClass('active')) {
                    $('#original').replaceWith('<img id="original" class="add_photo" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '">');
                    $('#horizontal').replaceWith('<img id="horizontal" class="add_photo" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">');
                    $('#thumb').replaceWith('<img id="thumb" class="add_photo" src="/upload/tmp/collection/thumb/' + res['success']['imgName'] + '">');
                } else {
                    $('.photo').append('<div class="photo-one-bl">' +
                        '<ul class="nav nav-tabs" role="tablist">' +
                        '<li role="presentation" class="active"><a href="#originalTab" aria-controls="originalTab" role="tab" data-toggle="tab">Original</a></li>' +
                        '<li role="presentation"><a href="#horizontalTab" aria-controls="horizontalTab" role="tab" data-toggle="tab">Horizontal</a></li>' +
                        '<li role="presentation"><a href="#thumbTab" aria-controls="thumbTab" role="tab" data-toggle="tab">Thumb</a></li>' +
                        '</ul>' +
                        '<div class="tab-content">' +
                        '<div role="tabpanel" class="tab-pane fade in active" id="originalTab">' +
                        '<img id="original" class="add_photo" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '" alt="" data-content="' + res['success']['imgName'] + '">' +
                        '</div>' +
                        '<div role="tabpanel" class="tab-pane fade" id="horizontalTab">' +
                        '<img id="horizontal" class="add_photo" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '" alt="" data-content="' + res['success']['imgName'] + '">' +
                        '</div>' +
                        '<div role="tabpanel" class="tab-pane fade" id="thumbTab">' +
                        '<img id="thumb" class="add_photo" src="/upload/tmp/collection/thumb/' + res['success']['imgName'] + '" alt="" data-content="' + res['success']['imgName'] + '">' +
                        '</div>' +
                        '</div>' +
                        '</>' +
                        '<div class="cropperButtons">' +
                        '<label class="btn btn-primary">' +
                        '<input type="radio" class="sr-only" name="collectionHorizontal" value="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">' +
                        '<span class="docs-tooltip" data-toggle="tooltip" title="">' +
                        'Horizontal</span></label>' +
                        '<label class="btn btn-primary">' +
                        '<input type="radio" class="sr-only"  name="collectionThumb" value="/upload/tmp/collection/thumb/' + res['success']['imgName'] + '">' +
                        '<span class="docs-tooltip" data-toggle="tooltip" title="">' +
                        'Thumb</span></label>' +
                        '</div>');
                    $('.photo').addClass('active');
                }

                $('#collection-hidden').val(res['success']['imgName']);
                croppPhoto();

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
                text: '{{trans('validation.attributes.backend.access.image.error.text')}} ' + '' + (xhr ? default_error : errorMessage),
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: 'ОК',
                closeOnConfirm: true
            });
            self.removeFile(file);
        }
    });

    $('.dropzone:not(:first)').each(function (key, el) {
        inp = $('input#zones\\[' + key + '\\]\\[photo\\]');
        myDropzone[key] = new Dropzone($(".dropzone:not(:first)")[key], {
                uploadMultiple: true,
                parallelUploads: 5,
                dictDefaultMessage: "Drop files here",
                url: "{{route('admin.file.upload.collection-zone')}}",
                maxFiles: 30,
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                },
                processingmultiple: function () {
                    swal({
                        title: 'Uploading...',
                        text: 'Please wait.',
                        imageUrl: '/img/backend/ajax-loader.gif',
                        imageWidth: 400,
                        imageHeight: 200,
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    })
                },
                successmultiple: function (file, res) {
                    this.removeFile(file);
                    if (res[0]['error']) {
                        swal({
                            title: res['error']['title'],
                            text: res['error']['text'],
                            type: "warning",
                            confirmButtonColor: "#DD6B55 ",
                            confirmButtonText: 'Ok',
                            closeOnConfirm: true
                        });

                    } else {
                        var hidden = '';
                        inp = $('.photo').eq(key + 1).find(":hidden");
                        res.forEach(function (item, i, res) {
                            $('.photo').eq(key + 1).append('<div class="photo-one-bl">' +
                                '<div id="dlt_photo" class="btn glyphicon glyphicon-remove dlt_photo"></div>' +
                                '<img class="colZon_photo" src="/upload/tmp/zone/original/' + item.success.imgName + '" data-content="' + item.success.imgName + ',' + '">' +
                                '<div class="cropperButtons">' +
                                '<label class="btn btn-primary">' +
                                '<input type="radio" class="sr-only horizontal" name="zoneHorizontal" value="/upload/tmp/zone/horizontal/' + item.success.imgName + '"">' +
                                '<span class="docs-tooltip" data-toggle="tooltip" title="">' +
                                'Horizontal</span></label>' +
                                '<label class="btn btn-primary">' +
                                '<input type="radio" class="sr-only thumb" name="zoneThumb" value="/upload/tmp/zone/thumb/' + item.success.imgName + '">' +
                                '<span class="docs-tooltip" data-toggle="tooltip" title="">' +
                                'Thumb</span></label>' +
                                '</div>' +
                                '</div>');
                            hidden += item.success.imgName + ',';
                        });
                        $('.photo').eq(key + 1).addClass('active');
                        inp.val(inp.val() + hidden);
                        swal({
                            title: res[0]['success']['title'],
                            text: res[0]['success']['text'],
                            type: "success",
                            confirmButtonColor: "#DD6B55 ",
                            confirmButtonText: 'Ок',
                            closeOnConfirm: true
                        });
                        deletePhoto();
                        croppPhoto();
                        movePhoto();
                    }
                },
                error: function (file, errorMessage, xhr) {
                    var self = this,
                        default_error = '{{trans('validation.attributes.backend.access.image.error.default_error')}}';
                    swal({
                        title: '{{trans('validation.attributes.backend.access.image.error.title')}}',
                        text: '{{trans('validation.attributes.backend.access.image.error.text')}} ' + '' + (xhr ? default_error : errorMessage),
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
    });

    function croppPhoto() {
        $('.cropperButtons').each(function (index, el) {
            $(el).find('input').on('click', function () {
                var path = $(this).val();
                var original = $(this).parents('.photo-one-bl').find('img')[0];
                console.log('original', original);
                var width;
                var height;
                var asepectRatio;
                switch ($(this)[0].name) {
                    case 'collectionHorizontal':
                        asepectRatio = 4.444444444;
                        width = 1600;
                        height = 360;
                        break;
                    case 'collectionThumb':
                        asepectRatio = 1.432432432;
                        width = 530;
                        height = 370;
                        break;
                    case 'zoneHorizontal':
                        asepectRatio = 4.444444444;
                        width = 1600;
                        height = 360;
                        break;
                    case 'zoneThumb':
                        asepectRatio = 0.75;
                        width = 480;
                        height = 640;
                        break;
                }
                var img = $(original).clone();
                console.log('before=', path);
                var pathOriginal = path.replace(/horizontal|thumb/gi, 'original');
                var $cropperModal = $(modalTemplate);
                var $uploadCrop = $cropperModal.find('.crop-upload');
                $cropperModal.find('.image-container').html(img[0]);
                cropper = new Cropper(img[0], {
                    preview: '.image-preview',
                    autoCropArea: 1,
                    aspectRatio: asepectRatio,
                    movable: false,
                    zoomOnWheel: false,
                    viewMode: 3,
                    minContainerHeight: 320,
                    minContainerWidth: 568,
                    crop: function (e) {
                        $('input#dataWidth').val(e.detail.width);
                        $('input#dataHeight').val(e.detail.height);
                    }
                });

                $cropperModal.modal('show');
                $uploadCrop.on('click', function () {
                    var formData = new FormData();
                    var blob = cropper.getCroppedCanvas({"width": width, "height": height}).toDataURL('image/jpg');
                    var newFile = dataURItoBlob(blob);
                    newFile.cropped = true;
                    newFile.name = img.data().content;
                    $cropperModal.modal('hide');
                    formData.append('croppedImage', newFile);
                    formData.append('name', path);
                    console.log(pathOriginal);
                    $.ajax('{{route('admin.file.upload.cropped')}}', {
                        headers: {
                            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                        },
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            swal({
                                title: res['success']['title'],
                                text: res['success']['text'],
                                type: "success",
                                confirmButtonColor: "#DD6B55 ",
                                confirmButtonText: 'Ок',
                                closeOnConfirm: true
                            });
                            d = new Date();
                            $("img[src$='" + path + "']").attr("src", path + "?" + d.getTime());

                        },
                        error: function (res) {

                            swal({
                                title: '{{trans('validation.attributes.backend.access.image.error.title')}}',
                                text: '{{trans('validation.attributes.backend.access.image.error.text')}} ',
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: 'ОК',
                                closeOnConfirm: true
                            });
                        }
                    });
                });
            })
        });
    }

    Dropzone.autoDiscover = false;

    function deletePhoto() {
        $('.dlt_photo').each(function (index) {
            $(this).on('click', function () {
                value = $(this).parent().find('img').data().content;
                hidden = $(this).parent().parent().find(":hidden").val();
                $(this).parent().parent().find(":hidden").val(hidden.replace(value, ''));
                $(this).parent().remove();
            });
        });
    }

    deletePhoto();
    croppPhoto();
    movePhoto();
</script>