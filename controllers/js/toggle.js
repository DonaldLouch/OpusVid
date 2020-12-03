/*
=====================================================================
	OpusVid | toggle.js
		v. 1.0
=====================================================================
*/

console.log("toggle.js is working!")

function toggle_visibility(id) {
    console.log("You clicked a toggle");
    var e = document.getElementById(id);
    if(e.style.display == 'block')
    e.style.display = 'none';
    else
    e.style.display = 'block';
}

/*
=====================================================================
	@ 2020 DevLexicon
=====================================================================
*/
