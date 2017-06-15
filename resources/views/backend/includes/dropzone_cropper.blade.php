<script>
    var cropper;
    var modalTemplate = '' +
        '<div class="modal fade" tabindex="-1" role="dialog">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '<h4 class="modal-title">Crop Image</h4>' +
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
        var byteString = atob(dataURI.split(',')[1]);
        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], {type: 'image/jpeg'});
    }

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            dictDefaultMessage: "",
            url: "{{route('admin.file.upload')}}",
            maxFiles: 1,
            headers: {
                'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value
            },
            success: function (file, res) {
                console.log()
                this.removeFile(file);

                if (res['error']) {
                    console.log(res['error']);
                    swal({
                        title: res['error']['title'],
                        text: res['error']['text'],
                        type: "warning",
                        confirmButtonColor: "#DD6B55 ",
                        confirmButtonText: 'Ok',
                        closeOnConfirm: true
                    });

                } else {
                    console.log(res['success']['path']);
                    console.log(res['success']['imgName']);
                    if ($('.photo').hasClass('active')) {
                        $('.photo >img').replaceWith('<img src="/' + res['success']['path'] + '">');
                    } else {
                        $('.photo').append('<img src="/' + res['success']['path'] + '">');
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
            cropper = new Cropper($img[0], {
                aspectRatio: 16 / 9,
                preview: '.image-preview',
                autoCropArea: 1,
                movable: false,
                cropBoxResizable: true,
                minContainerHeight: 320,
                minContainerWidth: 568
            });
        };

        reader.readAsDataURL(file);
        $cropperModal.modal('show');
        $uploadCrop.on('click', function () {
            var blob = cropper.getCroppedCanvas().toDataURL();
            var newFile = dataURItoBlob(blob);
            newFile.cropped = true;
            newFile.name = cachedFilename;
            myDropzone.addFile(newFile);
            myDropzone.processQueue();
            console.log(newFile);
            $cropperModal.modal('hide');
        });
    });
</script>