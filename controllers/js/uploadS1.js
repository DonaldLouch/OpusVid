window.addEventListener("load", function () {
    var uploader = new plupload.Uploader({
        runtimes: 'html5,html4',
        browse_button: 'pickfiles',
        url: '../../controllers/database/videoUpload-S1.database.php',
        chunk_size: '10mb',
        filters: {
            max_file_size: '2gb',
            mime_types: [{ title: "Video files", extensions: "mp4" }]
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
                    document.getElementById('filelist').innerHTML = '<div class="successMessage"><p>Video and thumbnail successfully uploaded!</p></div ><a href="../dashboard/upload_s2" class="button">Continue To Step 2: Thumbnail Upload</a>';
                }
            },
            Error: function (up, err) {
                console.log(err);
            }
        }
    });
    uploader.init();
});