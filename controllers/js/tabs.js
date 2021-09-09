/*
=====================================================================
	OpusVid | tabs.js
	v. 1.0
=====================================================================
*/

$(document).ready(function () {

	$('ul.tabs li').click(function () {
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})

	$('ul.tabs_2 li').click(function () {
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs_2 li').removeClass('current');
		$('.tab-content_2').removeClass('current');

		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})

})

/*
=====================================================================
	@ 2020 DevLexicon
=====================================================================
*/
