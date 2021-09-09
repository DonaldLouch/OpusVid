/*
=====================================================================
	OpusVid | uploadProgress.js
	v. 1.0
=====================================================================
*/

function _(el) {
	return document.getElementById(el);
}

function uploadFile() {
	var vidFile = _("videoFile").files[0];
	var thumbFile = _("thumbnailFile").files[0];
	var formdata = new FormData();
	formdata.append("videoFile", vidFile);
	formdata.append("thumbnailFile", thumbFile);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "../../controllers/database/videoUpload-S1.database.php");
	ajax.send(formdata);
}

function progressHandler(event) {
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}

function errorHandler(event) {
	_("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
	_("status").innerHTML = "Upload Aborted";
}

/*
=====================================================================
	@ 2020 DevLexicon
=====================================================================
*/
