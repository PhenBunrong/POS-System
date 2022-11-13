    <link rel="stylesheet" type="text/css"  href="{{asset('vendor/backpack/crud/css/file-upload-with-preview.min.css')}}"/>

    <script src="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>

        <div style="width: 97%; margin:20px auto 20px auto;">
            <div class="custom-file-container" name="profile[]" data-upload-id="file_upload_with_preview">
            </div>
        </div>

        <script>
            const upload = new FileUploadWithPreview.FileUploadWithPreview('file_upload_with_preview', {
                multiple: true,
                showDeleteButtonOnImages: true,
                text: {
                    chooseFile: 'Multiple Files',
                    browse: 'Upload Files',
                    selectedCount: 'Files Selected',
                },
                // presetFiles: [
                //     'images/1.jpg'
                // ]
            });
            upload.cachedFileArray[2];
        </script>
