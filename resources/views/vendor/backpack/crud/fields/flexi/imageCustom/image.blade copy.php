<style>
    .hide {
        display: none;
    }

    .image .btn-group {
        margin-top: 10px;
    }

    img {
        max-width: 100%;
        /* This rule is very important, please do not ignore this! */
    }

    .img-container,
    .img-preview {
        width: 100%;
        text-align: center;
    }

    .img-preview {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .preview-lg {
        width: 263px;
        height: 148px;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>


    <div class="form-group col-sm-12" element="div">
        <nav class="navbar navbar-light bg-light mt-3">
            <span class="navbar-brand mb-0 h4">Property Photo</span>
        </nav>
    </div>
    <div class="form-group col-md-2 col-6 bp-image-full-preview property_image cropperImage"
        data-aspectRatio="0" data-crop="" data-field-name="image"
        data-init-function="bpFieldInitCropperImageFlexiElement" element="div">
        <div>
            <label>Front Side<span
                    class="rent-span-required text-danger">*<span></label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height"
                data-handle="previewArea" style="margin-bottom: 20px">
                <div style="background-color: #f3f3f3; height:100%">
                    <img data-handle="mainImage" src="">
                    <input type="hidden" data-handle="rotate" name="rotate_image"
                        value="0">
                    <input type="hidden" data-handle="operator" name="operator_image"
                        value="+">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*"
                    data-handle="uploadImage" class="hide">
                <input type="hidden" data-handle="hiddenImage" name="image"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-front.jpg">
            </div>
            <button class="btn btn-light btn-sm" data-handle="rotateLeft"
                type="button"><i class="la la-rotate-left"></i></button>
            <button class="btn btn-light btn-sm" data-handle="rotateRight"
                type="button"><i class="la la-rotate-right"></i></button>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>

    <div class="form-group col-md-2 col-6 bp-image-full-preview property_image_left_side cropperImage"
        data-aspectRatio="0" data-crop="" data-field-name="image_left_side"
        data-init-function="bpFieldInitCropperImageFlexiElement" element="div">
        <div>
            <label>Left Side</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height"
                data-handle="previewArea" style="margin-bottom: 20px">
                <div style="background-color: #f3f3f3; height:100%">
                    <img data-handle="mainImage" src="">
                    <input type="hidden" data-handle="rotate"
                        name="rotate_image_left_side" value="0">
                    <input type="hidden" data-handle="operator"
                        name="operator_image_left_side" value="+">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*"
                    data-handle="uploadImage" class="hide">
                <input type="hidden" data-handle="hiddenImage" name="image_left_side"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-left.jpg">
            </div>
            <button class="btn btn-light btn-sm" data-handle="rotateLeft"
                type="button"><i class="la la-rotate-left"></i></button>
            <button class="btn btn-light btn-sm" data-handle="rotateRight"
                type="button"><i class="la la-rotate-right"></i></button>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>

    <div class="form-group col-md-2 col-6 bp-image-full-preview property_image_right_side cropperImage"
        data-aspectRatio="0" data-crop="" data-field-name="image_right_side"
        data-init-function="bpFieldInitCropperImageFlexiElement" element="div">
        <div>
            <label>Right Side</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height"
                data-handle="previewArea" style="margin-bottom: 20px">
                <div style="background-color: #f3f3f3; height:100%">
                    <img data-handle="mainImage" src="">
                    <input type="hidden" data-handle="rotate"
                        name="rotate_image_right_side" value="0">
                    <input type="hidden" data-handle="operator"
                        name="operator_image_right_side" value="+">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*"
                    data-handle="uploadImage" class="hide">
                <input type="hidden" data-handle="hiddenImage" name="image_right_side"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-right.jpg">
            </div>
            <button class="btn btn-light btn-sm" data-handle="rotateLeft"
                type="button"><i class="la la-rotate-left"></i></button>
            <button class="btn btn-light btn-sm" data-handle="rotateRight"
                type="button"><i class="la la-rotate-right"></i></button>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>

    <div class="form-group col-md-2 col-6 bp-image-full-preview property_image_back_side cropperImage"
        data-aspectRatio="0" data-crop="" data-field-name="image_back_side"
        data-init-function="bpFieldInitCropperImageFlexiElement" element="div">
        <div>
            <label>Inside<span class="rent-span-required text-danger">*<span></label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height"
                data-handle="previewArea" style="margin-bottom: 20px">
                <div style="background-color: #f3f3f3; height:100%">
                    <img data-handle="mainImage" src="">
                    <input type="hidden" data-handle="rotate"
                        name="rotate_image_back_side" value="0">
                    <input type="hidden" data-handle="operator"
                        name="operator_image_back_side" value="+">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*"
                    data-handle="uploadImage" class="hide">
                <input type="hidden" data-handle="hiddenImage" name="image_back_side"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-back.jpg">
            </div>
            <button class="btn btn-light btn-sm" data-handle="rotateLeft"
                type="button"><i class="la la-rotate-left"></i></button>
            <button class="btn btn-light btn-sm" data-handle="rotateRight"
                type="button"><i class="la la-rotate-right"></i></button>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>

    <div class="form-group col-md-2 col-6 bp-image-full-preview property_image_opposite cropperImage"
        data-aspectRatio="0" data-crop="" data-field-name="image_opposite"
        data-init-function="bpFieldInitCropperImageFlexiElement" element="div">
        <div>
            <label>Opposite</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height"
                data-handle="previewArea" style="margin-bottom: 20px">
                <div style="background-color: #f3f3f3; height:100%">
                    <img data-handle="mainImage" src="">
                    <input type="hidden" data-handle="rotate"
                        name="rotate_image_opposite" value="0">
                    <input type="hidden" data-handle="operator"
                        name="operator_image_opposite" value="+">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*"
                    data-handle="uploadImage" class="hide">
                <input type="hidden" data-handle="hiddenImage" name="image_opposite"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/photo-opposite.jpg">
            </div>
            <button class="btn btn-light btn-sm" data-handle="rotateLeft"
                type="button"><i class="la la-rotate-left"></i></button>
            <button class="btn btn-light btn-sm" data-handle="rotateRight"
                type="button"><i class="la la-rotate-right"></i></button>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>


    <div class="form-group col-md-2 col-6 bp-image-full-preview text-nowrap cover_photo cropperImage"
        data-aspectRatio="1" data-crop="" data-field-name="image"
        data-init-function="bpFieldInitCropperImageElement" element="div">
        <div>
            <label>Cover Photo</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height" data-handle="previewArea"
                style="margin-bottom: 20px;">
                <div style="background-color: #e9eef1; height:100%">
                    <img data-handle="mainImage" src="">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*" data-handle="uploadImage" class="form-control">
                <input type="hidden" data-handle="hiddenImage" name="image"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/default-photos/default.png">
            </div>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>
    <div class="form-group col-md-2 col-6 bp-image-full-preview text-nowrap back_side_photos cropperImage"
        data-aspectRatio="1" data-crop="" data-field-name="back_side_image"
        data-init-function="bpFieldInitCropperImageElement" element="div">
        <div>
            <label>Back Side Photo</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height" data-handle="previewArea"
                style="margin-bottom: 20px;">
                <div style="background-color: #e9eef1; height:100%">
                    <img data-handle="mainImage" src="">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*" data-handle="uploadImage" class="form-control">
                <input type="hidden" data-handle="hiddenImage" name="back_side_image"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/default-photos/default.png">
            </div>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>
    <div class="form-group col-md-2 col-6 bp-image-full-preview text-nowrap cropperImage" data-aspectRatio="1"
        data-crop="" data-field-name="other_image" data-init-function="bpFieldInitCropperImageElement"
        element="div">
        <div>
            <label>Other Photo</label>
        </div>

        <div class="row">
            <div class="col-sm-6 overflow-hidden image-auto-height" data-handle="previewArea"
                style="margin-bottom: 20px;">
                <div style="background-color: #e9eef1; height:100%">
                    <img data-handle="mainImage" src="">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="btn btn-light btn-sm btn-file">
                Choose file <input type="file" accept="image/*" data-handle="uploadImage" class="form-control">
                <input type="hidden" data-handle="hiddenImage" name="other_image"
                    value="https://z1s3.s3.ap-southeast-1.amazonaws.com/assets/default-photos/default.png">
            </div>
            <button class="btn btn-light btn-sm" data-handle="remove" type="button"><i
                    class="la la-trash"></i></button>
        </div>
    </div>
</div>


<script>
    if (typeof rmRemoveErrorHtml != 'function') {
        function rmRemoveErrorHtml(jqForm) {
            jqForm.find('.help-block').remove();
            jqForm.find('.has-error').removeClass('has-error');
        }
    }

    if (typeof rmResetBasicForm != 'function') {
        function rmResetBasicForm(jqForm) {
            rmRemoveErrorHtml(jqForm)
            jqForm.find(`input`).val('').change();
            jqForm.find(`select`).val('').change();
            jqForm.find(`textarea`).val('').change();
        }
    }

    if (typeof rmAlert != 'function') {
        function rmAlert(text, type = 'success') {
            new Noty({
                type: type,
                text: text
            }).show();
        }
    }

    if (typeof rmIsObject != 'function') {
        function rmIsObject(obj, name) {
            return Object.prototype.hasOwnProperty.call(obj, name) ? obj[name] : '';
        }
    }

    if (typeof rmCloneForm != 'function') {
        function rmCloneForm(jqForm, cloneFormId) {
            const formId = $('#' + cloneFormId)
            const isForm = formId.find('form')
            if (isForm && isForm.length) {
                jqForm.html(isForm.html())
            } else {
                jqForm.html(
                    formId.html()
                )
            }
        }
    }

    if (typeof rmCatchValidateMessageError != 'function') {
        function rmCatchValidateMessageError(e, jqForm, isJqueryAjax = false) {

            if (isJqueryAjax) {
                var status = e.status;
                var errors = e.responseJSON.errors;
            } else {
                var status = e.response.status;
                var errors = e.response.data.errors;
            }

            if (status != 422) {
                rmAlert('Something when wrong.', 'danger')
            } else {
                var error = errors;
                rmRemoveErrorHtml(jqForm)
                Object.keys(error).forEach(element => {
                    let splitElement = element.split('.')
                    if (splitElement.length > 1) {
                        jqForm.find(`input[name="${splitElement[0]}[]"]`).closest('.form-group').addClass(
                            'has-error');
                        jqForm.find(`input[name="${splitElement[0]}[]"]`).closest('.form-group').append(
                            '<p class="help-block text-danger">' + error[element] + '</p>');
                    } else {
                        jqForm.find(`input[name="${element}"]`).closest('.form-group').addClass('has-error');
                        jqForm.find(`select[name="${element}"]`).closest('.form-group').addClass('has-error');
                        jqForm.find(`textarea[name="${element}"]`).closest('.form-group').addClass('has-error');
                        jqForm.find(`input[name="${element}"]`).closest('.form-group').append(
                            '<p class="help-block text-danger">' + error[element] + '</p>');
                        jqForm.find(`select[name="${element}"]`).closest('.form-group').append(
                            '<p class="help-block text-danger">' + error[element] + '</p>');
                        jqForm.find(`textarea[name="${element}"]`).closest('.form-group').append(
                            '<p class="help-block text-danger">' + error[element] + '</p>');
                    }
                });
            }
        }
    }
    if (typeof rmInitializeFieldsWithJavascript != 'function') {
        // Clone backpack initFunction
        function rmInitializeFieldsWithJavascript(container) {
            var selector;
            if (container instanceof jQuery) {
                selector = container;
            } else {
                selector = $(container);
            }
            selector.find("[data-init-function]").not("[data-initialized=true]").each(function() {
                var element = $(this);
                var functionName = element.data('init-function');

                if (typeof window[functionName] === "function") {
                    window[functionName](element);

                    // mark the element as initialized, so that its function is never called again
                    element.attr('data-initialized', 'true');
                }
            });
        }
    }

    if (typeof bytesToMegaBytes != 'function') {
        function bytesToMegaBytes(bytes) {
            return (bytes / (1024 * 1024)).toFixed(2);
        }
    }

    if (typeof base64FileSize != 'function') {
        function base64FileSize(src) {
            const len = src.length;
            const sign = src.slice(-2).split('').filter(v => v == '=').join('');
            return (len * (3 / 4)) - sign.length;
        }
    }

    if (typeof initializeFieldsWithJavascript != 'function') {
        function initializeFieldsWithJavascript(container) {
            var selector;
            if (container instanceof jQuery) {
                selector = container;
            } else {
                selector = $(container);
            }
            selector.find("[data-init-function]").not("[data-initialized=true]").each(function() {
                var element = $(this);
                var functionName = element.data('init-function');

                if (typeof window[functionName] === "function") {
                    window[functionName](element);

                    // mark the element as initialized, so that its function is never called again
                    element.attr('data-initialized', 'true');
                }
            });
        }
    }
</script>

<script src="https://dev.z1mobile.com/js/hermite.js"></script>

<script>
    var cw = $('.image-auto-height').width();
    $('.image-auto-height').css({
        'height': cw + 'px'
    });

    function rotateFunction(operator, image, rotateElement, operatorHidden) {
        var rotation = rotateElement.val() == '' ? 0 : parseInt(rotateElement.val());
        if (operator == '-') {
            rotation = (rotation - 90) % 360;
            operatorHidden.val('-');
        } else if (operator == '+') {
            rotation = (rotation + 90) % 360;
            operatorHidden.val('+');
        }
        image.css({
            'transform': `rotate(${rotation}deg)`
        });
        rotateElement.val(rotation);
    }

    function bpFieldInitCropperImageFlexiElement(element) {
        // Find DOM elements under this form-group element
        var $mainImage = element.find("[data-handle=mainImage]");
        var $uploadImage = element.find("[data-handle=uploadImage]");
        var $hiddenImage = element.find("[data-handle=hiddenImage]");
        var $rotateLeft = element.find("[data-handle=rotateRight]");
        var $rotateRight = element.find("[data-handle=rotateLeft]");
        var $zoomIn = element.find("[data-handle=zoomIn]");
        var $zoomOut = element.find("[data-handle=zoomOut]");
        var $reset = element.find("[data-handle=reset]");
        var $remove = element.find("[data-handle=remove]");
        var $previews = element.find("[data-handle=previewArea]");
        var $rotateHidden = element.find("[data-handle=rotate]");
        var $operatorHidden = element.find("[data-handle=operator]");

        $(function() {
            $rotateLeft.click(function() {
                rotateFunction('+', $mainImage, $rotateHidden, $operatorHidden);
            });
            $rotateRight.click(function() {
                rotateFunction('-', $mainImage, $rotateHidden, $operatorHidden);
            });
        });

        // Hide 'Remove' button if there is no image saved
        if (!$hiddenImage.val()) {
            $previews.hide();
            $remove.hide();
        }
        // Make the main image show the image in the hidden input
        $mainImage.attr('src', $hiddenImage.val());

        // Only initialize cropper plugin if crop is set to true
        $remove.click(function() {
            $mainImage.attr('src', '');
            $hiddenImage.val('');
            $remove.hide();
            $previews.hide();
            $rotateHidden.val(0);
        });

        $uploadImage.change(function() {
            var files = this.files;
            resizeImage(files, 0, element);
        });
    }

    function resizeImage(files, i, element) {
        if (!files.length) {
            return false;
        }
        var $mainImage = element.find("[data-handle=mainImage]");
        var $uploadImage = element.find("[data-handle=uploadImage]");
        var $hiddenImage = element.find("[data-handle=hiddenImage]");
        var $rotateLeft = element.find("[data-handle=rotateRight]");
        var $rotateRight = element.find("[data-handle=rotateLeft]");
        var $zoomIn = element.find("[data-handle=zoomIn]");
        var $zoomOut = element.find("[data-handle=zoomOut]");
        var $reset = element.find("[data-handle=reset]");
        var $remove = element.find("[data-handle=remove]");
        var $previews = element.find("[data-handle=previewArea]");
        var $rotateHidden = element.find("[data-handle=rotate]");
        var $operatorHidden = element.find("[data-handle=operator]");

        const HERMITE = new Hermite_class();
        const fileReader = new FileReader();
        const file = files[i];
        const imgMime = file.type;
        const maxImageSize = 16777216;
        const sizeUpload = 31457280;
        const sizeInMb = bytesToMegaBytes(file.size);

        let quality = 50;
        switch (true) {
            case sizeInMb > 20:
                quality = 10;
                break;
            case sizeInMb > 10:
                quality = 30;
                break;
            case sizeInMb < 1:
                quality = 100;
                break
            default:
                break;
        }

        if (sizeUpload > 0 && file.size > sizeUpload) {
            alert(`Please pick an image smaller than ${sizeUpload} bytes.`);
        } else if (/^image\/\w+$/.test(file.type)) {
            fileReader.readAsDataURL(file);
            fileReader.onloadend = function() {
                const temImg = new Image();
                temImg.addEventListener("load", function() {
                    try {
                        HERMITE.resize_image(temImg, null, null, quality, true, imgMime, () => {
                            if (maxImageSize > 0 && base64FileSize(temImg.src) > maxImageSize) {
                                alert(`Please pick an image smaller than ${maxImageSize} bytes.`);
                            } else {
                                $mainImage.attr('src', temImg.src);
                                $hiddenImage.val(temImg.src);
                                resizeImage(files, ++i, element);
                            }
                        });
                    } catch (error) {
                        console.log(error);
                        rmAlert('Image is not readable', type = 'danger');
                    }
                }, {
                    once: true
                });
                temImg.src = this.result;
                $uploadImage.val("");
                $previews.show();
                $remove.show();
            };
        } else {
            new Noty({
                type: "error",
                text: "<strong>Please choose an image file</strong><br>The file you've chosen does not look like an image."
            }).show();
        }
    }
</script>

{{-- Image Cover --}}
<script>
    function bpFieldInitCropperImageElement(element) {
        // Find DOM elements under this form-group element
        var $mainImage = element.find('[data-handle=mainImage]');
        var $uploadImage = element.find("[data-handle=uploadImage]");
        var $hiddenImage = element.find("[data-handle=hiddenImage]");
        var $rotateLeft = element.find("[data-handle=rotateLeft]");
        var $rotateRight = element.find("[data-handle=rotateRight]");
        var $zoomIn = element.find("[data-handle=zoomIn]");
        var $zoomOut = element.find("[data-handle=zoomOut]");
        var $reset = element.find("[data-handle=reset]");
        var $remove = element.find("[data-handle=remove]");
        var $previews = element.find("[data-handle=previewArea]");
        // Options either global for all image type fields, or use 'data-*' elements for options passed in via the CRUD controller
        var options = {
            viewMode: 2,
            checkOrientation: false,
            autoCropArea: 1,
            responsive: true,
            preview: element.find('.img-preview'),
            aspectRatio: element.attr('data-aspectRatio')
        };
        var crop = element.attr('data-crop');

        // Hide 'Remove' button if there is no image saved
        if (!$hiddenImage.val()) {
            $previews.hide();
            $remove.hide();
        }
        // Make the main image show the image in the hidden input
        $mainImage.attr('src', $hiddenImage.val());


        // Only initialize cropper plugin if crop is set to true
        if (crop) {

            $remove.click(function() {
                $mainImage.cropper("destroy");
                $mainImage.attr('src', '');
                $hiddenImage.val('');
                $rotateLeft.hide();
                $rotateRight.hide();
                $zoomIn.hide();
                $zoomOut.hide();
                $reset.hide();
                $remove.hide();
                $previews.hide();
            });
        } else {

            $remove.click(function() {
                $mainImage.attr('src', '');
                $hiddenImage.val('');
                $remove.hide();
                $previews.hide();
            });
        }

        $uploadImage.change(function() {
            var fileReader = new FileReader(),
                files = this.files,
                file;

            if (!files.length) {
                return;
            }
            file = files[0];

            const HERMITE = new Hermite_class();
            const imgMime = file.type;
            const maxImageSize = 16777216;
            const sizeInMb = bytesToMegaBytes(file.size);
            const sizeUpload = 31457280;

            let quality = 50;
            switch (true) {
                case sizeInMb > 20:
                    quality = 10;
                    break;
                case sizeInMb > 10:
                    quality = 30;
                    break;
                case sizeInMb < 1:
                    quality = 100;
                    break
                default:
                    break;
            }


            if (sizeUpload > 0 && file.size > sizeUpload) {
                alert(`Please pick an image smaller than ${sizeUpload} bytes.`);
            } else if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function() {
                    const temImg = new Image();
                    temImg.addEventListener("load", function() {
                        HERMITE.resize_image(temImg, null, null, quality, true, imgMime, () => {
                            if (maxImageSize > 0 && base64FileSize(temImg.src) >
                                maxImageSize) {
                                alert(
                                    `Please pick an image smaller than ${maxImageSize} bytes.`);
                            } else {
                                $mainImage.attr('src', temImg.src);
                                $hiddenImage.val(temImg.src);
                            }
                        });
                    }, {
                        once: true
                    });
                    temImg.src = this.result;
                    $uploadImage.val("");
                    $previews.show();
                    if (crop) {
                        $mainImage.cropper(options).cropper("reset", true).cropper("replace", this.result);
                        // Override form submit to copy canvas to hidden input before submitting
                        // update the hidden input after selecting a new item or cropping
                        $mainImage.on('ready cropstart cropend', function() {
                            var imageURL = $mainImage.cropper('getCroppedCanvas').toDataURL(file
                                .type);
                            $hiddenImage.val(imageURL);
                            return true;
                        });
                        $rotateLeft.click(function() {
                            $mainImage.cropper("rotate", 90);
                        });
                        $rotateRight.click(function() {
                            $mainImage.cropper("rotate", -90);
                        });
                        $zoomIn.click(function() {
                            $mainImage.cropper("zoom", 0.1);
                        });
                        $zoomOut.click(function() {
                            $mainImage.cropper("zoom", -0.1);
                        });
                        $reset.click(function() {
                            $mainImage.cropper("reset");
                        });
                        $rotateLeft.show();
                        $rotateRight.show();
                        $zoomIn.show();
                        $zoomOut.show();
                        $reset.show();
                        $remove.show();

                    } else {
                        $mainImage.attr('src', this.result);
                        $hiddenImage.val(this.result);
                        $remove.show();
                    }
                };
            } else {
                new Noty({
                    type: "error",
                    text: "<strong>Please choose an image file</strong><br>The file you've chosen does not look like an image."
                }).show();
            }
        });
    }
</script>





