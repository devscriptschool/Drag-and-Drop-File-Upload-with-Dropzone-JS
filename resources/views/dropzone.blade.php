<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Drag and Drop File Upload with Dropzone JS - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .dz-preview .dz-image img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel 11 Drag and Drop File Upload with Dropzone JS - DevScriptSchool.com</h3>
        <div class="card-body">
            <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                @csrf
                <div>
                    <h4>Upload Multiple Image By Click On Box</h4>
                </div>
            </form>
            <button id="uploadFile" class="btn btn-success mt-1">Upload Images</button>
        </div>
    </div>
</div>

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    var images = {{ Js::from($images) }};

    var myDropzone = new Dropzone(".dropzone", {
        init: function() {
            myDropzone = this;

            $.each(images, function(key,value) {
                var mockFile = { name: value.name, size: value.filesize};

                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, value.path);
                myDropzone.emit("complete", mockFile);

            });
        },
        autoProcessQueue: false,
        paramName: "files",
        uploadMultiple: true,
        maxFilesize: 5,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    });

    $('#uploadFile').click(function(){
        myDropzone.processQueue();
    });

</script>

</body>
</html>
