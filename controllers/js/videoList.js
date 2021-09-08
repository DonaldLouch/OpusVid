/*
===============
  Chapters
===============
*/

if ($('#isThereChapters').prop('checked') == true) {
    $('#chapterCheckText').html('Uncheck this box if, this video has chapter that you would like to add.');
    $('#chapterInputSection' ).toggleClass( 'hidden' );
  } else {
    $('#chapterCheckText').html('Check this box if, this video has no chapters that you would like to add.');
  }

$( '#isThereChapters' ).click(function() { 
  if ($('#isThereChapters').prop('checked') == true) {
    $('#chapterCheckText').html('Uncheck this box if, this video has chapter that you would like to add.');
  } else {
    $('#chapterCheckText').html('Check this box if, this video has no chapters that you would like to add.');
  }
  $('#chapterInputSection' ).toggleClass( 'hidden' );
});

$(document).ready(function() {
        var i = $("#addChapters").val();
        $('#addChapters').click(function() {
            i++;
            $('#theChaptersSection').append('<div class="columns 3 list" id="chapter_' + i +
                '"><div class="column"><div class="field"><input type="text" name="chapterTimeCode[]" id="chapterTimeCode_' +
                i + '" placeholder="Chapter Time Code"><label for="chapterTimeCode_' + i +
                '"><span class="required">*</span>Chapter Time Code</label></div></div><div class="column"><div class="field"><input type="text" name="chapterTitle[]" id="chapterTitle_' +
                i + '" placeholder="Chapter Title"><label for="chapterTitle_' + i +
                '"><span class="required">*</span>Chapter Title</label></div></div><div class="column"><button type="button" name="removeChapter" id="chapter_' +
                i + '" class="removeButton removeChapterButton">X</button></div></div>');
        });
        $(document).on('click', '.removeChapterButton', function() {
            var buttonIDChapters = $(this).attr("id");
            $('#' + buttonIDChapters + '').remove();
        });
    });

 /*
===============
  Music Credits
===============
*/
if ($('#isThereMusicCredit').prop('checked') == true) {
    $('#musicCreditCheckText').html('Uncheck this box if, this video has music credits that you would like to credit.');
    $('#musicCreditInputSection' ).toggleClass( 'hidden' );
  } else {
    $('#musicCreditCheckText').html('Check this box if, this video has no music credits that you would like to credit.');
  }

$( '#isThereMusicCredit' ).click(function() { 
  if ($('#isThereMusicCredit').prop('checked') == true) {
    $('#musicCreditCheckText').html('Uncheck this box if, this video has music credits that you would like to credit.');
  } else {
    $('#musicCreditCheckText').html('Check this box if, this video has no music credits that you would like to credit.');
  }
  $('#musicCreditInputSection' ).toggleClass( 'hidden' );
});

$(document).ready(function() {
        var i = $("#addMusic").val();
        $('#addMusic').click(function() {
            i++;
            $('#theMusicSection').append('<div class="columns 3 list" id="musicCredit_' + i + '"><div class="column"><div class="field"><input type="text" name="musicTimePlayed[]" id="musicTimePlayed_' + i + '"><label for="musicTimePlayed_' + i + '">Time Code(s) *</label></div></div><div class="column"><div class="field"><input type="text" name="musicSongTitle[]" id="musicSongTitle_' + i + '"><label for="musicSongTitle_' + i + '"><span class="required">*</span>Song Title</label></div></div><div class="column"><div class="field"><input type="text" name="musicArtist[]" id="musicArtist_' + i + '"><label for="musicArtist_' + i + '"><span class="required">*</span>Artist</label></div></div><div class="column"><div class="field"><input type="text" name="musicLink[]" id="musicLink_' + i + '"><label for="musicLink_' + i + '">Link to Song</label></div></div><div class="column"><div class="field"><input type="text" name="musicMore[]" id="musicMore_' + i + '"><label for="musicMore_' + i + '">More Information</label></div></div><div class="column"><button type="button" name="removeMusic" id="musicCredit_' + i + '" class="removeButton removeMusicButton">X</button></div></div>');
        });
        $(document).on('click', '.removeMusicButton', function() {
            var buttonIDMusic = $(this).attr("id");
            $('#' + buttonIDMusic + '').remove();
        });
    });

 /*
===============
  Video Credits
===============
*/

if ($('#isThereVideoCredit').prop('checked') == true) {
    $('#videoCreditCheckText').html('Uncheck this box if, this video has video credits that you would like to credit.');
    $('#videoCreditInputSection' ).toggleClass( 'hidden' );
  } else {
    $('#videoCreditCheckText').html('Check this box if, this video has no video credits that you would like to credit.');
  }

