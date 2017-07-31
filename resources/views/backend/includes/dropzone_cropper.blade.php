<script>
//    if (document.getElementById('add_photo').getAttribute('src')) {
//        var pathname = document.getElementById('add_photo').getAttribute('src');
//        var leafname = pathname.split('\\').pop().split('/').pop();
//        $('input#photo').val(leafname);
//    }
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
        for(var i = 0; i < arr.length; i++) {
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

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            url: "{{route('admin.file.upload')}}",
            maxFiles: 1,
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
                        $('.photo >img').replaceWith('<img id="dz_photo" src="/' + res['success']['path'] + '">');
                    } else {
                        $('.photo').append('<img id="dz_photo" src="/' + res['success']['path'] + '">');
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
    $('.dlt_photo').on('click', function () {
        $('.photo>img').remove();
        $('.photo').removeClass('active');
        $('input#photo').val('');
    });


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
    });
</script>