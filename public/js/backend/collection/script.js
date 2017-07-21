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
    '<label class="btn btn-primary">' +
    '<input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">' +
    '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Main page banner">' +
    '16:9</span></label>' +
    '<label class="btn btn-primary">' +
    '<input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">' +
    '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Main collection photo">' +
    '3:4</span></label>' +
    '<label class="btn btn-primary">' +
    '<input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">' +
    '<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Long Col-zone photo">' +
    '400:91</span></label>' +
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
        console.log('response', res, 'file', file);

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
                $('#original').replaceWith('<img id="original" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '">');
                $('#horizontal').replaceWith('<img id="horizontal" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">');
                $('#vertical').replaceWith('<img id="vertical" src="/upload/tmp/collection/vertical/' + res['success']['imgName'] + '">');

            } else {
                $('.photo').append('<img id="original" src="/upload/tmp/collection/original/' + res['success']['imgName'] + '">');
                $('.photo').append('<img id="horizontal" src="/upload/tmp/collection/horizontal/' + res['success']['imgName'] + '">');
                $('.photo').append('<img id="vertical" src="/upload/tmp/collection/vertical/' + res['success']['imgName'] + '">');
                $('.photo').addClass('active');
            }

            $('input#photo').val(res['success']['imgName']);
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
        console.log(errorMessage, xhr);
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
});

$('.dropzone:not(:first)').each(function (key, el) {
    inp = $('input#zones\\[' + key + '\\]\\[photo\\]');
    myDropzone[key] = new Dropzone($(".dropzone:not(:first)")[key], {
            uploadMultiple: true,
            dictDefaultMessage: "Drop files here",
            url: "{{route('admin.file.upload.collection-zone')}}",
            maxFiles: 20,
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
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
                    console.log(res);
                    var hidden = '';
                    inp = $('.photo').eq(key + 1).find(":hidden");
                    res.forEach(function (item, i, res) {
                        $('.photo').eq(key + 1).append('<div id="dlt_photo" class="btn glyphicon glyphicon-remove dlt_photo"></div>');
                        $('.photo').eq(key + 1).append('<img src="/upload/tmp/' + item.success.imgName + '" data-content="'+item.success.imgName+'">');
                        hidden += item.success.imgName + ',';
                    });
                    $('.photo').eq(key + 1).addClass('active');
                    inp.val(inp.val() + hidden);
                    console.log('inp.val=', inp.val());
                    swal({
                        title: res[0]['success']['title'],
                        text: res[0]['success']['text'],
                        type: "success",
                        confirmButtonColor: "#DD6B55 ",
                        confirmButtonText: 'Ок',
                        closeOnConfirm: true
                    });
                    $('.dlt_photo').each(function (index) {
                        $(this).on('click', function () {
                            value = $(this).next('img').data().content;
                            hidden = $(this).parent().find(":hidden").val();
                            $(this).parent().find(":hidden").val(hidden.replace(value, ''));
                            $(this).next('img').remove();
                            $(this).remove();
                            if ($(this).parent().find('img').length == 0) {
                                console.log('no more img');
                                $(this).parent().removeClass('active');
                            }
                        });
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


});

$('img').each(function (index) {
    $(this).on('click', function () {
        console.log('click', this);
        var original = $(this);
        var img = $(this).clone();
        var $cropperModal = $(modalTemplate);
        var $uploadCrop = $cropperModal.find('.crop-upload');
        $cropperModal.find('.image-container').html(img[0]);
        cropper = new Cropper(img[0], {
            preview: '.image-preview',
            autoCropArea: 1,
            movable: false,
            cropBoxResizable: true,
            minContainerHeight: 320,
            minContainerWidth: 568,
            crop: function (e) {
                $('input#dataWidth').val(e.detail.width);
                $('input#dataHeight').val(e.detail.height);
                $('#aspectRatio1').on('click', function () {
                    cropper.setAspectRatio(1.7777777777777777);
                });
                $('#aspectRatio2').on('click', function () {
                    cropper.setAspectRatio(0.75);
                });
                $('#aspectRatio3').on('click', function () {
                    cropper.setAspectRatio(4.3956044);
                });
            }
        });

        $cropperModal.modal('show');
        $uploadCrop.on('click', function () {
            var formData = new FormData();
            var blob = cropper.getCroppedCanvas().toDataURL('image/jpg');
            var newFile = dataURItoBlob(blob);
            newFile.cropped = true;
            newFile.name = img.data().content;
            $cropperModal.modal('hide');
            formData.append('croppedImage', newFile);
            formData.append('name', img.data().content);
            $.ajax('{{route('admin.file.upload.cropped')}}', {
                headers: {
                    'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
                },
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log('Upload success', res);
                    src = original[0].src;
                    d = new Date();
                    $(original).attr("src", src + "?" + d.getTime());
                },
                error: function (res) {
                    console.log('Upload error', res);
                }
            });
        });
    })
});
Dropzone.autoDiscover = false;
$('.dlt_photo').each(function (index) {
    $(this).on('click', function () {
        console.log('click');
        value = $(this).next('img').data().content;
        hidden = $(this).parent().find(":hidden").val();
        $(this).parent().find(":hidden").val(hidden.replace(value, ''));
        $(this).next('img').remove();
        if ($(this).parent().find('img').length == 0) {
            console.log('no more img');
            $(this).parent().removeClass('active');
        }
    });
});