$( '#isThereVideoCredit' ).click(function() { 
  if ($('#isThereVideoCredit').prop('checked') == true) {
    $('#videoCreditCheckText').html('Uncheck this box if, this video has video credits that you would like to credit.');
  } else {
    $('#videoCreditCheckText').html('Check this box if, this video has no video credits that you would like to credit.');
  }
  $('#videoCreditInputSection' ).toggleClass( 'hidden' );
});

 $(document).ready(function() {
        var i = $("#addVideoCredit").val();
        $('#addVideoCredit').click(function() {
            i++;
            $('#theVideoCreditSection').append('<div class="columns 3 list" id="videoCredit_' + i +'"><div class="column"><div class="field"><input type="text" name="videoCreditTitle[]"id="videoCreditTitle_' + i +'"><label for="videoCreditTitle_' + i +'"><span class="required">*</span>Video Credit Title</label></div></div><div class="column"><div class="field"><input type="text" name="videoCreditName[]" id="videoCreditName_' + i +'"><label for="videoCreditName_' + i +'"><span class="required">*</span>Video Credit Name</label></div></div><div class="column"><button type="button" name="removeVideoCreditr" id="videoCredit_' + i +'"class="removeButton removeVideoCreditButton">X</button></div></div>');
        });
        $(document).on('click', '.removeVideoCreditButton', function() {
            var buttonIDVideoCredit = $(this).attr("id");
            $('#' + buttonIDVideoCredit + '').remove();
        });
    });

/*
===============
  Staring
===============
*/

if ($('#isThereStaringCredit').prop('checked') == true) {
    $('#staringCreditCheckText').html('Uncheck this box if, this video has staring credits that you would like to credit.');
    $('#staringCreditInputSection' ).toggleClass( 'hidden' );
  } else {
    $('#staringCreditCheckText').html('Check this box if, this video has no staring credits that you would like to credit.');
  }

$( '#isThereStaringCredit' ).click(function() { 
  if ($('#isThereStaringCredit').prop('checked') == true) {
    $('#staringCreditCheckText').html('Uncheck this box if, this video has staring credits that you would like to credit.');
  } else {
    $('#staringCreditCheckText').html('Check this box if, this video has no staring credits that you would like to credit.');
  }
  $('#staringCreditInputSection' ).toggleClass( 'hidden' );
});

     $(document).ready(function() {
        var i = $("#addStaring").val();
        $('#addStaring').click(function() {
            i++;
            $('#theStaringSection').append('<div class="columns 4 list" id="staring_' + i +'"><div class="column"><div class="field"><input type="text" name="staringTimeCode[]" id="staringTimeCode_' + i +'"><label for="staringTimeCode_' + i +'">Staring Time Code</label></div></div><div class="column"><div class="field"><input type="text" name="staringDisplayName[]" id="staringDisplayName_' + i +'"><label for="staringDisplayName_' + i +'"><span class="required">*</span>Display Name</label></div></div><div class="column"><div class="field"><input type="text" name="staringUsername[]" id="staringUsername_' + i +'"><label for="staringUsername_' + i +'"><span class="required">*</span>Username *</label></div></div><div class="column"><button type="button" name="removeStaring" id="staring_' + i +'" class="removeButton removeStaringButton">X</button></div></div>');
        });
        $(document).on('click', '.removeStaringButton', function() {
            var buttonIDStaring = $(this).attr("id");
            $('#' + buttonIDStaring + '').remove();
        });
    });

/*
===============
  Links
===============
*/

if ($('#linkType').val() == "default" || $('#linkType').val() == "noLinks") {
    $('#theLinksSection' ).toggleClass( 'hidden' );
}

$( '#linkType' ).change(function() { 
  console.log($('#linkType').val() );
  if ($('#linkType').val() == "default" || $('#linkType').val() == "noLinks") {
    $('#theLinksSection' ).attr('class', 'listSection hidden' );
  } else {
    $('#theLinksSection' ).attr('class', 'listSection' );
  }
});

if ($('#isThereLinks').prop('checked') == true) {
    $('#linkText').html('Uncheck this box if, this profile has link(s) that you want to use.');
    $('#linksInputSection' ).toggleClass( 'hidden' );
  } else {
    $('#linkText').html('Check this box if, this profile has no link(s) that you want to use.');
  }

$( '#isThereLinks' ).click(function() { 
  if ($('#isThereLinks').prop('checked') == true) {
    $('#linkText').html('Uncheck this box if, this profile has link(s) that you want to use.');
  } else {
    $('#linkText').html('Check this box if, this profile has no link(s) that you want to use.');
  }
  $('#linksInputSection' ).toggleClass( 'hidden' );
});

$(document).ready(function() {
        var i = $("#addLinks").val();
        $('#addLinks').click(function() {
            i++;
            $('#theLinksSection').append('<div class="columns 3 list" id="links_' + i +'"><div class="column"><div class="field"><input type="text" name="linkHref[]" id="linkHref_' + i +'"><label for="linkHref_' + i +'"><span class="required">*</span>Link URL</label></div></div><div class="column"><div class="field"><input type="text" name="linkTitle[]" id="linkTitle_' + i +'"><label for="linkTitle_' + i +'"><span class="required">*</span>Link Title</label></div></div><div class="column"><button type="button" name="removeLinks" id="links_' + i +'"class="removeButton removeLinksButton">X</button></div></div>');
        });
        $(document).on('click', '.removeLinksButton', function() {
            var buttonIDLinks = $(this).attr("id");
            $('#' + buttonIDLinks + '').remove();
        });
    });