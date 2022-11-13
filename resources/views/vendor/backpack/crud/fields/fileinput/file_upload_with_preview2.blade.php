
        {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/> --}}
        <link rel="stylesheet" type="text/css"  href="{{asset('vendor/backpack/crud/css/file-upload-with-preview@4.1.0.min.css')}}"/>

        <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>

    @if(isset($entry))
        
            <div style="width: 97%; margin:20px auto 20px auto;">
                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                    <label>Gallery (Each photo is limited within 10MB) 
                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                    </label>
                    @foreach ($entry->files as $item)
                        <img src="{{asset('uploads/files/'.$item->url)}}" width="50px" height="50px" alt="">
                    @endforeach
                    <label class="custom-file-container__custom-file">
                        
                        {{-- @dd($entry->files) --}}
                            <input
                                type="file"
                                name="profile[]"
                                class="custom-file-container__custom-file__custom-file-input"
                                accept="*"
                                multiple
                                aria-label="Choose File"
                            />
                            <input type="hidden" name="MAX_FILE_SIZE" value="" />
   
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                        <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        
    @else
        <div style="width: 97%; margin:20px auto 20px auto;">
            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                <label>Gallery (Each photo is limited within 10MB) 
                    <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a>
                </label>

                <label class="custom-file-container__custom-file">
                    <input
                        type="file"
                        name="profile[]"
                        class="custom-file-container__custom-file__custom-file-input"
                        accept="*"
                        multiple
                        aria-label="Choose File"
                        required
                    />
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
        </div>
    @endif
    

        <script>
            var upload = new FileUploadWithPreview("myUniqueUploadId", {
                showDeleteButtonOnImages: true,
                text: {
                    chooseFile: "Choose Files",
                    browse: "BrowseFiles",
                    selectedCount: "Custom Files",
                },
            });
        </script>
