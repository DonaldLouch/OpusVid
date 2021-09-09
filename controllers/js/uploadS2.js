window.addEventListener("load", function () {
    var uploader = new plupload.Uploader({
        runtimes: 'html5,html4',
        browse_button: 'pickfiles',
        url: '../../controllers/database/videoUpload-S2.database.php',
        chunk_size: '10mb',
        filters: {
            //max_file_size: '150mb',
            mime_types: [{ title: "Image files", extensions: "jpg" }]
        },

        init: {
            PostInit: function () {
                document.getElementById('filelist').innerHTML = '';
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist').innerHTML +=
                        `<div id="${file.id}">Uploading: ${file.name} (${plupload.formatSize(file.size)}) <strong></strong></div>`;
                });
                uploader.start();
            },
            UploadProgress: function (up, file) {
                document.getElementById('pickfiles').style.display = "none";
                document.querySelector(`#${file.id} strong`).innerHTML =
                    `<span>${file.percent}%</span>`;
                if (file.percent === 100) {
                    document.getElementById('filelist').innerHTML = '<div class="successMessage"><p>Video and thumbnail successfully uploaded!</p></div ><a href="../dashboard/upload_s3" class="button">Continue To Step 3: Video Information</a>';
                }
            },
            Error: function (up, err) {
                console.log(err);
            }
        }
    });
    uploader.init();
});